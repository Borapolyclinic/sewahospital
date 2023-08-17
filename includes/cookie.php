<?php
session_start();
require('admin/includes/db.php');
$session_id = session_id();
$search_user = "SELECT * FROM `session` WHERE `session_id` = '$session_id'";
$search_user_result = mysqli_query($connection, $search_user);

$session_user_id = "";
$session_cookie_status = "";
while ($row = mysqli_fetch_assoc($search_user_result)) {
    $session_user_id = $row['session_id'];
    $session_cookie_status = $row['session_cookie_status'];
}

if ($session_user_id !== $session_id || empty($session_user_id || empty($session_cookie_status) || $session_cookie_status == '0')) {
?>
<div class="modal fade" id="cookieModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered cookie-modal">
        <div class="modal-content ">
            <div class="modal-body">
                <p>We use cookies to personalise content and ads, to provide social media features and to analyse
                    our traffic. We also disclose information about your use of our site with our social media,
                    advertising and analytics partners. Additional details are available in ourCookie Policy</p>
            </div>
            <?php
                if (isset($_POST['submit'])) {
                    $session_id = $_POST['session_id'];
                    $session_cookie_status = $_POST['session_cookie_status'];

                    $insert_session = "INSERT INTO `session`(
                               `session_id`,
                               `session_cookie_status`
                           )
                           VALUES(
                               '$session_id',
                               '$session_cookie_status'
                           )";
                    $insert_session_res = mysqli_query($connection, $insert_session);

                    if ($insert_session_res) {
                        echo "<script>location.reload();</script>";
                    }
                }
                ?>
            <form action="" method="POST" class="modal-footer">
                <input type="text" value="<?php echo $session_id ?>" name="session_id" hidden>
                <input type="text" value="1" name="session_cookie_status" hidden>

                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="submit" name="submit" class="btn btn-primary">Accept All Cookies</button>
            </form>
        </div>
    </div>
</div>
<?php }  ?>