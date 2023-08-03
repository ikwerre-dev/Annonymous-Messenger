<?php 
session_start();
if(isset($_COOKIE['user'])){
	$username = $_COOKIE['user'];
	$_SESSION['username'] = $username;
    $_SESSION['logged'] = true;
	header('location:home.php');
}
include 'head.php';?>
<body>
	
	<div class="limiter">
		<div class="container-login100" style="background-image: url('images/bg-01.jpg');">
			<div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-54">
				<form class="login100-form validate-form">
					<span class="login100-form-title p-b-49">
						Login
					</span>

					<div class="wrap-input100 validate-input m-b-23 usernameparent" onsubmit="return none" data-validate = "Username is reauired">
						<span class="label-input100">Username</span>
						<input class="input100" type="text" id="username" name="username" placeholder="Type your username">
						<span class="focus-input100" data-symbol="&#xf206;"></span>
					</div>

					<div class="wrap-input100 validate-input passcodeparent " data-validate="Passcode is required">
						<span class="label-input100">Passcode</span>
						<input class="input100 " type="number" maxlength="4" minlength="4" id="passcode" name="pass" placeholder="Type your passcode">
						<span class="focus-input100" data-symbol="&#xf190;"></span>
					</div>
					
					<div class="text-right p-t-8 p-b-31">
						<a href="#">
							Forgot passcode?
						</a>
					</div>
                    </form>

					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<button id="loginbtn" class="login100-form-btn">
								Login
							</button>
						</div>
					</div>

					 
					<div class="flex-col-c p-t-155">
						 

						<a href="register.php" class="txt2">
							Sign Up
						</a>
					</div>
			</div>
		</div>
	</div>
	

	<?php include 'footer.php';?>
