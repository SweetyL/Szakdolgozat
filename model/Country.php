<?php

class Country{
    private $cID;
    private $name;

    public function set_country($id, $conn) {
        $sql = "SELECT countryID, name FROM countries";
        $sql .= " WHERE countryID LIKE '".htmlspecialchars($id)."' ";
        $result = $conn->query($sql);
        if ($conn->query($sql)) {
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $this->cID = $row['countryID'];
                $this->name = $row['name'];
            } 
        }
    }

    public function get_id(){
        return $this->cID;
    }

    public function get_name(){
        return $this->name;
    }

    public function countriesList($conn) {
        $list = array();
        $sql = "SELECT countryID FROM countries ORDER BY name ASC";
        if($result = $conn->query($sql)) {
            if ($result->num_rows > 0) {
				while($row = $result->fetch_assoc()) {
                    $list[] = $row['countryID'];
                }
            }
        }
        return $list;
    }
}
?>