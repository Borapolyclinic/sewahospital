<div class="section">
    <div class="dashboard-header">
        <h5>Contact Page</h5>
        <p>People who visited on the contact page</p>
    </div>

    <div class="table-responsive section-table">
        <table class="table table-bordered ">
            <thead>
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Contact Number</th>
                    <th scope="col">Email</th>
                    <th scope="col">Details</th>
                    <th scope="col">Date & Time</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if (isset($_POST['delete'])) {
                    $contact_id = $_POST['contact_id'];
                    $delete = "DELETE FROM `contact` WHERE `contact_id` = '$contact_id'";
                    $delete_r = mysqli_query($connection, $delete);
                    if ($delete_r) { ?>
                <div class="mb-3 mt-3 w-100 alert alert-danger" role="alert">Deleted!</div>
                <?php
                    }
                }

                $results_per_page = 30;
                $fetch = "SELECT * FROM `contact`";
                $result = mysqli_query($connection, $fetch);
                $number_of_result = mysqli_num_rows($result);
                $number_of_page = ceil($number_of_result / $results_per_page);
                if (!isset($_GET['page'])) {
                    $page = 1;
                } else {
                    $page = $_GET['page'];
                }
                $page_first_result = ($page - 1) * $results_per_page;
                $query = "SELECT * FROM `contact` LIMIT " . $page_first_result . ',' . $results_per_page;
                $result = mysqli_query($connection, $query);

                while ($row = mysqli_fetch_assoc($result)) {
                    $contact_id = $row['contact_id'];
                    $contact_name = $row['contact_name'];
                    $contact_number = $row['contact_number'];
                    $contact_email = $row['contact_email'];
                    $contact_comment = $row['contact_comment'];
                    $contact_date = $row['contact_date'];
                    ?>
                <tr>

                    <td><?php echo $contact_name ?></td>
                    <td><?php echo $contact_number ?></td>
                    <td><?php echo $contact_email ?></td>
                    <td><?php echo $contact_comment ?></td>
                    <td><?php echo date('d-M-Y h:i:s', strtotime($contact_date)) ?></td>
                    <td>
                        <form action="" method="POST">
                            <input type="text" name="contact_id" value="<?php echo $contact_id ?>" hidden>
                            <button type="submit" name="delete" class="btn btn-sm btn-outline-danger">Delete</button>
                    </td>
                    </form>
                </tr>
                <?php } ?>
            </tbody>
        </table>
        <nav aria-label="Page navigation example">
            <ul class="pagination">
                <?php for ($page = 1; $page <= $number_of_page; $page++) {
                    echo '<li class="page-item"><a href = "dashboard.php?page=' . $page . '">' . $page . ' </a></li>';
                } ?>
            </ul>
        </nav>
    </div>
</div>