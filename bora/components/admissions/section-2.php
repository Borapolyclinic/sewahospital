<div class="container admission-section-2">
    <div class="col-md-6 admission-section-2-img">
        <img src="assets/images/banners/temp-9.png" alt="Admissions in Bora Institute of Allied Health Sciences">
    </div>
    <div class="col-md-6 admission-section-2-form">
        <?php
        require('include/db.php');
        if (isset($_POST['submit'])) {
            $admission_name = mysqli_real_escape_string($connection, $_POST['admission_name']);
            $admission_contact = mysqli_real_escape_string($connection, $_POST['admission_contact']);
            $admission_email = mysqli_real_escape_string($connection, $_POST['admission_email']);
            $admission_qual = mysqli_real_escape_string($connection, $_POST['admission_qual']);
            $admission_program = mysqli_real_escape_string($connection, $_POST['admission_program']);

            if ($admission_program == "1") {
                $admission_course = mysqli_real_escape_string($connection, $_POST['admission_course_1']);
            } else if ($admission_program == "2") {
                $admission_course = mysqli_real_escape_string($connection, $_POST['admission_course_2']);
            } else if ($admission_program == "3") {
                $admission_course = mysqli_real_escape_string($connection, $_POST['admission_course_3']);
            } else if ($admission_program == "4") {
                $admission_course = mysqli_real_escape_string($connection, $_POST['admission_course_4']);
            }

            $query = "INSERT INTO `bora_admissions`(
            `admission_name`,
            `admission_contact`,
            `admission_email`,
            `admission_qual`,
            `admission_program`,
            `admission_course`
        )
        VALUES(
            '$admission_name',
            '$admission_contact',
            '$admission_email',
            '$admission_qual',
            '$admission_program',
            '$admission_course'
        )";

            $result = mysqli_query($connection, $query);

            if (!$result) { ?>

        <div class="alert alert-danger mb-3 mt-3" role="alert">
            Oops! Looks like there was some error processing your form. Please try again!
        </div>
        <?php } else { ?>
        <div class="alert alert-success mb-3 mt-3" role="alert">
            Thank you for applying for <?php echo $admission_course; ?>. We will connect with you shortly.
        </div>
        <?php
            }
        }

        ?>
        <form action="" method="post">
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Full Name</label>
                <input type="text" class="form-control" name="admission_name" id="exampleFormControlInput1"
                    placeholder="" required>
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Contact Number</label>
                <input type="number" class="form-control" name="admission_contact" id="exampleFormControlInput1"
                    placeholder="" required>
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Email address</label>
                <input type="email" class="form-control" name="admission_email" id="exampleFormControlInput1"
                    placeholder="">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Qualifications</label>
                <textarea class="form-control" name="admission_qual" id="exampleFormControlTextarea1"
                    rows="5"></textarea>
            </div>
            <div class="mb-4">
                <label for="exampleFormControlInput1" class="form-label">Select Programme</label>
                <select onclick="showOption()" class="form-select mb-3" name="admission_program" id="programOption"
                    aria-label="Default select example" required>
                    <option>Click here to open menu</option>
                    <option value="1">Masters Degree Programme</option>
                    <option value="2">Basic Degree Programme</option>
                    <option value="3">Diploma Programme</option>
                    <option value="4">Certificate Course</option>
                </select>
            </div>

            <div class="mb-4" style="display: none" id="option1">
                <label for="exampleFormControlInput1" class="form-label">Select Masters Degree Programme</label>
                <select class="form-select mb-3" name="admission_course_1" aria-label="Default select example">
                    <option>Click here to Masters Degree Courses</option>
                    <option value="M.Sc. Nursing">M.Sc. Nursing</option>
                </select>
            </div>

            <div class="mb-4" style="display: none" id="option2">
                <label for="exampleFormControlInput1" class="form-label">Select Basic Degree Programme</label>
                <select class="form-select mb-3" name="admission_course_2" aria-label="Default select example">
                    <option>Click here to open Basic Degree Courses</option>
                    <option value="B.Sc. Nursing">B.Sc. Nursing</option>
                    <option value="Post Basic B.Sc. NURSING">Post Basic B.Sc. NURSING</option>
                    <option value="Bachelor in Physiotherapy">Bachelor in Physiotherapy</option>
                    <option value="Bachelor in Medical Laboratory Science">Bachelor in Medical Laboratory Science
                    </option>
                </select>
            </div>

            <div class="mb-4" style="display: none" id="option3">
                <label for="exampleFormControlInput1" class="form-label">Select Diploma Programme</label>
                <select class="form-select mb-3" name="admission_course_3" aria-label="Default select example">
                    <option>Click here to open Diploma Programme Courses</option>
                    <option value="General Nursing & Midwifery">General Nursing & Midwifery</option>
                    <option value="Auxillary Nurse & Midwifery">Auxillary Nurse & Midwifery</option>
                    <option value="O.T.Technicians & Dialysis Technician">O.T.Technicians & Dialysis Technician</option>
                    <option value="X-Ray Technician">X-Ray Technician</option>
                    <option value="Diploma in Lab Technician">Diploma in Lab Technician</option>
                </select>
            </div>

            <div class="mb-4" style="display: none" id="option4">
                <label for="exampleFormControlInput1" class="form-label">Select Certificate Course</label>
                <select class="form-select mb-3" name="admission_course_4" aria-label="Default select example">
                    <option>Click here to open Certification Courses</option>
                    <option value="Phlebotomoy Technician">Phlebotomoy Technician</option>
                    <option value="Blood Bank Technician">Blood Bank Technician</option>
                    <option value="Assistant Physiotherapist">Assistant Physiotherapist</option>
                    <option value="Pharmacy Assistant">Pharmacy Assistant</option>
                    <option value="Emergency Medical Technician Basic">Emergency Medical Technician Basic</option>
                </select>
            </div>

            <button type="submit" name="submit" class="btn btn-outline-primary w-100">Apply</button>
        </form>
    </div>
</div>