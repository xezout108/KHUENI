<?php 

header("Content-Type: text/html; charset=UTF-8");


//아이디랑 비밀번호 받아옴

$user_id = $_POST['user_id'];
$password = $_POST['password'];



$command = "C:/Users/khuph/AppData/Local/Programs/Python/Python36/python.exe C:/AutoSet9/public_html/kmh/khu/api/py/main.py $user_id $password";
//$command = "py C:/AutoSet9/public_html/kty/main.py $user_id $password";

$output = exec($command);
$ex = iconv("EUC-KR", "utf-8", $output);
//출력해보는것

 /* ggg
if(function_exists('mb_detect_encoding')) {
    echo mb_detect_encoding($output, "EUC-KR, UTF-8, ASCII");
} else {
    echo "function not exists";
}
echo $output;*/


//관리자 로그인 했을때
if($user_id=='admin'&&$password=='admin')
{

	if(!isset($_SESSION)) 
    { 
        session_start(); 
    }

	echo "<script>alert(\"행정실 로그인\");</script>";
	$_SESSION['user_id'] = $user_id;
	$_SESSION['user_name'] = '행정실';
	echo "<script>
	window.location.replace('../pages/ggs_2.php');
	</script>";
}



//메모장에서 가져왔는데 한글글깨짐
$handle = @fopen("./$user_id.txt", "r"); //읽기 모드로 text문서 열기
if(!$handle)
{ 
	echo "<script>alert(\"아이디 이상\");</script>";
	fclose($handle);//파일 닫기
	echo "<script>
	window.location.replace('../index.php');
	</script>";
	die("Not Found!");//실패시 경고문
}



for ($i=0 ; !feof($handle) ; $i++) 
{ 

	//텍스트 문서에서 한줄한줄 읽어와 배열에 저장

	$buffer[$i] = iconv("EUC-KR", "utf-8",fgets($handle, 1000));
}

if($password+'\n' != $buffer[1])
{
	echo "<script>alert(\"비밀번호 이상\");</script>";
	fclose($handle);//파일 닫기
	echo "<script>
	window.location.replace('../index.php');
	</script>";
}

//여기 까지 넘어오면 로그인 성공한거
//세션 유지 시키고 페이지 넘기기
echo "<script>alert(\"로그인성공\");</script>";
if(!isset($_SESSION)) 
    { 
        session_start(); 
    }

$_SESSION['user_id'] = $user_id;
$_SESSION['user_name'] = $buffer[2];
$_SESSION['college'] = $buffer[3];
$_SESSION['major'] = $buffer[4];

fclose($handle);//파일 닫기

echo "<script>
window.location.replace('../pages/ggs_1.php');
</script>";


?>