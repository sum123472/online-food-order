<?php
//include constan file to establish connection
include('../config/constant.php');
//1.get the id to be delete
 $id=$_GET['id'];
//2.create sql query to delete 
$sql="DELETE FROM tbl_admin WHERE id=$id";
//execute query
$res=mysqli_query($conn,$sql);
if($res==true)
{
    $_SESSION['delete']="<div class='success'>Admin Deleted Successfully.</div>";
    header('location:'.SITEURL.'admin/manage-admin.php');
}else{
    $_SESSION['delete']="<div class='error'>failed to delete.Try again later</div>";
    header('location:'.SITEURL.'admin/manage-admin.php');
}

//3.redirect to manage admin page with msg

?>