<div class="panel-login panel">
<div class="panel-heading">
    <div class="row mb_20">
        <div class="col-xs-6">
            <a href="#" class="active" id="login-form-link">Login</a>
        </div>
    </div>
    <hr>
</div>
<div class="panel-body">
    <div class="row">
        <div class="col-lg-12">
            <form id="login-form" action="user/signin" method="post">
                <div class="form-group">
                    <input type="text" name="login" id="login" tabindex="1"  class="form-control<?php if (isset($_SESSION['errors']['login'])): ?> is-invalid" autofocus<?php else: ?> " <?php endif; ?> placeholder="Login" value="<?= isset($_SESSION['old']['login']) ? $_SESSION['old']['login'] : '' ?>">
                    <?php if (isset($_SESSION['errors']['login'])): ?>
                        <span class="invalid-feedback">
                            <?= $_SESSION['errors']['login'][0] ?>
                        </span>
                    <?php endif; ?>
                </div>
                
                <div class="form-group">
                    <input type="password" name="password" id="password" tabindex="2" class="form-control<?php if (isset($_SESSION['errors']['password'])): ?> is-invalid" autofocus<?php else: ?> " <?php endif; ?> placeholder="Password">
                    <?php if (isset($_SESSION['errors']['password'])): ?>
                        <span class="invalid-feedback">
                            <?= $_SESSION['errors']['password'][0] ?>
                        </span>
                    <?php endif; ?>
                </div>
                <div class="form-group text-center">
                    <input type="checkbox" tabindex="3" class="" name="remember" id="remember">
                    <label for="remember"> Remember Me</label>
                </div>
                <div class="form-group">
                    <div class="row">
                    <div class="col-sm-6 col-sm-offset-3">
                        <input type="submit" name="login-submit" id="login-submit" tabindex="4" class="form-control btn btn-login" value="Log In">
                        <a href="user/register" name="register" style="display: inherit;" id="register" tabindex="4" class="btn btn-login">Register</a>
                    </div>
                    </div>
                </div>
                <!-- <div class="form-group">
                    <div class="row">
                    <div class="col-lg-12">
                        <div class="text-center">
                        <a href="#" tabindex="5" class="forgot-password">Forgot Password?</a>
                        </div>
                    </div>
                    </div>
                </div> -->
            </form>
        </div>
    </div>
</div>
</div>
<?php
unset($_SESSION['errors']);
unset($_SESSION['old']);
?>