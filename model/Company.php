<?php

class Company {

    private $compID;
    private $name;
    private $townID;
    private $street;
    private $houseNumber;
    private $email;
    private $phoneNumber;
    private $webpage;
    private $username;
    private $password;

    public function set_user($id, $conn) {
        $sql = "SELECT compID, `name`, townID, street, houseNumber, email, phoneNumber, webpage, username, `password` FROM companies";
        $sql .= " WHERE compID = ".mysqli_real_escape_string($conn,$id)." ";
        $result = $conn->query($sql);
        if ($conn->query($sql)) {
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $this->compID = $row['compID'];
                $this->name = $row['name'];
                $this->townID = $row['townID'];
                $this->street = $row['street'];
                $this->houseNumber = $row['houseNumber'];
                $this->email = $row['email'];
                $this->phoneNumber = $row['phoneNumber'];
                $this->webpage = $row['webpage'];
                $this->username = $row['username'];
                $this->password = $row['password'];
        } 
        else {
            logger("[E]".date("Y-m-d H:i:s")." - "." HIBA: company model, ".$conn->error);
        }
        }
    }

    public function get_id(){
        return $this->compID;
    }

    public function get_name(){
        return $this->name;
    }

    public function get_townID(){
        return $this->townID;
    }

    public function get_street(){
        return $this->street;
    }

    public function get_houseNumber(){
        return $this->houseNumber;
    }

    public function get_email(){
        return $this->email;
    }

    public function get_phone(){
        return $this->phoneNumber;
    }

    public function get_webpage(){
        return $this->webpage;
    }

    public function get_username(){
        return $this->username;
    }

    public function get_password(){
        return $this->password;
    }

    public function companiesList($conn) {
        $list = array();
        $sql = "SELECT compID FROM companies";
        if($result = $conn->query($sql)) {
            if ($result->num_rows > 0) {
				while($row = $result->fetch_assoc()) {
                    $list[] = $row['compID'];
                }
            }
        }
        return $list;
    }
}
?>