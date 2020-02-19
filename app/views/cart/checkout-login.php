<h3>Returning Customer</h3>
<p>I am a returning customer</p>
<br>

<form id="cart-login" action="cart/signin" method="post">
    <div class="form-group">
        <input type="text" class="form-control<?php if (isset($_SESSION['errors']['login'])): ?> is-invalid" autofocus<?php else: ?> " <?php endif; ?> id="input-login" placeholder="Login" value="<?= isset($_SESSION['old']['login']) ? $_SESSION['old']['login'] : '' ?>" name="login">
        <?php if (isset($_SESSION['errors']['login'])): ?>
            <span class="invalid-feedback">
                <?= $_SESSION['errors']['login'][0] ?>
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
    <input type="submit" class="btn mt_10" data-loading-text="Loading..." id="login-submit" value="Login">
</form>
<?php unset($_SESSION['errors']); ?>
<?php unset($_SESSION['old']); ?>