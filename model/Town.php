<?php

class Town{
    private $tID;
    private $name;
    private $cID;

    public function set_town($id, $conn) {
        $sql = "SELECT townID, name, countryID FROM towns";
        $sql .= " WHERE townID LIKE '".htmlspecialchars($id)."' ";
        $result = $conn->query($sql);
        if ($conn->query($sql)) {
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $this->tID = $row['townID'];
                $this->name = $row['name'];
                $this->cID = $row['countryID'];
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
        $sql = "SELECT townID FROM towns ORDER BY name ASC";
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