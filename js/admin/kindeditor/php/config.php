<?php 
define(HOMEURL,"http://chenhao-100.chenhao.net");
define(HOMEPATH,"/home/excms/chenhao-back/");

// [MC] 以下为水印设置
$mc_water    = 1;//1为加水印, 其它为不加.
$mc_water_type   = 1;//水印类型,建议使用图片(1为文字,2为图片)
$mc_water_string  = 'www.baidu.com';//水印字符串,默认填写空;例: www.baidu.com
$mc_water_img   = '';//水印图片,默认填写空,请将图片上传至：attachments/water/目录下,例: logo.gif
$mc_water_alpha   = 80;//水印透明度
$mc_water_pos     = 9;//水印位置，10种状态【0为随机，1为顶端居左，2为顶端居中，3为顶端居右；4为中部居左，5为中部居中，6为中部居右；7为底端居左，8为底端居中，9为底端居】
?>