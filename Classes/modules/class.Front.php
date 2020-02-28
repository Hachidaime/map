<?php
class Front{
    
    var $db;
    var $smarty;
    var $config;
   
    function Front(){
        global $db, $smarty, $config, $sys_msg;
        $this->db = &$db;
        $this->smarty = &$smarty;
        $this->config = &$config;
        $this->sys_msg = &$sys_msg;
		$this->remote_ip = $_SERVER['REMOTE_ADDR'];
		$this->login_id = $_SESSION['USER']['id'];
		$this->user_group_id = $_SESSION['USER']['user_group_id'];
    }
	
	function GetBlank($tb_name){
		$sql = "SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE table_name = '".$tb_name."' AND table_schema = '".SQL_DB."'";
		$columns = $this->db->GetAll($sql);
		
		foreach($columns as $key=>$val){
			$blank[$val['COLUMN_NAME']] = '';
		}
		
		return $blank;
	}
	
	function GetDetail($tb_name, $id){
		$sql = "SELECT * FROM ".$tb_name." WHERE id = '".$id."'";
		$detail = $this->db->GetRow($sql);
		return $detail;
	}
	
	function CheckExist($tb_name, $field, $value, $id){
		$sql = "SELECT COUNT(*) FROM ".$tb_name." WHERE id != '".$id."' AND ".$field." = '".$value."'";
		$result = $this->db->GetOne($sql);
		return $result;
	}
	
    function Paginate($sql, $custom = NULL, $per_page = PAGER_PER_PAGE_CONSOLE){
        $string = $sql;
        preg_match('/SELECT (.*?) FROM/', $string, $display);
        $string = str_replace($display[1], "COUNT(*)", $string);
        $count = $this->db->GetOne($string);
        
        $page           = ($_GET['page']) ? $_GET['page'] : 1;
        
        $start = ($page*$per_page)-$per_page;
        
        $total_page = ceil( $count / $per_page );
        
        $list = $this->db->GetAll($sql . " LIMIT {$start},{$per_page}");
//        echo $sql . " LIMIT {$start},{$per_page}";
        
        $previous = ($page > 1) ? $page - 1 : '';
        $next = ($page < $total_page) ? $page + 1 : '';
        
        if($total_page > PAGER_SCROLL_PAGE){
            if(PAGER_SCROLL_PAGE > 3){
                if((PAGER_SCROLL_PAGE - $page) == 1){
                    $snum = 1 + (PAGER_SCROLL_PAGE - $page);
                    $enum = PAGER_SCROLL_PAGE + (PAGER_SCROLL_PAGE - $page);
                }
                else{
                    if($page == $total_page){
                        $snum = $total_page - (PAGER_SCROLL_PAGE - 1);
                        $enum = $total_page;
                    }
                    else{
                        if(($page - PAGER_SCROLL_PAGE) >= 0){
                            $snum = $page + 1 - (PAGER_SCROLL_PAGE - 1);
                            $enum = $page + 1;
                        }
                        else{
                            $snum = 1;
                            $enum = PAGER_SCROLL_PAGE;
                        }
                    }
                }
            }
        }
        else{
            $snum = 1;
            $enum = $total_page;
        }
        
        $this->smarty->assign('previous', $previous);
        $this->smarty->assign('next', $next);
        $this->smarty->assign('snum', $snum);
        $this->smarty->assign('enum', $enum);
        $this->smarty->assign('page', $page);
        $this->smarty->assign('total_page', $total_page);
        $this->smarty->assign('custom', $custom);
        $content = $this->smarty->fetch("Layout/TPL_Paginate.php");
        
        return array($list, $content);
    }
    
    function Paginate2($array, $per_page = PAGER_PER_PAGE_CONSOLE){
        $count = count($array);
        
        $page = ($_GET['page']) ? $_GET['page'] : 1;
        
        $start = ($page*$per_page)-$per_page;
        $end = $start + $per_page;
        $end = ($end <= $count) ? $end : $count;
        
        $total_page = ceil( $count / $per_page );
        
        for($n=$start; $n<$end; $n++){
            $list[$n] = $array[$n];
        }
        
        $previous = ($page > 1) ? $page - 1 : '';
        $next = ($page < $total_page) ? $page + 1 : '';
        
        if($total_page > PAGER_SCROLL_PAGE){
            if(PAGER_SCROLL_PAGE > 3){
                if((PAGER_SCROLL_PAGE - $page) == 1){
                    $snum = 1 + (PAGER_SCROLL_PAGE - $page);
                    $enum = PAGER_SCROLL_PAGE + (PAGER_SCROLL_PAGE - $page);
                }
                else{
                    if($page == $total_page){
                        $snum = $total_page - (PAGER_SCROLL_PAGE - 1);
                        $enum = $total_page;
                    }
                    else{
                        if(($page - PAGER_SCROLL_PAGE) >= 0){
                            $snum = $page + 1 - (PAGER_SCROLL_PAGE - 1);
                            $enum = $page + 1;
                        }
                        else{
                            $snum = 1;
                            $enum = PAGER_SCROLL_PAGE;
                        }
                    }
                }
            }
        }
        else{
            $snum = 1;
            $enum = $total_page;
        }
        
        $this->smarty->assign('previous', $previous);
        $this->smarty->assign('next', $next);
        $this->smarty->assign('snum', $snum);
        $this->smarty->assign('enum', $enum);
        $this->smarty->assign('page', $page);
        $this->smarty->assign('total_page', $total_page);
        $content = $this->smarty->fetch("Layout/TPL_Paginate.php");
        
        return array($list, $content);
    }
    
