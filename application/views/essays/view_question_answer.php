xx<div class="col-sm-9">
<h1 style="font-weight: bold"><span class="glyphicon glyphicon-pushpin"></span>  <?php echo $topic;?> </h1>

<div class="row normal-padding">
<div class="col-sm-2 right-line-border"><p>School<br/>Any</p></div>
<div class="col-sm-2 right-line-border"><p>TYPE<br/>Homework Help</p></div>
<div class="col-sm-2 right-line-border"><p>Uploaded by<br/>qqjus</p></div>
<div class="col-sm-1 right-line-border"><p>Words<br/><?php echo $word_count; ?></p></div>
<div class="col-sm-1"></div>
<div class="col-sm-4"><p><a class="btn-pink" href="<?php echo $urlfile;?>"> Download Answer </a></p></div>

</div>


<div class="answer-question">
<div class="question-instructions">

<div class="row">
<p><font style="font-size:40px;">Q</font><font style="font-size:22px;"">uestion</font></p>
</div>

<div class="row">
<div class="col-sm-12">
<?php if(!empty($instructions)){ ?>
<?php echo $instructions;?>
<?php } ?>

<p> Project Materials (files) </p>
<hr/>
<!--
<?php foreach ($order_files as $order_files): ?>
<a class="" href="<?php echo base_url()?>uploads/sell/<?php echo $order_files['tmp_name']; ?>"><?php echo $order_files['file_name']; ?></a>
<br/>
 <?php endforeach; ?>  

 -->
</div>
</div>
<br/>
</div>
<div class="restricted"> <?php echo $file_embed; ?></div>
<br/>
</div>
</div>
