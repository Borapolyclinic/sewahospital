<div class=" container-fluid section-grid mb-5">
    <div class="col-md-6">
        <div class="dashboard-header">
            <h4>Create Album</h4>
            <p>Enter album name to upload photos.</p>
        </div>
        <?php
        require('includes/db.php');
        if (isset($_POST['submit'])) {
            $album_name = mysqli_real_escape_string($connection, $_POST['album_name']);
            $album_status = "1";

            $insert_query = "INSERT INTO `sewa_album`(
            `album_name`,
            `album_status`
        )
        VALUES(
            '$album_name',
            '$album_status'
        )";

            $insert_query_result = mysqli_query($connection, $insert_query);
            if ($insert_query_result) { ?>
        <div class="alert alert-success mt-3 mb-3" role="alert">
            Album Created!
        </div>
        <?php
            }
        }
        ?>

        <form action="" method="POST" class="add-career-form m-1">
            <div class="form-floating mb-3">
                <input type="text" name="album_name" class="form-control" id="floatingInput" placeholder="Album Name">
                <label for="floatingInput">Album Name</label>
            </div>

            <button type="submit" name="submit" class="btn btn-primary w-100">Submit</button>
        </form>
    </div>

    <div class="col-md-6 container-fluid">
        <div class="dashboard-header">
            <h4>View All Albums</h4>
            <p>Check out all albums created by you</p>
        </div>
        <div class="section-table">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">ALBUM NAME</th>
                            <th scope="col">CREATED ON</th>
                            <th scope="col">STATUS</th>
                            <th scope="col">ACTION</th>
                            <th scope="col">DELETE</th>
                            <th scope="col">UPLOAD</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php

                        // DISABLE ALBUM
                        if (isset($_POST['disable'])) {
                            $album_id = $_POST['album_id'];
                            $update_disable = "UPDATE `sewa_album` SET `album_status` = '2' WHERE `album_id` = $album_id";
                            $update_res_disable = mysqli_query($connection, $update_disable);
                        }


                        // ENABLE ALBUM
                        if (isset($_POST['enable'])) {
                            $album_id = $_POST['album_id'];
                            $update_enable = "UPDATE `sewa_album` SET `album_status` = '1' WHERE `album_id` = $album_id";
                            $update_res_enable = mysqli_query($connection, $update_enable);
                        }


                        // DELETE ALBUM
                        if (isset($_POST['del'])) {
                            $album_id = $_POST['album_id'];
                            $delete = "DELETE FROM `sewa_album` WHERE `album_id` = '$album_id'";
                            $del_res = mysqli_query($connection, $delete);
                        }

                        $query = "SELECT * FROM `sewa_album`";
                        $res = mysqli_query($connection, $query);

                        while ($row = mysqli_fetch_assoc($res)) {
                            $album_id = $row['album_id'];
                            $album_name = $row['album_name'];
                            $album_added_date = $row['album_added_date'];
                            $album_status = $row['album_status'];
                        ?>
                        <tr>
                            <th scope="row"><?php echo $album_name ?></th>
                            <td><?php echo date("d-M-Y", strtotime($album_added_date)) ?></td>
                            <td><?php
                                    if ($album_status == "1") { ?>

                                <p class="btn btn-sm btn-success">Active</p>
                                <?php } else { ?>
                                <p class="btn btn-sm btn-danger">Disabled</p>
                                <?php } ?>
                            </td>
                            <?php
                                if ($album_status == "1") { ?>

                            <form action="" method="post">
                                <input type="text" value="<?php echo $album_id ?>" name="album_id" hidden>
                                <td><button type="submit" name="disable"
                                        class="btn btn-sm btn-outline-warning">Disable</button></td>
                            </form>

                            <?php }
                                if ($album_status == "2") { ?>
                            <form action="" method="POST">
                                <input type="text" value="<?php echo $album_id ?>" name="album_id" hidden>
                                <td><button type="submit" name="enable"
                                        class="btn btn-sm btn-outline-success">Activate</button></td>
                            </form>
                            <?php } ?>

                            <td>
                                <form action="" method="POST">
                                    <input type="text" value="<?php echo $album_id ?>" name="album_id" hidden>

                                    <button type="submit" name="del" class="no-btn">
                                        <ion-icon class="del-btn" name="trash-outline"></ion-icon>
                                    </button>
                                </form>
                            </td>
                            <td>

                                <form action="edit-media.php" method="POST">
                                    <input type="text" value="<?php echo $album_id ?>" name="album_id" hidden>

                                    <button type="submit" name="upload" class="no-btn">
                                        <ion-icon class="upload-btn" name="add-circle-outline"></ion-icon>
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