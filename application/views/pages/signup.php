<div class="fre-perfect-freelancer">
  <div class="fre-page-section">
    <div class="container">
      <div class="fre-authen-wrapper">
        <div class="fre-register-default">
          <h2>Зарегистрироваться</h2>
          <div class="fre-register-wrap">
            <div class="row">
              <div class="col-sm-6">
                <div class="register-employer">
                  <h3>Заказчик</h3>
                  <!--<p>Post projects, find qualified freelancers to hire.</p>-->
                  <br/>
                  <p> Введите свой email </p>
                                       <form method="post" action="<?php echo ci_site_url(); ?>user/send_temp_key">
         <div class="fre-input-field">
            <input type="email" required name="email" class="text-center" placeholder="Ваш email" >
            <input type="hidden" name="user_type" value="clients">
            <input type="hidden" name="action" value="client_register">
         </div>

         <button class="btn btn-bg success btn-block" type="submit">Продолжить регистрацию</button>
      </form>
                        <p><hr/></p>

                </div>
              </div>
              <div class="col-sm-6">
                <div class="register-freelancer">
                  <h3>Автор</h3>
                  <br/>
                 <!-- <p>Create professional profile and find freelance jobs to work.</p>--><p> Введите свой email </p>

      <form method="post" action="<?php echo ci_site_url(); ?>user/send_temp_key">
         <div class="fre-input-field">
            <input type="email" required id="email" name="email" class="text-center" placeholder="Ваш email" id="usr">
            <input type="hidden" name="user_type" value="writers">
            <input type="hidden" name="action" value="writer_register">
         </div>
  
         <button class="btn btn-bg btn-block" type="submit">Продолжить регистрацию</button> 
      </form>
                </div>
              </div>
            </div>
          </div>
          <div class="fre-authen-footer">


              </div>
        </div>
      </div>
    </div>
  </div>
</div>


