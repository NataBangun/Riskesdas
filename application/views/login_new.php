<!doctype html>
<html>
<head>
	<meta charset="utf8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	

	<!-- Bootstrap -->
	<link rel="stylesheet" href="<?php echo $application_path; ?>/css/bootstrap.min.css">
	<!-- Bootstrap responsive -->
	<link rel="stylesheet" href="<?php echo $application_path; ?>/css/bootstrap-responsive.min.css">
	<!-- Theme CSS -->
	<!--[if !IE]> -->
	<link rel="stylesheet" href="<?php echo $application_path; ?>/css/style.css">
	<!-- <![endif]-->
	<!--[if IE]>
	<link rel="stylesheet" href="<?php echo $application_path; ?>/css/style_ie.css">
	<![endif]-->

	<!-- jQuery -->
	<script src="<?php echo $application_path; ?>/js/jquery.min.js"></script>
	<!-- Bootstrap -->
	<script src="<?php echo $application_path; ?>/js/bootstrap.min.js"></script>

	<!-- Just for demonstration -->
	<script src="<?php echo $application_path; ?>/js/demonstration.min.js"></script>
	<!-- Theme scripts 
	<script src="<!?php echo $application_path; ?>/js/application.min.js"></script>-->

	<script type="text/javascript">
	
		function login_submit() {
			$('#frm0').submit();
		}
		
		<?php if (isset($is_login) && $is_login == true) { ?>
			jQuery(document).ready(function(){
				alert('Login Berhasil');
				goto('./home');
			});
		<?php } ?>
	</script>
	
</head>
<body class='login-body'>
	<div class="login-wrap">
	<img src="<?php echo $application_path; ?>/img/logo-dinkes.png" alt="Logo" />
		<h2>Pusat Biomedis dan Teknologi<br/> Kesehatan Dasar BALITBANGKES</h2>
		<h2>Kementerian Kesehatan RI</h2>
		<div class="login">
			<form id="frm0" action="<?php echo $application_path; ?>/login/proseslogin" method="POST">
			<input type="hidden" name="statpos" value="0">
				<select name="Lab" id="Lab" class='input-block-level'>
					<option> - Silakan Pilih Laboraturium - </option>
					<?php foreach($arr_lab as $value): ?>
					<option value="<?php echo $value['LAB_CODE']; ?>"><?php echo $value['LAB_NAME'] ?></option>
					<?php endforeach; ?>
				</select>
				<select name="Penelitian" id="Penelitian" class='input-block-level'>
					<option> - Silakan Pilih Penelitian - </option>
					<?php foreach($arr_penelitian as $value): ?>
					<option value="<?php echo $value['penelitian_kode']; ?>"><?php echo $value['penelitian_name'] ?></option>
					<?php endforeach; ?>
				</select>
				<!--div class="sep">or</div-->
				<div class="email"><input type="text" name="User" placeholder="User" class='input-block-level'></div>
				<div class="pw">
					<input type="password" name="Password" placeholder="Password" class='input-block-level'>
				</div>
				<!--<button type="submit" value="Sign In" class='button button-basic-darkblue btn-block'>Sign In</button>-->
				<input class="button button-basic-darkblue btn-block" name="submit" type="submit" value="login">
			</form>
		</div>
		<?php if(isset($error)) echo $error ; ?>
		<!--<a href="#" class='pw-link'>Forgot your <span>password</span>? <i class="icon-arrow-right"></i></a>-->
	</div>
</body>

</html>