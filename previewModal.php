<?php
session_start();
include_once 'database.php';
$race_id = $_POST['id'];
echo $race_id;
$dbConn = getDatabaseConnection(); 
$sql = 'SELECT * FROM `races` WHERE `id` = "'.$race_id.'"';
$statement = $dbConn->prepare($sql); 
$statement->execute();
$records = $statement->fetchAll(); 

?>
  <!-- Modal -->
<div class="modal fade" id="previewModal" tabindex="-1" role="dialog" aria-labelledby="previewModal" aria-hidden="false">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle"><h2>Preview</h2></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
        <?php
           echo '<div class="divTable">
                <div class="divTableBody">';
                foreach($records as $record){
                    echo '<div class="divTableRow">
                            <div class="divTableCell">&nbsp;'. $record['id'] .'</div>
                            <div class="divTableCell">&nbsp;'. $record['date'] .'</div>
                            <div class="divTableCell">&nbsp;'. $record['start_time'] .'</div>
                            <div class="divTableCell">&nbsp;'. $record['location'] .'</div>
                            <div class="divTableCell">&nbsp;<a href>Map</a></div>
                            <div class="divTableCell">&nbsp;'. $record['status'] .'</div>
                        </div>';
                }
                   echo' </div>
                </div>';
          ?>
        </div>
      </div>
    </div>
</div>