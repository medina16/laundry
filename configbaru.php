<?php
$db=pg_connect('host=localhost dbname=proyekbasdat user=postgres password=\'16 Joolee 2003\'');
if( !$db ){
    die("Gagal terhubung dengan database: " . pg_connect_error());
}
?>
