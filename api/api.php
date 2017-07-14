<?php

/**
 * @author 紫旭网络
 * @copyright 2017
 */

header("Content-type: text/html; charset=utf-8");
require_once "../inc/config.php";

if(isset($_GET["xuehao"])){
    $xuehao = addslashes($_GET["xuehao"]);
}

$sql_select = "SELECT status FROM userverify WHERE xuehao='$xuehao'";
$select_result = mysqli_query($conn,$sql_select);
$num = mysqli_num_rows($select_result);
$result_array = mysqli_fetch_assoc($select_result);
if($num >= 1){
	echo $result_array["status"];
}
else{
	echo "error";
}

?>