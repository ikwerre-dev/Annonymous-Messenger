
	<div id="dropDownSelect1"></div>
    <script src="js/jquery.min.js"></script>
    <script>
    $(document).ready(function(){
        $("#registerbtn").click(function() {
            var username = $("#username").val();
            var passcode = $("#passcode").val();
            type = "register";
            var status = true;
            if((username).length==0){
                $(".usernameparent").addClass("alert-validate");
                var status = false;
            }
            if((passcode).length==0){
                $(".passcodeparent").addClass("alert-validate");
                var status = false;
            }
            if((passcode).length>4){
                $(".passcodeparent").addClass("alert-validate");
                var status = false;
            }
            if((passcode).length<4){
                $(".passcodeparent").addClass("alert-validate");
                var status = false;
            }
            if(status == true){
                $("#registerbtn").html('Processing...');
                $.ajax({
                type: "POST",
                url: 'auth.php',
                data: {
                    username: username,
                    passcode: passcode,
                    type: type
                },
                success: function(response) {
                    if(response == 1){
                $("#registerbtn").html('Success...');
                document.location="home.php";}
                if(response == 2){
                $("#registerbtn").html('Register');
                alert("Username already exists!");

                }
                },
                error: function() {
                    alert('An error occured');
                }
            });            }
           
         });


         $("#loginbtn").click(function() {
            var username = $("#username").val();
            var passcode = $("#passcode").val();
            type = "login";
            var status = true;
            if((username).length==0){
                $(".usernameparent").addClass("alert-validate");
                var status = false;
            }
            if((passcode).length==0){
                $(".passcodeparent").addClass("alert-validate");
                var status = false;
            }
            if((passcode).length>4){
                $(".passcodeparent").addClass("alert-validate");
                var status = false;
            }
            if((passcode).length<4){
                $(".passcodeparent").addClass("alert-validate");
                var status = false;
            }
            if(status == true){
                $("#loginbtn").html('Processing...');
                $.ajax({
                type: "POST",
                url: 'auth.php',
                data: {
                    username: username,
                    passcode: passcode,
                    type: type
                },
                success: function(response) {
                    if(response == 1){
                $("#loginbtn").html('Success...');
                document.location="home.php";}
                if(response == 2){
                $("#loginbtn").html('Login');
                alert("Wrong Username or Password!");
                }
                },
                error: function() {
                    alert('An error occured');
                }
            });            }
           
         });

         $("#messagebtn").click(function() {
            var message = $("#message").val();
            var receiver = $("#receiver").val();
            var user = "<?php if(isset($_COOKIE['user'])){echo $_COOKIE['user'];}?>"
            type = "message";
            var status = true;
            if((message).length==0){
                $(".messageparent").addClass("alert-validate");
                var status = false;
            } 
            if(status == true){
                $("#messagebtn").html('Processing...');
                $.ajax({
                type: "POST",
                url: 'auth.php',
                data: {
                    message: message,
                    user: user,
                    receiver: receiver,
                    type: type
                },
                success: function(response) {
                    if(response == 1){
                $("#messagebtn").html('Success...');
                document.location="login.php";}
                if(response == 2){
                $("#messagebtn").html('message');
                alert("Error!");

                }
                },
                error: function() {
                    alert('An error occured');
                }
            });            }
           
         });


        });
        
    </script>
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
	<script src="vendor/animsition/js/animsition.min.js"></script>
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
	<script src="vendor/select2/select2.min.js"></script>
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
	<script src="vendor/countdowntime/countdowntime.js"></script>
	<script src="js/main.js"></script>

</body>
</html>