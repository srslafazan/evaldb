<?php
session_start();
include_once('functions.php');
// require_once('new-connections.php');
?>
<!DOCTYPE html>
<html>
<head>
    <title>Email Validation with DB</title>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/skeleton/2.0.4/skeleton.css'>
    <link rel='stylesheet' href='main.css'>
</head>
<body>
    <div id='container'>
        <div class='row'>
            <div class='twelve columns' id='thanks'>
            <p>The email address you entered, <b><?php echo $_SESSION['useremail']; ?></b>, is a valid email address! Thank you!</p>
            </div>

       
        </div>

        <div class='row' id='head'>
            <div class='one column'></div>
            <div class='five columns'>
                <h1 >Email Addresses Entered</h1>
            </div>
            <div class='two columns'>
                <form action='process.php' method='post'>
                    <input type='hidden' name='action' value='delete'>
                    Record number: <input type='text' name='record'>
                    <input type='submit' value="delete record">
                </form>
            </div>
            <div class='two columns'>
            </div>
        </div>
        <div class='row' id="titles">
            <div class='three columns'></div>
            <div class='two columns'><h4>ID</h4></div>
            <div class='two columns'><h4>Email</h4></div>
            <div class='two columns'><h4>Date Added</h4></div>
            <div class='two columns'><h4>Name</h4></div>
            <div class='one columns'>
                <form action='process.php' method='post'>


            </div>
        </div>
<?php 

    $q = $_SESSION['querylog'];

    if( is_array($q[0]) == 1 )  {

        
        foreach($_SESSION['querylog'] as $key => $value ) {

            foreach( $value as $k => $v) {
            echo "<div class='two columns email'>{$v}</div>";
            }        
            echo "<div class='four columns'></div>";
        }
    } 
    elseif ( !isset($q['id']) && $q != false) {
        foreach($_SESSION['querylog'] as $k => $v ) {
            echo "<div class='two columns email'>{$v}</div>";
        }
        echo "<div class='four columns'></div>";
    }

?>
        </div>


    </div>
</body>
</html>