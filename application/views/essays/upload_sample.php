
<div class="col-sm-8">
   <div class="main">
  <h3>New order</h3>
  <hr/>
      <?php echo validation_errors(); ?>
   
 <?php echo form_open_multipart('essay/upload_samples'); ?>
  <form id="my-awesome-dropzone" class="dropzone">  
        <?php foreach ($max_orderid as $max_orderid) { ?>
 <?php $orderid = $max_orderid['orderid']+1; //echo $orderid; ?>
               <?php } 
                  ?>

   <div class="form-group">
      <label class="control-label col-sm-2" for="email">Files to uplaod samples</label>
      <div class="col-sm-10">


  <div class="falback">
    <input type="file" name="multipleFiles[]" multiple />
  </div>

      </div><br/><br/>
    </div>




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