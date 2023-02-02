<div class="login-screen-container">
    <div class="col-md-6 login-section-img"></div>
    <div class="col-md-6 login-form-section">
        <div class="login-form-header">
            <img src="../assets/images/nav-logo.webp" alt="" class="login-brand">
            <h1>Welcome!</h1>
            <h2>Enter your Mobile Number and Password to sign-in C.M.S</h2>
        </div>

        <?php
        require('includes/db.php');
        session_start();
        if (isset($_SESSION["user_contact"])) {
            header("location:dashboard.php");
        }
        if (isset($_POST['submit'])) {
            $user_contact = mysqli_real_escape_string($connection, $_POST['user_contact']);
            $user_password = mysqli_real_escape_string($connection, $_POST['user_password']);

            if (empty($user_contact)) { ?>
        <div class="alert alert-danger w-100" role="alert">
            Please enter Registered Mobile Number
        </div>
        <?php
            } else if (empty($user_password)) { ?>
        <div class="alert alert-danger w-100" role="alert">
            Please enter Password
        </div>
        <?php
            } else {
                $search_user_query = "SELECT * FROM `users` WHERE `user_contact` = '$user_contact'";
                $search_user_result = mysqli_query($connection, $search_user_query);
                $search_user_count = mysqli_num_rows($search_user_result);

                if ($search_user_count == 1) {
                    while ($row = mysqli_fetch_assoc($search_user_result)) {
                        if (password_verify($user_password, $row['user_password'])) {
                            $login = true;
                            session_start();
                            $_SESSION['loggedin'] = true;
                            $_SESSION['user_id'] = $user_id;
                            $_SESSION['user_name'] = $user_name;
                            $_SESSION['user_contact'] = $user_contact;
                            $_SESSION['user_type'] = $user_type;
                            header("location: dashboard.php");
                        } else { ?>
        <div class="alert alert-danger w-100" role="alert">
            Invalid Password!
        </div>
        <?php }
                    }
                }
            }
        }
        ?>
        <form action="" method="post" class="login-form">
            <div class="form-floating mb-3">
                <input type="number" name="user_contact" class="form-control" id="contactNumber"
                    placeholder="+91XXXXXXXXXX">
                <label for="contactNumber">Registered Mobile Number</label>
            </div>
            <div class="form-floating mb-3">
                <input type="password" name="user_password" class="form-control" id="floatingPassword"
                    placeholder="Password">
                <label for="floatingPassword">Password</label>
            </div>

            <button type="submit" name="submit" class="login-form-btn">LOGIN</button>

        </form>
    </div>
</div>