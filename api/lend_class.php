<?
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

	$date = $_POST['date'];
	$start = $_POST['stime'];
	$fin = $_POST['ftime'];
	$people = $_POST['people'];
	$class = $_POST['class'];
	$purpose = $_POST['purpose'];

	$temp_s = explode(':', $start);
	$stime = ($temp_s[0]*60)+$temp_s[1];

	$temp_f = explode(':', $fin);
	$ftime = ($temp_f[0]*60)+$temp_f[1];

	include("./connect_db.php");

	$query = "INSERT INTO lend_log ('std_num', 'name', 'major', 'college', 'date', 'stime', 'ftime', 'people', 'purpose', 'class', 'accept') VALUES ('$user_id', '$user_name', '$major', '$college', '$date', '$stime', '$ftime', '$people', '$people', '$purpose', '$class', '0');";
	$send = mysqli_query($connect, $query);

	echo "<script>alert('신청 완료');document.location.href = '../pages/ggs_1.php';</script>";
?>