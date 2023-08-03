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
            <a href="home.php"  class=" homebtn">🏠</a>
            <span class="login100-form-title p-b-29 homeheader" style="font-size:2rem;;margin-top:-1.5rem">
						My Messages<span class="wave">💌</span>
					</span>
                    <?php
$checkmessagesql = mysqli_query($conn,"SELECT * FROM messages where receiver='$username' ORDER BY id DESC");
while($available = mysqli_fetch_array($checkmessagesql)){
    $message = $available['message'];
    $date = $available['date'];

?>
<div class="msgcontainer">

<?php
echo 'message: '.$message;
echo '<br>';?>
<span>
<?php echo $date;?></span>
 
</div>
<?php
}?>
			</div>
		</div>
	</div>

	
       <style>
		.msgcontainer{
			border:2px solid #a64bf4;
			padding:1rem;
			border-radius:1rem;
			margin-top:1rem;
		}
		.msgcontainer span{
			font-size:.8rem;
			color:#ccc
		}
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

.homebtn{
    position:absolute;
    margin-top:-2rem;
    margin-left:-3rem;
    font-size:2rem;
    color:white
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
