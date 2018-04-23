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
         <li><a href="">User-login</a><span>|</span></li>
         <li><a href="signin.php">Admin-Login</a><span>|</span></li>
		 <li><a href="contact.html">Contact</a><span>|</span></li>
		 <li><a href="about.html">About</a><span>|</span></li>
		 <li><a href="registration.php">Jobs List</a><span>|</span></li>        
		 <li><a href="events.php">Events</a><span>|</span></li>

	 </ul>
 </div>
</div>
</head>
<body>
 <!--Header-->

 

<head>
    <title> - Update a Record -</title>
     
    <!-- Latest compiled and minified Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
         
</head>
<body>
 
    <!-- container -->
    <div class="container">
  
        <div class="page-header">
            <h1>Update Jobs</h1>
        </div>
     
        <!-- PHP read record by ID will be here -->
        <?php
// get passed parameter value, in this case, the record ID
// isset() is a PHP function used to verify if a value is there or not
$id=isset($_GET['id']) ? $_GET['id'] : die('ERROR: Record ID not found.');
 
//include database connection
include 'config/database.php';
 
// read current record's data
try {
    // prepare select query
    $query = "SELECT id, name, description, price FROM products WHERE id = ? LIMIT 0,1";
    $stmt = $con->prepare( $query );
     
    // this is the first question mark
    $stmt->bindParam(1, $id);
     
    // execute our query
    $stmt->execute();
     
    // store retrieved row to a variable
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
     
    // values to fill up our form
    $name = $row['name'];
    $description = $row['description'];
    $price = $row['price'];
}
 
// show error
catch(PDOException $exception){
    die('ERROR: ' . $exception->getMessage());
}
?>

        <!-- HTML form to update record will be here -->
         <!-- PHP post to update record will be here -->
         <?php
 
// check if form was submitted
if($_POST){
     
    try{
     
        // write update query
        // in this case, it seemed like we have so many fields to pass and 
        // it is better to label them and not use question marks
        $query = "UPDATE products 
                    SET name=:name, description=:description, price=:price 
                    WHERE id = :id";
 
        // prepare query for excecution
        $stmt = $con->prepare($query);
 
        // posted values
        $name=htmlspecialchars(strip_tags($_POST['name']));
        $description=htmlspecialchars(strip_tags($_POST['description']));
        $price=htmlspecialchars(strip_tags($_POST['price']));
 
        // bind the parameters
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':description', $description);
        $stmt->bindParam(':price', $price);
        $stmt->bindParam(':id', $id);
         
        // Execute the query
        if($stmt->execute()){
            echo "<div class='alert alert-success'>Record was updated.</div>";
        }else{
            echo "<div class='alert alert-danger'>Unable to update record. Please try again.</div>";
        }
         
    }
     
    // show errors
    catch(PDOException $exception){
        die('ERROR: ' . $exception->getMessage());
    }
}
?>
<!--we have our html form here where new record information can be updated-->
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"] . "?id={$id}");?>" method="post">
    <table class='table table-hover table-responsive table-bordered'>
        <tr>
            <td>Name</td>
            <td><input type='text' name='name' value="<?php echo htmlspecialchars($name, ENT_QUOTES);  ?>" class='form-control' /></td>
        </tr>
        <tr>
            <td>Description</td>
            <td><textarea name='description' class='form-control'><?php echo htmlspecialchars($description, ENT_QUOTES);  ?></textarea></td>
        </tr>
        <tr>
            <td>Salary-Range</td>
            <td><input type='text' name='price' value="<?php echo htmlspecialchars($price, ENT_QUOTES);  ?>" class='form-control' /></td>
        </tr>
        <tr>
            <td></td>
            <td>
                <input type='submit' value='Save Changes' class='btn btn-primary' />
                <a href='welcome.php' class='btn btn-danger'>Back to read jobs</a>
            </td>
        </tr>
    </table>
</form>
    </div> <!-- end .container -->
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

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
   
<!-- Latest compiled and minified Bootstrap JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 
</body>
</html>