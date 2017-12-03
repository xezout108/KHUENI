/* Modal Opening */

var modal1 = document.getElementById('modal1');
var modal2 = document.getElementById('modal2');
var btn1 = document.getElementById("modal1-open");
var btn2 = document.getElementById("modal2-open");
var span1 = document.getElementsByClassName("close")[0];
var span2 = document.getElementsByClassName("close")[1];

btn1.onclick = function() {
    modal1.style.display = "block";
}
btn2.onclick = function() {
    modal2.style.display = "block";
}
span1.onclick = function() {
    modal1.style.display = "none";
}
span2.onclick = function() {
    modal2.style.display = "none";
}
window.onclick = function(event) {
    if (event.target == modal1) {
        modal1.style.display = "none";
    }
    if (event.target == modal2) {
        modal2.style.display = "none";
    }
}

/* Modal Button Control */

var date = $("#date");
var time_start = $("#time-start");
var time_end = $("#time-end");
var isModal1Fin = $("isModal1Fin");

$("#modal1-btn1").click(function(){
    date.val("");
    time_start.val("");
    time_end.val("");

    $("#modal1").css("display", "none"); 
});

$("#modal1-btn2").click(function(){

    /* 값이 비어있는지 확인. */
    if(date.val() == "" || time_start.val() == "" || time_end.val() == "")
    {
        alert("[시간 선택 오류]\n모든 값을 입력해 주세요.");
        isModal1Fin.val("false");
    }
    else
    {
        var time_start_arr = time_start.val().split(":");
        var time_end_arr = time_end.val().split(":");
        var time_start_min = time_start_arr[0] * 60 + time_start_arr[1];
        var time_end_min = time_end_arr[0] * 60 + time_end_arr[1];

        /* 시작 시간이 더 먼저인지 확인. (최소 30분부터 빌릴 수 있음) */
        if((time_end_min - time_start_min) < 30)
        {
            alert("[시간 선택 오류]\n사용 시간은 최소 30분입니다.");
            isModal1Fin.val("false");
        }
        else //모든 조건이 완벽할 때.
        {
            //
            // 모달 바깥에 input 태그에 데이터 넣어주기.
            //
            isModal1Fin.val("true");
            $("#modal2-open").attr("disabled", false);
            $("#modal1").css("display", "none"); 
        }
    }
});

$("#modal2-btn1").click(function(){
    //
    //
    //
    $("#modal2").css("display", "none");
});

$("#modal2-btn2").click(function(){
    $("#modal2").css("display", "none");
});