<!DOCTYPE html>
<html>
<head>
	<title>Money Sewer</title>
	<link rel="stylesheet" type="text/css" href="css.css">
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<script type="text/javascript" src="js/add_transaction.js"></script>
</head>
<body>
	<header id="head">
	 	 
	 	 	<?php	if (isset($_COOKIE['user'])): ?>
				<p id='login_head' class='login white_link'>Hello, <?php echo $_COOKIE['user']; ?></p>
	 	 		<a id='oauth_head' class='login white_link' href='?action=logout'>LogOut</a>
	 	 	
	 	 	<?php else: ?>
	 	 		<a id='oauth_head' class='login white_link' href='?action=auth'>Sign in</a>
	 	 		<a id='login_head' class='login white_link' href='?action=registration'>Registration</a>
	 	 	}
	 	 	<?php endif;?>
		<a href="?action=main" class="logo" id="logo_top"> Money</a>
	</header>
	<aside id="side_bar">
	<a href="?action=main" class="logo" id="logo_bottom">Sewer</a>
		<ul class="menu" type="none">
			<li class="side_list"><a class="side_list" href="?action=income">Income</a></li>
			<li class="side_list"><a class="side_list" href="#">Expence</a></li>
			<li class="side_list" style="padding-top: 70px; padding-left:18px;"><a class="side_list" href="#">Taxes</a></li>
		</ul>
	</aside>
	<?php if($_SESSION['msg']) {?>
	<p class="msg"><?php echo $_SESSION['msg'];?></p>
	<?php unset($_SESSION['msg']);?>
			<?php } ?>
</body>
</html>