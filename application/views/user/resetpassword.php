<div class="fre-perfect-freelancer">
   <div class="fre-page-section">
      <div class="container">
         <div class="fre-authen-wrapper">
            <div class="fre-authen-lost-pass">
               <h2>Сбросить пароль</h2>
               <p>Введите адрес вашей электронной почты ниже. Мы найдем Вашу учетную запись и отправим Вам электронное письмо с подтверждением пароля.</p>
               <form role="form" action="<?php echo ci_site_url(); ?>user/sendpassword" method="POST"class="auth-form forgot_form">
                  <!-- <ul class="fre-validate-error">
                     <li>Email exists</li>
                  </ul> -->
                  <div class="fre-input-field">
                     <input type="text" id="email" name="email" placeholder="Введите email">
                     <!-- <div class="message">This field is required.</div> -->
                  </div>
                  <div class="fre-input-field">
                     <button class="fre-submit-btn btn-submit">Сбросить пароль</button>
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