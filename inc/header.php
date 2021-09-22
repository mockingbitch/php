<?php
include 'lib/session.php';
Session::init();
?>
<?php
include_once 'lib/database.php';
include_once 'helpers/format.php';
spl_autoload_register(function($className){include_once 'classes/'.$className.".php";});
$db = new Database();
$fm = new Format();
$cart = new cart();
$user = new user();
$product = new product();
$sessionid = session_id();
?>
<?php
header("Cache-Control: no-cache, must-revalidate");
header("Pragma:no-cache");
header("Expires: Sat, 26 Jul 1997 05:00:00 GMT");
header("Cache-Control: max-age=2592000");
?>

<!DOCTYPE HTML>
<html>
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Hội quán &mdash; trang chủ</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Free HTML5 Website Template by freehtml5.co" />
	<meta name="keywords" content="free website templates, free html5, free template, free bootstrap, free website template, html5, css3, mobile first, responsive" />
	<meta name="author" content="freehtml5.co" />
  	<!-- Facebook and Twitter integration -->
	<meta property="og:title" content=""/>
	<meta property="og:image" content=""/>
	<meta property="og:url" content=""/>
	<meta property="og:site_name" content=""/>
	<meta property="og:description" content=""/>
	<meta name="twitter:title" content="" />
	<meta name="twitter:image" content="" />
	<meta name="twitter:url" content="" />
	<meta name="twitter:card" content="" />

	<link href="https://fonts.googleapis.com/css?family=Josefin+Slab:400,600,700" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Sacramento" rel="stylesheet">
	<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Noto+Sans&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Amatic+SC:wght@700&family=Dancing+Script:wght@700&family=Noto+Sans&display=swap" rel="stylesheet">
	
	<!-- Animate.css -->
	<link rel="stylesheet" href="css/animate.css">
	<!-- Icomoon Icon Fonts-->
	<link rel="stylesheet" href="css/icomoon.css">
	<!-- Bootstrap  -->
	<link rel="stylesheet" href="css/bootstrap.css">

	<!-- Magnific Popup -->
	<link rel="stylesheet" href="css/magnific-popup.css">

	<!-- Flexslider  -->
	<link rel="stylesheet" href="css/flexslider.css">

	<!-- Theme style  -->
	<link rel="stylesheet" href="css/style.css">

	<!-- Modernizr JS -->
	<script src="js/modernizr-2.6.2.min.js"></script>
	<!-- FOR IE9 below -->
	<!--[if lt IE 9]>
	<script src="js/respond.min.js"></script>
	<![endif]-->

	</head>
	<body>
		
		<div class="fh5co-loader"></div>
		
		<div id="page">
		<nav class="fh5co-nav" role="navigation">
			<div class="container-fluid">
				<div class="row">
					<div class="top-menu">
						<div class="container">
							<div class="row">
								<div class="col-sm-7 text-left menu-1">
									<ul>
										<li class="active"><a href="index.php">Trang chủ</a></li>
										<li><a href="blog.php">Giới thiệu</a></li>
										<li class="has-dropdown">
											<a href="blog.php">Bài viết</a>
											<ul class="dropdown">
												<li><a href="#">Web Design</a></li>
												<li><a href="#">eCommerce</a></li>
												<li><a href="#">Branding</a></li>
												<li><a href="#">API</a></li>
											</ul>
										</li>
										<li><a href="about.php">Về chúng tôi</a></li>
										<li><a href="contact.php">Liên hệ</a></li>
									</ul>
								</div>
								<div class="col-sm-5">
								<ul class="fh5co-social-icons">
										<li><a href="admin/index.php"><input type="submit" value="Login" class="btn btn-primary"></a></li>
																		
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-xs-12 text-center menu-2">
						<div id="fh5co-logo">
							<h1>
								<a href="index.php">
								HoiQuan
								<span>.vn</span>
								</a>
							</h1>
						</div>
					</div>
				</div>
			</div>
		</nav>