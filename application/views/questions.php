
<?php $i=1; ?>
<?php foreach ($orders as $orders): ?>

<a href="<?php echo site_url('assignment/'.$orders['alias']); ?>"><?php echo $orders['orderid'].' '. $orders['topic']; ?></a><br/>
 <?php endforeach; ?>
  <?php echo $links; ?>
</urlset>