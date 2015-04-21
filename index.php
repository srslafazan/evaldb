<?php
session_start();
require_once('functions.php');

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
            <div class='twelve columns'>
            <h1>Please Register! : )</h1>
            </div>
        </div>

        <div class='row'>
            <div class='two columns'>
            <form action='process.php' method='post'>
                <input type='hidden' name='action' value='login'>
                Name: <input type='text' name='name'>
                Email: <input type='text' name='email'>
                <?php if(isset($_SESSION['errors']) && $_SESSION['errors'][0] != null) 
                    {
                        echo $_SESSION['errors'][0];
                        session_unset('errors');
                    }
                ?>
                <input type='submit' value='Register'>
            </form>
            </div>
            <div class='three columns' id='errors'></div>
        </div>
    </div>
</body>
</html>