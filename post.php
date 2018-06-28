<!doctype html>
<html lang="en">
  <head>
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="icon" href="images/icon.png">
    <title>E-Commerce Forum</title>
  </head>
  <body>
        <nav class="navbar navbar-light bg-light">
                <a class="navbar-brand" href="index.php">
                  <img src="images/icon.png" width="30" height="30" class="d-inline-block align-top" alt="">
                  E-Commerce Forum
                </a>
              </nav>
              <br><br>
    
    <div class="container">
        
        
     <?php   
        
         $con = mysqli_connect("localhost","root","");
        mysqli_select_db($con,"forum");
        
        $q = $_GET['id'];
        $insert_query = "select * from forum where id=$q";
        $res=mysqli_query($con, $insert_query);
           $arr=mysqli_fetch_array($res);
        
        $qq=$arr['question'];
        $dd=$arr['description'];
        $aa=$arr['author'];
        $cc=$arr['topic'];
        $tt=$arr['time'];
        
        
            echo "<h3><span class=\"badge badge-dark\">$cc</span></h3>
            <div class=\"list-group\">
                <div class=\"d-flex w-100 justify-content-between\">
                    <h5 class=\"display-4\">$qq</h5>
                        <small>$tt by <b>$aa</b></small>
                </div>
                <h5><p class=\"mb-1\">$dd</p></h5>
            </div><br><br>";
        
        
        
        
    $insert_query1 = "select * from comments where post_id=$q";
        $res1=mysqli_query($con, $insert_query1);
        
        if(mysqli_num_rows($res1)>0){
            
           while($row1=mysqli_fetch_assoc($res1)){
        

            echo "<div class=\"card bg-light border-secondary\">
            <div class=\"card-body\">
            <div class=\"row no-gutters\">
            <div class=\"col-12 col-sm-6 col-md-8\">$row1[comment]</div>
            <div class=\"col-6 col-md-4\"><small>$row1[time] by <b>$row1[author]</b></small></div>
            </div>
            </div>
            </div>";

        
           }
           }
        else{
            echo "<div class=\"container\"><center>No Comments posted</center></div>";
        }
                
        
        ?>
           

            <!--Input Box--> 
            <br>

            <div class="card bg-light border-dark"><div class="card-body">

            <form action="#" method="post">

            <div class="input-group mb-3">
            <input type="text" name="comment" class="form-control" placeholder="Enter Comment" aria-label="Recipient's username" aria-describedby="basic-addon2">
            <div class="input-group-append">
            <button class="btn btn-outline-dark" type="submit" name="submit">Post Comment</button>
            </div>
            </div>

            <div class="form-row">
            <div class="col">
            <input type="text" class="form-control" placeholder="Author Name" name="author">
            </div>
            <div class="col">
            <input type="text" class="form-control" placeholder="Author's Email ID" name="email">
            </div>
            </div>
            

            </form>

            </div></div>


                   
                
    </div>
      
      <br><br><br>
     <footer>
 <center>
  <h6 class="footer">Designed with ❤️ by Subhajit Mondal<h6>
  </center>
      </footer>


    </body>
    </html>

      
      
      <?php
      
      
      
    if(isset($_POST['submit'])){
        
        
    $comment = $_POST['comment'];
    $author = $_POST['author'];
    $email = $_POST['email'];
        
        if($comment=='' || $author=='' || $email==''){
               echo "<script>alert('Please Enter all the Fields')</script>";
           }
        else{
            
            date_default_timezone_set('Asia/Kolkata');                                          //TIME

            $timestamp = time();
            $date_time = date("d-m-Y (D) H:i:s", $timestamp);
            
                       $ins_query = "insert into comments (post_id, comment, author, email, time) values ('$q','$comment','$author','$email','$date_time')";

                    $result=mysqli_query($con, $ins_query);
            
            echo "<script>window.location.href='post.php?id=$q'</script>";
            
        }
        
        
    }
      
      
      
      
      ?>



 