<?php require_once "layout/header.php" ?>
<?php 
	//require connection
    require_once "db/conn.php";
    
    $id = $_SESSION['id'];

    //get book1 data
    $query = "SELECT book1.bookid, book2.bookid2 , book3.bookid3 FROM book1 INNER JOIN book2 ON book1.studentid=book2.studentid INNER JOIN book3 ON book1.studentid =book3.studentid WHERE BOOK1.studentid =$id";
    $result = mysqli_query($conn , $query);
    $issuedbooks = mysqli_fetch_assoc($result);

    //fetch book details

    $bookid1 = $issuedbooks['bookid'];
    $bookid2 = $issuedbooks['bookid2'];
    $bookid3 = $issuedbooks['bookid3'];
 

    if($issuedbooks['bookid'] !== 0){
        //get book from first slot
        $query1 ="SELECT * FROM book1 WHERE bookid =$bookid1  AND studentid =$id ";
        $result1 = mysqli_query($conn , $query1);
        $book1 = mysqli_fetch_assoc($result1);
    
        //get book details
        $query4 ="SELECT * FROM books WHERE bookid =$bookid1";
        $result4 = mysqli_query($conn , $query4);
        $bookdata1 = mysqli_fetch_assoc($result4);
        
    }else{
        $book1 = "";
    }

    if($issuedbooks['bookid2'] != 0){
        $query2 ="SELECT * FROM book2 WHERE bookid2 =$bookid2  AND studentid =$id ";
        $result2 = mysqli_query($conn , $query2);
        $book2 = mysqli_fetch_assoc($result2);
       

        $query5 ="SELECT * FROM books WHERE bookid =$bookid2";
        $result5 = mysqli_query($conn , $query5);
        $bookdata2 = mysqli_fetch_assoc($result5);
       
    }else{
        $book2 = "";
    }
    

    if($bookid3 !== 0){
        $query3 ="SELECT * FROM book3 WHERE bookid3 =$bookid3  AND studentid =$id ";
        $result3 = mysqli_query($conn , $query3);
        $book3 = mysqli_fetch_assoc($result3);

        $query6 ="SELECT * FROM books WHERE bookid =$bookid3";
        $result6 = mysqli_query($conn , $query6);
        $bookdata3 = mysqli_fetch_assoc($result6);
       
    }else{
        $book3 = "nobook";
    }
    
    

  
?>



    <div class="container my-5">
        <h1>Student name : <?php echo $_SESSION['fname'];?> <?php echo $_SESSION['lname']; ?></h1>
        <p class="lead">Department : <?php echo $_SESSION['dept']; ?></p>

        <h3 class="mt-5">Your Books</h3>

        <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Bookname</th>
            <th scope="col">Book id</th>
            <th scope="col">Author</th>
            <th scope="col">Issue date</th>
            <th scope="col">Submission date</th>
        </tr>
        </thead>
         <tbody>
         <?php if(!$book1['bookid'] == 0):?>
         <tr>
             <th scope="row">1</th>
             <td><?php echo $bookdata1['name']; ?></td>
             <td><?php echo $bookdata1['bookid']; ?></td>
             <td><?php echo $bookdata1['author']; ?></td>
             <td><?php echo $book1['issuedate']; ?></td>
             <td><?php echo $book1['submitdate']; ?></td>
         </tr>
        <?php endif; ?>

        <?php if(!$book2['bookid2'] == 0):?>
         <tr>
             <th scope="row">2</th>
             <td><?php echo $bookdata2['name']; ?></td>
             <td><?php echo $bookdata2['bookid']; ?></td>
             <td><?php echo $bookdata2['author']; ?></td>
             <td><?php echo $book2['issuedate']; ?></td>
             <td><?php echo $book2['submitdate']; ?></td>
         </tr>
        <?php endif; ?>

        <?php if(!$book3['bookid3'] == 0):?>
         <tr>
             <th scope="row">3</th>
             <td><?php echo $bookdata3['name']; ?></td>
             <td><?php echo $bookdata3['bookid']; ?></td>
             <td><?php echo $bookdata3['author']; ?></td>
             <td><?php echo $book3['issuedate']; ?></td>
             <td><?php echo $book3['submitdate']; ?></td>
         </tr>
        <?php endif; ?>

        </tbody>
        </table>
    </div>

<?php require_once "layout/footer.php" ?>