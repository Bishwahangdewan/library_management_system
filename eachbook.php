<?php

    //Call config file
    require_once 'db/config.php';

    //require connection
    require_once "db/conn.php";

    $id = mysqli_real_escape_string($conn,$_GET['id']);

    $query = "SELECT * FROM books WHERE bookid ='".$id."';";

    $result = mysqli_query($conn ,$query);

    $books = mysqli_fetch_all($result,MYSQLI_ASSOC);
    
?>

<?php require_once "layout/header.php" ?>
    <?php foreach($books as $book): ?>
        <div class="container">
           <div class="image-container text-center mt-5">
              <img style="height:380px;"  src="image/bookscover/<?php echo $book['cover'] ?>" class="img-fluid">
           </div>

           <h1><?php echo $book['name']; ?></h1>  
           <p class="lead">Author:<?php echo $book['author']; ?></p>
           <p>Book Description: Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quae eveniet sint eligendi blanditiis at modi distinctio, voluptas placeat maiores, libero ipsam porro commodi iste in accusamus? Laudantium id sed consequatur quos expedita quis delectus vel explicabo? Debitis, minus! Fugit tenetur reiciendis velit consequatur dolor repellat nihil. Est totam, quasi tenetur molestiae soluta sed qui rem ipsam assumenda nam necessitatibus dolores repudiandae numquam recusandae. Esse, corrupti facere quam numquam earum, magnam reprehenderit neque vitae vero iure quia consequuntur enim nemo odit explicabo quas quaerat voluptatibus quis excepturi? Ea sunt modi sit neque, sapiente, nihil commodi ipsum voluptate corrupti quasi dolorum voluptas.</p>
           <button class="btn btn-primary" data-toggle="modal" data-target="#confirmation">Issue this book</button>
         </div>

         <!-- Modal -->
        <div class="modal fade" id="confirmation" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
             <div class="modal-content">
              <div class="modal-header">
               <h5 class="modal-title" id="exampleModalLabel">Are you sure you want to issue this book?</h5>
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
              </div>
             <div class="modal-body">
                <strong><?php echo $book['name']; ?></strong>
                <p class="lead"><?php echo $book['author']; ?></p>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <a  class="btn btn-primary" href="<?php echo APPROOT;?>issue.php?id=<?php echo $book['bookid']; ?>">Issue this book</a>
              </div>
         </div>
        </div>
        </div>
    <?php endforeach; ?>


<?php require_once "layout/footer.php" ?>