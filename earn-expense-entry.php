<?php
// adding security
require "includes/security.php";
// database
require "includes/db.php";

// form data
if (isset($_POST['submit'])) {
    $action_date = date('d/M/Y');
    $earn_cat = mysqli_escape_string($con, $_POST['earn_cat']);
    $earn = mysqli_escape_string($con, $_POST['earn']);
    $expense_cat = mysqli_escape_string($con, $_POST['expense_cat']);
    $expense = mysqli_escape_string($con, $_POST['expense']);

    // getting current balance amount
    $get_sql = mysqli_query($con, "SELECT balance FROM earn_expense WHERE u_id = '$USERID' ORDER BY ee_id DESC LIMIT 1");
    $fetch_crr_blnce = mysqli_fetch_assoc($get_sql);
    $curr_blnce = $fetch_crr_blnce['balance'];

    // calculating new balance
    $new_balance = $curr_blnce + $earn - $expense;

    $sql = mysqli_query($con, "INSERT INTO earn_expense (action_date, earn_cat, earn_amount, expense_cat, expense_amount, balance, u_id) VALUES ('$action_date', '$earn_cat', '$earn', '$expense_cat', '$expense', '$new_balance', '$USERID') ");

    // checking if data inserted or not
    if ($sql) {
        echo "<script> alert('New amount entry complete..!!') </script>";
        echo "<script> location = 'earn_expense_list.php' </script>";
    }else{
        echo "<script> alert('Something not working, Please try againg...!!!') </script>";
        echo "<script> location = 'earn-expense-entry.php' </script>";
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
                        <h1>Earn/Expense Entry</h1>
                    </header>

                    <div class="card">
                        <div class="card-body">

                            <form action="#" method="post" class="row">
                                <div class="col-md-6">

                                    <div class="form-group">
                                        <label>Earn Category</label>
                                        <input name="earn_cat" type="text" class="form-control" placeholder="Today's Earn category name">
                                    </div>

                                    <div class="form-group">
                                        <label>Today's Earn Amount</label>
                                        <input name="earn" type="number" class="form-control" placeholder="Today's Earning Amount in number" value="0">
                                    </div>

                                    <div class="form-group">
                                        <label>Expense Category</label>
                                        <input name="expense_cat" type="text" class="form-control" placeholder="Today's Expense category name">
                                    </div>

                                    <div class="form-group">
                                        <label>Today's Expense Amount</label>
                                        <input name="expense" type="number" class="form-control" placeholder="Today's Expense Amount in number" value="0">
                                    </div>

                                    <div class="form-group">
                                        <input name="submit" type="submit" class="btn btn-success">
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