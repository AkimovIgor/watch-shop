<div id="contact_form">
    <form id="contact_body" method="post" action="contact-us/send-message">
        <div class="form-group">
     <?php if (!isset($_SESSION['user']) && !isset($_COOKIE['user'])): ?>
        <input class="form-control full-with-form  mt_20<?php if (isset($_SESSION['errors']['name'])): ?> is-invalid" autofocus<?php else: ?> " <?php endif; ?> type="text" name="name" placeholder="Name" data-required="true" value="<?= isset($_SESSION['old']['name']) ? $_SESSION['old']['name'] : '' ?>"/>
        <?php if (isset($_SESSION['errors']['name'])): ?>
            <span class="invalid-feedback">
                <?= $_SESSION['errors']['name'][0] ?>
            </span>
        <?php endif; ?>
        <input class="form-control full-with-form  mt_20<?php if (isset($_SESSION['errors']['email'])): ?> is-invalid" autofocus<?php else: ?> " <?php endif; ?> type="email" name="email" placeholder="Email Address" data-required="true" value="<?= isset($_SESSION['old']['email']) ? $_SESSION['old']['email'] : '' ?>"/>
        <?php if (isset($_SESSION['errors']['email'])): ?>
            <span class="invalid-feedback">
                <?= $_SESSION['errors']['email'][0] ?>
            </span>
        <?php endif; ?>
     <?php endif; ?>

        <input class="form-control full-with-form  mt_20<?php if (isset($_SESSION['errors']['phone'])): ?> is-invalid" autofocus<?php else: ?> " <?php endif; ?> type="text" name="phone" placeholder="Phone Number" maxlength="15" data-required="true" value="<?= isset($_SESSION['old']['phone']) ? $_SESSION['old']['phone'] : '' ?>"/>
        <?php if (isset($_SESSION['errors']['phone'])): ?>
            <span class="invalid-feedback">
                <?= $_SESSION['errors']['phone'][0] ?>
            </span>
        <?php endif; ?>
        <input class="form-control full-with-form  mt_20<?php if (isset($_SESSION['errors']['subject'])): ?> is-invalid" autofocus<?php else: ?> " <?php endif; ?> type="text" name="subject" placeholder="Subject" data-required="true" value="<?= isset($_SESSION['old']['subject']) ? $_SESSION['old']['subject'] : '' ?>">
        <?php if (isset($_SESSION['errors']['subject'])): ?>
            <span class="invalid-feedback">
                <?= $_SESSION['errors']['subject'][0] ?>
            </span>
        <?php endif; ?>
        <textarea class="form-control full-with-form  mt_20<?php if (isset($_SESSION['errors']['message'])): ?> is-invalid" autofocus<?php else: ?> " <?php endif; ?> name="message" placeholder="Message" data-required="true"><?= isset($_SESSION['old']['message']) ? $_SESSION['old']['message'] : '' ?></textarea>
        <?php if (isset($_SESSION['errors']['message'])): ?>
            <span class="invalid-feedback">
                <?= $_SESSION['errors']['message'][0] ?>
            </span>
        <?php endif; ?>
        </div>
        <button class="btn mt_20" type="submit" id="send-message">Send Message</button>

    </form>
    <div id="contact_results"></div>
</div>
<?php
unset($_SESSION['errors']);
unset($_SESSION['old']);
?>