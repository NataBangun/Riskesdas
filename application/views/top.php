<div class="container-fluid">
				<div class="pull-left">
					<a href="#" id="brand"><small>Kementerian Kesehatan</small></a>
					<div class="collapse-me">
						<!--a href="messages.html" class="button">
							Messages
							<span class="badge badge-important">21</span>
						</a>
						<a href="#" class="button">
							Support tickets
							<span class="badge badge-info">3</span>
						</a>
						<a href="#" class="button">
							Orders
							<span class="badge badge-default">5</span>
						</a-->
					</div>
				</div>
				<?php if(isset($welcome))
				echo "
				<div class=\"pull-right\">
					<div class=\"btn-group\">
						<a href=\"#\" class=\"button dropdown-toggle\" data-toggle=\"dropdown\"><i class=\"icon-white icon-user\"></i>$welcome<span class=\"caret\"></span></a>
						<div class=\"dropdown-menu pull-right\">
							<div class=\"right-details\">
								<h6>Anda Login Sebagai</h6>
									<span class=\"name\"><h4><u>{$welcome}</u></h4></span>
								<h6>User ID Anda</h6>
									<span class=\"name\"><h4><u>{$user_id}</u></h4></span>
									<h6>Level : <p style=\"color:red\">"; {if ($level == 9 ) echo "Administrator"; elseif ($level == 3) echo "Manajemen"; elseif ($level == 2) echo "Entry"; elseif ($level == 1) echo "Admin";}echo"</p></h6>
									<h6>Lab : <p style=\"color:red\">"; {if ($lab == '1' ) echo "BAKTERI"; elseif ($lab == '2') echo "STEAM CELL"; elseif ($lab == '3') echo "VIROLOGI"; elseif ($lab == '4') echo "PARASIT"; elseif ($lab == '5') echo "IMUNOLOGI"; elseif ($lab == '6') echo "FARMASI"; elseif ($lab == '7') echo "MAMALOGI"; elseif ($lab == '8') echo "BSL 3"; elseif ($lab == '9') echo "HEWAN COBA";}echo"</p></h6>
									<h6>Penelitian : <p style=\"color:red\">{$penelitian}</p></h6>
                                    <a href=\"#\" class=\"highlighted-link\">Need help?</a>
							</div>
						</div>
					</div>
					<a href=\"{$application_path}/login/logout\" class=\"button\">
					<i class=\"icon-signout\"></i>
						Logout
					</a>
				</div>";
				?>
			</div>