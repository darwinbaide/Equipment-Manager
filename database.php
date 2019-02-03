<?php
error_reporting(E_ALL);
ini_set('display_errors',1);

//var_dump($_POST);
//$name = $_POST['password'];
$servername = "localhost";
$username = "root";
$password = "password";
$dbname = "equipment";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
//echo "     Connection : Succesful\n\n";
//----------------------------------------------------------------------------

if($_POST['version'] == 'login'){
  $username =$_POST['username']; $password =$_POST['password'];
  $check= "0";// this is  a boolean to see if any usernames matched with password

  $sql = "SELECT * FROM users";// sql command to send
  $result = $conn->query($sql);//holds the result of the search

  if ($result== false){ echo "this has failed all the things \n\n";}
  $row = mysqli_fetch_array($result);
  while($row != false){
    if($row['username'] == $username){
       if($row['password'] == $password){
      $check = "1";
    //  echo "helloworld";
    }
  }// while loop runs through all the users
  $row = mysqli_fetch_array($result);//grabds the next row
  }

  if($check == "1"){
    $arr = array('Usertype' => "student", 'response' => "Succesful");
    echo json_encode($arr);
  }
  else{
    $arr = array('Usertype' => "student", 'response' => "Incorrect");
    echo json_encode($arr);
  }// send back the response

}


elseif ($_POST['version'] == 'entry'){
  $po1 = $_POST['po1'];
  $po2 = $_POST['po2'];
  $po3 = $_POST['po3'];
  $po4 = $_POST['po4'];
  $de1 = $_POST['de1'];
  $de2 = $_POST['de2'];
  $de3 = $_POST['de3'];
  $de4 = $_POST['de4'];
  $se1 = $_POST['se1'];
  $se2 = $_POST['se2'];
  $se3 = $_POST['se4'];
  $se4 = $_POST['se4'];
  $Fname = $_POST['fname'];
  $Lname = $_POST['lname'];
  $dates = $_POST['date'];
  $department1 = $_POST['department'];
  $address1 = $_POST['address'];
  $sign1 = $_POST['sign'];
$sql = "INSERT INTO items (po,description,serials,firstname,lastname,dates,department,address,signa) VALUES ('$po1','$de1','$se1','$Fname','$Lname','$dates','$department1','$address1','$sign1')";
$result = $conn->query($sql);//holds the result of the search


if($po2 != ""){
  $sql2 = "INSERT INTO items (po,description,serials,firstname,lastname,dates,department,address,signa) VALUES ('$po2','$de2','$se2','$Fname','$Lname','$dates','$department1','$address1','$sign1')";
  $result2 = $conn->query($sql2);//holds the result of the search
}
if($po3 != ""){
  $sql3 = "INSERT INTO items (po,description,serials,firstname,lastname,dates,department,address,signa) VALUES ('$po3','$de3','$se3','$Fname','$Lname','$dates','$department1','$address1','$sign1')";
  $result3 = $conn->query($sql3);//holds the result of the search
}if($po4 != ""){
  $sql4 = "INSERT INTO items (po,description,serials,firstname,lastname,dates,department,address,signa) VALUES ('$po4','$de4','$se4','$Fname','$Lname','$dates','$department1','$address1','$sign1')";
  $result4 = $conn->query($sql4);//holds the result of the search
}



if($result){$arr = array('response' => "Added");
echo json_encode($arr);}
else{$arr = array('response' => "Not Added");
echo json_encode($arr);}

}// end of else if

elseif ($_POST['version'] == 'save'){
  $po1 = $_POST['po1'];
  $po2 = $_POST['po2'];
  $po3 = $_POST['po3'];
  $po4 = $_POST['po4'];
  $de1 = $_POST['de1'];
  $de2 = $_POST['de2'];
  $de3 = $_POST['de3'];
  $de4 = $_POST['de4'];
  $se1 = $_POST['se1'];
  $se2 = $_POST['se2'];
  $se3 = $_POST['se3'];
  $se4 = $_POST['se4'];
  $Fname = $_POST['fname'];
  $Lname = $_POST['lname'];
  $dates = $_POST['date'];
  $department1 = $_POST['department'];
  $address1 = $_POST['address'];
$sql  = "INSERT INTO saved (po1, de1, se1, firstname, lastname, dates, department, address, po2, po3, po4, de2, de3, de4, se2, se3, se4)VALUES (\"$po1\", \"$de1\", \"$se1\", \"$Fname\", \"$Lname\", \"$dates\", \"$department1\", \"$address1\", \"$po2\", \"$po3\", \"$po4\", \"$de2\", \"$de3\", \"$de4\", \"$se2\", \"$se3\", \"$se4\")";
$result = $conn->query($sql);//holds the result of the search

//----------------------------------------------------------------------------
//-----------------------------------------------------------------------------
if($result){$arr = array('response' => "Added");
echo json_encode($arr);}
else{$arr = array('response' => "Not Added");
echo json_encode($arr);}
$conn->close();
}// end of else if
















