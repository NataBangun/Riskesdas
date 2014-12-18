<script>
	function reloadPage()
	  {
	  location.reload()
	  }
</script>
<div class="page-header">
	<div class="pull-left">
		<h4><i class="icon-table"></i> Tables</h4>
	</div>
	<div class="pull-right">
		<ul class="bread">
			<li><a href="dashboard.html">Home</a><span class="divider">/</span></li>
			<li class='active'>Tables</li>
		</ul>
	</div>
</div>

<div class="container-fluid" id="content-area">
	<div class="row-fluid">
		<div class="span12">
			<div class="box">
				<div class="box-head">
					<i class="icon-table"></i>
					<span>Table with controls &amp; pagination</span>
				</div>
				<div class="box-body box-body-nopadding">
					<div class="highlight-toolbar">
						<div class="pull-left"><div class="btn-toolbar">
							<div class="btn-group">
								<a href="#" class='button button-basic button-icon' rel="tooltip" title="Archive"><i class="icon-inbox"></i></a>
								<a href="#" class='button button-basic button-icon' rel="tooltip" title="Mark as spam"><i class="icon-exclamation-sign"></i></a>
								<a href="#" class='button button-basic button-icon' rel="tooltip" title="Delete"><i class="icon-trash"></i></a>
							</div>
						</div></div>
						<div class="pull-right">
							<div class="btn-toolbar">
								<div class="btn-group">
									<span><strong>1-25</strong> of <strong>348</strong></span>
								</div>
								<div class="btn-group">
									<a href="#" class="button button-basic button-icon" data-toggle="dropdown"><i class="icon-angle-left"></i></a>
									<a href="#" class="button button-basic button-icon" data-toggle="dropdown"><i class="icon-angle-right"></i></a>
								</div>
							</div>
						</div>
					</div>
					<table class="table table-nomargin table-bordered table-pagination">
						<thead>
							<tr>
								<th class='table-checkbox'>
									<input type="checkbox" class='sel-all'>
								</th>
								<th>Rendering engine</th>
								<th>Browser</th>
								<th>Platform(s)</th>
								<th>Engine version</th>
								<th>CSS grade</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td class='table-checkbox'>
									<input type="checkbox" class='selectable'>
								</td>
								<td>Trident</td>
								<td>Internet Explorer 4.0</td>
								<td>Win 95+</td>
								<td>4</td>
								<td>X</td>
							</tr>
							<tr>
								<td class='table-checkbox'>
									<input type="checkbox" class='selectable'>
								</td>
								<td>Presto</td>
								<td>Nokia N800</td>
								<td>N800</td>
								<td>-</td>
								<td>A</td>
							</tr>
							<tr>
								<td class='table-checkbox'>
									<input type="checkbox" class='selectable'>
								</td>
								<td>Misc</td>
								<td>NetFront 3.4</td>
								<td>Embedded devices</td>
								<td>-</td>
								<td>A</td>
							</tr>
							<tr>
								<td class='table-checkbox'>
									<input type="checkbox" class='selectable'>
								</td>
								<td>Misc</td>
								<td>Dillo 0.8</td>
								<td>Embedded devices</td>
								<td>-</td>
								<td>X</td>
							</tr>
							<tr>
								<td class='table-checkbox'>
									<input type="checkbox" class='selectable'>
								</td>
								<td>Misc</td>
								<td>Links</td>
								<td>Text only</td>
								<td>-</td>
								<td>X</td>
							</tr>
							<tr>
								<td class='table-checkbox'>
									<input type="checkbox" class='selectable'>
								</td>
								<td>Misc</td>
								<td>Lynx</td>
								<td>Text only</td>
								<td>-</td>
								<td>X</td>
							</tr>
							<tr>
								<td class='table-checkbox'>
									<input type="checkbox" class='selectable'>
								</td>
								<td>Misc</td>
								<td>IE Mobile</td>
								<td>Windows Mobile 6</td>
								<td>-</td>
								<td>C</td>
							</tr>
							<tr>
								<td class='table-checkbox'>
									<input type="checkbox" class='selectable'>
								</td>
								<td>Misc</td>
								<td>PSP browser</td>
								<td>PSP</td>
								<td>-</td>
								<td>C</td>
							</tr>
							<tr>
								<td class='table-checkbox'>
									<input type="checkbox" class='selectable'>
								</td>
								<td>Other browsers</td>
								<td>All others</td>
								<td>-</td>
								<td>-</td>
								<td>U</td>
							</tr>
						</tbody>
					</table>
					<div class="bottom-table">
						<div class="pull-left">
							<a href="#" class="button button-basic">Another button</a>
						</div>
						<div class="pull-right"><div class="pagination pagination-custom">
							<ul>
								<li><a href="#"><i class="icon-double-angle-left"></i></a></li>
								<li><a href="#">1</a></li>
								<li class='active'><a href="#">2</a></li>
								<li><a href="#">3</a></li>
								<li><a href="#">4</a></li>
								<li><a href="#">5</a></li>
								<li><a href="#"><i class="icon-double-angle-right"></i></a></li>
							</ul>
						</div></div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>


			<div class="container-fluid" id="content-area">
				<div class="row-fluid">
					<div class="span12">
						<div class="box">
							<div class="box-head">
								<i class="icon-inbox"></i>
								<span>Messages</span>
							</div>
							<div class="box-body box-body-nopadding">
								<div class="highlight-toolbar">
									<div class="pull-left"><div class="btn-toolbar">
										<div class="btn-group">
											<a href="#" class="button button-basic button-icon" rel="tooltip" title="Refresh results" onclick="reloadPage()"><i class="icon-refresh"></i></a>
										</div>
										<div class="btn-group">
											<div class="dropdown">
												<a href="#" class="button button-basic button-icon" data-toggle="dropdown" rel="tooltip" title="Mark elements"><i class="icon-check-empty"></i><span class="caret"></span></a>
												<ul class="dropdown-menu">
													<li><a href="#" class='sel-all'>All</a></li>
													<li><a href="#" class='sel-unread'>Unread</a></li>
												</ul>
											</div>
										</div>
										<div class="btn-group">
											<a href="#" class='button button-basic button-icon' rel="tooltip" title="Print"><i class="icon-print"></i></a>
											<!--<a href="#" class='button button-basic button-icon' rel="tooltip" title="Mark as spam"><i class="icon-exclamation-sign"></i></a>-->
											<a href="#" class='button button-basic button-icon' rel="tooltip" title="Delete"><i class="icon-trash"></i></a>
										</div>
										<div class="btn-group">
											<div class="dropdown">
												<a href="#" class="button button-basic button-icon" data-toggle="dropdown" rel="tooltip" title="Move to folder"><i class="icon-folder-close"></i><span class="caret"></span></a>
												<ul class="dropdown-menu">
													<li><a href="#">Some folder</a></li>
													<li><a href="#">Another folder</a></li>
												</ul>
											</div>
										</div>
									</div></div>
									<div class="pull-right">
										<div class="btn-toolbar">
											<div class="btn-group">
												<span><strong>1-25</strong> of <strong>348</strong></span>
											</div>
											<div class="btn-group">
												<a href="#" class="button button-basic button-icon" data-toggle="dropdown"><i class="icon-angle-left"></i></a>
												<a href="#" class="button button-basic button-icon" data-toggle="dropdown"><i class="icon-angle-right"></i></a>
											</div>
											<div class="btn-group">
												<div class="dropdown">
													<a href="#" class="button button-basic button-icon" data-toggle="dropdown"><i class="icon-cog"></i><span class="caret"></span></a>
													<ul class="dropdown-menu pull-right">
														<li><a href="#">Settings</a></li>
														<li><a href="#">Account settings</a></li>
														<li><a href="#">Email settings</a></li>
														<li><a href="#">Themes</a></li>
														<li><a href="#">Help &amp; FAQ</a></li>
													</ul>
												</div>
											</div>
										</div>
									</div>
								</div>
								<table class="table2 table2-striped table2-nomargin dataTable table2-mail">
									<thead>
										<tr>
											<th width="1%">
												<input type="checkbox" class='sel-all'>
											</th>
											<th width="1.5%">No.</th>
											<th width="10%">No Stiker</th>
											<th width="17%">Nama ART</th>
											<th width="45%">Alamat</th>
											<th class='table-date'>Tgl Pengambilan Darah</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td class='table-checkbox'>
												<input type="checkbox" class='selectable'>
											</td>
											<td>1.</td>
											<td class='table-icon'>
												<!--<a href="#" class="sel-star active"><i class="icon-star"></i></a>--><b>000001</b>
											</td>
											<td class='table-fixed-medium'>
												Johny Doesy
											</td>
											<td>
												Lorem ipsum sint laborum.
											</td>
											<td class='table-date'>
												12. Feb
											</td>
										</tr>

									</tbody>
								</table>
					<div class="bottom-table">
						<div class="pull-left">
							<a href="#" class="button button-basic">Tambah Data</a>
						</div>
						<div class="pull-right"><div class="pagination pagination-custom">
							<ul>
								<li><a href="#"><i class="icon-double-angle-left"></i></a></li>
								<li><a href="#">1</a></li>
								<li class='active'><a href="#">2</a></li>
								<li><a href="#">3</a></li>
								<li><a href="#">4</a></li>
								<li><a href="#">5</a></li>
								<li><a href="#"><i class="icon-double-angle-right"></i></a></li>
							</ul>
						</div></div>
					</div>
							</div>
						</div>
					</div>
				</div>
			</div>