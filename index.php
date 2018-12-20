<?php
session_start();

?>
<!-- 
Username: admin
Pass: admin

Heroku: https://bwernick-cst336-final.herokuapp.com/
-->

<html>
<head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">  
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<link rel="stylesheet" href="styles.css">
<script src="functions.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
</head>
<body>
    <div id="main">
    <br>
    <div style="float:right; width: 100%;">
        <?php
        if (isset($_SESSION['user_id'])) {
            echo '<a href="logout.php"> Logout</a>'; 
        }else{
            echo '<a href="login.php"> Login</a>'; 
        }
        
        ?>
        </div><br>
        <form class="navbar-form" role="search">
            <div class="input-group add-on">
                <input class="form-control" placeholder="Search" name="srch-term" id="srch-term" type="text">
                <div class="input-group-btn">
                    <button class="btn btn-default" type="submit" onclick="search();"><i class="glyphicon glyphicon-search"></i></button>
            </div>
            </div>
        </form>
    <br>
    <?php 
        include_once 'postedRaces.php';
        include_once 'newRace.php';
        include_once 'editRace.php';
        include_once 'archiveModal.php';
        include_once 'previewModal.php';
    ?>
    </div>
</body>
</html>