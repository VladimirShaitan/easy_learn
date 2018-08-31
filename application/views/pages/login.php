    <div class="fre-perfect-freelancer">
        <div class="fre-page-section">
            <div class="container">
                <div class="fre-authen-wrapper">
                    <div class="fre-authen-login">
                      <div class="alert-danger"><?php echo validation_errors(); ?></div>
                        <h2>Авторизация</h2>
                        <form role="form" method="post" id="signin_form" class="" action="<?php echo ci_site_url(); ?>user/signin">
                            <div id="error" class="text-center text-danger" style="display: none"><b>Неверный логин или пароль</b></div>
                            <div class="fre-input-field">
                                <input type="text" name="email" required placeholder="Ваш email">
                            </div>
                            <div class="fre-input-field">
                                <input type="password" required name="password"
                                       placeholder="Ваш пароль">
                            </div>
                            <div class="fre-input-field">
                                <button type="submit" class="btn-submit fre-submit-btn">Войти</button>
                            </div>

                        </form>

                        <div class="fre-authen-footer">
                                <div class="not-yet-register">
                                    <a href="<?php echo ci_site_url(); ?>home/signup"
                                       class="">Регистрация</a>
                                </div>
                                          <div class="forgot-password">
                                <a href="<?php echo ci_site_url(); ?>user/password_reset"
                                   class="">Забыли пароль?</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        if (window.location.href.indexOf("#wrong") > -1) {
            document.getElementById('error').style.display = 'block';
        }
    </script>
