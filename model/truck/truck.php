<?php

class Engine{
    private $tID;
    private $name;
    private $brand;
    private $engineID;
    private $tankSize;
    private $consumption;
    private $numberOfAxles;

    public function set_engine($id, $conn) {
        $sql = "SELECT truckID, name, brand, engineID, tankSize, consumption, numberOfAxles FROM engines";
        $sql .= " WHERE truckID = '$id' ";
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
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
        }
    }

    public function get_id(){
        return $this->engineID;
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

    public function engineList($conn) {
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