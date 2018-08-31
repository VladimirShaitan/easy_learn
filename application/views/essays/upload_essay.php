
<div class="col-sm-8">
   <div class="main">
  <h3>New order</h3>
  <hr/>

  <?php
$instructions = "the test <br/>thehe <p> yes opar </p>";
               $nstructions = strip_tags ($instructions, '<p><h1><h2><h3><ul><ol><li><h4><h5><h6><em><strong><table><tr><tbody><td><i>');
               echo $nstructions;

  ?>
      <?php echo validation_errors(); ?>
   
 <?php echo form_open_multipart('essay/upload_file'); ?>
  <form class="form-horizontal">
    <div class="form-group">
      <label class="control-label col-sm-2" for="email">Topic/Title</label>
      <div class="col-sm-10">
        <input type="text" name="topic" class="form-control" id="email" placeholder="Enter topic">
      </div><br/><br/>
    </div>

 

<div class="row">
<div class="col-sm-8">
    <div class="form-group">
      <label class="control-label col-sm-3" for="pwd">Category/Subject</label>
      <div class="col-sm-9">          
            <select name='subject' id='subject' class="form-control"  >
            <option value="1"> Select Subject </option>
               <?php foreach ($subject as $subject) { ?>
               <option value="<?php echo $subject['subject']; ?>">
                  <?php echo $subject['subject']; ?>
               </option>
               <?php } 
                  ?>

            </select>

      </div><br/><br/>
    </div>
    


    <div class="form-group">
      <label class="control-label col-sm-3" for="pwd">Number of Words/Pages</label>
      <div class="col-sm-9">          
<select id="words" name='words'  class="form-control"  >
<option value="1"> Select Pages </option>
<?php foreach ($configs as $configs) { ?>
 <?php $wordsperpage = $configs['wordsperpage']; ?>
<?php } ?>
<?php for ($x = 1; $x <= 100; $x++) {  ?>
<option value="<?php echo $x; ?>"> <?php echo $x; ?> Pages || Aprox <?php $words=$x*$wordsperpage; echo $words; ?> Words </option>
<?php } ?> 
 </select>
      </div><br/><br/>
    </div>


    <div class="form-group">
      <label class="control-label col-sm-3" for="pwd">Number of Sources</label>
      <div class="col-sm-9">          
<select id='sources' name='sources'  class="form-control"  >
<option value="1"> Select number of Sources </option>
<?php for ($x = 1; $x <= 100; $x++) {  ?>
<option value="<?php $x; ?>"> <?php echo $x; ?>  </option>
<?php } ?> 
 </select>
      </div><br/><br/>
    </div>
</div>
<div class="col-sm-4"> 
    <div class="form-group">
    <div class="amount">
      <label class="control-label col-sm-12" for="email">Cost</label>
      <div class="col-sm-12">
        <input type="input" id="amount" class="form-control" name="amount" value="5" placeholder="10"/>
      </div><br/><br/>
    </div>
    </div>

</div>
</div>

    <div class="form-group">
      <label class="control-label col-sm-2" for="pwd">Format style</label>
      <div class="col-sm-10">          
            <select name='referencing_style' class="form-control"  >
            <option value="1"> Select Referecing Style </option>
               <?php foreach ($referencing_style as $referencing_style) { ?>
               <option value="<?php echo $referencing_style['style']; ?>">
                  <?php echo $referencing_style['style']; ?> 
               </option>
               <?php } 
                  ?>
            </select>
      </div><br/><br/>
    </div>

    <div class="form-group">
      <label class="control-label col-sm-2" for="email">Essay Details</label>
      <div class="col-sm-10">
        <textarea class="form-control"  name="instructions"></textarea>
      </div><br/><br/>
    </div><br/><br/>


    
        <?php foreach ($max_orderid as $max_orderid) { ?>
 <?php $orderid = $max_orderid['orderid']+1; //echo $orderid; ?>
               <?php } 
                  ?>
        <input type="hidden" class="input_text" name="orderid" value = "<?php echo $orderid; ?>" readonly/>
        <input type="hidden" class="input_text" name="project_type" value = "essay" readonly/>
        <input type="hidden" id="customer_email" class="form-control" name="customer_email" value="<?php echo $this->session->userdata('email')?>" placeholder="10">
        <input type="hidden" id="customer" class="form-control" name="customer" value="<?php echo $this->session->userdata('writer_id')?>" placeholder="10">
         <input type="hidden" id="customer_name" class="input_text" name="customer_name" value="<?php echo $this->session->userdata('firstname')?> <?php echo $this->session->userdata('lastname')?>"  readonly>


    <div class="form-group">
      <label class="control-label col-sm-2" for="email">Files</label>
      <div class="col-sm-10">
                        <button id="ADDFILE" class="btn btn-danger fullwidth"> Add/upload file</button>
                        <div id="uploadFileContainer"></div>

      </div><br/><br/>
    </div><br/><br/>


    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
        <input type="submit"  class="btn btn-info fullwidth" name="submit" value="Make Order" />
      </div>
    </div><br/><br/>
  </form>



                        


                        <?php echo form_close(); ?>

</div>
</div>


<!-- total pricing

(Type of service+accademic level+subject)(pages)

-->

<script type="text/javascript">
   jQuery(document).ready(function($){
   
        $(document).on('click', 'button#ADDFILE', function(event) {
           event.preventDefault();
           $("div#submit").css("display", "block")
           addFileInput();
        });
   
        function addFileInput() {
           var html ='';
           html +='<div class="alert alert-info">';
           html +='<button type="button" class="close" data-dismiss="alert" aria-hidden="true"> &times;</button>';
           html +='<strong> Upload file </strong>';
           html +='<input type="file" name="multipleFiles[]">';
           html +='<input type="hidden" name="upload_type" value="essay">';
           html +='</div>';
   
           $("div#uploadFileContainer").append(html);
        }
   
   });
   
</script>