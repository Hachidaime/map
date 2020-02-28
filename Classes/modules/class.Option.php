<?php
class Option extends Front{
    public function __construct(){
		parent::__construct();
		
		//Check user Access
        $permission = $this->CheckPermission(get_class($this));
        if($permission === false){
            header('Location: index.php?role=forbidden');
        }
	}
    
    /*START OPTION*/
    function LoadOption(){
        $param = [];
        $param = array(
            'method' => 'option',
            'class' => get_class($this)
        );
        
        $content = $this->LoadMain($param);
        return $content;
    }
    
    function LoadOptionSearch(){
        foreach($_REQUEST as $key=>$value){
            $$key = $value;
        }
        
        $param = [];
        $param = array(
            'method' => 'option',
            'class' => get_class($this),
            'query' => 'SELECT * FROM toption',
            'condition' => (object) array(
                (object) array(
                    'column' => 'name',
                    'value' => $keyword,
                    'relational' => 'LIKE',
                    'logical' => 'OR',
                    'type' => 'text'
                ),
                (object) array(
                    'column' => 'code',
                    'value' => $keyword,
                    'relational' => 'LIKE',
                    'logical' => 'OR',
                    'type' => 'text'
                )
            ),
            'sort' => 'code ASC'
        );
        
        $obj = $this->GetObject($param);
        $filter = $this->GetFilter($obj->condition);
        
        $sql = "{$obj->query} {$filter} ORDER BY {$obj->sort}";
        list($list, $pager) = $this->Paginate($sql);
        
        $sql = "SELECT id, option_code, code, name, status FROM toption_list ORDER BY code ASC";
        $opt_list = $this->db->GetAll($sql);
        
        $option_list = [];
        foreach($opt_list as $idx=>$row){
            $option_list[$row['option_code']][$row['code']] = $row;
        }
        
        $this->smarty->assign('list', $list);
        $this->smarty->assign('option_list', $option_list);
        $this->smarty->assign('pager', $pager);
        $content = $this->smarty->fetch("{$obj->folder}/TPL_Load{$obj->file}Search.php");
        return $content;
    }
    
    function OptionForm(){
        $form = array(
            array(
                'label'     => 'Code',
                'name'      => 'code',
                'id'        => 'code',
                'type'      => 'text',
                'options'   => array(),
                'required'  => true,
                'unique'    => true
            ),
            array(
                'label'     => 'Name',
                'name'      => 'name',
                'id'        => 'name',
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
            )
        );
        
        return $form;
    }
    
    function LoadOptionForm(){
        $param = [];
        $param = array(
            'method' => 'option',
            'class' => get_class($this),
            'form' => $this->OptionForm()
        );
        
        $content = $this->LoadForm($param);
        return $content;
    }
    
    function OptionDetail(){
        $content = $this->Detail('toption');
        return $content;
    }
    
    function SubmitOption(){
        $param = [];
        $param = array(
            'method' => 'option',
            'class' => get_class($this),
            'form' => $this->OptionForm(),
            'data' => $_POST,
            'table' => 'toption',
        );
        
        $content = $this->Submit($param);
        return $content;
    }
    
    function DeleteOption(){
        $param = [];
        $param = array(
            'method' => 'option',
            'class' => get_class($this),
            'table' => 'toption',
        );
        
        $content = $this->Delete($param);
        
//        $this->DeleteOptionList();
        return $content;
    }
    /*END OPTION*/
    
    /*START OPTION LIST*/
    function OptionListForm(){
        $option_opt = $this->GetOptions('toption', 'code', 'name', 'name', $sort = 'ASC');
        
        $form = array(
            array(
                'label'     => 'Option',
                'name'      => 'option_code',
                'id'        => 'option_code',
                'type'      => 'select',
                'options'   => $option_opt,
                'required'  => true,
                'unique'    => false
            ),
            array(
                'label'     => 'Code',
                'name'      => 'code',
                'id'        => 'code',
                'type'      => 'text',
                'options'   => array(),
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
                'unique'    => false
            ),
            array(
                'label'     => 'Status',
                'name'      => 'status',
                'id'        => 'status',
                'type'      => 'select',
                'options'   => array('1' => 'ACTIVE', '2' => 'INACTIVE'),
                'required'  => true,
                'unique'    => false
            )
        );
        
        return $form;
    }
    
    function LoadOptionListForm(){
        $param = [];
        $param = array(
            'method' => 'option list',
            'class' => get_class($this),
            'form' => $this->OptionListForm()
        );
        
        $content = $this->LoadForm($param);
        return $content;
    }
    
    function OptionListDetail(){
        $content = $this->Detail('toption_list');
        return $content;
    }
    
    function SubmitOptionList(){
        $param = [];
        $param = array(
            'method' => 'option list',
            'class' => get_class($this),
            'form' => $this->OptionListForm(),
            'data' => $_POST,
            'table' => 'toption_list',
        );
        
        $content = $this->Submit($param);
        return $content;
    }
    /*END OPTION LIST*/
}
?>