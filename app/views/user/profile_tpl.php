<?php
$user = isset($_COOKIE['user']) ? $_COOKIE['user'] : isset($_SESSION['user']) ? $_SESSION['user'] : null;
?>
<div class="panel-login panel">
    <div class="panel-heading">
        <div class="row mb_20">
            <div class="col-xs-6">
                <a href="#" class="active" id="profile-form-link">Profile</a>
            </div>
        </div>
        <hr>
    </div>
    <div class="panel-body">
        <div class="row">
            <div class="col-lg-12">
                <form id="profile-form" action="user/change-profile" method="post">
                    <div class="form-group">
                        <input type="text" name="login" id="login" tabindex="1" class="form-control<?php if (isset($_SESSION['errors']['login'])): ?> is-invalid" autofocus<?php else: ?> " <?php endif; ?> placeholder="Login" value="<?= isset($_SESSION['old']['login']) ? $_SESSION['old']['login'] : $user['login'] ?>">
                        <?php if (isset($_SESSION['errors']['login'])): ?>
                            <span class="invalid-feedback">
                            <?= $_SESSION['errors']['login'][0] ?>
                        </span>
                        <?php endif; ?>
                    </div>
                    <div class="form-group">
                        <input type="text" name="name" id="name" tabindex="1" class="form-control<?php if (isset($_SESSION['errors']['name'])): ?> is-invalid" autofocus<?php else: ?> " <?php endif; ?> placeholder="Name" value="<?= isset($_SESSION['old']['name']) ? $_SESSION['old']['name'] : $user['name'] ?>">
                        <?php if (isset($_SESSION['errors']['name'])): ?>
                            <span class="invalid-feedback">
                            <?= $_SESSION['errors']['name'][0] ?>
                        </span>
                        <?php endif; ?>
                    </div>
                    <div class="form-group">
                        <input type="email" name="email" id="email" tabindex="1" class="form-control<?php if (isset($_SESSION['errors']['email'])): ?> is-invalid" autofocus<?php else: ?> " <?php endif; ?> placeholder="Email" value="<?= isset($_SESSION['old']['email']) ? $_SESSION['old']['email'] : $user['email'] ?>">
                        <?php if (isset($_SESSION['errors']['email'])): ?>
                            <span class="invalid-feedback">
                            <?= $_SESSION['errors']['email'][0] ?>
                        </span>
                        <?php endif; ?>
                    </div>
                    <div class="form-group">
                        <input type="password" name="password" id="password" tabindex="2" class="form-control<?php if (isset($_SESSION['errors']['password'])): ?> is-invalid" autofocus<?php else: ?> " <?php endif; ?> placeholder="Old Password" value="<?= isset($_SESSION['old']['password']) ? $_SESSION['old']['password'] : '' ?>">
                        <?php if (isset($_SESSION['errors']['password'])): ?>
                            <span class="invalid-feedback">
                            <?= $_SESSION['errors']['password'][0] ?>
                        </span>
                        <?php endif; ?>
                    </div>
                    <div class="form-group">
                        <input type="password" name="confirm-password" id="confirm-password" tabindex="2" class="form-control<?php if (isset($_SESSION['errors']['confirm-password'])): ?> is-invalid" autofocus<?php else: ?> " <?php endif; ?> placeholder="New Password" value="<?= isset($_SESSION['old']['confirm-password']) ? $_SESSION['old']['confirm-password'] : '' ?>">
                        <?php if (isset($_SESSION['errors']['confirm-password'])): ?>
                            <span class="invalid-feedback">
                            <?= $_SESSION['errors']['confirm-password'][0] ?>
                        </span>
                        <?php endif; ?>
                    </div>
                    <div class="form-group">
                        <input type="text" name="address" id="address" tabindex="2" class="form-control<?php if (isset($_SESSION['errors']['address'])): ?> is-invalid" autofocus<?php else: ?> " <?php endif; ?> placeholder="Address" value="<?= isset($_SESSION['old']['address']) ? $_SESSION['old']['address'] : $user['address'] ?>">
                        <?php if (isset($_SESSION['errors']['address'])): ?>
                            <span class="invalid-feedback">
                            <?= $_SESSION['errors']['address'][0] ?>
                        </span>
                        <?php endif; ?>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-6 col-sm-offset-3">
                                <input type="submit" name="profile-submit" id="profile-submit" tabindex="4" class="form-control btn btn-register" value="Change Profile">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php
unset($_SESSION['errors']);
unset($_SESSION['old']);
?>
