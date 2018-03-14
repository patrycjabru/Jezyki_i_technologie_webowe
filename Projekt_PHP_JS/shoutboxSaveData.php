<?php
$message=$_POST["name"].": ".$_POST["message"]."\n";

$linecount = 0;
$file = fopen("shoutbox", "r");
while(!feof($file)){
    $line = fgets($file);
    $linecount++;
}
fclose($file);


if ($linecount>20){
    $fileAsArray=file("shoutbox");
    echo $fileAsArray;
    $file=fopen("shoutbox","w");
    $contentToSave="";
    $lineNumber=0;
    foreach ($fileAsArray as $line) {
        $lineNumber++;
        if($lineNumber==1) {
            continue;
        }
        $contentToSave=$contentToSave.$line;
    }
    fwrite($file,$contentToSave);
    fclose($file);
}
$file=fopen("shoutbox","a");
fwrite($file,$message);
fclose($file);