<?php
	if(!isset($_SESSION)) 
	{ 
	    session_start(); 
	}

	session_destroy();
?>

<!DOCTYPE html>
<html>
<head>
	<!-- Metadata -->
	<meta http-equiv="content-type" content="text/html; charset=UTF-8">

	<!-- Title -->
	<title>GGS Page 11</title>

	<!-- CSS -->
	<link rel="stylesheet" type="text/css" href="./css/index.css">

	<!-- Javascript -->
	<script src="//code.jquery.com/jquery.min.js"></script>
	<script type="text/javascript" src="./js/hello.js"></script>
	<script type="text/javascript" src="./js/google_oauth.js"></script>
	<script type="text/javascript" src="./js/jquery.redirect.js"></script>
</head>
<body>

	<!-- Javascript 사용 중지 -->
	<noscript>
	    <div style="width: 22em; position: absolute; left: 50%; margin-left: -11em; color: red; background-color: white; border: 1px solid red; padding: 4px; font-family: sans-serif">Javascript 사용이 중지되었습니다. 웹 브라우저 설정에서 Javascript을 사용하십시오.</div>
	</noscript>

	<!-- 사이트 -->
	<div id="site-wrapper">

			<section id="header">
			<div id="logo-container">
				<img src="./img/khu_logo.png" class="logo">
			</div>
			<div id="title-container">
				<span id="title">전자정보대학 강의실 대여</span>
			</div>
		</section>
		<div id="header">
			   
		</div>

		<div id="main">
			<form id="form1" method="post" name="form1">
				<div id="std-data" class="sub-section">
					<center><button class="std-box sub-login-element" onclick="login()"><div class = "input-box">학생 로그인 (Google+)</input></button></center>
					<center><button class="std-box sub-login-element"><div class = "input-box">관리자 로그인</input></button></center>
				</div>
				<div id="std-low-data" class="sub-section" >
					<div class = "input-info-box">
						학생은 Google+ 에서 학교 웹메일로 로그인.
					</div>
				</div>
			</form>
		</div>

	</div>
</body>

</html>