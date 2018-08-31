        <div class='panel panel-default col-lg-9'>
          <div class='panel-heading'>
            <i class='fa fa-beer fa fa-large'></i>
            Referencing Styles
            <div class='panel-tools'>
              <div class='btn-group'>
                <a class='btn' href='#'>
                  <i class='icon-refresh'></i>
                  Refresh statics
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
                        <a data-toggle="tab" href="#ref1"><i class="fa fa-comments"></i><span> Referencing Styles </span></a>
                      </li>
                      <li>
                        <a data-toggle="tab" href="#ref2"><i class="fa fa-user"></i><span> Add Referencing Style </span></a>
                      </li>

                    </ul>
                  </div>
                  <div class="tab-content padded col-md-12 main" id="my-tab-content">
                    <div class="tab-pane active" id="ref1">

   <table class="table">
<thead>
<th>ID</th>
<th>style</th>
<th>Delete</th>



</thead>
                   <tbody>
                   <?php foreach ($referencing_style as $referencing_style): ?>
                   <tr>
                    <td><?php echo $referencing_style['id'];?></td>
                    <td><?php echo $referencing_style['style'];?></td>
                    <td>


<?php echo form_open('Siteconfigs/delete_style/'.$referencing_style['id'], array('class'=>'delete_style'));?>
<input type="hidden" name="id" value="<?php echo $referencing_style['id'];?>">
<input type='submit' class="btn btn-danger" Value='Delete Style'>
<?php echo form_close();?> 

                    </td>
                  </tr>
      
                  <?php endforeach; ?>  
                  </tbody>
                </table> 
                      
                    </div>
                    <div class="tab-pane" id="ref2">

                  <?php echo form_open('Siteconfigs/add_style', array('class'=>'add_style'));?>
                    <h3> Add referenecing styles here </h3> 
<div class='jsError'></div>

<div class="form-group">
<label class="col-sm-3 control-label text-right text-right"> Referencing Style </label>
<div class="col-sm-7">
<input class="form-control" class="col-xs-10 col-sm-5" name='style' type="input">
</div>
</div>
          <div class="form-group">
            <label class="control-label col-md-3"></label>
            <div class="col-md-7">
            <input class="form-control" type='submit' Value='Add style'>
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
<!--     <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js" type="text/javascript"></script><script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js" type="text/javascript"></script> -->
    <script src="http://cdnjs.cloudflare.com/ajax/libs/modernizr/2.6.2/modernizr.min.js" type="text/javascript"></script><script src="http://lab2023.github.io/hierapolis/assets/javascripts/application-985b892b.js" type="text/javascript"></script>
    <!-- Google Analytics -->
  </body>
</html>


