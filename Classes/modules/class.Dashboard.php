<?php
class Dashboard extends Front{
    function LoadDefault(){
        $this->smarty->assign($_GET);
        $content = $this->smarty->fetch("Dashboard/TPL_LoadDefault.php");
        return $content;
    }
    
    function LoadLastActivity(){
        $sql = "SELECT * FROM tconsole_log WHERE login_id = '{$this->login_id}' AND tag NOT IN ('Login', 'Logout') ORDER BY update_dt DESC LIMIT 5";
        $list = $this->db->GetAll($sql);
        
        $this->smarty->assign('title', title("Last Activity"));
        $this->smarty->assign('list', $list);
        $content = $this->smarty->fetch('Dashboard/TPL_LoadLastActivity.php');
        return $content;
    }
}
?>