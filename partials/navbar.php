<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <!--font awesome-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" crossorigin="anonymous"/>
      
    <link rel="stylesheet" href="public/nav.css">
    <title> Cases in Kashmir</title>
    <link rel="icon" href="media/logo.png" type="image/ico" />
    <link rel="stylesheet" href="public/common.css">
    
   <?php
      if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on')   
         $url = "https://";   
      else  
         $url = "http://";    
      $url.= $_SERVER['HTTP_HOST'];   
      $url.= $_SERVER['REQUEST_URI'];    
      if ((strpos($url, 'india'))||(strpos($url, 'global'))||(strpos($url, 'kashmir')) !== true) {
   ?>
       <link rel="stylesheet" href="public/style.css">
   <?php
      }
   ?>
  </head>
  <body>
  <nav class="navbar navbar-expand-lg navbar-dark primary-color">
   <!-- Navbar brand -->
   <a class="navbar-brand" href="index.php"><img src="media/logo.png" alt="logo" style="width: 60px;"></a>
   <!-- Collapse button -->
   <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#mainNav"
      aria-controls="mainNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
   </button>
   <!-- Collapsible content -->
   <div class="collapse navbar-collapse" id="mainNav">
      <!-- Links -->
      <ul class="navbar-nav">
         <li class="nav-item" id="home">
            <a href="index.php" class="nav-link">Home</a>
         </li>
         <li class="nav-item" id="kashmir">
            <a class="nav-link" href="kashmir.php">J&K
            </a>
         </li>
         <li class="nav-item" id="india">
            <a class="nav-link" href="india.php">India</a>
         </li>
         <li class="nav-item" id="global">
            <a class="nav-link" href="global.php">Global</a>
         </li>
        
      </ul>
   </div>
   
</nav>