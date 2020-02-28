<?php
class Setup extends Front{
    public function __construct(){
		parent::__construct();
		
		//Check user Access
        $permission = $this->CheckPermission(get_class($this));
        if($permission === false){
            header('Location: index.php?role=forbidden');
        }
	}
    
    /*START SETUP*/
    function LoadSetup(){
        $param = [];
        $param = array(
            'method' => 'setup',
            'class' => get_class($this),
            'form' => $this->SetupForm()
        );
        
        $obj = $this->GetObject($param);
        $form = $this->GenerateForm($obj->form);
        
        $this->smarty->assign($_GET);
        $this->smarty->assign('title',title("{$obj->title}"));
        $this->smarty->assign('form', $form);
        $content = $this->smarty->fetch("{$obj->folder}/TPL_Load{$obj->file}.php");
        return $content;
    }
    
    function SetupForm(){
        $form = array(
            array(
                'label'     => 'Jalan Provinsi (px)',
                'name'      => 'kepemilikan_1',
                'id'        => 'kepemilikan_1',
                'type'      => 'text',
                'options'   => array(),
                'required'  => true,
                'unique'    => false
            ),
            array(
                'label'     => 'Jalan Kota/Kabupaten (px)',
                'name'      => 'kepemilikan_2',
                'id'        => 'kepemilikan_2',
                'type'      => 'text',
                'options'   => array(),
                'required'  => true,
                'unique'    => false
            ),
            array(
                'label'     => 'Jalan Poros Desa (px)',
                'name'      => 'kepemilikan_3',
                'id'        => 'kepemilikan_3',
                'type'      => 'text',
                'options'   => array(),
                'required'  => true,
                'unique'    => false
            ),
            array(
                'label'     => 'Baik',
                'name'      => 'kondisi_1',
                'id'        => 'kondisi_1',
                'type'      => 'color',
                'options'   => array(),
                'required'  => true,
                'unique'    => false
            ),
            array(
                'label'     => 'Sedang',
                'name'      => 'kondisi_2',
                'id'        => 'kondisi_2',
                'type'      => 'color',
                'options'   => array(),
                'required'  => true,
                'unique'    => false
            ),
            array(
                'label'     => 'Rusak Ringan',
                'name'      => 'kondisi_3',
                'id'        => 'kondisi_3',
                'type'      => 'color',
                'options'   => array(),
                'required'  => true,
                'unique'    => false
            ),
            array(
                'label'     => 'Rusak Berat',
                'name'      => 'kondisi_4',
                'id'        => 'kondisi_4',
                'type'      => 'color',
                'options'   => array(),
                'required'  => true,
                'unique'    => false
            ),
        );
        
        return $form;
    }
    
    function SetupDetail(){
        $sql = "SELECT * FROM tsetup";
        $setup = $this->db->GetAll($sql);
        
        return json_encode($setup);
    }
    
    function SubmitSetup(){
        $param = [];
        $param = array(
            'method' => 'setup',
            'class' => get_class($this),
            'form' => $this->SetupForm(),
            'data' => $_POST,
            'table' => 'tsetup',
            'name' => 'name'
        );
        
        $obj = $this->GetObject($param);
        $error = $this->ValidateForm($obj->data, $obj->form, $obj->table);
        $id = 0;
		if(!$error){
			$this->ProcessSetup($obj);
		}
		else{
			$this->sys_msg['error'] = $error;
		}
		
		$msg = processSysMsg();
		$result = array();
		
		$result['msg'] = $msg;
		
		return json_encode($result);
    }
    
    function ProcessSetup($obj){
        $label = [];
        foreach($obj->form as $idx=>$row){
            $form = (object)$row;
            $label[$form->name] = $form->label;
        }
//        print "<pre>";
//        print_r($label);
//        print "</pre>";
        foreach($obj->data as $key=>$value){
            list($category, $item) = explode("_", $key);
            $value = trim($value);
            
            $cond = [];
            $cond[] = "category = '{$category}'";
            $cond[] = "item = '{$item}'";
            $cond[] = "value = '{$value}'";
            $cond[] = "update_dt = NOW()";
            $cond[] = "login_id = '{$this->login_id}'";
            $cond[] = "remote_ip = '{$this->remote_ip}'";
            
            $input = "";
            $input = implode(", ", $cond);
            
            $sql = "SELECT COUNT(*) FROM tsetup WHERE category = '{$category}' AND item = '{$item}' AND value = '{$value}'";
            $count = $this->db->GetOne($sql);
//            echo $sql . "; <br>";
            
            if($count <= 0){
                $sql = str_replace($sql, " AND value = '{$value}'", "");
                $count = $this->db->GetOne($sql);
//                echo $sql . "; <br>";
                if($count > 0){
                    $sql = "UPDATE tsetup SET {$input}";
                }
                else{
                    $sql = "INSERT INTO tsetup SET {$input}";
                }
//                echo $sql . ";<br>";
                $result = $this->db->Execute($sql);
                
                $tag = "Ubah";
                if($result){
                    $this->sys_msg['info'][] = $tag." {$obj->file} [{$label[$key]}] Success.";
                    $this->WriteSysLog("{$obj->folder}","{$tag} {$obj->file} [{$label[$key]}] Success.");
                }
                else{
                    $this->sys_msg['error'][] = $tag." {$obj->file} [{$label[$key]}] Failed.";
                }
            }
            else
                continue;
        }
        
    }
    /*END SETUP*/
}
?>