<div class="container mt-5 mb-5">
    <div class="gallery-row">
        <?php
        require('admin/includes/db.php');
        $fetch_album_name = "SELECT * FROM `sewa_album`";
        $fetch_album_name_res = mysqli_query($connection, $fetch_album_name);
        $fetch_count = mysqli_num_rows($fetch_album_name_res);

        if ($fetch_count > 0) {
            while ($row = mysqli_fetch_assoc($fetch_album_name_res)) {
                $album_id = $row['album_id'];
                $album_name = $row['album_name'];
                $album_status = $row['album_status'];

                if ($album_status == '1') {

        ?>
        <form action="album-photos.php" method="POST">
            <input type="text" name="album_id" value="<?php echo $album_id ?>" hidden>
            <button type="submit" name="select" class="gallery-album">
                <?php
                            $fetch_query = "SELECT * FROM sewa_photos WHERE sewa_album_id = $album_id";
                            $fetch_res = mysqli_query($connection, $fetch_query);
                            $album_thumb = "";
                            while ($row = mysqli_fetch_assoc($fetch_res)) {
                                $album_thumb = "admin/uploads/" . $row['sewa_photo_filename'];
                            }
                            ?>
                <img src="<?php echo $album_thumb ?>" alt="<?php echo $album_name ?>">
                <p><?php echo $album_name ?></p>
            </button>
        </form>
        <?php }
            }
        } else { ?>
        No Albums uploaded!
        <?php } ?>
    </div>
</div>