<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<link rel="shortcut icon" href=favicon.ico>
<title>{$PROJECT_NAME}</title>
<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="user-scalable=no, initial-scale=1.0, maximum-scale=1.0, width=device-width">
<link href="assets/css/reset.css" rel="stylesheet">
<link href="assets/css/w3.css" rel="stylesheet">
<link href="assets/css/w3-theme.css" rel="stylesheet">
<link href="assets/css/all.css" rel="stylesheet">
<link href="assets/css/custom.css?t={$t}" rel="stylesheet">
<link href="assets/css/jquery-ui.min.css" rel="stylesheet">
<link href="assets/css/jquery-ui.theme.css" rel="stylesheet">

<script src="assets/js/jquery.js"></script>
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
<script src="assets/js/jquery-ui.js"></script>

<script>
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
</script>
</body>
</html>