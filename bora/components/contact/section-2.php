<div class="container contact-section-2">
    <div class="col-md-6">
        <div class="contact-section-2-details">
            <div class="contact-section-2-icon">
                <ion-icon name="call-outline"></ion-icon>
            </div>
            <div>
                <h2>Contact Number</h2>
                <p>+91 9569863933 | +91 9305748634</p>
            </div>
        </div>

        <div class="contact-section-2-details">
            <div class="contact-section-2-icon">
                <ion-icon name="mail-outline"></ion-icon>
            </div>
            <div>
                <h2>Email</h2>
                <p>email@address.com</p>
            </div>
        </div>

        <div class="contact-section-2-details">
            <div class="contact-section-2-icon">
                <ion-icon name="location-outline"></ion-icon>
            </div>
            <div>
                <h2>Address</h2>
                <p>Bora Institute of Nursing & Paramedical Sciences. Sewa Nagar, NH-24 Sitaur Road. Lucknow - 226201</p>
            </div>
        </div>
    </div>

    <div class="col-md-6">
        <?php
        include('include/db.php');
        if (isset($_POST['submit'])) {
            $contact_name = mysqli_real_escape_string($connection, $_POST['contact_name']);
            $contact_number = mysqli_real_escape_string($connection, $_POST['contact_number']);
            $contact_email = mysqli_real_escape_string($connection, $_POST['contact_email']);
            $contact_reason = mysqli_real_escape_string($connection, $_POST['contact_reason']);
            $contact_details = mysqli_real_escape_string($connection, $_POST['contact_details']);

            $query = "INSERT INTO `bora_contact`(
                `contact_name`,
                `contact_number`,
                `contact_email`,
                `contact_reason`,
                `contact_details`
            )
            VALUES(
                '$contact_name',
                '$contact_number',
                '$contact_email',
                '$contact_reason',
                '$contact_details'
            )";
            $result = mysqli_query($connection, $query);

            if ($result) { ?>
        <div class="alert alert-success mt-3 mb-3" role="alert">Thank you for contact us. We will connect with you
            shortly.</div>
        <?php
            }
        }
        ?>
        <form action="" method="POST" class="contact-section-2-form">
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Full Name</label>
                <input type="text" name="contact_name" class="form-control" id="exampleFormControlInput1"
                    placeholder="Your Name" required>
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Contact Number</label>
                <input type="number" name="contact_number" class="form-control" id="exampleFormControlInput1"
                    placeholder="XXXXX XXXXX" required>
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Email address</label>
                <input type="email" name="contact_email" class="form-control" id="exampleFormControlInput1"
                    placeholder="name@example.com">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Contact About?</label>
                <select class="form-select" name="contact_reason" aria-label="Default select example" required>
                    <option selected>Open this menu</option>
                    <option value="1">Courses</option>
                    <option value="2">Admissions</option>
                    <option value="3">Fee</option>
                    <option value="4">Career</option>
                    <option value="5">Other</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Details</label>
                <textarea class="form-control" name="contact_details" id="exampleFormControlTextarea1"
                    rows="3"></textarea>
            </div>

            <button type="submit" name="submit" class="contact-section-2-btn">Submit</button>
        </form>
    </div>
</div>