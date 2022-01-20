<?php

class Driver {

    private $driverID;
    private $firstname;
    private $lastname;
    private $townID;
    private $street;
    private $houseNumber;
    private $email;
    private $phoneNumber;
    private $username;
    private $password;

    public function set_user($id, $conn) {
        $sql = "SELECT driverID, firstname, lastname, townID, street, houseNumber, email, phoneNumber, username, `password` FROM drivers";
        $sql .= " WHERE driverID = $id ";
        $result = $conn->query($sql);
        if ($conn->query($sql)) {
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $this->driverID = $row['driverID'];
                $this->firstname = $row['firstname'];
                $this->lastname = $row['lastname'];
                $this->townID = $row['townID'];
                $this->street = $row['street'];
                $this->houseNumber = $row['houseNumber'];
                $this->email = $row['email'];
                $this->phoneNumber = $row['phoneNumber'];
                $this->username = $row['username'];
                $this->password = $row['password'];
        } 
        else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
        }
    }

    public function get_id(){
        return $this->driverID;
    }

    public function get_firstname(){
        return $this->firstname;
    }

    public function get_lastname(){
        return $this->lastname;
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

    public function get_username(){
        return $this->username;
    }

    public function get_password(){
        return $this->password;
    }

    public function driversList($conn) {
        $list = array();
        $sql = "SELECT driverID FROM drivers";
        if($result = $conn->query($sql)) {
            if ($result->num_rows > 0) {
				while($row = $result->fetch_assoc()) {
                    $list[] = $row['driverID'];
                }
            }
        }
        return $list;
    }
}
?>