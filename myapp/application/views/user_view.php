<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>User View</title>
</head>
<body>

<h1>

<?php 

// echo $results;

foreach ($results as $object) {

echo $object->username . "<br>";

}

 ?>

</h1>

</body>
</html>