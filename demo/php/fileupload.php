<?php
include ('../../../flashback/db/dbcon.php');

$target_path = "uploads/";

$tmp_name = $_FILES['fileToUpload']['tmp_name'];
$size = $_FILES['fileToUpload']['size'];
$name = $_FILES['fileToUpload']['name'];
$name2 = time().'_'.$_GET['filename'];

$target_file = $target_path.$name;


 

$complete =$target_path.$name2;
$com = fopen($complete, "ab");
error_log($target_path);

    $in = fopen($tmp_name, "rb");
    if ( $in ) {
        while ( $buff = fread( $in, 1048576 ) ) {
            fwrite($com, $buff);
        }   
    }
    fclose($in);

fclose($com);

$query="insert into uploads(file)
			 values('$name2')";
			mysql_select_db($database_dbconfig, $dbconfig);
			$result = mysql_query($query, $dbconfig) or die(mysql_error());
?>