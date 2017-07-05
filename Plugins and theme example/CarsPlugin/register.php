<?php
require_once('connect.php');
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
if($_SERVER["REQUEST_METHOD"] == "POST") {
	$registerName = test_input($_POST["registerName"]);
	$registerPassword = test_input($_POST["registerPassword"]);
if(empty($registerName) || empty($registerPassword)){
    $error.="Please don't leave empty fields.";
    echo $error; die;
}else{
	try{
		global $db;
		$inserts = $db->prepare("INSERT INTO account( name, password) VALUES(:registerName, :registerPassword)");
		$inserts->bindParam(':registerName', $registerName);
		$inserts->bindParam(':registerPassword', $registerPassword);
		$inserts->execute();

	}
	catch(Exception $e){
		echo $e->getMessage();
		exit;
	}
	$success .= "You have registered successfuly. You can now log in";
	echo $success; die;
}
}
die();
?>