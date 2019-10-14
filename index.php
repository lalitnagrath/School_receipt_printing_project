<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Print School Bills</title>
    <script>
 function validateForm() {
  var x = document.forms["schooladd"]["student_name"].value;
  var y = document.forms["schooladd"]["reg_no"].value;

  if (x == "") {
    alert("Name must be filled out");
    return false;
  }
  if (y == "") {
    alert("Reg No. must be filled out");
    return false;
  }

} </script>
</head>
<body>

<form method="post" name="schooladd" onsubmit="return validateForm()" action="printbill.php">
<table>
    <th>Student<div style="color:red">*</div></th>
    <th>Reg.No<div style="color:red">*</div></th>
    <th>Class</th>
    <th>Date</th>
    <th>Deposited by</th>
    <tr>
        <td><input type="text" name="student_name" placeholder="Name (required)"></td>
        <td><input type="text" name="reg_no" placeholder="Reg No.(required)"></td>
        <td>
            <select name="student_class"><option selected>--Class--</option>
            <option value="Nursery">Nursery</option>
            <option value="LKG">LKG</option>
            <option value="UKG">UKG</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option></select> </td>


        
        </td>
        <td><input type="text" name="time_now"  value="<?php echo date('d-m-Y');?>" placeholder="Date"></td>
        <td><input type="text" name="depositor" placeholder="Deposited by"></td>

    <tr bgcolor="grey"><td colspan ="5">
    <fieldset>
    <legend> Particulars</legend>
    <label> New Admissions</label> <input type="checkbox" value="newadmission" name="newadmission">|
    <label> Yearly</label> <input type="checkbox" value="yearly" name="yearly">|
    <label> Dairy</label> <input type="checkbox" value="diary" name="diary">|
    <label> Tie</label> <input type="checkbox" value="tie" name="tie">|
    <label> Belt</label> <input type="checkbox" value="belt" name="belt">|
    <label> Ad Form</label> <input type="checkbox" value="adform" name="adform">|
    <label> I Card</label> <input type="checkbox" value="icard" name="icard">
    </fieldset></td>
    </tr>

    <tr bgcolor="white"><td colspan ="5">
    <fieldset>
    <legend> Tuition Fees</legend>
    <label> April</label> <input type="checkbox" value="apr" name="apr">|
    <label> May</label> <input type="checkbox" value="may" name="may">|
    <label> June</label> <input type="checkbox" value="jun" name="jun">|
    <label> July</label> <input type="checkbox" value="jul" name="jul">|
    <label> August</label> <input type="checkbox" value="aug" name="aug">|
    <label> Sept</label> <input type="checkbox" value="sep" name="sep">|
    <label> Oct</label> <input type="checkbox" value="oct" name="oct">|
    <label> Nov</label> <input type="checkbox" value="nov" name="nov">|
    <label> Dec</label> <input type="checkbox" value="dec" name="dec">|
    <label> Jan</label> <input type="checkbox" value="jan" name="jan">|
    <label> Feb</label> <input type="checkbox" value="feb" name="feb">|
    <label> March</label> <input type="checkbox" value="mar" name="mar">


    </fieldset></td>
    </tr>


</table>

<input type="submit" name="submit"  Value="Print Receipt">



</form>
    
</body>
</html>