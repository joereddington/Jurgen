<html>
<head>
<script src="handsontable/dist/handsontable.full.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
<link rel="stylesheet" media="screen" href="handsontable/dist/handsontable.full.css">

</head>
<body>
<table id="nextActions" border=1 padding=0>
<?php
$row = 0;
$handle = fopen("/home/joereddington/Jurgen/nextActions/nextActions.csv", "r");
while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
   for ($c=0; $c <= $row; $c++)
{
$pri=7-$data[0];
$task=$data[3];
if (in_array("0",$data)){
$task="------------------------------";
}
$email = "/[^@\s]*@[^@\s]*\.[^@\s]*/";
$num = "/([0-9][0-9][0-9]* )+[0-9]*/";
$url = "/[a-zA-Z]*[:\/\/]*[A-Za-z0-9\-_]+\.+[A-Za-z0-9\.\/%&=\?\-_]+/i";
$replacement = "[removed]";
$task=preg_replace($email, $replacement, $task);
$task=preg_replace($url, $replacement, $task);
$task=preg_replace($num, $replacement, $task);

$running_total+=$data[2];
    print("<TR>");
    print("<TD>".$data[0]." </td>");
    print("<TD>".$data[1]." </td>");
    print("<TD>".$data[2]." </td>");
    print("<TD>".$task." </td>");
    print("<TD>".$data[4]." </td>");
    print("</TR>"); 
}
}
fclose($handle);

?>

</table>
</body></html>
