<?php
include("../middleware/adminMiddleware.php");
include('includes/header.php');

?>


<div class="py-5">
    <div class="container">
        <div class="">
            <div class="row">
                <div class="col-md-12">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Order id</th>
                                <th>User</th>
                                <th>Tracking NO</th>
                                <th>Total Price</th>
                                <th>View Details</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                            $Orders=GetAllOrders();

                            if(mysqli_num_rows($Orders) > 0){
                            foreach($Orders as $items)
                            {
                        ?>   
                        <tr>
                            <td><?= $items['order_id'];?></td>
                            <td><?= $items['name'];?></td>
                            <td><?= $items['tracking_no'];?></td>
                            <td><?= $items['total_price'];?></td>
                            <td><a href="view_order.php?t_no=<?= $items['tracking_no']; ?>" class="btn btn-success">View Details </a></td>
                        </tr> 

                        <?php
                        }
                            }
                            else{
                        ?>
                            <tr><td colspan="5"> No Orders yet</td></tr>
                        <?php
                        }

                        ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include('includes/footer.php'); ?>