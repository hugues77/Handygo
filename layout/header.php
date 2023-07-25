<!DOCTYPE html>
<html lang="fr">

<head>
  <!-- Required meta tags -->
  <meta http-equiv="Content-Type" content="text/html; charset= UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1"> 
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <!-- Bootstrap CSS -->
  <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"> -->

  <!-- Owlcarousel CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />

  <!-- datedropper CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/datedropper/2.0/datedropper.min.css" />

  <!-- MCDatepicker CSS -->
  <link href="https://cdn.jsdelivr.net/npm/mc-datepicker/dist/mc-calendar.min.css" rel="stylesheet" />

  <!-- Font-Awesome -->
  <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/fontawesome.min.css" /> -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"  />
  
  <!-- style css -->
  <link rel="stylesheet" href="../../css/style.css">

  <!-- style css for flags country phone -->
  <link rel="stylesheet" href="../../css/international-telephone-input.css">

  <title><?= $title ? $title : 'Partage ton trajet' ?></title> 
</head>

<body class="">
  <?php
  require_once "partials/direction_section.php";
  ?>
  <?= $content ?>