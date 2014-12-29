<div class="page-header">
	<div class="pull-left">
		<h4><i class="icon-table"></i> Search Penerimaan</h4>
	</div>
	<div class="pull-right">
		<ul class="bread">
			<li><a href="dashboard.html">Home</a><span class="divider">/</span></li>
			<li><a href="#">List</a><span class="divider">/</span></li>			
			<li class='active'>Search Penerimaan</li>
		</ul>
	</div>
</div>

<div class="container-fluid" id="content-area">
	<div class="row-fluid">
		<div class="span12">
			<div class="box">
				<div class="box-head">
                      <i class="icon-inbox"></i>
						<span>Search Penerimaan</span>
							<div class="pull-right">
								<div class="btn-toolbar">
									<div class="btn-group">
										<a href="<?php echo $application_path;?>/suratmasuk/frm" class="btn btn-default">Add</a> 
									</div>
								</div>
							</div>
                </div>
					
				<div class="box-body box-body-nopadding">
					<div class="highlight-toolbar">
								<!--start--pagination-->
								<?=$table_content;?>
							<div class="bottom-table">
								<div class="pull-right">
									<div class="btn-toolbar">
										<div class="btn-group">
										   <ul class="pagination">
										   <?=$link_pagination;?>
										   </ul>
										</div>
										<div class="btn-group">
											<span><strong>Page</label></strong> </span>
										</div>
										<div class="btn-group">
										<?=$link_pager;?>
										</div>
									</div>
								</div>
							</div>
								<?=$ajax_script?>
                        <!--end--pagination-->
					</div>
				</div>
            </div>
		</div>
	</div><!-- /.row -->
</div>
