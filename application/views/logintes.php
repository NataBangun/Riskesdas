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
  <link href="<?php echo $application_path; ?>/css/responsive.css" rel="stylesheet">

	<!-- jQuery -->
	<script src="<?php echo $application_path; ?>/js/jquery.min.js"></script>
	<!-- Bootstrap -->
	<script src="<?php echo $application_path; ?>/js/bootstrap.min.js"></script>

	<!-- Just for demonstration -->
	<script src="<?php echo $application_path; ?>/js/demonstration.min.js"></script>
  <script src="<?php echo $application_path; ?>/js/modernizr.custom.32549.js"></script>
    <script type="text/javascript" src="<?php echo $application_path; ?>/js/jquerypp.custom.js"></script>
    <script type="text/javascript" src="<?php echo $application_path; ?>/js/jquery.bookblock.js"></script>
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
	
   <script type="text/javascript">
      $(function() {
        var Page = (function() {

          var config = {
              $bookBlock: $( '#bb-bookblock' ),
              $navNext  : $( '#bb-nav-next' ),
              $navPrev  : $( '#bb-nav-prev' ),
              $navJump  : $( '#bb-nav-jump' ),
              bb        : $( '#bb-bookblock' ).bookblock( {
                speed       : 800,
                shadowSides : 0.8,
                shadowFlip  : 0.7
              } )
            },
            init = function() {

              initEvents();
              
            },
            initEvents = function() {

              var $slides = config.$bookBlock.children(),
                  totalSlides = $slides.length;

              // add navigation events
              config.$navNext.on( 'click', function() {
              $("#arrow_register").fadeOut();
              $(".not-member").slideUp();
              $(".already-member").slideDown();
                config.bb.next();
                return false;

              } );

              config.$navPrev.on( 'click', function() {

                 $(".not-member").slideDown();
                $(".already-member").slideUp();
                config.bb.prev();
                return false;

              } );

              config.$navJump.on( 'click', function() {
                
                config.bb.jump( totalSlides );
                return false;

              } );
              
              // add swipe events
              $slides.on( {

                'swipeleft'   : function( event ) {
                
                  config.bb.next();
                  return false;

                },
                'swiperight'  : function( event ) {
                
                  config.bb.prev();
                  return false;
                  
                }

              } );

            };

            return { init : init };

        })();

        Page.init();

      });
    </script>
	
</head>
<body class='login-body'>
	<div class="login-wrap">
        <div class="row-fluid">
		<img src="<?php echo $application_path; ?>/img/logo-dinkes.png" alt="Logo" />
		<!--h2>Pusat Biomedis dan Teknologi<br/> Kesehatan Dasar BALITBANGKES</h2>
		<h2>Kementerian Kesehatan RI</h2-->
		
		<div class="row-fluid bb-bookblock" id="bb-bookblock">
			<div class="bb-item row-fluid login">

				<div class="top-background">
				  <div class="fill-background right"><div class="bg row-fluid"></div></div>
				  <div id="login-corner-shadow"></div>
				</div>
				<div class="row-fluid container">
					<div class="content">
						<div class="message row-fluid">
						  <h4>Enter your username and password.</h4>
						  <!--h3>Have fun!</h3-->
						</div>
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
							<!--a href="index.html" class="btn btn-primary btn-larg1e row-fluid">Take me in <i class="gicon-chevron-right icon-white"></i></a-->
							</form>
					</div><!-- End .container -->
				</div> <!-- End .row-fluid -->
			</div> <!-- .bb-item  -->

		   <div class="bb-item row-fluid register">
				<div class="top-background row-fluid fluid">
				  <div class="fill-background "><div class="bg row-fluid"></div></div>
				  <div id="login-corner-shadow" class="left"></div>
				</div>
				<div class="row-fluid fluid container">
					<div class="content">
						<div class="message row-fluid ">
						 <h4>Login Sebagai UPS!</h4>              
						</div>
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
								<!--a href="index.html" class="btn btn-info row-fluid">Register <i class="gicon-chevron-right icon-white"></i></a-->
							<!--a href="index.html" class="btn btn-primary btn-larg1e row-fluid">Take me in <i class="gicon-chevron-right icon-white"></i></a-->
							</form>
					</div><!-- End .container -->
				</div> <!-- End .row-fluid -->
			</div> <!-- .bb-item  -->

		</div> <!-- End #bb-bookblock -->
		
		<!--a href="#" class='pw-link'>Login Penelitian <span>Ina Respon</span>? <i class="icon-arrow-right"></i></a-->
            <div class="pull-right spacer-medium not-member members right_offset">Login Penelitian <a href="#" id="bb-nav-next" class="members_button">Ina Respon<i class="icon-magic"></i></a></div>
            <div class="pull-right spacer-medium already-member members right_offset" style="display:none;">Login Selain <a href="#" class="members_button" id="bb-nav-prev">Ina Respon <i class="icon-undo"></i></a></div>
		<?php if(isset($error)) echo $error ; ?>
		<!--<a href="#" class='pw-link'>Forgot your <span>password</span>? <i class="icon-arrow-right"></i></a>-->
	</div>
	</div>
</body>

</html>