    function GenerateForm($data){
        $this->smarty->assign($_GET);
        $this->smarty->assign('data', $data);
        $content = $this->smarty->fetch('Layout/TPL_Form.php');
        
        return $content;
    }
    
     function ValidateForm($data, $form, $table){
        foreach($form as $idx=>$row){
            if($row['required'] && ($data[$row['name']] == '' || $data[$row['name']] == '0')){
                switch($row['type']){
                    case 'text':
                        $error[] = "<b>" . $row['label'] . "</b> tidak boleh kosong.\n";
                        break;
                    case 'select':
                        $error[] = "<b>" . $row['label'] . "</b> harus dipilih.\n";
                        break;
                }
            }
            else{
                if($row['unique']){
                    $count = $this->CheckExist($table, $row['name'], trim($data[$row['name']]), $data['id']);
                    if($count > 0){
                        $error[] = "<b>" . $row['label'] . "</b> sudah ada di database.";
                    }
                }
            }
        }
        
		return $error;
    }
    
    function GetOptions($table, $key, $value, $order, $sort = 'ASC'){
        $sql = "SELECT {$key}, {$value} FROM {$table} ORDER BY {$order} {$sort}";
        $list = $this->db->GetAll($sql);
        
        $options = [];
        foreach($list as $idx=>$row){
            $options[$row[$key]] = $row[$value];
        }
        
        return $options;
    }
    
    function CheckPermission($class){
        $login_id = $this->login_id;
        
        $sql = "SELECT DISTINCT tpermission.module_id, tmodule.name 
            FROM tpermission
            LEFT JOIN tuser ON tuser.user_group_id = tpermission.user_group_id
            LEFT JOIN tmodule ON tmodule.id = tpermission.module_id
            WHERE tuser.id = '{$login_id}'
        ";
        $permission = $this->db->GetAll($sql);
        
        $module = [];
        foreach($permission as $row){
            $module[$row['module_id']] = $row['name'];
        }
        
        if(in_array($class, $module)){
            return true;
        }
        else{
            return false;
        }
    }
    
    function WriteSysLog($tag = "", $log_message = ""){
        $sql = "INSERT INTO tconsole_log SET
            tag = '{$tag}',
            log_message = '{$log_message}',
            update_dt = NOW(),
            login_id = '" . $_SESSION['USER']['id'] . "',
            remote_ip = '{$this->remote_ip}'
        ";
//        echo $sql;
        $this->db->Execute($sql);
    }
    
    function GetCondition($data, $form){
        $cond = [];
        foreach($form as $idx=>$row){
            $value = (!empty($data[$row['name']])) ? formatSQL($data[$row['name']]) : "NULL";
            
            if($value != "NULL"){
                switch($row['type']){
                    case 'text':
                        $cond[] = $row['name'] . " = '{$value}'";
                        break;
                    case 'password':
                        $cond[] = $row['name'] . " = '" . encrypt($value) . "'";
                        break;
                    case 'textarea':
                        $cond[] = $row['name'] . " = '{$value}'";
                        break;
                    case 'select':
                        $cond[] = $row['name'] . " = '{$value}'";
                        break;
                    case 'date';
                        $cond[] = $row['name'] . " = '" . reformatDate(str_replace("'", "", $value)) . "'";
                        break;
                }
            }
            else{
                if(!in_array($row['type'], array('video', 'image', 'coordinate', 'document')))
                    $cond[] = $row['name'] . " = {$value}";
            }
        }
		$cond[] = "login_id = '".$this->login_id."'";
		$cond[] = "remote_ip = '".$this->remote_ip."'";
		$cond[] = "update_dt = NOW()";
		
        return $cond;        
    }
//    /*
    function GetObject($param){
        $obj = (object) $param;
        $obj->title = strtoupper($obj->method);
        $obj->folder = ucfirst($obj->class);
        $obj->file = str_replace(' ', '', ucwords($obj->method));
        
        return $obj;
    }
    
    function LoadMain($param){
        $obj = $this->GetObject($param);
        $this->smarty->assign($_GET);
        $this->smarty->assign('title',title("{$obj->title}"));
        $content = $this->smarty->fetch("{$obj->folder}/TPL_Load{$obj->file}.php");
        return $content;
    }
    
