<div class="fre-perfect-freelancer">

        <div class="fre-page-section section-archive-project">
            <div class="container-fluid">

<!--work-shop-->
    <section id="" class="">
        <div class="row">
<div class="row">
<div class="col-sm-12">

                    <div class="fre-profile-box">
                        <div class="profile-freelance-info-wrap">
                            <div class="profile-freelance-info">
                                <div class="freelance-info-avatar">
                  <span class="freelance-avatar">
                                 <?php if($profile_img): ?>
 <img src="<?=base_url()?><?php echo $this->config->item('uploads'); ?>/profiles/<?php echo $news_item['writer_id']; ?>/<?php echo $news_item['profile_img']; ?>" class='avatar avatar-70 photo avatar-default' height='70' width='70' />
<?php endif; ?>
<?php if(!$profile_img): ?>
<img src="<?=base_url()?>opasset/img/profile.png" class='avatar avatar-70 photo avatar-default' height='70' width='70' />
<?php endif; ?>               
                  </span>
                            <span class="freelance-name"><?php echo $firstname.' '.$lastname;?>                                                                  <span>Proficient Writer</span>
                                                          </span>
                                </div>
                                <div class="freelance-info-content">
                                    <div class="freelance-rating">
                                        <span class="rate-it"
                                       <?php foreach ($order_rating as $order_ratings): ?>      
<?php $wrating = round($writerpay, 2);  ?>
    <?php if($wrating >= 0.00 && $wrating <= 1.99 ){ ?>
<i class="fa fa-star"></i>
<i class="fa fa-star-o"></i>
<i class="fa fa-star-o"></i>
<i class="fa fa-star-o"></i>
<i class="fa fa-star-o"></i>
<?php } ?>
<?php if($wrating >= 1.99 && $wrating <= 2.99){ ?>
<i class="fa fa-star"></i>
<i class="fa fa-star"></i>
<i class="fa fa-star-o"></i>
<i class="fa fa-star-o"></i>
<i class="fa fa-star-o"></i>
<?php } ?>
<?php if($wrating >= 2.99 && $wrating <= 3.99){ ?>
<i class="fa fa-star"></i>
<i class="fa fa-star"></i>
<i class="fa fa-star"></i>
<i class="fa fa-star-o"></i>
<i class="fa fa-star-o"></i>
<?php } ?>
<?php if($wrating >= 3.99 && $wrating <= 4.99){ ?>
<i class="fa fa-star"></i>
<i class="fa fa-star"></i>
<i class="fa fa-star"></i>
<i class="fa fa-star"></i>
<i class="fa fa-star-o"></i>
<?php } ?>

<?php if($wrating >= 4.99 ){ ?>
<i class="fa fa-star"></i>
<i class="fa fa-star"></i>
<i class="fa fa-star"></i>
<i class="fa fa-star"></i>
<i class="fa fa-star"></i>
<?php } ?>
(<?php echo $wrating; ?>/5)

                                             </span>

                   <span><?php echo '$'.$order_ratings['amount']; ?> earned</span>
                                            <span>3 projects worked </span>
                    
                    <span><?php echo  $city.', '.$country;?></span>                                    </div>
<?php endforeach; ?>
                  
                                        <div class="freelance-skill">

<?php
              $myString = $subject;
$myArray = explode(',', $myString);
foreach($myArray as $my_Array){
    echo '<span class="fre-label"><a href="">'.$my_Array.'</a></span>';  
}; ?>
                                        </div>
                  
                                                          <div class="freelance-about">
                      <p><?php echo $text;?></p>
                                        </div>
                  
                                                                  </div>

                                                        <div class="freelance-info-edit">
<?php if (!$this->session->userdata('writer_id')): ?>
      <form method="post" action="<?php echo ci_site_url(); ?>project">
         <div class="form-group">
            <input type="hidden" name="writer_id" value="<?php echo $news_item['writer_id']; ?>">
         </div> 
         <button class="fre-normal-btn invite-open" type="submit">HIRE THIS WRITER</button> 
      </form>
   <?php endif; ?>
<?php if ($this->session->userdata('writer_id')): ?>
      <form method="post" action="<?php echo ci_site_url(); ?>order/create">
         <div class="form-group">
            <input type="hidden" name="writer_id" value="<?php echo $news_item['writer_id']; ?>">
         </div> 
         <button class="fre-normal-btn invite-open" type="submit">HIRE THIS WRITER</button> 
      </form>
   <?php endif; ?>


                                        </div>
                  
                            </div>
                        </div>
                    </div>



<div class="fre-profile-box">
    <div class="freelancer-project-history">
        <div class="profile-freelance-work">
            <div class="row">
                <div class="col-sm-6 col-xs-12">
                    <h2 class="freelance-work-title">Work History (2)</h2>
                </div>
            </div>
            <ul class="list-work-history-profile author-project-list">

<?php foreach ($order_rating as $order_rating): ?>
        <li>
    <div class="fre-author-project">
        <h2 class="author-project-title"><a href="#" title="<?php echo $order_rating['topic']; ?>"><?php echo $order_rating['topic']; ?></a></h2>
        <div class="author-project-info">
            <span class="rate-it" data-score="5" color="orange">
              
<?php $rating = $order_rating['rating']; ?>
<?php if(isset($rating)) { ?>
<?php $wrating = round($writerpay, 2);  ?>
    <?php if($wrating >= 0.00 && $wrating <= 1.99 ){ ?>
<i class="fa fa-star"></i>
<i class="fa fa-star-o"></i>
<i class="fa fa-star-o"></i>
<i class="fa fa-star-o"></i>
<i class="fa fa-star-o"></i>
<?php } ?>
<?php if($wrating >= 1.99 && $wrating <= 2.99){ ?>
<i class="fa fa-star"></i>
<i class="fa fa-star"></i>
<i class="fa fa-star-o"></i>
<i class="fa fa-star-o"></i>
<i class="fa fa-star-o"></i>
<?php } ?>
<?php if($wrating >= 2.99 && $wrating <= 3.99){ ?>
<i class="fa fa-star"></i>
<i class="fa fa-star"></i>
<i class="fa fa-star"></i>
<i class="fa fa-star-o"></i>
<i class="fa fa-star-o"></i>
<?php } ?>
<?php if($wrating >= 3.99 && $wrating <= 4.99){ ?>
<i class="fa fa-star"></i>
<i class="fa fa-star"></i>
<i class="fa fa-star"></i>
<i class="fa fa-star"></i>
<i class="fa fa-star-o"></i>
<?php } ?>

<?php if($wrating >= 4.99 ){ ?>
<i class="fa fa-star"></i>
<i class="fa fa-star"></i>
<i class="fa fa-star"></i>
<i class="fa fa-star"></i>
<i class="fa fa-star"></i>
<?php } ?>
(<?php echo $wrating; ?>/5)
<?php } ?>

            </span>
            <span class="budget">$<?php echo $order_rating['amount']; ?></span>
            <span class="posted"><?php echo $order_rating['subject']; ?></span>
        </div>
        <div class="author-project-comment">
                          <p><?php echo $order_rating['comment']; ?>
                            <?php if(!isset($rating)) { ?>
<p style="text-align: center"> This Writer is not rated yet </p>
<?php } ?>
                          </p>
                  </div>
    </div>
</li>
<?php endforeach; ?>
            </ul>

              </div>
    </div>
</div>
</div>


</div>

  
        </div>

    </section>
    <!--/ work-shop-->
  </div>
</div>
</div>