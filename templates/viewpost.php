<html>
<head>
<title>viewpost</title>
<link href="../static/css/bootstrap.css" rel="stylesheet">
<link href="../static/css/addon.css" rel="stylesheet">
<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
</head>
<body>

</body>
</html>
<?php
include('dbconfig.php');
include('header.html');
$stmt = $DB_con->prepare('SELECT postID, postTitle, postDesc, postCont, postDate FROM posts WHERE postID = :postID');
$stmt->execute(array(':postID' => $_GET['id']));
$row = $stmt->fetch();

if($row['postID'] == ''){
    header('Location: ./');
    exit;
}

echo '<div class = "container">';
	echo '<div class ="row">';
		echo '<div class="col-lg-8">';
			echo '<h1>'.$row['postTitle'].'</h1>';
			echo '<p>Posted on '.date('jS M Y', strtotime($row['postDate'])).'</p>';
			echo '<p>'.$row['postCont'].'</p>';   
		echo '</div>';
	echo '</div>';
echo '</div>';
?>