<?php
include('../config/constant.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Food Order System</title>
    <link rel="stylesheet"href="../css/admin.css">
</head>
<body>
    <div class="login">
        <h1 class="text-center">Login</h1>
        <br><br>
        <?php
         if(isset($_SESSION['login']))
         {
             echo $_SESSION['login'];
             unset($_SESSION['login']);
         }
         if(isset($_SESSION['no-login-msg']))
         {
             echo $_SESSION['no-login-msg'];
             unset($_SESSION['no-login-msg']);
         }
         ?>
         <br>
        <!--login form-->
        <form action=""method="POST" class="text-center">
            username:<br>
            <input type="text"name="username"placeholder="Enter Username"><br><br>
            Password:<br>
            <input type="password"name="password"placeholder="Enter Password"><br><br>
            <input type="submit"name="submit"value="Login"class="btn-primary"><br><br>
</form>
        <p class="text-center">Created By-<a href="#">Sumbul Afreen</p>
</div>
</body>
</html>
<?php
if(isset($_POST['submit'])){
    //process for login
    $username=$_POST['username'];
    $password=md5($_POST['password']);
    //sql to check user 
    $sql="SELECT * from tbl_admin where username='$username' and password='$password'";
    $res=mysqli_query($conn,$sql);
    $count=mysqli_num_rows($res);
    if($count==1){
        $_SESSION['login']="<div class='success'>Login Succesfull.</div>";
        $_SESSION['user']=$username;
        header('location:'.SITEURL.'admin/');
    }else{
        $_SESSION['login']="<div class='error'>Username or  Password did not match.</div>";
        header('location:'.SITEURL.'admin/login.php');
    }
}



?>