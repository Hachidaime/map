<?php
function formatSQL($string){
	global $config;
	
	return mysqli_real_escape_string($config['con'], $string);
}

function reformatDate($string){
    return implode("-", array_reverse(explode("/", $string)));
}

function addSpace($string){
    return preg_replace('/(?<!\ )[A-Z]/', ' $0', $string);
}

function operationLog($params, $folder){	
	global $root;
	if($folder != ''){
		$path = $root."logs/".$folder;
		if(!is_dir($path)) mkdir($path);
		
		$currdate = date("Y-m-d");
		$currtime = date("H:i:s");
		
		$str = (is_array($params)) ? print_r(json_encode($params),true) : $params;
		
		$fhandle = fopen($path."/$currdate.log", "a+");
		fwrite($fhandle, "$currtime    ".$str."\n");
		fclose($fhandle);
	}
}

function processSysMsg(){
    global $sys_msg;
	
	$alert_color = array(
		"error" => "red",
		"danger" => "red",
		"warning" => "yellow",
		"info" => "blue",
		"success" => "green"
	);
		
		$result = "";
    if (count($sys_msg))
		{
        foreach ($sys_msg as $msg_type=>$msg)
				{
            $result .= "<div class='w3-panel w3-border w3-border-".$alert_color[$msg_type]." w3-text-highway-".$alert_color[$msg_type]." w3-pale-".$alert_color[$msg_type]." w3-display-container w3-padding-small'>\n";
            $result .= " <span onclick='$(this).parent().remove()'
  class='w3-btn w3-small w3-padding-small w3-display-topright'>&times;</span>";
			$result .= "<p>\n";
            foreach ($msg as $m){
                $result .= "$m<br>\n";
            }
			$result .= "</p>\n";
            $result .= "</div>\n";
        }
    }
    return $result;
}

function formatNum($params){
	return number_format($params,2);
}

function read_csv($csv_file){
	$fp = fopen ("$csv_file","r");

	$rownum = 0;

	while ($data = fgetcsv ($fp, 2000, ",")){
		$num = count($data);
      
		if ($num < 2){
			continue;
		}
		for ($c=0; $c < $num; $c++) {
			$myarray[$rownum][$c] = $data[$c];
		}
		$rownum++;
	}

	return $myarray;
}

function GetOptions($table, $key, $value, $order, $sort = 'ASC'){
    global $db;
    $sql = "SELECT {$key}, {$value} FROM {$table} ORDER BY {$order} {$sort}";
    $list = $db->GetAll($sql);

    $options = [];
    foreach($list as $idx=>$row){
        $options[$row[$key]] = $row[$value];
    }

    return $options;
}

function title($string){
    return "<h4 class=\"w3-center\"><strong><u>{$string}</u></strong></h4>";
}

function encrypt($data, $key = MY_KEY) {
    // Remove the base64 encoding from our key
    $encryption_key = base64_decode($key);
    // Generate an initialization vector
    $iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length('aes-256-cbc'));
    // Encrypt the data using AES 256 encryption in CBC mode using our encryption key and initialization vector.
    $encrypted = openssl_encrypt($data, 'aes-256-cbc', $encryption_key, 0, $iv);
    // The $iv is just as important as the key for decrypting, so save it with our encrypted data using a unique separator (::)
    return base64_encode($encrypted . '::' . $iv);
}
 
function decrypt($data, $key = MY_KEY) {
    // Remove the base64 encoding from our key
    $encryption_key = base64_decode($key);
    // To decrypt, split the encrypted data from our IV - our unique separator used was "::"
    list($encrypted_data, $iv) = explode('::', base64_decode($data), 2);
    return openssl_decrypt($encrypted_data, 'aes-256-cbc', $encryption_key, 0, $iv);
}

function GetStringBetween ($str,$from,$to) {

    $string = substr($str, strpos($str, $from) + strlen($from));

    if (strstr ($string,$to,TRUE) != FALSE) {

        $string = strstr ($string,$to,TRUE);

    }

    return $string;

}
?>