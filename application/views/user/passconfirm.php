    <div class="fre-perfect-freelancer">
        <div class="fre-page-section">
            <div class="container">
                <div class="fre-authen-wrapper">
                    <div class="fre-authen-login">
                      <div class="alert-danger"><?php echo validation_errors(); ?></div>
                        <h2>Сброс пароля</h2>
<?php
if ($verifyemail){ ?>
  <p> Здравствуйте, <?php echo $firstname; ?>, мы отправили Вам email. Пожалуйста, проверьте Ваш ящик(включая спам). Вы увидите ссылку для сброса пароля<p>
  <a class="btn btn-info center-block fullwidth"  href="<?php echo ci_site_url(); ?>/user/login">Войти</a>
<?php } ?>


<?php if (!$verifyemail){ ?>
  <p> Конечно, мы проверяли наши записи повсюду, но похоже, что это письмо не найдено. Зарегистрируйтесь</p>
  <div class="form-group">
  <a class="btn btn-info center-block fullwidth" href="<?php echo ci_site_url(); ?>/Home/signup">Зарегистрироваться</a>
  </div>
<?php } ?>
                        <div class="fre-authen-footer">
                                              <div class="not-yet-register">
                                    <a href="<?php echo ci_site_url(); ?>home/signup"
                                       class=""></a>
                                </div>
                                          <div class="forgot-password">
                                <a href="<?php echo ci_site_url(); ?>user/password_reset"
                                   class=""></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

