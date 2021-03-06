<?php

class Trip {

    private $tripID;
    private $tripStart;
    private $tripEnd;
    private $tripLength;
    private $cargoID;

    public function set_trip($id, $conn) {
        $sql = "SELECT tripID, `tripStart`, `tripEnd`, tripLength, cargoID FROM trips";
        $sql .= " WHERE tripID = ".htmlspecialchars($id)." ";
        $result = $conn->query($sql);
        if ($conn->query($sql)) {
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $this->tripID = $row['tripID'];
                $this->tripStart = $row['tripStart'];
                $this->tripEnd = $row['tripEnd'];
                $this->tripLength = $row['tripLength'];
                $this->cargoID = $row['cargoID'];
            } 
        }
    }

    public function get_id(){
        return $this->tripID;
    }

    public function get_start(){
        return $this->tripStart;
    }

    public function get_end(){
        return $this->tripEnd;
    }

    public function get_tripLength(){
        return $this->tripLength;
    }

    public function get_cargoID(){
        return $this->cargoID;
    }

    public function tripList($conn) {
        $list = array();
        $sql = "SELECT tripID FROM trips";
        if($result = $conn->query($sql)) {
            if ($result->num_rows > 0) {
				while($row = $result->fetch_assoc()) {
                    $list[] = $row['tripID'];
                }
            }
        }
        return $list;
    }
}
?>