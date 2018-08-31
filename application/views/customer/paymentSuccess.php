<!--  <pre>
<?php // print_r($arr); ?>
</pre> -->

 <div class="text-center">
<img src="https://legko-v-uchebe.com/wp-content/uploads/2017/11/logo.png" class="img-responsive" style="margin: 0 auto">

<?php foreach ($arr as $arr1) { ?>
	<h1>
		<?php if($arr1['sum_part'] === 'full' || $arr1['sum_part'] === 'rest') { ?>
			Поздравляем заказ #<?php echo $arr1['order_id']; ?> был полностью оплачен  
		<?php } elseif($arr1['sum_part'] === 'half') { ?>
			Половина суммы по заказу #<?php echo $arr1['order_id']; ?> была успешно оплачена 
		<?php } elseif ($arr1['sum_part'] === 'doplata') { ?>
			Вы успешно провели доплату по заказу #<?php echo $arr1['order_id']; ?>
		<?php } ?>	
	</h1>
<?php } ?>
	<div class="paySucHolder">
		<a href="<?php echo ci_site_url(); ?>/order/clientmyorders">К моим заказам</a>
		<a href="<?php echo ci_site_url(); ?>/order/view/<?php echo $arr1['order_id']; ?>">Назад к заказу #<?php echo $arr1['order_id']; ?></a>
	</div>
</div>