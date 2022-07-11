<!DOCTYPE html>
<html lang="pt">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Blank</title>

    <!-- Custom fonts for this template-->
    <link href="<?php echo base_url("resources/vendor/fontawesome-free/css/all.min.css");?>" rel="stylesheet" type="text/css">
    <link
            href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
            rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?php echo base_url("resources/css/sb-admin-2.min.css") ?>" rel="stylesheet">

</head>

<body id="page-top">
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