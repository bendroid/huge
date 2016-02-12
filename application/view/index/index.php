<h4>Home</h4>

        <!-- echo out the system feedback (error and success messages) -->
        <?php $this->renderFeedbackMessages(); ?>

        <h4>What happens here ?</h4>
        <p>
            This is the homepage. As no real URL-route (like /register/index) is provided, the app uses the default
            controller and the default action, defined in application/config/config.php, by default it's
            IndexController and index()-method. So, the app will load application/controller/IndexController.php and
            run index() from that file. Easy. That index()-method (= the action) has just one line of code inside
            ($this->view->render('index/index');) that loads application/view/index/index.php, which is basically
            this text you are reading right now.
        </p>