<?PHP
$pcName=gethostbyaddr($_SERVER['REMOTE_ADDR']);
if($pcName=="x1"){
    $ROOT="/sarzamin-project/admin";
}else if($pcName=="DESKTOP-LFHNS14"){
    $ROOT="/admin";
}else if($pcName=="DESKTOP-E2CHPPH"){
    $ROOT="/admin";
} else if($pcName=="Muner"){
    $ROOT="/sarzamin-project";
}

?>