      <div id='content'>
        <div class='panel panel-default'>
          <div class='panel-heading'>
            <i class='fa fa-envelope fa fa-large'></i>
           Конфигурации сообщений
            <div class='panel-tools'>
              <div class='btn-group'>
                <a class='btn' href='#'>
                  <i class='icon-refresh'></i>
                  Редактировать это сообщение
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

          <div class="col-md-4">
            <div class="row">
              <div class="col-lg-12">
                <div class="widget-container">
                  <!-- <div class="heading">
                    <i class="fa fa-spinner"></i>Индикатор
                  </div> -->
                  <div class="widget-content padded">
<table class="table">
<thead>
<th>ID</th>
<th>Определение</th>
<th>Изменить</th>



</thead>

                   <tbody>

                   <?php foreach ($messages as $messages): ?>
                   <tr>
                    <td><?php echo $messages['id'];?></td>
                    <td><?php // echo $messages['msg_id'];?>
                      
                      <?php 
                        if($messages['msg_id'] === 'new_writer_registers'){
                          echo 'Зарегистрирован новый Автор';
                        } elseif($messages['msg_id'] === 'new_client_registers'){
                          echo 'Зарегистрирован новый Заказчик';
                        } elseif($messages['msg_id'] === 'new_order_placed'){
                          echo 'Новый заказ';
                        } elseif($messages['msg_id'] === 'new_order_paid'){
                          echo 'Изменен статус заказа';
                        } elseif($messages['msg_id'] === 'writer_status_changed'){
                          echo 'Изменен статус пользователя';
                        } elseif($messages['msg_id'] === 'order_marked_aspaid'){
                          echo 'Оплата заказа';
                        } elseif($messages['msg_id'] === 'writer_bids'){
                          echo 'Ставки по заказам';
                        } elseif($messages['msg_id'] === 'order_assigned_towriter'){
                          echo 'Заказ передан в работу';
                        } elseif($messages['msg_id'] === 'order_status_changed'){
                          echo 'Статус/Оплата/Доработка';
                        } elseif($messages['msg_id'] === 'file_uploaded'){
                          echo 'Файл загружен';
                        } elseif($messages['msg_id'] === 'msg_toadmin_byclient' || $messages['msg_id'] === 'msg_toadmin_bywriter' || $messages['msg_id'] === 'msg_towriter_byadmin' || $messages['msg_id'] === 'new_message_received' || $messages['msg_id'] === 'message_template' ){
                          echo '-- Не изменять --';
                        } elseif($messages['msg_id'] === 'msg_toclient_byadmin'){
                          echo 'Новое сообщение';
                        } elseif($messages['msg_id'] === 'message_under_order'){
                          echo 'Новое сообщение по заказу';
                        } elseif($messages['msg_id'] === 'message_toall_writers'){
                          echo 'Доплата по заказу Автор';
                        } elseif($messages['msg_id'] === 'order_rated_byclient'){
                          echo 'Доплата по заказу Заказчик';
                        } elseif($messages['msg_id'] === 'writer_deactivates'){
                          echo 'Аккаунт отключен';
                        } elseif($messages['msg_id'] === 'order_reassigned'){
                          echo 'Заказ переназначен';
                        } elseif($messages['msg_id'] === 'message_oplata'){
                          echo 'Стоимость работы / Штраф';
                        } elseif($messages['msg_id'] === 'message_plan'){
                          echo 'План';
                        } elseif($messages['msg_id'] === 'message_order_complete'){
                          echo 'Заказ готов/Оплачен автору';
                        } ?>
                    </td>
                    <td><a href="<?php echo ci_site_url('Siteconfigs/view_message/'.$messages['msg_id']); ?>"> изменить</a>
                    </td>
                  </tr>
                                   
                  <?php endforeach; ?>  

                  </tbody>
                </table> 
                  </div>
                </div>
              </div>
            </div>



          </div>
          <div class="col-md-8">


            <div class="row">
              <div class="col-lg-12">
                <div class="widget-container fluid-height">
          <div class="col-lg-12">
            <ul class="breadcrumb">
              <li>
                <a href="#"></a><i class="fa fa-home"></i>
              </li>
              <!-- <li>
                <a href="#">UI</a>
              </li> -->
              <li class="active">
                Сообщение менеджеру [<?php echo $msg_config['msg_id'];?>]
              </li>
            </ul>
          </div>


                  <div class="widget-content padded text-center">

