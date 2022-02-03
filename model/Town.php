<?php

class Country{
    private $tID;
    private $name;
    private $cID;

    public function set_user($id, $conn) {
        $sql = "SELECT townID, name, countryID FROM towns";
        $sql .= " WHERE townID LIKE '$id' ";
        $result = $conn->query($sql);
        if ($conn->query($sql)) {
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $this->tID = $row['townID'];
                $this->name = $row['name'];
                $this->cID = $row['countryID'];
        } 
        else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
        }
    }

    public function get_id(){
        return $this->tID;
    }

    public function get_name(){
        return $this->name;
    }

    public function get_country(){
        return $this->cID;
    }

    public function townList($conn) {
        $list = array();
        $sql = "SELECT townID FROM towns";
        if($result = $conn->query($sql)) {
            if ($result->num_rows > 0) {
				while($row = $result->fetch_assoc()) {
                    $list[] = $row['townID'];
                }
            }
        }
        return $list;
    }
}
?>