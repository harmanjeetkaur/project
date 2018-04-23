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

	
		</style>
</head>
<body>
 <!--Header-->
 <div class="top-bar_sub_w3layouts_agile">
 <p id="h4">Simcoe Muskoka Workforce Developement Force </p>

 
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
 </div>
</div>
</head>
<body>
 <!--Header-->

<?php 
//load database connection
    $host = "localhost";
    $user = "root";
    $password = "";
    $database_name = "php_beginner_crud_level_1";
    $pdo = new PDO("mysql:host=$host;dbname=$database_name", $user, $password, array(
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ));
// Search from MySQL database table
$search=$_POST['search'];
$query = $pdo->prepare("select * from products where id LIKE '%$search%' OR name LIKE '%$search%'  LIMIT 0 , 10");
$query->bindValue(1, "%$search%", PDO::PARAM_STR);
$query->execute();
// Display search result
         if (!$query->rowCount() == 0) {
		 		echo "<h2>Search found</h2> ";
				echo "<table class='table table-hover table-responsive table-bordered'>";	
                echo "<tr><td style=\"border-style:solid;border-width:1px;border-color:light-grey;background:;\">ID</td><td style=\"border-style:solid;border-width:1px;border-color:light-grey;background:;\">Name</td><td style=\"border-style:solid;border-width:1px;border-color:light-grey;background:;\"Description;background:;\">Description</td><td style=\"border-style:solid;border-width:1px;border-color:light-grey;background:;\">Salary-Range</td></tr>";				
            while ($results = $query->fetch()) {
				echo "<tr><td style=\"border-style:solid;border-width:1px;border-color:light-grey;\">";			
                echo $results['id'];
				echo "</td><td style=\"border-style:solid;border-width:1px;border-color:light-grey;\">";
                echo $results['name'];
				echo "</td><td style=\"border-style:solid;border-width:1px;border-color:light-grey;\">";
                echo "$".$results['description'];
                echo "</td><td style=\"border-style:solid;border-width:1px;border-color:light-grey;\">";
                echo "$".$results['price'];
				echo "</td></tr>";				
            }
				echo "</table>";		
        } else {
            echo 'Nothing found';
        }
?>
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
						<!--<li>
							<a href="services.html">Services</a>
						</li>-->
						<li>
							<a href="events.php">Events</a>
						</li>
						
					</ul>
					<ul class="f_links col-md-4">
						<li>
							<a href="courses.php">Job List</a>
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
</html>