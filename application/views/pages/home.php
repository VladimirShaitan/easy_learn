<!-- Block Banner -->
<div class="fre-background" id="background_banner">
  <div class="fre-bg-content">
    <div class="container">
      <h1 id="title_banner ">Jumpstart Your Paper</h1>
      <p> Discover great essay examples and research papers for your assignments </p>

                <br/>
            <div class="row elementpad">
      <div class="col-lg-2 "></div>
      <div class="col-lg-8">
                <form class="fre-form-search page-search" action="<?php echo ci_site_url(); ?>essay/sprep" method="post">
                    <div class="fre-search dropdown">
             <input class="fre-search-field page-search" name="search" value="" type="text" placeholder="Find essay eg Apple company analysis...">
                    </div>
                </form>
       </div>
          <div class="col-lg-2 "></div>
        </div>
 <div class="row"></div>
      <div class="row elementpad">
      <div class="col-lg-4"><i class="fa fa-check-square-o"></i> Explore thousands of research papers</div>
      <div class="col-lg-4"> <i class="fa fa-check-square-o"></i> Ignite your creativity with essay samples</div>
      <div class="col-lg-4"><i class="fa fa-check-square-o"></i> Finish your assignment fast</div>
    </div>
       <a class="fre-btn" href="<?php echo ci_site_url(); ?>skills/topwriters">Hire Freelancer</a>
          <a class="fre-btn" href="<?php echo ci_site_url(); ?>home/signup">Apply as Freelancer</a>
          

          </div>

  </div>
</div>
<!-- Block Banner -->
<!-- Block How Work -->
<div class="fre-how-work">
  <div class="container">
    <h2 id="title_work">How CourseModel works?</h2>
    <div class="row">
      <div class="col-lg-3 col-sm-6">
        <div class="fre-work-block">
          <span>
           <i class="fa fa-pencil-square-o fa-3x"></i>
          </span>
          <p id="desc_work_1">Search by title the essay you are looking for</p>
        </div>
      </div>
      <div class="col-lg-3 col-sm-6">
        <div class="fre-work-block">
          <span>
          <i class="fa fa-user-circle fa-3x"></i>
          </span>
          <p id="desc_work_2">Browse thousands of custom written essay samples, Q/As and study materials</p>
        </div>
      </div>
      <div class="col-lg-3 col-sm-6">
        <div class="fre-work-block">
          <span>
           <i class="fa fa-check-square-o fa-3x"></i>
          </span>
          <p id="desc_work_3">Choose the one that is more relevant and access</p>
        </div>
      </div>
      <div class="col-lg-3 col-sm-6">
        <div class="fre-work-block">
          <span>
            <i class="fa fa-google-wallet fa-3x"></i>
          </span>
          <p id="desc_work_4">Access the essay</p>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Block How Work -->
<!-- List Profiles -->
<div class="fre-perfect-freelancer">
  <div class="container">
    <h2 id="title_freelance">Find perfect educators for your projects</h2>
    <div class="row">
<?php foreach ($topwriters as $news_item): ?>

          <div class="col-lg-6 col-md-12">
          <div class="fre-freelancer-wrap">
            <a class="free-avatar" href="#">

              <?php if($news_item['profile_img']): ?>
 <img src="<?=base_url()?><?php echo $this->config->item('uploads'); ?>/profiles/<?php echo $news_item['writer_id']; ?>/<?php echo $news_item['profile_img']; ?>" class='avatar avatar-70 photo avatar-default' height='70' width='70' />
<?php endif; ?>
<?php if(!$news_item['profile_img']): ?>
<img src="<?=base_url()?>opasset/img/profile.png" class='avatar avatar-70 photo avatar-default' height='70' width='70' />
<?php endif; ?>



                 </a>
            <h2><a href="<?php echo ci_site_url('writers/view/'.$news_item['writer_id']); ?>"><?php echo $news_item['firstname']; ?> <?php echo $news_item['lastname']; ?></a></h2>
            <p>Freelance Writer</p>
            <div class="free-rating rate-it" data-score="4.833333333333333">
              <font color="#fec600">
