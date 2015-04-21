<?php
session_start();
require_once('functions.php');
require_once('new-connection.php');



if( $_POST['action'] == 'login') {
    formval($_POST);
} elseif ( $_POST['action'] == 'delete'){
    $deleteQuery = "DELETE FROM emails WHERE id = {$_POST['record']};";
    run_mysql_query($deleteQuery);
    
    $_SESSION['querylog'] = displayData( 'emails', 'name', 'email' ); 

    header('Location: success.php');
}

if( isset($_SESSION['errors']) && $_POST['action'] == 'login') 
{
    header('Location: index.php');

} elseif($_SESSION && $_POST['action'] == 'login' )
{
    $_SESSION['loggedIN'] = 'user';
    $_SESSION['useremail'] = $_POST['email'];
    saveData('emails', 'email', 'name', $_POST['email'], $_POST['name']);
    $_SESSION['querylog'] = displayData( 'emails', 'name', 'email' ); 
    header('Location: success.php');
}


?>