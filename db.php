<?php


define('db_server','db');
define('db_name','php');
define('db_user','php');
define('db_pwd','php');

$conn=mysqli_connect(db_server,db_name,db_user,db_pwd);

// if($conn){
//    // echo 'DB connected';
// }else{
//   //  echo 'not connected';
// }


//crete table SCHOOLBILL
//uncomment below lines and submit form on homepage, this will
//create new DATABASE schoolbill for us to use
// $query="SELECT * FROM schoolbill";
// $res=mysqli_query($conn,$query);
// if($res){
//     echo "Table exists";
// }else{
//     echo "Table doesnt exist";
//     $query1="CREATE TABLE schoolbill(
//         student_name varchar(50) NOT NULL ,
//         reg_no INT(10) NOT NULL,
//         student_class VARCHAR(20) NOT NULL,
//         time_now VARCHAR(20),
//         receipt VARCHAR(10000),
//         depositer VARCHAR(50),
//         particulars VARCHAR(100),
//         tutionfees VARCHAR(100)
//     )";
//    // $query1="DROP TABLE schoolbill";
//     $res1=mysqli_query($conn,$query1);
//     if($res1){
//         echo 'table created';
//     }else{
//         echo "table creating error";
//     }
// }




?>