elseif ($_POST['version'] == 'saves'){

$sql = "SELECT * FROM saved ";
$result = $conn->query($sql);//holds the result of the search
$text="";
//----------------------------------------------------------------------------
//-----------------------------------------------------------------------------
if ($result== false){ echo "Nothing Found. \n\n";}
else{
//echo "testing";

$row = mysqli_fetch_array($result);
while($row != false){
  $f1=$row['firstname']; $l1=$row['lastname']; $da1=$row['dates'];
  $da2=$row['department']; $r1=$row['address']; $n1=$row['item'];
  $d1=$row['de1'];$s1=$row['se1'];$p1=$row['po1'];
  $d2=$row['de2'];$s2=$row['se2'];$p2=$row['po2'];
  $d3=$row['de3'];$s3=$row['se3'];$p3=$row['po3'];
  $d4=$row['de4'];$s4=$row['se4'];$p4=$row['po4'];
  $text=$text. "-#-". $f1.",". $l1.",". $da1.",". $da2.",". $r1.",". $n1.",";

  $text=$text.$d1."-". $d2."-". $d3."-". $d4."-". $s1."-". $s2."-". $s3."-". $s4."-". $p1."-". $p2."-". $p3."-". $p4;






$row = mysqli_fetch_array($result);//grabds the next row
}

echo $text;

}// end of if else
$conn->close();
}// end of else if



elseif ($_POST['version'] == 'search'){

$sql = "SELECT * FROM items ";
$result = $conn->query($sql);//holds the result of the search

//----------------------------------------------------------------------------
//-----------------------------------------------------------------------------
if ($result== false){ echo "Nothing Found. \n\n";}
else{
//echo "testing";

$text="<table class='customers'>
<tr>
  <th>Edit# </th>
  <th>First Name </th>
  <th>Last name </th>
  <th>Date </th>
  <th>Department </th>
  <th>Address </th>
  <th>PO Number </th>
  <th>Description </th>
  <th>Serial </th>
</tr>

";




$row = mysqli_fetch_array($result);
while($row != false){
  $f1=$row['firstname']; $l1=$row['lastname']; $d1=$row['dates'];
  $d2=$row['department']; $r1=$row['address'];
  $po=$row['po']; $de=$row['description'];
  $se=$row['serials']; $n1=$row['itemnumber'];
  $text= $text."
<tr id=".$n1.">
  <td id=".$n1."-1"."> $n1 </td>
  <td id=".$n1."-2"."> $f1 </td>
  <td id=".$n1."-3"."> $l1 </td>
  <td id=".$n1."-4"."> $d1 </td>
  <td id=".$n1."-5"."> $d2 </td>
  <td id=".$n1."-6"."> $r1 </td>
  <td id=".$n1."-7"."> $po </td>
  <td id=".$n1."-8"."> $de </td>
  <td id=".$n1."-9"."> $se </td>
</tr>
  ";
$row = mysqli_fetch_array($result);//grabds the next row
}
$text=$text."
</table>
";
echo $text;

}// end of if else

}// end of else if










elseif ($_POST['version'] == 'lookup'){

$sql = "SELECT * FROM items ";
$result = $conn->query($sql);//holds the result of the search

//----------------------------------------------------------------------------
//-----------------------------------------------------------------------------
if ($result== false){ echo "Nothing Found. \n\n";}
else{
//echo "testing";

$text="<table class='customers'>
<tr>
  <th>Edit# </th>
  <th>First Name </th>
  <th>Last name </th>
  <th>Date </th>
  <th>Department </th>
  <th>Address </th>
  <th>PO Number </th>
  <th>Description </th>
  <th>Serial </th>
</tr>

";




$row = mysqli_fetch_array($result);
while($row != false){
  $f1=$row['firstname']; $l1=$row['lastname']; $d1=$row['dates'];
  $d2=$row['department']; $r1=$row['address'];
  $po=$row['po']; $de=$row['description'];
  $se=$row['serials']; $n1=$row['itemnumber'];
if( strpos($row[$_POST['type']], $_POST['query']) === false ){
  $row = mysqli_fetch_array($result);//grabds the next row
  continue;
}// if not matching then skip

  $text= $text."
<tr id=".$n1.">
  <td> $n1 </td>
  <td> $f1 </td>
  <td> $l1 </td>
  <td> $d1 </td>
  <td> $d2 </td>
  <td> $r1 </td>
  <td> $po </td>
  <td> $de </td>
  <td> $se </td>
</tr>
  ";
$row = mysqli_fetch_array($result);//grabds the next row
}
$text=$text."
</table>
";
echo $text;

}// end of if else

}// end of else if




elseif ($_POST['version'] == 'topdf'){
  var_dump($_POST);
  $entrynumber = $_POST['num'];

$sql = "SELECT * FROM items WHERE  itemnumber = $entrynumber";
$result = $conn->query($sql);//holds the result of the search
$text="";
//----------------------------------------------------------------------------
//-----------------------------------------------------------------------------
if ($result== false){ echo "Nothing Found. \n\n";}
else{
//echo "testing";
$row = mysqli_fetch_array($result);
while($row){
  $f1=$row['firstname']; $l1=$row['lastname']; $da1=$row['dates'];
  $da2=$row['department']; $r1=$row['address']; $n1=$row['itemnumber'];
  $d1=$row['description'];$s1=$row['serials'];$p1=$row['po'];
  $sign1=$row['signa'];
$text= $f1."#".$l1."#".$da1."#".$da2."#".$r1."#".$n1."#".$d1."#".$s1."#".$p1."#".$sign1;
$row = mysqli_fetch_array($result);//grabds the next row
}
echo $text;


require('fpdf.php');


$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',16);
$pdf->Cell(40,10,'Name: ');
$pdf->Cell(40,10,'test2222222',1,1);
$pdf->Output('F','filename1.pdf');



















}// end of if else
}// end of else if





























///////////////////////////////////////////////////////////////
//end
$conn->close();
?>
