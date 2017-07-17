<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>TickTock Admin</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/theme/bootstrap/css/bootstrap.min.css">

  <!-- Jquery UI -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/theme/dist/css/jquery-ui.min.css">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/theme/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/theme/dist/css/skins/_all-skins.min.css">

  <!-- iCheck CSS -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/theme/plugins/iCheck/square/blue.css">
  <!-- WYSIHTML5 Editor -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/theme/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
  <!-- Toastr Message -->
  <link href="<?php echo base_url();?>assets/theme/plugins/toastr/toastr.css" rel="stylesheet">

  <!-- Backend specific -->
  <link href="<?php echo base_url();?>assets/theme/dist/css/backend.css" rel="stylesheet">

  <link href="<?php echo base_url();?>assets/theme/dist/css/jquery-ui-timepicker-addon.css" rel="stylesheet">

  <script type="text/javascript">
        var base_url = '<?php echo base_url();?>';
    </script>

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body class="hold-transition skin-blue sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="<?php echo base_url(); ?>admin" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini">TT</span>
      <!-- logo for regular state and mobile devices -->
      TickTock Admin
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="<?php echo (!empty($loggedUser['photo'])) ? $loggedUser['photo'] : base_url().'assets/theme/dist/img/avatar_na.png';?>" class="user-image" alt="User Image">
              <span class="hidden-xs"><?php echo $loggedUser['fullName']; ?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="<?php echo (!empty($loggedUser['photo'])) ? $loggedUser['photo'] : base_url().'assets/theme/dist/img/avatar_na.png';?>" class="img-circle" alt="User Image">

                <p>
                  <?php echo $loggedUser['fullName'];?>
                  <small>Member since <?php echo date('M, Y', strtotime($loggedUser['createdOn']));?></small>
                </p>
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="<?php echo base_url('settings') ?>" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="<?php echo base_url('auth/logout') ?>" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>
  </header>

  <!-- =============================================== -->

  <!-- Left side column. contains the sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?php echo (!empty($loggedUser['photo'])) ? $loggedUser['photo'] : base_url().'assets/theme/dist/img/avatar_na.png';?>" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo $loggedUser['fullName'];?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>

      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header">MAIN NAVIGATION</li>
        <?php if (!empty($sidebarLinks)) {
    $activeLinkAlias = (isset($activeLinksAlias) && !empty($activeLinksAlias)) ? $activeLinksAlias : array();
    foreach ($sidebarLinks as $mainLink) {
        $linkName = $mainLink['link_name'];
        $linkHref = $mainLink['anchor_href'];
        $icon = $mainLink['link_icon'];
        $alias = $mainLink['link_alias'];
        $subMenus = $mainLink['sub'];
        $class = (in_array($alias, $activeLinkAlias)) ? 'active' : null;
        $subMenuVisible = (!empty($class)) ? 'menu-open' : '';
        if (!empty($subMenus)) {
            $class .= ' treeview';
        }
        ?>
        <li class="<?php echo $class;
        ?>">
            <a href="<?php echo $linkHref;
        ?>">
                <i class="<?php echo $icon;
        ?> icon-sidebar"></i>
                <?php if (!empty($subMenus)) {
    ?>
                    <i class="fa fa-angle-left pull-right"></i>
                <?php
}
        ?>
                <?php echo $linkName;
        ?>
            </a>
            <?php if (!empty($subMenus)) {
    ?>
                <ul class="treeview-menu <?php echo $subMenuVisible;
    ?>">
                    <?php foreach ($subMenus as $subMenu) {
    $linkName = $subMenu['link_name'];
    $linkHref = $subMenu['anchor_href'];
    $alias = $subMenu['link_alias'];
    $class = (in_array($alias, $activeLinkAlias)) ? 'active' : 'NULL';
    ?>
                    <li class="<?php echo $class;
    ?>">
                        <a href="<?php echo $linkHref;
    ?>"><i class="fa fa-circle-o"></i> <?php echo $linkName;
    ?></a>
                    </li>
                    <?php
}
    ?>
                </ul>
            <?php
}
        ?>
        </li>
        <?php
    }
}?>
    </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <?php echo $pageHeading;?>
        <small><?php echo $pageSubHeading;?></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url('admin/dashboard');?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <?php if (!empty($breadCrumbs)) {
    $toEnd = count($breadCrumbs);
    foreach ($breadCrumbs as $bd => $url) {
        $url = (!empty($url)) ? $url : 'javascript:void(0);';
        if (0 === --$toEnd) {
            echo '<li class="active">'.$bd.'</li>';
        } else {
            echo '<li><a href="'.$url.'">'.$bd.'</a></li>';
        }
    }
}?>
      </ol>
        <br/>
        <?php
            if ($this->session->flashdata('messages')) {
                foreach ($this->session->flashdata('messages') as $message) {
                    $msgArray = explode('@#@', $message);
                    echo '<div class="alert alert-'.$msgArray[0].'">
                        <button aria-hidden="true" class="close" type="button">×</button>
                        '.$msgArray[1].'
                    </div>';
                }
            } elseif (isset($errorMessage) && !empty($errorMessage)) {
                echo '<div class="alert alert-'.$errorMessage['class'].'">
                            <button aria-hidden="true" class="close" type="button">×</button>
                            '.$errorMessage['errors'].'
                            </div>';
            }
            ?>
            <div class="alert alert-success hide">
                <button aria-hidden="true" class="close" type="button">×</button>
                <span></span>
            </div>
            <div class="alert alert-danger hide">
                <button aria-hidden="true" class="close" type="button">×</button>
                <span></span>
            </div>
            <div class="alert alert-warning hide">
                <button aria-hidden="true" class="close" type="button">×</button>
                <span></span>
            </div>
            <div class="alert alert-info hide">
                <button aria-hidden="true" class="close" type="button">×</button>
                <span></span>
            </div>
    </section>

    <!-- Main content -->
    <section class="content">
        <?php echo isset($content) ? $content : null;?>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 1.0.0
    </div>
      <strong><?php echo $settings['admin_copyright_text'] ?></strong>
  </footer>
  <!-- Modal -->
    <div class="modal fade" tabindex="-1" id="bjmodal" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content modal-no-shadow modal-no-border"></div>
        </div>
    </div>