<div class='jsError'></div>



<?php echo form_open('Siteconfigs/editmsg_toadmin', array('class'=>'editmsg_toadmin'));?>

    <div class="form-group">
    <label class="control-label col-sm-1" for="email">Письмо</label>
      <div class="col-sm-11">
      <input type="hidden" class="form-control" name="msg_id" value = "<?php echo $msg_config['msg_id'];?>"/>
        <textarea class="ckeditor form-control" id="editor1" row="5" name="msg_body_admin">

<?php echo str_replace('\"','"',$msg_config['msg_body_admin']);?>
         </textarea>
      </div>
    </div>

              <div class="form-group">
            <label class="control-label col-md-1"></label>
            <div class="col-md-7">
              <input class="form-control btn btn-danger"  type='submit' Value='изменить Email'>
            </div>
          </div>

<?php echo form_close();?>
          
                  </div>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-lg-12">
                <div class="widget-container fluid-height">
                            <div class="col-lg-12">
            <ul class="breadcrumb">
              <li>
                <a href="#"></a><i class="fa fa-home"></i>
              </li>
             <!--  <li>
                <a href="#">UI</a>
              </li> -->
              <li class="active">
               Сообщение заказчику [<?php echo $msg_config['msg_id'];?>]
              </li>
            </ul>
          </div>
                  <div class="widget-content padded text-center">

<div class='jsError'></div>

                  <?php echo form_open('Siteconfigs/editmsg_toclient', array('class'=>'editmsg_toclient'));?>
   
    <div class="form-group">
      <label class="control-label col-sm-1" for="email">Письмо</label>
      <div class="col-sm-11">
        <textarea class="ckeditor form-control" id="editor2" name="msg_body_client">
<?php echo str_replace('\"','"',$msg_config['msg_body_client']);?>
</textarea>
         <input type="hidden" class="form-control" name="msg_id" value = "<?php echo $msg_config['msg_id'];?>"/>
      </div>
    </div>

                  <div class="form-group">
            <label class="control-label col-md-1"></label>
            <div class="col-md-7">
              <input class="form-control btn btn-danger"  type='submit' Value='изменить Email'>
            </div>
          </div>

                  <?php echo form_close();?>

            

          
                  </div>
                </div>
              </div>
            </div>            


            <div class="row">
              <div class="col-lg-12">
                <div class="widget-container fluid-height">
                                              <div class="col-lg-12">
            <ul class="breadcrumb">
              <li>
                <a href="#"></a><i class="fa fa-home"></i>
              </li>
             <!--  <li>
                <a href="#">UI</a>
              </li> -->
              <li class="active">
              Сообщение автору (<?php echo $msg_config['msg_id'];?>)
              </li>
            </ul>
          </div>
                  <div class="widget-content padded text-center">

<div class='jsError'></div>


<?php echo form_open('Siteconfigs/editmsg_towriter', array('class'=>'editmsg_towriter'));?>
   
    <div class="form-group">
      <label class="control-label col-sm-1" for="email">Письмо</label>
      <div class="col-sm-11">
              <input type="hidden" class="form-control" name="msg_id" value = "<?php echo $msg_config['msg_id'];?>"/>
        <textarea class="ckeditor form-control"  id="editor" name="msg_body_writer">
<?php echo str_replace('\"','"',$msg_config['msg_body_writer']);?>
         </textarea>
      </div>
    </div>

              <div class="form-group">
            <label class="control-label col-md-1"></label>
            <div class="col-md-7">
              <input class="form-control btn btn-danger"  type='submit' Value='изменить Email'>
            </div>
          </div>
                  <?php echo form_close();?>


        <script>
        ClassicEditor
            .create( document.querySelector( '#editor' ) )
            .catch( error => {
                console.error( error );
            } );
    </script>
            

          
                  </div>
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
    <!-- Javascripts -->
<!--     <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js" type="text/javascript"></script><script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js" type="text/javascript"></script> -->
    <script src="http://cdnjs.cloudflare.com/ajax/libs/modernizr/2.6.2/modernizr.min.js" type="text/javascript"></script><script src="http://lab2023.github.io/hierapolis/assets/javascripts/application-985b892b.js" type="text/javascript"></script>
    <!-- Google Analytics -->
  </body>
</html>
</div>

<script>
  CKEDITOR.replace( 'editor1', {
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
<script>
  CKEDITOR.replace( 'editor2', {
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