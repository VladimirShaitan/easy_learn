<div class="fre-perfect-freelancer">

        <div class="fre-page-section section-archive-project">
            <div class="container-fluid">
                    <h2 id="title_freelance">Thousands of orders</h2>
                <div class="page-project-list-wrap">
                    <div class="fre-project-list-wrap">



                      <div class="fre-project-list-box">
                            <div class="fre-project-list-wrap">
                                <div class="fre-project-result-sort">
                                    <div class="row">
                                                            <div class="col-sm-4 col-sm-push-8">
                <form class="fre-form-search" action="<?php echo ci_site_url(); ?>essay/sprep" method="post">
                    <div class="fre-search dropdown">
                        <input class="fre-search-field" name="search" value="" type="text" placeholder="Find Answers">
                    </div>
                </form>
                                                              </div>
                                        <div class="col-sm-8 col-sm-pull-4">
                                            <div class="fre-project-result">
                                                <p>
                                                    <span class="plural "><span class="found_post">60</span> projects found</span>
                                                    <span class="singular hide"><span class="found_post">60</span> project found</span>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                <ul class="fre-project-list project-list-container">
                    <?php if (is_array ($results)): ?>
  <?php foreach ($results as $orders): ?>
<li class="project-item">
    <div class="project-list-wrap">
        <h2 class="project-list-title">

          <a title="<?php echo $orders['topic']; ?>" href="<?php echo site_url('answer/'.$orders['alias']); ?>"> <?php echo $orders['topic']; ?></a>


        </h2>
        <div class="project-list-info">
            <span><?php echo $orders['order_status']; ?></span>
            <span><?php echo $orders['referencing_style']; ?></span>
      <span><?php echo $orders['words']; ?> Words</span>            <span><?php echo 'Order '.'#'.$orders['orderid']; ?></span>
        </div>
        <div class="project-list-desc">
          <p>
          <?php 

$small = substr($orders['instructions'], 0, 300);
echo strip_tags($small);

?>
</p>
        </div>
       <!-- <div class="project-list-bookmark">
            <a class="fre-bookmark" href="">Bookmark</a>
        </div> -->
    </div>
</li>
<?php endforeach; ?>
 <?php endif; ?>
</ul>
<div class="profile-no-result" style="display: none;">
    <div class="profile-content-none">
        <p>There are no results that match your search!</p>
        <ul>
            <li>Try more general terms</li>
            <li>Try another search method</li>
            <li>Try to search by keyword</li>
        </ul>
    </div>
</div>
                        
                 </div>
                </div>
            </div>
        </div>
    </div>
