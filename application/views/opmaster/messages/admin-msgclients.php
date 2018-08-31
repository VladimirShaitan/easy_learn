<div class="col-md-10">
  <div class="widget-container fluid-height">
    <div class="widget-content padded">
      <div class="myUsersWrapper">
        <table class='table'>
          <h4>Сообщения заказчикам</h4>
          <p>(выберите заказчика чтобы написать ему в чат)</p>
          <tbody>
             <?php foreach ($writers as $my_user_single){ ?>
              <tr class="success">
                <td><i class="fa fa-star text-yellow"></i></td>
                <td class=""><a href="<?php echo site_url('in/Adminmsg/sup_chat/'.$my_user_single['writer_id']).'#ancBot'; ?>">От пользователя #<?php echo $my_user_single['writer_id']; ?></a></td>
                <td class="col-md-2"><?php echo $my_user_single['firstname'] . ' ' . $my_user_single['lastname']; ?></td>
                <td class="col-md-7 text-right"><a href="<?php echo site_url('in/Adminmsg/sup_chat/'.$my_user_single['writer_id'].'#ancBot'); ?>">Написать сообщение заказчику</a></td>
              </tr>
           <?php } ?>
          </tbody>
      </table>  
    </div>
   </div>
  </div>
</div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.6.2/modernizr.min.js" type="text/javascript"></script><script src="https://lab2023.github.io/hierapolis/assets/javascripts/application-985b892b.js" type="text/javascript"></script>
  </body>
</html>
