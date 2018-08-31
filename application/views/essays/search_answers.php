<div class="row">
<div class="col-lg-12">
<div class="main">

<div class="row">
<div class="col-sm-2"></div>
<div class="col-sm-8">
<h1 class="text-center">  Best Editors Showcase</h1>
<hr/>
<p class="text-center">Let the work speak for itself, toprated editors </p>
<br/>

<div class="row">
<div class="col-sm-4">


               <ul class="nav navbar-nav skillssearch">
                  <li class="ctive"><a href="<?php echo site_url(); ?>/skills">All <span class="sr-only"></span></a></li>
                  <li class="dropdown">
                     <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Filter by category<span class="caret"></span></a>
                     <ul class="dropdown-menu">
                      <?php foreach ($category as $subject) { ?>
                        <li ><a href="<?php echo site_url(); ?>/skills/cat/<?php echo $subject['subject']; ?>"><?php echo $subject['subject']; ?></a></li>

                        <?php } ?>
                     </ul>
                  </li>

               </ul>

</div>
<div class="col-sm-8">
            <form action="<?php echo site_url(); ?>essay/search_answers" method="post">
                  <div id="search-skill" class="col-sm-9">
                     <input type="text" name="search" id="search-skill" class="form-control" placeholder="Search for a skill">
                  </div>
                  <button type="submit" class="btn btn-success btn-skill">Search</button>
               </form>

</div>


</div>
</div>

</div>



<div class="row">
<div class="col-lg-3">

</div>
<div class="col-lg-9"><div class="skillssearch">



</div></div>
</div>
<hr/>

<div class="row">


</div>
</div>
</div>
</div>

