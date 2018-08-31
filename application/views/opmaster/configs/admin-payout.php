        <div class='panel panel-default col-lg-9'>
          <div class='panel-heading'>
            <i class='fa fa-beer fa fa-large'></i>
           Payout Settings 
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
                        <a data-toggle="tab" href="#pay1"><i class="fa fa-comments"></i><span> Payout Settings </span></a>
                      </li>
                      <li>
                        <a data-toggle="tab" href="#pay2"><i class="fa fa-user"></i><span> Add Payouts</span></a>
                      </li>

                    </ul>
                  </div>
                  <div class="tab-content padded col-md-12 main" id="my-tab-content">
                    <div class="tab-pane active" id="pay1">
<table class="table">
<thead>
<th>ID</th>
<th>payout</th>
<th>Delete</th>



</thead>
                   <tbody>
                   <?php foreach ($accepted_payout as $accepted_payout): ?>
                   <tr>
                    <td><?php echo $accepted_payout['id'];?></td>
                    <td><?php echo $accepted_payout['payout'];?></td>
                    <td>


<?php echo form_open('Siteconfigs/delete_payout/'.$accepted_payout['id'], array('class'=>'delete_payout'));?>
<input type="hidden" name="id" value="<?php echo $accepted_payout['id'];?>">
<input type='submit' class="btn btn-danger" Value='Delete'>
<?php echo form_close();?> 

                    </td>
                  </tr>
      
                  <?php endforeach; ?>  
                  </tbody>
                </table> 
                      
                    </div>
                    <div class="tab-pane" id="pay2">

                  <?php echo form_open('Siteconfigs/add_payout', array('class'=>'add_payout'));?>
                    <h3> You can Easily add payout method here </h3> 
<div class='jsError'></div>

<div class="form-group">
<label class="col-sm-3 control-label text-right"> Payout Name </label>
<div class="col-sm-7">
<input class="form-control" name='payout' type="input">
</div>
</div>
          <div class="form-group">
            <label class="control-label col-md-3"></label>
            <div class="col-md-7">
              <input type='submit' class="form-control" Value='Add new Payout'>
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


