<?php
ob_start();
session_start();
$power="Plus256 Network";
$short_name="TechShule";
$short_descr="Tech News, Startups, Events, Reviews, Tips";
$long_descr="TechShule is a Tech Knowledge Sharing Platform Devoted to Inspiring Innovation in Africa.";
$tagline="Inspiring Innovation";
$logo="gra/logo.png";
$menu_icon="gra/menu_icon.png";
$cover="img/cover.jpg";
$conn = mysqli_connect("127.0.0.1", "root", "");
if (!$conn) {
	die('Connect Error (' . mysqli_error());
}
$db_selected = mysqli_select_db($conn, 'techshule');
if (!$db_selected) {
	die ('Can\'t use db : ' . mysqli_error());
}
//Dynamically Setting Facebook Open Graph Properties
if(isset($_GET['id'])){
	$shule_id=$_GET['id'];
	$q=mysqli_query($conn, "select *, s.id as sid from shule as s join pic as p join user as u on s.author=u.id and s.cover=p.id where s.id=$shule_id");
	$r=mysqli_fetch_assoc($q);
	$og_title=$r['title']; $og_cover="http://www.techshule.com/img/".$r['src']; $og_descr=strip_tags($r['body']);
}
else{
	$og_title="TechShule";
	$og_descr=$tagline;
	$og_cover="http://www.techShule.com/gra/logo.png";
}
?>