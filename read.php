<?php
//$READ_GROUP $READ_PAGE
if($READ_GROUP==null and $READ_PAGE==null) die('错误的打开方式！');
if($READ_PAGE==null) $READ_PAGE=0;
$group_item_array=$ARRAY[$READ_GROUP];

$item_json=json_encode($group_item_array);

$startday=file_get_contents('startday');
$date=explode('-', $startday);
$during=time()-mktime(0,0,0,$date[1],$date[2],$date[0]);
$week=(int)($during/604800)+1;
if($during<0) $week=1;
?>
<!DOCTYPE html>

<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width,initial-scale=1">
<title><?php echo($READ_GROUP);?></title>
</head>

<body>
<div align="center">
	<div style="display: flex;justify-content: space-between;">
		<button style="width: 30%;" onclick="exam()">查看考试安排</button>
		<span style="width: 30%;" id="page"></span>
		<button style="width: 30%;" onclick="thisweek()">查看本周课表</button>
	</div>
	<img src="" id="img" style="width: 100%;margin-top: 10px;margin-bottom: 10px;" onclick="picture()">
	<br><br>
	<a href="https://github.com/unidee/kb/" target="_blank" style="color: #00AAFF;text-decoration: none;">版权所有 &copy; 2021</a>
</div>

<script type="text/javascript">
var json='<?php echo($item_json);?>';
var list;
var total;
var page;
var page_get=<?php echo($READ_PAGE);?>;
var week_this=<?php echo($week);?>;
var group='<?php echo($READ_GROUP)?>';
init();
function init(){
	list=JSON.parse(json);
	total=list.length;
	page=1;
	if(week_this>=1&&week_this<=total-2) page=week_this+2;
	if(page_get>=1&&page_get<=total) page=page_get;
	f5();
}
function f5(){
	document.getElementById("img").src="image/"+group+"/"+list[page-1]+"?"+Math.random();
	document.getElementById("page").innerHTML=remove_end(list[page-1])+" - "+page+"/"+total;
}
function picture(){
	var w=document.body.clientWidth;
	var x=event.pageX;
	if(x<w/2) previous();
	else next();
}
function previous(){
	if(page>1){ page--; f5(); }
}
function next(){
	if(page<total){ page++; f5(); }
}
function exam(){ page=1; f5(); }
function thisweek(){ if(week_this>=1&&week_this<=total-2) page=week_this+2; f5(); }
function remove_end(str){ return str.split(".")[0]; }
</script>
</body>
