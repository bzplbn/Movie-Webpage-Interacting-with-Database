

<!DOCTYPE HTML> 
<html>
<head>
<title>CS143 Project 1C</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Travlio Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- bootstarp-css -->
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<!--// bootstarp-css -->
<!-- css -->
<link rel="stylesheet" href="css/style.css" type="text/css" media="all" />
<!--// css -->
<script src="js/jquery-1.11.1.min.js"></script>
<script src="js/modernizr.custom.js"></script>
<!---- start-smoth-scrolling---->
<script type="text/javascript" src="js/move-top.js"></script>
<script type="text/javascript" src="js/easing.js"></script>
<script type="text/javascript">
  jQuery(document).ready(function($) {
    $(".scroll").click(function(event){   
      event.preventDefault();
      $('html,body').animate({scrollTop:$(this.hash).offset().top},900);
    });
  });
</script>
</head>

<body align="center">
<div class="header-top">
    <!-- container -->
    <div class="container">
      <div class="header-top-left">
        
        <div class="clearfix"> </div>
      </div>
      
      <div class="clearfix"> </div>
    </div>
    <!-- //container -->
  </div>
  <!-- //header-top -->
  <!-- banner -->
  <div class="banner">
    <!-- container -->
    <div class="container">
      <div class="top-nav">
          <span class="menu">MENU</span>
          <ul class="nav1">
           <h6>
            <li><a href="index.php" >Home</a></li>
            <li><a href="addMovie.php" class="active">Add a Movie</a></li>
            <li><a href="addActorDirector.php">Add an Actor/Director</a></li>
            <li><a href="addActorinMovie.php">Add a Movie/Actor Relation</a></li>
            <li><a href="addDirectorToMovie.php">Add a Movie/Director Relation</a></li>
           </h6><!--  <li><a href="addComment.php">Add a Comment</a></li> -->
          </ul>
          <!-- script-for-menu -->
            <script>
               $( "span.menu" ).click(function() {
              $( "ul.nav1" ).slideToggle( 300, function() {
              // Animation complete.
                });
                });
            </script>
          <!-- /script-for-menu -->
      </div>
      <div class="banner-grids">
        <div class="banner-left">
          <h1>
            <a href="index.php">Mooovie</a>
          </h1>
          <p>The Best Movie Portal</p>
        </div>
        <div class="banner-right">
          <script src="js/responsiveslides.min.js"></script>
          <script>
            // You can also use "$(window).load(function() {"
            $(function () {
              // Slideshow 4
              $("#slider3").responsiveSlides({
              auto: true,
              pager: true,
              nav: false,
              speed: 500,
              namespace: "callbacks",
              before: function () {
                $('.events').append("<li>before event fired.</li>");
              },
              after: function () {
                $('.events').append("<li>after event fired.</li>");
              }
              });
          
            });
          </script>
          <div  id="top" class="callbacks_container">
            <ul class="rslides" id="slider3">
              <li>
                <div class="banner-right-info">
                  <h3>CS143 Database Systems</h3>
                  <p>Project 1C</p>
                </div>
              </li>
              <li>
                <div class="banner-right-info">
                  <h3>Produced by:</h3>
                  <p>Hanjing Fang</p>
                  <p>Yujing Zhang</p>
                </div>
              </li>
            </ul>
          </div>
        </div>
        <div class="clearfix"> </div>
      </div>
    </div>
    <!-- //container -->
  </div>  
  <!-- //banner -->

<!--   connect database: -->
<?php
// define variables and set to empty values
//$key=$_GET["mid"];
$title = $company = $year = $rating = $genre = "";

if ($_SERVER["REQUEST_METHOD"] == "GET") {
   $title = test_input($_GET["title"]);
   $company = test_input($_GET["company"]);
   $year = test_input($_GET["year"]);
   $rating = test_input($_GET["rating"]);
   $genre = test_input($_GET["genre"]);
   
}

function test_input($data) {
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
}
?>

<?php
   $servername = "localhost";
   $username = "cs143";
   $password = "";
   $dbname = "CS143";
   $conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
