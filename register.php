<!DOCTYPE html>
<html lang="en">

<head>

	<!-- META ============================================= -->
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="keywords" content="" />
	<meta name="author" content="" />
	<meta name="robots" content="" />
	
	<!-- DESCRIPTION -->
	<meta name="description" content="OnlySubs" />
	
	<!-- OG -->
	<meta property="og:title" content="OnlySubs" />
	<meta property="og:description" content="OnlySubs" />
	<meta property="og:image" content="" />
	<meta name="format-detection" content="telephone=no">
	
	<!-- FAVICONS ICON ============================================= -->
	<link rel="icon" href="assets/images/logoos.png" type="image/x-icon" />
	<link rel="shortcut icon" type="image/x-icon" href="assets/images/logoos.png" />
	
	<!-- PAGE TITLE HERE ============================================= -->
	<title>OnlySubs</title>
	
	<!-- MOBILE SPECIFIC ============================================= -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<!--[if lt IE 9]>
	<script src="assets/js/html5shiv.min.js"></script>
	<script src="assets/js/respond.min.js"></script>
	<![endif]-->
	
	<!-- All PLUGINS CSS ============================================= -->
	<link rel="stylesheet" type="text/css" href="assets/css/assets.css">
	
	<!-- TYPOGRAPHY ============================================= -->
	<link rel="stylesheet" type="text/css" href="assets/css/typography.css">
	
	<!-- SHORTCODES ============================================= -->
	<link rel="stylesheet" type="text/css" href="assets/css/shortcodes/shortcodes.css">
	
	<!-- STYLESHEETS ============================================= -->
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">
	<link class="skin" rel="stylesheet" type="text/css" href="assets/css/color/color-1.css">
	
</head>
<body id="bg">

<?php  
// define variables and set to empty string values

$nameErr = $passwordErr = $emailErr = "";
$name = $password = $email = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	$name = $_POST['name'];
	$email = $_POST['email'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["txt_name"])) {
    $nameErr = "Name is required";
  } else {
    $name = test_input($_POST["txt_name"]);
  }
 
 if (empty($_POST["txt_password"])) {
    $passwordErr= "Password is required";
  } else {
    $password = test_input($_POST["txt_password"]);
  }
  
   if (empty($_POST["txt_email"])) {
    $emailErr= "Email is required";
  } else {
    $email = test_input($_POST["txt_email"]);
  }
  
  if($nameErr == "" && $passwordErr == "" && $emailErr == "" )
  {
    require_once "includes/db_connect.php";
    //We escape the single quotes 
    //We use fixed values for the dates, house_id, 
    $sInsert = "INSERT INTO account(User_name, Email, Password)
    	 VALUES ( " . $conn->quote($name) ."," . $conn->quote($email) ."," . $conn->quote($password) .")";
    #echo $sInsert;

    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    $addResult = $conn->exec($sInsert) ;
    if($addResult )
    {	
    	$Msg = "Record Saved!";
	    //echo $Msg;
    }else{
       $Msg = "ERROR: Record could not be Saved!";
       //echo $Msg;
       
    }//end else
    $conn = null;    //Let us display the form for feedback purposes.
  }//end if	
 
	header('Location: LOGIN.php');
	exit();
} 
  
}
 function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
 
 ?>


<div class="page-wraper">
	<div id="loading-icon-bx"></div>
	<div class="account-form">
		<div class="account-head" style="background-image:url(assets/images/background/bg2.jpg);">
			<a href="index.php"><img src="assets/images/logoos.png" alt=""></a>
		</div>
		<div class="account-form-inner">
			<div class="account-container">
				<div class="heading-bx left">
					<h2 class="title-head">Sign Up <span>Now</span></h2>
					<p>Login Your Account <a href="LOGIN.php">Click here</a></p>
				</div>	
				<form class="contact-bx" method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">
					<div class="row placeani">
						<div class="col-lg-12">
							<div class="form-group">
								<div class="input-group">
									<label>Your Name</label>
									<input name="txt_name" type="text" required="" class="form-control" value=" <?php echo $name;?>"/>
										<span class="error">* <?php echo $nameErr;?></span><br/>
								</div>
							</div>
						</div>
						<div class="col-lg-12">
							<div class="form-group">
								<div class="input-group">
									<label>Your Email Address</label>
									<input name="txt_email" type="email" required="" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" class="form-control" value=" <?php echo $email;?>"/>
									<span class="error">* <?php echo $emailErr;?></span><br/>
								</div>
							</div>
						</div>
						<div class="col-lg-12">
							<div class="form-group">
								<div class="input-group"> 
									<label>Your Password</label>
									<input name="txt_password" type="password" required="" class="form-control" value="<?php echo $password;?>"/>
									<span class="error">* <?php echo $passwordErr;?></span><br/>
								</div>
							</div>
						</div>
						<div class="col-lg-12 m-b30">
							<button name="submit" type="submit" value="Submit" class="btn button-md">Sign Up</button>
						</div>
					
					</div>
					
				</form>
			</div>
		</div>
	</div>
</div>
<!-- External JavaScripts -->
<script src="assets/js/jquery.min.js"></script>
<script src="assets/vendors/bootstrap/js/popper.min.js"></script>
<script src="assets/vendors/bootstrap/js/bootstrap.min.js"></script>
<script src="assets/vendors/bootstrap-select/bootstrap-select.min.js"></script>
<script src="assets/vendors/bootstrap-touchspin/jquery.bootstrap-touchspin.js"></script>
<script src="assets/vendors/magnific-popup/magnific-popup.js"></script>
<script src="assets/vendors/counter/waypoints-min.js"></script>
<script src="assets/vendors/counter/counterup.min.js"></script>
<script src="assets/vendors/imagesloaded/imagesloaded.js"></script>
<script src="assets/vendors/masonry/masonry.js"></script>
<script src="assets/vendors/masonry/filter.js"></script>
<script src="assets/vendors/owl-carousel/owl.carousel.js"></script>
<script src="assets/js/functions.js"></script>
<script src="assets/js/contact.js"></script>
</body>

</html>
