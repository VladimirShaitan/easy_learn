    <section  class="">
          <div class="header-section text-center">
            <hr class="bottom-line">
          </div>
         <div class="col-md-8 border-right">
  
<div class="main">
  <h3>Post a Question</h3>
  <hr/>
      <?php echo validation_errors(); ?>
   <?php echo form_open_multipart('project/index'); ?>
  <form class="form-horizontal">
  <ul class="errorMessages"></ul>
    <div class="form-group">
      <label class="control-label col-sm-3 text-right" for="topic">Title</label>
      <div class="col-sm-9">
        <input type="text" name="topic" class="form-control" id="topic" placeholder="Enter topic" required>
      </div><br/>
    </div>



    <div class="form-group">
      <label class="control-label col-sm-3 text-right" for="subject">Category</label>
      <div class="col-sm-9">          
            <select name='subject' id='subject' class="form-control"  required>
            <option value=""> Select Subject </option>
               <?php foreach ($subject as $subject) { ?>
               <option value="<?php echo $subject['subject']; ?>">
                  <?php echo $subject['subject']; ?>
               </option>
               <?php } 
                  ?>

            </select>

      </div><br/>
    </div>
    
    <div class="form-group">
      <label class="control-label col-sm-3 text-right" for="academiclevel">Academic level</label>
      <div class="col-sm-9">          
            <select id='academiclevel' name='academic_level' class="form-control"  required>
            <option value=""> Select Academic Level </option>
               <?php foreach ($academic_level as $academic_level) { ?>
               <option value="<?php echo $academic_level['pvalue']; ?>">
                  <?php echo $academic_level['academic_level']; ?> 
               </option>
               <?php } 
                  ?>
            </select>
      </div><br/>
    </div>

    <div class="form-group">
      <label class="control-label col-sm-3 text-right" for="words">Words/Pages</label>
      <div class="col-sm-9">          
<select id="words" name='words'  class="form-control" required >
<option value=""> Select Pages </option>
<?php foreach ($configs as $configs) { ?>
 <?php $wordsperpage = $configs['wordsperpage']; ?>
<?php } ?>
<?php for ($x = 1; $x <= 100; $x++) {  ?>
<option value="<?php echo $x; ?>"> <?php echo $x; ?> Pages || Aprox <?php $words=$x*$wordsperpage; echo $words; ?> Words </option>
<?php } ?> 
 </select>
      </div><br/>
    </div>

        <div class="form-group">
      <label class="control-label col-sm-3 text-right" for="urgency">Urgency</label>
      <div class="col-sm-9">          
            <select  id='urgency' name='urgency' class="form-control" required >
            <option value=""> Select Urgency </option>
              <?php foreach ($urgency as $urgency) { ?>
               <option value="<?php echo $urgency['pvalue']; ?>">
                  <?php echo $urgency['urgency']; ?> <?php echo $urgency['duration']; ?> 
               </option>
               <?php } 
                  ?>
            </select>
      </div><br/>
    </div>



    <div class="form-group">
    <div class="amount">
      <label class="control-label col-sm-4 text-right" for="email">Amount(USD)</label>
            <div class="col-sm-2">
            <select  id='currency' name='currency' class="form-control " >
               <?php foreach ($currency as $currency) { ?>
               <option value="<?php echo $currency['currencyxchange']; ?>">
                  <?php echo $currency['countryCode']; ?> 
               </option>
               <?php } 
                  ?>
            </select>

      </div>
      <div class="col-sm-4">
        <input type="input" id="amount" class="form-control" name="amount" value="" placeholder="Enter Amount">
      </div><br/>
    </div>
    </div>


    <div class="form-group">
      <label class="control-label col-sm-3 text-right" for="pwd">Number of Sources</label>
      <div class="col-sm-9">          
<select id='sources' name='sources'  class="form-control"  >
<option value="1"> Select number of Sources </option>
<?php for ($x = 1; $x <= 100; $x++) {  ?>
<option value="<?php echo $x; ?>"> <?php echo $x; ?>  </option>
<?php } ?> 
 </select>
      </div><br/>
    </div>


    <div class="form-group">
      <label class="control-label col-sm-3 text-right" for="pwd">Format style</label>
      <div class="col-sm-9">          
            <select name='referencing_style' class="form-control"  >
            <option value="1"> Select Referecing Style </option>
               <?php foreach ($referencing_style as $referencing_style) { ?>
               <option value="<?php echo $referencing_style['style']; ?>">
                  <?php echo $referencing_style['style']; ?> 
               </option>
               <?php } 
                  ?>
            </select>
      </div><br/>
    </div>

    <div class="form-group">
      <label class="control-label col-sm-3 text-right" for="instructions">Instructions</label>
      <div class="col-sm-9">
        <textarea class="ckeditor form-control" id='editor' name="instructions"></textarea>
      </div><br/>
    </div>
    
    <div class="form-group">
      <label class="control-label col-sm-3 text-right" for="email">Additional materials</label>
      <div class="col-sm-9">
      <button id="ADDFILE" class="btn btn-danger fullwidth"> Add/uplaod file</button>
       <div id="uploadFileContainer"></div><br/>
      </div><br/><br/>
    </div><br/><br/>
        

    <div class="form-group">
      <label class="control-label col-sm-3 text-right" for="email">Preferred Writer</label>
      <div class="col-sm-9">
        <input type="input" class="form-control" name="preferred_writer" value = "<?php echo $preferred_writer; ?>" readonly/>
      </div><br/>
    </div>  
    <input type="hidden" class="input_text" name="order_status" value = "<?php echo $order_status; ?>" readonly/>


