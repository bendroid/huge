<h4>Your Profile</h4>

        <!-- echo out the system feedback (error and success messages) -->
        <?php $this->renderFeedbackMessages(); ?>

        <h4>What happens here ?</h4>
        <div>This controller/action/view shows all public information about a certain user.</div>

      <div class="row">
      <?php if ($this->user) { ?>
        <div class="col s12 m4">
          <div class="card grey lighten-5 z-depth-1">
            <div class="card-image">
            <?php if (isset($this->user->user_avatar_link)) { ?>
                <img class="responsive-img" src="<?= $this->user->user_avatar_link; ?>" />
            <?php } ?>
              <span class="card-title"><?= $this->user->user_name; ?></span>
            </div><!-- card-image -->
            <div class="card-action">
              <div><strong>Your username: </strong><?= $this->user->user_name; ?></div>
              <div><strong>Your email: </strong><?= $this->user->user_email; ?></div>
              <div><strong>Your first name: </strong><?= $this->user->first_name; ?></div>
              <div><strong>Your last name: </strong><?= $this->user->last_name; ?></div>
              <div><strong>Your full name: </strong><?= $this->user->full_name; ?></div>
              <div><strong>Mobile phone: </strong><?= $this->user->mobile_phone; ?></div>
              <div><strong>Home phone: </strong><?= $this->user->home_phone; ?></div>
              <div><strong>Work phone: </strong><?= $this->user->work_phone; ?></div>
              <div><strong>Street: </strong><?= $this->user->user_street; ?></div>
              <div><strong>City: </strong><?= $this->user->user_city; ?></div>
              <div><strong>State: </strong><?= $this->user->user_state; ?></div>
              <div><strong>Zip: </strong><?= $this->user->user_zip; ?></div>
              <div><strong>Facebook: </strong><?= $this->user->user_fb; ?></div>
              <div><strong>Twitter: </strong><?= $this->user->user_twitter; ?></div>
              <div><strong>Github: </strong><?= $this->user->user_github; ?></div>
              <div><strong>Google Plus: </strong><?= $this->user->user_gp; ?></div>
              <div><strong>Active: </strong><?= ($this->user->user_active == 0 ? 'No' : 'Yes'); ?></div>
              <div><strong>Profile: </strong><a href="<?= Config::get('URL') . 'profile/showProfile/' . $this->user->user_id; ?>"><?= $this->user->user_name; ?></a></div>
            </div>
          </div><!-- CARD -->
        </div><!-- COL -->
      <?php } ?>
      </div><!-- ROW -->