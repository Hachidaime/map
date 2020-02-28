<?php
class Laporan extends Front{
    public function __construct(){
		parent::__construct();
		
		//Check user Access
        $permission = $this->CheckPermission(get_class($this));
        if($permission === false){
            header('Location: index.php?role=forbidden');
        }
	}
    
    /*START LAPORAN DD1*/
    function LoadDD1(){
        $param = [];
        $param = array(
            'method' => 'laporan DD1',
            'class' => get_class($this)
        );
        
        $content = $this->LoadMain($param);
        return $content;
    }
    
    function LoadDD1Search(){
        $sql = "SELECT tjalan.id, tjalan.no_jalan, tjalan.nama_jalan, tjalan.kepemilikan, tjalan.lebar, tkoordinat_jalan.koordinat_awal FROM tjalan
            LEFT JOIN tkoordinat_jalan ON tkoordinat_jalan.no_jalan = tjalan.no_jalan
            ORDER BY tjalan.kepemilikan ASC, tjalan.no_jalan ASC
        ";
        $list = $this->db->GetAll($sql);
        
        $jalan = [];
        foreach($list as $idx=>$row){
            $jalan[trim($row['no_jalan'])] = $row;
        }
        
        $sql = "SELECT no_jalan, perkerasan, kondisi, koordinat FROM tdetail_jalan ORDER BY no_jalan ASC, no_detail ASC";
        $detail = $this->db->GetAll($sql);
        
        foreach($detail as $idx=>$row){
            $obj = (object)$row;
            $jalan[trim($obj->no_jalan)]['perkerasan'][$obj->perkerasan][] = $obj->koordinat;
            $jalan[trim($obj->no_jalan)]['kondisi'][$obj->kondisi][] = $obj->koordinat;
        }
        
        $list = [];
        foreach($jalan as $idx=>$row){
            $obj = (object)$row;
            unset($row['kepemilikan']);
            $list[$obj->kepemilikan][] = $row;
        }
        
        $this->smarty->assign('list', $list);
        $_SESSION['jalan_json'] = json_encode($jalan);
        $this->smarty->assign('kepemilikan_opt', $this->Option('kepemilikan_opt'));
        $this->smarty->assign('perkerasan_opt', $this->Option('perkerasan_opt'));
        $this->smarty->assign('kondisi_opt', $this->Option('kondisi_opt'));
        $content = $this->smarty->fetch("Laporan/TPL_LoadLaporanDD1Search.php");
        return $content;
    }
    
    function DD1Data(){
        $jalan_json = $_SESSION['jalan_json'];
        unset($_SESSION['jalan_json']);
        return $jalan_json;
    }
    /*END LAPORAN DD1*/
}
?>