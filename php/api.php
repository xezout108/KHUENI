<?

// arr1 : 빌리려는 시간 및 요일 / arr2 : 확인할 강의
function isUsable($arr1, $arr2)
{
	// 시간 확인 (시작 시간이 강의 시간에 포함되거나 끝나는 시간이 포함되는 경우 이용 불가.)
	if(($arr1["start"] >= $arr2["start"] && $arr1["start"] < $arr2["fin"]) || ($arr1["fin"] > $arr2["start"] && $arr1["fin"] <= $arr2["fin"]))
	{
		return false;
	}
	else // 요일도 다르고 시간도 안겹치면
	{
		return true;
	}
}

?>