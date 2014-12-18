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
				<form id="frm0" action="<?php echo $application_path; ?>/home/lab" method="POST">
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
						<a href="<?php echo $application_path; ?>/home/">
                            <i class="icon-home icon-white"></i><span>Dashboard</span>
                        </a>
					</li>
					<!-- Penelitian Riskesdas -->
					<?php
						if ($this->data['penelitian'] =="R1" AND $this->data['level'] ==6 ) {
							echo "
								<li>
									<a href=\"#\"><span>List</span><span class=\"label\">4</span></a>
									<ul class=\"subnav\">
										<!--li>
											<a href=\"#\" onclick=\"goto('list_bm01/')\">Form List BM.01</a>
										</li-->
										<li>
											<a href=\"#\" onclick=\"goto('list_bm02/')\">Form List BM.02</a>
										</li>
										<li>
											<a href=\"#\" onclick=\"goto('list_bm04/')\">Form List BM.04</a>
										</li>
										<li>
											<a href=\"#\" onclick=\"goto('list_kimiaklinis/')\">Form List Kimia klinis</a>
										</li>
										<li>
											<a href=\"#\" onclick=\"goto('list_malaria/')\">Form List Malaria</a>
										</li>
									</ul>
								</li>
								<li>
									<a href=\"#\"><span>Forms</span><span class=\"label\">4</span></a>
									<ul class=\"subnav\">
										<!--li>
											<a href=\"#\" onclick=\"goto('formbm01/')\">Form BM.01</a>
										</li-->
										<li>
											<a href=\"#\" onclick=\"goto('formbm02/')\">Form BM.02</a>
										</li>
										<li>
											<a href=\"#\" onclick=\"goto('formbm04/')\">Form BM.04</a>
										</li>
										<li>
											<a href=\"#\" onclick=\"goto('formhasil_kimiaklinis/')\">Form Hasil Kimia Klinik</a>
										</li>
										<!--li>
											<a href=\"#\" onclick=\"goto('formhasil_malaria/')\">Form Hasil Malaria</a>
										</li-->
										<li>
											<a href=\"#\" onclick=\"goto('formhasil_malarianew/')\">Form Malaria</a>
										</li>
									</ul>
								</li>
								<!--li>
									<a href='#'><span>Export</span><span class='label'>2</span></a>
									<ul class='subnav'>
										<li>
											<a href='#' onclick='goto(\"export/\")'>Export All</a>
										</li>
										<li>
											<a href='#' onclick='goto(\"export_kimiaklinis/\")'>Export Kimia Klinis</a>
										</li>
										<li>
											<a href=\"#\" onclick=\"goto('export_bm01/')\">Export BM01</a>
										</li>
									</ul>
								</li-->
							";
						} else if ($this->data['level'] ==6 ){
							echo"
									
								<li>
									<a href=\"#\"><span>Form</span><span class=\"label\">1</span></a>
									<ul class=\"subnav\">
										<li>
											<a href=\"#\" onclick=\"goto('pemeriksaan/')\">Pemeriksaan</a>
										</li>
									</ul>
								</li>
								<li>
									<a href=\"#\"><span>Laporan</span><span class=\"label\">1</span></a>
									<ul class=\"subnav\">
										<li>
											<a href=\"#\" onclick=\"goto('laporan_Penerimaan/')\">Laporan Penerimaan</a>
										</li>
									</ul>
								</li>
							";
						} else if ( $this->data['level'] ==3 ){
							echo "
								<li>
									<a href='#'><span>List</span><span class='label'>1</span></a>
									<ul class='subnav'>
										<li>
											<a href=\"#\" onclick=\"goto('list_penerimaan/')\">Form List Penerimaan</a>
										</li>
									</ul>
								</li>
								<li>
									<a href=\"#\"><span>Laporan</span><span class=\"label\">3</span></a>
									<ul class=\"subnav\">
										<li>
											<a href=\"#\" onclick=\"goto('laporan_Penerimaan/')\">Laporan Penerimaan</a>
										</li>
									</ul>
								</li>
							";
						} else if ( $this->data['level'] ==4 ){
							echo "
								<li>
									<a href=\"#\"><span>List</span><span class=\"label\">1</span></a>
									<ul class=\"subnav\">
										<li>
											<a href=\"#\" onclick=\"goto('list_pemeriksaan/')\">Form List Pemeriksaan</a>
										</li>
									</ul>
								</li>
								<li>
									<a href=\"#\"><span>Laporan</span><span class=\"label\">1</span></a>
									<ul class=\"subnav\">
										<li>
											<a href=\"#\" onclick=\"goto('laporan_Penerimaan/')\">Laporan Penerimaan</a>
										</li>
										<!--li>
											<a href=\"#\" onclick=\"goto('laporan_Pemeriksaan/')\">Laporan Pemeriksaan</a>
										</li-->
										<!--li>
											<a href=\"#\" onclick=\"goto('laporan_hasil/')\">Laporan Hasil</a>
										</li-->
									</ul>
								</li>
							";
						} else if ( $this->data['level'] ==5 ){
							echo "
								<li>
									<a href=\"#\"><span>Laporan</span><span class=\"label\">3</span></a>
									<ul class=\"subnav\">
										<li>
											<a href=\"#\" onclick=\"goto('laporan_Penerimaan/')\">Laporan Penerimaan</a>
										</li>
										<li>
											<a href=\"#\" onclick=\"goto('laporan_Pemeriksaan/')\">Laporan Pemeriksaan</a>
										</li>
									</ul>
								</li>
							";
						} else if ( $this->data['level'] ==9 ){
							echo "
								<li>
									<a href=\"#\"><span>Forms</span><span class=\"label\">8</span></a>
									<ul class=\"subnav\">
										<li>
											<a href=\"#\" onclick=\"goto('formbm01/')\">Form BM.01</a>
										</li>
										<li>
											<a href=\"#\" onclick=\"goto('formbm02/')\">Form BM.02</a>
										</li>
										<li>
											<a href=\"#\" onclick=\"goto('formbm04/')\">Form BM.04</a>
										</li>
										<li>
											<a href=\"#\" onclick=\"goto('formhasil_kimiaklinis/')\">Form Hasil Kimia Klinik</a>
										</li>
										<!--li>
											<a href=\"#\" onclick=\"goto('formhasil_malaria/')\">Form Hasil Malaria</a>
										</li-->
										<li>
											<a href=\"#\" onclick=\"goto('formhasil_malarianew/')\">Form Malaria</a>
										</li>
										<li>
											<a href=\"#\" onclick=\"goto('pengambilan/')\">Pengambilan</a>
										</li>
										<li>
											<a href=\"#\" onclick=\"goto('penerimaan/')\">Penerimaan</a>
										</li>
										<li>
											<a href=\"#\" onclick=\"goto('pengembalian/')\">Pengembalian</a>
										</li>
										<li>
											<a href=\"#\" onclick=\"goto('pemeriksaan/')\">Pemeriksaan</a>
										</li>
									</ul>
								</li>
								<li>
									<a href='#'><span>Master</span><span class='label'>12</span></a>
									<ul class='subnav'>
										<li><a href='#' onclick='goto(\"propinsi/\")'>Propinsi</a></li>
										<li><a href='#' onclick='goto(\"kabupaten/\")'>Kabupaten</a></li>
										<li><a href='#' onclick='goto(\"kecamatan/\")'>Kecamatan</a></li>
										<li><a href='#' onclick='goto(\"kelurahan/\")'>Kelurahan</a></li>
										<li><a href='#' onclick='goto(\"spesimen/\")'>Jenis Spesimen</a></li>
										<li><a href='#' onclick='goto(\"kondisi_spesimen/\")'>Kondisi Spesimen</a></li>
										<li><a href='#' onclick='goto(\"simpan_spesimen/\")'>Penyimpanan Spesimen</a></li>
										<li><a href='#' onclick='goto(\"institusi/\")'>Asal Institusi</a></li>
										<li><a href='#' onclick='goto(\"penelitian/\")'>Nama Penelitian</a></li>
										<li><a href='#' onclick='goto(\"site/\")'>Jenis Site</a></li>
										<li><a href='#' onclick='goto(\"frmrevco/\")'>Revco</a></li>
										<li><a href='#' onclick='goto(\"frmbox/\")'>Box</a></li>
									</ul>
								</li>
								<li>
									<a href=\"#\"><span>Master User</span><span class=\"label\">2</span></a>
									<ul class=\"subnav\">
										<li>
											<a href=\"#\" onclick=\"goto('formuser/')\">Form User</a>
										</li>
										<li>
											<a href=\"#\" onclick=\"goto('formups/')\">Form User UPS</a>
										</li>
									</ul>
								</li>
								<li>
									<a href=\"#\" onclick='goto(\"import/\")'><span>Import</span><!--span class=\"label\">1</span--></a>
									<!--ul class=\"subnav\">
										<li>
											<a href='#' onclick='goto(\"import/\")'>Import</a>
										</li>
									</ul-->
								</li>
							";
						}
					?>
                    
					
                    <?php
					if ($this->data['level'] ==2 )
					echo "
                    
					<li>
						<a href=\"#\"><span>List</span><span class=\"label\">5</span></a>
						<ul class=\"subnav\">
							<li>
								<a href=\"#\" onclick=\"goto('list_bm01/')\">Form List BM.01</a>
							</li>
							<li>
								<a href=\"#\" onclick=\"goto('list_bm02/')\">Form List BM.02</a>
							</li>
							<li>
								<a href=\"#\" onclick=\"goto('list_bm04/')\">Form List BM.04</a>
							</li>
							<li>
								<a href=\"#\" onclick=\"goto('list_kimiaklinis/')\">Form List Kimia klinis</a>
							</li>
							<li>
								<a href=\"#\" onclick=\"goto('list_malaria/')\">Form List Malaria</a>
							</li>
							<li>
								<a href=\"#\" onclick=\"goto('list_penerimaan/')\">Form List Penerimaan</a>
							</li>
							<li>
								<a href=\"#\" onclick=\"goto('list_penerimaandua/')\">Form List Penerimaan dua</a>
							</li>
							<li>
								<a href=\"#\" onclick=\"goto('list_penerimaantiga/')\">Form List Penerimaan tiga</a>
							</li>
						</ul>
					</li>
					<li>
						<a href=\"#\"><span>Forms</span><span class=\"label\">8</span></a>
						<ul class=\"subnav\">
							<li>
								<a href=\"#\" onclick=\"goto('formbm01/')\">Form BM.01</a>
							</li>
							<li>
								<a href=\"#\" onclick=\"goto('formbm02/')\">Form BM.02</a>
							</li>
							<li>
								<a href=\"#\" onclick=\"goto('formbm04/')\">Form BM.04</a>
							</li>
							<li>
								<a href=\"#\" onclick=\"goto('formhasil_kimiaklinis/')\">Form Hasil Kimia Klinik</a>
							</li>
							<!--li>
								<a href=\"#\" onclick=\"goto('formhasil_malaria/')\">Form Hasil Malaria</a>
							</li-->
							<li>
								<a href=\"#\" onclick=\"goto('formhasil_malarianew/')\">Form Malaria</a>
							</li>
							<li>
								<a href=\"#\" onclick=\"goto('pengambilan/')\">Pengambilan</a>
							</li>
							<li>
								<a href=\"#\" onclick=\"goto('pengembalian/')\">Pengembalian</a>
							</li>
							<!--li>
								<a href=\"#\" onclick=\"goto('pemeriksaan/')\">Pemeriksaan</a>
							</li-->
						</ul>
					</li>";
					?>
					
					<!--?php
						if ( $this->data['level'] ==9 )
						echo "
						<li>
							<a href=\"#\"><span>Laporan</span><span class=\"label\">2</span></a>
							<ul class=\"subnav\">
								<!--li>
									<a href=\"#\" onclick=\"goto('formhasil_malarianew/')\">Form Malaria Tes</a>
								</li-->
								<!--li>
									<a href=\"#\" onclick=\"goto('laporan_Penerimaan/')\">Laporan Penerimaan</a>
								</li>
								<li>
									<a href=\"#\" onclick=\"goto('laporan_hasil/')\">Laporan Hasil</a>
								</li>
							</ul>
						</li>
						";
					?-->
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