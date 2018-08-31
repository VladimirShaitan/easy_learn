<div class="col-sm-8">
<div class="main">
<h1 style="text-align: center;"> Search Answers </h1>
<hr/>
<div class="row">

            <form action="<?php echo ci_site_url(); ?>essay/search_answers" method="post">
                  <div id="search-skill" class="col-sm-9">
                     <input type="text" name="search" id="search-skill" class="form-control" placeholder="Search for a skill">
                  </div>
                  <button type="submit" class="btn btn-success btn-skill">Search</button>
               </form>
</div>
<h3> Search Results  </h3>
<table class="table table-striped">
    <thead>
      <tr>
        <th>OrderID</th>
        <th>Topic</th>
        <th>Type</th>
        <th>Amount</th>
      </tr>
    </thead>
    <tbody>
    <?php foreach ($results as $orders): ?>
      <tr>
        <td><?php echo $orders['orderid']; ?></td>
        <td><a href="<?php echo ci_site_url($orders['alias']); ?>"><?php echo $orders['topic']; ?></a></td>
        <td><?php echo $orders['project_type']; ?></td>
        <td><?php echo '$'. $orders['amount']; ?></td>
      </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
    <p><div class="pagination"><?php echo $links; ?></div></p>
</div>
</div>
<div id="countdown"></div>
