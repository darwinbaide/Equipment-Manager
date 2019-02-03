<?php

$log_directory = '/Users/darwinbaide/documents/printers';
$total='<div class="tg-wrap"><table id="table1" border="1">\n ';
	$results_array = array();

	if (is_dir($log_directory))
	{
	        if ($handle = opendir($log_directory))
	        {
	                //Notice the parentheses I added:
	                while(($file = readdir($handle)) !== FALSE)
	                {
	                        $results_array[] = $file;
	                }
	                closedir($handle);
	        }
	}

	//Output findings
	$count = 1;
	foreach($results_array as $value)
	{
		$total =$total.'<tr>
    <th class="tg-s"'.$count.'>';
	    $total=$total.$value . " </th>\n";
	    $total =$total.'<th><form action="'.$value.'" method="get">
    <input type="submit" value="Open File">
  </form> <th>';
  $total=$total."</tr>";
	    $count=$count+1;
	}
	$total=$total."</table></div>\n";
	
	echo $total;
?>	