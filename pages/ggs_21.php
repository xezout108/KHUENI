<?php
	include("../api/ggs_21_table_create.php");
?>

<!DOCTYPE html>
<html>
<head>
	<!-- Title -->
	<title>GGS 21</title>

	<!-- CSS -->
	<link rel="stylesheet" type="text/css" href="../css/ggs_21.css">

	<!-- JavaScript -->
	<script  src="http://code.jquery.com/jquery-latest.min.js"></script>
</head>
<body onload="realtimeClock()">

	<!-- Site Wrapper -->
	<div id="site-wrapper">
		<!-- Header -->
		<section id="header">
		</section>

		<!-- Main Section -->
		<section id="main">
			<!-- Content Container -->
			<div id="container">
				<!-- Clock -->
				<div id="clock-container">
					<div id="clock-title">현재 시간</div>
					<div id="clock"></div>
				</div>

				<!-- Lend Data Table -->
				<div id="table-container">
					<table id="lend-data-table">
						<thead>
							<tr>
								<th>번호</th>
								<th>날짜</th>
								<th>시간</th>
								<th>강의실</th>
								<th>인원</th>
								<th>승인 여부</th>
								<th>상세</th>
							</tr>
						</thead>
						<? echo $table; ?>
					</table>
				</div>
			</div>
		</section>
	</div>

</body>
</html>

<script type="text/javascript">
	/* Date-Time */
	function realtimeClock() {
		$("#clock").text(getTimeStamp());
		setTimeout("realtimeClock()", 1000);
	}

	function getTimeStamp() { // 24시간제
		var d = new Date();

		var s =
		leadingZeros(d.getFullYear(), 4) + '-' +
		leadingZeros(d.getMonth() + 1, 2) + '-' +
		leadingZeros(d.getDate(), 2) + ' ' +

		leadingZeros(d.getHours(), 2) + ':' +
		leadingZeros(d.getMinutes(), 2) + ':' +
		leadingZeros(d.getSeconds(), 2);

		return s;
	}

	function leadingZeros(n, digits) {
		var zero = '';
		n = n.toString();

		if (n.length < digits) {
			for (i = 0; i < digits - n.length; i++)
				zero += '0';
		}
		return zero + n;
	}
</script>