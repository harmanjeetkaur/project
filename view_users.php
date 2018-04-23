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
 <a href="login.php" id="logout">Log-Out</a>
 
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


<link type="text/css" rel="stylesheet" href="bootstrap-3.2.0-dist\css\bootstrap.css"> <!--css file link in bootstrap folder-->
    <title>View Users</title>
</head>
<style>
    .login-panel {
        margin-top: 150px;
    }
    .table {
        margin-top: 50px;

    }

</style>

<body>

<div class="table-scrol">
    <h1 align="center">All the Users</h1>

<div class="table-responsive"><!--this is used for responsive display in mobile and other devices-->


    <table class="table table-bordered table-hover table-striped" style="table-layout: fixed">
        <thead>

        <tr>

            <th>User Id</th>
            <th>User Name</th>
            <th>User E-mail</th>
            <th>User Pass</th>
        </tr>
        </thead>

        <?php
        include("database/db_conection.php");
        $view_users_query="select * from users";//select query for viewing users.
        $run=mysqli_query($dbcon,$view_users_query);//here run the sql query.

        while($row=mysqli_fetch_array($run))//while look to fetch the result and store in a array $row.
        {
            $user_id=$row[0];
            $user_name=$row[1];
            $user_email=$row[2];
            $user_pass=$row[3];



        ?>

        <tr>
<!--here showing results in the table -->
            <td><?php echo $user_id;  ?></td>
            <td><?php echo $user_name;  ?></td>
            <td><?php echo $user_email;  ?></td>
            <td><?php echo $user_pass;  ?></td>
        </tr>

        <?php } ?>

    </table>
        </div>
        <center>
        Click here to Download data.
    <form method="post" action="export.php">
     <input type="submit" name="export" class="btn btn-success" value="Export" />
    </form>
    <center>
</div>
<br>
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
                        <!--<li>
                            <a href="services.html">Services</a>
                        </li>-->
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
            <h2 class="footer-logo"><a href="index.html">Simcoe Muskoka <span> Workforce Development Board</span></a></h2>
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
