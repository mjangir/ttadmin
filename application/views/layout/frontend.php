<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="<?php echo (isset($metaDescription) && !empty($metaDescription)) ? $metaDescription : $settings['homepage_meta_description'];?>">
    <meta name="keywords" content="<?php echo (isset($metaKeywords) && !empty($metaKeywords)) ? $metaKeywords : $settings['homepage_meta_keywords'];?>">
    <meta name="author" content="Manish Jangir">

    <title><?php echo (isset($metaTitle) && !empty($metaTitle)) ? $metaTitle : $settings['homepage_meta_title'];?></title>

    <!-- Bootstrap Core CSS -->
    <link href="<?php echo base_url();?>assets/theme/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?php echo base_url();?>assets/theme/bootstrap/css/heroic-features.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/theme/dist/css/frontend.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/theme/plugins/iCheck/square/blue.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/theme/dist/css/AdminLTE.min.css">

    <!-- Validation CSS -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/theme/dist/css/validation/formValidation.min.css">

</head>

<body>

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top navbar-custom" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?php echo base_url('/'); ?>">TickTock</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <?php if (!empty($mainNavLinks)) {
    ?>
                    <ul class="nav navbar-nav">
                        <?php foreach ($mainNavLinks as $link) {
    echo '<li><a href="'.$link['anchor_href'].'">'.$link['link_name'].'</a></li>';
}
    ?>
                    </ul>
                <?php
} ?>
                <?php if (!empty($loggedUser)) {
    ?>
                    <ul class="nav navbar-nav pull-right">
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Welcome <?php echo $loggedUser['fullName'];
    ?></a>
                            <ul class="dropdown-menu pull-right">
                                <li><a href="<?php echo base_url('settings');
    ?>">My Profile</a></li>
                                <li><a href="<?php echo base_url('auth/logout');
    ?>">Logout</a></li>
                            </ul>
                        </li>
                        <?php if ($loggedUser['userGroupId'] == ADMIN_GROUP_ID) {
    ?>
                        <li><a href="<?php echo base_url('admin');
    ?>">Go To Admin</a></li>
                        <?php
}
    ?>
                    </ul>
                <?php
} else {
    ?>
                    <ul class="nav navbar-nav pull-right">
                        <li><a href="<?php echo base_url('auth/login');
    ?>">Login</a></li>
                        <li><a href="<?php echo base_url('auth/register');
    ?>">Register</a></li>
                    </ul>
                <?php
} ?>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav><!-- Page Content -->
    <div class="container">
        <?php
        if ($this->session->flashdata('messages')) {
            foreach ($this->session->flashdata('messages') as $message) {
                $msgArray = explode('@#@', $message);
                echo '<div class="alert alert-'.$msgArray[0].'">
                    <button aria-hidden="true" class="close" type="button">×</button>
                    '.$msgArray[1].'
                </div>';
            }
        }

        if (isset($errors)) {
            foreach ($errors as $error) {
                echo '<div class="alert alert-danger">
                    <button aria-hidden="true" class="close" type="button">×</button>
                    '.$error.'
                </div>';
            }
        }
        ?>
        <?php echo isset($content) ? $content : null;?>
        <hr>
        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-5">
                    <p><?php echo $settings['frontend_copyright_text']; ?></p>
                </div>
                <div class="col-lg-7 text-right">
                    <?php if (!empty($footerLinks)) {
    foreach ($footerLinks as $link) {
        echo '<a href="'.$link['anchor_href'].'">'.$link['link_name'].'</a>&nbsp;|&nbsp;';
    }
} ?>
                </div>
            </div>
        </footer>
    </div>
    <!-- /.container -->

    <script src="<?php echo base_url();?>assets/theme/plugins/jQuery/jQuery-2.2.0.min.js"></script>
    <script src="<?php echo base_url();?>assets/theme/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url();?>assets/theme/plugins/iCheck/icheck.min.js"></script>

    <!-- Validation.io JS -->
    <script src="<?php echo base_url();?>assets/theme/plugins/validation/formValidation.min.js"></script>
    <script src="<?php echo base_url();?>assets/theme/plugins/validation/bootstrap.min.js"></script>

    <!-- Frontend CSS -->
    <script src="<?php echo base_url();?>assets/theme/dist/js/frontend.js"></script>

</body>

</html>
