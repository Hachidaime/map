<?php
class Jalan extends Front{
    public function __construct(){
		parent::__construct();
		
		//Check user Access
        $permission = $this->CheckPermission(get_class($this));
        if($permission === false){
            header('Location: index.php?role=forbidden');
        }
	}
    
    /*START JALAN*/
    function LoadJalan(){
        $param = [];
        $param = array(
            'method' => 'jalan',
            'class' => get_class($this)
        );
        
        $content = $this->LoadMain($param);
        return $content;
    }
    
    function LoadJalanSearch(){
        foreach($_REQUEST as $key=>$value){
            $$key = $value;
        }
        
        $param = [];
        $param = array(
            'method' => 'jalan',
            'class' => get_class($this),
            'query' => 'SELECT tjalan.*, toption_list.name as status_kepemilikan FROM tjalan LEFT JOIN toption_list ON tjalan.kepemilikan = toption_list.code',
            'condition' => (object) array(
                (object) array(
                    'column' => 'nama_jalan',
                    'value' => $keyword,
                    'relational' => 'LIKE',
                    'logical' => 'OR',
                    'type' => 'text'
                ),
                (object) array(
                    'column' => 'no_jalan',
                    'value' => $keyword,
                    'relational' => 'LIKE',
                    'logical' => 'OR',
                    'type' => 'text'
                ),
                (object) array(
                    'column' => 'toption_list.option_code',
                    'value' => 'kepemilikan_opt',
                    'relational' => '=',
                    'logical' => 'AND',
                    'type' => 'text'
                )
            ),
            'sort' => 'toption_list.code ASC, no_jalan ASC'
        );
        
        $content = $this->LoadSearch($param);
        return $content;
    }
    
    function JalanForm(){
        $form = array(
            array(
                'label'     => 'Nomor Jalan',
                'name'      => 'no_jalan',
                'id'        => 'no_jalan',
                'type'      => 'text',
                'options'   => array(),
                'required'  => true,
                'unique'    => true
            ),
            array(
                'label'     => 'Nama Jalan',
                'name'      => 'nama_jalan',
                'id'        => 'nama_jalan',
                'type'      => 'text',
                'options'   => array(),
                'required'  => true,
                'unique'    => true
            ),
            array(
                'label'     => 'Status Kepemilikan',
                'name'      => 'kepemilikan',
                'id'        => 'kepemilikan',
                'type'      => 'select',
                'options'   => $this->Option('kepemilikan_opt'),
                'required'  => true,
                'unique'    => false
            ),
            array(
                'label'     => 'Lebar Rata-Rata',
                'name'      => 'lebar',
                'id'        => 'lebar',
                'type'      => 'text',
                'options'   => array(),
                'required'  => false,
                'unique'    => false
            ),
            array(
                'label'     => 'Video',
                'name'      => 'video_path',
                'id'        => 'video_path',
                'type'      => 'video',
                'options'   => array(),
                'required'  => 0,
                'unique'    => 0
            ),
            array(
                'label'     => 'Tanggal Video',
                'name'      => 'video_date',
                'id'        => 'video_date',
                'type'      => 'date',
                'options'   => array(),
                'required'  => false,
                'unique'    => false
            ),
            array(
                'label'     => 'Dokumen Survei (PDF)',
                'name'      => 'survei_dokumen_path',
                'id'        => 'survei_dokumen_path',
                'type'      => 'document',
                'options'   => array(),
                'required'  => 0,
                'unique'    => 0
            ),
            array(
                'label'     => 'Tanggal Survei',
                'name'      => 'survei_date',
                'id'        => 'survei_date',
                'type'      => 'date',
                'options'   => array(),
                'required'  => false,
                'unique'    => false
            )
        );
        
        return $form;
    }
    
    function LoadJalanForm(){
        $param = [];
        $param = array(
            'method' => 'jalan',
            'class' => get_class($this),
            'form' => $this->JalanForm()
        );
        
        $content = $this->LoadForm($param);
        return $content;
    }
    
    function JalanDetail(){
        $content = $this->Detail('tjalan');
        return $content;
    }
    
