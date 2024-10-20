<?php
class Records {	
   
	private $recordsTable = 'device_sales';
	public $id;
    public $name;
    public $skills;
    public $address;
	public $designation;
	public $age;
	private $conn;
	
	public function __construct($db){
        $this->conn = $db;
    }	    
	
	public function listRecords(){
		
		$sqlQuery = "SELECT * FROM ".$this->recordsTable." ";
		if(!empty($_POST["search"]["value"])){
			$sqlQuery .= 'where(id LIKE "%'.$_POST["search"]["value"].'%" ';
			$sqlQuery .= ' OR customer_no LIKE "%'.$_POST["search"]["value"].'%" ';			
			$sqlQuery .= ' OR mpesa_tid LIKE "%'.$_POST["search"]["value"].'%" ';
			$sqlQuery .= ' OR phone_model LIKE "%'.$_POST["search"]["value"].'%" ';
			$sqlQuery .= ' OR phone_serial LIKE "%'.$_POST["search"]["value"].'%") ';			
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
		
		$stmtTotal = $this->conn->prepare("SELECT * FROM ".$this->recordsTable);
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
			$rows[] = $record['shop_name'];					
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
				SELECT customer_no, mpesa_tid , phone_model, phone_serial, shop_name  FROM ".$this->recordsTable." 
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
			SET customer_no= ?, mpesa_tid = ?, phone_model = ?, phone_serial = ?, shop_name = ?
			WHERE id = ?");
	 
			$this->id = htmlspecialchars(strip_tags($this->id));
			$this->name = htmlspecialchars(strip_tags($this->name));
			$this->age = htmlspecialchars(strip_tags($this->age));
			$this->skills = htmlspecialchars(strip_tags($this->skills));
			$this->address = htmlspecialchars(strip_tags($this->address));
			$this->designation = htmlspecialchars(strip_tags($this->designation));
			
			
			$stmt->bind_param("sssssi", $this->name, $this->age, $this->skills, $this->address, $this->designation, $this->id);
			
			if($stmt->execute()){
				return true;
			}
			
		}	
	}
	public function addRecord(){
		
		if($this->name) {

			$stmt = $this->conn->prepare("
			INSERT INTO ".$this->recordsTable."(`name`, `age`, `skills`, `address`, `designation`)
			VALUES(?,?,?,?,?)");
		
			$this->name = htmlspecialchars(strip_tags($this->name));
			$this->age = htmlspecialchars(strip_tags($this->age));
			$this->skills = htmlspecialchars(strip_tags($this->skills));
			$this->address = htmlspecialchars(strip_tags($this->address));
			$this->designation = htmlspecialchars(strip_tags($this->designation));
			
			
			$stmt->bind_param("sisss", $this->name, $this->age, $this->skills, $this->address, $this->designation);
			
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