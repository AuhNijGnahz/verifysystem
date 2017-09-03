<?php

/**
 * @author 紫旭网络
 * @copyright 2017
 */

header("Content-type: text/html; charset=utf-8");
ini_set("error_reporting","E_ALL & ~E_NOTICE");
require_once("../inc/config.php");
session_start();
    if(checklogin()==true){

            $status = addslashes(_POST("status"));
            $action = addslashes(_POST("action"));
            $acid = addslashes(_POST("acid"));
        if($action == "search"&&$status !=""){
            if($status != "0"){
                $sql_select = "SELECT * FROM userverify WHERE status='$status'";
            }
            else{
                $sql_select = "SELECT * FROM userverify";
            }
            $result_select = mysqli_query($conn,$sql_select);
            $num = mysqli_num_rows($result_select);
            $html = "<table>
                <th>UID</th><th>姓名</th><th>学号</th><th>专业</th><th>状态</th><th>操作</th>";
            for($i=0;$i<$num;$i++){
                $result_assoc = mysqli_fetch_assoc($result_select);
                $uid = $result_assoc['uid'];
                $name = $result_assoc['name'];
                $xuehao = $result_assoc['xuehao'];
                $major =$result_assoc['major'];
                $status = $result_assoc['status'];
                switch($status){
                    case "1":
                        $status = "已通过";
                        $action = "<input type='button' id='denied' data-acid='$uid' value='驳回' />";
                        break;
                    case "2":
                        $status = "待审核";
                        $action = "<input type='button' id='grant' data-acid='$uid' value='通过' /><span>或</span><input type='button' id='denied' data-acid='$uid' value='驳回' />";
                        break;
                    case "3":
                        $status = "已驳回";
                        $action = "<input type='button' id='grant' data-acid='$uid' value='通过' />";
                }
                $html =$html."<tr><td>$uid</td><td>$name</td><td>$xuehao</td><td>$major</td><td>$status</td><td>$action</td></tr>";
            }
            echo $html;
        }
        
        if($action == "grant" && $acid != ""){
            $sql_update = "UPDATE userverify SET status=1 WHERE uid='$acid'";
            $update_result = mysqli_query($conn,$sql_update);
            if($update_result){
                $result_json = json_encode(array("status"=>"success"));
                echo $result_json;
            }
            else{
                $result_json = json_encode(array("status"=>"error"));
                echo $result_json;
            }
        }
        if($action == "denied" && $acid != ""){
            $sql_update = "UPDATE userverify SET status=3 WHERE uid='$acid'";
            $update_result = mysqli_query($conn,$sql_update);
            if($update_result){
                $result_json = json_encode(array("status"=>"success"));
                echo $result_json;
            }
            else{
                $result_json = json_encode(array("status"=>"error"));
                echo $result_json;
            }
        }
    }
        
        
    
    
    function checklogin(){
        if(empty($_SESSION["username"])){
            echo "你无权访问此页面";
            return false;
        }
        else{
            return true;
        }
    }

    function _get($str){ 
		$val = !empty($_GET[$str]) ? $_GET[$str] : null; 
		return $val; 
	}
	function _post($str){ 
		$val = !empty($_POST[$str]) ? $_POST[$str] : null; 
		return $val; 
	} 
?>
