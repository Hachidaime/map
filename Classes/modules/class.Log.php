<?php
class Log extends Front{
    public function __construct(){
		parent::__construct();
		
		//Check user Access
        
        $permission = $this->CheckPermission(get_class($this));
        if($permission === false){
            header('Location: index.php?class=MissingPage&method=LoadForbidden');
        }
	}
    
    function LoadConsoleLog(){
        $param = [];
        $param = array(
            'method' => 'console log',
            'class' => get_class($this)
        );
        
        $content = $this->LoadMain($param);
        return $content;
    }
    
    function LoadConsoleLogSearch(){
        foreach($_REQUEST as $key=>$value){
            $$key = $value;
        }
        
        $param = [];
        $param = array(
            'method' => 'console log',
            'class' => get_class($this),
            'query' => 'SELECT tuser.username, tconsole_log.* FROM tconsole_log JOIN tuser ON tuser.id = tconsole_log.login_id',
            'condition' => (object) array(
                (object) array(
                    'column' => 'tconsole_log.tag',
                    'value' => $keyword,
                    'relational' => 'LIKE',
                    'logical' => 'OR',
                    'type' => 'text'
                ),
                (object) array(
                    'column' => 'tconsole_log.log_message',
                    'value' => $keyword,
                    'relational' => 'LIKE',
                    'logical' => 'OR',
                    'type' => 'text'
                ),
                (object) array(
                    'column' => 'tconsole_log.update_dt',
                    'value' => $date,
                    'relational' => '=',
                    'logical' => 'AND',
                    'type' => 'date'
                )
            ),
            'sort' => 'tconsole_log.update_dt DESC'
        );
        
        $content = $this->LoadSearch($param);
        return $content;
    }
}
?>