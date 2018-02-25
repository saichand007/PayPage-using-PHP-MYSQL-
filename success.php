

<?php 
if(!empty($_GET['tid'] && !empty($_GET['product'])))
{
    $GET=filter_var_array($_GET,FILTER_SANITIZE_STRING);
    $tid=$GET['tid'];
    $product=$GET['product'];

}
else{
    header("Location:index.php");
}
?>
<html>
<head>
<title>PayPage</title>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width,initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
</head>

<body>
<div class="container mt-4">
<h2>Thank you for purchasing <?php echo $product ?></h2><br>
<p>Your transaction id is <?php echo $tid ?></p>
<p>check your email for info</p>
<p><a href='index.php' class='btn btn-light mt-2'>Back</a></p>
</div>
</body>
</html>