    
<div class="main">
	
	<div class="main-inner">

	    <div class="container">
      	
	  	  <!-- /row -->
	
	      <div class="row">
	      	
	      	<div class="span3">
	      		
	      		<div class="widget">
						
					<div class="widget-header">
						<i class="icon-star"></i>
						<h3>Some Stats</h3>
					</div> <!-- /widget-header -->
					
					<div class="widget-content">
						<canvas id="pie-chart" class="chart-holder" height="250" width="538"></canvas>
					</div> <!-- /widget-content -->
						
				</div> <!-- /widget -->
				
	      		
	      		
	      		
		    </div> <!-- /span6 -->
	      	
	      	
	      	<div class="span9">
	      		
	      		<div class="widget">
							
					<div class="widget-header">
						<i class="icon-list-alt"></i>
						<h3>Another Chart</h3>
					</div> <!-- /widget-header -->
					
					<div class="widget-content">
<?php echo form_open_multipart( 'Adminmsg/mass_email'); ?>
                            <div class="tab-pane" id="formcontrols">
                                <form id="edit-profile" class="form-horizontal">
                                    <fieldset>
                                        <div class="control-group">
                                            <div class="span2">
                                                <label class="control-label" for="password2">Preffered Writer</label>
                                            </div>
                                            <div class="span5">
                                                <select name='preferred_writer' class="span5">
                                                    <option value="all"> All clients </option>
                                                    <?php foreach ($writers as $writers) { ?>
                                                    <option value="<?php echo $writers['writer_id']; ?>">
                                                        <?php echo $writers[ 'writer_id']; ?>
                                                        <?php echo $writers[ 'firstname']; ?>
                                                        <?php echo $writers[ 'lastname']; ?>
                                                    </option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                            <!-- /controls -->
                                        </div>
                                        <!-- /control-group -->

                                        <div class="control-group">
                                            <div class="span2">
                                                <label class="control-label" for="firstname">Тема</label>
                                            </div>
                                            <div class="span5">
                                                <input type="text" class="span5" id="firstname" name="topic">
                                            </div>
                                            <!-- /controls -->
                                        </div>
                                        <!-- /control-group -->



                                        <div class="control-group">
                                            <div class="span2">
                                                <label class="control-label" for="password2">Paper Description</label>
                                            </div>
                                            <div class="span5">
                                                <textarea class="span5" name="instructions"></textarea>
                                            </div>
                                            <!-- /controls -->
                                        </div>
                                        <!-- /control-group -->

                                        <div class="control-group">
                                       <div class="span2">
                                                <label class="control-label" for="password2"></label>
                                            </div>
                                         <div class="span5">
                                             <input type="submit" class="btn btn-info fullwidth" name="submit" value="Send Email" />
                                             </div>
                                        </div>
                                        <!-- /form-actions -->
                                    </fieldset>
                                </form>

					</div> <!-- /widget-content -->
				
				</div> <!-- /widget -->
									
		      </div> <!-- /span6 -->
	      	
	      </div> <!-- /row -->
	      
	      
	      
	      
			
	      
	      
	    </div> <!-- /container -->
	    
	</div> <!-- /main-inner -->
    
</div> <!-- /main -->
    
