/* FUNCTIONS */
var weekdays = {"Sunday":0, "Monday":1, "Tuesday":2, 
    "Wednesday":3, "Thursday":4, "Friday":5, "Saturday":6};

function _get_date()
{
    // 시간 가져오기
    var temp1 = $("#time-start").val().split(":");
    var temp2 = $("#time-end").val().split(":");
    start = Number(temp1[0])*60 + Number(temp1[1]);
    end = Number(temp2[0])*60 + Number(temp2[1]);

    // 요일 가져오기
    weekday = $("#date").val().split(" ")[1];

    console.log(String(start) + String(end) + weekday);

    var result = [start, end, weekdays[weekday]];

    return result;
}

function get_class_info()
{
    var date = _get_date();
    $.ajax({
        url: './../php/get_class_info.php',
        type: 'POST',
        dataType: 'json',
        data: {
            time_start: date[0],
            time_end: date[1],
            weekday: date[2]
        },
        success: function(res) {
            for(var item in res)
            {
                $('#class-select').append("<option value='"+res[item]+"'>"+res[item]+"</option>");
            }
            console.log(res);
        },
        error: function(request, status, error) {
            alert("[Error]\n - Code : " + request.status + "\n - Msg : " + request.responseText);
        }
    });
}


/*** Modal Opening ***/

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

/*** Modal Button Control ***/

var date = $("#date");
var time_start = $("#time-start");
var time_end = $("#time-end");
var isModal1Fin = $("isModal1Fin");

$("#modal1-btn1").click(function() {
    date.val("");
    time_start.val("");
    time_end.val("");

    $("#modal1").css("display", "none"); 
});

$("#modal1-btn2").click(function() {

    /* 값이 비어있는지 확인. */
    if(date.val() == "" || time_start.val() == "" || time_end.val() == "")
    {
        alert("[선택 오류]\n모든 값을 입력해 주세요.");
        isModal1Fin.attr("value", "false");
    }
    else
    {
        var time_start_arr = time_start.val().split(":");
        var time_end_arr = time_end.val().split(":");
        var time_start_min = (time_start_arr[0] * 60) + time_start_arr[1];
        var time_end_min = (time_end_arr[0] * 60) + time_end_arr[1];

        /* 시작 시간이 더 먼저인지 확인. (최소 30분부터 빌릴 수 있음) */
        if((time_end_min - time_start_min) < 30)
        {
            alert("[선택 오류]\n사용 시간은 최소 30분입니다.");
            isModal1Fin.attr("value", "false");
        }
        else //모든 조건이 완벽할 때.
        {
            $("#class-select").empty();

            var temp_date = date.val();
            $("#input-date").attr("value", temp_date.split(" ")[0]);
            $("#input-stime").attr("value", time_start.val());
            $("#input-ftime").attr("value", time_end.val());

            get_class_info();
            $("#isModal1Fin").attr("value", "true");
            $("#modal2-open").attr("disabled", false);
            $("#modal1").css("display", "none"); 
        }
    }
});

$("#modal2-btn1").click(function(){
    $("#modal2").css("display", "none");
});

$("#modal2-btn2").click(function(){
    var selected_class = $("#class-select").find(":selected").val();
    var people_quantity = $("#people").val();

    if(selected_class == "" || people_quantity == "")
    {
        alert("[선택 오류]\n 인원과 강의실을 선택해주세요.");
        isModal2Fin.attr("value", "false");
    }

    $("#input-class").attr("value", selected_class);
    $("#input-people").attr("value", people_quantity);

    $("#modal2").css("display", "none");
});