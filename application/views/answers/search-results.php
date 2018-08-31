   <!--work-shop-->
    <section id="work-shop" class="section-padding">
      <div class="container">
        <div class="row">
          <div class="header-section text-center">
            <hr class="bottom-line">
          </div>
          <div class="col-md-12 col-sm-12">
            <div class="service-box ">
              <div class="icon-box">

<div class="row">
<div class="col-sm-6">
  
  <h4> Answers </h4>

</div>
<div class="col-sm-6">

             <div class="cta-2-form text-center">
              <form action="<?php echo ci_site_url(); ?>essay/sprep" method="post" id="workshop-newsletter-form">
                    <input name="search" placeholder="Search essays" type="text" value="<?php echo $urlparam; ?>">
                    <input class="cta-2-form-submit-btn" value="Subscribe" type="submit">
                </form>
             </div>   


</div>



</div>
              </div>
              <div class="icon-text">

    <?php foreach ($results as $orders): ?>

<div class="latest-order">
<div class="row">
<div class="col-md-9"><a class="h4" href="<?php echo ci_site_url('question/'.$orders['alias']); ?>"><?php echo $orders['topic']; ?></a></div>
<div class="col-md-3 text-right"><?php echo $orders['subject']; ?></div>
</div>
<hr/>
<div class="row">
<div class="col-md-9">Word: <?php echo $orders['words']; ?> Style: <?php echo $orders['referencing_style']; ?></div>
<div class="col-md-3 text-right">#<?php echo $orders['orderid']; ?></div>
</div>
</div>

 

      <?php endforeach; ?>




              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!--/ work-shop-->