<?php
session_start();

if(!$_SESSION['email'])
{

    header("Location: login.php");//redirect to login page to secure the welcome page without login access.
}

?>

<html>
<head>

    <title>
        Registration
    </title>



<!DOCTYPE HTML>
<html>

<head>
<title>Simcoe Muskoka Workforce Developement Force</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta charset="utf-8">
<meta name="keywords">

<script type="application/x-javascript">
	addEventListener("load", function () {
		setTimeout(hideURLbar, 0);
	}, false);

	function hideURLbar() {
		window.scrollTo(0, 1);
	}
</script>
<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
<link href="css/style.css" rel='stylesheet' type='text/css' />
<link href="css/about.css" rel='stylesheet' type='text/css' />
<link rel="stylesheet" href="css/team.css" type="text/css" media="all" />
<link href="css/font-awesome.css" rel="stylesheet">
<link href="//fonts.googleapis.com/css?family=Merriweather+Sans:300,300i,400,400i,700,700i,800" rel="stylesheet">
<link href="//fonts.googleapis.com/css?family=Mallanna" rel="stylesheet">

<style>
	#h{
		color: #00a78e;
		font-weight: 100;
		display: block;
		font-size: 1em;
		letter-spacing: 1px;
		
		
	}
	#h3{
		
		color: #fff;
		font-size: 48px;
		text-decoration: none;
		font-weight: 400;
	
	}
	#h4{
		
		color: white;
		font-weight: 100;
		display: block;
		font-size: 1em;
		letter-spacing: 1px;
		display: inline;
	
	   
	}
	
	#h3, #h{
		margin-left: 25px;
	}

	#logout{
		float:right;
		margin-right: 25px;
		color: #00a78e;
		font-weight: 100;
		display: block;
		font-size: 1em;
		letter-spacing: 1px;
	}
		</style>
</head>
<body>

 <!--Header-->
 <div class="top-bar_sub_w3layouts_agile">
 <p id="h4">Simcoe Muskoka Workforce Developement Force </p>
<a href="logout.php" id="logout">Logout here</a> 



 <div class="search">
	 <div class="cd-main-header">
		 
		 <!-- cd-header-buttons -->
	 </div>
	 
 </div>
 <div class="clearfix"> </div>
</div>
<div class="header inner_banner" id="home">
 <p id="h3">Simcoe Muskoka</p>
 <span id="h"> Workforce Development Board</span>
 </div>

 <!--//top-bar-->
 <!--/ banner-text -->
 <!--// banner-text -->
</div>
<!--//inner_banner-->
<!--/short-->
<div class="services-breadcrumb-w3ls-agile">
 <div class="inner_breadcrumb">

	 <ul class="short">
     <li><a href="index.php">Home</a><span>|</span></li>
     <li><a href="about.html">About</a><span>|</span></li>
     <li><a href="courses.php">Jobs List</a><span>|</span></li>        
     <li><a href="contact.html">Contact</a><span>|</span></li>
     <li><a href="events.php">Events</a><span>|</span></li>


 </ul>
         <?php
echo $_SESSION['email'];
?>

	 </ul>
 </div>
</div>
	<!--//short-->
	<!-- //inner_content -->
    <!-- container -->
   
    <?php
    $sql = "SELECT * FROM products ORDER BY name ASC LIMIT 0, 20";
    ?>
    <?php
error_reporting(0);
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "php_beginner_crud_level_1";
$datatable = "products"; // MySQL table name
$results_per_page = 20; // number of results per page
 
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
?>
    <div class="container">
  
        <div class="page-header">
            <h1>Read Job's Information</h1>
          <a href="view_users.php" class='btn btn-danger'>  View users  </a>
        </div>
     
        <!-- PHP code to read records will be here -->
        <?php
// include database connection
include 'config/database.php';
 // PAGINATION VARIABLES
// page is the current page, if there's nothing set, default is page 1
$page = isset($_GET['page']) ? $_GET['page'] : 1;

// set records or rows of data per page
$records_per_page = 5;

