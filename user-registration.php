<?php
if (! empty($_POST["signup-btn"])) {
    require_once './registerandlogin/Model/Member.php';
    $member = new Member();
    $registrationResponse = $member->registerMember();
}
?>
<HTML>
<HEAD>
<TITLE>User Registration</TITLE>
<link href="registerandlogin/assets/css/style.css" type="text/css"
	rel="stylesheet" />
<link href="registerandlogin/assets/css/user-registration.css" type="text/css"
	rel="stylesheet" />
<script src="registerandlogin/vendor/jquery/jquery-3.3.1.js" type="text/javascript"></script>
</HEAD>
<BODY>
	<div class="container">
		<div class="sign-up-container">
			<div class="login-signup">
				<a href="index.php">Login</a>
			</div>
			<div class="">
				<form name="sign-up" action="" method="post"
					onsubmit="return signupValidation()">
					<div class="signup-heading">Registration</div>
				<?php
    if (! empty($registrationResponse["status"])) {
        ?>
                    <?php
        if ($registrationResponse["status"] == "error") {
            ?>
				    <div class="server-response error-msg"><?php echo $registrationResponse["message"]; ?></div>
                    <?php
        } else if ($registrationResponse["status"] == "success") {
            ?>
                    <div class="server-response success-msg"><?php echo $registrationResponse["message"]; ?></div>
                    <?php
        }
        ?>
				<?php
    }
    ?>
				<div class="error-msg" id="error-msg"></div>
					<div class="row">
						<div class="inline-block">
							<div class="form-label">
								Username<span class="required error" id="username-info"></span>
							</div>
							<input class="input-box-330" type="text" name="username"
                                                               id="username" pattern="[A-Za-z0-9]{6,20}" placeholder="6 to 20 letters or digits">
						</div>
					</div>
					<div class="row">
						<div class="inline-block">
							<div class="form-label">
								Password<span class="required error" id="signup-password-info"></span>
							</div>
							<input class="input-box-330" type="password"
                                                               name="signup-password" id="signup-password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}"
                                                               placeholder="6 or more characters">
                                                </div>
                                                <div style="text-align: justify; font-size: 13px; margin:5px 50px 0 50px; opacity: 0.6">Must contain at least one uppercase, one lowercase letter and one number.</div>
					</div>
					<div class="row">
						<div class="inline-block">
							<div class="form-label">
								Confirm Password<span class="required error"
									id="confirm-password-info"></span>
							</div>
							<input class="input-box-330" type="password"
								name="confirm-password" id="confirm-password">
						</div>
					</div>
                                        <div class="row">
						<div class="inline-block">
							<div class="form-label">
								Full Name<span class="required error" id="fullname-info"></span>
							</div>
							<input class="input-box-330" type="text" name="fullname" id="fullname" pattern="^[a-zA-Z]{3,}( {1,2}[a-zA-Z]{3,}){0,}$"
                                                               placeholder="at least 3 or more letters">
						</div>
					</div>
                                        <div class="row">
						<div class="inline-block">
							<div class="form-label">
								Email<span class="required error" id="email-info"></span>
							</div>
							<input class="input-box-330" type="email" name="email" id="email"
                                                        >
						</div>
					</div>
                                        <div class="row">
						<div class="inline-block">
							<div class="form-label">
								Phone Number<span class="required error" id="phonenum-info"></span>
							</div>
                                                    <input class="input-box-330" type="tel" name="phonenum" id="phonenum" pattern="[0-9]{10,14}"
                                                           placeholder="10 to 14 digits">
						</div>
					</div>
                                        <div class="row">
						<div class="inline-block">
							<div class="form-label">
								Address<span class="required error" id="address-info"></span>
							</div>
							<input class="input-box-330" type="text" name="address" id="address">
						</div>
					</div>
					<div class="row">
						<input class="btn" type="submit" name="signup-btn"
							id="signup-btn" value="Sign up">
					</div>
				</form>
			</div>
		</div>
	</div>

	<script>
function signupValidation() {
	var valid = true;

	$("#username").removeClass("error-field");
	$("#password").removeClass("error-field");
        $("#confirm-password").removeClass("error-field");
	$("#fullname").removeClass("error-field");
        $("#email").removeClass("error-field");
	$("#phonenum").removeClass("error-field");
	$("#address").removeClass("error-field");
	

	var UserName = $("#username").val();
	var email = $("#email").val();
	var Password = $('#signup-password').val();
        var ConfirmPassword = $('#confirm-password').val();
	var emailRegex = /^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$/;
        var fullname = $ ("#fullname").val();
        var phonenumber = $ ("#phonenum").val();
        var uaddress = $ ("#address").val();
        
	$("#username-info").html("").hide();
	$("#email-info").html("").hide();
	$("#fullname-info").html("").hide();
	$("#phonenum-info").html("").hide();
	$("#address-info").html("").hide();
	$("#signup-password-info").html("").hide();
	$("#confirm-password-info").html("").hide();
        $("#error-msg").html("Both passwords must be same.").hide();
        

	if (UserName.trim() == "") {
		$("#username-info").html("required.").css("color", "#ee0000").show();
		$("#username").addClass("error-field");
		valid = false;
	}
	if (Password.trim() == "") {
		$("#signup-password-info").html("required.").css("color", "#ee0000").show();
		$("#signup-password").addClass("error-field");
		valid = false;
	}
	if (ConfirmPassword.trim() == "") {
		$("#confirm-password-info").html("required.").css("color", "#ee0000").show();
		$("#confirm-password").addClass("error-field");
		valid = false;
	}
        if(fullname.trim() == ""){
            $("#fullname-info").html("required.").css("color", "#ee0000").show();
            $("#fullname").addClass("error-field");
            valid = false;
        }
        if (email == "") {
		$("#email-info").html("required").css("color", "#ee0000").show();
		$("#email").addClass("error-field");
		valid = false;
	} else if (email.trim() == "") {
		$("#email-info").html("Invalid email address.").css("color", "#ee0000").show();
		$("#email").addClass("error-field");
		valid = false;
	} else if (!emailRegex.test(email)) {
		$("#email-info").html("Invalid email address.").css("color", "#ee0000")
				.show();
		$("#email").addClass("error-field");
		valid = false;
	}
        if(phonenumber.trim() == ""){
            $("#phonenum-info").html("required.").css("color", "#ee0000").show();
            $("#phonenum").addClass("error-field");
            valid = false;
        }
        if(uaddress.trim() == ""){
            $("#address-info").html("required.").css("color", "#ee0000").show();
            $("#address").addClass("error-field");
            valid = false;
        }
        if(Password != ConfirmPassword){
            $("#error-msg").html("Both passwords must be same.").show();
            valid = false;
        }
	if (valid == false) {
		$('.error-field').first().focus();
		valid = false;
	}
	return valid;
}
</script>
</BODY>
</HTML>
