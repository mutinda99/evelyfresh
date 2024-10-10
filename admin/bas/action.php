<?php
include_once("inc/db_connect.php");
if ($_POST['action'] == 'edit' && $_POST['id']) {	
	$updateField='';
	if(isset($_POST['name'])) {
		$updateField.= "name='".$_POST['name']."'";
	} else if(isset($_POST['skills'])) {
		$updateField.= "skills='".$_POST['skills']."'";
	} else if(isset($_POST['age'])) {
		$updateField.= "age='".$_POST['age']."'";
	}
	if($updateField && $_POST['id']) {
		$sqlQuery = "UPDATE live_records SET $updateField WHERE id='" . $_POST['id'] . "'";	
		mysqli_query($conn, $sqlQuery) or die("database error:". mysqli_error($conn));	
		$data = array(
			"message"	=> "Record Updated",	
			"status" => 1
		);
		echo json_encode($data);		
	}
}
if ($_POST['action'] == 'delete' && $_POST['id']) {
	$sqlQuery = "DELETE FROM live_records WHERE id='" . $_POST['id'] . "'";	
	mysqli_query($conn, $sqlQuery) or die("database error:". mysqli_error($conn));	
	$data = array(
		"message"	=> "Record Deleted",	
		"status" => 1
	);
	echo json_encode($data);	
}
?>