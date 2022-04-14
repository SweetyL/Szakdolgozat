<?php
    if(empty($_SESSION['id']) or !$_SESSION['type']=="driver" or empty($_REQUEST['id'])){
        header('Location: index.php?page=404');
        exit();
    }
    include 'view/showJobs.php';
    echo '<div class="container mx-auto">';
    $sql = "SELECT jobID, ownerOfJob WHERE ownerOfJob =".$_REQUEST['id'];
    $jobs = array();
    if($result = $conn->query($sql)) {
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $jobs[] = $row['jobID'];
            }
            foreach($jobs as $row){
        
            }
        }else{
            echo '<h1>Ennek a cégnek még nincsen megbízása!</h1>';
        }
    }
    echo '</div>';
?>