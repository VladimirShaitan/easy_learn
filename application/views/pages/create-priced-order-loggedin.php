<?php if($this->session->userdata('user_level') != 'client') { ?>
    <div class="text-center">
      <h2>Эта страница доступна только для заказчиков</h2>
      <a href="/in/user/myprofile" style="background: green;color: white;padding: 10px 20px;margin-top: 19px;display: inline-block;">К моему профилю</a>
    </div>
<?php } else { ?>

<div class="col-md-8">
   <div class="main border-right">
  <h3>Новый заказ</h3>
  <!-- <div id="newOrderForm"> -->
   <?php echo form_open_multipart('order/create', array('id'=>'newOrderForm', 'class'=>'clearfix')); ?>
  <!-- <form class="form-horizontal"> -->

 <ul class="errorMessages"></ul>
    <div class="form-group">

      <label class="control-label col-sm-3 text-right" for="title">Тема*</label>
      <div class="col-sm-9">
        <input type="text" name="topic" class="form-control form" id="title" placeholder="Введите тему" required>
      </div>
    </div>

    <div class="form-group">
      <label class="control-label col-sm-3 text-right" for="subject">Предмет*</label>
      <div class="col-sm-9 select">          
            <select name='subject' id='subject' class="form-control" required >
               <?php foreach ($subject as $subject) { ?>
               <option value="<?php echo $subject['pvalue'].''.$subject['subject']; ?>">
                  <?php echo $subject['subject']; ?>
               </option>
               <?php } 
                  ?>
            </select>

      </div>
    </div>
    
      <div class="form-group">
      <label class="control-label col-sm-3 text-right" for="pwd">Тип работы*</label>
      <div class="col-sm-9 select">          
            <select name='referencing_style' class="form-control" id="pwd" required >
            <!-- <option value="1"> Выберите тип работы </option> -->
               <?php foreach ($referencing_style as $referencing_style) { ?>
               <option value="<?php echo $referencing_style['style']; ?>">
                  <?php echo $referencing_style['style']; ?> 
               </option>
               <?php } ?>
            </select>
      </div>
    </div>

    <div class="form-group">
      <label class="control-label col-sm-3 text-right" for="words">Объем работы (стр.)*</label>
      <div class="col-sm-9">
        <input type="number" name="words" class="form-control form" id="words" placeholder="Введите объем работы" required>
      </div>
    </div>



            <div class="form-group">
              <label class="control-label col-sm-3 text-right" for="urgency">Дата выполнения*</label>
               <div class="col-sm-9">
                <div class='input-group date' id='datetimepicker2'>
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                  <input type='text' id='urgency' readonly placeholder="Дата выполнения*" name='urgency' autocomplete="off" required class="form-control" />
                  
                </div>
            </div>
        </div>
        <script type="text/javascript">
            var date = new Date();
            date.setDate(date.getDate());
            $(function () {
                $('#datetimepicker2').datetimepicker({
                format:'dd.mm.yyyy hh:ii',
                language: 'ru',
                startDate: date,
                weekStart: 1
                });
            });
            calTrig('datetimepicker2');
        </script>

    <div class="form-group">
    <div class="amount" style="display: none;">
      <label class="control-label col-sm-4 text-right" for="email">Amount </label>
      <div class="col-sm-2 select">
            <select  id='currency' name='currency' class="form-control " >
               <?php foreach ($currency as $currency) { ?>
               <option value="<?php echo $currency['currencyxchange'].''.$currency['countryCode']; ?>">
                  <?php echo $currency['countryCode']; ?> 
               </option>
               <?php } ?>
            </select>
      </div>
      <div class="col-sm-5">
        <input type="input" id="amount" class="form-control" name="amount" value="0" placeholder="10" readonly/>
        <input type="hidden" id="usdamount" class="form-control" name="usdamount" value="$" placeholder="10" readonly/>
       </div>
    </div>
    </div>


<div class="form-group">
      <label class="control-label col-sm-3 text-right" for="sources">Бюджет*</label>
      <div class="col-sm-9">
        <input type="text" name="sources" required class="form-control form" id="sources" placeholder="Введите бюджет">
      </div>
    </div>
  

    <div class="form-group">
      <label class="control-label col-sm-3 text-right" for="instructions">Пожелания к оформлению</label>
      <div class="col-sm-9">
        <textarea cols="200" rows="5" id='instructions'  name="instructions"  placeholder="Уникальность текста, Требования к оформлению, Другое"></textarea>
      </div>
    </div>

    <div class="form-group">
      <label class="control-label col-sm-3 text-right"></label>
      <div class="col-sm-9">
      <h5>План, методичка, задание</h5>
        <div class="alert alert-info">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true"> &times;</button>
        <strong> Загрузить файл </strong>
        <input type="file" name="multipleFiles[]">
        <input type="hidden" name="upload_type" value="material">
      </div>
      <div id="uploadFileContainer"></div>
      <button id="ADDFILE" class="btn btn-danger">
        + Добавить еще файл
      </button>
      </div>
    </div>
    
     <label class="control-label col-sm-3 text-right" for="email"></label>
      <div class="col-sm-9" style="display: none;">

        <input type="input" class="form-control" name="preferred_writer" value = "<?php echo $preferred_writer; ?>" readonly/>
      </div>
    
    
        <input type="hidden" class="input_text" name="order_status" value = "<?php echo $order_status; ?>" readonly/>

        <input type="hidden" id="customer_email" class="form-control" name="customer_email" value="<?php echo $email; ?>" placeholder="10">
<input type="hidden" class="input_text" name="writeramount" value = "<?php // echo $configs['writerpay'];?>" readonly/> 
         <input type="hidden" id="customer_name" class="input_text" name="customer_name" value="<?php echo $firstname; ?> <?php echo $lastname; ?>"  readonly>

    <div class="form-group">        
      <div class="col-sm-offset-3 col-sm-9">

        <input type="submit"  class="btn btn-info fullwidth" name="submit" value="Сделать заказ" />

      </div>
    </div>
<!-- </form> -->
<?php echo form_close(); ?>
<!-- </div> -->
</div>
 </div>

              

        </div>
      </div>
    </section>

    <!--/ work-shop-->

<?php 
foreach($ops_coupon as $ops_coupon) {
  $ret = $ops_coupon['coupon_value'];
 }

?>
<script type="text/javascript">
(function(){
  let butget = document.getElementById('sources');
  butget.addEventListener('blur', doTelBut);
  let butgetSimb = ['0', '1', '2', '3', '4', '5', '6', '7', '8', '9'];

  function doTelBut(){
    let trueNumb = '';
    for(let i = 0; i < butget.value.length; i++){
        if(butgetSimb.includes(butget.value[i])){
          trueNumb += butget.value[i].toString();
        }
    }
        butget.value = trueNumb;
  }
})()
</script>
    <script type="text/javascript">


   $("select[id='words'], select[id='academiclevel'], select[id='subject'], input[id='discount'], select[id='currency'], select[id='urgency']").change(function(){

   var $d = $("select[id='words']");
   var $s = $("select[id='subject']");
   var $f = $("select[id='urgency']");
   var $c = $("select[id='currency']");
   var $q = $("select[id='academiclevel']");
  var $dd = $("input[id='discount']");
   //var $dd = $("100");


   if($d.length ==1){
       var pages = parseFloat($d.val(), 1);
       var urgency = parseFloat($f.val(), 1);
       var subject = parseFloat($s.val(), 1);
       var currency = parseFloat($c.val(), 1);
       var academic = parseFloat($q.val(), 1);
      var ddr = parseFloat($dd.val(), 1);



var codes = [<?php echo $ret; ?>];

   }
   });
   
</script>

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
           html +='<strong> Загрузить файл </strong>';
           html +='<input type="file" name="multipleFiles[]">';
           html +='<input type="hidden" name="upload_type" value="material">';
           html +='</div>';
   
           $("div#uploadFileContainer").append(html);
        }
   
   });
   
</script>


<!-- <script>
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
</script> -->
<script>
  
(function(){  
    function dgi(id){return document.getElementById(id);}
    function pe(el){return el.parentElement.parentElement.parentElement.querySelector('label').innerText}
    var orderCreateForm = dgi('newOrderForm');
    console.log(orderCreateForm);

    var reqFields = document.querySelectorAll('#newOrderForm input[required]');
    orderCreateForm.onsubmit = function(){
     for(var i = 0; i <= reqFields.length-1; i++){
       if(reqFields[i].value === ''){
         alert("Пожалуйста заполните поле " + "'" + pe(reqFields[i]) + "'");
         return false;
       }
      }
    }  
})()

</script>
  <script type="text/javascript" src="<?=base_url()?>opasset/js/bootstrap-datetimepicker.min.js"></script>
<script type="text/javascript" src="<?=base_url()?>opasset/js/bootstrap-datetimepicker.ru.js"></script>
<?php } ?>