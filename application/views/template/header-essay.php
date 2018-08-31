<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $sitetitle; ?></title>
    <meta name="description" content="Academic Writing">
    <meta name="keywords" content="free website templates, free bootstrap themes, free template, free bootstrap, free website template">
    
   <link rel="stylesheet" type="text/css" href="<?=base_url()?>opasset/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>opasset/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>opasset/css/style.css">
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>opasset/css/styles.css">
    <link type="text/css" rel="stylesheet" media="all" href="<?=base_url()?>css/chat.css" />
    <link type="text/css" rel="stylesheet" media="all" href="<?=base_url()?>css/screen.css" />

<script type="text/javascript" src="<?=base_url()?>opasset/js/jquery.min.js"></script>
<script type="text/javascript" src="<?=base_url()?>opasset/js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?=base_url()?>opasset/js/opcustom.js"></script>

<script type="text/javascript" src="<?=base_url()?>opasset/dropzonejs/dropzonejs.js"></script>
<script type="text/javascript" src="<?=base_url()?>opasset/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="<?=base_url()?>opasset/css/jquery.dataTables.min.css"></script>

<script src="<?php echo base_url()?>opasset/ckeditor/ckeditor.js"></script>
<script type="text/javascript" src="<?=base_url()?>opasset/js/modernizr.custom.js"></script>
<script type="text/javascript" src="<?=base_url()?>opasset/js/appengine.js"></script>
<script type="text/javascript" src="<?=base_url()?>opasset/js/chosen.js"></script>
  </head>


<body class="home page-template page-template-page-home-new page-template-page-home-new-php page page-id-1617 two-column right-sidebar">
<!-- <div class="fre-wrapper"> -->
<header class="fre-header-wrapper">
    <div class="fre-header-wrap">
        <div class="container">
            <div class="fre-site-logo">
                <a href="<?php echo ci_site_url(); ?>">
          <img alt="Opskill" src="">                </a>
                <div class="fre-hamburger">
                              <span class="hamburger-menu">
                            <div class="hamburger hamburger--elastic" tabindex="0" aria-label="Menu" role="button" aria-controls="navigation">
                                <div class="hamburger-box">
                                    <div class="hamburger-inner"></div>
                                </div>
                            </div>
                        </span>
                </div>
            </div>
                  <div class="fre-search-wrap">
        
                <form class="fre-form-search" action="<?php echo ci_site_url(); ?>essay/sprep" method="post">
                    <div class="fre-search dropdown">
                            <span class="fre-search-dropdown-btn dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-search" aria-hidden="true"></i>
                                <i class="fa fa-caret-down" aria-hidden="true"></i>
                            </span>
                        <input class="fre-search-field" name="search" value="" type="text" placeholder="Find projects">
                        <ul class="dropdown-menu fre-search-dropdown">
                            <li><a class="active" data-type="profile" data-action="<?php echo ci_site_url(); ?>skills/topwriters">Find Freelancers</a>
                            </li>
                            <li><a class="" data-type="project" data-action="<?php echo ci_site_url(); ?>work/latest_orders">Find Projects</a>
                            </li>
                        </ul>
                    </div>
                </form>
            </div>
                  <div class="fre-menu-top">
                <ul class="fre-menu-main">
                    <!-- Menu freelancer -->
                                  <li class="fre-menu-freelancer dropdown">
                            <a>FREELANCERS<i class="fa fa-caret-down" aria-hidden="true"></i></a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a href="<?php echo ci_site_url(); ?>work/assignments">Find Projects</a>
                                </li>
                                                    <li>
                                        <a href="#">Create Profile</a>
                                    </li>
                                            </ul>
                        </li>
                        <li class="fre-menu-employer dropdown">
                            <a>EMPLOYERS<i class="fa fa-caret-down" aria-hidden="true"></i></a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a href="<?php echo ci_site_url(); ?>project/create">Post a Project</a>
                                </li>
                                <li>
                                    <a href="<?php echo ci_site_url(); ?>skills/topwriters">Find Freelancers</a>
                                </li>
                            </ul>
                        </li>
                              <!-- Main Menu -->
                                  <li class="fre-menu-page dropdown">
                            <a>PAGES<i class="fa fa-caret-down" aria-hidden="true"></i></a>
              <ul id="menu-header-menu" class="dropdown-menu">
                <li id="menu-item-1657" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1657"><a href="<?php echo ci_site_url(); ?>home/howitworks">How it Works</a>
                </li>
</ul>                        </li>
                              <!-- Main Menu -->
                </ul>
            </div>


<?php if (!$this->session->userdata('writer_id')): ?>
                      <div class="fre-account-wrap">
                    <div class="fre-login-wrap">
                        <ul class="fre-login">
                            <li>
                                <a href="<?php echo ci_site_url(); ?>user/login">LOGIN</a>
                            </li>
                                              <li>
                                    <a href="<?php echo ci_site_url(); ?>home/signup">SIGN UP</a>
                                </li>
                                      </ul>
                    </div>
                </div>
<?php endif; ?>
<?php if ($this->session->userdata('writer_id')): ?>
<div class="fre-account-wrap dropdown">
                    <div class="fre-account dropdown">
                        <div class="fre-account-info dropdown-toggle" data-toggle="dropdown">
              <img alt='' src='https://secure.gravatar.com/avatar/ac7e1f789c74d8d3395813548a099125?s=96&amp;d=mm&amp;r=G' class='avatar avatar-96 photo avatar-default' height='96' width='96' />

    <span><?php echo $this->session->userdata('firstname'); ?> <?php echo $this->session->userdata('lastname'); ?></span>
                            <i class="fa fa-caret-down" aria-hidden="true"></i>
                        </div>
                        <ul class="dropdown-menu">
            <li><a href="<?php echo ci_site_url(); ?>user/myprofile">MY PROFILE</a></li>
            <li><a href="<?php echo ci_site_url(); ?>user/logout">LOG OUT</a></li>
 
                        </ul>
                    </div>
                </div>

<?php endif; ?>
              </div>
    </div>
</header>