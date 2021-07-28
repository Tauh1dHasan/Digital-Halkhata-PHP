<?php
// adding security
require "includes/security.php";
// database connection
require "includes/db.php";
    // getting from data
    if (isset($_POST['submit'])) {
        $target = "upload/customer_pictures/".basename($_FILES['picture']['name']);

        $name = mysqli_escape_string($con, $_POST['name']);
        $email = mysqli_escape_string($con, $_POST['email']);
        $mobile = mysqli_escape_string($con, $_POST['mobile']);
        $address = mysqli_escape_string($con, $_POST['address']);
        $picture = $_FILES['picture']['name'];

        $sql = "INSERT INTO customer (name, email, mobile, address, picture, u_id) VALUES ('$name', '$email', '$mobile', '$address', '$picture', '$USERID')";
        $run_sql = mysqli_query($con, $sql);

        // moving CUSTOMER picture
        if (move_uploaded_file($_FILES['picture']['tmp_name'], $target)) {
            $msg = 'Image uploaded';
        }else{
            $msg = 'Image did not uploaded';
        }

        // opening due_payment account for customer
        $dp_get_sql = mysqli_query($con, "SELECT customer_id FROM customer WHERE name = '$name' AND mobile = '$mobile' ");
        $dp_customer_id = mysqli_fetch_assoc($dp_get_sql);
        $dp_customer_id_copy = $dp_customer_id['customer_id'];

        echo $dp_customer_id_copy;

        $push_sql = "INSERT INTO due_payment (customer_id) VALUES ('$dp_customer_id_copy')";
        $run_push_sql = mysqli_query($con, $push_sql);

        // checking if uploaded or not
        if ($run_sql AND $run_push_sql) {
            echo "<script> alert('New customer added..!!!') </script>";
            echo "<script> location = 'add-new-customer.php' </script>";
        }else{
            echo "<script> alert('Something not working, Please try again..!!!') </script>";
            echo "<script> location = 'add-new-customer.php' </script>";
        }
    }

    // adding head section of project
    require "includes/head.php" ;
?>

    <body data-sa-theme="1">
        <main class="main">
            <div class="page-loader">
                <div class="page-loader__spinner">
                    <svg viewBox="25 25 50 50">
                        <circle cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" />
                    </svg>
                </div>
            </div>

            <!-- Start top bar section -->
            <?php require "includes/topbar.php"; ?>
            <!-- End top bar section -->
            <!-- Start side bar section -->
            <?php require "includes/sidebar.php"; ?>
            <!-- End side bar section -->
            <!-- Start custom theme section -->
            <?php require "includes/theme.php"; ?>
            <!-- End custom theme section -->

            <section class="content">
                <div class="content__inner">
                    <header class="content__title">
                        <h1>Add new customer</h1>
                    </header>

                    <div class="card">
                        <div class="card-body">

                            <form action="#" method="post" enctype="multipart/form-data" class="row">
                                <div class="col-md-6">

                                    <div class="form-group">
                                        <label>Full Name *</label>
                                        <input name="name" type="text" class="form-control" placeholder="Customer Name" required>
                                    </div>

                                    <div class="form-group">
                                        <label>Email address</label>
                                        <input name="email" type="email" class="form-control" placeholder="name@example.com">
                                    </div>

                                    <div class="form-group">
                                        <label>Mobile *</label>
                                        <input name="mobile" type="number" class="form-control" placeholder="Customer Mobile Number" required>
                                    </div>

                                    <div class="form-group">
                                        <label>Address *</label>
                                        <input name="address" type="text" class="form-control" placeholder="Customer Address" required>
                                    </div>

                                    <div class="form-group">
                                        <label>Customer Picture</label><br>
                                        <input name="picture" type="file">
                                    </div>

                                    <div class="form-group">
                                        <input name="submit" type="submit" class="btn btn-success" value="Save">
                                    </div>

                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Start footer section -->
                <?php require "includes/footer.php"; ?>
                <!-- End footer section -->
            </section>
        </main>

        <!-- Javascript -->
        <!-- Vendors -->
        <script src="resources/vendors/jquery/jquery.min.js"></script>
        <script src="resources/vendors/popper.js/popper.min.js"></script>
        <script src="resources/vendors/bootstrap/js/bootstrap.min.js"></script>
        <script src="resources/vendors/overlay-scrollbars/jquery.overlayScrollbars.min.js"></script>

        <!-- App functions and actions -->
        <script src="resources/js/app.min.js"></script>
    </body>

</html>