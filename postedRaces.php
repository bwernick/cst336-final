<?php
session_start(); 
include_once 'database.php'; 

$dbConn = getDatabaseConnection(); 

if (isset($_SESSION['user_id'])) {
    //users can see all races
    $sql = "SELECT * FROM `races`"; 
}else{
    //Only current races are shown
    $sql = 'SELECT * FROM `races` WHERE `status` = "ON"';
}
$statement = $dbConn->prepare($sql); 
$statement->execute();
$records = $statement->fetchAll(); 

?>
<div id="data">
    <!--Header for the columns-->
    <div class="divTable">
        <div class="divTableBody">
            <div class="divTableRow">
                <div class="divTableCell">&nbsp;ID</div>
                <div class="divTableCell">&nbsp;Date</div>
                <div class="divTableCell">&nbsp;Start Time</div>
                <div class="divTableCell">&nbsp;Location</div>
                <div class="divTableCell">&nbsp;</div>
                <div class="divTableCell">&nbsp;</div>
                <?php
                if (isset($_SESSION['user_id'])) {
                    echo '<div class="divTableCell">&nbsp;<a href>Past Races</a></div>
                    <div class="divTableCell">&nbsp;<button data-toggle="modal" data-target="#exampleModalLong">+</button></div>';
                }else{
                    echo '<div class="divTableCell">&nbsp;</div>
                    <div class="divTableCell">&nbsp;</div>';
                }
                ?>
                <div class="divTableCell">&nbsp;Status</div>
            </div>
        </div>
    </div>
    
    <hr><br>
    
    <!--Data goes here-->
    <div class="divTable">
        <div class="divTableBody">
            <?php 
            //user can do operations with buttons
            if (isset($_SESSION['user_id'])) {
                foreach($records as $record){
                    echo '<div class="divTableRow">
                            <div class="divTableCell">&nbsp;'. $record['id'] .'</div>
                            <div class="divTableCell">&nbsp;'. $record['date'] .'</div>
                            <div class="divTableCell">&nbsp;'. $record['start_time'] .'</div>
                            <div class="divTableCell">&nbsp;'. $record['location'] .'</div>
                            <div class="divTableCell">&nbsp;<a href>Map</a></div>
                            <div class="divTableCell">&nbsp;<button id="'. $record['id'] .'" data-toggle="modal" data-target="#editRaceModal" data-id="'. $record['id'] .'"><i class="fa fa-pencil" aria-hidden="true"></i></button></div>
                            <div class="divTableCell">&nbsp;<button id="'. $record['id'] .'" onclick="archive(this.id)"><i class="fa fa-ban" aria-hidden="true"></i></button></div>
                            <div class="divTableCell">&nbsp;<button id="'. $record['id'] .'" onclick="preview(this.id)"><i class="fa fa-eye" aria-hidden="true"></i></button></div>
                            <div class="divTableCell">&nbsp;'. $record['status'] .'</div>
                        </div>';
                }
            //otherwise no buttons    
            }else{
                foreach($records as $record){
                    echo '<div class="divTableRow">
                            <div class="divTableCell">&nbsp;'. $record['id'] .'</div>
                            <div class="divTableCell">&nbsp;'. $record['date'] .'</div>
                            <div class="divTableCell">&nbsp;'. $record['start_time'] .'</div>
                            <div class="divTableCell">&nbsp;'. $record['location'] .'</div>
                            <div class="divTableCell">&nbsp;<a href>Map</a></div>
                            <div class="divTableCell">&nbsp;</div>
                            <div class="divTableCell">&nbsp;</div>
                            <div class="divTableCell">&nbsp;</div>
                            <div class="divTableCell">&nbsp;'. $record['status'] .'</div>
                        </div>';
            }
        }
    ?>
    </div>
    
</div>