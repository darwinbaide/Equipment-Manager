<?php
$arg = $_POST['registration'];// the argument passed
Refresh(arg);//calls the function
function Refresh($name){
$csvFile = file('printer.csv');
$string = str_replace('�', '', $csvFile);
$hold= "";
int count2=0;
foreach ($csvFile as $line=> $v) {
	if(count2 >0){// skips the first line
$substring = substr($line, 0, strpos($line, ','));// this is the first row of IP
echo $substring."\n";// teset
$out = shell_exec('python prol.py '.$substring);//executes the python with ip
$line = $line.",".$out;//merges the new data with old
$hold1= $hold. " \n".$line;//stores the line as string

}
else{
	hold=hold+line;
}// this should make hold1 have all the data divided by a new line
count2=count2+1;
}
fclose($handle);

$handle = fopen("printer.csv", "w");
$arr = explode("\n", $hold);
foreach ($arr as &$value) {
    fwrite($handle, $value);

}// this will write every line from the explode array into the csv file


}

 ?>
