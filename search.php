<?php
session_start(); 
include_once 'database.php'; 
$srch = $_POST['search'];
$dbConn = getDatabaseConnection(); 

if (isset($_SESSION['user_id'])) {
    //users can see all races
    $sql = 'SELECT * FROM `races` WHERE `id` LIKE "%'.$srch.'%" OR `date` LIKE "%'.$srch.'%" OR `start_time` LIKE "%'.$srch.'%" OR `location` LIKE "%'.$srch.'%" OR `status` LIKE "%'.$srch.'%"'; 
}else{
    //Only current races are shown
    $sql = 'SELECT * FROM `races` WHERE `status` = "ON" AND `id` LIKE "%'.$srch.'%" OR `date` LIKE "%'.$srch.'%" OR `start_time` LIKE "%'.$srch.'%" OR `location` LIKE "%'.$srch.'%" OR `status` LIKE "%'.$srch.'%"';
}
$statement = $dbConn->prepare($sql); 
$statement->execute();
$records = $statement->fetchAll(); 

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