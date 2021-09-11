<!DOCTYPE html>
<html>
<head>
<meta charset='utf-8'>
<title>王仔很忙的提问箱</title>
<link rel="stylesheet" type="text/css" href="css/pages.css">
<style type="text/css">
<?php 
for ($i=2; $i <= 5; $i++) { 
	$i_1 = $i + 2;
	echo '.main';
	echo $i;
	echo '{position:relative;margin-left:8%;margin-bottom:20px;min-height:40px;width:76%;padding:170px 36px 160px;text-align:left;font-size:30px;color:#000;background-color:#e1eddf;border-radius:18px;box-shadow: 0 3px 4px #7d9079;animation-name:appear_';
	echo $i_1;
	echo ';animation-duration:1.4s;} ';
}?>
</style>
<?php include_once('function.php');$id=$_GET['id'];?>
</head>
<body id="body">
	<script type="text/javascript">
		function animation1(id) {
			document.getElementById("body").style.animation='disappear 0.72s';
			setTimeout(function(){window.open('pages.php?id=' + id, '_parent', 'true');}, 640);
		}
	</script>
	<div class='main1'>
		<p><?php echo rewrite(1,"text_s")[$id];?></p>
		<div class="date"><?php echo time_return(rewrite(1,"time")[$id]);?></div>
	</div>
	<div class='main1_1'>
		<div class="profile" id="profile"></div>
		<div class="name" id="name">王仔很忙</div>
		<p><?php echo rewrite(1,"reply_s")[$id];?></p>
		<span>————著作权归wlt所有</span>
		<button id="button" onclick="animation_b()">向主人提问</button>
		<script type="text/javascript">
			function animation_b() {
				document.getElementById("body").style.animation='disappear 0.72s';
				var html = "<!DOCTYPE html><html><head><meta charset='utf-8'><title>王仔很忙的提问箱</title><style type='text/css'>body{margin:0px;background-color:#68b2a0}.main1{position:absolute;display:block;top:18%;width:60%;margin-left:16.9%;padding:25px 3%280px;height:286px;font-size:35px;text-align:center;color:#000;background-color:#fff;border-radius:15px;color:#020;font-weight:900;animation-name:appear1;animation-duration:0.8s}@keyframes appear1{from{top:10%;opacity:0;filter:alpha(opacity=0)}to{top:18%;opacity:1;filter:alpha(opacity=100)}}textarea,select{width:92%;padding:12px 20px;margin:25px 0 10px;height:380px;display:inline-block;border:0px;border-radius:20px;box-sizing:border-box;transition:0.5s;outline:none;background-color:#eeeeeb;font-size:28px;resize:none;animation-name:appear2;animation-duration:0.8s}@keyframes appear2{0%{opacity:0;filter:alpha(opacity=0)}16%{opacity:0;filter:alpha(opacity=0)}100%{opacity:1;filter:alpha(opacity=100)}}input[type=text],textarea:focus{border:0px}input[type=submit]{width:89%;background-color:#c0c3c4;color:white;padding:10px 20px;margin:8px 0;border:none;border-radius:35px;cursor:pointer;outline:none;font-size:25px;animation-name:appear3;animation-duration:0.8s}@keyframes appear3{0%{opacity:0;filter:alpha(opacity=0)}35%{opacity:0;filter:alpha(opacity=0)}100%{opacity:1;filter:alpha(opacity=100)}}</style></head><body><div class='main1'id='main1'onclick='animation()'>欢迎向我匿名提问w<form method='post'action='do.php'><textarea type='text'id='qusetion'oninput='changeColor()'name='qusetion'placeholder='请在此撰写您的问题'></textarea><input type='submit'id='submit'onmouseover='mOver()'onmouseout='mOut()'value='提交'></form><script>function changeColor(){document.getElementById('submit').style.setProperty('background-color','#2c6975')}<\/script></div></body></html>"
				setTimeout(function(){document.write(html)}, 680);
			}
		</script>
	</div>
	<?php rewrite("","$id");?>
</body>
</html>