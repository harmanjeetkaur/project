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
    <title>- Create a Record -</title>
      
    <!-- Latest compiled and minified Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
          
</head>
<body>
  
    <!-- container -->
    <div class="container">
   
        <div class="page-header">
            <h1>Create Jobs</h1>
        </div>
      
    <!-- html form to create product will be here -->
    <!-- PHP insert code will be here -->
    <?php
if($_POST){
 
    // include database connection
    include 'config/database.php';
 
    try{
     
        // insert query
$query = "INSERT INTO products
SET name=:name, description=:description,
    price=:price, image=:image, created=:created";

// prepare query for execution
$stmt = $con->prepare($query);

$name=htmlspecialchars(strip_tags($_POST['name']));
$description=htmlspecialchars(strip_tags($_POST['description']));
$price=htmlspecialchars(strip_tags($_POST['price']));

// new 'image' field
$image=!empty($_FILES["image"]["name"])
? sha1_file($_FILES['image']['tmp_name']) . "-" . basename($_FILES["image"]["name"])
: "";
$image=htmlspecialchars(strip_tags($image));

// bind the parameters
$stmt->bindParam(':name', $name);
$stmt->bindParam(':description', $description);
$stmt->bindParam(':price', $price);
$stmt->bindParam(':image', $image);

// specify when this record was inserted to the database
$created=date('Y-m-d H:i:s');
$stmt->bindParam(':created', $created);
         
        // Execute the query
        if($stmt->execute()){
            echo "<div class='alert alert-success'>Record was saved.</div>";
        
        // now, if image is not empty, try to upload the image
if($image){
    
       // sha1_file() function is used to make a unique file name
       $target_directory = "uploads/";
       $target_file = $target_directory . $image;
       $file_type = pathinfo($target_file, PATHINFO_EXTENSION);
    
       // error message is empty
       $file_upload_error_messages="";

// make sure the 'uploads' folder exists
// if not, create it
if(!is_dir($target_directory)){
    mkdir($target_directory, 0777, true);
}
// if $file_upload_error_messages is still empty
if(empty($file_upload_error_messages)){
    // it means there are no errors, so try to upload the file
    if(move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)){
        // it means photo was uploaded
    }else{
        echo "<div class='alert alert-danger'>";
            echo "<div>Unable to upload photo.</div>";
            echo "<div>Update the record to upload photo.</div>";
        echo "</div>";
    }
}
 
// if $file_upload_error_messages is NOT empty
else{
    // it means there are some errors, so show them to user
    echo "<div class='alert alert-danger'>";
        echo "<div>{$file_upload_error_messages}</div>";
        echo "<div>Update the record to upload photo.</div>";
    echo "</div>";
}
    
   }}else{
            echo "<div class='alert alert-danger'>Unable to save record.</div>";
        }
         
    }
     
    // show error
    catch(PDOException $exception){
        die('ERROR: ' . $exception->getMessage());
    }
}
?>
<!-- html form here where the product information will be entered -->
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" enctype="multipart/form-data">   
 <table class='table table-hover table-responsive table-bordered'>
        <tr>
            <td>Name</td>
            <td><input type='text' name='name' class='form-control' /></td>
        </tr>
        <tr>
            <td>Description</td>
            <td><textarea name='description' class='form-control'></textarea></td>
        </tr>
        <tr>
            <td>Salary-Range</td>
            <td><input type='text' name='price' class='form-control' /></td>
        </tr>
        <tr>
            <td>Photo</td>
            <td><input type="file" name="image" /></td>
        </tr>
        <tr>
            <td></td>
            <td>
                <input type='submit' value='Save' class='btn btn-primary' />
                <a href='welcome.php' class='btn btn-danger'>Back to read jobs</a>
            </td>
        </tr>
    </table>
</form>
          <br>
          <br>
          <br>
    </div> <!-- end .container -->
      
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
   
<!-- Latest compiled and minified Bootstrap JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  
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
</body>
</html>