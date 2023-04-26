<?php
require('includes/db.php');
if (isset($_POST['upload'])) {
    $album_id = $_POST['album_id'];
    $fetch_album_query = "SELECT * FROM `sewa_album` WHERE `album_id` = '$album_id'";
    $fetch_album_res = mysqli_query($connection, $fetch_album_query);

    $fetched_album_id = "";
    $fetched_album_name = "";
    while ($row = mysqli_fetch_assoc($fetch_album_res)) {
        $fetched_album_id = $row['album_id'];
        $fetched_album_name = $row['album_name'];
    }
}
?>

<div class=" container-fluid section-grid mb-5">
    <div class="col-md-6">
        <div class="dashboard-header">
            <h4>Add Photos</h4>
            <p>Select a single photo or multiple photos to upload to the media gallery of the website</p>
        </div>

        <?php

        if (isset($_POST["submit"])) {
            $sewa_album_id = $_POST['sewa_album_id'];
            $target_dir = "uploads/";

            // Loop through each uploaded file
            for ($i = 0; $i < count($_FILES["files"]["name"]); $i++) {
                // Get file name and temporary file path
                $filename = $_FILES["files"]["name"][$i];
                $tempname = $_FILES["files"]["tmp_name"][$i];

                // Read the file
                $fp = fopen($tempname, 'r');
                $data = fread($fp, filesize($tempname));
                $data = addslashes($data);
                fclose($fp);

                // Insert image data into database
                $sql = "INSERT INTO `sewa_photos` (sewa_photo_filename, sewa_photo_data, sewa_album_id ) VALUES ('$filename', '$data', '$sewa_album_id')";
                $result = $connection->query($sql);

                if ($result) {
                    move_uploaded_file($tempname, $target_dir . $filename);
        ?>
        <div class="alert alert-success mt-3 mb-3" role="alert">
            Images uploaded!
        </div>

        <?php

                } else {
                    echo "Error uploading image: " . $connection->error;
                }
            }
        }
        ?>

        <form action="" method="POST" class="add-career-form m-1" enctype="multipart/form-data">
            <input type="text" name="sewa_album_id" value="<?php echo $fetched_album_id ?>" hidden>
            <div class="mb-3">
                <label for="formFile" class="form-label">Select & Upload photos</label>
                <input class="form-control" type="file" id="formFile" name="files[]" multiple>
            </div>

            <button type="submit" name="submit" class="btn btn-primary w-100">Submit</button>
        </form>
    </div>

</div>