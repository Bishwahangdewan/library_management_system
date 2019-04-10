<?php 

    require_once "layout/header.php";
    require_once "db/conn.php";
    require_once 'db/config.php';

    //create new rows in book1 book2 and book3 table for the user

    $registered_user_email = $_GET['email'];
    
    $get_id_query = "SELECT id FROM students WHERE email ='".$registered_user_email."';";

    $result = mysqli_query($conn,$get_id_query);

    $id = mysqli_fetch_assoc($result);
    
    $registered_id = $id['id'];

    //create table for book 1

    $book1query = "INSERT INTO book1 (studentid,bookid,issuedate,submitdate) VALUES ('$registered_id','0','0000-00-00','0000-00-00')";
    $book2query = "INSERT INTO book2 (studentid,bookid2,issuedate,submitdate) VALUES ('$registered_id','0','0000-00-00','0000-00-00')";
    $book3query = "INSERT INTO book3 (studentid,bookid3,issuedate,submitdate) VALUES ('$registered_id','0','0000-00-00','0000-00-00')";

    if(mysqli_query($conn,$book1query) && mysqli_query($conn,$book2query) && mysqli_query($conn,$book3query)){
        header("Location:login.php");
    }else{
        echo "something went wrong";
    }