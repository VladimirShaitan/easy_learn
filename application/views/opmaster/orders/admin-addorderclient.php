        <div class='panel panel-default col-lg-9'>
          <div class='panel-heading'>
            <i class='fa fa-trash fa fa-large'></i>
           Архив
            <div class='panel-tools'>
              <div class='btn-group'>
                <a class='btn' href='#'>
                  <i class='icon-refresh'></i>
                
                </a>
                <a class='btn' data-toggle='toolbar-tooltip' href='#' title='Toggle'>
                  <i class='icon-chevron-down'></i>
                </a>
              </div>
            </div>
          </div>
          <div class='panel-body'>
      <div class="container-fluid main-content">
        <div class="row">
          <!-- Weather -->
          <div class="col-md-12">
            <div class="widget-container fluid-height">
              <div class="widget-content padded">
<hr/>
      <?php echo validation_errors(); ?>
   <?php echo form_open_multipart('Adminorders/newuser_order'); ?>
  <form class="form-horizontal">



    <!-- <div class="form-group">
      <label class="control-label col-md-2 text-right" for="pwd">Выбрать заказчика</label>
      <div class="col-md-9">          
            <select name='customer' class="form-control"  >
            <option value=""> Выбрать заказчика</option>
               <?php foreach ($allclients as $allclients) { ?>
               <option value="<?php echo $allclients['writer_id']; ?>">
                  <?php echo $allclients['writer_id']; ?> || <?php echo $allclients['firstname']; ?> <?php echo $allclients['lastname']; ?>
               </option>
               <?php } 
                  ?>

            </select>

      </div>
    </div>

    <div class="form-group">
      <label class="control-label col-md-2 text-right" for="email">Тема</label>
      <div class="col-md-9">
        <input type="text" name="topic" class="form-control" id="email" placeholder="Enter topic">
      </div>
    </div>



    <div class="form-group">
      <label class="control-label col-md-2 text-right" for="pwd">Category/Subject</label>
      <div class="col-md-9">          
            <select name='subject' id='subject' class="form-control"  >
            <option value="1"> Select Subject </option>
               <?php foreach ($subject as $subject) { ?>
               <option value="<?php echo $subject['subject']; ?>">
                  <?php echo $subject['subject']; ?>
               </option>
               <?php } 
                  ?>

            </select>

      </div>
    </div>
    
    <div class="form-group">
      <label class="control-label col-md-2 text-right" for="pwd">Academic level</label>
      <div class="col-md-9">          
            <select id='academiclevel' name='academic_level' class="form-control"  >
            <option value="1"> Select Academic Level </option>
               <?php foreach ($academic_level as $academic_level) { ?>
               <option value="<?php echo $academic_level['pvalue']; ?>">
                  <?php echo $academic_level['academic_level']; ?> 
               </option>
               <?php } 
                  ?>
            </select>
      </div>
    </div>

    <div class="form-group">
      <label class="control-label col-md-2 text-right" for="pwd">Word/Pages</label>
      <div class="col-md-9">          
<select id="words" name='words'  class="form-control"  >
<option value="1"> Select Pages </option>
<?php foreach ($configs as $configs) { ?>
 <?php $wordsperpage = $configs['wordsperpage']; ?>
<?php } ?>
<?php for ($x = 1; $x <= 100; $x++) {  ?>
<option value="<?php echo $x; ?>"> <?php echo $x; ?> Pages || Aprox <?php $words=$x*$wordsperpage; echo $words; ?> Words </option>
<?php } ?> 
 </select>
      </div>
    </div>

        <div class="form-group">
      <label class="control-label col-md-2 text-right" for="pwd">Urgency</label>
      <div class="col-md-9">          
            <select  id='urgency' name='urgency' class="form-control" >
            <option value="1"> Select Urgency </option>
              <?php foreach ($urgency as $urgency) { ?>
               <option value="<?php echo $urgency['pvalue']; ?>">
                  <?php echo $urgency['urgency']; ?> <?php echo $urgency['duration']; ?> 
               </option>
               <?php } 
                  ?>
            </select>
      </div>
    </div>



    <div class="form-group">
    <div class="amount">
      <label class="control-label col-md-2 text-right" for="email">Amount</label>
      <div class="col-md-9">
        <input type="input" id="amount" class="form-control" name="amount" value="$" placeholder="10">
      </div>
    </div>
    </div>




    <div class="form-group">
    <div class="amount">
      <label class="control-label col-md-2 text-right" for="email">Writer Pay</label>
      <div class="col-md-9">
        <input type="input" id="amount" class="form-control" name="writerpay1" value="" placeholder="10">
      </div>
    </div>
    </div>


    <div class="form-group">
      <label class="control-label col-md-2 text-right" for="pwd">Number of Sources</label>
      <div class="col-md-9">          
      <select id='sources' name='sources'  class="form-control"  >
      <option value="1"> Select number of Sources </option>
      <?php for ($x = 1; $x <= 100; $x++) {  ?>
      <option value="<?php $x; ?>"> <?php echo $x; ?>  </option>
      <?php } ?> 
       </select>
      </div>
    </div>

    <div class="form-group">
      <label class="control-label col-md-2 text-right" for="pwd">Format style</label>
      <div class="col-md-9">          
            <select name='referencing_style' class="form-control"  >
            <option value="1"> Select Referecing Style </option>
               <?php foreach ($referencing_style as $referencing_style) { ?>
               <option value="<?php echo $referencing_style['style']; ?>">
                  <?php echo $referencing_style['style']; ?> 
               </option>
               <?php } 
                  ?>
            </select>
      </div>
    </div>

    <div class="form-group">
      <label class="control-label col-md-2 text-right" for="instructions">Instructions</label>
      <div class="col-md-9">
        <textarea class="ckeditor form-control" id="editor" name="instructions"></textarea>
      </div>
    </div>
        <script>
        ClassicEditor
            .create( document.querySelector( '#editor' ) )
            .catch( error => {
                console.error( error );
            } );
    </script>
    <div class="form-group">
      <label class="control-label col-md-2 text-right" for="email"></label>
      <div class="col-md-9">
      <button id="ADDFILE" class="btn btn-lg btn-block btn-success"> Add/uplaod file</button>
       <div id="uploadFileContainer"></div>
      </div>
    </div>

    <div class="form-group">
      <label class="control-label col-md-2 text-right" for="pwd">Order target</label>
      <div class="col-md-9">          
            <select name='preferred_writer' class="form-control"  >
            <option value=""> Open Project </option>
               <?php foreach ($writers as $writers) { ?>
               <option value="<?php echo $writers['writer_id']; ?>">
                  <?php echo $writers['writer_id']; ?> <?php echo $writers['firstname']; ?> <?php echo $writers['lastname']; ?> 
              </option>
               <?php } 
                  ?>
            </select>
      </div>
    </div>
    
        <input type="hidden" class="input_text" name="order_status" value = "<?php echo $order_status; ?>" readonly/>
