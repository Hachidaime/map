<?php /* Smarty version 3.1.27, created on 2020-01-20 17:53:00
         compiled from "/var/www/html/map/templates/User/TPL_Login.php" */ ?>
<?php
/*%%SmartyHeaderCode:3864943725e25868c409550_21348634%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ec69b984a3df2c6dffdc7d14d724166ccafd0a4f' => 
    array (
      0 => '/var/www/html/map/templates/User/TPL_Login.php',
      1 => 1578463238,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3864943725e25868c409550_21348634',
  'variables' => 
  array (
    'PROJECT_NAME' => 0,
    't' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_5e25868c418434_41559378',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_5e25868c418434_41559378')) {
function content_5e25868c418434_41559378 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '3864943725e25868c409550_21348634';
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<link rel="shortcut icon" href=favicon.ico>
<title><?php echo $_smarty_tpl->tpl_vars['PROJECT_NAME']->value;?>
</title>
<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="user-scalable=no, initial-scale=1.0, maximum-scale=1.0, width=device-width">
<link href="assets/css/reset.css" rel="stylesheet">
<link href="assets/css/w3.css" rel="stylesheet">
<link href="assets/css/w3-theme.css" rel="stylesheet">
<link href="assets/css/all.css" rel="stylesheet">
<link href="assets/css/custom.css?t=<?php echo $_smarty_tpl->tpl_vars['t']->value;?>
" rel="stylesheet">
<link href="assets/css/jquery-ui.min.css" rel="stylesheet">
<link href="assets/css/jquery-ui.theme.css" rel="stylesheet">

<?php echo '<script'; ?>
 src="assets/js/jquery.js"><?php echo '</script'; ?>
>
</head>
<body>

<!-- Main Wrapper -->
<div class="login-wrapper w3-display-container">
    <div class="w3-card-4 login-container w3-theme-l5">
        <header class="w3-container w3-theme"><h3>Console</h3></header>
        <div class="w3-container">
        <form id="myForm">
        <br>
        <div class="w3-row w3-section">
            <div class="w3-col icon-container"><i class="w3-xxlarge fa fa-user w3-text-theme-d4"></i></div>
            <div class="w3-rest">
                <input class="w3-input w3-theme-l5 w3-border-bottom w3-border-theme w3-padding-small login-input" name="user_name" type="text" placeholder="Nama Pengguna">
            </div>
        </div>

        <div class="w3-row w3-section">
            <div class="w3-col icon-container"><i class="w3-xxlarge fa fa-lock w3-text-theme-d4"></i></div>
            <div class="w3-rest">
                <input class="w3-input w3-theme-l5 w3-border-bottom w3-border-theme w3-padding-small login-input" name="user_password" type="password" placeholder="Kata Sandi">
            </div>
        </div>

        <div class="w3-row w3-center">
            <button type="button" class="w3-button w3-hover-theme-d2 w3-white w3-text-theme-d2 w3-border-theme-d2 w3-border w3-ripple w3-round-xxlarge w3-padding-small btn-login" onclick="CheckLogin();">Login</button>
        </div>
        </form>   
        </div>
    </div>
</div>
<!-- Main Wrapper -->

<!-- JavaScript -->
<?php echo '<script'; ?>
 src="assets/js/jquery-ui.js"><?php echo '</script'; ?>
>

<?php echo '<script'; ?>
>
$(document).ready(function(){
    $(".login-input").keypress(function(e) {
        if(e.which == 13) {
            CheckLogin();
        }
    });
});
    
function CheckLogin(){
	var url = 'ajax.php?role=login';
	var data = $('#myForm').serialize();
	
//	console.log(url);
//	console.log(data);
	$.ajax({
		url : url,
		type : "POST",
		dataType : "json",
		data : data,
		success : function(reply){
//			console.log(reply);
//			console.log(reply.error);
			if(reply.error > 0){
				var msg = '';
				$.each(reply.message, function(key,value) {
					msg += value;
				});
				// $('.error-message').html(msg);
				alert(msg);
			}
			else{
				$('.error-message').html('');
				// alert(reply.message);
				window.location.href = "index.php";
			}
		}
	});
}
<?php echo '</script'; ?>
>
</body>
</html><?php }
}
?>