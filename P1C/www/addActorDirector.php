<!DOCTYPE HTML> 
<html>
<head>
<title>CS143 Project 1C</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
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

<body  width="500" border="1" cellpadding="0" cellspacing="0" style="text-align:center;">
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
            <li><a href="addMovie.php">Add a Movie</a></li>
            <li><a href="addActorDirector.php"  class="active">Add an Actor/Director</a></li>
            <li><a href="addActorinMovie.php">Add a Movie/Actor Relation</a></li>
            <li><a href="addDirectorToMovie.php">Add a Movie/Director Relation</a></li>
          </h6>
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
$identity = $fname = $lname = $sex = $dod  = "";
$dob = "NULL";

if ($_SERVER["REQUEST_METHOD"] == "GET") {
   $identity = test_input($_GET["identity"]);
   $fname = test_input($_GET["fname"]);
   $lname = test_input($_GET["lname"]);
   $sex = test_input($_GET["sex"]);
   $dob = test_input($_GET["dob"]);
   $dod = test_input($_GET["dod"]);
   
}

function test_input($data) {
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
}
?>
  <!-- contact -->
  <div class="contact">
    <div class="container">
      <div class="contact-info">
      <h3>Add a new actor/director</h3>   
      </div>
      
      <div class="contact-form" width="500" border="1" cellpadding="0" cellspacing="0" style="text-align:center;" >
  <form method="get" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"> 
   Identity:
   <input type="radio" name="identity" value="Actor">Actor
   <input type="radio" name="identity" value="Director">Director
   <br><br>
   First Name: 
   <input type="text" name="fname" >
   <br><br>
   Last Name: 
   <input type="text" name="lname" >
   <br><br>
   Sex:
   <input type="radio" name="sex" value="Female">Female
   <input type="radio" name="sex" value="Male">Male
   <br><br>
   Date of Birth: 
   <input type="text" name="dob">
   <br><br>
   Date of Death: 
   <input type="text" name="dod">
   <br><br>
 <!--  Comment: <textarea name="comment" rows="5" cols="40"></textarea>
   <br><br> -->

  <button class="btn1 btn-1 btn-1b">Submit</button>
</form>

<?php
$servername = "localhost";
$username = "cs143";
$password = "";
$dbname = "CS143";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT * FROM MaxPersonID";
$rs = $conn->query($sql);
$row = $rs->fetch_array();
$id = $row[0];


if ($dod !="")
{
   if ($identity === "Actor") {
   $sql = "INSERT INTO "."$identity"." VALUES("."$row[0]".", "."'$lname'".", "."'$fname'".", "."'$sex'".", "."$dob".", "."$dod".")";
  // echo $sql;
  } else {
    $sql = "INSERT INTO "."$identity"." VALUES("."$row[0]".", "."'$lname'".", "."'$fname'".", "."$dob".", "."$dod".")";
   //echo $sql;
  }
}
else
  {
   if ($identity === "Actor") {
   $sql = "INSERT INTO "."$identity"." VALUES("."$row[0]".", "."'$lname'".", "."'$fname'".", "."'$sex'".", "."$dob".", "."NULL".")";
  // echo $sql;
  } else {
    $sql = "INSERT INTO "."$identity"." VALUES("."$row[0]".", "."'$lname'".", "."'$fname'".", "."$dob".", "."NULL".")";
   //echo $sql;
  }
  }


if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";

    $sql = "UPDATE MaxPersonID SET id = id + 1";
    $conn->query($sql);
} elseif($conn->query($sql) === FALSE && $lname!= "") {
    echo "Error updating record: " . $conn->error;
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
               <li><a href="movieinfo.php">Browse Content</a></li>
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
