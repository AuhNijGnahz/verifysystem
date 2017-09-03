<?php

/**
 * @author 紫旭网络
 * @copyright 2017
*/
    header("Content-type: text/html; charset=utf-8");
    require_once('./inc/config.php');

    //获取信息

		$name       = addslashes(_POST("name"));
		$xuehao     = addslashes(_POST("xuehao"));
		$major      = addslashes(_POST("major"));
		$action 	= addslashes(_POST("action"));//1-只读取数据；2-提交数据
		if($name == ""&&$xuehao == ""&&major == ""&&$action == ""){
			$return_json = json_encode(array("status"=>"error"));//重新提交失败
			echo $return_json;
		}

    $status     = "2";
	switch($action){
		case "1":
			echo checkexist($conn,$xuehao);
			break;
		case "2":
			echo newverify($conn,$name,$xuehao,$major,$status);
			break;
	}
	
    function newverify($conn,$name,$xuehao,$major,$status){
		$sql_insert = "INSERT INTO userverify (name,xuehao,major,status) values ('$name','$xuehao','$major','$status')";
		$sql_select = "SELECT status FROM userverify WHERE xuehao = '$xuehao'";
		$result_select = mysqli_query($conn,$sql_select);
		$num = mysqli_num_rows($result_select);
		if($num >= 1){//如果存在
			$result_array = mysqli_fetch_array($result_select);//转换成数组
			if($result_array["status"] == "3"){//如果是已驳回
				$sql_update = "UPDATE userverify SET status = 2 WHERE xuehao='$xuehao'";
				$result_update = mysqli_query($conn,$sql_update);//执行把已驳回改为审核中
				if($result_update){//如果变更成功
					$return_json = json_encode(array("status"=>"success"));//重新提交成功
					return $return_json;
				}
				else{
					$return_json = json_encode(array("status"=>"error"));//重新提交失败
					return $return_json;
				}
			}
			else{
				$return_json = json_encode(array("status"=>"error"));//状态不是已驳回，直接返回失败
				return $return_json;
			}
		}
		else if ($num < 1) {//不存在
			$result_insert = mysqli_query($conn,$sql_insert);//新增
			if($result_insert){//如果新增成功
				$return_json = json_encode(array("status"=>"success"));//返回成功
				return $return_json;
			}
			else{
				$return_json = json_encode(array("status"=>"error"));//新增失败返回失败
				return $return_json;
				// echo $mysqli->errno.":".$mysqli->error;
			}
		}
	}

	function checkexist($conn,$xuehao){
		$sql_select = "SELECT status,verifytime FROM userverify WHERE xuehao = '$xuehao'";
		$result = mysqli_query($conn,$sql_select);
		$num = mysqli_num_rows($result);
		if ($num >= 1) {
			$result_array = mysqli_fetch_array($result);
			$return_json =json_encode(array("status"=>$result_array["status"],"verifytime"=>$result_array["verifytime"]));
			return $return_json;
		}
		else{
			$return_json =json_encode(array("status"=>"none"));
			return $return_json;
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