<div class=" container-fluid section-grid mb-5">
    <div class="col-md-6">
        <div class="dashboard-header">
            <h4>Add Job</h4>
            <p>Enter details below to create a job.</p>
        </div>
        <?php
        require('includes/db.php');
        if (isset($_POST['submit'])) {
            $career_title = mysqli_real_escape_string($connection, $_POST['career_title']);
            $career_det = mysqli_real_escape_string($connection, $_POST['career_det']);
            $career_status = "1";

            $insert_query = "INSERT INTO `career`(
            `career_title`,
            `career_det`,
            `career_status`
        )
        VALUES(
            '$career_title',
            '$career_det',
            '$career_status'
        )";

            $insert_query_result = mysqli_query($connection, $insert_query);
            if ($insert_query_result) { ?>
        <div class="alert alert-success mt-3 mb-3" role="alert">
            Job Listing added!
        </div>

        <?php
            }
        }
        ?>

        <form action="" method="POST" class="add-career-form m-1">
            <div class="form-floating mb-3">
                <input type="text" name="career_title" class="form-control" id="floatingInput"
                    placeholder="name@example.com">
                <label for="floatingInput">Job Title</label>
            </div>
            <div class="form-floating mb-3">
                <textarea class="form-control" name="career_det" placeholder="Leave a comment here"
                    id="floatingTextarea2" style="height: 200px"></textarea>
                <label for="floatingTextarea2">Job Details</label>
            </div>

            <button type="submit" name="submit" class="btn btn-primary w-100">Submit</button>
        </form>
    </div>


    <div class="col-md-6 container-fluid">
        <div class="dashboard-header">
            <h4>View All Job</h4>
            <p>Check out all jobs created by you</p>
        </div>
        <div class="section-table">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">JOB ID</th>
                            <th scope="col">TITLE</th>
                            <th scope="col">CREATED ON</th>
                            <th scope="col">STATUS</th>
                            <th scope="col">CHANGE</th>
                            <th scope="col">ACTION</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if (isset($_POST['disable'])) {
                            $career_id = $_POST['career_id'];
                            $update_disable = "UPDATE `career` SET `career_status` = '2' WHERE `career_id` = $career_id";
                            $update_res_disable = mysqli_query($connection, $update_disable);
                        }

                        if (isset($_POST['enable'])) {
                            $career_id = $_POST['career_id'];
                            $update_enable = "UPDATE `career` SET `career_status` = '1' WHERE `career_id` = $career_id";
                            $update_res_enable = mysqli_query($connection, $update_enable);
                        }

                        if (isset($_POST['del'])) {
                            $career_id = $_POST['career_id'];
                            $delete = "DELETE FROM `career` WHERE `career_id` = '$career_id'";
                            $del_res = mysqli_query($connection, $delete);
                        }

                        if (isset($_POST['edit'])) {
                            echo "Edit";
                        }

                        $query = "SELECT * FROM `career`";
                        $res = mysqli_query($connection, $query);

                        while ($row = mysqli_fetch_assoc($res)) {
                            $career_id = $row['career_id'];
                            $career_title = $row['career_title'];
                            $career_added_date = $row['career_added_date'];
                            $career_status = $row['career_status'];
                        ?>
                        <tr>
                            <th scope="row"><?php echo $career_id ?></th>
                            <td><?php echo $career_title ?></td>
                            <td><?php echo date("d-M-Y", strtotime($career_added_date)) ?></td>
                            <td><?php
                                    if ($career_status == "1") { ?>

                                <p class="btn btn-sm btn-success">Active</p>
                                <?php } else { ?>
                                <p class="btn btn-sm btn-danger">Disabled</p>
                                <?php } ?>
                            </td>
                            <?php
                                if ($career_status == "1") { ?>

                            <form action="" method="post">
                                <input type="text" value="<?php echo $career_id ?>" name="career_id" hidden>
                                <td><button type="submit" name="disable"
                                        class="btn btn-sm btn-outline-warning">Disable</button></td>
                            </form>

                            <?php }
                                if ($career_status == "2") { ?>
                            <form action="" method="POST">
                                <input type="text" value="<?php echo $career_id ?>" name="career_id" hidden>
                                <td><button type="submit" name="enable"
                                        class="btn btn-sm btn-outline-success">Activate</button></td>
                            </form>
                            <?php } ?>

                            <td>
                                <form action="" method="POST">
                                    <input type="text" value="<?php echo $career_id ?>" name="career_id" hidden>

                                    <button type="submit" name="del" class="no-btn">
                                        <ion-icon class="del-btn" name="trash-outline"></ion-icon>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>