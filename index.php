<?php 
session_start();
if(isset($_COOKIE['user'])){
	$username = $_COOKIE['user'];
	$_SESSION['username'] = $username;
    $_SESSION['logged'] = true;
}
if(!isset($_GET['user'])){
    header('location:login.php');
}elseif($_GET['user'] == ''){
    header("location:login.php");

}
$receiver = $_GET['user'];
$host = "localhost"; 
$user = "buycodec_root";
$password = "Robinson2006";
$database = "buycodec_buycode";
	$conn = mysqli_connect($host,$user,$password,$database);
	// i generated my user id here
	$checkusersql = mysqli_query($conn,"SELECT * FROM users where username='$receiver'");
	$available = mysqli_num_rows($checkusersql);
 if($available == 0){
?>
<script>
alert('This user "<?php echo $receiver?>", does nOt exist ☹️ ');
document.location="http://<?php echo $_SERVER['SERVER_NAME']?>/annonymo/";
</script>
<?php
 }

include 'head.php';?>
<body>
	
	<div class="limiter">
		<div class="container-login100" style="background-image: url('http://<?php echo $_SERVER['SERVER_NAME']?>/annonymo/images/bg-01.jpg');">
			<div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-54">
				<form class="login100-form validate-form">
					<span class="login100-form-title p-b-49" style="font-size:2rem">
						Send an annonymous note to 🦋<?php echo $receiver?>🦋
					</span>
                    <script type="text/javascript">
            function randomString(Length)
            {
				
                var text = "😘";
                let emoji = ["👋", "❤️", "😘", "👌", "😍", "👌", "👍", "🙌", "🤞", "✌️", "😉", "😎", "🎶", "💖", "😎", "😍", "😘", "🥰", "😗", "😗", "😙", "😜", "😝", "🙃", "🤑", "🤪", "😇", "🥳", "🤡", "👻", "🙈", "🙊", "🙉", "🐵", "👅"]; // array
				let index = Math.floor(Math.random() * emoji.length); // random emoji
				return(emoji[index]); // result
            }
            function ChangingRandomString(Length)
            {
                setInterval(function(){
                    document.getElementById("random").innerHTML = randomString(Length);
                },500);
            }
        </script>
					<div class="wrap-input100 validate-input m-b-23 messageparent" data-validate="Write Here!" onsubmit="return none">
						<span class="label-input100">Write your note here 🖋️</span>
						<textarea class="input100" type="text" focus autofocus cols="10" rows="2"style="height:6rem" id="message" name="message" ></textarea>
						<span class="focus-input100 fa fa-user" id="random" >👋</span>
					</div>
 <input id="receiver" style="display:none" value="<?php echo $receiver?>">
                    <script>ChangingRandomString(1)</script>
 

				 
					
				 
                    </form>

					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<button id="messagebtn" class="login100-form-btn">
								Send Message
							</button>
						</div>
					</div>

					 
					<div class="flex-col-c p-t-155">
						 

						<a  class="txt2">
							By Robinson Honour
						</a>
					</div>
			</div>
		</div>
	</div>
	
<style>
#random{
    font-size:1.5rem;
    margin-top:3rem
}
    </style>
	<?php include 'footer.php';?>
