<?php
class View extends Front{
    public function __construct(){
		parent::__construct();
		
		//Check user Access
        $permission = $this->CheckPermission(get_class($this));
        if($permission === false){
            header('Location: index.php?role=forbidden');
        }
	}
    
    function LoadView(){
        $param = [];
        $param = array(
            'method' => 'view',
            'class' => get_class($this)
        );
        
        $obj = $this->GetObject($param);
        $this->smarty->assign($_GET);
        $this->smarty->assign('kepemilikan_opt2', $this->Option('kepemilikan_opt2'));
        $this->smarty->assign('kondisi_opt', $this->Option('kondisi_opt'));
        $this->smarty->assign('kepemilikan_setup', json_encode($this->Setup('kepemilikan')));
        $this->smarty->assign('kondisi_setup_json', json_encode($this->Setup('kondisi')));
        $this->smarty->assign('kondisi_setup', $this->Setup('kondisi'));
        $this->smarty->assign('title',title("{$obj->title}"));
        $content = $this->smarty->fetch("{$obj->folder}/TPL_Load{$obj->file}.php");
        return $content;
    }
    
    function RuasJalan(){
        foreach($_REQUEST as $key=>$value){
            $$key = $value;
        }
        
        $filter = "";
        if($kepemilikan > 0){
            $cond = [];
            if($kepemilikan <= 3){
                $cond[] = "kepemilikan = '{$kepemilikan}'";
            }
            
            $filter = (count($cond) > 0) ? "WHERE " . implode(" AND ", $cond) : "";
        
            $sql = "SELECT no_jalan, nama_jalan FROM tjalan
                {$filter}
                ORDER BY no_jalan ASC
            ";
            $list = $this->db->GetAll($sql);

            $jalan = [];
            $jalan[0] = "&nbsp;";
            if(count($list) > 0){
                $jalan[999] = "Semua";
            }
            foreach($list as $idx=>$row){
                $obj = (object)$row;
                $jalan[$obj->no_jalan] = "{$obj->no_jalan} - {$obj->nama_jalan}";
            }

            $this->smarty->assign('jalan', $jalan);
            $content = $this->smarty->fetch("View/TPL_Jalan.php");
            return $content;
        }
        else{
            return true;
        }
    }
    
    function SearchData(){
        foreach($_REQUEST as $key=>$val){
            $$key = $val;
        }
//        print_r($_REQUEST);
        
        $error = 0;
        
        if($no_jalan != '0'){
            $result = [];
            $filter = "";
            $cond = [];
            
            if($kepemilikan != 99){
                $cond[] = "tjalan.kepemilikan = '{$kepemilikan}'";
            }
            else{
                if(!$cari_jalan_provinsi){
                    $cond[] = "tjalan.kepemilikan != 1";
                }
            }
            if($no_jalan != 999){
                $cond[] = "tjalan.no_jalan = '{$no_jalan}'";
            }
            
            $filter = (count($cond) > 0) ? "WHERE " . implode(" AND ", $cond) : "";
        }
        else{
            $error = 1;
        }
        
        if(!$error){
            /*Start Search Jalan*/
            $sql = "SELECT tjalan.id, tjalan.no_jalan, tjalan.nama_jalan, tjalan.kepemilikan, tjalan.lebar, tkoordinat_jalan.koordinat_awal FROM tjalan
                LEFT JOIN tkoordinat_jalan ON tkoordinat_jalan.no_jalan = tjalan.no_jalan
                {$filter}
                ORDER BY tjalan.kepemilikan ASC, tjalan.no_jalan ASC
            ";
//            echo $sql;
            $list = $this->db->GetAll($sql);

            $jalan = [];
            foreach($list as $idx=>$row){
                $jalan[trim($row['no_jalan'])] = $row;
            }
            $result['jalan'] = $jalan;
            /*End Search Jalan*/

            /*Start Search Perkerasan & Kondisi*/
            if($cari_perkerasan || $cari_kondisi){
                $sql = "SELECT tjalan.kepemilikan, tdetail_jalan.perkerasan, tdetail_jalan.kondisi, tdetail_jalan.koordinat FROM tdetail_jalan
                LEFT JOIN tjalan ON tjalan.no_jalan = tdetail_jalan.no_jalan
                {$filter}
                ORDER BY tjalan.no_jalan ASC,
                tdetail_jalan.no_detail ASC";
                $detail = $this->db->GetAll($sql);
                
                $perkerasan = ($cari_perkerasan) ? [] : "";
                $kondisi = ($cari_kondisi) ? [] : "";
                foreach($detail as $idx=>$row){
                    $obj = (object)$row;
                    if($cari_perkerasan)
                        $perkerasan[$obj->kepemilikan][$obj->perkerasan][] = $obj->koordinat;
                    if($cari_kondisi)
                        $kondisi[$obj->kepemilikan][$obj->kondisi][] = $obj->koordinat;
                }
                if($cari_perkerasan)
                    $result['perkerasan'] = $perkerasan;
                if($cari_kondisi)
                    $result['kondisi'] = $kondisi;
                
            }
            /*Start Search Perkerasan & Kondisi*/

            return json_encode($result);
        }
    }
}