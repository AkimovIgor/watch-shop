<h3>New Customer</h3>
<p>Checkout Options:</p>
<br>
<form id="cart-register" action="cart/signup" method="post">
    <div class="form-group">
        <input type="text" class="form-control<?php if (isset($_SESSION['errors']['login'])): ?> is-invalid" autofocus<?php else: ?> " <?php endif; ?> id="input-login" placeholder="Login" value="<?= isset($_SESSION['old']['login']) ? $_SESSION['old']['login'] : '' ?>" name="login">
        <?php if (isset($_SESSION['errors']['login'])): ?>
            <span class="invalid-feedback">
                <?= $_SESSION['errors']['login'][0] ?>
            </span>
        <?php endif; ?>
    </div>
    <div class="form-group">
        <input type="text" class="form-control<?php if (isset($_SESSION['errors']['name'])): ?> is-invalid" autofocus<?php else: ?> " <?php endif; ?> id="input-name" placeholder="Name" value="<?= isset($_SESSION['old']['name']) ? $_SESSION['old']['name'] : '' ?>" name="name">
        <?php if (isset($_SESSION['errors']['name'])): ?>
            <span class="invalid-feedback">
                <?= $_SESSION['errors']['name'][0] ?>
            </span>
        <?php endif; ?>
    </div>
    <div class="form-group">
        <input type="email" class="form-control<?php if (isset($_SESSION['errors']['email'])): ?> is-invalid" autofocus<?php else: ?> " <?php endif; ?> id="input-email" placeholder="Email" value="<?= isset($_SESSION['old']['email']) ? $_SESSION['old']['email'] : '' ?>" name="email">
        <?php if (isset($_SESSION['errors']['email'])): ?>
            <span class="invalid-feedback">
                <?= $_SESSION['errors']['email'][0] ?>
            </span>
        <?php endif; ?>
    </div>
    <div class="form-group">
        <input type="password" class="form-control<?php if (isset($_SESSION['errors']['password'])): ?> is-invalid" autofocus<?php else: ?> " <?php endif; ?> id="input-password" placeholder="Password" value="" name="password">
        <?php if (isset($_SESSION['errors']['password'])): ?>
            <span class="invalid-feedback">
                <?= $_SESSION['errors']['password'][0] ?>
            </span>
        <?php endif; ?>
    </div>
    <div class="form-group">
        <input type="password" class="form-control<?php if (isset($_SESSION['errors']['confirm-password'])): ?> is-invalid" autofocus<?php else: ?> " <?php endif; ?> id="input-confirm-password" placeholder="Password Confirm" value="" name="confirm-password">
        <?php if (isset($_SESSION['errors']['confirm-password'])): ?>
            <span class="invalid-feedback">
                <?= $_SESSION['errors']['confirm-password'][0] ?>
            </span>
        <?php endif; ?>
    </div>
    <div class="form-group">
        <input type="text" class="form-control<?php if (isset($_SESSION['errors']['address'])): ?> is-invalid" autofocus<?php else: ?> " <?php endif; ?> id="input-address" placeholder="Address" value="" name="address">
        <?php if (isset($_SESSION['errors']['address'])): ?>
            <span class="invalid-feedback">
                <?= $_SESSION['errors']['address'][0] ?>
            </span>
        <?php endif; ?>
    </div>
    <input type="submit" class="btn mt_10" data-loading-text="Loading..." id="register-submit" value="Register now">
</form>
<?php unset($_SESSION['errors']); ?>
<?php unset($_SESSION['old']); ?>