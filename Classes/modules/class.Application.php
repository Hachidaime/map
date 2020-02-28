<?php
class Application extends Front{
    public function __construct(){
		parent::__construct();
		
		//Check user Access
        $permission = $this->CheckPermission(get_class($this));
        if($permission === false){
            header('Location: index.php?role=forbidden');
        }
	}
    
    /*START SYSTEM*/
    function LoadSystem(){
        $param = [];
        $param = array(
            'method' => 'system',
            'class' => get_class($this)
        );
        
        $content = $this->LoadMain($param);
        return $content;
    }
    
    function LoadSystemSearch(){
        foreach($_REQUEST as $key=>$value){
            $$key = $value;
        }
        
        $param = [];
        $param = array(
            'method' => 'system',
            'class' => get_class($this),
            'query' => 'SELECT * FROM tsystem',
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
    
    function LoadSystemForm(){
        $param = [];
        $param = array(
            'method' => 'system',
            'class' => get_class($this),
            'form' => $this->SystemForm()
        );
        
        $content = $this->LoadForm($param);
        return $content;
    }
    
    function SystemForm(){
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
            ),
            array(
                'label'     => 'Sort',
                'name'      => 'sort',
                'id'        => 'sort',
                'type'      => 'text',
                'options'   => array(),
                'required'  => true,
                'unique'    => false
            ),
        );
        
        return $form;
    }
    
    function SystemDetail(){
        $content = $this->Detail('tsystem');
        return $content;
    }
    
    function SubmitSystem(){
        $param = [];
        $param = array(
            'method' => 'system',
            'class' => get_class($this),
            'form' => $this->SystemForm(),
            'data' => $_POST,
            'table' => 'tsystem',
            'name' => 'name'
        );
        
        $content = $this->Submit($param);
        return $content;
    }
    
    function DeleteSystem(){
        $param = [];
        $param = array(
            'method' => 'system',
            'class' => get_class($this),
            'table' => 'tsystem',
            'name' => 'name'
        );
        
        $content = $this->Delete($param);
        return $content;
    }
    /*END SYSTEM*/
    
    /*START MODULE*/
    function LoadModule(){
        $param = [];
        $param = array(
            'method' => 'module',
            'class' => get_class($this)
        );
        
        $content = $this->LoadMain($param);
        return $content;
    }
    
    function LoadModuleSearch(){
        foreach($_REQUEST as $key=>$value){
            $$key = $value;
        }
        
        $param = [];
        $param = array(
            'method' => 'module',
            'class' => get_class($this),
            'query' => 'SELECT tsystem.name as system, tmodule.* FROM tmodule LEFT JOIN tsystem ON tsystem.id = tmodule.system_id',
            'condition' => (object) array(
                (object) array(
                    'column' => 'tmodule.name',
                    'value' => $keyword,
                    'relational' => 'LIKE',
                    'logical' => 'AND',
                    'type' => 'text'
                )
            ),
            'sort' => 'tsystem.name ASC, tmodule.name ASC'
        );
        
        $content = $this->LoadSearch($param);
        return $content;
    }
    
    function LoadModuleForm(){
        $param = [];
        $param = array(
            'method' => 'module',
            'class' => get_class($this),
            'form' => $this->ModuleForm()
        );
        
        $content = $this->LoadForm($param);
        return $content;
    }
    
    function ModuleForm(){
        $sql = "SELECT id, name FROM tsystem WHERE id > 0 ORDER BY name ASC";
		$list = $this->db->GetAll($sql);
        
        $system_options = array();
		if(count($list)){
			foreach($list as $idx=>$row){
				$system_options[$row['id']] = $row['name'];
			}
		}
        
        $form = array(
            array(
                'label'     => 'System',
                'name'      => 'system_id',
                'id'        => 'system_id',
                'type'      => 'select',
                'options'   => $system_options,
                'required'  => true,
                'unique'    => false
            ),
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
                'label'     => 'Class Name',
                'name'      => 'class_name',
                'id'        => 'class_name',
                'type'      => 'text',
                'options'   => array(),
                'required'  => true,
                'unique'    => false
            ),
            array(
                'label'     => 'Description',
                'name'      => 'description',
                'id'        => 'description',
                'type'      => 'textarea',
                'options'   => array(),
                'required'  => false,
                'unique'    => false
            ),
            array(
                'label'     => 'Sort',
                'name'      => 'sort',
                'id'        => 'sort',
                'type'      => 'text',
                'options'   => array(),
                'required'  => true,
                'unique'    => false
            ),
        );
        
