<?php 
require_once "layout/header.php";
require_once "db/conn.php";
?>

<?php
    $id =$_SESSION['id'];
    $book_id = $_GET['id'];
    
    
    //get book1 data and do not insert if there is a book
    $query ="SELECT * FROM book1 WHERE studentid = $id";
    $result = mysqli_query($conn, $query);
    $book =mysqli_fetch_assoc($result);
    
    //if there is a book in the slot
    if(!$book['bookid'] == 0){
        //get book2 data and do not insert if book is present

        $query1 ="SELECT * FROM book2 WHERE studentid = $id";
        $result1 = mysqli_query($conn, $query1);
        $book1 =mysqli_fetch_assoc($result1);
        
        //if there is a book in the slot
        if(!$book1['bookid2'] == 0){
             //get book3 data and do not insert if book is present

             $query2 ="SELECT * FROM book3 WHERE studentid = $id";
             $result2 = mysqli_query($conn, $query2);
             $book2 =mysqli_fetch_assoc($result2);
            
             //check if there is a book in slot 3
             if(!$book2['bookid3'] == 0){
                echo "There is a book";

                header("Location:error.php?msg=bookoverflow");
               
             }else{
                 //insert bookid date of issue and date of return if there is no book
                echo "There is no book";
                //issue date
                $date =date("Y-m-d");
                echo $date;
                //return date
                $returndate = new DateTime($date);
                $returndate->modify('+14 day');
                $submitdate = $returndate->format('Y-m-d');
                echo $submitdate;

                //updatedatabase
                $updatebook3 = "UPDATE book3 SET bookid3='$book_id',issuedate='$date',submitdate='$submitdate' WHERE studentid=$id";
                if(mysqli_query($conn,$updatebook3)){
                    header("Location:profile.php");
                }else{
                    echo "something went wrong";
                }
             }
            
        }else{
            //insert bookid date of issue and date of return if there is no book
            echo "there is not a book";
              //insert bookid date of issue and date of return if there is no book
              echo "There is no book";
              //issue date
              $date =date("Y-m-d");
              echo $date;
              //return date
              $returndate = new DateTime($date);
              $returndate->modify('+14 day');
              $submitdate = $returndate->format('Y-m-d');
              echo $submitdate;

              //updatedatabase
              $updatebook2 = "UPDATE book2 SET bookid2='$book_id',issuedate='$date',submitdate='$submitdate' WHERE studentid=$id";
              if(mysqli_query($conn,$updatebook2)){
                header("Location:profile.php");
              }else{
                  echo "something went wrong";
              }
           }

    }else{
        //insert bookid date of issue and date of return if there is no book
        echo "there is not a book";

          //insert bookid date of issue and date of return if there is no book
          echo "There is no book";
          //issue date
          $date =date("Y-m-d");
          echo $date;
          //return date
          $returndate = new DateTime($date);
          $returndate->modify('+14 day');
          $submitdate = $returndate->format('Y-m-d');
          echo $submitdate;

          //updatedatabase
          $updatebook = "UPDATE book1 SET bookid='$book_id',issuedate='$date',submitdate='$submitdate' WHERE studentid=$id";
          if(mysqli_query($conn,$updatebook)){
            header("Location:profile.php");
          }else{
              echo "something went wrong";
          }
       }
    

?>