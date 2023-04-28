<div class="container-fluid">
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col">IMAGE</th>
                    <th scope="col">ACTION</th>
                </tr>
            </thead>
            <tbody>

                <?php

                require('includes/db.php');
                if (isset($_POST['del'])) {
                    $sewa_photos_id = $_POST['sewa_photos_id'];
                    $query = "DELETE FROM `sewa_photos` WHERE `sewa_photos_id` = '$sewa_photos_id'";
                    $res = mysqli_query($connection, $query);
                }

                if (isset($_POST['view'])) {
                    $album_id = $_POST['album_id'];
                    $fetch_album_query = "SELECT * FROM `sewa_photos` WHERE `sewa_album_id` = '$album_id'";
                    $fetch_album_res = mysqli_query($connection, $fetch_album_query);

                    while ($row = mysqli_fetch_assoc($fetch_album_res)) {
                        $sewa_photos_id = $row['sewa_photos_id'];
                        $sewa_photo_filename = "uploads/" . $row['sewa_photo_filename']; ?>
                <tr>
                    <th scope="row">
                        <div class="view-photos">
                            <img src="<?php echo $sewa_photo_filename ?>" alt="">
                        </div>
                    </th>
                    <td>
                        <form action="" method="POST">
                            <input type="text" name="sewa_photos_id" value="<?php echo $sewa_photos_id ?>" hidden>
                            <button type="submit" name="del" class="btn btn-sm btn-danger">
                                <ion-icon class="del-btn-white" name="trash-bin-outline"></ion-icon>
                            </button>
                        </form>
                    </td>
                </tr>
                <?php
                    }
                }
                ?>
            </tbody>
        </table>
    </div>
</div>