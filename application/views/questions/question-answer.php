    <div class="fre-perfect-freelancer">
        <div class="container">
        <div class="row">
          <div class="col-lg-9">
        <div class="project-detail-box">
    <div class="project-detail-info">
        <div class="row">
            <div class="col-lg-8 col-md-7">
                <h1 class="project-detail-title"><?php echo $topic;?></h1>
                <ul class="project-bid-info-list">
                    <li>
            <span>Writer</span><span><?php echo $preferred_writer;?></span>                    </li>
                    <li>
                        <span>Category</span>
                        <span><?php echo $subject;?></span>
                    </li>
                    <li>
                        <span>Amount</span>
                        <span>
                            <?php echo $amount;?>                        </span>
                    </li>
                                  <li>
                            <span>Words</span>
                            <span><?php echo $words; ?></span>
                        </li>
                          </ul>
            </div>
            <div class="col-lg-4 col-md-5">
                <p class="project-detail-posted">Posted on October 3, 2017</p>

                <div class="project-detail-action">
          <a href="<?php echo ci_site_url(); ?>user/login" class="fre-action-btn project-action" data-action="archive" data-project-id="1681">Get Answer</a>                </div>
            </div>
        </div>
    </div>
</div>
<div class="project-detail-box no-padding">
    <div class="project-detail-desc">
        <h4>Project Desciption</h4>

        <?php echo $instructions; ?>
        </div>
</div>
<div id="project-detail-bidding" class="project-detail-box no-padding">


    <div class="freelancer-bidding">
   </div>
    <div class="freelancer-bidding-head">
        <div class="row">
            <div class="col-md-10 col-sm-9 col-xs-12">
                <div class="row">
                    <div class="col-md-8 col-sm-12">
                        <div class="col-free-bidding">RELATED QUESTIONS</div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <div class="freelancer-bidding">
    <div class="freelancer-bidding-not-found">
  <div class="row">
          <div class="col-md-12">
          <?php foreach ($related_answers as $related_answers): ?>
<div class="col-md-3"><a href="<?php echo site_url('assignment/'.$related_answers['alias']); ?>"> <?php echo $related_answers['topic']; ?></a></div>
            <?php endforeach; ?> 
        </div>
                </div>
</div>    </div>


  </div>  
</div> <!-- end of col-lg-8 -->
<div class="col-lg-3">
    <div class="orders-profile loggedin">
<a class="btn btn-info fullwidth" data-action="archive" href="<?php echo ci_site_url(); ?>project/create" data-project-id="1681">ORDER NOW</a> 
</div>
</div>


        </div> <!-- end of row -->
        </div> <!-- end of container -->
    </div>


