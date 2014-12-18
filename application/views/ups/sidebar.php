<script type="text/javascript">

	function search(event) {
		if (event.keyCode == 13) {
			var vsearch = $ID('search').value;
			//$ID('NoStiker').value = vNoStiker.substring(5,11);
			alert("Page search sedang dalam pengerjaan.");
			//reload($ID('NoStiker').value);
		}
	}
</script>
			<div class="search">
				<form id="frm0" action="<?php echo $application_path; ?>/ups/home/lab" method="POST">
					<select name="UpLab" id="Level" class='input-block-level' style="border-radius: 20px 20px 0 0;">
						<option> - Silakan Pilih Laboraturium - </option>
						<?php foreach($arr_lab as $value): ?>
						<option value="<?php echo $value['LAB_CODE']; ?>"><?php echo $value['LAB_NAME'] ?></option>
						<?php endforeach; ?>
					</select>
						<!--button style="float:left;" type="button" onclick="#)" class="button button-basic-blue">Go</button-->
						
						<input style="float:right;background-image: linear-gradient(#5687D7, #3570CF);" class="button button-basic-blue" name="submit" type="submit" value="Go">
				</form>
			</div>
			<!--div class="search">
				<i class="icon-search icon-white"></i>
				<form action="<!?php echo $application_path; ?>/search/index" method="POST">
					<input type="text" name="search" id="search" for="search" placeholder="Search here" />
				</form>
			</div-->
			
				<ul style="margin:12px 8px;" class="mainNav" data-open-subnavs="multi">
					<li class='active'>
						<a href="<?php echo $application_path; ?>/ups/home/">
                            <i class="icon-home icon-white"></i><span>Dashboard</span>
                        </a>
					</li>
					<!-- Penelitian Riskesdas -->
					<?php
						if ( $this->data['level'] ==11 ){
							echo "
								<li>
									<a href=\"#\"><span>Forms</span><span class=\"label\">3</span></a>
									<ul class=\"subnav\">
										<li>
											<a href=\"#\" onclick=\"goto('ups/pengambilan/')\">Pengambilan</a>
										</li>
										<li>
											<a href=\"#\" onclick=\"goto('ups/penerimaan/')\">Penerimaan</a>
										</li>
										<li>
											<a href=\"#\" onclick=\"goto('ups/pengembalian/')\">Pengembalian</a>
										</li>
										<!--li>
											<a href=\"#\" onclick=\"goto('ups/pemeriksaan/')\">Pemeriksaan</a>
										</li-->
									</ul>
								</li>
								<!--li>
									<a href=\"#\"><span>Laporan</span><span class=\"label\">1</span></a>
									<ul class=\"subnav\">
										<li>
											<a href=\"#\" onclick=\"goto('ups/laporan_Penerimaan/')\">Laporan Penerimaan</a>
										</li>
									</ul>
								</li-->
							";
						}
					?>
                    
				</ul>
				
				
			<!--
				<div class="status button">
					<div class="status-top">
						<div class="left">
							Saving changes...
						</div>
					</div>
					<div class="status-bottom">
						<div class="progress">
							<div class="bar" style="width:60%">60%</div>
						</div>
					</div>
				</div>
			-->
	<div class="navi-functions">
		<div class="btn-group btn-group-custom">
			<a href="#" class="button button-square layout-not-fixed notify" rel="tooltip" title="Toggle fixed-nav" data-notify-message="Fixed nav is now {{state}}" data-notify-title="Toggled fixed nav">
				<i class="icon-unlock"></i>
			</a>
			<a href="#" class="button button-square layout-not-fluid notify button-active" rel="tooltip" title="Toggle fixed-layout" data-notify-message="Fixed layout is now {{state}}" data-notify-title="Toggled fixed layout">
				<i class="icon-exchange"></i>
			</a>
		</div>
	</div>