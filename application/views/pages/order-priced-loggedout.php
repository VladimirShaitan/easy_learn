<div class="fre-perfect-freelancer">
  <div class="fre-page-section section-archive-project">
      <div class="container-fluid">
          <div class="col-md-8 col-xs-12 border-right">
              <div class="main">
                <h3>Форма заказа</h3>
                <hr/>
                <?php echo validation_errors(); ?>
                  <?php echo form_open_multipart('project/create', array('class'=>'clearfix')); ?>
              <!-- <form class="form-horizontal"> -->
               <ul class="errorMessages"></ul>
                <div class="form-group">
                  <label class="control-label col-sm-3 text-right" for="topic">Тема*</label>
                  <div class="col-sm-9">
                    <input type="text" name="topic" class="form-control" id="topic" placeholder="Напишите тему работы" data-req="0">
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-sm-3 text-right" for="subject">
                    Предмет*
                  </label>
                  <div class="col-sm-9 select">          
                    <select name='subject' id='subject' class="form-control" required>
                      <?php foreach ($subject as $subject) { ?>
                        <option value="<?php echo $subject['pvalue'].''.$subject['subject']; ?>">
                            <?php echo $subject['subject']; ?>
                        </option>
                      <?php } ?>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-sm-3 text-right" for="pwd">
                    Тип работы*
                  </label>
                  <div class="col-sm-9 col-xs-12 select">          
                    <select name='referencing_style' class="form-control" required>
                      <?php foreach ($referencing_style as $referencing_style) { ?>
                        <option value="<?php echo $referencing_style['style']; ?>">
                          <?php echo $referencing_style['style']; ?> 
                        </option>
                      <?php } ?>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-sm-3 text-right" for="words">
                    Объем работы*
                  </label>
                  <div class="col-sm-9 col-xs-12">
                    <input type="number" name="words" class="form-control form" id="words" placeholder="Введите объем работы"  data-req="1">
                  </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-3 text-right" for="urgency">
                      Дата выполнения
                    </label>
                    <div class="col-sm-9 col-xs-12">
                      <div class='input-group date' id='datetimepicker2'>
                        <span class="input-group-addon">
                          <span class="glyphicon glyphicon-calendar"></span>
                        </span>
                        <input type='text' placeholder="Дата выполнения" readonly id='urgency' autocomplete="off" name='urgency' class="form-control" />  
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
                    <label class="control-label col-sm-4 text-right" for="email">
                      Amount
                    </label>
                    <div class="col-sm-3 select">
                      <select  id='currency' name='currency' class="form-control " >
                        <?php foreach ($currency as $currency) { ?>
                        <option value="<?php echo $currency['currencyxchange'].''.$currency['countryCode']; ?>">
                          <?php echo $currency['countryCode']; ?> 
                        </option>
                        <?php } ?>
                      </select>
                    </div>
                    <div class="col-sm-3">
                      <input type="input" id="amount" class="form-control" name="amount" value="0" placeholder="10" readonly/>
                      <input type="hidden" id="usdamount" class="form-control" name="usdamount" value="$" placeholder="10" readonly/>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-sm-3 text-right" for="pwd">Бюджет*</label>
                  <div class="col-sm-9">
                    <input type="text" name="sources"  data-req="2" class="form-control form" id="sources" placeholder="Введите бюджет">
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-sm-3 text-right" for="instructions">      Пожелания к оформлению
                  </label>
                  <div class="col-sm-9">
                    <textarea cols="200" rows="5" id='instructions' name="instructions" placeholder="Уникальность текста, Требования к оформлению, Другое"></textarea>
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-sm-3 text-right" for="email">Файл</label>
                  <div class="col-sm-9">
                    <h5>План, методичка, задание</h5>
                    <div class="alert alert-info">
                       <button type="button" class="close" data-dismiss="alert" aria-hidden="true"> &times;</button>
                       <strong>Загрузить файл</strong>
                      <input type="file" name="multipleFiles[]">
                      <input type="hidden" name="upload_type" value="material">
                   </div>
                   <div id="uploadFileContainer"></div>
                    <button id="ADDFILE" type="button" class="btn btn-danger">
                      + Добавить еще файл
                    </button>
                  </div>
                </div>


               <div class="form-group">
                  <label class="control-label col-sm-3 text-right" for="email"></label>
                  <div class="col-sm-9" style="display: none;">
                    <input type="input" class="form-control" name="preferred_writer" value = "<?php echo $preferred_writer; ?>" readonly/>
                  </div>
                </div> 

                <input type="hidden" class="input_text" name="order_status" value = "<?php echo $order_status; ?>" readonly/>
                <input type="hidden" class="input_text" name="writeramount" value = "<?php // echo $configs['writerpay'];?>" readonly/> 
                <hr/>
                <h3>Регистрация</h3>
                <hr/>
                <div class="form-group">
                  <label class="control-label col-sm-3 text-right" for="myemail">
                    Ваш Email*
                  </label>
                  <div class="col-sm-9">
                    <span class="text-danger" id="err" style="display: none">Пользователь с таким email зарегистрирован автором</span>
                    <input type="email" name="email" id="myemail" class="form-control" value="" placeholder="Введите Ваш Email"  data-req="3">
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-sm-3 text-right" for="firstname">
                    Ваше имя*
                  </label>
                  <div class="col-sm-9">
                    <input type="text" name="firstname" id="firstname" class="form-control" placeholder="Введите Ваше имя"  data-req="4">
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-sm-3 text-right" for="lastname">
                    Ваша фамилия*
                  </label>
                  <div class="col-sm-9">
                    <input type="text" name="lastname" id="lastname" class="form-control" placeholder="Введите Вашу фамилию"  data-req="5">
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-sm-3 text-right" for="primaryphone">
                  Номер телефона*
                  </label>
                  <div class="col-sm-9">
                    <input type="tel" id="telete" name="primaryphone" id="primaryphone" class="form-control" placeholder="Номер телефона"  data-req="6" tabindex="0" role="button" data-toggle="popover" data-trigger="focus" title="Номер телефона" data-content="Вводите номер телефона используя только цифры(без спецсимволов), например: 380009998800" data-placement="top">
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-sm-3 text-right" for="password">
                    Ваш пароль*
                  </label>
                  <div class="col-sm-9">
                    <input type="password" name="password" id="password" class="form-control" placeholder="Ваш пароль" data-req="7">
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-sm-3 text-right" for="cpassword">Подтвердите пароль*</label>
                  <div class="col-sm-9">
                    <input type="password" name="cpassword" id="cpassword" class="form-control" placeholder="Подтвердите пароль" data-req="8">
                  </div>
                </div>

                <div class="form-group" id="reg_order">        
                  <div class="col-sm-offset-3 col-sm-9">
                    <!-- <input type="submit"  style="display: none" class="btn btn-info fullwidth" name="submit" value="Сделать заказ" /> -->
                    <div id="falseSubmit" class="btn btn-info fullwidth text-center">Сделать заказ</div>
                  </div>

                </div>


              <!-- </form> -->
              <?php echo form_close(); ?>
              </div> 
          </div>

          <div class="col-sm-4 col-xs-12">
            <h3> 100% Качество работы </h3>
            <div class="row" style="border: 1px dotted #31b0d5;">
              <div class="col-sm-3 col-xs-12">
                <h1 class="text-center"><i class="fa fa-plus fa-2x"></i></h1>
              </div>
              <div class="col-sm-9 col-xs-12">
                  <h5 class="text-center">Закажи магистерскую, дипломную, бакалаврскую и получи доклад в подарок! </h5>
              </div>
            </div>

            <div class="row elementpad" style="border: 1px dotted #31b0d5;">
              <div class="col-sm-3 col-xs-12">
                <h1 class="text-center"><i class="fa fa-user fa-2x"></i></h1>
              </div>
              <div class="col-sm-9 col-xs-12">
                <h5 class="text-center">Сопровождение до полной защиты работы</h5>
              </div>
            </div>
             
            <div class="row elementpad" style="border: 1px dotted #31b0d5;">
                <div class="col-sm-3 col-xs-12">
                  <h1 class="text-center"><i class="fa fa-clock-o fa-2x"></i></h1>
                </div>
                <div class="col-sm-9 col-xs-12">
                  <h5 class="text-center">Выполняем срочные заказы. Срочно – Вам к нам!</h5>
                </div>
            </div>
          </div>
      </div>
    </div>
