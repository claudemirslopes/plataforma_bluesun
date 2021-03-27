<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="pt-br">
<!--<![endif]-->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <?php echo (isset($titulo) ? '<title>Bluesun do Brasil | '.$titulo.'</title>' : '<title>Bluesum Solar do Brasil | Administrativo</title>'); ?>
    <meta name="description" content="Sufee Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="<?php echo base_url('public/images/logo_bsum01.png'); ?>">
    <link rel="shortcut icon" href="<?php echo base_url('public/images/favicon.ico'); ?>">

    <link rel="stylesheet" href="<?php echo base_url('public/vendors/bootstrap/dist/css/bootstrap.min.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('public/vendors/font-awesome/css/font-awesome.min.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('public/vendors/themify-icons/css/themify-icons.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('public/vendors/flag-icon-css/css/flag-icon.min.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('public/vendors/selectFX/css/cs-skin-elastic.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('public/vendors/jqvmap/dist/jqvmap.min.css'); ?>">


    <link rel="stylesheet" href="<?php echo base_url('public/assets/css/style.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('public/assets/css/app.css'); ?>">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
    <style type="text/css">
        .h3tit:hover {
            color: #FEBD00;
            /* color: #FEBD00 #78C305; */
        }
    </style>
    
    <?php if (isset($styles)): ?>
    
        <?php foreach ($styles as $style): ?>
    
            <link rel="stylesheet" href="<?php echo base_url('public/'.$style); ?>">
    
        <?php endforeach; ?>
    
    <?php endif; ?>
</head>

<body>