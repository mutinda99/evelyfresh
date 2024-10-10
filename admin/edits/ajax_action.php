<?php
include_once 'config/Database.php';
include_once 'class/Records.php';

$database = new Database();
$db = $database->getConnection();

$record = new Records($db);

if(!empty($_POST['action']) && $_POST['action'] == 'listRecords') {
	$record->listRecords();
}
if(!empty($_POST['action']) && $_POST['action'] == 'addRecord') {	
	$record->customer_no = $_POST["customer_no"];
    $record->mpesa_tid = $_POST["mpesa_tid"];
    $record->phone_model = $_POST["phone_model"];
	$record->phone_serial = $_POST["phone_serial"];
	$record->amount_paid = $_POST["amount_paid"];
	$record->shop_name = $_POST["shop_name"];
	$record->addRecord();
}
if(!empty($_POST['action']) && $_POST['action'] == 'getRecord') {
	$record->id = $_POST["id"];
	$record->getRecord();
}
if(!empty($_POST['action']) && $_POST['action'] == 'updateRecord') {
	$record->id = $_POST["id"];
	$record->customer_no = $_POST["customer_no"];
    $record->mpesa_tid = $_POST["mpesa_tid"];
    $record->phone_model = $_POST["phone_model"];
	$record->phone_serial = $_POST["phone_serial"];
	$record->amount_paid = $_POST["amount_paid"];
	$record->shop_name = $_POST["shop_name"];
	$record->updateRecord();
}
if(!empty($_POST['action']) && $_POST['action'] == 'deleteRecord') {
	$record->id = $_POST["id"];
	$record->deleteRecord();
}
?>