</div>

<?php 
foreach($ops_coupon as $ops_coupon) {$ret = $ops_coupon['coupon_value'];}
?>

<script type="text/javascript">
  
(function(){
  let tt = document.getElementById('telete');
  let butget = document.getElementById('sources');
  tt.addEventListener('blur', doTel);
  butget.addEventListener('blur', doTelBut);
  let numbs = ['0', '1', '2', '3', '4', '5', '6', '7', '8', '9', '(', ')', '+', '-'];
  let butgetSimb = ['0', '1', '2', '3', '4', '5', '6', '7', '8', '9'];

  function doTel(){
    let trueNumb = '';
    for(let i = 0; i < tt.value.length; i++){
        if(numbs.includes(tt.value[i])){
          trueNumb += tt.value[i].toString();
        }
    }
        tt.value = trueNumb;
  }

  function doTelBut(){
    let trueNumb = '';
    for(let i = 0; i < butget.value.length; i++){
        if(butgetSimb.includes(butget.value[i])){
          trueNumb += butget.value[i].toString();
        }
    }
    // console.log(butget.value);
        butget.value = trueNumb;
  }
})()



</script>
<script type="text/javascript">

$(function () {
  $('[data-toggle="popover"]').popover();
})

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



     if (ddr){

        if($.inArray(ddr, codes) > -1){
       $("#amount").val((((100-ddr)/100*currency*urgency)*(pages*academic*subject)).toFixed(2));
       $("#usdamount").val((((100-ddr)/100*urgency)*(pages*academic*subject)).toFixed(2));  
       } else {
        $("#amount").val((((100)/100*currency*urgency)*(pages*academic*subject)).toFixed(2));
        $("#usdamount").val((((100)/100*urgency)*(pages*academic*subject)).toFixed(2));
        }

     } else {
        $("#amount").val((((100)/100*currency*urgency)*(pages*academic*subject)).toFixed(2));
        $("#usdamount").val((((100)/100*urgency)*(pages*academic*subject)).toFixed(2));
     }


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
           html +='<strong>Загрузить файл</strong>';
           html +='<input type="file" name="multipleFiles[]">';
           html +='<input type="hidden" name="upload_type" value="material">';
           html +='</div>';
   
           $("div#uploadFileContainer").append(html);
        }
   
   });
