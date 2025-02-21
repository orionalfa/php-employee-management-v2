<header class="d-flex flex-row justify-content-between align-item-center main__header pt-2 pb-2">
    <div class="logo__wrapper">
        <div class="logo__app">
            <img src="<?= IMAGES; ?>/Blue Cool and Funky Gaming Logo.gif" alt="Logo malo">
        </div>
    </div>

    <div class="d-flex flex-row align-items-center justify-content-start w-100 px-4">
        <a href="<?= BASE_URL; ?>employees/render" class="text-decoration-none">
            <h5 class="px-3 text-light ">Dashboard</h5>
        </a>
        <a href="<?= BASE_URL; ?>employees/addEmployee" class="text-decoration-none">
            <h5 class="px-3 text-muted">Employee</h5>
        </a>
    </div>
    <div class="logout__wrapper d-flex justify-content-between align-item-center">
        <div class="d-flex align-items-center">
            <h5 class="text-light">Welcome <span class="text-warning">
                    <?= $_SESSION["username"] ?>
                </span></h5>
        </div>
        <!-- <div class=" d-flex align-items-center justify-content-center h-100">
			<div class="profile_picture">
				<img src='<?= $_SESSION["user_img"] ?>' alt="no user">
			</div>
		</div> -->
        <div class="d-flex justify-content-center align-items-center">
            <a href="<?= BASE_URL; ?>login/logout" class="d-flex justify-content-between align-item-center text-decoration-none">
                <button type="button" class="btn btn-light text-dark">Logout</button>
            </a>
        </div>
    </div>
</header>