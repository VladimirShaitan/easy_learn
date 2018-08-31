          <div class="col-md-8">
            <div class="orders-profile loggedin">


   <div class="main">
      <div class="row">
            <div class='jsError'></div> 
         <div class="col-sm-6">
            <h2>Заказ: #<?php echo $orderid;?> </h2>
         </div>
         <div class="col-sm-6">
<h2> Ваш аккаунт не активен </h2>
         </div>
      </div>



      <hr/>

      <div class="row">
         <div class="col-md-12">
            <div class="with-nav-tabs panel-default">
               <div class="panl-heading">
               </div>
               <div class="panel-body">
                  <div class="tab-content">
                     <div class="tab-pane fade in active" id="instructions">
                        <table class="table">
                           <tbody>
                             <tr>
                                 <td class="text-right col-sm-4"><strong>Тема:</strong></td>
                                 <td class="text-left"><?php echo $topic;?></td>
                              </tr>
                             <!--  <tr>
                                 <td class="text-right col-sm-4"><strong>Тип сервиса:</strong></td>
                                 <td class="text-left">
                                    <?php if ($typeofservice == 1) {echo "Написание с нуля";} else {echo "Редактирование";}?> 
                                 </td>
                              </tr> -->
                              <tr>
                                 <td class="text-right col-sm-4"><strong>Предмет: </strong></td>
                                 <td class="text-left"><?php echo $subject;?></td>
                              </tr>
                              <tr>
                                 <td class="text-right col-sm-4"><strong>Статус заказа:</strong></td>
                                 <td class="text-left"> <?php echo $order_status;?></td>
                              </tr>
                              <tr>
                                 <td class="text-right col-sm-4"><strong>Обьем:</strong></td>
                                 <td class="text-left"><?php echo $pages;?> Стр <?php echo $words;?> Слов</td>
                              </tr>
                              <tr>
                                 <td class="text-right col-sm-4"><strong>Бюджет:</strong></td>
                                 <td class="text-left"><?php echo $sources;?> </td>
                              </tr>
                              <tr>
                                 <td class="text-right col-sm-4"><strong>Срок:</strong></td>
                                 <td class="text-left alert alert-danger">

<?php
$datetime1 = new DateTime(date('Y-m-d H:i:s'));
$datetime2 = new DateTime($deadline);

if($datetime1 >= $datetime2){
  echo "Срок вышел";
}

if($datetime1 <= $datetime2){
$interval = $datetime1->diff($datetime2);
$elapsed = $interval->format('%a дней %h часов %i минут');
echo 'Осталось времени: '.$elapsed;
}

?>

                                 </td>
                              </tr>
                            <!--   <tr>
                                 <td class="text-right col-sm-4"><strong>Сумма:</strong></td>
                                 <td class="text-left"><?php echo '$'.$writerpay;?></td>
                              </tr> -->

                           </tbody>
                        </table>
<h4>Детали по заказу </h4>
<hr style="border: 1px dashed #bfbfbf;" />
<?php echo $instructions;?>
<hr style="border: 1px dashed #bfbfbf;" />

<div class="row">
<div class="col-md-6 border-right">
<h5> Материалы проекта </h5> 
                        <table class="table ">
  
   <?php foreach ($order_files as $order_files): ?>
                                                         <tr>
<td> <?php echo $order_files['file_name']; ?><br/>
  <?php echo $order_files['upload_date']; ?><br/>
 <!--   <?php echo $order_files['uploader_name']; ?> -->
</td>

<td> 
<?php echo form_open('Filedownload/download/'.$order_files['tmp_name'], array('class'=>'jddform'));?>
<input type="hidden" name="path" value="<?php echo $this->config->item('uploads'); ?>/<?php echo $order_period;?>/<?php echo $orderid;?>/<?php echo $order_files['tmp_name']; ?>">
<input type='hidden' name='filename' value="<?php echo $order_files['tmp_name']; ?>">
<input type='hidden' name='orderid' value="<?php echo $orderid;?>">
<input type="submit" name="submit" value="Загрузить" class="btn-warning">
                  <?php echo form_close();?> 
</td>
</tr>
 <?php endforeach; ?>  
                        </table>


</div>
<div class="col-md-6">
<h5> Завершенный заказ </h5> 

                        <table class="table ">
  
   <?php foreach ($order_essays as $order_essays): ?>
                                                         <tr>
<td> <?php echo $order_essays['file_name']; ?><br/>
  <?php echo $order_essays['upload_date']; ?><br/>
  <!--  <?php echo $order_essays['uploader_name']; ?> -->
</td>

<td> 
<?php echo form_open('Filedownload/download/'.$order_essays['tmp_name'], array('class'=>'jddform'));?>
<input type="hidden" name="path" value="<?php echo $this->data["uploads"]; ?>/<?php echo $order_period;?>/<?php echo $orderid;?>/<?php echo $order_essays['tmp_name']; ?>">
<input type='hidden' name='filename' value="<?php echo $order_essays['tmp_name']; ?>">
<input type='hidden' name='orderid' value="<?php echo $orderid;?>">
<input type="submit" name="submit" value="Загрузить" class="btn-warning">
                  <?php echo form_close();?> 
</td>
</tr>
 <?php endforeach; ?>  
                        </table>




</div>
</div>

                     </div> 


                  </div>
               </div>
            </div>
         </div>
      </div>

   </div>
</div>


          </div>

               

        </div>
</div>
</div>
</div>


<!-- This script is responsibe for revealing the request button once request this order is clicked.  -->
<script>
$(document).ready(function(){
   $(".request_order").hide();
    $("#request_order").click(function(){
        $(".request_order").show();
    });

});
</script>

<script>
$('#myTab a').click(function(e) {
  e.preventDefault();
  $(this).tab('show');
});

// store the currently selected tab in the hash value
$("ul.nav-tabs > li > a").on("shown.bs.tab", function(e) {
  var id = $(e.target).attr("href").substr(1);
  window.location.hash = id;
});

// on load of the page: switch to the currently selected tab
var hash = window.location.hash;
$('#myTab a[href="' + hash + '"]').tab('show');
</script>