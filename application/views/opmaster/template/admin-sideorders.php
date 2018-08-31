     <!-- Content -->
      <div id='content'>
        <div class='panel panel-default col-lg-3'>
          <div class='panel-heading'>
            <i class='fa fa-id-card-o fa fa-large'></i>
            Управление заказами

          </div>
          <div class='panel-body'>
  
<?php        

$writer_id = $this->session->userdata('writer_id');

?>



<div class="admin-menu">
<ul class="list-unstyled" style="margin-left: 10px ">

  <li>
    <a tabindex="0" data-trigger="hover", role="button" data-toggle="popover" data-trigger="focus" title="График" data-content="Стариница с 7-ми дневным графиком по всем текущим заказам" data-placement="top"><i class="fa fa-question-circle"></i></a>
    <a href="<?php echo ci_site_url(); ?>Adminorders/new_order">График выполнения заказов</a>
  </li>


    <li>
      <a tabindex="0" data-trigger="hover", role="button" data-toggle="popover" data-trigger="focus" title="Все заказы" data-content="Страница со всеми заказами размещенными на сайте, кроме Завершенных или Архивных" data-placement="top"><i class="fa fa-question-circle"></i></a>
      <a href="<?php echo ci_site_url(); ?>Adminorders/iorders">Все заказы </a>
  </li>


  <li>
    <a tabindex="0" data-trigger="hover", role="button" data-toggle="popover" data-trigger="focus" title="Оцененные заказы" data-content="Страница со всеми заказами на которые были сделаны ставки авторами (Автор оценил заказ)" data-placement="top"><i class="fa fa-question-circle"></i></a>  
    <a href="<?php echo ci_site_url(); ?>Adminorders/order_requests">Оцененные заказы</a>
  </li>
  

<!--   <li>
    <a tabindex="0" data-trigger="hover", role="button" data-toggle="popover" data-trigger="focus" title="Неназначенные заказы" data-content="Страница со всеми заказами к которым не привязан исполнитель (Статус выполнения: Открытый проект)" data-placement="top"><i class="fa fa-question-circle"></i></a>    
    <a href="<?php // echo ci_site_url(); ?>Adminorders/unassigned_orders">Неназначенные заказы</a>
  </li>  -->

  <li>
    <a tabindex="0" data-trigger="hover", role="button" data-toggle="popover" data-trigger="focus" title="Заказы на выполнении" data-content="Страница со всеми заказами которые находятся на выполнении (Статус: На выполнении) и к которым привязан исполнитель (Автор) (Статус выполнения: На выполнении) " data-placement="top"><i class="fa fa-question-circle"></i></a> 
    <a href="<?php echo ci_site_url(); ?>Adminorders/assigned_orders">Заказы на выполнении</a>
  </li>
  <li>
    <a tabindex="0" data-trigger="hover", role="button" data-toggle="popover" data-trigger="focus" title="Половина работы" data-content="Страница со всеми заказами по которым была выполнена половина работы (Статус выполнения и оплаты: Половина работы)" data-placement="top"><i class="fa fa-question-circle"></i></a>
    <a href="<?php echo ci_site_url(); ?>Adminorders/cancelled_orders">Половина работы</a>
</li> 

<?php if($this->session->userdata('admin_level') === 'super' )  {?>
  <li>
    <a tabindex="0" data-trigger="hover", role="button" data-toggle="popover" data-trigger="focus" title="Неоплаченные заказы" data-content="Заказы которые были отмечены Автором как 'Готовый заказ'(Заказы по которым Автора ожидают оплату)" data-placement="top"><i class="fa fa-question-circle"></i></a>
    <a href="<?php echo ci_site_url(); ?>Adminorders/pending_orders">На оплату Авторам</a>
  </li>
<?php } ?>

  <li>
    <a tabindex="0" data-trigger="hover", role="button" data-toggle="popover" data-trigger="focus" title="Завершенные заказы" data-content="Страница со всеми заказами которые были выполнены, но не перемещены в Архив (Статус выполнения: Завершенный)" data-placement="top"><i class="fa fa-question-circle"></i></a>
    <a href="<?php echo ci_site_url(); ?>Adminorders/completed_orders">Завершенные заказы</a>
</li>
  <li>
    <a tabindex="0" data-trigger="hover", role="button" data-toggle="popover" data-trigger="focus" title="Заказы на доработке" data-content="Страница со всеми заказами которые были отправлены на доработку (Статус выполнения: На доработке)" data-placement="top"><i class="fa fa-question-circle"></i></a>
    <a href="<?php echo ci_site_url(); ?>Adminorders/revision_orders">Заказы на доработке</a>
  </li>
 <!--  <li>
    <a tabindex="0" data-trigger="hover", role="button" data-toggle="popover" data-trigger="focus" title="Неоплаченные заказы" data-content="Заказы которые пока не были оплачены заказчиками(клинетами) (Статус оплаты: Неоплачен)" data-placement="top"><i class="fa fa-question-circle"></i></a>
    <a href="<?php // echo ci_site_url(); ?>Adminorders/unpaid_orders">Неоплаченные Заказчиком</a>
  </li>  -->

 <!--    <li>
    <a tabindex="0" data-trigger="hover", role="button" data-toggle="popover" data-trigger="focus" title="Оплаченные заказы" data-content="Заказы по которым была  оплата была произведена полностью, заказ был оплачен ЗАКАЗЧИКОМ и был оплачен АВТОРУ" data-placement="top"><i class="fa fa-question-circle"></i></a>
    <a href="<?php // echo ci_site_url(); ?>Adminorders/paid_orders">Полностью оплаченные заказы</a>
  </li>  -->


   <li>
     <a tabindex="0" data-trigger="hover", role="button" data-toggle="popover" data-trigger="focus" title="Архив" data-content="Стариница с заказами которые были перемещены в Архив (Статус выполнения: Архив)" data-placement="top"><i class="fa fa-question-circle"></i></a>
    <a href="<?php echo ci_site_url(); ?>Adminorders/archived_orders">Архив</a>
  </li> 
</ul>
</div>
          
</div></div>
<script type="text/javascript">
  $(function () {
    $('[data-toggle="popover"]').popover()
  })
</script>