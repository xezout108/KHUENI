<?

$db_host = "localhost";
$db_id = "root";
$db_pw = "autoset";
$db_name = "khueni";
$db_charset = "utf8";

// Connecting
$conn = new mysqli($db_host, $db_id, $db_pw, $db_name);

if($conn->connect_errno)
{
	echo "[SYSTEM] MySQL Connect Error!";
}

// Charset
if(!$conn->set_charset($db_charset))
{
	echo "[SYSTEM] Character Set Failure.";
}

?>