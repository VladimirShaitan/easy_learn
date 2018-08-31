<div class="col-sm-8">
<div class="main">
<h1 style="text-align: center;"> Search Answers </h1>
<hr/>
<div class="row">

            <form action="<?php echo site_url(); ?>essay/search_answers" method="post">
                  <div id="search-skill" class="col-sm-9">
                     <input type="text" name="search" id="search-skill" class="form-control" placeholder="Search for a skill">
                  </div>
                  <button type="submit" class="btn btn-success btn-skill">Search</button>
               </form>
</div>
<h3> Search Results  </h3>
<table class="table table-striped">
    <thead>
    </thead>
    <tbody>
    <?php foreach ($results as $orders): ?>
      <tr>
        <td><span class="glyphicon glyphicon-paperclip"></span></td>
        <td><a href="<?php echo site_url($orders['alias']); ?>"><?php echo $orders['topic']; ?></a></td>
      </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</div>
</div>
<div id="countdown"></div>
