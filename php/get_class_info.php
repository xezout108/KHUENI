<?

include("./db_config.php");
include("./api.php");

$table_name = "class_info";

/*** 변수 ***/
$info_arr = array(
	"start" => $_POST["time_start"],
	"fin" => $_POST["time_end"],
	"weekday" => $_POST["weekday"]
);

$class_arr = array();
$result_arr = array();

/*** STEP 1. class만 모두 가져오기 ***/
$sql = "SELECT DISTINCT class FROM $table_name ORDER BY class";

if($result = $conn->query($sql))
{
	while($row = $result->fetch_row())
	{
		$arr_mid = array(
			"class" => $row[0],
			"isAvailable" => true
		);
		array_push($class_arr, $arr_mid);
	}

	$result->free();
}

/*** STEP 2. 시간 요일 조회 ***/
foreach($class_arr as $class)
{
	$sql = "SELECT start, fin, weekday, subject FROM $table_name WHERE class='".$class["class"]."' AND weekday = ".$info_arr["weekday"]." ORDER BY weekday";

	$result = $conn->query($sql);
	while($row = $result->fetch_array())
	{
		$arr_temp = array(
			"start" => $row["start"],
			"fin" => $row["fin"],
			"weekday" => $row["weekday"]
		);
		if(!isUsable($info_arr, $arr_temp))
		{
			//$class["isAvailable"] = false;
			break;
		}
		else
		{
			array_push($result_arr, $class["class"]);
		}
	}

	$result->free();
}

/*** STEP 3. 가능한 호실만 묶어서 JSON으로 전송하기 ***/
$result_arr = array_unique($result_arr);
echo json_encode($result_arr);


// MySQL 연결 해제 
$conn->close();

?>