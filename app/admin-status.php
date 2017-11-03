<?php
header("Content-type: text/html; charset=utf-8");

require_once("../inc/config.php");
session_start();
//if(checklogin()==true){
	$sta = addslashes(_post("status"));
	$act = addslashes(_post("action"));
	if($act=="changest"){
		echo changeVstatus($conn,$sta);
	}
	else if($act=="getstatus"){
		echo Getverifystatus($conn);
	}
//}
	function Getverifystatus($conn){
		$sql_select="SELECT verifystatus FROM admin_status WHERE id=1";
        $result_select = mysqli_query($conn,$sql_select);
		$num = mysqli_num_rows($result_select);
		$result_assoc = mysqli_fetch_assoc($result_select);
		$status=$result_assoc["verifystatus"];
		$result_json = json_encode(array("status"=>$status));
		return $result_json;
	}
	function changeVstatus($conn,$newstatus){
		$sql_update="UPDATE admin_status SET verifystatus=$newstatus WHERE id=1";
		$update_result = mysqli_query($conn,$sql_update);
		if($update_result){
			$result_json=json_encode(array('status'=>'success'));
			return $result_json;
		}
		else{
			$result_json=json_encode(array('status'=>'error'));
			return $result_json;
		}
	}
    // function checklogin(){
        // if(empty($_SESSION["username"])){
            // echo "你无权访问此页面";
            // return false;
        // }
        // else{
            // return true;
        // }
    // }

    function _get($str){ 
		$val = !empty($_GET[$str]) ? $_GET[$str] : null; 
		return $val; 
	}
	function _post($str){ 
		$val = !empty($_POST[$str]) ? $_POST[$str] : null; 
		return $val; 
	} 
	
	
?>