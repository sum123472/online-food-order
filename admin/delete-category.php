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
         $_SESSION['remove']="<div class='error> Fail to Remove Category Image</div>";
         header('location:'.SITEURL.'admin/manage-category.php');
         die();
     }
 }
   $sql="DELETE  from tbl_category where id=$id";
   $res=mysqli_query($conn,$sql);
   if($res==true)
     {
        $_SESSION['delete']="<div class='success'>Category Deleted Successfuy.</div>";
        header('location:'.SITEURL.'admin/manage-category.php');
     }
   else
     {
       $_SESSION['delete']="<div class='error'> Fail to Delete Category .</div>";
       header('location:'.SITEURL.'admin/manage-category.php');
     }
  }
else
{
 header('location:'.SITEURL.'admin/manage-category.php');
}


?>