      <div id='content'>
        <div class='panel panel-default'>
          <div class='panel-heading'>
            <i class='fa fa-beer fa fa-large'></i>
           Messages
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
<div class="main">
  
  <div class="main-inner">

      <div class="container">
        
       <div class="row">
          
          <div class="span12">
        
          <div class="info-box">
               <div class="row-fluid stats-box">
<table class="table">
<thead>
<th>ID</th>
<th>definition</th>
<th>Edit</th>



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
               </div>
               
               
             </div>
               
               
         </div>
         </div>      
          
        <!-- /row -->  
      </div> <!-- /container -->
      
  </div> <!-- /main-inner -->
    
</div> <!-- /main -->
    

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
