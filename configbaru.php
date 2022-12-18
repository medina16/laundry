<?php
$db=pg_connect('host=localhost dbname=infolaundry user=postgres password=\'masukin password di sini\'');
if( !$db ){
    die("Gagal terhubung dengan database: " . pg_connect_error());
}
?>
