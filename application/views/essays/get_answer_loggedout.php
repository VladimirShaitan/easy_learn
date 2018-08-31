<div class="col-sm-9">
<h2 style="font-weight: bold"><span class="glyphicon glyphicon-pushpin"></span>  Get Instant Homework Help or study material </h2>
<hr/>
<div class="row normal-padding">
<div class="col-sm-2 right-line-border"><p>School<br/>Any</p></div>
<div class="col-sm-2 right-line-border"><p>TYPE<br/>Homework Help</p></div>
<div class="col-sm-2 right-line-border"><p>Original<br/>Essays</p></div>
<div class="col-sm-1 right-line-border"><p>Unique<br/>Essays</p></div>
<div class="col-sm-1"></div>
<div class="col-sm-4"><p><a class="btn-pink" href="<?php echo site_url(); ?>home/signup"> FREE SIGN UP </a></p></div>

</div>
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
<h3> Just Uploaded Essays  </h3>
<table class="table table-striped">
    <thead>
      <tr>

      </tr>
    </thead>
    <tbody>
    <?php foreach ($results as $orders): ?>
      <tr>
        <td><span class="glyphicon glyphicon-paperclip"></span> <a href="<?php echo site_url($orders['alias']); ?>"><?php echo $orders['topic']; ?></a></td>
      </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
    <p><div class="pagination"><?php echo $links; ?></div></p>
</div>
</div>
<div id="countdown"></div>