</div>
<!-- ./wrapper -->

<!-- jQuery 2.2.0 -->
<script src="<?php echo base_url(); ?>assets/theme/plugins/jQuery/jQuery-2.2.0.min.js"></script>
<script src="<?php echo base_url(); ?>assets/theme/plugins/jQueryUI/jquery-ui.min.js"></script>

<!-- Bootstrap 3.3.6 -->
<script src="<?php echo base_url(); ?>assets/theme/bootstrap/js/bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="<?php echo base_url(); ?>assets/theme/plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?php echo base_url(); ?>assets/theme/plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url(); ?>assets/theme/dist/js/app.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url(); ?>assets/theme/dist/js/demo.js"></script>
<!-- iCheck -->
<script src="<?php echo base_url();?>assets/theme/plugins/iCheck/icheck.min.js"></script>
<!-- Tostr Messages -->
<script src="<?php echo base_url();?>assets/theme/plugins/toastr/toastr.js"></script>

<!-- Bootstrap WYSIHTML5 -->
<script src="<?php echo base_url();?>assets/theme/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>

<!-- Ajax -->
<script src="<?php echo base_url();?>assets/theme/plugins/jQuery/jquery.form.min.js"></script>
<script src="<?php echo base_url();?>assets/theme/plugins/ajax/eldarion-ajax-core.js" charset="utf-8"></script>
<script src="<?php echo base_url();?>assets/theme/plugins/ajax/eldarion-ajax-handlers.js"></script>
<script src="<?php echo base_url();?>assets/theme/plugins/ajax/polyfills.js"></script>

<!-- Bootbox -->
<script src="<?php echo base_url();?>assets/theme/plugins/bootbox/bootbox.min.js"></script>

<!-- Validation.io JS -->
<script src="<?php echo base_url();?>assets/theme/plugins/validation/formValidation.min.js"></script>
<script src="<?php echo base_url();?>assets/theme/plugins/validation/bootstrap.min.js"></script>

<!-- Backend CSS -->
<script src="<?php echo base_url();?>assets/theme/dist/js/backend.js"></script>
<script src="<?php echo base_url();?>assets/theme/dist/js/jquery-ui-timepicker-addon.js"></script>
</body>
</html>
