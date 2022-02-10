<?php

class Engine{
    private $engineID;
    private $name;
    private $brand;
    private $power;

    public function set_engine($id, $conn) {
        $sql = "SELECT engineID, name, brand, `power` FROM engines";
        $sql .= " WHERE engineID = '$id' ";
        $result = $conn->query($sql);
        if ($conn->query($sql)) {
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $this->engineID = $row['engineID'];
                $this->name = $row['name'];
                $this->brand = $row['brand'];
                $this->power = $row['power'];
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

    public function get_power(){
        return $this->power;
    }

    public function engineList($conn) {
        $list = array();
        $sql = "SELECT engineID FROM engines";
        if($result = $conn->query($sql)) {
            if ($result->num_rows > 0) {
				while($row = $result->fetch_assoc()) {
                    $list[] = $row['engineID'];
                }
            }
        }
        return $list;
    }
}
?>