    function SubmitJalan(){
        $param = [];
        $param = array(
            'method' => 'jalan',
            'class' => get_class($this),
            'form' => $this->JalanForm(),
            'data' => $_POST,
            'table' => 'tjalan',
            'name' => 'nama_jalan'
        );
        
        $content = $this->Submit($param);
        $result = json_decode($content);
        $id = $result->id;
        if($id > 0){
            $data = $_POST;
			$temp_dir = DOC_ROOT."upload/temp/";
			$video_dir = DOC_ROOT."upload/jalan/video/";
			$dokumen_dir = DOC_ROOT."upload/jalan/dokumen/";
			if($data['video_path'] != ''){
				$video_arr = array_reverse(explode(".",$data['video_path']));
				$video_ext = $video_arr[0];
				$video_name = "video_".$id.".".$video_ext;
				@copy($temp_dir.$data['video_path'], $video_dir.$video_name);
			}
            if($data['survei_dokumen_path'] != ''){
				$survei_dokumen_arr = array_reverse(explode(".",$data['survei_dokumen_path']));
				$survei_dokumen_ext = $survei_dokumen_arr[0];
				$survei_dokumen_name = "survei_dokumen_".$id.".".$survei_dokumen_ext;
				@copy($temp_dir.$data['survei_dokumen_path'], $dokumen_dir.$survei_dokumen_name);
			}
        }
        
        return $content;
    }
    
    function DeleteJalan(){
        $param = [];
        $param = array(
            'method' => 'jalan',
            'class' => get_class($this),
            'table' => 'tjalan',
            'name' => 'nama_jalan'
        );
        
        $content = $this->Delete($param);
        return $content;
    }
    /*END JALAN*/
    
    /*START KOORDINAT*/
    function LoadKoordinat(){
        $param = [];
        $param = array(
            'method' => 'koordinat',
            'class' => get_class($this)
        );
        
        $form = $this->GenerateForm($this->DetailForm());
        
        $obj = $this->GetObject($param);
        $this->smarty->assign($_GET);
        $this->smarty->assign('title',title("{$obj->title} - LIST"));
        $this->smarty->assign('form', $form);
        $content = $this->smarty->fetch("{$obj->folder}/TPL_Load{$obj->file}.php");
        return $content;
    }
    
    function KoordinatJalan(){
        foreach($_REQUEST as $key=>$val){
            $$key = $val;
        }
        
        $sql = "SELECT tjalan.*, tkoordinat_jalan.segmentasi as segmentasi FROM tjalan
            LEFT JOIN tkoordinat_jalan ON tjalan.no_jalan = tkoordinat_jalan.no_jalan
            WHERE tjalan.id = {$id}
        ";
        $detail = $this->db->GetRow($sql);
        return json_encode($detail);
    }
    
    function DetailForm(){
        $form = array(
            array(
                'label'     => 'Nomor Jalan',
                'name'      => 'no_jalan',
                'id'        => 'no_jalan',
                'type'      => 'static',
                'options'   => array(),
                'required'  => 0,
                'unique'    => 0
            ),
            array(
                'label'     => 'Nama Jalan',
                'name'      => 'nama_jalan',
                'id'        => 'nama_jalan',
                'type'      => 'static',
                'options'   => array(),
                'required'  => 0,
                'unique'    => 0
            ),
            array(
                'label'     => 'Upload Koordinat<br>(KML)',
                'name'      => 'upload_koordinat',
                'id'        => 'upload_koordinat',
                'type'      => 'coordinate',
                'options'   => array(),
                'required'  => 0,
                'unique'    => 0
            ),
            array(
                'label'     => 'Segmentasi (m)',
                'name'      => 'segmentasi',
                'id'        => 'segmentasi',
                'type'      => 'text',
                'options'   => array(),
                'required'  => 0,
                'unique'    => 0
            ),
        );
        
        return $form;
    }
    
