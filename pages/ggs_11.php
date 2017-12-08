<?php
   if(!isset($_SESSION)) 
    { 
        session_start(); 
    }

   if(!isset($_SESSION['user_id']) || !isset($_SESSION['user_name'])) {
      echo "<script>alert('로그인을 하세요!!!!!!!');</script>";
      echo "<script>document.location.href='./../index.php';</script>";
   }

   $user_id = $_SESSION['user_id'];
   $user_name = $_SESSION['user_name'];
   $college = $_SESSION['college'];
   $major = $_SESSION['major'];
?>


<!DOCTYPE html>
<html>
<head>
	<!-- Title -->
	<title>GGS Page 11</title>

	<!-- CSS -->
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<link rel="stylesheet" href="./../css/bootstrap-material-datetimepicker.css">
	<link href='http://fonts.googleapis.com/css?family=Roboto:400,500' rel='stylesheet' type='text/css'>
  	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-material-design/0.5.10/css/ripples.min.css"/>	
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
	<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
	<link rel="stylesheet" type="text/css" href="../css/ggs_11.css">
	<link rel="stylesheet" href="./../css/ggs_111.css">

	<!-- Javascript -->
	<script  src="http://code.jquery.com/jquery-latest.min.js"></script>
	<script src="./../js/bootstrap-material-datetimepicker.js"></script>
	<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-material-design/0.5.10/js/ripples.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-material-design/0.5.10/js/material.min.js"></script>
	<script type="text/javascript" src="http://momentjs.com/downloads/moment-with-locales.min.js"></script>
	<script type="text/javascript" src="./../js/bootstrap-material-datetimepicker.js"></script>


</head>
<body>

	<!-- Modal Control -->
	<input type="hidden" id="isModal1Fin" value="false">
	<input type="hidden" id="isModal2Fin" value="false">

	<!-- Modal1 -->
	<div id="modal1" class="khu-modal">

		<!-- Modal1 Wrapper -->
		<div class="khu-modal-wrapper">

			<!-- Modal Header -->
			<div class="khu-modal-header">
				<span class="close"><span class="glyphicon glyphicon-remove"></span></span>
				<span><h4>날짜 및 시간 선택</h4></span>
			</div>

			<!-- Modal Body -->
			<div class="khu-modal-body">

				<!-- Choose Date -->
				<div class="khu-modal-left">
					<label class="khu-modal-label">사용할 날짜</label>
					<input type="text" id="date" class="form-control floating-label" placeholder="날짜를 선택하세요." readonly>

				</div>

				<!-- Choose Time -->
				<div class="khu-modal-right">
					<label class="khu-modal-label">사용할 시간</label>
					<input type="text" id="time-start" class="form-control floating-label timepicker" placeholder="시작 시간" style="float: left;" readonly>
					<input type="text" id="time-end" class="form-control floating-label timepicker" placeholder="종료 시간" style="float: right;" readonly>
				</div>
			</div>

			<!-- Modal Footer -->
			<div class="khu-modal-footer">
				<div class="khu-modal-btn-group">
					<button type="button" id="modal1-btn1" class="btn btn-warning">취소</button>
					<button type="button" id="modal1-btn2" class="btn btn-success">확인</button>
				</div>
			</div>

		</div>

	</div>

	<!-- Modal2 -->
	<div id="modal2" class="khu-modal">

		<!-- Modal1 Wrapper -->
		<div class="khu-modal-wrapper">

			<!-- Modal Header -->
			<div class="khu-modal-header">
				<span class="close"><span class="glyphicon glyphicon-remove"></span></span>
				<span><h4>강의실 선택</h4></span>
			</div>

			<!-- Modal Body -->
			<div class="khu-modal-body">

				<!-- Choose Class -->
				<div class="khu-modal-left">
					<label class="khu-modal-label">강의실 선택</label>
					<select id="class-select" placeholder="강의실을 선택하세요." required></select>
				</div>

				<!-- Choose People -->
				<div class="khu-modal-right">
					<label class="khu-modal-label">사용할 최대 인원</label>
					<input type="number" id="people" class="form-control floating-label" style="float: left;" min="1" placeholder="1">
				</div>

			</div>

			<!-- Modal Footer -->
			<div class="khu-modal-footer">
				<div class="khu-modal-btn-group">
					<button type="button" id="modal2-btn1" class="btn btn-warning">취소</button>
					<button type="button" id="modal2-btn2" class="btn btn-success">확인</button>
				</div>
			</div>

		</div>

	</div>

	<!-- Site Wrapper -->
	<div id="site-wrapper">

		<div id="header">
			
		</div>

		<div id="main">
			<form id="data-form" action="../api/lend_class.php" method="post">
				<div id="std-data" class="sub-section">
					<div id="college-major" class="std-box sub-element"><input type="text" name="cm" class="input-box" value="<? echo $college." ".$major; ?>" readonly></input></div>
					<div id="std-num-name" class="std-box sub-element"><input type="text" name="snn" class="input-box" value="<?echo $user_id." " .$user_name; ?>" readonly></input></div>
				</div>
				<div id="class-selector" class="sub-section">
					<div id="lend-data-container">
						<div id="lend-date" class="lend-data-box sub-element">
							<input type="text" id="input-date" name="date" class="input-box" readonly></input>
						</div>
						<div id="lend-stime" class="lend-data-box sub-element">
							<input type="text" id="input-stime" name="stime" class="input-box" readonly></input>
						</div>
						<div id="lend-ftime" class="lend-data-box sub-element">
							<input type="text" id="input-ftime" name="ftime" class="input-box" readonly></input>
						</div>
						<div id="lend-people" class="lend-data-box sub-element">
							<input type="text" id="input-people" name="people" class="input-box" readonly></input>
						</div>
						<div id="lend-class" class="lend-data-box sub-element">
							<input type="text" id="input-class" name="class" class="input-box" readonly></input>
						</div>
					</div>

					<div id="lend-data-btn">
						<div id="lend-btn1" class="lend-data-box sub-element">
							<button type="button" id="modal1-open" class="btn btn-default">날짜 선택</button>
						</div>
						<div id="lend-btn2" class="lend-data-box sub-element">
							<button type="button" id="modal2-open" class="btn btn-default" disabled>강의실 선택</button>
						</div>				
					</div>
				</div>
				<div id="purpose-section" class="sub-section">
					<div id="purpose-title-container">
						<span id="purpose-title">대여 목적</span>
					</div>
					<div id="purpose-write-container">
						<textarea id="purpose-write" name="purpose" form="data-form"></textarea>
					</div>
				</div>
				<input type="submit" name="" value="신청">
			</form>
		</div>

	</div>

	<!-- Javascript :: Load Date-Time-Picker -->
	<script src="./../js/load_picker.js"></script>

	<!-- Javascript :: Modal Control -->
	<script src="./../js/modal_control.js"></script>
</body>
</html>