// calculate for the query LIMIT clause
$from_record_num = ($records_per_page * $page) - $records_per_page;
// delete message prompt will be here8
$action = isset($_GET['action']) ? $_GET['action'] : "";

// if it was redirected from delete.php
if($action=='deleted'){
   echo "<div class='alert alert-success'>Record was deleted.</div>";
}
// select all data
$query = "SELECT id, name, description, price FROM products ORDER BY id DESC";
$stmt = $con->prepare($query);
$stmt->execute();
 
// this is how to get number of rows returned
$num = $stmt->rowCount();
 
// link to create record form
echo "<a href='create.php' class='btn btn-primary m-b-1em'>Create new Job</a>";
 
//check if more than 0 record found
if($num>0){
 
    // data from database will be here
    echo "<table class='table table-hover table-responsive table-bordered'>";//start table
    
       //creating our table heading
       echo "<tr>";
           echo "<th>ID</th>";
           echo "<th>Name</th>";
           echo "<th>Description</th>";
           echo "<th>Salary-range</th>";
           echo "<th>Action</th>";
       echo "</tr>";
        
       // table body will be here
    // retrieve our table contents
// fetch() is faster than fetchAll()
// http://stackoverflow.com/questions/2770630/pdofetchall-vs-pdofetch-in-a-loop
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
    // extract row
    // this will make $row['firstname'] to
    // just $firstname only
    extract($row);
     
    // creating new table row per record
    echo "<tr>";
        echo "<td>{$id}</td>";
        echo "<td>{$name}</td>";
        echo "<td>{$description}</td>";
        echo "<td>&#36;{$price}</td>";
        echo "<td>";
            // read one record 
            echo "<a href='read.php?id={$id}' class='btn btn-info m-r-1em'>Read</a>";
             
            // we will use this links on next part of this post
            echo "<a href='update.php?id={$id}' class='btn btn-primary m-r-1em'>Edit</a>";
 
            // we will use this links on next part of this post
            echo "<a href='#' onclick='delete_user({$id});'  class='btn btn-danger'>Delete</a>";
        echo "</td>";
    echo "</tr>";
}
   // end table
   echo "</table>";
     
}
 
// if no records found
else{
    echo "<div class='alert alert-danger'>No records found.</div>";
}
?>
    </div> <!-- end .container -->
    <center>
    
</center>
    <br>
    <br>
	<?php
$connect = mysqli_connect("localhost", "root", "", "php_beginner_crud_level_1");
$sql = "SELECT * FROM products";  
$result = mysqli_query($connect, $sql);
?>
 <head>  
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
 </head>  
 <body>  
  <div class="container">  
   <br />  
   <br />  
   <br />  
   
     <?php
     while($row = mysqli_fetch_array($result))  
     {  
         '  
       <tr>  
         <td>'.$row["id"].'</td>  
         <td>'.$row["name"].'</td>  
         <td>'.$row["description"].'</td>  
         <td>'.$row["price"].'</td>  
       </tr>  
        ';  
     }
     ?>
    </table>
    <br />
    
   </div>  
  </div>  
 </body>  
