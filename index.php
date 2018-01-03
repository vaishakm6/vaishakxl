<!DOCTYPE html>
<html>
<head>

<link rel="stylesheet" href="style.css">
</head>
<body>
<header>
  <div id='head'>
      <div id="img">
       <img src="aud.jpg" height="125px" width="200px">
     </div>
    <div id="caption">
      ACCOUNTING
    </div>
  </div>
</header>
  <nav>
  <?php include('nav.php') ?>
</nav>

<div id="content">
<?php
if(!empty($_GET['navig'])){
if($_GET['navig']){
  $page=$_GET['navig'];
  $display=$page.'.php';
  include($display);
}
else{
  echo 'Welcome';
}
}
else{
  echo "<div id='welcome'><h1> welcome </h1></div>";
}
?>
<?php
error_reporting(E_ALL);
ini_set("display_errors", 0);
?>
</div>
   <footer>
     <?php include('footer.php') ?>
  </footer>

</body>
</html>
