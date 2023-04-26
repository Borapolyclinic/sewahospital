<div class="container-fluid mt-5 mb-5">
    <div class="gallery-row">
        <?php
        require('admin/includes/db.php');
        if (isset($_POST['select'])) {
            $album_id = $_POST['album_id'];
            $fetch = "SELECT * FROM `sewa_photos` WHERE `sewa_album_id` = '$album_id'";
            $res = mysqli_query($connection, $fetch);
            $count = mysqli_num_rows($res);

            if ($count > 0) {

                while ($row = mysqli_fetch_assoc($res)) {
                    $sewa_photo_filename = "admin/uploads/" . $row['sewa_photo_filename']; ?>
        <div class="album-photo">
            <img src="<?php echo $sewa_photo_filename ?>" alt="<?php echo $sewa_photo_filename ?>">
        </div>
        <?php
                }
            } else { ?>
        No Images Uploaded in this album
        <?php
            }
        }
        ?>
    </div>
</div>