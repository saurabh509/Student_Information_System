<?php
	session_start();
 ?>

<!DOCTYPE html>
<html lang="en" class="no-js">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notifications</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
		<link rel="shortcut icon" href="../favicon.ico">
		<link rel="stylesheet" type="text/css" href="css/normalize.css" />
		<link rel="stylesheet" type="text/css" href="css/demo.css" />
		<link rel="stylesheet" type="text/css" href="css/component.css" />
    <link rel="stylesheet" href="css/all.css">
		<script src="js/modernizr.custom.js"></script>
	</head>
	<body>
		<div class="container">
			<ul id="gn-menu" class="gn-menu-main">
				<li class="gn-trigger">
					<a class="gn-icon gn-icon-menu"><span>Menu</span></a>
					<nav class="gn-menu-wrapper">
						<div class="gn-scroller">
							<ul class="gn-menu">
                <li>
                  <a class="gn-icon gn-icon-article" href="main_tr.php">Home</a>
                </li>
								<li>
                <li><a class="gn-icon gn-icon-illustrator" href="notice.php">Send Notice</a></li>

								<li>
										<a class="gn-icon gn-icon-photoshop" href="studlist.php">Student List</a>
								</li>

								<li>
									<a class="gn-icon gn-icon-archive" href="comments_tr.php">Post a Comment</a>

								</li>
              </li>
              <li><a class="gn-icon gn-icon-help" href="notifications_tr.php">Notifications</a></li>
							</ul>
						</div><!-- /gn-scroller -->
					</nav>
				</li>
				<li><a href="profile_tr.php"><?php if(isset($_SESSION['name']))echo $_SESSION['name'];?></a></li>
				<li><a href="miniprojhome.php">LOGOUT</a></li>
			</ul>
      <div class="jumbotron" style="margin-top: 100px">
        <h1 style="text-align: center; text-decoration: underline">NOTIFICATIONS</h1>
				<?php

						$conn=mysqli_connect('localhost','saurabh','test1234','student_information_system');

						if(!$conn){
							//echo "connected";
							echo "connection error:".mysqli_connect_error();
						}

						$sql='SELECT roll,text,image from documents_image_table,users where users.id=documents_image_table.id';
						$result=mysqli_query($conn,$sql);

						$users=mysqli_fetch_all($result,MYSQLI_ASSOC);
						mysqli_free_result($result);
						mysqli_close($conn);

						foreach ($users as $var) {
							// code...
							if(strlen($var['text'])>=1)
							echo "<p>Roll:".$var['roll']." ".$var['text']."</p>";

							$target = 'upload_documents/'.basename($var['image']);
							echo "<img style='width:120px; height:120px' src=".$target .">";
						}

						//$conn=mysqli_connect('localhost','saurabh','test1234','student_mentoring_system');

						// if(!$conn){
						// 	echo "connection error:".mysqli_connect_error();
						// }
				?>

      </div>
		</div><!-- /container -->
		<script src="js/classie.js"></script>
		<script src="js/gnmenu.js"></script>
		<script>
			new gnMenu( document.getElementById( 'gn-menu' ) );
		</script>
	</body>
</html>
