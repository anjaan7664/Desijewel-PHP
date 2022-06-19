
	<style type="text/css">
		.form-signin {
			padding: 5px;
		}
		
		.box {
			border: black solid 1px;
			padding: 5px;
			margin-bottom: 10px;
			background: white;
		}
	</style>
	<?php 
 if(isset($_COOKIE["username"]) && isset($_COOKIE["password"])){
							?>

		<div class="box">
			<h3>
				Hi
				<?php echo $f_name ;?>
			</h3>
			<a style="margin-left:0px" class="btn btn-primary btn-block" href="/user.php">My Profile</a>
			<?php if(is_admin($_COOKIE["username"]) === true){  ?><a style="margin-left:0px" class="btn btn-primary btn-block" href="/login/admin.php">Admin</a>
				<a style="margin-left:0px" class="btn btn-primary btn-block" href="/ul.php">Upload Direct</a><?php }?>
		   <a style="margin-left:0px" class="btn btn-primary btn-block" href="/login/logout.php">Log Out</a>
		</div>
		<?php }else { ?>

		<form style="background: white;" class="form-signin" name="form1" method="post" action="/login/checklogin_nv.php">
			<input name="myusername" id="myusername" type="text" class="form-control" placeholder="Username" value="<?php if(isset($_COOKIE[" member_login "])) { echo $_COOKIE["member_login "]; } ?>" >
			<input name="mypassword" id="mypassword" type="password" class="form-control" value="<?php if(isset($_COOKIE["member_password"])) { echo $_COOKIE["member_password"]; } ?>" placeholder="Password">

			<input type="checkbox" name="remember" id="remember" <?php if(isset($_COOKIE["member_login"])) { ?> checked <?php } ?> />
		   <label for="remember-me">Remember me</label>

			<button style="margin-left:0px" name="Submit" id="submit" class="btn btn-primary btn-block" type="submit">Sign in</button>
			<a style="margin-left:0px" href="/login/signup.php" name="Sign Up" id="signup" class="btn btn-primary btn-block" type="submit">Create account</a>

			<div id="message"></div>
		</form>
		<?php } ?>