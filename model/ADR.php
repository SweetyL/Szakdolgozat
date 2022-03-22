<?php

class ADR {

    private $adrID;
    private $name;
    private $icon;
    private $comment;

    public function set_adr($id, $conn) {
        $sql = "SELECT adrID, `name`, icon, comment FROM adr";
        $sql .= " WHERE adrID = ".mysqli_real_escape_string($conn,$id)." ";
        $result = $conn->query($sql);
        if ($conn->query($sql)) {
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $this->adrID = $row['adrID'];
                $this->name = $row['name'];
                $this->icon = $row['icon'];
                $this->comment = $row['comment'];
        } 
        else {
            logger("[E]".date("Y-m-d H:i:s")." - "." HIBA: adr model, ".$conn->error);
        }
        }
    }

    public function get_id(){
        return $this->adrID;
    }

    public function get_name(){
        return $this->name;
    }

    public function get_icon(){
        return $this->icon;
    }

    public function get_comment(){
        return $this->comment;
    }

    public function adrList($conn) {
        $list = array();
        $sql = "SELECT adrID FROM adr";
        if($result = $conn->query($sql)) {
            if ($result->num_rows > 0) {
				while($row = $result->fetch_assoc()) {
                    $list[] = $row['adrID'];
                }
            }
        }
        return $list;
    }
}
?>