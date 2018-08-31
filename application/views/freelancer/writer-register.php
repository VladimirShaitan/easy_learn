  
<style>
    .checkbox-inline {
      word-break: break-all;
    }
    .fre-authen-register {
      width: 75%;
    }
    .cus_ch{
      min-height: 100px;
      max-height: 100px;
      font-size: 16px;
      padding: 5px;
      border: 1px solid #ccc;
      text-align: center;
      margin: 0
    }
    .cus_ch input[type="checkbox"] {
      width: 100%;
    }
    .checkboxarea{
      height: 300px;
      overflow-y: scroll;
      padding: 0 15px 0 15px;
    }
</style> 

  <div class="fre-perfect-freelancer">
    <div class="fre-page-section">
      <div class="container">
        <div class="fre-authen-wrapper">
          <div class="fre-authen-register">
            <h2>Регистрация для автора</h2>
             <?php echo validation_errors(); ?>

<form class="form-horizontal" method="POST" action="<?php echo ci_site_url(); ?>writers/writer_register/<?php echo $temp_key; ?>">

<!-- Inputs -->
<div class="clearfix">
    <div class="fre-input-field  col-sm-6">
        <input type="text" name="firstname" class="form-control" placeholder="Введите имя*" required />
    </div>

    <div class="fre-input-field  col-sm-6">
        <input type="text" name="lastname" class="form-control" placeholder="Введите фамилию*" required />
    </div>

    <div class="fre-input-field col-sm-6">
        <input type="password" name="password" class="form-control" placeholder="Введите пароль*" required />
    </div>
    <div class="fre-input-field col-sm-6">
        <input type="email" name="email" value="<?php echo $email; ?>" class="form-control" placeholder="Ваш email" required readonly />
    </div>

    <div class="fre-input-field col-sm-6">
        <input type="password" name="cpassword" class="form-control" placeholder="Подтвердите пароль*" required />
     </div>

 <div class="fre-input-field hidden">
     <input type="checkbox" name="citation[]"  id="citation" value="MLA" checked /> MLA 
     
    </div>



    <div class="fre-input-field col-sm-6">
        <input type="text" name="primaryphone" id="telete" class="primaryphone" placeholder="Введите телефон*" required />
        </div>
<script type="text/javascript">
(function(){
  let tt = document.getElementById('telete');
  tt.addEventListener('blur', doTel);
  let numbs = ['0', '1', '2', '3', '4', '5', '6', '7', '8', '9', '(', ')', '+', '-'];
 
  function doTel(){
    let trueNumb = '';
    for(let i = 0; i < tt.value.length; i++){
        if(numbs.includes(tt.value[i])){
          trueNumb += tt.value[i].toString();
        }
    }
        tt.value = trueNumb;
  }

})()



</script>        
  <div class="fre-input-field col-sm-12">
  <div id="card_ers"></div>
    <input type="text" name="nativelanguage" class="form-control text-center" id="card" placeholder="Реквизиты для оплаты(номер счета банковской карты)*" required />
  </div>
</div>


<!-- Inputs -->

<!-- Генерация checkbox    -->
    <div class="fre-input-field">
     <div id="mes"></div>
      <div id="ch_b" class="checkboxarea clearfix">
        <?php foreach ($subject as $subject) { ?>
          <label class="cus_ch col-sm-4">
            <input name="subject[]" type="checkbox" value="<?php echo $subject['subject']; ?>" /><?php echo $subject['subject']; ?>
          </label>
        <?php } ?> 
      </div>
    </div>
<!-- Генерация checkbox    -->


    <div class="fre-input-field">
          <textarea name="text" div="bio" class="form-control" placeholder="Коротко о себе"></textarea>

    </div>
 <div id="mes2"><p style="color: red">Выберите предмет*</p></div>
 <div id="register_btn" style="display: none">
  <label for="cond_reg">
      <input type="checkbox" disabled name="check" id="cond_reg">
     Я ознакомлен(а) с <a target="_blank" href="https://legko-v-uchebe.com/usloviya/">условиями сотрудничества</a>
  </label>

    <input type="submit" id="reg_btn"  class="btn btn-warning fullwidth" disabled name="submit" value="Зарегистрироваться" />
            <p>Зарегистрировавшись, я принимаю условия и политику конфиденциальности</p>
 </div>  
 <div id="reg_err_card" class="text-center" style="font-size: 17px;background: #d9534f;color: white;padding: 15px;margin-bottom: 10px;">
   Для завершения регистрации необходимо указать правильный номер карты 
 </div> 