?>

  <!-- contact -->
  <div class="contact">
    <div class="container">
      <div class="contact-info" >
        <h3>Add a Movie</h3>
      </div>
      
      <div class="contact-form" width="500" border="1" cellpadding="0" cellspacing="0" style="text-align:center;">
        <!-- <h4>Comment</h4> -->
         <br><br>
        <form method="get" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
         <!--  Name: 
          <input type="text" name="name" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Name';}" required="" >
          <br><br> -->
           Title:  
   <input type="text" name="title" >
   <br><br>
   Company:
   <input type="text" name="company" >
   <br><br>
   Year:   
   <input type="text" name="year" >
   <br><br>
   MPAA Rating: 
   <select name = "rating" style="width:80px;">
      <option value="G" >G</option> 
      <option value="NC-17" >NC-17</option> 
      <option value="PG" >PG</option>  
      <option value="PG-13" >PG-13</option>
      <option value="R">R</option> 
      <option value="Surrendere" >Surrendere</option>
   </select>
  
   <br><br>
   Genre:
   <input type="checkbox" name="genre[]" value="Action">Action
   <input type="checkbox" name="genre[]" value="Adult">Adult
   <input type="checkbox" name="genre[]" value="Adventure">Adventure
   <input type="checkbox" name="genre[]" value="Animation">Animation
   <input type="checkbox" name="genre[]" value="Comedy">Comedy
   <input type="checkbox" name="genre[]" value="Crime">Crime
   <input type="checkbox" name="genre[]" value="Documentary">Documentary
   <input type="checkbox" name="genre[]" value="Drama">Drama
   <input type="checkbox" name="genre[]" value="Family">Family
   <input type="checkbox" name="genre[]" value="Fantasy">Fantasy
   <input type="checkbox" name="genre[]" value="Horror">Horror
   <input type="checkbox" name="genre[]" value="Musical">Musical
   <input type="checkbox" name="genre[]" value="Mystery">Mystery
   <input type="checkbox" name="genre[]" value="Romance">Romance
   <input type="checkbox" name="genre[]" value="Sci-Fi">Sci-Fi
   <input type="checkbox" name="genre[]" value="Short">Short
   <input type="checkbox" name="genre[]" value="Thriller">Thriller
   <input type="checkbox" name="genre[]" value="War">War
   <input type="checkbox" name="genre[]" value="Western">Western
   <br><br>
   
 <!--  Comment: <textarea name="comment" rows="5" cols="40"></textarea>
   <br><br> -->
          <button class="btn1 btn-1 btn-1b">Submit</button>
<?php
$sql = "SELECT * FROM MaxMovieID;";
$rs = $conn->query($sql);
$row = $rs->fetch_array();
$id = $row[0];
$sql1 = "INSERT INTO "."Movie"." VALUES("."$id".", "."'$title'".", "."$year".", "."'$rating'".", "."'$company'".");";
//echo $sql1;
if ($conn->query($sql1)  === TRUE) {
    echo "<br/>"."Record updated successfully"."<br/>";

    echo "<a href='addActorinMovie.php?mid=$id'>Add Actor/Movie Relation</a >"."<br/>";
    echo "<a href='addDirectorToMovie.php?mid=$id'>Add Director/Movie Relation</a >";
    $sql = "UPDATE MaxMovieID SET id = id + 1";
    $conn->query($sql);
} elseif($conn->query($sql1) === FALSE && $title!= "") {
    echo "Error updating record: " . $conn->error;
}
if(!empty($_GET["genre"])){
$array = $_GET['genre'];
for ($i=0; $i<sizeof($array);$i++) {
$sql2 = "INSERT INTO "."MovieGenre"." VALUES("."$id".", "."'$array[$i]'".");";
$conn->query($sql2);
//echo $sql2;
}
// if ($conn->query($sql1) && $conn->query($sql2)  === TRUE) {
//     echo "Record updated successfully!";
   
// } elseif($conn->query($sql1) && $conn->query($sql2) === FALSE && $title!= "") {
//     echo "Error updating record: " . $conn->error;
// }
//$conn->query($sql);
}


          $conn->close();
         ?>
        </form>
      </div>  
    </div>
  </div>
 
</form>
<div class="col-md-14 destination-grid">
          <img src="images/14.jpg" alt="" />
          
</div>
<!-- footer -->
  <div class="footer">
    <!-- container -->
    <div class="container">
      <div class="footer-top">
          <div class="footer-grids">
            
            <div class="footer-nav">
              <ul>
               <li><a href="index.php" class="active">Home</a></li>
               <li><a href="addMovie.php">Add Content</a></li>
               <li><a href="addComment.php">Add Comment</a></li>
               <li><a href="search.php">Search</a></li>
              </ul>
            </div>
            <div class="clearfix"> </div>
          </div>
      </div>
    </div>
    <!-- //container -->
  </div>
  <!-- //footer -->



</body>
</html>