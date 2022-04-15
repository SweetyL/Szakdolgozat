<?php
    include 'model/Job.php';
    include 'model/Trip.php';
    include 'model/truck/Truck.php';
    include 'model/truck/Engine.php';
    $job = new Job();
    $trip = new Trip();
    $truck = new Truck();
    $engine = new Engine();
    if(empty($_SESSION['id']) or !$_SESSION['type']=="driver" or empty($_REQUEST['id'])){
        header('Location: index.php?page=404');
        exit();
    }
    include 'view/showJobs.php';
    echo '<div class="container mx-auto">';
    $sql = "SELECT jobID, ownerOfJob FROM jobs WHERE ownerOfJob =".$_REQUEST['id'];
    $jobs = array();
    if($result = $conn->query($sql)) {
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $jobs[] = $row['jobID'];
            }
            foreach($jobs as $row){
                $job->set_job($row,$conn);
                $trip->set_trip($job->get_trip(),$conn);
                $truck->set_truck($job->get_truck(),$conn);
                $engine->set_engine($truck->get_engineID(),$conn);
                echo '<div class="row">';
                echo '<div class="mx-auto col-sm-6 my-5 result p-2">
                    <p>Indulási hely: '.$trip->get_start().'</p>
                    <p>Érkezési hely: '.$trip->get_end().'</p>
                    <p>Kamion: '.$truck->get_brand().' '.$truck->get_name().' motor: '.$engine->get_brand().' '.$engine->get_name().'</p>
                    <p>Fizetség: '.$job->get_reward().' EUR</p>
                    <p>Megjegyzés: <span class="break">'.$job->get_comment().'</span></p>
                    <p>Lejárati idő: '.$job->get_deadline().'</p>
                </div>';
                echo '</div>';
            }
        }else{
            echo '<h1>Ennek a cégnek még nincsen megbízása!</h1>';
            echo '<div class="my-5 p-3"></div>';
        }
    }
    echo '</div>';
?>