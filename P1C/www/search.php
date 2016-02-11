<!DOCTYPE html>
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
            <li><a href="index.php">Home</a></li>
            <li><a href="addMovie.php">Add New Content</a></li>
<!--             <li><a href="addActorDirector.php">Add an Actor/Director</a></li>
            <li><a href="addActorinMovie.php">Add Movie/Actor Relation</a></li>
            <li><a href="addDirectorToMovie.php">Add Movie/Director Relation</a></li> -->
            <li><a href="addMovie.php">Browse Content</a></li>
            <li><a href="addComment.php">Add Comment</a></li>
            <li><a href="search.php" class="active" >Search</a></li>
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

 <div class="contact">
    <div class="container">
      <div class="contact-info"  width="500" border="1" cellpadding="0" cellspacing="0" style="text-align:center;">
        <h3>Search for actors/movies</h3>
<form method="POST" action="<?php echo $_SERVER["PHP_SELF"];?>">
<input type="text" name="keyword"/>
<input type="submit" value="search"/>
</form>
</form>


       <?php

$key=$_POST["keyword"];
if($key)
{
echo "You are searching: $key <br/>";

$db_connection = mysql_connect("localhost", "cs143", "");
mysql_select_db("CS143", $db_connection);
        $result1 = mysql_query("SELECT id,first,last,dob FROM Actor WHERE last LIKE '%$key%' OR first LIKE '%$key%' OR CONCAT(first,' ',last) LIKE '%$key%';", $db_connection); 
        $result2 = mysql_query("SELECT id,title,year FROM Movie WHERE title LIKE '%$key%';", $db_connection); 


//////////////////edition 1 *********************************//////   

    if(result1){  
    // if($row1 = mysql_fetch_row($result1)){
    //     echo "<br/>"."Search results in Actor database: "."<br/>";
    //    }
        echo "<br/>"."Search results in Actor database: "."<br/>";
        while($row = mysql_fetch_row($result1)) {
                echo "<a href=\"actorinfo.php?mid={$row[0]}\">";
                echo "$row[1] $row[2] </a> $row[3]";
                echo "</br>";
            }
    }

  if(result2){  
    // if($row1 = mysql_fetch_row($result1)){
    //     echo "<br/>"."Search results in Actor database: "."<br/>";
    //    }
        echo "<br/>"."Search results in Movie database: "."<br/>";
        while($row = mysql_fetch_row($result2)) {
                echo "<a href=\"movieinfo.php?mid={$row[0]}\">";
                echo "$row[1] </a> $row[2]";
                echo "</br>";
            }
    }

//////****************edition1**********************////////

}
 mysql_close($db_connection);

?>

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
<!--                <li><a href="addActorDirector.php">Add an Actor/Director</a></li>
               <li><a href="addActorinMovie.php">Add Movie/Actor Relation</a></li>
               <li><a href="addDirectorToMovie.php">Add Movie/Director Relation</a></li> -->
               <li><a href="actorinfo.php">Browse Content</a></li>
            <!--    <li><a href="movieinfo.php">Show Movie Info</a></li> -->
               <li><a href="addComment.php">Add Comment</a></li>
               <li><a href="index.php">Search</a></li>
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