    <!--Modal box-->
    <div class="" id="login" role="dialog">
      <div class="modal-dialog">
      
        <!-- Modal content no 1-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title text-center form-title">Проверьте почту</h4>
          </div>
          <div class="modal-body padtrbl">

            <div class="login-box-body">

              <div class="form-group">
                <style>
.padtrbl {
    height: 93px !important;
}
</style>
<?php
if (!empty($verifyemail)){ ?>
  <p> Здравствуйте, <?php echo $firstname; ?>, у Вас уже есть аккаунт. Войдите, чтобы продолжить.</p>
  <a class="btn btn-info center-block fullwidth"  href="<?php echo ci_site_url(); ?>user/login">Вход</a>
<?php } ?>


<?php if (empty($verifyemail)){ ?>
  <p> Мы отправили Вам email, пожалуйста, проверьте Ваш ящик (включая спам) и перейдите, чтобы завершить регистрацию. </p>
  <div class="form-group">
  <a class="btn btn-info center-block fullwidth" href="<?php echo ci_site_url(); ?>user/login">Вход</a>
  </div>
<?php } ?>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
    <!--/ Modal box-->