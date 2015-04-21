<?php

function formval ($post){
    
    $errors = array();

    if (isset($post['email']) && $post['email'] != null) {
        if(!filter_var($post['email'], FILTER_VALIDATE_EMAIL)) {
            $errors[0] = "This is not a valid email.";
        }
    }

    if (isset($post['first_name']) && $post['first_name'] != null) {
        if( preg_match ( "/[^A-Za-z'-]/" , $post['first_name'] ) ) 
            { 
                $errors[1] = "Please use letters only for first name."; 
            }
    }

    if (isset($post['last_name']) && $post['last_name'] != null) {
        if( preg_match ( "/[^A-Za-z'-]/" , $post['last_name'] ) ) 
            { 
                $errors[2] = "Please use letters only for last name."; 
            }
    }

    if (isset($post['password']) && $post['password'] != null) {
        if( count($post['password']) < 6 ) {
            $errors[3] = "Your password must be at least 6 characters.";
        }
    }

    if (isset($post['confirm_password']) && $post['confirm_password'] != null) {
        if( $post['confirm_password'] != $post['password'] ) {
            $errors[4] = "Your passwords must match to register.";
        }
    }

    if (isset($post['birth_date']) && $post['birth_date'] != null) {  

        $date_array = explode('-',$post['birth_date']);

        if ( ! checkdate($date_array[1],$date_array[2],$date_array[0])) {
            $errors[5] = "Please enter a date in the proper format.";
        }

    }

    if( count($errors) > 0) {
        $_SESSION['errors'] = $errors;
    }
    return true;
}

function saveData($tablename, $column1, $column2, $value1, $value2) {
    $emailQuery = "INSERT INTO $tablename ($tablename.$column1, $tablename.$column2) VALUES ('$value1', '$value2');";
    run_mysql_query($emailQuery);
}


// upload photos
function uploadPhoto ( $filename, $target_dir ) {
    // if no target directory
    // if ( $target_dir === undefined) {
    //     $target_dir = "uploads/";
    // }

    $target_file = $target_dir . basename($_FILES[$filename]["name"]);
    $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
    move_uploaded_file($_FILES["pic"]["tmp_name"], $target_file);

    return true;
}

function displayData ($tablename, $column1, $column2) {

    $query = "SELECT * FROM {$tablename};";
    $queryname = fetch($query);


    $data = array();

    if ( count($queryname) > 1 && !isset($queryname['id']) ) {

        foreach ( $queryname as $querynums => $queryarrays ) {

            foreach ( $queryarrays as $querykeys => $queryvalues ) {
                array_push( $data, [ $querykeys => $queryvalues ] );
            }
        }    
    } 
    elseif ( isset($queryname['id']) ) 
    {

        
        foreach ( $queryname as $querynums => $queryvalues ) 
            { 
                // var_dump($queryname);
                array_push($data, $queryvalues);
            }
    }

    elseif ( count($queryname) == 0 )
    {
        return false;
    }

    return $data;
}

function deleteData ($tablename, $row ) {
    $query = "DELETE FROM $tablename;";
    // $queryname = fetch($query);
}

// add column sql

//      ALTER TABLE "table_name"
//      ADD "column_name" "Data Type";















?>