<input type="hidden" class="input_text" name="writeramount" value = "<?php echo $configs['writerpay'];?>" readonly/> 

    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
        <input type="submit"  class="btn btn-info fullwidth" name="submit" value="Create a new Order" />
      </div>
    </div>
  </form>


 <?php echo form_close();?>  
<hr/>
              </div>
            </div>
          </div>
           end Weather --><!-- Bar Graph 

        </div>
        </div>

      </div>
        </div>
      </div>
    </div>
   Footer -->
    <!-- Javascripts 
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js" type="text/javascript"></script><script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js" type="text/javascript"></script><script src="http://cdnjs.cloudflare.com/ajax/libs/modernizr/2.6.2/modernizr.min.js" type="text/javascript"></script><script src="http://lab2023.github.io/hierapolis/assets/javascripts/application-985b892b.js" type="text/javascript"></script>
    Google Analytics 
  </body>
</html> -->

<!-- <script type="text/javascript">
   $("select[id='words'], select[id='academiclevel'], select[id='urgency']").change(function(){

   var $d = $("select[id='words']");
   var $f = $("select[id='urgency']");
   var $q = $("select[id='academiclevel']");
   if($d.length ==1){

       var pages = parseInt($d.val(), 10);
       var urgency = parseInt($f.val(), 10);
       var academic = parseInt($q.val(), 10);
       $("#amount").val((urgency)*(pages*academic));
      // $("#amount").val(service);
   }
   });
   
</script> -->


<!-- <script type="text/javascript">
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
   
</script> -->

<!-- <script>
  CKEDITOR.replace( 'editor', {
    toolbar: [
      { name: 'document', items: [ 'Print' ] },
      { name: 'clipboard', items: [ 'Undo', 'Redo' ] },
      { name: 'styles', items: [ 'Format', 'Font', 'FontSize' ] },
      { name: 'basicstyles', items: [ 'Bold', 'Italic', 'Underline', 'Strike', 'RemoveFormat', 'CopyFormatting' ] },
      { name: 'colors', items: [ 'TextColor', 'BGColor' ] },
      { name: 'align', items: [ 'JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock' ] },
      { name: 'links', items: [ 'Link', 'Unlink' ] },
      { name: 'paragraph', items: [ 'NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', '-', 'Blockquote' ] },
      { name: 'insert', items: [ 'Image', 'Table' ] },
      { name: 'tools', items: [ 'Maximize' ] },
      { name: 'editing', items: [ 'Scayt' ] }
    ],
    customConfig: '',

    disallowedContent: 'img{width,height,float}',
    extraAllowedContent: 'img[width,height,align]',
    extraPlugins: 'tableresize,uploadimage,uploadfile',
    contentsCss: [ 'https://cdn.ckeditor.com/4.7.3/full-all/contents.css', 'mystyles.css' ],

    bodyClass: 'document-editor',
    format_tags: 'p;h1;h2;h3;pre',

    removeDialogTabs: 'image:advanced;link:advanced',

    stylesSet: [
      /* Inline Styles */
      { name: 'Marker', element: 'span', attributes: { 'class': 'marker' } },
      { name: 'Cited Work', element: 'cite' },
      { name: 'Inline Quotation', element: 'q' },
      /* Object Styles */
      {
        name: 'Special Container',
        element: 'div',
        styles: {
          padding: '5px 10px',
          background: '#eee',
          border: '1px solid #ccc'
        }
      },
      {
        name: 'Compact table',
        element: 'table',
        attributes: {
          cellpadding: '5',
          cellspacing: '0',
          border: '1',
          bordercolor: '#ccc'
        },
        styles: {
          'border-collapse': 'collapse'
        }
      },
      { name: 'Borderless Table', element: 'table', styles: { 'border-style': 'hidden', 'background-color': '#E6E6FA' } },
      { name: 'Square Bulleted List', element: 'ul', styles: { 'list-style-type': 'square' } }
    ]
  } );
</script> -->