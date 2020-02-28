<?php
class User extends Front{
    public function __construct(){
		parent::__construct();
		
		//Check user Access
        if($_REQUEST['role'] != 'login' || $_REQUEST['role'] != 'logout'){
            
        }
		else{
            if($this->login_id > 0){
                $permission = $_SESSION['USER']['permission'];

                if($permission != 1){
                    header('Location: index.php?class=MissingPage&method=LoadForbidden');
                }
            }
		}
	}

    /* START USER */
	function LoadUser(){
        $param = [];
        $param = array(
            'method' => 'user',
            'class' => get_class($this)
        );
        
        $content = $this->LoadMain($param);
        return $content;
	}
	
    function LoadUserSearch(){
        foreach($_REQUEST as $key=>$value){
            $$key = $value;
        }
        
        $param = [];
        $param = array(
            'method' => 'user',
            'class' => get_class($this),
            'query' => 'SELECT tuser_group.name as usergroup, tuser.* FROM tuser LEFT JOIN tuser_group ON tuser_group.id = tuser.user_group_id',
            'condition' => (object) array(
                (object) array(
                    'column' => 'tuser.username',
                    'value' => $keyword,
                    'relational' => 'LIKE',
                    'logical' => 'AND',
                    'type' => 'text'
                )
            ),
            'sort' => 'tuser.username ASC'
        );
        
        $content = $this->LoadSearch($param);
        return $content;
    }
    
    function UserForm(){
        $sql = "SELECT id, name FROM tuser_group
            WHERE id > 0
            ORDER BY name ASC
        ";
		$list = $this->db->GetAll($sql);
        
        $group_options = array();
		if(count($list)){
			foreach($list as $idx=>$row){
				$group_options[$row['id']] = $row['name'];
			}
		}
        
        $form = array(
            array(
                'label'     => 'Username',
                'name'      => 'username',
                'id'        => 'username',
                'type'      => 'text',
                'options'   => array(),
                'required'  => true,
                'unique'    => true
            ),
            array(
                'label'     => 'Password',
                'name'      => 'password',
                'id'        => 'password',
                'type'      => 'password',
                'options'   => array(),
                'required'  => true,
                'unique'    => false
            ),
            array(
                'label'     => 'User Group',
                'name'      => 'user_group_id',
                'id'        => 'user_group_id',
                'type'      => 'select',
                'options'   => $group_options,
                'required'  => true,
                'unique'    => false
            ),
        );
        
        return $form;
    }
    
	function LoadUserForm(){
		$param = [];
        $param = array(
            'method' => 'user',
            'class' => get_class($this),
            'form' => $this->UserForm()
        );
        
        $content = $this->LoadForm($param);
        return $content;
	}
    
    function UserDetail(){
        $content = $this->Detail('tuser');
        return $content;
    }
	
	function SubmitUser(){
        $param = [];
        $param = array(
            'method' => 'user',
            'class' => get_class($this),
            'form' => $this->UserForm(),
            'data' => $_POST,
            'table' => 'tuser',
        );
        
        $content = $this->Submit($param);
        return $content;
    }
    
    function DeleteUser(){
        $param = [];
        $param = array(
            'method' => 'user',
            'class' => get_class($this),
            'table' => 'tuser',
        );
        
        $content = $this->Delete($param);
        return $content;
    }
	/* END USER */
	
    /* START USER GROUP */
	function LoadUserGroup(){
        $param = [];
        $param = array(
            'method' => 'user group',
            'class' => get_class($this)
        );
        
        $content = $this->LoadMain($param);
        return $content;
	}
	
    function LoadUserGroupSearch(){
        foreach($_REQUEST as $key=>$value){
            $$key = $value;
        }
        
        $param = [];
        $param = array(
            'method' => 'user group',
            'class' => get_class($this),
            'query' => 'SELECT * FROM tuser_group',
            'condition' => (object) array(
                (object) array(
                    'column' => 'name',
                    'value' => $keyword,
                    'relational' => 'LIKE',
                    'logical' => 'AND',
                    'type' => 'text'
                )
            ),
            'sort' => 'name ASC'
        );
        
        $content = $this->LoadSearch($param);
        return $content;
    }
    
    function UserGroupForm(){
        $form = array(
            array(
                'label'     => 'Name',
                'name'      => 'name',
                'id'        => 'name',
                'type'      => 'text',
                'options'   => array(),
                'required'  => true,
                'unique'    => true
            ),
            array(
                'label'     => 'Description',
                'name'      => 'description',
                'id'        => 'description',
                'type'      => 'textarea',
                'options'   => array(),
                'required'  => false,
                'unique'    => false
            )
        );
        
        return $form;
    }
    
	function LoadUserGroupForm(){
        $sql = "SELECT
            tsystem.id as system_id,
            tsystem.name as system,
            tmodule.id as module_id,
            tmodule.name as module,
            taction.id as action_id,
            taction.name as action
            FROM taction
            JOIN tmodule ON tmodule.id = taction.module_id
            JOIN tsystem ON tsystem.id = tmodule.system_id
            ORDER BY
            system ASC,
            module ASC,
            action ASC
        ";
        $data = $this->db->GetAll($sql);
        
        $permission_options = [];
        foreach($data as $idx=>$row){
            $permission_options[$row['system_id']]['name'] = $row['system'];
            $permission_options[$row['system_id']]['module'][$row['module_id']]['name'] = $row['module'];
            $permission_options[$row['system_id']]['module'][$row['module_id']]['action'][$row['action_id']]['name'] = $row['action'];
        }
        
		$form = $this->GenerateForm($this->UserGroupForm());
        
        $this->smarty->assign($_GET);
        $this->smarty->assign('title', title("USER GROUP - FORM"));
        $this->smarty->assign('form', $form);
        $this->smarty->assign('permission_options', $permission_options);
        $content = $this->smarty->fetch("User/TPL_LoadUserGroupForm.php");
		return $content;
	}
    
