<?php 
session_start();
if(isset($_COOKIE['user'])){
	$username = $_COOKIE['user'];
	$_SESSION['username'] = $username;
    $_SESSION['logged'] = true;
}
if(isset($_SESSION['logged'])){
    $username = $_SESSION['username'];

}else{
    header('location:login.php');}
	$host = "localhost"; 
	$user = "buycodec_root";
	$password = "Robinson2006";
	$database = "buycodec_buycode";
	$conn = mysqli_connect($host,$user,$password,$database);
	// i generated my user id here
	$checkusersql = mysqli_query($conn,"SELECT * FROM users where username='$username'");
	$available = mysqli_fetch_array($checkusersql);
	$my_id = $available['id'];
	$_SESSION['my_id'] = $my_id;
	//omorrr, lets get the number of messages...i really don't get why i am doing this comment fr!
	$checkmessagesql = mysqli_query($conn,"SELECT * FROM messages where receiver='$username'");
	$available = mysqli_num_rows($checkmessagesql);
	$message_number = $available;
	if($message_number == 1){
		$message_number = "<strong>".$message_number."</strong>"." message";
		$message_end = "it";
	}elseif($message_number > 20){
		$message_number = "<strong>"."20+</strong>"." messages";	
		$message_end = "them";
	}else{
		$message_number = "<strong>".$message_number."</strong>"." messages";
		$message_end = "them";		
	}
 $mylink = "http://" . $_SERVER['SERVER_NAME'].'/annonymo/u/'.$username; 
         
include 'head.php';?>
 <script type="text/javascript">
            function randomString(Length)
            {
				
                var text = "";
                let emoji = ["👋", "❤️", "😘", "👌", "😍", "👌", "👍", "🙌", "🤞", "✌️", "😉", "😎", "🎶", "💖", "😎", "😍", "😘", "🥰", "😗", "😗", "😙", "😜", "😝", "🙃", "🤑", "🤪", "😇", "🥳", "🤡", "👻", "🙈", "🙊", "🙉", "🐵", "👅"]; // array
				let index = Math.floor(Math.random() * emoji.length); // random emoji
				return(emoji[index]); // result
            }
            function ChangingRandomString(Length)
            {
                setInterval(function(){
                    document.getElementById("random").innerHTML = randomString(Length);
                },3000);
            }
        </script>
		<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>

<body>
	
	<div class="limiter">
		<div class="container-login100" style="background-image: url('images/bg-01.jpg');">
			<div class="wrap-login100 p-l-55 p-r-55 p-t-35 p-b-54 colorchanger" >
			<span class="login100-form-title p-b-29 homeheader">
						Hey<span class="wave">👋</span>, <?php echo $username?>
						<a id="mylink"  onclick="copyContent()">@<span  style="cursor:pointer;text-decoration:underline;text-decoration-style:dashed"><?php echo $mylink?></span><span style="text-decoration:none!important;cursor:pointer"> 📋</span></a> 
					</span>
					<span style="color:black">So far, You've received <?php echo $message_number?>, Wanna view <?php echo $message_end?>?</span>
					<div class="wrap-login100-form-btn" style="margin-top:1.2rem;margin-bottom:1rem;">
							<div class="login100-form-bgbtn"></div>
							<a href="messages.php" class="login100-form-btn">
								View Messages
							</a>
						</div>
						<div class="wrap-login100-form-btn"style="margin-top:1.2rem;margin-bottom:1rem;">
							<div class="login100-form-bgbtn"></div>
							<a href="share.php" class="login100-form-btn">
								Share Link
							</a>
						</div>
					<div class="h-divider">
  				<div class="shadow"></div>
 			 <div class="text2"><span id="random"><script type="text/javascript">document.write(randomString(1));</script></span>
				</div>
				</div>
				<div class="text-center p-t-38 p-b-31">
						<p href="#">
							Share on:
						</p>
						<div class="socialblock">
						<div class="social"><a href="https://api.whatsapp.com/send?text=Write%20a%20*secret%20anonymous%20notes*%20for%20me..%20%F0%9F%98%89%20I%20*won't%20know*%20who%20wrote%20it..%20%F0%9F%98%82%E2%9D%A4%20%F0%9F%91%89%20<?php echo $mylink?>"><span class="socialimg whatsapp"><i class="fab fa-whatsapp"></i>
</span></a></div>
						<div class="social"><a href="https://www.facebook.com/sharer/?u=<?php echo $mylink?>"><span class="socialimg facebook"><i class="fab fa-facebook"></i>
</span></a></div>
						<div class="social"><a href="whatsapp.com"><span class="socialimg instagram"><i class="fab fa-instagram"></i>
</span></a></div>
						</div>
					</div>
					<div class="wrap-login100-form-btn"style="margin-bottom:1rem;">
							<div class="login100-form-bgbtn"></div>
							<a href="logout.php" class="login100-form-btn">
								Logout
							</a>
						</div>
 			<div class="text-center p-t-38">
						<p style="font-weight:bolder" href="#">
							By Robinson Honour
						</p>
						 
						</div>
					</div>
			</div>
		</div>
	</div>

	
       <style>
		.socialblock{
			display:flex;
			justify-content:space-around;

		}
		.social{
			padding-top:.5rem;
			border-radius:50%;
		}
		.socialimg{
			width:3rem;
			height:3rem;
 			padding:1rem;
			border-radius:50%;
			font-size:3rem

		}
		.facebook{
			color:#a64bf4;
		}
		#mylink{
			margin-top:-1rem
		}
		
.wave {
  animation-name: wave-animation;  /* Refers to the name of your @keyframes element below */
  animation-duration: 2.5s;        /* Change to speed up or slow down */
  animation-iteration-count: infinite;  /* Never stop waving :) */
  transform-origin: 70% 70%;       /* Pivot around the bottom-left palm */
  display: inline-block;
}

@keyframes wave-animation {
    0% { transform: rotate( 0.0deg);
			
	}
   10% { transform: rotate(14.0deg);
		
}  /* The following five values can be played with to make the waving more or less extreme */
   20% { transform: rotate(-18.0deg);
		
}
   30% { transform: rotate(23.0deg);
		
}
   40% { transform: rotate(-4.0deg);
		
}
   50% { transform: rotate(18.0deg);
		
}
   60% { transform: rotate( 23.0deg);
		
}  /* Reset for the last half to pause */
  100% { transform: rotate( 0.0deg);
		
}
}


	   </style>
         
  
    <script>ChangingRandomString(1)</script>
 

<script>
  let text = "<?php echo $mylink?>";
  const copyContent = async () => {
    try {
      await navigator.clipboard.writeText(text);
      alert('Link copied to clipboard');
    } catch (err) {
      alert('Failed to copy: ', err);
    }
  }
</script>
	<?php include 'footer.php';?>
