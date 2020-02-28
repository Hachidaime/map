<?php
class MissingPage extends Front{
	function LoadDefault(){
		$this->smarty->assign('PageTitle', "Oops!");
		$content = $this->smarty->fetch("MissingPage/TPL_LoadDefault.php");		
		return $content;
	}
	
	function LoadForbidden(){
		$this->smarty->assign('PageTitle', "Oops!");
		$content = $this->smarty->fetch("MissingPage/TPL_LoadForbidden.php");
		return $content;
	}
}
?>