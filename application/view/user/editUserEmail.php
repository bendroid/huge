<h4>editUserEmail</h4>

    <!-- echo out the system feedback (error and success messages) -->
    <?php $this->renderFeedbackMessages(); ?>

        <h4>Change your email address</h4>

        <form action="<?php echo Config::get('URL'); ?>user/editUserEmail_action" method="post">
            <label>
                New email address: <input type="text" name="user_email" required />
            </label>
            <input type="submit" value="Submit" />
        </form>