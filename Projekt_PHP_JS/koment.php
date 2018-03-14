<!DOCTYPE html>
<?php
    include 'menu.php';
	$typeOfComment=$_GET['typeOfComment'];
	$name=$_GET['name'];
	$surname=$_GET['surname'];
	$nickname=$_GET['nickname'];
	$blogName=$_GET['blog'];
	$postId=$_GET['wpis'];
	$comment=$_GET['comment'];
	$info = getdate();
	$date = $info['mday'];
	$month = $info['mon'];
	$year = $info['year'];
	$hour = $info['hours'];
	$min = $info['minutes'];
	$sec = $info['seconds'];
	if ($date<10)
	    $date='0'.$date;
	if ($month<10)
	    $month='0'.$month;
	if ($hour<10)
	    $hour='0'.$hour;
	if ($min<10)
	    $min='0'.$min;
	if ($sec<10)
	    $sec='0'.$sec;
	$fullDate=$year.$month.$date.$hour.$min.$sec;
	$path="~/public_html/PROJEKT/users";
	$fullPath=$path."/".$blogName."/".$postId.".k";
//	echo $fullPath."/".$postId.".k";
	if (!file_exists($fullPath))
		mkdir($fullPath, 0755);
	$listOfComments=scandir("users"."/".$blogName."/".$postId.".k");
	$number=sizeof($listOfComments)-2;
	touch("users"."/".$blogName."/".$postId.".k"."/".$number);
	chmod("users"."/".$blogName."/".$postId.".k"."/".$number,0755);
	$commentFile = fopen("users"."/".$blogName."/".$postId.".k"."/".$number, "w") or die("Unable to open file!");
	fwrite($commentFile, $typeOfComment);
	fwrite($commentFile,"\r\n");
	fwrite($commentFile, $fullDate);
	fwrite($commentFile,"\r\n");
	fwrite($commentFile, $name." ".$surname." ".$nickname);
	fwrite($commentFile,"\r\n");
	fwrite($commentFile,$comment);
	echo <<<HTML
	<a href="menu.php">Wróc do menu głównego</a><br/>
HTML;
?>
