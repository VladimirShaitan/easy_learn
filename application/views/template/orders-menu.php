    <!--work-shop-->
    <section  class="">

          <div class="header-section text-center">

            <hr class="bottom-line">
          </div>

          <div class="col-md-2 orders-menu loggedin">
<h5> Разделы </h5><hr/>
      <div><span class="glyphicon glyphicon-th"></span> &nbsp; <a href="<?php echo ci_site_url(); ?>order/clientmyorders">All myorders [<?php echo $myorders; ?>] </a></div><hr/>
     <div><span class="glyphicon glyphicon-flash"></span> &nbsp; <a href="<?php echo ci_site_url(); ?>order/client_unpaid">My unpaid [<?php echo $client_unpaid; ?>]</a></div><hr/>
     <div><span class="glyphicon glyphicon-th"></span> &nbsp; <a href="<?php echo ci_site_url(); ?>order/client_paid">Open Projects [<?php echo $client_paid; ?>]</a></div><hr/>
     <div><span class="glyphicon glyphicon-ok"></span> &nbsp; <a href="<?php echo ci_site_url(); ?>order/client_assigned">Assigned Orders [<?php echo $client_assigned; ?>]</a></div><hr/>
    <div><span class="glyphicon glyphicon-save"></span> &nbsp; <a href="<?php echo ci_site_url(); ?>order/client_pending">Uploaded Pending [<?php echo $client_pending; ?>]</a></div><hr/>
    <div><span class="glyphicon glyphicon-paperclip"></span> &nbsp; <a href="<?php echo ci_site_url(); ?>order/client_completed">Completed Orders [<?php echo $client_completed; ?>]</a></div><hr/>
    <div><span class="glyphicon glyphicon-tags"></span> &nbsp; <a href="<?php echo ci_site_url(); ?>order/client_revision">Revision Orders [<?php echo $client_revision; ?>]</a></div>
    

          </div>