</script>

<script>
  var mailF = document.getElementById('myemail');
  var btnHolder = document.getElementById('reg_order');
  // var formInp = document.getElementsByTagName('form')[1].querySelectorAll('input');


  // var btnTemplate = '<div class="col-sm-offset-3 col-sm-9"><input type="submit"  class="btn btn-info fullwidth" name="submit" value="Сделать заказ" /></div>';
  mailF.addEventListener('change', findUsr);

  function findUsr() {
     var ser = 'email='+ mailF.value;
     $.post('<?php echo ci_site_url(); ?>Writers/check_user_by_email', ser) 
       .done(function(data){
            if(data > 0){
              document.getElementById('err').style.display = 'block';
              mailF.style.borderColor = 'red';
              mailF.value = '';
              // btnHolder.querySelector('input').setAttribute('disabled', 'disabled');

            } else {
              // btnHolder.querySelector('input').removeAttribute('disabled');
              document.getElementById('err').style.display = 'none';
              mailF.style.borderColor = '#ccc';
            } 

          

          data = JSON.parse(data);
          // console.log(data);

     });
  }                 





  var falseSubmit = document.getElementById('falseSubmit');


  falseSubmit.addEventListener('click', function(e){
    var reqFields = document.querySelectorAll('input[data-req]');
    console.log('1 step ok!');

    var iter = 0;
    for(var i = 0; i <= reqFields.length-1; i++){

      if(reqFields[i].value === ''){

        console.log('2 step break!');
        // console.log()
          setTimeout(function(){

            $('html').animate({
                scrollTop: $('input[data-req='+i+']').offset().top-200
            }, 100);
            
            reqFields[i].style.borderColor = "red";
            if(document.getElementById('err-field-'+i) === null){
              $( "<span id='err-field-"+i+"'' class='text-danger'>Заполните поле</span>" ).insertBefore( "input[data-req="+i+"]" );
            }


          }, 100);
          break;
          return false;
      }

      if(document.getElementById('err-field-'+i) != undefined){
        document.getElementById('err-field-'+i).remove();
      }
     
     iter++;
      // console.log('2 step ok!');
      reqFields[i].style.borderColor = "#ccc";
    }
    // console.log(reqFields.length);


      if(iter === reqFields.length){
        // console.log(document.getElementsByTagName('form')[1]);
        document.getElementsByTagName('form')[1].submit();
      }

  });


</script>