    function LoadSearch($param){
        $obj = $this->GetObject($param);
        $filter = $this->GetFilter($obj->condition);
        
        $sql = "{$obj->query} {$filter} ORDER BY {$obj->sort}";
        list($list, $pager) = $this->Paginate($sql);
        
        $this->smarty->assign('list', $list);
        $this->smarty->assign('pager', $pager);
        $content = $this->smarty->fetch("{$obj->folder}/TPL_Load{$obj->file}Search.php");
        return $content;
    }
    
    function GetFilter($obj){
        $cond   = [];
        $Or     = [];
        $And    = [];
        $filter = "";
        
        if(count($obj) > 0){
            foreach($obj as $idx=>$var){
                if($var->value != ''){
                    $value = "";
                    switch($var->type){
                        case 'date':
                            $column = "DATE({$var->column})";
                            $var->value = implode("-", array_reverse(explode("/", $var->value)));
                            break;
                        default:
                            $column = $var->column;
                    }
                    
                    switch($var->relational){
                        case '=':
                            $value = "= '{$var->value}'";
                            break;
                        case 'LIKE':
                            $value = "LIKE '%{$var->value}%'";
                            break;
                    }


                    switch($var->logical){
                        case 'OR':
                            if($var->value != ''){
                                $Or[] = "{$column} {$value}";
                            }
                            break;
                        case 'AND':
                            if($var->value != ''){
                                $And[] = "{$column} {$value}";
                            }
                            break;
                    }
                }
            }
            
            if(count($Or) > 0){
                $And[] = "(" . implode(" OR ", $Or) . ")";
            }
            
            if(count($And) > 0){
                $cond[] = implode(" AND ", $And);
            }
            
            if(count($cond) > 0){
                $filter = "WHERE " . implode(" AND ", $cond);
            }
        }
        return $filter;
    }
    
    function LoadForm($param){
        $obj = $this->GetObject($param);
        $form = $this->GenerateForm($obj->form);
        $this->smarty->assign($_GET);
        $this->smarty->assign('title',title("{$obj->title} - FORM"));
        $this->smarty->assign('form', $form);
        $content = $this->smarty->fetch("{$obj->folder}/TPL_Load{$obj->file}Form.php");
		return $content;
    }
    
    function Detail($table){
        $id = $_REQUEST['id'];
        $detail = $this->GetDetail($table, $id);
        return json_encode($detail);
    }
    
    function Submit($param){
        $obj = $this->GetObject($param);
        $error = $this->ValidateForm($obj->data, $obj->form, $obj->table);
        $id = 0;
		if(!$error){
			$id = $this->Process($obj);
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
    
    function Process($obj){
        $id = (int)$obj->data['id'];
        $cond = $this->GetCondition($obj->data, $obj->form);
        
        $input = implode(", ", $cond);
        
		if($id > 0){
			$sql = "UPDATE {$obj->table} SET
				$input
				WHERE id = '{$id}'
			";
			
			$tag = "Change";
			$result = $this->db->Execute($sql);
		}
		else{
			$sql = "INSERT INTO {$obj->table} SET
				$input
			";
			$tag = "Add";
			$result = $this->db->Execute($sql);
			$id = $this->db->Insert_id();
		}
        if($result){
			$this->sys_msg['info'][] = $tag." {$obj->file} [{$obj->data[$obj->name]}] Success.";
			$this->WriteSysLog("{$obj->folder}","{$tag} {$obj->file} id [{$id}] name [{$obj->data[$obj->name]}] Success.");
			return $id;
		}
		else{
			$this->sys_msg['error'][] = $tag." {$obj->file} Failed.";
		}
    }
    
    function Delete($param){
        $obj = $this->GetObject($param);
        $result = [];
        $id = $_REQUEST['id'];
        $detail = $this->GetDetail($obj->table, $id);
        
        $sql = "DELETE FROM {$obj->table} WHERE id = '{$id}'";
        $rs = $this->db->Execute($sql);
        
        if($rs){
            $this->WriteSysLog("{$obj->folder}","Delete {$obj->file} id [{$id}] name [{$detail['name']}] Success.");
        }
        
        $result['msg'] = ($rs) ? "Delete {$obj->file} name [{$detail[$obj->name]}] Success." : "Delete {$obj->file} name [{$detail[$obj->name]}] Failed.";
        $result['status'] = ($rs) ? '200' : '0';
        
        return json_encode($result);
    }
//    */
    
    function Option($code){
        $sql = "SELECT * FROM toption_list WHERE option_code = '{$code}' AND status = 1 ORDER BY code ASC";
        $list = $this->db->GetAll($sql);
        
        $options = [];
        foreach($list as $idx=>$row){
            $options[$row['code']] = $row['name'];
        }
        
        return $options;
    }
    
    function Setup($category){
        $sql = "SELECT * FROM tsetup WHERE category = '{$category}' ORDER BY item ASC";
        $list = $this->db->GetAll($sql);
        
        $setup = [];
        foreach($list as $idx=>$row){
            $setup[$row['item']] = $row['value'];
        }
        
        return $setup;
    }
}
?>