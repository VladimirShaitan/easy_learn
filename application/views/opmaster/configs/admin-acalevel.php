        <div class='panel panel-default col-lg-9'>
          <div class='panel-heading'>
            <i class='fa fa-beer fa fa-large'></i>
Academic level configuration 
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
                    <i class="fa fa-sitemap"></i>Academic Levels  
                    <ul class="nav nav-tabs pull-right" data-tabs="tabs" id="tabs">
                      <li class="active">
                        <a data-toggle="tab" href="#acad1"><i class="fa fa-comments"></i><span>Academic levels</span></a>
                      </li>
                      <li>
                        <a data-toggle="tab" href="#acad2"><i class="fa fa-user"></i><span>Admin new Academic Level</span></a>
                      </li>

                    </ul>
                  </div>
                  <div class="tab-content padded col-md-12 main" id="my-tab-content">
                    <div class="tab-pane active" id="acad1">
<table class="table">
<thead>
<th>ID</th>
<th>Pricing Value</th>
<th>Academic level</th>
<th></th>
<th></th>



</thead>
                   <tbody>
                   <?php foreach ($academic_level as $academic_level): ?>
                   <tr>
<?php echo form_open('Siteconfigs/update_academic_level/'.$academic_level['id']);?>
                    <td><?php echo $academic_level['id'];?></td>
                    <td><input type="pvalue" name="pvalue" class="form-control" value="<?php echo $academic_level['pvalue'];?>"></td>
                    <td>
                      <input type="academic_level" name="academic_level" class="form-control" value="<?php echo $academic_level['academic_level'];?>"></td>
                    <td>
<input type="hidden" name="id" value="<?php echo $academic_level['id'];?>">
<input type='submit' class="btn btn-info" Value='update'>
<?php echo form_close();?> 

                    </td>
                    <td>
<?php echo form_open('Siteconfigs/delete_academic_level/'.$academic_level['id'], array('class'=>'delete_service'));?>
<input type="hidden" name="id" value="<?php echo $academic_level['id'];?>">
<input type='submit' class="btn btn-danger" Value='Delete'>
<?php echo form_close();?> 

                    </td>
                  </tr>
      
                  <?php endforeach; ?>  
                  </tbody>
                </table> 
                      
                    </div>
                    <div class="tab-pane" id="acad2">

                  <?php echo form_open('Siteconfigs/add_academic_level', array('class'=>'jsefodrm'));?>
                    <h3> You can Easily add/delete a field </h3> 
<div class='jsError'></div>
<div class="form-group">
<label class="col-sm-3 control-label text-right text-right"> Pricing Value </label>
<div class="col-sm-7">
<input class="form-control" value="1"   name='pvalue' type="text">
</div>
</div>

<div class="form-group">
<label class="col-sm-3 control-label text-right text-right"> Academic Level</label>
<div class="col-sm-7">
<input class="form-control" name='academic_level' placeholder="Subject" type="text">
</div>
</div>

          <div class="form-group">
            <label class="control-label col-md-3"></label>
            <div class="col-md-7">
             <input class="form-control" type='submit' Value='Add Academic Level'>
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
    <!-- Javascripts --><!-- 
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js" type="text/javascript"></script><script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js" type="text/javascript"></script> -->
    <script src="http://cdnjs.cloudflare.com/ajax/libs/modernizr/2.6.2/modernizr.min.js" type="text/javascript"></script><script src="http://lab2023.github.io/hierapolis/assets/javascripts/application-985b892b.js" type="text/javascript"></script>
    <!-- Google Analytics -->
  </body>
</html>


