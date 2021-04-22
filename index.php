<?php include_once "header.php";  ?>
<body>
    <div class="wrapper">
        <section class="form signup">
            <header>I SPACE</header>
            <form action="#" enctype="multipart/form-data" autocapitalize="off">
                <div class="error-txt"></div>
                <div class="name-details">
                    <div class="field input">
                        <label >First name</label>
                        <input type="text" name="fname" placeholder="Firstname" required>
                    </div>
                    <div class="field input">
                        <label >Last name</label>
                        <input type="text" name="lname"  placeholder="Lastname" required>
                    </div>
                </div>
                    <div class="field input">
                        <label >Bio</label>
                        <input type="text" name="email"  placeholder="Enter your bio" required>
                    <div class="field input">
                        <label >password</label>
                        <input type="password" name="password" placeholder="enter new password" required>
                        <i class="fas fa-eye"></i>
                    </div>
                    </div>
                    <div class="field image">
                        <label >bio pic</label>
                        <input type="file" name="image"  required>
                    </div>
                    <div class="field button">
                        <input type="submit"  value="Countinue to chat">
                    </div>
            </form>
            <div class="link">Already signed up?<a href="login.php">Login now</a></div>
        </section>
    </div>

    <script src="javascripts/pass-show-hide.js"></script>
    <script src="javascripts/signup.js"></script>
</body>
</html>