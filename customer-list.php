<?php
// adding security
require "includes/security.php";
// grtting database connection
require "includes/db.php";


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
            <?php  
            // adding current navigation marker
            $table = 'navigation__active';
            ?>
            <!-- Start side bar section -->
            <?php require "includes/sidebar.php"; ?>
            <!-- End side bar section -->
            <!-- Start custom theme section -->
            <?php require "includes/theme.php"; ?>
            <!-- End custom theme section -->

            <section class="content">
                <div class="content__inner">
                    <header class="content__title">
                        <h1>Customer List</h1>
                    </header>

                    <div class="card">
                        <div class="card-body">

                            <div class="table-responsive data-table">
                                <table id="data-table" class="table">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Picture</th>
                                        <th>Name</th>
                                        <th>Mobile</th>
                                        <th>Address</th>
                                        <th>Email</th>
                                    </tr>
                                    </thead>
                                    <tbody>
    <?php  
        $sql = mysqli_query($con, "SELECT * FROM customer WHERE u_id = '$USERID' ");
        $count = 1;
        while ($row = mysqli_fetch_assoc($sql)) {
    ?>
                                    
                                    <tr>
                                        
                                        <td><?php echo $count ;?></td>
                                        <td>
                                            <a href="payment-history.php?id=<?php echo $row['customer_id'] ?>">
                                                <img src="upload/customer_pictures/<?php echo $row['picture'] ;?>" alt="Customer picture" width="50px" height="50px">
                                            </a>
                                        </td>
                                    
                                        <td>
                                            <a href="payment-history.php?id=<?php echo $row['customer_id'] ?>">
                                                <?php echo $row['name'] ;?>
                                            </a>
                                        </td>
                                        <td><?php echo $row['mobile'] ;?></td>
                                        <td><?php echo $row['address'] ;?></td>
                                        <td><?php echo $row['email'] ;?></td>

                                    </tr>
                                    
    <?php  
        $count++;
    }
    ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                <!-- Start footer section -->
                <?php require "includes/footer.php"; ?>
                <!-- End footer section -->
                </div>
            </section>
        </main>

        <!-- Javascript -->
        <!-- Vendors -->
        <script src="resources/vendors/jquery/jquery.min.js"></script>
        <script src="resources/vendors/popper.js/popper.min.js"></script>
        <script src="resources/vendors/bootstrap/js/bootstrap.min.js"></script>
        <script src="resources/vendors/overlay-scrollbars/jquery.overlayScrollbars.min.js"></script>

        <!-- Vendors: Data tables -->
        <script src="resources/vendors/datatables/jquery.dataTables.min.js"></script>
        <script src="resources/vendors/datatables/datatables-buttons/dataTables.buttons.min.js"></script>
        <script src="resources/vendors/datatables/datatables-buttons/buttons.print.min.js"></script>
        <script src="resources/vendors/jszip/jszip.min.js"></script>
        <script src="resources/vendors/datatables/datatables-buttons/buttons.html5.min.js"></script>

        <!-- App functions and actions -->
        <script src="resources/js/app.min.js"></script>
    </body>

</html>