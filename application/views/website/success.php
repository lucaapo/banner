<html>
<head>
<title>My Form</title>
</head>
<body>

<h3>Your form was successfully submitted!</h3>
<?php echo $user."  ".$pass;?>
<p><?php echo anchor('login', 'Try it again!'); ?></p>

</body>
</html>