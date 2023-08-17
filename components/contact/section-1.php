<div class="container mt-5">
    <div class="section-header">
        <h2>Connect <span>with</span> us</h2>
        <p>Tell us, how can we help?</p>
    </div>

    <div class="contact-section-1-row">
        <div class="col-md-6 contact-section-1-graphic">
            <lottie-player src="https://assets10.lottiefiles.com/packages/lf20_gaplvsns.json" background="transparent"
                speed="1" loop autoplay></lottie-player>
        </div>



        <form action="" method="POST" class="contact-section-form col-md-6">
            <?php
            require('admin/includes/db.php');
            if (isset($_POST['submit'])) {
                $contact_name = mysqli_real_escape_string($connection, $_POST['contact_name']);
                $contact_number = mysqli_real_escape_string($connection, $_POST['contact_number']);
                $contact_email = mysqli_real_escape_string($connection, $_POST['contact_email']);
                $contact_comment = mysqli_real_escape_string($connection, $_POST['contact_comment']);

                $fetch_query = "SELECT * FROM `contact` WHERE `contact_number` = '$contact_number'";
                $fetch_query_r = mysqli_query($connection, $fetch_query);
                $fetch_query_count = mysqli_num_rows($fetch_query_r);

                if ($fetch_query_count == 0) {
                    if (empty($contact_name)) { ?>
            <div class="alert alert-danger mb-3 mt-3" role="alert">
                Please mention your name!
            </div>
            <?php } elseif (empty($contact_number)) { ?>
            <div class="alert alert-danger mb-3 mt-3" role="alert">
                Please mention your Contact Number!
            </div>
            <?php
                    } else {
                        $query = "INSERT INTO `contact`(
                    `contact_name`,
                    `contact_number`,
                    `contact_email`,
                    `contact_comment`
                )
                VALUES(
                    '$contact_name',
                    '$contact_number',
                    '$contact_email',
                    '$contact_comment'
                )";
                        $result = mysqli_query($connection, $query);
                        if ($result) {
                            $sewa_email = "info@sewahospitallko.com, connectonlyn@onlynus.com";
                            $email_subject = "Website Visitor | Sewa Hospital";
                            $email_body = "Full Name: " . $contact_name . "<br>";
                            $email_body .= "Contact Number: " . $contact_number . "<br>";
                            $email_body .= "Email Address: " . $contact_email . "<br><br>";
                            $email_body .= "Details: " . $contact_comment . "<br>";

                            $headers = "MIME-Version: 1.0" . "\r\n";
                            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
                            mail(
                                $sewa_email,
                                $email_subject,
                                $email_body,
                                $headers
                            );
                        ?>
            <div class="alert alert-success mb-3 mt-3" role="alert">
                Thank you! We have recieved you request. Someone from our team will connect with you shortly.
            </div>
            <?php
                        }
                    }
                } else { ?>
            <div class="alert alert-info mb-3 mt-3" role="alert">
                Looks like you have already contact us before. Please wait while someone from our team connects with
                you.
            </div>
            <?php
                }
            }

            ?>
            <div class="form-floating mb-3">
                <input type="text" class="form-control" name="contact_name" id="contactName" placeholder="Full Name">
                <label for="contactName">Your Name</label>
            </div>
            <div class="form-floating mb-3">
                <input type="number" class="form-control" id="contactNumber" name="contact_number"
                    placeholder="Contact number">
                <label for="contactNumber">+91 XXXXX XXXXX</label>
            </div>

            <div class="form-floating mb-3">
                <input type="email" class="form-control" id="contactEmail" name="contact_email"
                    placeholder="Contact number" required>
                <label for="contactEmail">Email Address</label>
            </div>
            <div class="form-floating mb-3">
                <textarea class="form-control" placeholder="Leave a comment here" name="contact_comment"
                    id="floatingTextarea2" style="height: 100px"></textarea>
                <label for="floatingTextarea2">Comments</label>
            </div>
            <button type="submit" name="submit" class="contact-section-1-btn">Submit</button>
        </form>
    </div>
</div>