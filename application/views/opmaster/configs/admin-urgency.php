        <div class='panel panel-default col-lg-9'>
          <div class='panel-heading'>
            <i class='fa fa-beer fa fa-large'></i>
            Urgency Configs
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
                        <a data-toggle="tab" href="#urgency1"><i class="fa fa-comments"></i><span> Urgencies </span></a>
                      </li>
                      <li>
                        <a data-toggle="tab" href="#urgency2"><i class="fa fa-user"></i><span> Add urgency</span></a>
                      </li>

                    </ul>
                  </div>
                  <div class="tab-content padded col-md-12 main" id="my-tab-content">
                    <div class="tab-pane active" id="urgency1">

 <table class="table">
<thead>
<th>ID</th>
<th>Pricing Value</th>
<th>Urgency</th>
<th>duration</th>
<th></th>
<th></th>



</thead>
                   <tbody>
                   <?php foreach ($urgency as $urgency): ?>
                   <tr>
<?php echo form_open('Siteconfigs/update_urgency/'.$urgency['id']);?>
                    <td><?php echo $urgency['id'];?></td>
                    <td>
                      
                      <input type="pvalue" name="pvalue" class="form-control" value="<?php echo $urgency['pvalue'];?>">
                    </td>
                    <td>
                      <input type="urgency" name="urgency" class="form-control" value="<?php echo $urgency['urgency'];?>">
                      </td>
                    <td>
            <select id='duration' name='duration' class="form-control"  >
      <option value="<?php echo $urgency['duration'];?>"> <?php echo $urgency['duration'];?> </option>
               <option value="Hours"> Hours</option>
               <option value="Days"> Days</option>
            </select>

                      </td>
                    <td>

<input type="hidden" name="id" value="<?php echo $urgency['id'];?>">
<input type='submit' class="btn btn-info" Value='update'>
<?php echo form_close();?> 
                    </td>
                    <td>


<?php echo form_open('Siteconfigs/delete_urgency/'.$urgency['id'], array('class'=>'delete_service'));?>
<input type="hidden" name="id" value="<?php echo $urgency['id'];?>">
<input type='submit' class="btn btn-danger" Value='Delete'>
<?php echo form_close();?> 

                    </td>
                  </tr>
      
                  <?php endforeach; ?>  
                  </tbody>
                </table> 
                      
                    </div>
                    <div class="tab-pane" id="urgency2">
                  <?php echo form_open('Siteconfigs/add_urgency', array('class'=>'jsefodrm'));?>
                    <h3> Add another urgency</h3> 
<div class='jsError'></div>
    <div class="form-group">
      <label class="control-label col-sm-3 text-right" for="email">Pricing value (eg 1,2,3)</label>
      <div class="col-sm-7">
        <input type="input" id="amount" class="form-control" name="pvalue">
      </div><br/>
    </div>

    <div class="form-group">
      <label class="control-label col-sm-3 text-right" for="email">Urgency (eg 1,2,3)</label>
      <div class="col-sm-7">
        <input type="input" id="amount" class="form-control" name="urgency">
      </div><br/>
    </div>


    <div class="form-group">
      <label class="control-label col-sm-3 text-right" for="pwd">Duration</label>
      <div class="col-sm-7">          
            <select id='duration' name='duration' class="form-control"  >
            <option value="1"> Select duration </option>
               <option value="Hours"> Hours</option>
               <option value="Days"> Days</option>
            </select>
      </div>
    </div>

          <div class="form-group">
            <label class="control-label col-md-3"></label>
            <div class="col-md-7">
             <input type='submit' class="form-control" Value='Add urgency'>
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
  <!--   <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js" type="text/javascript"></script><script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js" type="text/javascript"></script> -->
    <script src="http://cdnjs.cloudflare.com/ajax/libs/modernizr/2.6.2/modernizr.min.js" type="text/javascript"></script><script src="http://lab2023.github.io/hierapolis/assets/javascripts/application-985b892b.js" type="text/javascript"></script>
    <!-- Google Analytics -->
  </body>
</html>


