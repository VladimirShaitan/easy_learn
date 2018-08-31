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
                <span class="project-detail-status">
                    Active                </span>
            </div>
        </div>
    </div>
</div>
<div class="project-detail-box no-padding">
    <div class="project-detail-desc">
        <h4>Project Desciption</h4>

        <?php echo $instructions; ?>
        </div>
    <div class="project-detail-extend">

        <div class="project-detail-category">
              <h4>Materials (Files)</h4>
               <?php foreach ($order_files as $order_files): ?>
   <?php echo form_open('Filedownload/download/'.$order_files['tmp_name']);?>
<input type="hidden" name="path" value="<?php echo $this->config->item('uploads'); ?>/<?php echo $order_period;?>/<?php echo $orderid;?>/<?php echo $order_files['tmp_name']; ?>">
<input type='hidden' name='filename' value="<?php echo $order_files['tmp_name']; ?>">
<input type='hidden' name='orderid' value="<?php echo $orderid;?>">
<i class="fa fa-download "></i> <input type="submit" name="submit" value="<?php echo $order_files['file_name']; ?>" class="btn-file">
                  <?php echo form_close();?> 

    <?php endforeach; ?>  



    </div>
    

    </div>
</div>
<div id="project-detail-bidding" class="project-detail-box no-padding">


    <div class="freelancer-bidding">
    <div class="freelancer-bidding-not-found">
  <div class="row">
          <div class="col-md-12">
          <p>Answer</p>
        </div>
                </div>
</div>    </div>
    <div class="freelancer-bidding-head">

    </div>
    <div class="freelancer-bidding">
    <div class="freelancer-bidding-not-found">
  <div class="row">
          <div class="col-md-12">
          <p> <?php echo $file_embed; ?> </p>
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


