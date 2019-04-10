<?php
    if(isset($_POST['submit'])){
        //validate form
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $cpassword = $_POST['cpassword'];
        $dept = $_POST['dept'];

        echo "$fname $lname $email $password $cpassword";

        if($password !== $cpassword){
            
        }

    }else{
        die("Something went wrong");
    }

?>