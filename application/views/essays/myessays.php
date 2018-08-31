<div class="col-sm-8">
<div class="main">
<h3> Open Projects </h3>
<table class="table table-striped">
    <thead>
      <tr>
        <th>ID заказа</th>
        <th>Тема</th>
        <th>Words</th>
        <th>Выполнить до</th>
        <th>Amount</th>
        <th>View</th>
      </tr>
    </thead>
    <tbody>
    <?php foreach ($orders as $orders): ?>
      <tr>
        <td><?php echo $orders['orderid']; ?></td>
        <td><?php echo $orders['topic']; ?></td>
        <td><?php echo $orders['words']; ?></td>
        <td><?php echo $orders['deadline']; ?></td>
        <td><?php echo '$'. $orders['amount']; ?></td>
        <td><a href="<?php echo site_url($orders['alias']); ?>">View</a></td>
      </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</div>
</div>
<div id="countdown"></div>
