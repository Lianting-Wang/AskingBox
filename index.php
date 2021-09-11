<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>王仔很忙的提问箱</title>
<link rel="stylesheet" type="text/css" href="css/index.css">
<?php include_once ('function.php');?>
</head>
<body id="body">
<div style="width:0;height:0;overflow:hidden">
   <img src="profile">
</div>
<div class="main1" id="main1" onclick="animation()">
	欢迎向我匿名提问w
	<div class="profile" id="profile"></div>
	<div class="name" id="name">王仔很忙</div>
	<div class="words" id="words">自制提问箱～</div>
	<br>
	<br>
	<br>
	点击输入问题&ensp;
</div>
<script>
	function animation() {
	document.getElementById("main1").style.animation='disappear1 1s';
	document.getElementById("receiving").style.animation='disappear 1s';
	document.getElementById("body").style.animation='move 1s';
	var html = "<!DOCTYPE html><html><head><meta charset='utf-8'><title>王仔很忙的提问箱</title><style type='text/css'>body{margin:0px;background-color:#68b2a0}.main1{position:absolute;display:block;top:18%;width:60%;margin-left:16.9%;padding:25px 3%280px;height:286px;font-size:35px;text-align:center;color:#000;background-color:#fff;border-radius:15px;color:#020;font-weight:900;animation-name:appear1;animation-duration:0.8s}@keyframes appear1{from{top:10%;opacity:0;filter:alpha(opacity=0)}to{top:18%;opacity:1;filter:alpha(opacity=100)}}textarea,select{width:92%;padding:12px 20px;margin:25px 0 10px;height:380px;display:inline-block;border:0px;border-radius:20px;box-sizing:border-box;transition:0.5s;outline:none;background-color:#eeeeeb;font-size:28px;resize:none;animation-name:appear2;animation-duration:0.8s}@keyframes appear2{0%{opacity:0;filter:alpha(opacity=0)}16%{opacity:0;filter:alpha(opacity=0)}100%{opacity:1;filter:alpha(opacity=100)}}input[type=text],textarea:focus{border:0px}input[type=submit]{width:89%;background-color:#c0c3c4;color:white;padding:10px 20px;margin:8px 0;border:none;border-radius:35px;cursor:pointer;outline:none;font-size:25px;animation-name:appear3;animation-duration:0.8s}@keyframes appear3{0%{opacity:0;filter:alpha(opacity=0)}35%{opacity:0;filter:alpha(opacity=0)}100%{opacity:1;filter:alpha(opacity=100)}}</style></head><body><div class='main1'id='main1'onclick='animation()'>欢迎向我匿名提问w<form method='post'action='do.php'><textarea type='text'id='qusetion'oninput='changeColor()'name='qusetion'placeholder='请在此撰写您的问题'></textarea><input type='submit'id='submit'onmouseover='mOver()'onmouseout='mOut()'value='提交'></form><script>function changeColor(){document.getElementById('submit').style.setProperty('background-color','#2c6975')}<\/script></div></body></html>"
	setTimeout(function(){document.write(html)}, 990);
	}

	function animation1(id) {
		document.getElementById("body").style.animation='disappear 0.6s';
		setTimeout(function(){window.open('pages.php?id=' + id, '_parent', 'true');}, 500);
	}
</script>
<div class="receiving" id="receiving">
	<?php
		$times = rewrite(1, "times");
		if ($times !== 0) {
			echo "已回答的问题(";
			echo $times;
			echo ")";
			echo "<div style='margin-bottom: 30px;'></div>";
		}
	;?>
	<?php rewrite("","");?>
</div>
<script>
	var h=window.innerHeight * 0.4 + 564;
	receiving.style.setProperty('margin-top', h + 'px');
</script>
</body>
</html>