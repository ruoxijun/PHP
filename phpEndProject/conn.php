<?php
	header("Content-type:text/html;charset=utf-8");
	@mysql_connect("localhost","root","88888888") or die("服务器连接失败");
	mysql_select_db("phpendpro") or die("数据库不存在");
	mysql_query("set names utf8");
?>