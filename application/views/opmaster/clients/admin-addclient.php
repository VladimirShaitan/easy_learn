        <div class='panel panel-default  col-lg-9'>
          <div class='panel-heading'>
            <i class='fa fa-beer fa fa-large'></i>
Добавить заказчика
            <div class='panel-tools'>
              <div class='btn-group'>
                <a class='btn' href='#'>
                  <i class='icon-refresh'></i>

                </a>
                <a class='btn' data-toggle='toolbar-tooltip' href='#' title='Toggle'>
                  <i class='icon-chevron-down'></i>
                </a>
              </div>
            </div>
          </div>
          <div class='panel-body'>


      <div class="container-fluid main-content">
        <div class="row">
          <!-- Weather -->
          <div class="col-md-12">
            <div class="widget-container fluid-height">
              <div class="widget-content padded">
           <div class="heading">
                <i class="fa fa-signal"></i>Новый заказчик<i class="fa fa-list pull-right"></i><i class="fa fa-refresh pull-right"></i>
              </div>
<hr/>
<?php echo form_open('Adminclients/new_client'); ?>
      <div class="widget-content padded">
        <form action="#" class="form-horizontal">
          <div class="form-group">
            <label class="control-label col-md-3 text-right">Email заказчика</label>
            <div class="col-md-7">
              <input class="form-control" placeholder="Email" name="email" type="text">
            </div>
          </div>          
          <div class="form-group">
            <label class="control-label col-md-3 text-right">Имя</label>
            <div class="col-md-7">
              <input class="form-control" name="firstname"  placeholder="Enter First Name" placeholder="Имя" name="email" type="text">
            </div>
          </div>          
          <div class="form-group">
            <label class="control-label col-md-3 text-right">Фамилия</label>
            <div class="col-md-7">
              <input class="form-control" name="lastname" placeholder="Enter Last Name" placeholder="Фамилия" name="email" type="text">
            </div>
          </div>

          <!--<div class="form-group">
            <label class="control-label col-md-3 text-right">Country</label>
            <div class="col-md-7">
              <select class="form-control" name='country'>
               <option value="USA"> USA </option>
    <?php foreach ($students as $news_item) { ?>
    <option value="<?php echo $news_item['CountryName']; ?>">
    <?php echo $news_item['CountryName']; ?>
    </option>
    <?php } 
    ?>
              </select>
            </div>
          </div>-->

          <div class="form-group">
            <label class="control-label col-md-3 text-right">Пароль</label>
            <div class="col-md-7">
              <input class="form-control" name="password" placeholder="Enter Last Name" placeholder="Введите пароль" name="email" type="password">
            </div>
          </div>


          <div class="form-group">
            <label class="control-label col-md-3 text-right">Подтверждение пароля</label>
            <div class="col-md-7">
              <input class="form-control" name="cpassword" placeholder="Enter Last Name" placeholder="Введите пароль еще раз" name="email" type="password">
            </div>
          </div>

          <div class="form-group">
            <label class="control-label col-md-3 text-right"></label>
            <div class="col-md-7">
                  <input type="submit"  class="btn btn-primary" name="submit" value="Создание нового заказчика" />
            </div>
          </div>
        </form>
      </div>

              </div>
            </div>
          </div>

        </div>
        </div>

        </div>
        </div>
      </div>
    </div>
    <!-- Footer -->
    <!-- Javascripts -->
    <!-- <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js" type="text/javascript"></script><script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js" type="text/javascript"></script>
 -->
    <script src="http://cdnjs.cloudflare.com/ajax/libs/modernizr/2.6.2/modernizr.min.js" type="text/javascript"></script><script src="http://lab2023.github.io/hierapolis/assets/javascripts/application-985b892b.js" type="text/javascript"></script>
    <!-- Google Analytics -->
  </body>
</html>
