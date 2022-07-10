<!DOCTYPE html>
<html lang="en">

<head>
    <title><?php echo $title ?? "On Market | Portugal"; ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link href="<?php echo base_url('resources/css/bootstrap.css'); ?>" rel="stylesheet" type="text/css" media="all"/>
    <link href="<?php echo base_url('resources/css/style.css'); ?>" rel="stylesheet" type="text/css" media="all"/>
    <link href="<?php echo base_url('resources/css/font-awesome.css'); ?>" rel="stylesheet" />
    <link href="<?php echo base_url('resources/css/popuo-box.css'); ?>" rel="stylesheet" type="text/css" media="all"/>
    <link href="<?php echo base_url('resources/css/jquery-ui1.css'); ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url('resources/css/flexslider.css'); ?>" rel="stylesheet" media="screen" type="text/css" />
    <link href="<?php echo base_url('resources/css/easy-responsive-tabs.css'); ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url('resources/css/creditly.css'); ?>" rel="stylesheet" media="all" type="text/css" />

    <link href="//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800" rel="stylesheet">
</head>
<body>
<?php
    $success = $this->session->flashdata('success_msg');
    $error = $this->session->flashdata('error_msg');
    if ($error != null){
        if (is_array($error)){
            foreach ($error as $error_i){
                echo <<<HTML
                        <div class="alert alert-warning alert-dismissible w-100 text-center" role="alert">
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                          $error_i
                        </div>
                    HTML;
            }
        }else{
            echo <<<HTML
                        <div class="alert alert-warning alert-dismissible w-100 text-center" role="alert">
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                          $error
                        </div>
                    HTML;
        }
    }
    if ($success != null){
        if (is_array($success)){
            foreach ($success as $success_i){
                echo <<<HTML
                            <div class="alert alert-success alert-dismissible w-100 text-center" role="alert">
                              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                              $success_i
                            </div>
                        HTML;
            }
        }else{
            echo <<<HTML
                            <div class="alert alert-success alert-dismissible w-100 text-center" role="alert">
                              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                              $success
                            </div>
                        HTML;
        }
    }
?>