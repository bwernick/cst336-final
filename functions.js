function submitRace(){
    
    var data = {raceID: document.getElementsByTagName("input")[0].value,
                raceDate: document.getElementsByTagName("input")[1].value,
                startTime: document.getElementsByTagName("input")[2].value,
                password: document.getElementsByTagName("input")[3].value,
                location: document.getElementsByTagName("textarea")[0].value
    };
    
    $.ajax({
        url: 'createRace.php',
        type: 'POST',
        data: data,
        success: function(data) {
            console.log(data);
        },
        /* 
        complete: function(data,status) { //optional, used for debugging purposes
           alert(status);
        }
        */
    });
}

function archive(race_id){
    $.ajax({
       url: 'archiveModal.php',
       type: 'POST',
       data: {id: race_id},
       success: function(data){
           console.log(data);
           $("#archiveModal").modal('show');
       }
    });
}

function preview(race_id){
    $.ajax({
       url: 'previewModal.php',
       type: 'POST',
       data: {id: race_id},
       success: function(data){
           console.log(data);
           $("#previewModal").modal('show');
       }
    });
}

function cancelRace(race_id){
    $.ajax({
       url: 'cancelRace.php',
       type: 'POST',
       data: {id: race_id},
       success: function(data){
           console.log(data);
       }
    });
}

function search(){
    var srchTerm = document.getElementById("srch-term").value;
    $.ajax({
       url: 'search.php',
       type: 'POST',
       data: {search: srchTerm},
       success: function(data){
           $("#divTableBody").html(data);
       }
    });
}