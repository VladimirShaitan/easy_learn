<div class="main">
  
  <div class="main-inner">

      <div class="container">
        

        
  	      <div class="row">
	      	          <div class="span4">
            
            <div class="widget">
              
          <div class="widget-header">
            <i class="icon-list-alt"></i>
            <h3>Определение сообщений</h3>
          </div> <!-- /widget-header -->
          
          <div class="widget-content">



<table class="table">
<thead>
<th>ID</th>
<th>definition</th>
<th>Редактировать</th>



</thead>

                   <tbody>

                   <?php foreach ($messages as $messages): ?>
                   <tr>
                    <td><?php echo $messages['id'];?></td>
                    <td><?php echo $messages['msg_id'];?></td>
                    <td><a href="<?php echo site_url('Siteconfigs/view_message/'.$messages['msg_id']); ?>"> edit</a>
                    </td>
                  </tr>
                                   
                  <?php endforeach; ?>  

                  </tbody>
                </table> 

          </div> <!-- /widget-content -->
        
        </div> <!-- /widget -->
                  
          </div> <!-- /span6 -->
	      	<div class="span8">
	      		<div class="widget">
					<div class="widget-header">
						<i class="icon-star"></i>
						<h3>Сообщения менеджеру [<?php echo $msg_config['msg_id'];?>]</h3>
					</div> <!-- /widget-header -->
					
					<div class="widget-content">



<div class="col-sm-12">  
<div class='jsError'></div>
   <div class="tabbable">

      <div class="tab-content">
<?php echo form_open('Siteconfigs/editmsg_toadmin', array('class'=>'editmsg_toadmin'));?>
                  <div class='jsError'></div>  
    <div class="form-group">
      <div class="col-sm-10">
      <input type="hidden" class="form-control" name="msg_id" value = "<?php echo $msg_config['msg_id'];?>"/>
        <textarea class="form-control"  name="msg_body_admin"><?php echo $msg_config['msg_body_admin'];?></textarea><br/>
      </div>
    </div>

                    <p><input class="btn btn-danger"  type='submit' Value='редактировать Email'></p>
                  <?php echo form_close();?>
         </div>
      </div>


</div>

					</div> <!-- /widget-content -->
						
				</div> <!-- /widget -->
				

	      		<div class="widget">
					<div class="widget-header">
						<i class="icon-star"></i>
						<h3>Сообщение заказчику [<?php echo $msg_config['msg_id'];?>]</h3>
					</div> <!-- /widget-header -->
					
					<div class="widget-content">



<div class="col-sm-12">  
<div class='jsError'></div>

   <div class="tabbable">

      <div class="tab-content">
         <div id="msg_toclient" class="tab-pane fade active in">

                  <?php echo form_open('Siteconfigs/editmsg_toclient', array('class'=>'editmsg_toclient'));?>
                  <div class='jsError'></div>    
    <div class="form-group">
      <label class="control-label col-sm-2" for="email">Message Body</label>
      <div class="col-sm-10">
        <textarea class="form-control"  name="msg_body_client"><?php echo $msg_config['msg_body_client'];?></textarea><br/>
         <input type="hidden" class="form-control" name="msg_id" value = "<?php echo $msg_config['msg_id'];?>"/>
      </div>
    </div>

                    <p><input class="btn btn-danger"  type='submit' Value='Сохранить'></p>
                  <?php echo form_close();?>

         </div>
      </div>
   </div>



</div>

					</div> <!-- /widget-content -->
						
				</div> <!-- /widget -->


	      		<div class="widget">
					<div class="widget-header">
						<i class="icon-star"></i>
						<h3>Message to Writer (<?php echo $msg_config['msg_id'];?>) </h3>
					</div> <!-- /widget-header -->
					
					<div class="widget-content">



<div class="col-sm-12">  
<div class='jsError'></div>
   <div class="tabbable">

      <div class="tab-content">
         <div id="msg_towriter" class="tab-pane fade active in">
<?php echo form_open('Siteconfigs/editmsg_towriter', array('class'=>'editmsg_towriter'));?>
                  <div class='jsError'></div>

    
    <div class="form-group">
      <label class="control-label col-sm-2" for="email">Message Body</label>
      <div class="col-sm-10">
              <input type="hidden" class="form-control" name="msg_id" value = "<?php echo $msg_config['msg_id'];?>"/>
        <textarea class="form-control"  name="msg_body_writer"><?php echo $msg_config['msg_body_writer'];?></textarea><br/>
      </div>
    </div>

                    <p><input class="btn btn-danger"  type='submit' Value='Сохранить'></p>
                  <?php echo form_close();?>

         </div>

      </div>
   </div>



</div>

					</div> <!-- /widget-content -->
						
				</div> <!-- /widget -->				
	      		
	      		
	      		
		    </div> <!-- /span6 -->
	      	
	      	

	      	
	      </div> <!-- /row -->      
        
      
        
        
      </div> <!-- /container -->
      
  </div> <!-- /main-inner -->
    
</div> <!-- /main -->
    

    