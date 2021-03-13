<?php 
require_once("includes/config.php");
// if(!empty($_POST["studentid"])) {
//   $studentid= strtoupper($_POST["studentid"]);
 
    $sql ="SELECT * FROM tblstudents";
$query= $dbh -> prepare($sql);
//$query-> bindParam(':studentid', $studentid, PDO::PARAM_STR);
//$query-> bindParam(':studentid', $studentid, PDO::PARAM_STR);
$query-> execute();
$results = $query -> fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query -> rowCount() > 0)
{
foreach ($results as $result) {
if($result->Status==0)
{
//echo "<span style='color:red'> Student ID Blocked </span>"."<br />";
//echo "<b>Student Name-</b>" .$result->FullName;
//echo "<script>$('#submit').prop('disabled',true);</script>";
echo "<option value='' style='color:red'>No Sutdent data available</option>";
} else {
?>


<?php  
$name = htmlentities($result->FullName);
$id = htmlentities($result->StudentId);
echo "<option value='$id'>$name</option>";
//echo htmlentities($result->FullName);
 //echo "<script>$('#submit').prop('disabled',false);</script>";
}
}
}
 else{
  
  echo "<option style='color:red' value=''> Student data not available.</option>";
}
//}



?>