        return $form;
    }
    
    function ModuleDetail(){
        $content = $this->Detail('tmodule');
        return $content;
    }
    
    function SubmitModule(){
        $param = [];
        $param = array(
            'method' => 'module',
            'class' => get_class($this),
            'form' => $this->ModuleForm(),
            'data' => $_POST,
            'table' => 'tmodule',
            'name' => 'name'
        );
        
        $content = $this->Submit($param);
        return $content;
    }
    
    function DeleteModule(){
        $param = [];
        $param = array(
            'method' => 'module',
            'class' => get_class($this),
            'table' => 'tmodule',
            'name' => 'name'
        );
        
        $content = $this->Delete($param);
        return $content;
    }
    /*END MODULE*/
    
    /*START ACTION*/
    function LoadAction(){
        $param = [];
        $param = array(
            'method' => 'action',
            'class' => get_class($this)
        );
        
        $content = $this->LoadMain($param);
        return $content;
    }
    
    function LoadActionSearch(){
        foreach($_REQUEST as $key=>$value){
            $$key = $value;
        }
        
        $param = [];
        $param = array(
            'method' => 'action',
            'class' => get_class($this),
            'query' => 'SELECT tsystem.name as system, tmodule.name as module, taction.* FROM taction LEFT JOIN tmodule ON tmodule.id = taction.module_id LEFT JOIN tsystem ON tsystem.id = tmodule.system_id',
            'condition' => (object) array(
                (object) array(
                    'column' => 'taction.name',
                    'value' => $keyword,
                    'relational' => 'LIKE',
                    'logical' => 'AND',
                    'type' => 'text'
                )
            ),
            'sort' => 'tsystem.name ASC, tmodule.name ASC, taction.name ASC'
        );
        
        $content = $this->LoadSearch($param);
        return $content;
    }
    
    function LoadActionForm(){
        $param = [];
        $param = array(
            'method' => 'action',
            'class' => get_class($this),
            'form' => $this->ActionForm()
        );
        
        $content = $this->LoadForm($param);
        return $content;
    }
    
    function ActionForm(){
        $sql = "SELECT tsystem. name as system, tmodule.id, tmodule.name FROM tmodule
            LEFT JOIN tsystem ON tsystem.id = tmodule.system_id
            WHERE tmodule.id > 0
            ORDER BY tsystem.name ASC, tmodule.name
        ";
		$list = $this->db->GetAll($sql);
        
        $module_options = array();
		if(count($list)){
			foreach($list as $idx=>$row){
				$module_options[$row['id']] = $row['system'] . " -> " . $row['name'];
			}
		}
        
        $form = array(
            array(
                'label'     => 'Module',
                'name'      => 'module_id',
                'id'        => 'module_id',
                'type'      => 'select',
                'options'   => $module_options,
                'required'  => true,
                'unique'    => false
            ),
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
                'label'     => 'Function Name',
                'name'      => 'function_name',
                'id'        => 'function_name',
                'type'      => 'text',
                'options'   => array(),
                'required'  => true,
                'unique'    => false
            ),
            array(
                'label'     => 'Description',
                'name'      => 'description',
                'id'        => 'description',
                'type'      => 'textarea',
                'options'   => array(),
                'required'  => false,
                'unique'    => false
            ),
            array(
                'label'     => 'Sort',
                'name'      => 'sort',
                'id'        => 'sort',
                'type'      => 'text',
                'options'   => array(),
                'required'  => true,
                'unique'    => false
            ),
        );
        
        return $form;
    }
    
    function ActionDetail(){
        $content = $this->Detail('taction');
        return $content;
    }
    
    function SubmitAction(){
        $param = [];
        $param = array(
            'method' => 'action',
            'class' => get_class($this),
            'form' => $this->ActionForm(),
            'data' => $_POST,
            'table' => 'taction',
            'name' => 'name'
        );
        
        $content = $this->Submit($param);
        return $content;
    }
    
    function DeleteAction(){
        $param = [];
        $param = array(
            'method' => 'action',
            'class' => get_class($this),
            'table' => 'taction',
            'name' => 'name'
        );
        
        $content = $this->Delete($param);
        return $content;
    }
    /*END ACTION*/
    
}