<?php $writerratings = $this->students_model->average_ratings($news_item['writer_id']); ?>
<?php $wrating = round($writerratings, 2);  ?>
<h5>
    <?php if($wrating >= 0.00 && $wrating <= 1.99 ){ ?>
<span class="fa fa-star"></span>
<span class="fa fa-star-o"></span>
<span class="fa fa-star-o"></span>
<span class="fa fa-star-o"></span>
<span class="fa fa-star-o"></span>
<?php } ?>
<?php if($wrating >= 1.99 && $wrating <= 2.99){ ?>
<span class="fa fa-star"></span>
<span class="fa fa-star"></span>
<span class="fa fa-star-o"></span>
<span class="fa fa-star-o"></span>
<span class="fa fa-star-o"></span>
<?php } ?>
<?php if($wrating >= 2.99 && $wrating <= 3.99){ ?>
<span class="fa fa-star"></span>
<span class="fa fa-star"></span>
<span class="fa fa-star"></span>
<span class="fa fa-star-o"></span>
<span class="fa fa-star-o"></span>
<?php } ?>
<?php if($wrating >= 3.99 && $wrating <= 4.99){ ?>
<span class="fa fa-star"></span>
<span class="fa fa-star"></span>
<span class="fa fa-star"></span>
<span class="fa fa-star"></span>
<span class="fa fa-star-o"></span>
<?php } ?>

<?php if($wrating >= 4.99 ){ ?>
<span class="fa fa-star"></span>
<span class="fa fa-star"></span>
<span class="fa fa-star"></span>
<span class="fa fa-star"></span>
<span class="fa fa-star"></span>
<?php } ?></font>

            </div>
            <div class="free-hourly-rate">

  <?php if (!$this->session->userdata('writer_id')): ?>
      <form method="post" action="<?php echo ci_site_url(); ?>project">
            <input type="hidden" name="writer_id" value="<?php echo $news_item['writer_id']; ?>">
         <button class="btn btn-success" type="submit">Hire Writer</button> 
      </form>
   <?php endif; ?>
<?php if ($this->session->userdata('writer_id')): ?>
      <form method="post" action="<?php echo ci_site_url(); ?>order/create">
            <input type="hidden" name="writer_id" value="<?php echo $news_item['writer_id']; ?>">
         <button class="btn btn-success" type="submit">Hire Writer</button> 
      </form>
   <?php endif; ?>


           </div>
            <div class="free-experience">
              <span>6 years experience</span>
              <span><?php echo count($this->User_model->completed_orders($news_item['writer_id'])); ?> projects worked</span>
            </div>
            <div class="free-skill">
              <?php
              $myString = $news_item['subject'];
$myArray = explode(',', $myString);
foreach($myArray as $my_Array){
    echo '<span class="fre-label"><a href="">'.$my_Array.'</a></span>';  
}; ?>
            

          </div>
          </div>
        </div>
<?php endforeach; ?>

 
  </div>  

  <div class="fre-perfect-freelancer-more">
      <a class="fre-btn-o" href="<?php echo ci_site_url(); ?>skills/topwriters">See all freelancers</a>
    </div>
  </div>
</div>
<!-- List Profiles -->
<!-- List Projects -->
<div class="fre-jobs-online">
  <div class="container">
    <h2 id="title_project">Browse numerous freelance jobs online</h2>
    <ul class="fre-jobs-list">
      <?php foreach ($lastten as $lastten): ?>
        <li>
        <div class="jobs-title">
          <p><?php echo $lastten['topic']; ?></p>
        </div>
        <div class="jobs-date">
          <p><?php echo $lastten['order_status']; ?></p>
        </div>
        <div class="jobs-price">
          <p><?php echo $lastten['writerpay']; ?></p>
        </div>
        <div class="jobs-view">
          <a href="<?php echo site_url('answer/'.$lastten['alias']); ?>">View details</a>
        </div>
      </li>
<?php endforeach; ?>

  </ul>
<div class="fre-jobs-online-more">
  <a class="fre-btn-o" href="<?php echo ci_site_url(); ?>work/questions">See all jobs</a>
</div>  </div>
</div>
<!-- List Projects -->

<!-- List Get Started -->
<div class="fre-get-started">
  <div class="container">
    <div class="get-started-content">
              <h2 id="title_start">Need work done? Join Coursemodel community!</h2>
                <a class="fre-btn" href="<?php echo ci_site_url(); ?>home/signup">Get Started</a>
                    
    </div>
  </div>
</div>
<!-- List Get Started -->
