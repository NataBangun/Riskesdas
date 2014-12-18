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
						<a href=\"#\" class=\"button dropdown-toggle\" data-toggle=\"dropdown\">$welcome<span class=\"caret\"></span></a>
						<div class=\"dropdown-menu pull-right\">
							<div class=\"right-details\">
								<h6>Logged in as</h6>
									<span class=\"name\">{$welcome}</span>
									<span class=\"email\">{$level}</span>
								<a href=\"#\" class=\"highlighted-link\">Need help?</a>
								<ul>
									<li>
										<a href=\"#\">Getting started</a>
									</li>
									<li>
										<a href=\"#\">Account settings</a>
									</li>
								</ul>
							</div>
						</div>
					</div>
					<a href=\"{$application_path}/login/logout\" class=\"button\">
						Logout
					</a>
				</div>";
				?>
			</div>