           <div class='panel panel-default col-lg-9'>
          <div class='panel-heading'>
            <i class='fa fa-comments-o fa fa-large'></i>
          Конфигурация предметов
            <div class='panel-tools'>
              <div class='btn-group'>
                <a class='btn' href='#'>
                  <i class='icon-refresh'></i>
                  
                </a>
                <a class='btn' data-toggle='toolbar-tooltip' href='#' title='Toggle'>
                  <i class='icon-chevron-down'></i>
                </a>
              </div>
            </div>
          </div>
          <div class='panel-body'>
            <div class="row">
              <div class="col-lg-12">
                <div class="widget-container fluid-height">
                  <div class="heading tabs">
                   
                    <ul class="nav nav-tabs pull-right" data-tabs="tabs" id="tabs">
                      <li class="active">
                        <a data-toggle="tab" href="#urgency1"><i class="fa fa-comments"></i><span> Предмет</span></a>
                      </li>
                      <li>
                        <a data-toggle="tab" href="#urgency2"><i class="fa fa-user"></i><span>Добавить предмет</span></a>
                      </li>

                    </ul>
                  </div>
                  <div class="tab-content padded col-md-12 main" id="my-tab-content">
                    <div class="tab-pane active" id="urgency1">

 <table class="table">
<thead>
<th>ID</th>
<!-- <th>Pricing Value</th>-->
 <th>Предмет</th>
<th></th>
<th></th>


</thead>
                   <tbody>
                   <?php foreach ($subjects as $subjects): ?>
                   <tr>
<?php echo form_open('Siteconfigs/Update_subject/'.$subjects['id'], array('class'=>'delet_subject'));?>
                    <td><?php echo $subjects['id'];?></td>
                    <!-- <td>
                      
<input type="pvalue" name="pvalue" class="form-control" value="<?php echo $subjects['pvalue'];?>">

                    </td> -->
                    <td>
<input type="subject" name="subject" class="form-control" value="<?php echo $subjects['subject'];?>">
</td>
                    <td>

<input type="hidden" name="id" value="<?php echo $subjects['id'];?>">
<input type='submit' class="btn btn-info" Value='Обновить'>
<?php echo form_close();?> 
                    </td>
                    <td>

<?php echo form_open('Siteconfigs/delete_subject/'.$subjects['id'], array('class'=>'delet_subject'));?>
<input type="hidden" name="id" value="<?php echo $subjects['id'];?>">
<input type='submit' class="btn btn-danger" Value='Удалить'>
<?php echo form_close();?> 
                    </td>
                  </tr>
                                   
                  <?php endforeach; ?>  
                   <?php echo form_close();?>
                  </tbody>
                </table> 
                      
                    </div>
                    <div class="tab-pane" id="urgency2">
                  <?php echo form_open('Siteconfigs/add_subject', array('class'=>'jsform'));?>
                  <div class='jsError'></div>


                                        <!-- <div class="form-group">                                         
                                            <!-- <label class="control-label col-md-12" for="firstname">Price value (digits only else its 1)</label> 
                                            <div class="col-md-12">
                                                <input type="text" class="form-control" id="firstname" name='pvalue' value="1">
                                            </div>  /controls               
                                        </div>  /control-group -->
                                        
                                        
                                        <div class="form-group">                                         
                                            <label class="control-label col-md-12" for="lastname">Предмет</label>
                                            <div class="col-md-12">
                                                <input type="text" class="form-control" id="lastname" name='subject' placeholder="Предмет">
                                            </div> <!-- /controls -->               
                                        </div> <!-- /control-group -->
          <div class="form-group">
            <label class="control-label col-md-3"></label>
            <div class="col-md-7">
              <input class="form-control"  type='submit' Value='Добавить новый предмет'>
            </div>
          </div>

 
                  <?php echo form_close();?>
                    </div>

                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Footer -->
    <!-- Javascripts -->
    <!-- <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js" type="text/javascript"></script><script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js" type="text/javascript"></script> -->
    <script src="http://cdnjs.cloudflare.com/ajax/libs/modernizr/2.6.2/modernizr.min.js" type="text/javascript"></script><script src="http://lab2023.github.io/hierapolis/assets/javascripts/application-985b892b.js" type="text/javascript"></script>
    <!-- Google Analytics -->
  </body>
</html>


