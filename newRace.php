<?php
session_start();
include_once 'database.php';
?>
<!-- Modal -->
<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="false">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle"><h2>Race Details</h2></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form id="raceForm">
              <label>Race ID</label>
              <input type="text" name="id"><br>
              <label>Race Date</label>
              <input type="text" id="datepicker" name="date"><br>
              <label>Start Time</label>
              <input type="text" name="time"><br>
              <label>Password</label>
              <input type="password" name="password"><br>
              <label>Location</label>
          </form>
          
          <textarea name="location" form="raceForm" rows="4" cols="50"></textarea><br><br>
          <button type="button" data-dismiss="modal">Cancel</button>
          <input type="submit" value="Save" form="raceForm" onclick="submitRace();">
        </div>
      </div>
    </div>
</div>

<script>
  $( function() {
    $( "#datepicker" ).datepicker();
  } );
</script>