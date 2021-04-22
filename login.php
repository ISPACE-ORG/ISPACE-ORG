<?php include_once "header.php";  ?>
<body>
    <div class="wrapper">
        <section class="form login">
            <header>I SPACE</header>
            <form action="#" enctype="multipart/form-data" autocomplete="off">
                <div class="error-txt"></div>
                    <div class="field input">
                    <label >Name</label>
                    <input type="text" name="email" placeholder="Firstname" required>
                    </div>
                    <div class="field input">
                        <label >password</label>
                        <input type="password" name="password" placeholder="enter new password" required>
                    <i class="fas fa-eye"></i>
                    </div>
                    <div class="field button">
                        <input type="submit"  value="Countinue to chat">
                    </div>
            </form>
            <div class="link">Not yet signed up?<a href="index.php">Signup now</a></div>
        </section>
    </div>

    <script src="javascripts/pass-show-hide.js"></script>
    <script src="javascripts/login.js"></script>
</body>
</html>