<div class="fre-perfect-freelancer">
  <div class="container">
    <h2 id="title_freelance">Find perfect freelancers for your projects</h2>
           
                                    
                                        <form>
                                            <div class="row">
                                                <div class="col-md-8 col-sm-6 col-xs-12">
                                                    <div class="fre-input-field">
                                                        <label class="fre-field-title">Keyword</label>
                                                        <input type="text" class="search" name="s"
                                                               placeholder="Search writer by id">
                                                    </div>
                                                </div>
                                                <div class="col-md-4 col-sm-6 col-xs-12">
                                                    <div class="fre-input-field">
                                                        <label class="fre-field-title">Status</label>

<select class="fre-chosen-single" name="project_current_status" name="forma" onchange="location = this.value;">
  <?php foreach ($subjects as $subjects): ?>
 <option value="<?php echo ci_site_url(); ?>skills/cat/<?php echo $subjects['subject']; ?>"><?php echo $subjects['subject']; ?></option>
<?php endforeach; ?>
</select>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                   
                                 

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

 
  </div>    <div class="fre-perfect-freelancer-more">
     <br/><?php echo $links; ?>
    </div>
  </div>
</div>
<!-- List Profiles -->


