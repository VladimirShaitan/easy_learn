        <div class='panel panel-default col-lg-9'>
          <div class='panel-heading'>
            <i class='fa fa-beer fa fa-large'></i>
            Add new Writer
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
               <div class="heading">
                <i class="fa fa-signal"></i>New Writer<i class="fa fa-list pull-right"></i><i class="fa fa-refresh pull-right"></i>
              </div>
<hr/>
<?php echo validation_errors(); ?>
<?php echo form_open('Adminwriters/new_writer'); ?>

   <form class="form-horizontal">

    <div class="form-group">
      <label class="control-label col-md-2 text-right" for="email">Writer's Email</label>
      <div class="col-md-7">
        <input type="email" name="email" class="form-control" placeholder="Your Primary email">
      </div>
    </div>

    <div class="form-group">
      <label class="control-label col-md-2 text-right" for="email">First Name</label>
      <div class="col-md-7">
        <input type="text" name="firstname" class="form-control" placeholder="Enter First Name">
      </div>
    </div>

    <div class="form-group">
      <label class="control-label col-md-2 text-right" for="email">Last Name</label>
      <div class="col-md-7">
        <input type="text" name="lastname" class="form-control" placeholder="Enter Last Name">
      </div>
    </div>

    <div class="form-group">
      <label class="control-label col-md-2 text-right" for="email">Your Gender</label>
      <div class="col-md-7">
      <label class="radio-inline"><input name="gender" type="radio" value="male"><span>Male</span></label>
      <label class="radio-inline"><input name="gender" type="radio" value="female"><span>Female</span></label>
      </div>
    </div>

    <div class="form-group">
      <label class="control-label col-md-2 text-right" for="email">Country</label>
      <div class="col-md-7">
        <select name='country' class="form-control" class="input_text" >
    <?php foreach ($country as $news_item) { ?>
    <option value="<?php echo $news_item['CountryName']; ?>">
    <?php echo $news_item['CountryName']; ?>
    </option>
    <?php } 
    ?>
    </select>
      </div>
    </div>

        <div class="form-group">
      <label class="control-label col-md-2 text-right" for="streetaddress">Street address</label>
      <div class="col-md-7">
        <input type="text" name="streetaddress" class="form-control" placeholder="Street address">
      </div>
    </div>


        <div class="form-group">
      <label class="control-label col-md-2 text-right" for="City">City</label>
      <div class="col-md-7">
        <input type="text" name="city" class="form-control" placeholder="Your City">
      </div>
    </div>

    <div class="form-group">
      <label class="control-label col-md-2 text-right" for="email">State</label>
      <div class="col-md-7">
     <select name='state' class="form-control" class="input_text" >
     <option value="other"> Outside USA  </option>
    <?php foreach ($states as $states) { ?>
    <option value="<?php echo $states['states_name']; ?>">
    <?php echo $states['states_name']; ?>
    </option>
    <?php } 
    ?>
    </select>
      </div>
    </div>


    <div class="form-group">
      <label class="control-label col-md-2 text-right" for="email">ZIP (postal code)</label>
      <div class="col-md-7">
        <input type="text" name="zip" class="form-control" placeholder="ZIP(postal code)">
      </div>
    </div>


    <div class="form-group">
      <label class="control-label col-md-2 text-right" for="email">Your Password</label>
      <div class="col-md-7">
        <input type="password" name="password" class="form-control" placeholder="Secure Password (must be more than 5 characters)">
      </div>
    </div>


    <div class="form-group">
      <label class="control-label col-md-2 text-right" for="email">Confirm Password</label>
      <div class="col-md-7">
        <input type="password" name="cpassword" class="form-control" placeholder="confirm Password (like one you entered above)">
      </div>
    </div>


    <div class="form-group">
      <label class="control-label col-md-2 text-right" for="email">Primary Phone</label>
      <div class="col-md-7">
        <input type="text" name="primaryphone" class="form-control" placeholder="Primary Phone">
      </div>
    </div>

    <div class="form-group">
      <label class="control-label col-md-2 text-right" for="email">Citation</label>
      <div class="col-md-9">
      <label class="checkbox-inline"><input name="citation[]" type="checkbox" value="MLA"><span>MLA</span></label>
      <label class="checkbox-inline"><input name="citation[]" type="checkbox" value="APA"><span>APA</span></label>
      <label class="checkbox-inline"><input name="citation[]" type="checkbox" value="Harvard"><span>Harvard</span></label>
      <label class="checkbox-inline"><input name="citation[]" type="checkbox" value="Chicago/Turabian"><span>Chicago/Turabian</span></label>
      <label class="checkbox-inline"><input name="citation[]" type="checkbox" value="Other"><span>Other</span></label>

      </div>
    </div>

    <div class="form-group">
      <label class="control-label col-md-2 text-right" for="email">Native language?</label>
      <div class="col-md-7">
        <input type="text" name="nativelanguage" class="form-control" placeholder="Native language">
      </div>
    </div>


    <div class="form-group">
      <label class="control-label col-md-2 text-right" for="email">Highest Academic Level</label>
      <div class="col-md-7">
    <select class="form-control" name='academiclevel' class="input_text" >
     <option  value=""> Choose Option</option>
     <option value="Undergraduate"> Undergraduate</option>
     <option value="Bachelor"> Bachelor</option>
     <option value="Masters"> Masters</option>
     <option value="PhD"> PhD</option>
    </select><br />
      </div>
    </div>
    

    <div class="form-group">
      <label class="control-label col-md-2 text-right" for="email">Subject Area (Select maximum 10 subjects)</label>
      <div class="col-md-9">
      <?php foreach ($subject as $subject) { ?>
      <label class="checkbox-inline col-sm-3"><input name="subject[]" value="<?php echo $subject['subject']; ?>" type="checkbox"><span><?php echo $subject['subject']; ?></span></label>
 <?php } ?> 

      </div>
    </div>



    <div class="form-group">
      <label class="control-label col-md-2 text-right" for="email">Writer's bio</label>
      <div class="col-md-10">
          <textarea name="text" div="bio" id="editor" class="form-control" rows="3" placeholder="short bio about you (seen by clients)"></textarea>
      </div>
    </div>

    <input type="submit"  class="btn btn-warning fullwidth" name="submit" value="Create a writer" />
 <?php echo form_close();?>  
<hr/>
              </div>
            </div>
          </div>
        </div>
        </div>


        </div>
        </div>
      </div>
    </div>
    <!-- Footer -->
    <!-- Javascripts --><!-- 
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js" type="text/javascript"></script><script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js" type="text/javascript"></script> -->
    <script src="http://cdnjs.cloudflare.com/ajax/libs/modernizr/2.6.2/modernizr.min.js" type="text/javascript"></script><script src="http://lab2023.github.io/hierapolis/assets/javascripts/application-985b892b.js" type="text/javascript"></script>
    <!-- Google Analytics -->
  </body>
</html>


<script>
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
</script>