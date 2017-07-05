<?php
session_start();
require_once('connect.php');
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
if($_SERVER["REQUEST_METHOD"] == "POST") {
	$loginName = test_input($_POST["loginName"]);
	$loginPassword = test_input($_POST["loginPassword"]);

	try{
		global $db;
		$search = $db->prepare("SELECT * FROM account WHERE name = :loginName AND password =:loginPassword");
		$search->bindParam(':loginName', $loginName);
		$search->bindParam(':loginPassword', $loginPassword);
		$search->execute();
		$result = $search -> fetchAll();
		if (count($result)!=0){
			$_SESSION["isLoggedIn"] = true;
			$success .= true;
		//	$success .= include("headerForAddCar.php");

			echo $success; die;
		}else{
			$error .= "No such account exists. Please create an account.";
			echo $error; die;
		}
	}
	catch(Exception $e){
		echo $e->getMessage();
		exit;
	}
}
die();
?>