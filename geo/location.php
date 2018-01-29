<?php
	class location
	{
		private $conn;
		private $tableName = "places";

		private $id;
		private $name;
		private $address;
		private $type;
		private $lat;
		private $lng;

		function setId($id) { $this->id = $id; }
		function getId() { return $this->id; }
		function setName($name) { $this->name = $name; }
		function getName() { return $this->name; }
		function setAddress($address) { $this->address = $address; }
		function getAddress() { return $this->address; }
		function setType($type) { $this->type = $type; }
		function getType() { return $this->type; }
		function setLat($lat) { $this->lat = $lat; }
		function getLat() { return $this->lat; }
		function setLng($lng) { $this->lng = $lng; }
		function getLng() { return $this->lng; }


		public function __construct(){
			require_once('db/DbConnection.php');	
			$conn = new DbConnection;
			$this->conn = $conn->connect();
		}

		public function getBlankLocations()
		{
			$sql = "SELECT * FROM $this->tableName WHERE lat is NULL AND lng IS NULL";
			$stmnt = $this->conn->prepare($sql);
			$stmnt->execute();
			return $stmnt->fetchAll(PDO::FETCH_ASSOC);

		}

		public function getAllLocations()
		{
			$sql = "SELECT * FROM $this->tableName";
			$stmnt = $this->conn->prepare($sql);
			$stmnt->execute();
			return $stmnt->fetchAll(PDO::FETCH_ASSOC);
		}
		
		public function updateBlankLocations(){
			$sql = "UPDATE $this->tableName SET lat = :lat, lng= :lng WHERE id= :id";
			$stmnt = $this->conn->prepare($sql);
			
			$stmnt->bindParam(':id', $this->id);
			$stmnt->bindParam(':lat', $this->lat);
			$stmnt->bindParam(':lng', $this->lng);
			
			if($stmnt->execute()){
				return true;
			} else{
				return false;
			}

		}
	}
?>