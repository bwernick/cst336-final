<?php
session_start();
include_once 'database.php';
$race_id = $_POST['id'];
echo $race_id;

?>
<!-- Modal -->
<div class="modal fade" id="archiveModal" tabindex="-1" role="dialog" aria-labelledby="archiveModal" aria-hidden="false">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle"><h2>Cancel Race?</h2></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
        <?php
            echo '<p>'. $race_id .'</p><p>Cancel this race? This cannot be undone.</p>
            <button type="button" data-dismiss="modal">Don\'t</button>
            <button id = "'.$race_id.'" type="button" data-dismiss="modal" onclick="cancelRace(this.id)">Cancel</button>';
          ?>
        </div>
      </div>
    </div>
</div>