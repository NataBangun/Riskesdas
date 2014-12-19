

<div class="row">
    <div class="col-lg-12">
        <div class="box">
                <header>
                    <div class="icons">
                      <i class="fa fa-edit"></i>
                    </div>
                    <h5>Surat Masuk</h5>
					
                    <!-- .toolbar -->
                   <div class="toolbar">
                      <nav style="padding: 8px;">
                        <a href="<?php echo $application_path;?>/suratmasuk/frm" class="btn btn-default">Add</a> 
					    <a href="javascript:;" class="btn btn full-box">
                          <i class="fa fa-expand"></i>
                        </a> 
					  </nav>
                    </div><!-- /.toolbar -->
                  </header>
                  
                  <div id="collapse4" class="body">
                    
                        <!--start--pagination-->
                        <?=$table_content;?>
                        <div class="row">
                            
                            <div class="col-md-3">
                                <?=$link_pagination;?>
                            </div>
                            
                            <div class="col-md-3">
                                <div class="col-md-2"><label style="margin: 22px 0px">Page</label></div>
                                <div class="col-md-4"><?=$link_pager;?></div>
                            </div>
                        </div>
                        <?=$ajax_script?>
                        <!--end--pagination-->
                    
                </div>
            </div>
    </div>
</div><!-- /.row -->

