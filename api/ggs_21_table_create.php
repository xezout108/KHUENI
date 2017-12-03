<?php
	include("../api/connect_db.php");
	$sql = "SELECT * FROM lend_log WHERE accept = 1;";
	$result = mysqli_query($connect, $sql);

	$table = '<tbody>';

	while($row = mysqli_fetch_assoc($result)) {
		$table .= '<tr>';
		$table .= '<td>'.$row['id'].'</td>';
		$table .= '<td>'.$row['date'].'</td>';
		$table .= '<td>'.$row['stime'].'~'.$row['ftime'].'</td>';
		$table .= '<td>'.$row['class'].'</td>';
		$table .= '<td>'.$row['people'].'</td>';
		$table .= '<td>'.$row['accept'].'</td>';
		$table .= '<td>+</td>';
		$table .= '</tr>';
	}
	$table .= '</tbody>';
?>