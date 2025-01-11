<?php
session_start();
if(isset($_SESSION['auth'])){
    $_SESSION['message']="Already Logged in";
    header("location: index.php");
    exit();
}

include('includes/header.php');
?>

<div class="py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <?php
                if (isset($_SESSION['message'])) {
                ?>
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <strong>Hey!</strong><?= $_SESSION['message']; ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php
                    unset($_SESSION['message']);
                } ?>
                <div class="card">
                    <div class="card-header bg-info">
                        <h4>Login Form</h4>
                    </div>
                    <div class="card-body bg-secondary text-white">
                        <form action="functions/login_process.php" method="POST">
                           
                            <div class="mb-3">
                                <label class="form-label">Email address</label>
                                <input type="email" class="form-control" name="email" placeholder="Enter Email" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Password</label>
                                <input type="password" class="form-control" name="password" placeholder="Enter Password" required>
                            </div>
                            <button type="submit" class="btn btn-primary" name="login">Login Now</button>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<?php include('includes/footer.php'); ?>