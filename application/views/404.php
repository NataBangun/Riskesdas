
<div class="error-wrapper">
	<div class="number">
		<span>404</span>
		<i class="icon-warning-sign"></i>

	</div>
	
	
		<?php
			if ( $this->data['level'] == "" or $this->data['welcome'] == "") {
				echo "<div class=\"description\">
							Oops!<br/>Maaf, anda belum login.<br/>Silakan <b style=\"color:red\">login</b> terlebih dahulu.
						</div>
						<div class=\"buttons\">
						<div class=\"pull-left\"><a href=\"{$application_path}/\" class=\"button button-basic\"><i class=\"icon-arrow-left\"></i> Login</a></div>
						
						</div>";
			} else {
				echo "<div class=\"description\">
							<b>Oops!</b><br/>Maaf <b style=\"color:red\"> {$this->data['welcome']} </b>,<br/>Anda tidak berhak mengakses halaman ini.
						</div>
						<div class=\"buttons\">
						<div class=\"pull-left\"><a href=\"{$application_path}/home\" class=\"button button-basic\"><i class=\"icon-arrow-left\"></i> Back</a></div>
						</div>";
			}
		?>
</div>