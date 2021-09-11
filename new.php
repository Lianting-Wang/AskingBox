<!DOCTYPE html>
<html>
<head>
<meta charset='utf-8'>
<title>王仔很忙的提问箱</title>
<link rel="stylesheet" type="text/css" href="css/new.css">
</head>
<body>
	<div class='main1'>
		<p><?php session_start();echo $_SESSION['text'];?></p>
		<div class="date">刚刚</div>
	</div>
	<div class='main1_1' onclick="jump()">
		<div class='main1_2'>
			<p>感谢你的提问<br>主人马上就会来回答啦～</p>
		</div>
		<button>查看其他回答</button>
	</div>
	<script>
		function jump() {
			window.open('index.php','_parent','true')
		}
	</script>	
</body>
</html>