    function GetCoordinateFromFile(){
        $filedir = DOC_ROOT."upload/temp/";
        $filename = $_REQUEST['filename'];
        $filepath = $filedir.$filename;
        
        $source = $_REQUEST['source'];
        $ext = strtolower(pathinfo($filepath, PATHINFO_EXTENSION));
        $xmlfile = file_get_contents($filepath);
        $xmlfile = str_replace("gx:", "", $xmlfile);
        $ob= simplexml_load_string($xmlfile);
        
        $data = [];
        switch($source){
            case 'ArcGIS':                
                $coord = explode(' ', ltrim(rtrim(GetStringBetween($xmlfile, '<coordinates>', '</coordinates>'))));
                foreach($coord as $key=>$value){
                    list($longitude, $latitude, $altitude) = explode(",", $value);
                    $data[$key]['latitude'] = trim($latitude);
                    $data[$key]['longitude'] = trim($longitude);
                }
                break;
            case 'Tracker':
                $coord = json_decode(json_encode($ob->Document->Placemark->MultiTrack->Track->coord), true);
                foreach($coord as $key=>$value){
                    list($longitude, $latitude, $altitude) = explode(" ", $value);
                    $data[$key]['latitude'] = $latitude;
                    $data[$key]['longitude'] = $longitude;
                }
                break;
        }
        
        return json_encode($data);
    }
    
    function AssignCoordinate(){
        foreach($_REQUEST as $key=>$val){
            $$key = $val;
        }
        
        for($i = count($coordsegment)-1; $i >= 0; $i--){
            $new = array(array($coordsegment[$i][0], $coordsegment[$i][1], 1));
            array_splice($coord, $coordsegment[$i][2]+1, 0, $new);
        }
        
        $data = [];
        $n = 1;
        foreach($coord as $idx=>$row){
            $data[$idx]['latitude'] = number_format($row[0], 8);
            $data[$idx]['longitude'] = number_format($row[1], 8);
            $data[$idx]['lebar'] = "";
            $data[$idx]['perkerasan'] = "";
            $data[$idx]['kondisi'] = "";
            $data[$idx]['segment'] = ($row[2] > 0) ? $n++ : 0;
            $data[$idx]['iri'] = "";
        }
        if(count($coordsegment) == 0){
            $_SESSION['coordinate_ori'] = $data;
        }
        $_SESSION['coordinate'] = $data;
    }
    
    function LoadKoordinatSearch(){
        foreach($_REQUEST as $key=>$value){
            $$key = $value;
        }
        
        switch($is_new){
            case 1:
                /*Get Data from Session*/
                list($list, $pager) = $this->paginate2($_SESSION['coordinate'], 10);
                
                $page = ($_GET['page'] > 0) ? $_GET['page'] : 1;
                break;
            default:
                /*Get Data from Database*/
                $sql = "SELECT * FROM tdetail_jalan LEFT JOIN tjalan ON tjalan.no_jalan = tdetail_jalan.no_jalan WHERE tjalan.id = '{$id}' ORDER BY no_detail ASC";
                $detail_jalan = $this->db->GetAll($sql);
                $m = 0;
                $n = 0;
                $coordinate = [];
                $coordinate_ori = [];
                foreach($detail_jalan as $idx=>$row){
                    $obj = (object)$row;
                    foreach(explode(" ", $obj->koordinat_final) as $key=>$val){
                        $coord = [];
                        list($latitude, $longitude, $lebar, $iri) = explode(",", $val);
                        $coord['latitude'] = $latitude;
                        $coord['longitude'] = $longitude;
                        $coord['perkerasan'] = ($key == 0) ? $obj->perkerasan : 0;
                        $coord['kondisi'] = ($key == 0) ? $obj->kondisi : 0;
                        $coord['segment'] = ($key == 0) ? $obj->segment : 0;
                        $coord['lebar'] = $lebar;
                        $coord['iri'] = $iri;
                        
                        switch($key){
                            case 0:
                                $coordinate[$n++] = $coord;
                                break;
                            default :
                                $coordinate[$n++] = $coord;
                                $coordinate_ori[$m++] = $coord;
                        }
                    }
                }
                $_SESSION['coordinate'] = $coordinate;
                $_SESSION['coordinate_ori'] = $coordinate_ori;
                
                list($list, $pager) = $this->paginate2($_SESSION['coordinate'], 10);
                $page = ($_GET['page'] > 0) ? $_GET['page'] : 1;
        }
        
        $this->smarty->assign('list', $list);
        $this->smarty->assign('pager', $pager);
        $this->smarty->assign('page', $page);
        $this->smarty->assign('perkerasan_opt', $this->Option('perkerasan_opt'));
        $this->smarty->assign('kondisi_opt', $this->Option('kondisi_opt'));
        $content = $this->smarty->fetch('Jalan/TPL_LoadKoordinatSearch.php');
        return $content;
    }
    
