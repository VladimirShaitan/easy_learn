<div class="col-sm-9">
<h1 style="font-weight: bold"><span class="glyphicon glyphicon-pushpin"></span>  <?php echo $topic;?> </h1>

<div class="row normal-padding">
<div class="col-sm-2 right-line-border"><p>School<br/>Any</p></div>
<div class="col-sm-2 right-line-border"><p>TYPE<br/>Homework Help</p></div>
<div class="col-sm-2 right-line-border"><p>Uploaded by<br/>qqjus</p></div>
<div class="col-sm-1 right-line-border"><p>Words<br/><?php echo $word_count; ?></p></div>
<div class="col-sm-1"></div>
<div class="col-sm-4"><a class="btn-pink" href="<?php echo site_url(); ?>user/login"> View full document </a></p></div>
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


<div class="question-instructions">
<div class="row">
<div class="dmh-answer">
<div class="row qindicators">
<div class="col-sm-6"><h3 style="font-weight: bold"><span class="glyphicon glyphicon-paperclip"></span>  Answer</h3></div>
<div class="col-sm-6"><br/><h4 style="font-style: italic"> Unformated Extract from the Answer </h4>
</div>
</div>


<?php echo $extract; ?>

</div>
</div>
</div>


</div>
</div>
