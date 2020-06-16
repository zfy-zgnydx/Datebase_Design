<?php
session_start();
include_once "./mysql.php";
// 设置mysql字符集 为 utf8
$link->query("set names utf8");
$Patient_id = $_POST['Patient_id'];
$Appointment_time = $_POST['Appointment_time'];
$Office_id=$_POST['Office_id'];
if ($Patient_id == '')
{
    echo "<script>console.log('请输入身份证号码');location='./reg.html" . $_SERVER['HTTP_REFERER'] . "'</script>";
    exit;
}
if ($Appointment_time == '') {

    echo "<script>console.log('请选择预约时间');location='./reg.html" . $_SERVER['HTTP_REFERER'] . "'</script>";
    exit;

}
$sql1="select * from reg-info where Patient-id='{$Patient_id}' and Appointment-time='{$Appointment_time}'";
$que=mysqli_query($link,$sql1);
if(!$que){
    echo"<script>alert('这个时间段您已经预约过了！');location.href='./reg.html';</script>";
}else{
    $sql="insert into reg-info 
    VALUES('$Patient_id','$Appointment_time','$Office_id')";
    $que=mysqli_query($link,$sql);
    echo "<script>alert('预约挂号成功');location.href='./reg.html';</script>";
}
?>