</form>
            
            <div class="fre-authen-footer">
              <p>Уже есть аккаунт? <a href="<?php echo ci_site_url(); ?>user/login">Войти</a></p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>


    
<script LANGUAGE="javascript">
(function(){    
var iter = 0;
var wr_ch = document.getElementById('ch_b');
var ev_tar_arr = [];
let a = document.getElementById('cond_reg');
let b = document.getElementById('reg_btn');
let labels = document.getElementsByClassName('cus_ch');
let mes = document.getElementById('mes');
let mes2 = document.getElementById('mes2');
$(document).ready(function () {

     $("input[id='subject']").change(function () {
        var maxAllowed = 10;
        var cnt = $("input[id='subject']:checked").length;
        if (cnt > maxAllowed) {
           $(this).prop("checked", "");
           alert('Maximum allowed are ' + maxAllowed + ' subjects!');
       }
    });


$('#card').mask('0000-0000-0000-0000')

  });

document.getElementById('cond_reg').onclick = () => {

  if(a.checked != true || iter === 0){
    b.setAttribute('disabled', 'disabled');
  } else {
     b.removeAttribute('disabled');
  }
}


    
 wr_ch.addEventListener('change', function(event){
    
     if(event.target.checked === true ){
        iter++;       
     } else{
        iter--;
     }
     
     if(iter === 0 ){ 
         a.setAttribute('checked', 'false');
         a.setAttribute('disabled', 'disabled');
         b.setAttribute('disabled', 'disabled');
         for(let i = 0; i <= labels.length-1; i++){
             labels[i].style.borderColor = 'red';
         }
         mes.innerHTML='<p style="color: red">Выберите предмет*</p>';
         mes2.innerHTML='<p style="color: red">Выберите предмет*</p>';
         
     } else if(iter > 0){
         a.removeAttribute('disabled');
        for(let i = 0; i <= labels.length-1; i++){
             labels[i].style.borderColor = '#ccc';
         }
         mes.innerHTML='';
         mes2.innerHTML='';
         if(a.checked === true){

              b.removeAttribute('disabled');

         }
     }
        console.log(iter);
 })   
    
})();
</script> 
<script>
function checkCard(){ 
    var cardErs = document.getElementById('card_ers');
    var card = document.getElementById('card');
    var register_btn = document.getElementById('register_btn');
    var reg_err_card = document.getElementById('reg_err_card');
      $('#card').on('focusout',
      function(){
           if(card.value.length === 19){
              register_btn.style.display = 'none';
              reg_err_card.style.display = 'block';
              var ser = 'nativelanguage='+card.value;
              cardErs.innerHTML = 'Идет проверка карты, подождите пожалуйста';
              cardErs.className = 'text-danger';
              card.setAttribute('disabled', 'disabled');

               $.post('<?php echo ci_site_url(); ?>Writers/check_card', ser) 
                 .done(function(data){

                  data = JSON.parse(data);
                  console.log(data);
                  if(data > 0){
                    cardErs.innerHTML = 'Пользователь с такой картой уже зарегистрирован';
                    cardErs.className = 'text-danger';
                    card.removeAttribute('disabled');
                    register_btn.style.display = 'none';
                    reg_err_card.style.display = 'block';
                    // card.value = '';
                  } else {
                    cardErs.className = 'text-success';
                    cardErs.innerHTML = 'Проверка карты прошла успешно, можете продолжить регистрацию';
                    card.removeAttribute('disabled');
                    register_btn.style.display = 'block';
                    reg_err_card.style.display = 'none';
                  }

               });

          } else {
            card.value = '';
            cardErs.innerHTML = 'Неправильный номер карты';
            cardErs.className = 'text-danger';
            register_btn.style.display = 'none';
            reg_err_card.style.display = 'block';
          }



      });

    $('#card').on('focus',
      function(){
        cardErs.innerHTML = '';
      })

}
checkCard();
</script>