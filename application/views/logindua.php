
<!DOCTYPE html>
<html class="no-js" lang="en">
<head>
  <meta charset="utf-8">
  <title></title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="shortcut icon" href="css/images/favicon.png">
  <!-- Le styles -->
  <link href="css/twitter/bootstrap.css" rel="stylesheet">
  <link href="<?php echo $application_path; ?>/css/base.css" rel="stylesheet">
  <link href="<?php echo $application_path; ?>/css/responsive.css" rel="stylesheet">
  <!--link href="css/jquery-ui-1.8.23.custom.css" rel="stylesheet"-->
  <script src="<?php echo $application_path; ?>/js/modernizr.custom.32549.js"></script>
  <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
      <![endif]-->
  
	<script type="text/javascript">
		//function $ID(v) {
//			return document.getElementById(v);
//		}
	       
        function penelitian(){
            $.ajax({
                url:'<?php echo $application_path;?>/login/peneliti/'+document.getElementById('Lab').value,
                complete: function(res, status){
                    //var kotak = res.responseText;
                    document.getElementById('div_penelitian').innerHTML=res.responseText;
                }
            });
        }
        
	</script>
</head>

    <body>

	<div id="loading" class="other_pages">
        <!-- Login page -->
        <div id="login">
     
			<div class="row-fluid">
				<div class="row-fluid">
					<div id="arrow_register"></div>
					<div class="row-fluid">
						<div class="logo" class="pull-left"><a href="<?php echo $application_path; ?>/"></a></div>
						<!--div style="position:absolute;" class="row-fluid pagination-centered pull-right pagination-centered members right_offset"><b><h4 style="color:#fff">Pusat Biomedis dan Teknologi Kesehatan Dasar</h4></b></div>
						<div style="position:absolute;" class="row-fluid pagination-centered pull-right pagination-centered members right_offset"><b><h4 style="color:#fff">Pusat Biomedis dan Teknologi Kesehatan Dasar</h4></b></div-->
						<div style="position:absolute;" class="row-fluid pagination-centered pull-right pagination-centered spacer-medium members"><b><h4 style="color:#fff">BALITBANGKES</h4></b></div>
						<div style="position:absolute; padding-top: 3.5%; " class="row-fluid pagination-centered pull-right pagination-centered spacer-medium members"><b><h4 style="color:#fff">Kementerian Kesehatan RI</h4></b></div>
					</div>
				</div> 

				<div class="row-fluid bb-bookblock" id="bb-bookblock">
					<div class="bb-item row-fluid login">
						<div class="top-background">
						  <div class="fill-background right"><div class="bg row-fluid"></div></div>
						  <div style="border-radius : 0 5px 0 0;" id="login-corner-shadow"></div>
						</div>
						<div class="row-fluid container">
							<div class="content">
								<div class="message row-fluid">
								  <!--h3>Enter your username and password.</h3-->
								  <h3 style="color:#fff">.</h3>
								</div>
								
										<form id="frm0" action="<?php echo $application_path; ?>/logindua/proseslogin" method="POST">
										<input type="hidden" name="statpos" value="0">
											<!--<select name="Lab" id="Lab" class='input-block-level'>-->
				                            <select name="Lab" id="Lab" class='input-block-level' onchange="penelitian(this.value)">
												<option value=""> - Silakan Pilih Laboratorium - </option>
												<?php foreach($arr_lab as $value): ?>
												<option value="<?php echo $value['LAB_CODE']; ?>"><?php echo $value['LAB_NAME'] ?></option>
												<?php endforeach; ?>
											</select>
                            				<div id="div_penelitian">
                            					<select name="Penelitian" id="Penelitian" class='input-block-level' >
											     	<option value=""> - Silakan Pilih Laboratorium Terlebih Dahulu - </option>
                            						
                            					</select>
                            				</div>
											<!--<select name="Penelitian" id="Penelitian" class='input-block-level'>
												<option> - Silakan Pilih Penelitian - </option>
												<!?php foreach($arr_penelitian as $value): ?>
												<option value="<!?php echo $value['penelitian_kode']; ?>"><!?php echo $value['penelitian_name'] ?></option>
												<!?php endforeach; ?>
											</select>-->
											<!--div class="sep">or</div-->
											<div class="email"><input type="text" name="User" placeholder="User" class='input-block-level'></div>
											<div class="pw">
												<input type="password" name="Password" placeholder="Password" class='input-block-level'>
											</div>
											<!--<button type="submit" value="Sign In" class='button button-basic-darkblue btn-block'>Sign In</button>-->
											<input class="btn btn-primary btn-large" rel="tooltip" data-placement="top" data-original-title=".btn .btn-primary .btn-large" name="submit" type="submit" value="Login">
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
									<h3 style="color:#fff">.</h3>
								</div>
										<form id="frm0" action="<?php echo $application_path; ?>/logindua/prosesloginups" method="POST">
										<input type="hidden" name="statpos" value="0"/>
											<!--div class="sep">or</div-->
											<div class="email"><input type="text" name="User" placeholder="User" class='input-block-level'></div>
											<div class="pw">
												<input type="password" name="Password" placeholder="Password" class='input-block-level'>
											</div>
											<!--<button type="submit" value="Sign In" class='button button-basic-darkblue btn-block'>Sign In</button>-->
										<div class="controls span4 offset9">
											<input class="btn btn-info btn-large" rel="tooltip" data-placement="top" data-original-title=".btn .btn-info .btn-large" name="submit" type="submit" value="Login">
										<!--a href="index.html" class="btn btn-primary btn-larg1e row-fluid">Take me in <i class="gicon-chevron-right icon-white"></i></a-->
										</div>
										</form>
							</div><!-- End .container -->
						</div> <!-- End .row-fluid -->
					</div> <!-- .bb-item  -->

			  
				</div> <!-- End #bb-bookblock -->
				
				<div class="row-fluid spacer">
					<!--p class="row-fluid pagination-centered ">Login</p-->
					<p class="row-fluid pagination-centered spacer-medium not-member members">Login Penelitian <a href="#" id="bb-nav-next" class="members_button">UPS<i class="icon-magic"></i></a></p>
					<p class="row-fluid pagination-centered spacer-medium already-member members" style="display:none;">Login Selain <a href="#" class="members_button" id="bb-nav-prev">UPS <i class="icon-undo"></i></a></p>
				</div>
			</div> <!-- End .row-fluid -->

		</div> <!-- End #login -->
        <!-- <img src="img/ajax-loader.gif"> -->
    </div> <!-- End #loading -->


    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->

    
    <!-- Flip effect on login screen -->
    <!--script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.0/jquery.min.js"></script-->
	<script src="<?php echo $application_path; ?>/js/jquery-1.9.1.js"></script>
    <!--script type="text/javascript" src="<!?php echo $application_path; ?>/js/jquerypp.custom.js"></script-->
    <script type="text/javascript" src="<?php echo $application_path; ?>/js/jquery.bookblock.js"></script>
        <script language="javascript" type="text/javascript" src="<?php echo $application_path; ?>/js/jquery.uniform.min.js"></script>

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

   
</body>
</html>