    function UserGroupDetail(){
        $id = $_REQUEST['id'];
        $detail = $this->GetDetail('tuser_group', $id);
        
        $sql = "SELECT action_id FROM tpermission WHERE user_group_id = '{$id}'";
        $allow = $this->db->GetAll($sql);
//        print "<pre>";
//        print_r($action);
//        print "</pre>";
        
        $action_allow = [];
        if(count($allow) > 0){
            foreach($allow as $idx=>$row){
                $action_allow[] = $row['action_id'];
            }
        }
        $detail['action_allow'] = $action_allow;
        
        $sql = "SELECT id FROM taction WHERE id NOT IN (" . implode(",", $action_allow) . ")";
        $deny = $this->db->GetAll($sql);
        
        $action_deny = [];
        if(count($deny) > 0){
            foreach($deny as $idx=>$row){
                $action_deny[] = $row['id'];
            }
        }
        $detail['action_deny'] = $action_deny;
        
        return json_encode($detail);
    }
	
	function SubmitUserGroup(){
        $error = $this->ValidateForm($_POST, $this->UserGroupForm(), 'tuser_group');
		$id = 0;
		if(!$error){
			$id = $this->ProcessUserGroup($_POST);
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
    
    function ProcessUserGroup($data){
        $id = (int)$data['id'];
        $cond = $this->GetCondition($data, $this->UserGroupForm());
        
        $input = implode(", ", $cond);
        
		if($id > 0){
			$sql = "UPDATE tuser_group SET
				$input
				WHERE id = '".$data['id']."'
			";
			
			$tag = "Change";
			$result = $this->db->Execute($sql);
		}
		else{
			$sql = "INSERT INTO tuser_group SET
				$input
			";
			$tag = "Add";
			$result = $this->db->Execute($sql);
			$id = $this->db->Insert_id();
		}
        
        if($result){
            if(array_key_exists('permission', $data)){
                $sql = "DELETE FROM tpermission WHERE user_group_id = '{$id}'";
                $this->db->Execute($sql);
                
                $values = "";
                $permission_input = [];
                foreach($data['permission'] as $key=>$value){
                    if($value == 1){
                        $permission_input[] = "({$key}, {$id})";
                    }
                }
                $values = implode(",", $permission_input);
                
                $sql = "INSERT INTO tpermission
                    (system_id, module_id, action_id, user_group_id)
                    VALUES
                    {$values}
                ";
                $this->db->Execute($sql);
            }
        }
        
        if($result){
			$this->sys_msg['info'][] = $tag." User Group [{$data['name']}] Success.";
			$this->WriteSysLog("User","{$tag} User Group id [{$id}] name [{$data['name']}] Success.");
			return $id;
		}
		else{
			$this->sys_msg['error'][] = $tag." User Failed.";
		}
        
    }
    
    function DeleteUserGroup(){
        $param = [];
        $param = array(
            'method' => 'user group',
            'class' => get_class($this),
            'table' => 'tuser_group',
        );
        
        $content = $this->Delete($param);
        return $content;
    }
    /* END USER GROUP */
	
    /* START LOGIN */
	function UserLogin(){
		if($_POST['user_name'] == ''){
			$error[] = "<b>Username</b> tidak boleh kosong.\n";
		}
		
		if($_POST['user_password'] == ''){
			$error[] = "<b>Password</b> tidak boleh kosong.\n";
		}
		
		if(!$error){
			$sql = "SELECT * FROM tuser WHERE username = '".formatSQL($_POST['user_name'])."'";
//			 echo $sql;
			$detail = $this->db->GetRow($sql);
//			 print_r($detail);
			$count = count($detail);
//            echo $count."<br>";
			if($count > 0){
                if(decrypt($detail['password']) == $_POST['user_password']){
                    session_start();
                    $_SESSION['USER'] = $detail;
                    $this->WriteSysLog("Login", 'Login into System.');
                }
                else{
				    $error[] = "[Username] and [Password] not match.";
                }
			}
			else{
				$error[] = "[Username] not found.";
				
			}
		}
		
		$success = "Login Success!";
		$result = array();
		$result['error'] = ($error) ? 1 : 0;
		$result['message'] = ($error) ? $error : $success;
		$result['message'] = is_array($result['message']) ? implode("|", $result['message']) : $result['message'];
		$result['message'] = strip_tags($result['message']);
		$result['message'] = explode("|", $result['message']);
		
		$result['session'] = $_SESSION;
		
//        print "<pre>";
//		print_r($result);
//        print "</pre>";
//		exit;
		echo json_encode($result);
	}
	
	function UserLogout(){
        $this->WriteSysLog("Logout", 'Logout from System.');
        $this->destroy();
		$result['result'] = 1;
		return json_encode($result);
	}
    
    function destroy(){
        session_destroy();
    }
    /* END LOGIN */
}

?>