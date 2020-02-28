<?php
/*NAMA PROJECT*/
define("PROJECT_NAME", "Console System");

/*KONFIGURASI DATABASE*/
define("SQL_HOST", "localhost");
define("SQL_USER", "root");
define("SQL_PASSWORD", "123456");
define("SQL_DB", "map_db");

/*API KEY GMAPS*/
define('GMAPS_API_KEY', "AIzaSyA8gO6vcB-3GE83HfRJOtxT3Dd6AtPsCkY");

/*KEY ENKRIPSI*/
define('MY_KEY', 'OMMASTUNONOSIDHAM');

/*KONEKSI KE DATABASE*/
$config['con'] = mysqli_connect(SQL_HOST,SQL_USER,SQL_PASSWORD,SQL_DB);

/*DEFAULT MODULS & ACTION*/
$config['default_class'] = 'Dashboard';
$config['default_action'] = 'LoadDefault';

/*KONFIGURASI PAGINASI*/
define('PAGER_SCROLL_PAGE', 5); // Jumlah halaman yang ditampilkan
define('PAGER_PER_PAGE_CONSOLE', 20); // Jumlah baris per halaman

/*FORMAT TANGGAL DAN WAKTU DENGAN SMARTY*/
define('SMARTY_DATETIME_FORMAT', '%d/%m/%Y %I:%M%p'); // d/m/Y H:i p
define('SMARTY_DATE_FORMAT', '%d/%m/%Y'); // d/m/Y
define('SMARTY_TIME_FORMAT', '%l:%M%p'); // H:i p

/*DEFAULT KOTA DAN PROVINSI*/
define('CITY', 'PURBALINGGA');
define('PROVINCE', 'JAWA TENGAH');

/*DEFAULT TITIK TENGAH MAP*/
define('DEFAULT_LATITUDE', -7.3879046);
define('DEFAULT_LONGITUDE', 109.3633768);
?>
