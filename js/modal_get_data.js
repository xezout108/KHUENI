// 변수
var start;
var end;
var weekday;

$(document).ready( function() {
	// 바뀌었을 때 이벤트 감지
	$("#isModal1Fin").change(function() {
		alert("isModal1Fin changed");
		// 1번 모달이 완벽하게 종료되었을 경우
		if($(this).val() == "true")
		{
			// 시간 가져오기
			var temp1 = $("#time-start").val().split(":");
			var temp2 = $("#time-end").val().split(":");
			start = Number(temp1[0])*60 + Number(temp1[1]);
			end = Number(temp2[0])*60 + Number(temp2[1]);

			// 요일 가져오기
			weekday = $("#date").val().split(" ")[1];

			console.log(String(start) + String(end) + weekday);

		}
	});
});