    function SubmitKoordinat(){
        foreach($_POST as $key=>$value){
            $$key = $value;
        }
        
        /*Get Old Street Coordinate ID*/
        $sql = "SELECT GROUP_CONCAT(id) from tkoordinat_jalan WHERE no_jalan = '{$no_jalan}'";
        $old_street_coord = $this->db->GetOne($sql);
        
        /*Get Old Street Detail ID*/
        $sql = "SELECT GROUP_CONCAT(id) from tdetail_jalan WHERE no_jalan = '{$no_jalan}'";
        $old_street_detail = $this->db->GetOne($sql);
        
        /*Create Data per Segment and Custom*/
        $m = 1;
        $detail = [];
        $detail_coord = [];
        $detail_coord_final = [];
        $coord_ori = [];
        $coord_final = [];
        foreach($_SESSION['coordinate'] as $idx=>$row){
            $obj = (object) $row;
            if($idx == 0){
                $detail[$m] = $row;
                $detail_coord[$m][] = "{$obj->latitude},{$obj->longitude}";
                $detail_coord_final[$m][] = "{$obj->latitude},{$obj->longitude},{$obj->lebar},{$obj->iri}";
                $m++;
            }
            else{
                if($obj->perkerasan > 0 || $obj->kondisi || $obj->segment){
                    $detail_coord[$m-1][] = "{$obj->latitude},{$obj->longitude}";
                    $detail[$m] = $row;
                    $detail_coord[$m][] = "{$obj->latitude},{$obj->longitude}";
                    $detail_coord_final[$m][] = "{$obj->latitude},{$obj->longitude},{$obj->lebar},{$obj->iri}";
                    $m++;
                }
                else{
                    $detail_coord[$m-1][] = "{$obj->latitude},{$obj->longitude}";
                    $detail_coord_final[$m-1][] = "{$obj->latitude},{$obj->longitude},{$obj->lebar},{$obj->iri}";
                }
            }
            
            if($obj->segment == 0){
                $coord_ori[] = "{$obj->latitude},{$obj->longitude}";
            }
            $coord_final[] = "{$obj->latitude},{$obj->longitude}";
        }
        
        /*Save Street Coordinate*/
        $koordinat_awal = implode(" ", $coord_ori);
        $koordinat_final = implode(" ", $coord_final);
        $sql = "INSERT INTO tkoordinat_jalan SET
            no_jalan = {$no_jalan},
            segmentasi = {$segmentasi},
            koordinat_awal = '{$koordinat_awal}',
            koordinat_final = '{$koordinat_final}',
            update_dt = NOW(),
            login_id = {$this->login_id},
            remote_ip = '{$this->remote_ip}'
        ";
        $rs = $this->db->Execute($sql);
//        echo $sql;
        
        /*Save Street Detail*/
        $query_arr = [];
        foreach($detail as $no_detail=>$row){
            unset($row['lebar']);
            unset($row['iri']);
            unset($row['mykey']);
            $detail_koordinat = implode(" ", $detail_coord[$no_detail]);
            $detail_koordinat_final = implode(" ", $detail_coord_final[$no_detail]);
            
            foreach($row as $key=>$val){
                $row[$key] = (double)$val;
            }
            $query_arr[] = "('{$no_jalan}', {$no_detail}, '" . implode("', '", $row) . "', '{$detail_koordinat}', '{$detail_koordinat_final}', NOW(), {$this->login_id}, '{$this->remote_ip}')";
        }
        $values = implode(", ", $query_arr);
        $sql = "INSERT INTO tdetail_jalan
            (no_jalan, no_detail, latitude, longitude, perkerasan, kondisi, segment, koordinat, koordinat_final, update_dt, login_id, remote_ip)
            VALUES
            {$values}
        ";
//        echo $sql;
        $rs = $this->db->Execute($sql);
        
        /*Send Return Info*/
        $tag = "Ubah";
        if($rs){
			$this->sys_msg['info'][] = $tag." Koordinat Jalan [{$nama_jalan}] Success.";
			$this->WriteSysLog("Jalan","{$tag} Koordinat Jalan id [{$no_jalan}] name [{$nama_jalan}] Success.");
            
            /*Delete Old Street Coordinate*/
            $sql = "DELETE FROM tkoordinat_jalan WHERE no_jalan = '{$no_jalan}' AND id IN ({$old_street_coord})";
            $this->db->Execute($sql);

            /*Delete Old Street Detail*/
            $sql = "DELETE FROM tdetail_jalan WHERE no_jalan = '{$no_jalan}' AND id IN ({$old_street_detail})";
            $this->db->Execute($sql);
		}
		else{
			$this->sys_msg['error'][] = $tag." Koordinat Jalan Failed.";
            
		}
        
        $msg = processSysMsg();
		$result = array();
		
		$result['id'] = $no_jalan;
		$result['msg'] = $msg;		
		return json_encode($result);
    }
    /*END KOORDINAT*/
    
