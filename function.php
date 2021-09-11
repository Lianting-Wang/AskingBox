<?php
function cconnect() {
	$data = file_get_contents('database.json');  
	$Database = json_decode($data, true);
	$dbhost = $Database['dbhost'];
	$dbuser = $Database['dbuser'];
	$dbpass = $Database['dbpass'];
	$conn = mysqli_connect($dbhost, $dbuser, $dbpass);
	if(! $conn ){
	  die('连接失败: ' . mysqli_error($conn));
	}
	mysqli_query($conn , "set names utf8");
	if ($Database['dbexist'] == 0) {
		$sql = "CREATE DATABASE IF NOT EXISTS `popi`";
		if (mysqli_query($conn, $sql)) {
			$Database['dbexist'] = 1;
			$Database['tbexist'] = 1;
			$data = json_encode($Database);
			file_put_contents('database.json', $data);
			die("初始化成功，请刷新页面");
		} else {
			die("Database初始化失败，请检查数据库用户名与密码是否具有权限" . mysqli_error($conn));
		}
	} else if ($Database['tbexist'] == 0) {
		$sql = "CREATE TABLE IF NOT EXISTS `popi_all` (
					`popi_time` datetime NOT NULL,
					`popi_text` text NOT NULL,
					`popi_reply` text,
					`popi_ip` varchar(16) NOT NULL,
					`popi_good` tinyint(1) NOT NULL DEFAULT '0'
				) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;";
		if (mysqli_query($conn, $sql)) {
			$Database['tbexist'] = 1;
			$data = json_encode($Database);
			file_put_contents('database.json', $data);
			die("初始化成功，请刷新页面");
		} else {
			die("数据库表单初始化失败，请检查数据库用户名与密码是否具有权限" . mysqli_error($conn));
		}
	}

	mysqli_close($conn);
}


function get_real_ip(){

	$ip=false;
	if(!empty($_SERVER['HTTP_CLIENT_IP'])){
		$ip=$_SERVER['HTTP_CLIENT_IP'];
	}
	if(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
		$ips=explode (', ', $_SERVER['HTTP_X_FORWARDED_FOR']);
		if($ip){ array_unshift($ips, $ip); $ip=FALSE; }
		for ($i=0; $i < count($ips); $i++){
			if(!eregi ('^(10│172.16│192.168).', $ips[$i])){
				$ip=$ips[$i];
				break;
			}
		}
	}
	return ($ip ? $ip : $_SERVER['REMOTE_ADDR']);
}

function rewrite($parameter, $element) {
	cconnect();
	$data = file_get_contents('database.json');  
	$Database = json_decode($data, true);
	$dbhost = $Database['dbhost'];
	$dbuser = $Database['dbuser'];
	$dbpass = $Database['dbpass'];
	$conn = mysqli_connect($dbhost, $dbuser, $dbpass);
	if(! $conn ){
	  die('连接失败: ' . mysqli_error($conn));
	}

	mysqli_query($conn , "set names utf8");

	if ($parameter == 2) {
		$popi_text = $element;
		$popi_ip = get_real_ip();
		 
		$sql = "INSERT INTO popi_all ".
				"(popi_time,popi_text,popi_ip) ".
				"VALUES ".
				"(NOW(),'$popi_text','$popi_ip')";

		mysqli_select_db( $conn, 'popi' );
		$retval = mysqli_query( $conn, $sql );
		if(! $retval ) {
		  die('提问失败: ' . mysqli_error($conn));
		}
	}
	
	else {
		$sql = 'SELECT popi_time, popi_text,
		popi_reply, popi_good
		FROM popi_all';

		mysqli_select_db( $conn, 'popi' );
		$retval = mysqli_query( $conn, $sql );
		if(! $retval )
		{
			die('无法获取数据: ' . mysqli_error($conn));
		}

		$times=array();
		$texts=array();
		$reply=array();
		$good=array();
		$sum = 0;

		while($row = mysqli_fetch_array($retval, MYSQLI_ASSOC)){
			array_push($times,"{$row['popi_time']}");
			array_push($texts,"{$row['popi_text']}");
			array_push($reply,"{$row['popi_reply']}");
			array_push($good,"{$row['popi_good']}");
			if ("{$row['popi_reply']}" != NULL) {
				$sum ++;
			}
		}
		if ($element == "time"){
			return $times;
		}
		elseif ($element == "times") {
			return $sum;
		}
		elseif ($element == "text_s") {
			return $texts;
		}
		elseif ($element == "reply_s") {
			return $reply;
		}
		elseif ($element == "") {
			$all_time = count($times);
			for ($x = $all_time - 1; $x >= 0; $x --) {
				if ($reply[$x] != NULL) {
					echo '<div class="main2" onclick="animation1(';
					echo $x;
					echo ')">';
					echo $texts[$x];
					echo "<div class='lift-time'>";
					time_return($times[$x]);
					echo "</div>";
					if ($good[$x] == 1) {
						include ('svg/up.php');
					}
					include ('svg/right.php');
					echo "</div>";
				}
			}
		}
		else {
			$id = $element;

			$time_s = $sum - 1;
			if ($time_s !== 0) {
				echo "<div class='receiving' id='receiving'>";
				echo "其余的问题(";
				echo $time_s;
				echo ")";
				echo "<div style='margin-bottom: 30px;'></div>";
			}

			$k = 1;
			$all_time = count($times);
			for ($x = $all_time - 1; $x >= 0; $x --) {
				if ($id != $x) {
					if ($reply[$x] != NULL) {
						if ($k < 5) {
							$k ++;
						}
						echo '<div class="main';
						echo $k;
						echo '"';
						echo 'onclick="animation1(';
						echo $x;
						echo ')">';
						echo $texts[$x];
						echo "<div class='lift-time'>";
						time_return($times[$x]);
						echo "</div>";
						if ($good[$x] == 1) {
							include ('svg/up.php');
						}
						include ('svg/right.php');
						echo "</div>";
					}
				}
			}
			if ($times !== 0) {echo "</div>";}
		}
	}
	mysqli_close($conn);
}

function time_return($time) {
	$utime = strtotime($time);
	$diff = time() - $utime;
	$time = date_create($time);
	if ($diff > 24 * 60 *60) {
		echo date_format($time, 'M j');
	}
	elseif ($diff > 60 *60) {
		echo date_format($time, 'G:i');
	}
	elseif ($diff > 60) {
		echo floor($diff / 60);
		echo "分钟前";
	}
	else {
		echo "刚刚";
	}
}

?>