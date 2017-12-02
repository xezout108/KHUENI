<!DOCTYPE html>
<html>
<head>

	<!-- Title -->
	<title>GGS 2</title>

	<!-- CSS -->
	<link rel="stylesheet" type="text/css" href="../css/ggs_2.css">

	<!-- JavaScript -->
	<script  src="http://code.jquery.com/jquery-latest.min.js"></script>

</head>
<body>

	<!-- Site Wrapper -->
	<div id="site-wrapper">	
		<!-- Header -->
		<section id="header">
			<div id="logo-container">
				<img src="../img/khu_logo.png" class="logo">
			</div>
			<div id="title-container">
				<span id="title">전자정보대학 강의실 대여</span>
			</div>
		</section>
		<!-- Main Section -->
		<section id="main">
			<!-- Button Container -->
			<div id="btn-container">
				<ul>
					<li id="accept-btn" class="btn">
						<div class="btn-title-container">
							<span class="btn-title">강의실 대여 승인</span>
						</div>
						<div class="btn-img-container">
							<img src="../img/btn_img2.png" class="btn-img">
						</div>
					</li>
					<li id="log-btn" class="btn">
						<div class="btn-title-container">
							<span class="btn-title">강의실 대여 현황</span>
						</div>
						<div class="btn-img-container">
							<img src="../img/btn_img3.png" class="btn-img">
						</div>
					</li>
				</ul>
			</div>
		</section>
	</div>

</body>
	<script type="text/javascript">
		$(document).ready(function(){
			$(".btn").click(function(){
				var btn_id = $(this).attr("id");
				if(btn_id=="accept-btn") {
					document.location.href = './ggs_21.php';
				} else {
					document.location.href = './ggs_22.php';
				}
			})
		})
	</script>
</html>