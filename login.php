<?php include './include/Components/auth/header.php' ?>
<div class="login-box">
    <div class="login-logo">
        <a href="index.php"><img src="assets/img/logo_transparent.png" width="75" class="align-top" alt=""></a>
    </div>
    <div class="card">
        <div class="card-body login-card-body">
            <?php
            if (isset($_SESSION['flash_data'])) {
                ?>
                <div
                    class="alert alert-<?= isset($_SESSION['flash_data']['status']) ? $_SESSION['flash_data']['status'] : '' ?>">
                    <?= isset($_SESSION['flash_data']['message']) ? $_SESSION['flash_data']['message'] : '' ?>
                </div>
                <?php
            }
            ?>
            <p class="login-box-msg">Sign In Here</p>
            <form action="include/Events/AuthEvents.php?act=login" method="POST">
                <div class="input-group mb-3">
                    <input type="email" name="email" id="email" class="form-control" placeholder="Email">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input type="password" name="password" id="password" class="form-control" placeholder="Password">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <button type="submit" class="btn btn-success btn-block">Sign In</button>
                    </div>
                </div>
            </form>
        </div>

    </div>
</div>
<?php include './include/Components/auth/footer.php' ?>