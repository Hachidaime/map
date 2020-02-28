<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<link rel="shortcut icon" href="favicon.ico">
<title>{$PROJECT_NAME}</title>
<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<link href="assets/css/reset.css" rel="stylesheet">
<meta name="viewport" content="user-scalable=no, initial-scale=1.0, maximum-scale=1.0, width=device-width">
<link href="assets/libs/colorpicker/css/evol-colorpicker.css" rel="stylesheet" type="text/css">
<link href="assets/libs/jquery-upload-file/css/uploadfile.css?t={$t}" rel="stylesheet" type="text/css"/>
<link href="assets/css/w3.css" rel="stylesheet">
<link href="assets/css/w3-theme.css" rel="stylesheet">
<link href="assets/css/w3-colors-highway.css" rel="stylesheet">
<link href="assets/css/all.css" rel="stylesheet">
<link href="assets/css/custom.css?t={$t}" rel="stylesheet">
<link href="assets/css/jquery-ui.min.css" rel="stylesheet">
<link href="assets/css/jquery-ui.theme.css" rel="stylesheet">

<script src="assets/js/jquery.js"></script>
<script src="assets/js/custom.js?t={$t}"></script>
<script src="assets/libs/jquery-upload-file/js/jquery.uploadfile.js?t={$t}"></script>

<script src="http://maps.google.com/maps/api/js?v=3&libraries=geometry&key={$smarty.const.GMAPS_API_KEY}" type="text/javascript"></script>
<script type="text/javascript" src="assets/js/v3_epoly.js"></script>
<script src='https://npmcdn.com/@turf/turf/turf.min.js'></script>
<script src="assets/js/map-font-icons.js"></script>
<!--
-->
</head>
<body class="w3-theme-l4">

<!-- Main Wrapper -->

{$header}
{$navbar}
<!-- Main Content -->
<div class="w3-margin">
    <div class="w3-card">
        <header class="w3-container w3-theme-d5">
            <h4>{$CurrentPage}</h4>
        </header>
        <div class="w3-container w3-border w3-border-theme-d5 w3-theme-l5">
            <div class="w3-margin-top w3-margin-bottom">
            {$content}
            </div>
        </div>      
    </div> 
</div>
<!-- Main Content -->

<!-- Main Wrapper -->

<!-- JavaScript -->
<script src="assets/js/jquery-ui.js"></script>
<script src="assets/libs/colorpicker/js/evol-colorpicker.min.js" type="text/javascript" charset="utf-8"></script>
</body>
</html>