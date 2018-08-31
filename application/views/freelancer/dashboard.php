          <div class="col-md-8 border-right">
            <div class="orders-profile loggedin text-center">
<div class="row">
<h3><strong> <?=$this->session->userdata('firstname')?>  <?=$this->session->userdata('lastname')?>, Добро пожаловать в Ваш аккаунт </strong> </h3><br>
<?php
 if ($this->session->userdata('writer_status') == 'Active') { ?>
<div class="col-sm-4 accountover"><a href="<?php echo ci_site_url(); ?>user/myprofile"><h1 style="font-size:50px"><i class="fa fa-user"></i></h1>Просмотреть свой профиль</a></div>
<div class="col-sm-4 accountover"><a href="<?php echo ci_site_url(); ?>order/writer_assigned"><h1 style="font-size:50px"><i class="fa fa-address-book"></i></h1>Заказы на выполнении</a></div>
<div class="col-sm-4 accountover"><a href="<?php echo ci_site_url(); ?>order/openorders"><h1 style="font-size:50px"><i class="fa fa-folder-open"></i></h1>Все заказы</a></div>

<div class="col-sm-4 accountover"><a href="<?php echo ci_site_url(); ?>order/writer_grafik"><h1 style="font-size:50px"><i class="fa fa-calendar"></i></h1>График</a></div>
<!-- <div class="col-sm-4 accountover"><a href="<?php // echo ci_site_url(); ?>financial/myaccounts"><h1 style="font-size:50px"><i class=" fa fa-bank"></i></h1>Условия работы</a></div> -->
<?php  } ?>
<?php
 if ($this->session->userdata('writer_level') == 'admin') { ?>
<div class="col-sm-4 accountover"><a href="<?php echo ci_site_url(); ?>opmaster/dashboard"><h1 style="font-size:50px"><i class=" fa fa-sign-in"></i></h1>Перейти в кабинет менеджера</a></div>
<?php  } ?>
</div>


</div>
          </div>


 



        </div>
</div>
</div>
</div>