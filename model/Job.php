<?php

class Job {

    private $jobID;
    private $driverID;
    private $tripID;
    private $truckID;
    private $reward;
    private $comment;
    private $deadline;
    private $ownerOfJob;

    public function set_job($id, $conn) {
        $sql = "SELECT jobID, driverID, tripID, truckID, reward, comment, deadline, ownerOfJob FROM jobs";
        $sql .= " WHERE jobID = ".htmlspecialchars($id)." ";
        $result = $conn->query($sql);
        if ($conn->query($sql)) {
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $this->jobID = $row['jobID'];
                $this->driverID = $row['driverID'];
                $this->tripID = $row['tripID'];
                $this->truckID = $row['truckID'];
                $this->reward= $row['reward'];
                $this->comment = $row['comment'];
                $this->deadline = $row['deadline'];
                $this->ownerOfJob = $row['ownerOfJob'];
            } 
        }
    }

    public function get_id(){
        return $this->jobID;
    }

    public function get_driver(){
        return $this->driverID;
    }

    public function get_trip(){
        return $this->tripID;
    }

    public function get_truck(){
        return $this->truckID;
    }

    public function get_reward(){
        return $this->reward;
    }

    public function get_comment(){
        return $this->comment;
    }

    public function get_deadline(){
        return $this->deadline;
    }

    public function get_owner(){
        return $this->ownerOfJob;
    }

    public function jobList($conn) {
        $list = array();
        $sql = "SELECT jobID FROM jobs";
        if($result = $conn->query($sql)) {
            if ($result->num_rows > 0) {
				while($row = $result->fetch_assoc()) {
                    $list[] = $row['jobID'];
                }
            }
        }
        return $list;
    }
}
?>