<?php
error_reporting(E_ALL);
ini_set("display_errors", "On");
echo "<p>Login view</p>";
echo BASE_URL . "<br>";
echo BASE_PATH . "<br>";
echo NODE_MODULES;
require VIEWS . "/header.php";
?>



<body class="d-flex min-vh-100 flex-column justify-content-between align-item-between d-inline-block m-0 p-0 body_bg">
    <header class="bg-light m-0">
        <div class="d-flex flex-row justify-content-center align-items-center pt-2 pb-2  border-bottom">
            <h3 class="text-dark">
                Employee Management
            </h3>
        </div>
    </header>
    <main>
        <section class="d-flex flex-column gap-2 justify-content-center align-item-between h-100 w-100">
            <div class="logo__wrapper d-flex flex-row justify-content-center align-items-center w-100">
                <div class="logo__app">
                    <img src="<?php echo IMAGES; ?>images/Alfonso y Erick Logotipos.gif" alt="logo">
                </div>
            </div>
            <div class="d-flex flex-row gap-2 justify-content-center align-item-between h-100 w-100">
                <form action="<?php echo CONTROLLERS ?>/loginController.php" method="POST" class="d-flex flex-column gap-3 p-2">
                    <div class="w-100 d-flex justify-content-center pt-2  h-100">
                        <div class="d-flex flex-row gap-3 pt-2 pb-2 h-100 search__component border border-secondary">
                            <div class="d-flex justify-content-center align-item-center">
                                <i class="fas fa-users"></i>
                            </div>
                            <input class="form-control form-control-dark w-100" name="username" type="text" placeholder="Your username..." id="input__username--login" value="">
                        </div>
                    </div>
                    <div class="w-100 d-flex justify-content-center pt-2 pb-2 h-100">
                        <div class="d-flex flex-row gap-3 pt-2 pb-2 h-100 search__component border border-secondary">
                            <div class="d-flex justify-content-center align-item-center">
                                <i class="fas fa-key"></i>
                            </div>
                            <input class="form-control form-control-dark w-100" name="password" type="password" placeholder="Your password..." id="input__password--login" value="">
                        </div>
                    </div>
                    <button type="submit" name="submit" class="btn btn-light border pt-3 pb-3 text-dark" id="bt__submit--login">Log in</button>

                </form>

                <form action="../controllers/loginController.php" method="POST" class=" flex-column gap-3 p-2" id="register_form">
                    <div class="w-100 d-flex justify-content-center pt-2  h-100">
                        <div class="d-flex flex-row gap-3 pt-2 pb-2 h-100 search__component border border-secondary">
                            <div class="d-flex justify-content-center align-item-center">
                                <i class="fas fa-users"></i>
                            </div>
                            <input class="form-control form-control-dark w-100" name="new_username" type="text" placeholder="New username..." id="input__new--username--login" value="">
                        </div>
                    </div>
                    <div class="w-100 d-flex justify-content-center pt-2 pb-2 h-100">
                        <div class="d-flex flex-row gap-3 pt-2 pb-2 h-100 search__component border border-secondary">
                            <div class="d-flex justify-content-center align-item-center">
                                <i class="fas fa-key"></i>
                            </div>
                            <input class="form-control form-control-dark w-100" name="new_password" type="password" placeholder="New password..." id="input__new--password--login" value="">
                        </div>
                    </div>
                    <button type="submit" name="register_submit" class="btn btn-light border border-secondary pt-3 pb-3 text-dark" id="bt__new--submit--login">Register<span> &#128520;</span></button>
                </form>
            </div>
            <div class="text__password--forgot d-flex flex-row justify-content-center align-items-center">
                <p class="text-light pt-1 pb-2" id="new__user--text">New user, register now?</p>
            </div>
        </section>
    </main>
    <?php include "assets/html/footer.html"; ?>
    <script src="<?php echo NODE_MODULES . "bootstrap/dist/js/bootstrap.bundle.min.js"; ?>"></script>
    <script>
        // switchRegisterForm();
    </script>
</body>
<script src="<?php echo JS . "index.js"; ?>"></script>

</html>