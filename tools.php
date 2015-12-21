<?php
// 图片相对路径
// token 防盗链密钥
// 授权1分钟后过期
function upyun_get_link($path, $key = 'ly729', $etime = 600){
	$etime = time()+$etime; // 授权1分钟后过期
	return 'http://'.CDNLINK.$path. '?_upt='. substr(md5($key.'&'.$etime.'&'.$path), 12,8).$etime;
}