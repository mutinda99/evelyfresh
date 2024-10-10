<?php
class Records {	
   
	private $recordsTable = 'device_sales';
	public $id;
    public $customer_no;
    public $mpesa_tid;
    public $phone_model;
	public $phone_serial;
	public $amount_paid;
	public $shop_name;
	
	private $conn;
	
	public function __construct($db){
        $this->conn = $db;
    }	    
	
	public function listRecords(){
		
		$sqlQuery = "SELECT * FROM ".$this->recordsTable." ";
		if(!empty($_POST["search"]["value"])){
			$sqlQuery .= 'where(id LIKE "%'.$_POST["search"]["value"].'%" ';
			$sqlQuery .= ' OR customer_no LIKE "%'.$_POST["search"]["value"].'%" ';			
			$sqlQuery .= ' OR mpesa_tid "%'.$_POST["search"]["value"].'%" ';
			$sqlQuery .= ' OR phone_model LIKE "%'.$_POST["search"]["value"].'%" ';
			$sqlQuery .= ' OR phone_serial LIKE "%'.$_POST["search"]["value"].'%") ';	
             $sqlQuery .= ' OR shop_name LIKE "%'.$_POST["search"]["value"].'%") ';
			 
		}
		
		if(!empty($_POST["order"])){
			$sqlQuery .= 'ORDER BY '.$_POST['order']['0']['column'].' '.$_POST['order']['0']['dir'].' ';
		} else {
			$sqlQuery .= 'ORDER BY id DESC ';
		}
		
		if($_POST["length"] != -1){
			$sqlQuery .= 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
		}
		
		$stmt = $this->conn->prepare($sqlQuery);
		$stmt->execute();
		$result = $stmt->get_result();	
		
		$stmtTotal = $this->conn->prepare("SELECT id,customer_no,mpesa_tid,phone_model,phone_serial,amount_paid,shop_name FROM ".$this->recordsTable);
		$stmtTotal->execute();
		$allResult = $stmtTotal->get_result();
		$allRecords = $allResult->num_rows;
		
		$displayRecords = $result->num_rows;
		$records = array();		
		while ($record = $result->fetch_assoc()) { 				
			$rows = array();			
			$rows[] = $record['id'];
			$rows[] = ucfirst($record['customer_no']);
			$rows[] = $record['mpesa_tid'];		
			$rows[] = $record['phone_model'];	
			$rows[] = $record['phone_serial'];
			$rows[] = $record['amount_paid'];
            $rows[] = $record['shop_name'];	
            //$rows[] = $record['date_activated'];				
			$rows[] = '<button type="button" name="update" id="'.$record["id"].'" class="btn btn-warning btn-xs update">Update</button>';
			$rows[] = '<button type="button" name="delete" id="'.$record["id"].'" class="btn btn-danger btn-xs delete" >Delete</button>';
			$records[] = $rows;
		}
		
		$output = array(
			"draw"	=>	intval($_POST["draw"]),			
			"iTotalRecords"	=> 	$displayRecords,
			"iTotalDisplayRecords"	=>  $allRecords,
			"data"	=> 	$records
		);
		
		echo json_encode($output);
	}
	
	public function getRecord(){
		if($this->id) {
			$sqlQuery = "
				SELECT id, customer_no,mpesa_tid,phone_model,phone_serial,amount_paid,shop_name FROM ".$this->recordsTable." 
				WHERE id = ?";			
			$stmt = $this->conn->prepare($sqlQuery);
			$stmt->bind_param("i", $this->id);	
			$stmt->execute();
			$result = $stmt->get_result();
			$record = $result->fetch_assoc();
			echo json_encode($record);
		}
	}
	public function updateRecord(){
		
		if($this->id) {			
			
			$stmt = $this->conn->prepare("
			UPDATE ".$this->recordsTable." 
			SET customer_no= ?, mpesa_tid = ?,phone_model = ?, phone_serial = ?, amount_paid= ?,shop_name= ?
			WHERE id = ?");
	 
			$this->id = htmlspecialchars(strip_tags($this->id));
			$this->customer_no = htmlspecialchars(strip_tags($this->customer_no));
			$this->mpesa_tid = htmlspecialchars(strip_tags($this->mpesa_tid));
			$this->phone_model = htmlspecialchars(strip_tags($this->phone_model));
			$this->phone_serial = htmlspecialchars(strip_tags($this->phone_serial));
			$this->amount_paid = htmlspecialchars(strip_tags($this->amount_paid));
			$this->shop_name = htmlspecialchars(strip_tags($this->shop_name));
			
			
			$stmt->bind_param("ssssssi", $this->customer_no, $this->mpesa_tid, $this->phone_model, $this->phone_serial, $this->amount_paid,$this->shop_name,$this->id);
			
			if($stmt->execute()){
				return true;
			}
			
		}	
	}
	public function addRecord(){
		
		if($this->customer_no) {

			$stmt = $this->conn->prepare("
			INSERT INTO ".$this->recordsTable."(`customer_no`, `mpesa_tid`, `phone_model`, `phone_serial`, `amount_paid`,`shop_name`)
			VALUES(?,?,?,?,?,?)");
		
			$this->customer_no = htmlspecialchars(strip_tags($this->customer_no));
			$this->mpesa_tid = htmlspecialchars(strip_tags($this->mpesa_tid));
			$this->phone_model = htmlspecialchars(strip_tags($this->phone_model));
			$this->phone_serial = htmlspecialchars(strip_tags($this->phone_serial));
			$this->shop_name = htmlspecialchars(strip_tags($this->shop_name));
			$this->amount_paid = htmlspecialchars(strip_tags($this->amount_paid));
			
			
			$stmt->bind_param("ssssss", $this->customer_no, $this->mpesa_tid, $this->phone_model, $this->phone_serial, $this->amount_paid,$this->shop_name);
			
			if($stmt->execute()){
				return true;
			}		
		}
	}
	public function deleteRecord(){
		if($this->id) {			

			$stmt = $this->conn->prepare("
				DELETE FROM ".$this->recordsTable." 
				WHERE id = ?");

			$this->id = htmlspecialchars(strip_tags($this->id));

			$stmt->bind_param("i", $this->id);

			if($stmt->execute()){
				return true;
			}
		}
	}
}
?>