<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="<?php echo (isset($metaDescription) && !empty($metaDescription)) ? $metaDescription : $settings['homepage_meta_description']; ?>">
    <meta name="keywords" content="<?php echo (isset($metaKeywords) && !empty($metaKeywords)) ? $metaKeywords : $settings['homepage_meta_keywords']; ?>">
    <meta name="author" content="Manish Jangir">

    <title><?php echo (isset($metaTitle) && !empty($metaTitle)) ? $metaTitle : $settings['homepage_meta_title']; ?></title>

    <!-- Bootstrap Core CSS -->
    <link href="<?php echo base_url(); ?>assets/theme/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/theme/dist/css/frontend.css" rel="stylesheet">

    <style type="text/css">
        body {
            padding-top: 50px;
        }
        #exTab3 .nav-pills > li > a {
          border-radius: 4px 4px 0 0 ;
        }

        #exTab3 .tab-content {
          background-color: #337ab7;
          padding : 5px 15px;
        }
        .bgwhite {
          background: #fff;
        }
        .pad10 {
          padding: 10px;
        }
        .text-bold {
          font-weight: bold;
        }
        .mbt10 {
            margin-bottom: 10px;
        }
    </style>
</head>

<body>
    <div class="container">
        <?php echo isset($content) ? $content : null; ?>
    </div>
    <!-- /.container -->
    <script type="text/javascript">
        var WS_BASE_PATH = '<?php echo WS_BASE_PATH; ?>';
    </script>
    <script src="<?php echo base_url(); ?>assets/theme/plugins/jQuery/jQuery-2.2.0.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/theme/bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/2.0.3/socket.io.js"></script>
    <script src="<?php echo base_url(); ?>assets/theme/dist/js/script.js"></script>

</body>

</html>
