<?php 
	require 'php-sdk/facebook.php';
	$facebook = new Facebook(array(
		'appId'  => '706942112669859',
		'secret' => 'aed5fb900bdfd589cfa171c3ebdc7e18'
	));
?>
<!DOCTYPE HTML>
<html>
<head>
<link rel="stylesheet" type="text/css" href="css.css">
<link href='http://fonts.googleapis.com/css?family=Nova+Square' rel='stylesheet' type='text/css'>
<title>SOCIAL-MASH</title>
</head>
<body>
<header style="box-shadow: 0px 0px 30px 30px #000;" align="center">

<h1 align="center" style="font-family: 'Nova Square', cursive;">SOCIAL-MASH</h1>
<nav align="center" style="font-family: 'Nova Square', cursive;">
  <a href="">Button 1</a> |
  <a href="">Button 2</a> |
  <a href="">Button 3</a> |
  <a href="">Button 4</a> |
  <a href="">Button 5</a>
</nav>
</header>


<div class="container"style="padding: 0px 0px 700px 0px;color:#000;font-family: 'Nova Square', cursive; ">
<br><br><br>
<div style="padding: 10px;">
<?php
	
	$user = $facebook->getUser();
	
	if ($user): 
		echo '<h1 style="color:#000">IT WORKS MISTA!!!!</h1>';
		
		$user_graph = $facebook->api('/me/friends/');
		echo '<h1>Hello ',$user_graph['first_name'],'</h1>';

		echo '<ul style="color:#000">';
		foreach ($user_graph['data'] as $key => $value) {
			echo '<li >';
			echo '<a href="http://facebook.com/', $value['id'], '" target="_top">';
			echo '<img class="friendthumb" src="https://graph.facebook.com/', $value['id'],'/picture" alt="',$value['name'],'"/>';
			echo "</a>";
			echo "<h2>", $value['name'],'</h2>';
			echo '</li>';
			
		} 
		echo '</ul>';
				
		
		
		
		echo '<p style="color:#000">User ID: ', $user, '</p>';
	
		
		
		echo '<p><a href="logout.php" style="color:#000">logout</a></p>';
	else:
		$loginUrl = $facebook->getLoginUrl(array(
			'diplay'=>'popup',
			'scope'=>'read_mailbox,read_stream,read_friendlists,read_insights',
			'redirect_uri' => 'http://apps.facebook.com/myappsourcephp'
		));
		echo '<h1 style="color:#000">LOG-IN MISTA</h1>';
		echo '<p><a style="color:#000" href="', $loginUrl, '" target="_top">login</a></p>';
	endif; 
?>
</div>
</div>

  <footer style="box-shadow: 0px 0px 10px 10px #000;"><nav align="center" style="font-family: 'Nova Square', cursive;">
  <a href="">Button 1</a> |
  <a href="">Button 2</a> |
  <a href="">Button 3</a> |
  <a href="">Button 4</a> |
  <a href="">Button 5</a>
</nav><h3 align="center" style="font-family: 'Nova Square', cursive;">Created by Your TATA</h3>
  </footer>
</body>
</html>