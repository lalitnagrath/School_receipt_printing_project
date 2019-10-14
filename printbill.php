<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Print</title>
</head>
<body>

<?php
include('db.php');
if($_POST['submit']){

  $student_name=$_POST['student_name'];
   // echo ' <b>Student Value </b>'. $student_name .' ';
    $reg_no=$_POST['reg_no'];
   // echo $reg_no;
    $student_class=$_POST['student_class'];
   // echo ' '.$student_class.' ';
    $time_now=$_POST['time_now'];
    //$time_now=STR_TO_DATE($time_now,"%m-%d-%y");
  //  echo $time_now;
   // echo $time_now. ' ';
    $depositor=$_POST['depositor'];
  //  echo $depositor. '<br>';
    $particular=$_POST['newadmission']. ' '. $_POST['yearly']. ' '. $_POST['diary']. ' '. $_POST['tie']. ' '. $_POST['belt']. ' '. $_POST['adform']. ' '. $_POST['icard']. ' ';
   // echo ' <b>Particulars selected- </b>'. $particular. '<br>';
    //$tuitionfees=;

    $tutionfees=$_POST['jan']. ' '. $_POST['feb']. ' '. $_POST['mar']. ' '. $_POST['apr']. ' '. $_POST['may']. ' '. $_POST['jun']. ' '. $_POST['jul']. ' '. $_POST['aug']. ' '. $_POST['sep']. ' '. $_POST['oct']. ' '. $_POST['nov']. ' '. $_POST['dec']. ' ';

    $tutionfees1=$_POST['jan']. ''. $_POST['feb']. ''. $_POST['mar']. ''. $_POST['apr']. ''. $_POST['may']. ''. $_POST['jun']. ''. $_POST['jul'].''. $_POST['aug']. ''. $_POST['sep']. ''. $_POST['oct']. ''. $_POST['nov']. ''. $_POST['dec']. '';
  //  echo ' <b>Tution fees to be paid for </b>'.$tutionfees.'<br>';
    $fees=strlen($tutionfees1);
    $feestobepaid =$fees/3;
   // echo ' You selected '.$feestobepaid .' Months';
    // echo $feestobepaid;
  //  echo ' <br>Fees is '.$feestobepaid*150..'<br>';
    $finalfees=$feestobepaid*150;
    
    // echo $particular .'<br>';
    // echo $tutionfees .'<br>'. $tutionfees1;
    //monthly fees 150rs , new admission 50 , yearly 200 , diary 40, tie 40 , blet 40,ad form 30 , i card 25
    
    $receipt_no='SELECT receipt FROM schoolbill ORDER BY receipt DESC LIMIT 1';
    $res=mysqli_query($conn,$receipt_no);
    $data=mysqli_fetch_assoc($res);
    
    $receipt=$data['receipt'];
  //  echo $receipt.'<--<br>';
    $receipt1 =$receipt+1;
    $var=0;

    if($_POST['newadmission']){
     // echo "<br> new admission  selected<br>";
     $var=+50;
     //echo '-->'.$var .'<--Particular Value at newad <br>';


    }


    if($_POST['yearly']){
      $var=$var+200;
     // echo '-->'.$var .'<--Particular Value at newad <br>';

     // echo "<br> yearly  selected<br>";

    }

    if($_POST['diary']){
      $var=$var+40;
     // echo '-->'.$var .'<--Particular Value at newad <br>';

     // echo "<br> diary  selected<br>";
    }

    if($_POST['tie']){
      $var=$var+40;
     // echo '-->'.$var .'<--Particular Value at newad <br>';

     // echo "<br> tie  selected<br>";
    }

    if($_POST['belt']){
      $var=$var+40;
      echo '-->'.$var .'<--Particular Value at newad <br>';

    //  echo "<br> belt  selected<br>";
    }

    if($_POST['adform']){
      $var=$var+30;
    //  echo '-->'.$var .'<--Particular Value at newad <br>';

     // echo "<br> adform  selected<br>";
    }
   // echo '-->'.$var .'<--Particular Value at newad <br>';

    if($_POST['icard']){
      $var=$var+25;
     // echo '-->'.$var .'<--Particular Value at newad <br><br>';

    //  echo "<br> icard  selected<br>";
    }
    $fees=$var+$finalfees;
   // echo $var.'Particular Value at END <br>';
    //echo "FInal Bill " .$fees .' Fees to be paid--> '. $finalfees .' for Months ->'. $feestobepaid. '<br>';

    // $var is final payment for PArticulars ,$feestobepaid is for fees to be paid in months.

    $feesquery="INSERT INTO schoolbill values('$student_name','$reg_no','$student_class','$time_now','$receipt1','$depositor','$particular','$finalfees')";
    $feeresult=mysqli_query($conn,$feesquery);
    if($feeresult){
    //  echo 'query succeded';
      $sql = "SELECT * FROM schoolbill";
$result = $conn->query($sql);
echo "<br><hr>Exisitng Records<br>";

if ($result->num_rows > 0) {
    // output data of each row
    
    while($row = $result->fetch_assoc()) {
        // echo "<br><b>name: </b>" . $row["student_name"]. " <b>- reg no: </b>" . $row["reg_no"]. " <b>student_Class:-</b> " . $row["student_class"]. " <b>time</b>  ". $row["time_now"]. " - receipt " . $row["receipt"]. " Particular-". $row['particulars']. ' for Month '. 
        // $row['tutionfees'];

        //mysql_real_escape_string(
          echo "<br><b>name: </b>" . mysqli_real_escape_string($conn,$row["student_name"]). " <b>- reg no: </b>" . $row["reg_no"]. " <b>student_Class:-</b> " . $row["student_class"]. " <b>time</b>  ". $row["time_now"]. " - receipt " . $row["receipt"]. " Particular-". $row['particulars']. ' for Month '. 
          $row['tutionfees'];
  
    }
    echo "<br>end of records--->>>><br><br>";
} else {
    echo "0 results";
}

?>


      <!--  Print the form -->


      <table border="1px solid black" style="padding:1px">
      <tr>
      <th colspan=4><h2 style="padding:10px">MODERN PUBLIC SCHOOL</h2>       </th>
      <tr><td colspan=3>Student Name:<b><?php echo $student_name;?></b><br> Paid By:<b><?php echo $depositor;?></b><br>Class:<b><?php echo $student_class;?></b></td><td colspan=1>Date<b><?php echo $time_now;?></b><br>RC NO.<b><?php echo $receipt1;?></b>
      </td></tr>
     
      <tr>
        <th>Particular</th>
        <th>Fees</th>
        <th>Total</th>
        <th>Balance</th></tr>
        <tr>
        <td style="padding-bottom:150px; width:200px"><b><?php echo $particular ;?></b></td>
        <td style="padding-bottom:110px; "><b><?php echo $tutionfees;?></b></td>
        <td style="padding-bottom:110px; "><b><?php echo $var .' + '. $finalfees;?></b></td>
        <td style="padding-bottom:110px; "><b><?php ;?></b></td>
      </tr>
      <tr><td colspan='2'>Total</td>
      <td><b><?php echo $fees;?></b></td>
      <td><b><?php  ;?></b></td></tr>     </table>
     <p style="padding-left:50px"> <a href="index.php">Generate New</a>
      <button onclick="myFunction()">Print </p></button>
  
  <script>
  function myFunction() {
    window.print();
  }
  </script>
  <?php 


    }else{
      echo '<p style="color:Red; font-size:20px">Error adding the Values to Database<br>';
      echo("</p><b>Error description: " . mysqli_error($conn));
    }
 



    } else{
      echo "Didnt received any date, please fill form on <a href='index.php'>home Page</a>";
    }
?>



</body>
</html>