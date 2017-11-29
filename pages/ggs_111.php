<html>

<head>
	<title>GGS 1.1.1 Modal Testing</title>

	<!-- CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
	<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
	<link rel="stylesheet" href="./../css/ggs_111.css">

	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<link rel="stylesheet" href="./../css/bootstrap-material-datetimepicker.css">
	<link href='http://fonts.googleapis.com/css?family=Roboto:400,500' rel='stylesheet' type='text/css'>
  	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-material-design/0.5.10/css/ripples.min.css"/>

	<!-- Javascript -->
	<script src="//code.jquery.com/jquery.min.js"></script>
	<!--<script src="//code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>-->
	<script src="./../js/bootstrap-material-datetimepicker.js"></script>

	<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-material-design/0.5.10/js/ripples.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-material-design/0.5.10/js/material.min.js"></script>
	<script type="text/javascript" src="http://momentjs.com/downloads/moment-with-locales.min.js"></script>
	<script type="text/javascript" src="./../js/bootstrap-material-datetimepicker.js"></script>


</head>

<body style="background-color:#F7F7F7;">

	<!-- Modal1 Opening Button -->
	<button id="modal1-open" class="btn btn-default">날짜 선택</button>

	<!-- Modal1 Opening Button -->
	<button id="modal2-open" class="btn btn-default">강의실 선택</button>


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
					<button type="button" class="btn btn-warning">취소</button>
					<button type="button" class="btn btn-success">확인</button>
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

				<!-- Choose Date -->
				<div class="khu-modal-left">
					<label class="khu-modal-label">강의실 선택</label>
					<input type="text" id="date" class="form-control floating-label" placeholder="날짜를 선택하세요." readonly>

				</div>

				<!-- Choose Time -->
				<div class="khu-modal-right">
					<label class="khu-modal-label">강의실 정보</label>
				</div>
			</div>

			<!-- Modal Footer -->
			<div class="khu-modal-footer">
				<div class="khu-modal-btn-group">
					<button type="button" class="btn btn-warning">취소</button>
					<button type="button" class="btn btn-success">확인</button>
				</div>
			</div>

		</div>

	</div>


	<!-- JQuery UI :: datepicker -->
	<script>
		$("#date").bootstrapMaterialDatePicker({
			weekStart: 0,
			okText: "확인",
			cancelText: "취소",
			time: false,
			format: 'YYYY-MM-DD dddd'
		});

		$("#time-start").bootstrapMaterialDatePicker({
			date: false,
			shortTime: true,
			okText: "확인",
			cancelText: "취소",
			format: 'HH:mm'
		});

		$("#time-end").bootstrapMaterialDatePicker({
			date: false,
			shortTime: true,
			okText: "확인",
			cancelText: "취소",
			format: 'HH:mm'
		});

	</script>

	<!-- Javascript :: Modal Open -->
	<script src="./../js/modal_control.js"></script>

</body>

</html>