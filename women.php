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
    
    <div class="jumbotron">
      <div class="container">
        <h1 class="display-3">Forums :  Women</h1>

        <nav class="navbar navbar-expand-sm navbar-light">
            <div class="navbar-nav">
              <a class="nav-item nav-link" href="index.php">All <span class="sr-only">(current)</span></a>
              <a class="nav-item nav-link" href="electronics.php">Electronics</a>
              <a class="nav-item nav-link" href="tv.php">TV & Appliances</a>
              <a class="nav-item nav-link" href="men.php">Men</a>
              <a class="nav-item nav-link active" href="women.php">Women</a>
              <a class="nav-item nav-link" href="baby.php">Baby & Kids</a>
              <a class="nav-item nav-link" href="home.php">Home & Furniture</a>
              <a class="nav-item nav-link" href="sports.php">Sports & Books</a>
              <a class="nav-item nav-link" href="others.php">Others</a>
              <a class="nav-item nav-link" href="#"></a>
            </div>
        </nav>

        <div class="d-flex bd-highlight mb-3">
            <div class="p-2 bd-highlight"></div>
            <div class="p-2 bd-highlight">
                <a class="btn btn-primary btn-info" href="new.php" role="button">+ New Topic</a>
            </div>
            <div class="ml-auto p-2 bd-highlight"></div>
          </div>

      </div>
    </div>

    <div class="container">
        
      <table class="table table-striped ">
        <thead>
          <tr>
            <th scope="col">Forum</th>
            <th scope="col">Category</th>
            <th scope="col">Posts</th>
            <th scope="col">Date/Time</th>
          </tr>
        </thead>
        <tbody>
            
            
    <?php        
            
            $con = mysqli_connect("localhost","root","");
mysqli_select_db($con,"forum");
            
            $insert_query = "select * from forum where topic='Women' order by id desc";
            $res=mysqli_query($con, $insert_query);
           // $arr=mysqli_fetch_array($res);  
            
            if(mysqli_num_rows($res)>0){
                
                while($row=mysqli_fetch_assoc($res)){
                    
                    $z="select COUNT(comment) from comments where post_id=$row[id]";
                    $zz=mysqli_query($con, $z);
                    $zzz=mysqli_fetch_array($zz);
            
          echo "<tr>
            <td><a href=\"post.php?id=$row[id]\" class=\"text-dark\">$row[question]</a></td>
            <td>$row[topic]</td>
            <td>$zzz[0]</td>
            <td>$row[time]</td>
          </tr>";
         
                }
                }
            else
            {
                echo "<tr>
            <td>No Forums Found</td>
            <td></td>
            <td></td>
            <td></td>
          </tr>";
                
            }
          
          
      ?>    
          
          
          </tbody>
      </table>
    </div>

      <br><br><br>
      <footer>
 <center>
  <h6 class="footer">Designed with ❤️ by Subhajit Mondal<h6>
  </center>
      </footer>
   
  </body>
</html>

<!--Electronics
TVs & Appliances
Men
Women
Baby & Kids
Home & Furniture
Sports, Books & More
others
-->