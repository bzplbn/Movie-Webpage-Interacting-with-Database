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

<body width="500" border="1" cellpadding="0" cellspacing="0" style="text-align:center;">
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
            <li><a href="movieinfo.php" class="active">Browse Movie Information</a></li>
            <li><a href="actorinfo.php"  >Browse Actor Information</a></li>
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
// $key= 3;
$key=$_GET["mid"];
if(is_null($key)){
    $key=3;
}


$db_connection = mysql_connect("localhost", "cs143", "");
mysql_select_db("CS143", $db_connection);

//Movie Info--title producer MPAA
$result1 = mysql_query("SELECT title,company,rating,year FROM Movie WHERE id=$key");
//MovieInfo--director
$result2 = mysql_query("SELECT concat (first,' ',last),dob FROM MovieDirector MD,Director D WHERE MD.did=D.id AND MD.mid=$key ");
//MovieInfo--genre
$result3 = mysql_query("SELECT genre FROM MovieGenre WHERE mid=$key");
//ActorInfo--Actorname,role
$result4 = mysql_query("SELECT concat (first,' ',last),role,aid FROM MovieActor MA, Actor A WHERE MA.mid=$key AND MA.aid=A.id ");

$result5 = mysql_query("SELECT * FROM Review WHERE mid=$key" );
$result55 = mysql_query("SELECT * FROM Review WHERE mid=$key" );

$result6 =mysql_query("SELECT AVG(rating) FROM Review where mid=$key group by mid");
$result7 =mysql_query("SELECT count(name) FROM Review where mid=$key");


//-----------SHOW MOVIEW INFO----------------------
if($result1){
  echo "----Show Movie Information----"."<br/>";
while($row = mysql_fetch_row($result1)) {
    echo "Title: $row[0] ($row[3])"."<br/>";
    echo "Producer: $row[1]"."<br/>";
    echo "MPAA Rating: $row[2]"."<br/>";  
  }
}


if($result2){
    echo "Director: ";
    while($row = mysql_fetch_row($result2)) {
    echo "$row[0]($row[1])    ";
    }
    echo "<br/>";
}

if($result3){
    echo "Genre: ";
while($row = mysql_fetch_row($result3)) {
    echo "$row[0]  ";
    }
    echo "<br/>";
}

echo "<br/>";

//-------------ACTOR IN THIS MOVIE-----------

if($result4){
    echo "----Actor in this movie----"."<br/>";
while($row = mysql_fetch_row($result4)) {
    echo "<a href='actorinfo.php?mid=$row[2]'>$row[0]</a> acts as $row[1]"."<br/>";
    }
}
echo "<br/>";



//------------User Review-----------------
if($result3){
echo "----User Review----"."<br/>";

$row2 = mysql_fetch_row($result6);
$row3 = mysql_fetch_row($result7);

 echo "Average Score: $row2[0]/5(5.0 is the best) by $row3[0] reviews"."<br/>";

$row4 = mysql_fetch_row($result55);
if(is_null($row4[0])){
    echo "Sorry, none review this movie. "; 
}
else{
    echo "All comments in Details:"."<br/>";
    while($row = mysql_fetch_row($result5)){


    echo "Name: $row[0]";
    echo "  Comment time: $row[1]"."<br/>";
    echo "  Comment content: $row[4]"."<br/>";   

}

}


echo "<a href='addComment.php?mid=$key'>Add your review now!!!</a> ";
}


mysql_close($db_connection);

?>
  <!-- contact -->
  <div class="contact">
    <div class="container">
      <div class="contact-info" >
      <h3>Search for other movies/actors</h3>   
      </div>

<form method="POST" action="./search.php" align="center">
<input type="text" name="keyword"/>
  <button class="btn1 btn-1 btn-1b">Submit</button>
</form>


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

