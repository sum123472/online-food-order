
    <?php include('partials/menu.php');?>
    <div class="main-content">
    <div class="wrapper">
    <h1>DASHBOARD</h1>
    <br>
    <?php
         if(isset($_SESSION['login']))
         {
             echo $_SESSION['login'];
             unset($_SESSION['login']);
         }
         ?>
         <br>
    <div class="col-4 text-center">
        <?php 
        $sql="SELECT * from tbl_category";
        $res=mysqli_query($conn,$sql);
        $count=mysqli_num_rows($res);
        ?>
        <h1><?php echo $count;?></h1>
        <br>
        Categories
    </div>
    
    <div class="col-4 text-center">
    <?php 
        $sq2="SELECT * from tbl_food";
        $res2=mysqli_query($conn,$sql);
        $count2=mysqli_num_rows($res2);
        ?>
        <h1><?php echo $count2;?></h1>
        <br>
        Foods
    </div>
    <div class="col-4 text-center">
    <?php 
        $sql3="SELECT * from tbl_order";
        $res3=mysqli_query($conn,$sql3);
        $count3=mysqli_num_rows($res3);
        ?>
        <h1><?php echo $count3;?></h1>
        <br>
        Orders
    </div>
    <div class="col-4 text-center">
        <?php
        $sql4="SELECT SUM(total) AS Total from tbl_order where status='Delivered'";
        $res4=mysqli_query($conn,$sql4);
        $row4=mysqli_fetch_assoc($res4);
        $total_revenue=$row4['Total'];

      ?>
        <h1><?php echo $total_revenue;?></h1>
        <br>
        Revenue Generated
    </div>
    <div class="clearfix"></div>
    </div>


    </div>
    <?php include('partials/footer.php');?>