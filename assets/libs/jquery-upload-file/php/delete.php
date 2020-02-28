<?php
$output_dir = "../../../../upload/temp/";
print_r($_POST);
if(isset($_POST["op"]) && $_POST["op"] == "delete" && isset($_POST['name']))
{
	$fileName =$_POST['name'];
	$fileName=str_replace("..",".",$fileName); //required. if somebody is trying parent folder files	
	$fileName=str_replace("[","",$fileName); //required. if somebody is trying parent folder files	
	$fileName=str_replace("]","",$fileName); //required. if somebody is trying parent folder files	
	$fileName=str_replace("\"","",$fileName); //required. if somebody is trying parent folder files	
	$filePath = $output_dir. $fileName;
		echo $filePath."<br>";
	if (file_exists($filePath)) 
	{
        unlink($filePath);
    }
	echo "Deleted File ".$fileName."<br>";
}

?>