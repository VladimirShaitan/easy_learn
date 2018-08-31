
<?php foreach ($newpassword as $newpassword): ?>
   <?php $newpassword['email']; ?>
    <?php endforeach; ?>
<style>
  .modal-body {
    padding: 30px 40px 40px;
    height: 250px;
}
</style>

    <!--Modal box-->
    <div class="" id="login" role="dialog">
      <div class="modal-dialog">
      
        <!-- Modal content no 1-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title text-center form-title">Введите новый пароль</h4>
          </div>
          <div class="modal-body padtrbl">

            <div class="login-box-body">

              <div class="form-group">
      <form method="post" action="<?php echo ci_site_url(); ?>user/passwordupdate">
         <div class="form-group">
            <input type="password" id="password" name="password" class="form-control text-center" placeholder="Новый пароль">
         </div>
         <div class="form-group">
            <input type="password" name="passwordc" class="form-control text-center" placeholder="Подтвердите пароль">
            <input type="hidden" name="email" class="form-control text-center" placeholder="Подтвердите пароль" value="<?php echo $newpassword['email']; ?>">
         </div>
         <button class="btn btn-info center-block fullwidth" type="submit">Обновить пароль</button>
      </form>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
    <!--/ Modal box-->