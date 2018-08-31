  <div class="fre-perfect-freelancer">
    <div class="fre-page-section">
      <div class="container">
        <div class="fre-authen-wrapper">
          <div class="fre-authen-register">
                            <h2>Регистрация для заказчика</h2>
                    <?php echo validation_errors(); ?>

    <form class="form-horizontal" method="POST" action="<?php echo ci_site_url(); ?>clients/client_register/<?php echo $temp_key; ?>">
    <div class="fre-input-field">
        <input type="email" name="email" class="form-control" value="<?php echo $email; ?>" placeholder="Введите свой email" required readonly>
    </div>

    <div class="fre-input-field">
        <input type="text" name="firstname" class="form-control" placeholder="Введите имя*" required>
    </div>

    <div class="fre-input-field">
        <input type="text" name="lastname" class="form-control" placeholder="Введите фамилию*" required>
    </div>

   <!-- <div class="fre-input-field">
        <select name='country' class="form-control" class="input_text" >
        <option value="USA"> USA </option>
    <?php // foreach ($students as $news_item) { ?>
    <option value="<?php // echo $news_item['CountryName']; ?>">
    <?php // echo $news_item['CountryName']; ?> [<?php // echo '+'.$news_item['Phonecode']; ?>]
    </option>
    <?php // } ?>
    </select>
    </div>-->

        <div class="fre-input-field">
        <input type="tel" id="telete" name="primaryphone" class="form-control" placeholder="Введите номер телефона*" required>
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

    <div class="fre-input-field">
        <input type="password" name="password" class="form-control" placeholder="Введите пароль*" required>
    </div>


    <div class="fre-input-field">
        <input type="password" name="cpassword" class="form-control" placeholder="Подтвердите пароль*" required>
    </div>

    <input type="submit"  class="btn btn-warning fullwidth" name="submit" value="Зарегистрироваться" />

</form>
            <p>Зарегистрировавшись, я принимаю условия и политику конфиденциальности <a href="#" rel="noopener noreferrer" target="_Blank"></a></p>            
            <div class="fre-authen-footer">
              <p>Уже есть аккаунт? <a href="<?php echo ci_site_url(); ?>user/login">Войти</a></p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>