</html>

    <!--footer-->
	 <div class="contact-footer-w3layouts-agile">
	 
			 <div class="bottom-social-agileits-w3ls">
				 <div class="container">
					 <div class="col-md-8 botttom-nav-w3ls-agileits">
						 <ul class="f_links col-md-4">
							 <li>
								 <a href="index.php">Home</a>
							 </li>
							 <li>
								 <a href="about.html">About</a>
							 </li>
							 
							 <li>
								 <a href="events.php">Events</a>
							 </li>
							 
						 </ul>
						 <ul class="f_links col-md-4">
							 <li>
								 <a href="login.php">Job List</a>
							 </li>
							 <li>
								 <a href="contact.html">Contact</a>
							 </li>
							 
						 </ul>
						 
						 <div class="clearfix"></div>
					 </div>
					 <div class="col-md-4 social-icons-wthree">
						 <h6>Connect with us</h6>
						 <a class="facebook" href="#"><span class="fa fa-facebook"></span></a>
						 <a class="twitter" href="#"><span class="fa fa-twitter"></span></a>
						 <a class="pinterest" href="#"><span class="fa fa-pinterest-p"></span></a>
						 <a class="linkedin" href="#"><span class="fa fa-linkedin"></span></a>
					 </div>
					 <div class="clearfix"></div>
	 
				 </div>
			 </div>
			 <div class="copy-w3-agileits">
				 <h2 class="footer-logo"><a href="index.php">Simcoe Muskoka <span> Workforce Development Board</span></a></h2>
				 <p>© 2018 Simcoe Muskoka Workforce Development Board,ON,Canada . All Rights Reserved | </p>
				 <div class="clearfix"></div>
			 </div>
		 </div>
		 
		 <a href="#" id="toTop" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>
		 <script type="text/javascript" src="js/bootstrap-3.1.1.min.js"></script>
	 
	 
	 <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
	 <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
		
	 <!-- Latest compiled and minified Bootstrap JavaScript -->
	 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	  
	 <!-- confirm delete record will be here -->
	 <script type='text/javascript'>
	 // confirm record deletion
	 function delete_user( id ){
		  
		 var answer = confirm('Are you sure?');
		 if (answer){
			 // if user clicked ok, 
			 // pass the id to delete.php and execute the delete query
			 window.location = 'delete.php?id=' + id;
		 } 
	 }
	 </script>
            <!--/footer -->
            <!-- js -->
	<script type="text/javascript" src="js/jquery-2.2.3.min.js"></script>
	<!-- //js -->
	<!--search-bar-->
	<script src="js/main.js"></script>
	<!--gallery -->
	<script src="js/jquery.chocolat.js"></script>
	<!--light-box-files -->
	<script type="text/javascript">
		$(function () {
			$('.gallery-grid1 a').Chocolat();
		});
	</script>
	<!-- //gallery -->
	<script src="js/responsiveslides.min.js"></script>
	<script>
		$(function () {
			$("#slider4").responsiveSlides({
				auto: true,
				pager: true,
				nav: true,
				speed: 1000,
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
	<!--//search-bar-->
	<link rel="stylesheet" type="text/css" href="css/easy-responsive-tabs.css " />
	<script src="js/easyResponsiveTabs.js"></script>
	<!--Plug-in Initialisation-->
	<script type="text/javascript">
		$(document).ready(function () {

			//Vertical Tab
			$('#parentVerticalTab').easyResponsiveTabs({
				type: 'vertical', //Types: default, vertical, accordion
				width: 'auto', //auto or any width like 600px
				fit: true, // 100% fit in a container
				closed: 'accordion', // Start closed if in accordion view
				tabidentify: 'hor_1', // The tab groups identifier
				activate: function (event) { // Callback function if tab is switched
					var $tab = $(this);
					var $info = $('#nested-tabInfo2');
					var $name = $('span', $info);
					$name.text($tab.text());
					$info.show();
				}
			});
		});
	</script>
	<!--/script-->
	<!-- stats -->
	<script src="js/jquery.waypoints.min.js"></script>
	<script src="js/jquery.countup.js"></script>
	<script>
		$('.counter').countUp();
	</script>
	<!-- //stats -->


	<!-- start-smoth-scrolling -->
	<script type="text/javascript" src="js/move-top.js"></script>
	<script type="text/javascript" src="js/easing.js"></script>
	<script type="text/javascript">
		jQuery(document).ready(function ($) {
			$(".scroll").click(function (event) {
				event.preventDefault();
				$('html,body').animate({
					scrollTop: $(this.hash).offset().top
				}, 900);
			});
		});
	</script>
	<!-- start-smoth-scrolling -->

	<script type="text/javascript">
		$(document).ready(function () {
			/*
									var defaults = {
							  			containerID: 'toTop', // fading element id
										containerHoverID: 'toTopHover', // fading element hover id
										scrollSpeed: 1200,
										easingType: 'linear' 
							 		};
									*/

			$().UItoTop({
				easingType: 'easeOutQuart'
			});

		});
	</script>

</body>
</html>