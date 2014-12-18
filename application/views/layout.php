<!doctype html>
<html>
<head>
	<title><?php echo $judul; ?> - Dinas Kesehatan</title>
	<meta charset="utf8">
	<meta name="viewport" content="width=device-width, initial-scale=1,user-scalable=no,maximum-scale=1">
	<meta http-equiv='expires' content='-1' />
	<meta http-equiv= 'pragma' content='no-cache' />
	<link rel="shortcut icon" href="<?php echo $application_path; ?>/img/Logo.jpg">
	

	<!-- TableTools for dataTables plugin -->
	<link rel="stylesheet" href="<?php echo $application_path; ?>/css/TableTools.css">
	<!-- timepicker plugin -->
	<link rel="stylesheet" href="<?php echo $application_path; ?>/css/bootstrap-timepicker.min.css">
	<!-- datepicker plugin -->
	<link rel="stylesheet" href="<?php echo $application_path; ?>/css/datepicker.css">
	<!-- Bootstrap -->
	<link rel="stylesheet" href="<?php echo $application_path; ?>/css/bootstrap.min.css">
	<!-- Bootstrap responsive -->
	<link rel="stylesheet" href="<?php echo $application_path; ?>/css/bootstrap-responsive.min.css">
	<!-- small charts plugin -->
	<link rel="stylesheet" href="<?php echo $application_path; ?>/css/jquery.easy-pie-chart.css">
	<!-- calendar plugin -->
	<link rel="stylesheet" href="<?php echo $application_path; ?>/css/fullcalendar.css">
	<!-- Calendar printable -->
	<link rel="stylesheet" href="<?php echo $application_path; ?>/css/fullcalendar.print.css" media="print">
	<!-- chosen plugin -->
	<link rel="stylesheet" href="<?php echo $application_path; ?>/css/chosen.css">
	<!-- CSS for Growl like notifications -->
	<link rel="stylesheet" href="<?php echo $application_path; ?>/css/jquery.gritter.css">
	<!-- jQuery UI -->
	<link rel="stylesheet" href="<?php echo $application_path; ?>/css/jquery-ui.css">
	<!-- jQuery UI Theme -->
	<link rel="stylesheet" href="<?php echo $application_path; ?>/css/jquery.ui.theme.css">
	<!-- Uniform plugin -->
	<link rel="stylesheet" href="<?php echo $application_path; ?>/css/uniform.default.min.css">
	<!-- Theme CSS -->
	<!--[if !IE]> -->
	<link rel="stylesheet" href="<?php echo $application_path; ?>/css/style.css">
	<!-- <![endif]-->
	<!--[if IE]>
	<link rel="stylesheet" href="<?php echo $application_path; ?>/css/style_ie.css">
	<![endif]-->

	
	<script src="<?php echo $application_path; ?>/js/jquery-1.9.1.js"></script>
	<script src="<?php echo $application_path; ?>/js/jquery-ui.js"></script>
	<!-- jQuery -->
	<script src="<?php echo $application_path; ?>/js/jquery.min.js"></script>
	<!-- jQuery -->
	<script src="<?php echo $application_path; ?>/js/jquery-ui-1.10.1.custom.min.js"></script>
	<!-- Old jquery functions -->
	<script src="<?php echo $application_path; ?>/js/jquery.migrate.min.js"></script>
	<!-- jQuery UI Core -->
	<script src="<?php echo $application_path; ?>/js/jquery.ui.core.min.js"></script>
	<!-- jQuery UI Widget -->
	<script src="<?php echo $application_path; ?>/js/jquery.ui.widget.min.js"></script>
	<!-- jQuery UI button -->
	<script src="<?php echo $application_path; ?>/js/jquery.ui.button.min.js"></script>
	<!-- jQuery UI Spinner -->
	<script src="<?php echo $application_path; ?>/js/jquery.ui.spinner.min.js"></script>
	<!-- jQuery UI Mouse -->
	<script src="<?php echo $application_path; ?>/js/jquery.ui.mouse.min.js"></script>
	<!-- jQuery UI slider -->
	<script src="<?php echo $application_path; ?>/js/jquery.ui.slider.min.js"></script>
	<!-- file upload plugin -->
	<script src="<?php echo $application_path; ?>/js/bootstrap-fileupload.min.js"></script>

	
	<!-- Validation plugin -->
	<script src="<?php echo $application_path; ?>/js/jquery.validate.min.js"></script>
	<!-- Additional methods for validation plugin -->
	<script src="<?php echo $application_path; ?>/js/additional-methods.min.js"></script>
	<!-- Uniform plugin -->
	<script src="<?php echo $application_path; ?>/js/jquery.uniform.min.js"></script>
	<!-- Form wizard plugin -->
	<script src="<?php echo $application_path; ?>/js/jquery.form.wizard.min.js"></script>
	<!-- maskedInput plugin -->
	<script src="<?php echo $application_path; ?>/js/jquery.maskedinput.min.js"></script>
	<!-- timerpicker plugin -->
	<script src="<?php echo $application_path; ?>/js/bootstrap-timepicker.min.js"></script>
	<!-- datepicker plugin -->
	<script src="<?php echo $application_path; ?>/js/bootstrap-datepicker.min.js"></script>
	<!-- smoother animations -->
	<script src="<?php echo $application_path; ?>/js/jquery.easing.min.js"></script>
	<!-- Bootstrap -->
	<script src="<?php echo $application_path; ?>/js/bootstrap.min.js"></script>
	<!-- small charts plugin -->
	<script src="<?php echo $application_path; ?>/js/jquery.easy-pie-chart.min.js"></script>
	<!-- Charts plugin -->
	<script src="<?php echo $application_path; ?>/js/jquery.flot.min.js"></script>
	<!-- Pie charts plugin -->
	<script src="<?php echo $application_path; ?>/js/jquery.flot.pie.min.js"></script>
	<!-- Bar charts plugin -->
	<script src="<?php echo $application_path; ?>/js/jquery.flot.bar.order.min.js"></script>
	<!-- Charts resizable plugin -->
	<script src="<?php echo $application_path; ?>/js/jquery.flot.resize.min.js"></script>
	<!-- calendar plugin -->
	<script src="<?php echo $application_path; ?>/js/fullcalendar.min.js"></script>
	<!-- chosen plugin -->
	<script src="<?php echo $application_path; ?>/js/chosen.jquery.min.js"></script>
	<!-- Scrollable navigation -->
	<script src="<?php echo $application_path; ?>/js/jquery.nicescroll.min.js"></script>
	<!-- Growl Like notifications -->
	<script src="<?php echo $application_path; ?>/js/jquery.gritter.min.js"></script>
	<!-- dataTables plugin -->
	<script src="<?php echo $application_path; ?>/js/jquery.dataTables.min.js"></script>
	<!-- TableTools for dataTables plguin -->
	<script src="<?php echo $application_path; ?>/js/TableTools.min.js"></script>

	<!-- Just for demonstration -->
	<script src="<?php echo $application_path; ?>/js/demonstration.min.js"></script>
	<!-- Theme framework -->
	<script src="<?php echo $application_path; ?>/js/hermawan.min.js"></script>
	<!-- Theme scripts -->
	<script src="<?php echo $application_path; ?>/js/application.min.js"></script>

	
	<script type='text/javascript'>
		function $ID(v) {
			return document.getElementById(v);
		}
		
		function goto(url) {
			var path = '<?php echo $application_path; ?>';
			location.href = path + '/' + url;
		}
	</script>
</head>

<body data-layout="fixed">
	<div id="top"> 
		<?php
			echo $area_top;
		?>
	</div>

	<div id="main">
		<div id="navigation">
			<?php  echo $area_sidebar; ?>
		</div>
		<div id="content">
			
			<?php echo $area_body; ?>
			
		</div>
	</div>
</body>

</html>