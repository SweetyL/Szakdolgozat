<?php

class Truck{
    private $tID;
    private $name;
    private $brand;
    private $engineID;
    private $tankSize;
    private $consumption;
    private $numberOfAxles;

    public function set_truck($id, $conn) {
        $sql = "SELECT truckID, name, brand, engineID, tankSize, consumption, numberOfAxles FROM trucks";
        $sql .= " WHERE truckID = '".mysqli_real_escape_string($conn,$id)."' ";
        $result = $conn->query($sql);
        if ($conn->query($sql)) {
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $this->tID = $row['truckID'];
                $this->name = $row['name'];
                $this->brand = $row['brand'];
                $this->engineID = $row['engineID'];
                $this->tankSize = $row['tankSize'];
                $this->consumption = $row['consumption'];
                $this->numberOfAxles = $row['numberOfAxles'];
        } 
        else {
            logger("[E]".date("Y-m-d H:i:s")." - "." HIBA: truck model, ".$conn->error);
        }
        }
    }

    public function get_id(){
        return $this->tID;
    }

    public function get_name(){
        return $this->name;
    }

    public function get_brand(){
        return $this->brand;
    }

    public function get_engineID(){
        return $this->engineID;
    }

    public function get_tankSize(){
        return $this->tankSize;
    }

    public function get_consumption(){
        return $this->consumption;
    }

    public function get_numberOfAxles(){
        return $this->numberOfAxles;
    }

    public function truckList($conn) {
        $list = array();
        $sql = "SELECT truckID FROM trucks";
        if($result = $conn->query($sql)) {
            if ($result->num_rows > 0) {
				while($row = $result->fetch_assoc()) {
                    $list[] = $row['truckID'];
                }
            }
        }
        return $list;
    }
}
?>