    /*START KOORDINAT INDIVIDUAL*/
    function LoadKoordinatForm(){
        $param = [];
        $param = array(
            'method' => 'koordinat',
            'class' => get_class($this),
            'form' => $this->KoordinatForm()
        );
        
        $content = $this->LoadForm($param);
        return $content;
    }
    
    function KoordinatForm(){
        $form = array(
            array(
                'label'     => 'Latitude',
                'name'      => 'latitude',
                'id'        => 'latitude',
                'type'      => 'text',
                'options'   => array(),
                'required'  => true,
                'unique'    => false
            ),
            array(
                'label'     => 'Longitude',
                'name'      => 'longitude',
                'id'        => 'longitude',
                'type'      => 'text',
                'options'   => array(),
                'required'  => true,
                'unique'    => false
            ),
            array(
                'label'     => 'Lebar (m)',
                'name'      => 'lebar',
                'id'        => 'lebar',
                'type'      => 'text',
                'options'   => array(),
                'required'  => false,
                'unique'    => false
            ),
            array(
                'label'     => 'Perkerasan',
                'name'      => 'perkerasan',
                'id'        => 'perkerasan',
                'type'      => 'select',
                'options'   => $this->Option('perkerasan_opt'),
                'required'  => false,
                'unique'    => false
            ),
            array(
                'label'     => 'Kondisi',
                'name'      => 'kondisi',
                'id'        => 'kondisi',
                'type'      => 'select',
                'options'   => $this->Option('kondisi_opt'),
                'required'  => false,
                'unique'    => false
            ),
            array(
                'label'     => 'Segment',
                'name'      => 'segment',
                'id'        => 'segment',
                'type'      => 'text',
                'options'   => array(),
                'required'  => false,
                'unique'    => false
            ),
            array(
                'label'     => 'Iri',
                'name'      => 'iri',
                'id'        => 'iri',
                'type'      => 'text',
                'options'   => array(),
                'required'  => false,
                'unique'    => false
            )
        );
        
        return $form;
    }
    
    function KoordinatDetail(){
        foreach($_REQUEST as $key=>$value){
            $$key = $value;
        }
        
        $detail = $_SESSION['coordinate'][$mykey];
        $detail['mykey'] = $mykey;
        return json_encode($detail);
    }
    
    function ModifyKoordinat(){
        $param = [];
        $param = array(
            'method' => 'koordinat',
            'class' => get_class($this),
            'form' => $this->KoordinatForm(),
            'data' => $_POST
        );
        
        $obj = $this->GetObject($param);
        $error = $this->ValidateForm($obj->data, $obj->form, '');
        
        $id = 0;
		if(!$error){
            $data = [];
            foreach($obj->data as $key=>$val){
                $data[$key] = $val;
            }

            $tag = "Ubah";
            $_SESSION['coordinate'][$obj->data['mykey']] = $data;
            $this->sys_msg['info'][] = $tag." Koordinat Success.";
			$id = $obj->data['mykey'];
		}
		else{
			$this->sys_msg['error'] = $error;
		}
		
		$msg = processSysMsg();
		$result = array();
		
		$result['id'] = $id;
		$result['msg'] = $msg;
		
		return json_encode($result);
    }
    /*END KOORDINAT INDIVIDUAL*/
}
?>