<hr/>
<h3>Sign up</h3>
<hr/>
    <div class="form-group">
      <label class="control-label col-sm-3 text-right" for="youemail">Your Email</label>
      <div class="col-sm-9">
        <input type="email" name="email" id="youemail" class="form-control" value="" placeholder="Enter Your Email" required>
      </div><br/>
    </div>

    <div class="form-group">
      <label class="control-label col-sm-3 text-right" for="fname">First Name</label>
      <div class="col-sm-9">
        <input type="text" name="firstname" id="fname" class="form-control" placeholder="Enter First Name" required>
      </div><br/>
    </div>

    <div class="form-group">
      <label class="control-label col-sm-3 text-right" for="lastname">Last Name</label>
      <div class="col-sm-9">
        <input type="text" name="lastname" id="lastname" class="form-control" placeholder="Enter Last Name" required>
      </div><br/>
    </div>

    <div class="form-group">
      <label class="control-label col-sm-3 text-right" for="email">Country</label>
      <div class="col-sm-9">
        <select name='country' class="form-control" class="input_text" >
        <option value="USA"> USA </option>
    <?php foreach ($countries as $countries) { ?>
    <option value="<?php echo $countries['CountryName']; ?>">
    <?php echo $countries['CountryName']; ?> [<?php echo '+'.$countries['Phonecode']; ?>]
    </option>
    <?php } 
    ?>
    </select>
      </div><br/>
    </div>

        <div class="form-group">
      <label class="control-label col-sm-3 text-right" for="primaryphone">Primary Phone</label>
      <div class="col-sm-9">
        <input type="text" name="primaryphone" id="primaryphone" class="form-control" placeholder="Primary Phone" required>
      </div><br/><br/>
    </div>

        <div class="form-group">
      <label class="control-label col-sm-3 text-right" for="password">Your Password</label>
      <div class="col-sm-9">
        <input type="password" name="password" id="password" class="form-control" placeholder="secure Password" required>
      </div><br/>
    </div>


    <div class="form-group">
      <label class="control-label col-sm-3 text-right" for="cpassword">Confirm Password</label>
      <div class="col-sm-9">
        <input type="password" name="cpassword" id="cpassword" class="form-control" placeholder="confirm Password" required>
      </div><br/>
    </div>


    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
        <input type="submit"  class="btn btn-info fullwidth" name="submit" value="Make Order" />
      </div>
    </div><br/><br/>
  </form>


</div>
          </div>

    </section>
 

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
           html +='<input type="hidden" name="upload_type" value="material">';
           html +='</div>';
   
           $("div#uploadFileContainer").append(html);
        }
   
   });
   
</script>


<script>
    var createAllErrors = function() {
        var form = $( this ),
            errorList = $( "ul.errorMessages", form );

        var showAllErrorMessages = function() {
            errorList.empty();

            // Find all invalid fields within the form.
            var invalidFields = form.find( ":invalid" ).each( function( index, node ) {

                // Find the field's corresponding label
                var label = $("label[for='"+$(this).attr('id')+"']");
                    // Opera incorrectly does not fill the validationMessage property.
                    message = node.validationMessage || 'Invalid value.';

                errorList
                    .show()
                    .append( "<li><span>" + "<strong>" + label.html() + "</strong>"+ "</span> " + "Заполните поле" + "</li>" );
            });
        };

        // Support Safari
        form.on( "submit", function( event ) {
            if ( this.checkValidity && !this.checkValidity() ) {
                $( this ).find( ":invalid" ).first().focus();
                event.preventDefault();
            }
        });

        $( "input[type=submit], button:not([type=button])", form )
            .on( "click", showAllErrorMessages);

        $( "input", form ).on( "keypress", function( event ) {
            var type = $( this ).attr( "type" );
            if ( /date|email|month|number|search|tel|text|select|time|url|week/.test ( type )
              && event.keyCode == 13 ) {
                showAllErrorMessages();
            }
        });
    };
    
    $( "form" ).each( createAllErrors );
</script>