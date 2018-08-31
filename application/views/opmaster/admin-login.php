<!DOCTYPE html>
<html class='no-js' lang='en'>
  <head>
    <meta charset='utf-8'>
    <meta content='IE=edge,chrome=1' http-equiv='X-UA-Compatible'>
    <title>Sign in</title>
    <meta content='lab2023' name='author'>
    <meta content='' name='description'>
    <meta content='' name='keywords'>
     <link href="<?php echo base_url()?>adminassets/assets/stylesheets/application.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url()?>adminassets/assets/stylesheets/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <script src="<?php echo base_url()?>admin-assets/javascripts/bootstrap.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url()?>admin-assets/dropzonejs/dropzonejs.js" type="text/javascript"></script>
    <script src="<?php echo base_url()?>admin-assets/ckeditor/ckeditor.js"></script>

    
  </head>
  <body class='login'>
    <div class='wrapper'>
      <div class='row'>
        <div class='col-lg-12'>
          <div class='brand text-center'>
            <h1>
              Dashboard
            </h1>
          </div>
        </div>
      </div>
      <div class='row'>
        <div class='col-lg-12'>
         <form action="<?php echo ci_site_url(); ?>opadmin/signin" method="post">
        <div class="form-group">
          <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
            <input class="form-control" name="email" placeholder="Admin Email" type="text">
          </div>
        </div>
        <div class="form-group">
          <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-lock"></i></span>
            <input class="form-control" name="password" placeholder="password" type="password">
          </div>
        </div>
        <a class="pull-right" href="<?php echo ci_site_url(); ?>user/password_reset">Forgot password?</a>
        <input class="btn btn-lg btn-primary btn-block" type="submit" value="Log in">

      </form>
        </div>
      </div>
    </div>
    <!-- Footer -->
    <!-- Javascripts -->
<!--     <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js" type="text/javascript"></script><script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js" type="text/javascript"></script> -->

    <script src="http://cdnjs.cloudflare.com/ajax/libs/modernizr/2.6.2/modernizr.min.js" type="text/javascript"></script><script src="http://lab2023.github.io/hierapolis/assets/javascripts/application-985b892b.js" type="text/javascript"></script>
    <!-- Google Analytics -->
    <script>
      var _gaq=[['_setAccount','UA-XXXXX-X'],['_trackPageview']];
      (function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
      g.src=('https:'==location.protocol?'//ssl':'//www')+'.google-analytics.com/ga.js';
      s.parentNode.insertBefore(g,s)}(document,'script'));
    </script>
  </body>
</html>
