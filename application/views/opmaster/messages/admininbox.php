<div class="col-md-10">
  <div class='panel-body filters'>
    <div class='row'>
      <!-- <pre><?php // print_r($no_sup_user); ?></pre> -->

<!-- <pre>
  <?php // print_r($unread); ?>
</pre> -->



      <?php if(!empty($no_sup_user)){ ?>
      <table class='table'>
          <tbody>
             <?php foreach ($no_sup_user as $no_sup_single){ ?>
              <tr class="success">
                <td><i class="fa fa-star text-yellow"></i></td>
                <td class=""><a href="<?php echo site_url('in/Adminmsg/sup_chat/'.$no_sup_single['writer_id'].'#ancBot'); ?>">От пользователя #<?php echo $no_sup_single['writer_id']; ?></a></td>
                <td class="col-md-2"><?php echo $no_sup_single['firstname'] . ' ' . $no_sup_single['lastname']; ?></td>
                <td class="col-md-4"><a href="<?php echo site_url('in/Adminmsg/sup_chat/'.$no_sup_single['writer_id'].'#ancBot'); ?>">Перейти в чат</a></td>
                <?php if(!empty($unread)) { ?>
                <td class="col-md-3" style="color: red; text-align: center">
                    <?php foreach ($unread as $unread_single) { 
                       if($unread_single['writer_id'] === $no_sup_single['writer_id']){
                          echo "Вам пришло новое сообщение";
                       }
                    } ?>
                </td>
                <?php } ?>
              </tr>
           <?php } ?>
          </tbody>
        </table>
        <?php } ?>



        <div class="clearfix"></div>
      <div class="myUsersWrapper" id="ref">
        <? if($this->session->userdata('admin_level') != 'super') {
          echo '<h4><br/>Сообщения от пользователей</h4>';
        } ?>

       <?php if(!empty($my_users)) { ?>
        <table class='table'>
          <tbody>
             <?php foreach ($my_users as $my_user_single) { ?>
              <tr class="success">
                <td><i class="fa fa-star text-yellow"></i></td>
                <td class=""><a href="<?php echo site_url('in/Adminmsg/sup_chat/'.$my_user_single['writer_id'].'#ancBot'); ?>">От пользователя #<?php echo $my_user_single['writer_id']; ?></a></td>
                <td class="col-md-2"><?php echo $my_user_single['firstname'] . ' ' . $my_user_single['lastname']; ?></td>
                <td class="col-md-4"><a href="<?php echo site_url('in/Adminmsg/sup_chat/'.$my_user_single['writer_id'].'#ancBot'); ?>">Перейти в чат</a></td>
                <?php if(!empty($unread)) { ?>
                <td class="col-md-3" style="color: red; text-align: center">
                    <?php foreach ($unread as $unread_single) { 
                       if($unread_single['writer_id'] === $my_user_single['writer_id']){
                          echo "Вам пришло новое сообщение";
                       }
                    } ?>
                </td>
                <?php } ?>
              </tr>
           <?php } ?>
          </tbody>
      </table>    
      <?php } ?>
      <!-- <hr style="margin: 10px 0"> -->

      </div>
    </div>
  </div>
</div>
<!-- <script type="text/javascript">
      setInterval(function(){ 
      $('#ref').load(window.location.href + " #ref"); 
    }, 5000); 
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.6.2/modernizr.min.js" type="text/javascript"></script>
<script src="https://lab2023.github.io/hierapolis/assets/javascripts/application-985b892b.js" type="text/javascript"></script>
 -->
   </body>
</html>
