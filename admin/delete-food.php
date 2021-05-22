<?php
include('../config/constant.php');
if((isset($_GET['id']) AND isset($_GET['image_name'])))
{
 $id=$_GET['id'];
 $image_name=$_GET['image_name'];
 //remove image file if available
 if($image_name!="")
 {
     //image available
     $path="../images/category/".$image_name;
     $remove=unlink($path);
     if($remove==false)
     {
         $_SESSION['upload']="<div class='error'> Fail to Remove  Image File.</div>";
         header('location:'.SITEURL.'admin/manage-food.php');
         die();
     }
 }
   $sql="DELETE  from tbl_food where id=$id";
   $res=mysqli_query($conn,$sql);
   if($res==true)
     {
        $_SESSION['delete']="<div class='success'>Food Deleted Successfuy.</div>";
        header('location:'.SITEURL.'admin/manage-food.php');
     }
   else
     {
       $_SESSION['delete']="<div class='error'> Failed to Delete Food .</div>";
       header('location:'.SITEURL.'admin/manage-food.php');
     }
  }
else
{
 $_SESSION['unauthorize']="<div class='error'>Unauthorized Access.</div>";
 header('location:'.SITEURL.'admin/manage-food.php');
}


?>