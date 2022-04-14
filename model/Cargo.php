<?php

class Cargo {

    private $cargoID;
    private $name;
    private $mass;
    private $adr;

    public function set_cargo($id, $conn) {
        $sql = "SELECT cargoID, `name`, mass, adr FROM cargo";
        $sql .= " WHERE cargoID = ".htmlspecialchars($id)." ";
        $result = $conn->query($sql);
        if ($conn->query($sql)) {
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $this->cargoID = $row['cargoID'];
                $this->name = $row['name'];
                $this->mass = $row['mass'];
                $this->adr = $row['adr'];
            } 
        }
    }

    public function get_id(){
        return $this->cargoID;
    }

    public function get_name(){
        return $this->name;
    }

    public function get_mass(){
        return $this->mass;
    }

    public function get_adr(){
        return $this->adr;
    }

    public function cargoList($conn) {
        $list = array();
        $sql = "SELECT cargoID FROM cargo ORDER BY name ASC";
        if($result = $conn->query($sql)) {
            if ($result->num_rows > 0) {
				while($row = $result->fetch_assoc()) {
                    $list[] = $row['cargoID'];
                }
            }
        }
        return $list;
    }
}
?>