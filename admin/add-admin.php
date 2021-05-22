<?php 
include('partials/menu.php');
?>
<div class="main-content">
    <div class="wrapper">
        <h1>Add Admin</h1>
        <br><br>
        <?php
        if(isset($_SESSION['add']))
        {
            
         echo $_SESSION['add'];//displaying session
         unset($_SESSION['add']);//removing session
     }
    ?>
        
        <form action=""method="POST">
            <table class="tbl-30">
                <tr>
                    <td>Full Name</td>
                    <td><input type="text"placeholder="enter your name"name="full_name"></td>
</tr>
 <tr>
     <td>Username</td>
     <td><input type="text"name="username"placeholder="your username"></td>
</tr>
<tr>
     <td>Password</td>
     <td><input type="password"name="password"placeholder="enter your password"></td>
</tr>
<tr>
    <td colspan="2">
        <input type="submit"name="submit"value="Add  Admin"class="btn-secondary">
    </td>
</tr>
</table>
        </form>

</div>
</div>
<?php
include('partials/footer.php');
?>
<?php
//process the value and submit form
if(isset($_POST['submit'])){
    //1.get the data
      $full_name=$_POST['full_name'];
      $username=$_POST['username'];
      $password=md5($_POST['password']);//password encryption with md5
      //2.sql to save data in databse
      $sql="INSERT INTO tbl_admin SET 
      full_name='$full_name',
      username='$username',
      password='$password'
      ";
      //3.execute query and save data into database
      
      

      $res=mysqli_query($conn,$sql) or die(mysqli_error());
      //check whether query is executed or not and display
      if($res==TRUE)
      {
          //create session variable
          $_SESSION['add']="<div class='success'>Admin Added Succesfuy</div>";
          //redirect page
          header("location:".SITEURL.'admin/manage-admin.php');
      }
      else{
          //create session variable
          $_SESSION['add']=" Fail to add Admin ";
          //redirect page
          header("location:".SITEURL.'admin/add-admin.php');
      }
          
      }
      
    
?>