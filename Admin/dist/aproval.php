<!DOCTYPE html>
<html lang="en">
<?php
session_start();
include '../../database/connection.php';
if ($_SESSION['Role'] != "admin") {
    header("location:../Home.php");
}
$sql = "SELECT * FROM approval
JOIN account
    on approval.APRV_Account_ID=account.ACC_ID";
$result = mysqli_query($conn, $sql);
?>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Nara Esport Admin</title>
    <link href="css/styles.css" rel="stylesheet" />
    <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script>
</head>

<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <a class="navbar-brand" href="index.php">Nara Esport</a>
        <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button>
        <!-- Navbar Search-->
        <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
            <div class="input-group">
                <input class="form-control" type="text" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2" />
                <div class="input-group-append">
                    <button class="btn btn-primary" type="button"><i class="fas fa-search"></i></button>
                </div>
            </div>
        </form>
        <!-- Navbar-->
        <ul class="navbar-nav ml-auto ml-md-0">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                    <a class="dropdown-item" href="../../Home.php">View As <b>User</b></a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="../../database/logout.php">Logout</a>
                </div>
            </li>
        </ul>
    </nav>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <div class="sb-sidenav-menu-heading">Core</div>
                        <a class="nav-link" href="index.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Dashboard
                        </a>
                        <div class="sb-sidenav-menu-heading">Interface</div>
                        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                            <div class="sb-nav-link-icon"><i class="fas fa-user"></i></div>
                            Account Management
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="account.php">Account</a>
                                <a class="nav-link" href="aproval.php">Approval</a>
                            </nav>
                        </div>
                        <a class="nav-link" href="team.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-users"></i></div>
                            Team Management
                        </a>
                        <a class="nav-link" href="player.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-gamepad"></i></div>
                            Player Management
                        </a>
                        <a class="nav-link" href="schedule.php">
                            <div class="sb-nav-link-icon"><i class="far fa-calendar-alt"></i></div>
                            Schedule Management
                        </a>
                    </div>
                </div>
                <div class="sb-sidenav-footer">
                    <div class="small">Logged in as:</div>
                    <?php
                    echo $_SESSION["user_name"];
                    ?>
                </div>
            </nav>
        </div>
        <div id="layoutSidenav_content">
            <main>
                <!-- Modal For Update Team -->
                <div class="modal fade" id="modalUpdate" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Update Approval</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="Database/UpdateApproval.php" method="POST">

                                    <input id="approvalid" name="approvalid" type="text" hidden>

                                    <label for="Statusapproval">Status Approval</label>
                                  <select id="Statusapproval" name="Statusapproval" class="custom-select mb-3" type="text">
                                <option value="Approved">Approved</option>
                                <option value="Rejected">Rejected</option>
                                <option value="Pending">Pending</option>
                                  </select>



                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" name="updatedata" class="btn btn-primary">Save</button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="container-fluid">
                    <h1 class="mt-4">Approval</h1>
                    <hr>
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-table mr-1"></i>
                            Data
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Account ID</th>
                                            <th>Account Name</th>
                                            <th>CV</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>ID</th>
                                            <th>Account ID</th>
                                            <th>Account Name</th>
                                            <th>CV</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php
                                        if (mysqli_num_rows($result) == 0) {
                                            echo '<tr>
                                                <td class="text-center">Data tidak ditemukan</td>
                                            </tr>';
                                        }
                                        while ($row = mysqli_fetch_array($result)) {
                                            echo '<tr>
                                                <td>' . $row['APRV_ID'] . '</td>
                                                <td>' . $row['APRV_Account_ID'] . '</td>
                                                <td>' . $row['ACC_Name'] . '</td>
                                                <td> <a href=' . '../../database/uploads/' . $row['APRV_CV'] . '> Click Here </a> </td>
                                                <td>' . $row['APRV_Status'] . '</td>
                                                <td>
                                                <a class="btn btn-success btn-sm updateBtn" data-toggle="modal" data-target="#modalUpdate">Update</a>
                                                <a onclick="return checkDelete()" href="Database/deleteApproval.php?id=' . $row['APRV_ID'] . '" type="button" class="btn btn-danger btn-sm">Delete</a></td>
                                                </td>
                                            </tr>';
                                        }
                                        $conn->close();
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">Copyright &copy; Nara Esport Dev 2021</div>
                        <div>
                            <a href="#">Privacy Policy</a>
                            &middot;
                            <a href="#">Terms &amp; Conditions</a>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="assets/demo/chart-area-demo.js"></script>
    <script src="assets/demo/chart-bar-demo.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
    <script src="assets/demo/datatables-demo.js"></script>
</body>


<script>
    function checkDelete() {
        return confirm('Are you sure want delete this?');
    }

    $(document).ready(function() {
        $('.updateBtn').on('click', function() {

            $('#modalUpdate').modal('show');

            $tr = $(this).closest('tr');

            var data = $tr.children().map(function() {
                return $(this).text();
            }).get();
            console.log(data);
            $('#approvalid').val(data[0]);
            $('#Statusapproval').val(data[4]);



        });
    });
</script>

</html>