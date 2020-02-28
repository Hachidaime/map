<?php
class Blocks extends Front{
	function LoadMainContent(){
        foreach($_GET as $key=>$value){
            $$key = $value;
        }
        
        if($role != ''){
            switch($role){
                case 'login':
                    $class = 'User';
                    $action = 'UserLogin';
                    break;
                case 'logout':
                    $class = 'User';
                    $action = 'UserLogout';
                    break;
                case 'lastactivity':
                    $class = 'Dashboard';
                    $action = 'LoadLastActivity';
                    break;
                case 'uploadfile':
                    $class = 'FileUpload';
                    $action = 'UploadData';
                    break;
                case 'deletefile':
                    $class = 'FileUpload';
                    $action = 'DeleteData';
                    break;
                case 'forbidden':
                    return $this->ForbiddenPage();
                    break;
            }
        }
        else{
            if ($module_id == ''){
                $class = $this->config['default_class'];
                $action = $this->config['default_action'];
            }

            $sql = "SELECT name, TRIM(class_name) as class_name FROM tmodule WHERE id = '{$module_id}'";
            $module = $this->db->GetRow($sql);

            $sql = "SELECT TRIM(function_name) FROM taction WHERE id = '{$action_id}'";
            $functionName = $this->db->GetOne($sql);
            
        }
        $class = ($class) ? $class : $module['name'];
        $className = ($module_id != '') ? $module['class_name'] : "class.{$class}.php";
        
        $methodName = ($action != '') ? $action : $functionName;
        
        $this->smarty->assign('CurrentPage', $class);

        $ajax = (int)$_REQUEST['ajax'];
        $class_file = DOC_ROOT."Classes/modules/{$className}";
        
        if (file_exists($class_file) && is_file($class_file)){
            include_once($class_file);
            eval("\$obj = new $class;");
            $pos = strpos($methodName, "_");
            if (method_exists($obj, $methodName) && $pos !== 0){
                if ($params) $content .= $obj->$methodName($params);
                else $content .= $obj->$methodName();
            }else{
                $content .= $this->MissingPage();
            }
            
            if ($ajax){
                print $content;
                exit;
            }
        }
        else{
            $content = $this->MissingPage();
        }
		return $content;
	}
    
    function LoadHeader(){
        $content = $this->smarty->fetch("Layout/TPL_Header.php");
        return $content;
    }
	
    function LoadNavbar(){
        if($this->user_group_id > 0){
            
            $sql = "SELECT * FROM tpermission WHERE user_group_id = '{$this->user_group_id}'";
            $permission = $this->db->GetAll($sql);

            $system_id = [];
            $module_id = [];
            $action_id = [];
            foreach($permission as $row){
                $system_id[] = $row['system_id'];
                $module_id[] = $row['module_id'];
                $action_id[] = $row['action_id'];
            }

            $system_id = array_unique($system_id);
            $module_id = array_unique($module_id);
            $action_id = array_unique($action_id);

            $system_id_list = implode(",", $system_id);
            $module_id_list = implode(",", $module_id);
            $action_id_list = implode(",", $action_id);

            $sql = "SELECT * FROM tsystem WHERE id IN ({$system_id_list}) ORDER BY sort ASC";
            $system = $this->db->GetAll($sql);
            
            $system_list = [];
            foreach($system as $row){
                $system_list[$row['id']] = $row;
            }

            $sql = "SELECT * FROM tmodule WHERE id IN ({$module_id_list}) AND system_id = '{$_REQUEST[system_id]}' ORDER BY sort ASC";
            $module = $this->db->GetAll($sql);

            $module_list = [];
            foreach($module as $row){
                $module_list[$row['id']] = $row;
            }

            $sql = "SELECT * FROM taction WHERE id IN ({$action_id_list}) ORDER BY sort ASC";
            $action = $this->db->GetAll($sql);

            $action_list = [];
            foreach($action as $row){
                $action_list[$row['module_id']][] = $row;
            }
            
            $this->smarty->assign($_GET);
            $this->smarty->assign('system', $system_list);
            $this->smarty->assign('module', $module_list);
            $this->smarty->assign('action', $action_list);
            $content = $this->smarty->fetch("Layout/TPL_Navbar.php");
        }
        return $content;
    }
    
	function MissingPage(){
		$class_file = DOC_ROOT."Classes/modules/class.MissingPage.php";
		include_once($class_file);
		$MissingPage = new MissingPage;
		$content .= $MissingPage->LoadDefault();
		return $content;
	}
    
    function ForbiddenPage(){
		$class_file = DOC_ROOT."Classes/modules/class.MissingPage.php";
		include_once($class_file);
		$MissingPage = new MissingPage;
		$content .= $MissingPage->LoadForbidden();
		return $content;
	}
}
?>