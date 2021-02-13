<?php
if($LIST_GROUP==null) die('错误的打开方式！');

function display_group(){
	global $LIST_GROUP;
	foreach ($LIST_GROUP as $key => $value) {
		echo('<p><a href="?'.$value.'">'.$value.'</a><p>'."\n");
	}
}
?>
<!DOCTYPE html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<title>目录</title>
</head>

<body>
	<div style="font-size: 26px;text-align: center;font-weight: bold;">
		<?php display_group();?>
	</div>
	<div style="text-align: center;">
		<br>
		<a href="https://github.com/unidee/kb/" target="_blank" style="color: #00AAFF;text-decoration: none;">版权所有 &copy; 2021</a>
	</div>
</body>
