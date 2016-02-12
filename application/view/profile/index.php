<h4>Profiles</h4>

        <!-- echo out the system feedback (error and success messages) -->
        <?php $this->renderFeedbackMessages(); ?>

      <div class="row">
      <?php foreach ($this->users as $user) { ?>
        <div class="col s12 m4">
          <div class="card grey lighten-5 z-depth-1">
            <div class="card-image">
            <?php if (isset($user->user_avatar_link)) { ?>
                <img class="responsive-img" src="<?= $user->user_avatar_link; ?>" />
            <?php } ?>
              <span class="card-title"><?= $user->user_name; ?></span>
            </div><!-- card-image -->
            <div class="card-action">
              <div><strong>Your username: </strong><?= $user->user_name; ?></div>
              <div><strong>Your email: </strong><?= $user->user_email; ?></div>
              <div><strong>Your first name: </strong><?= $user->first_name; ?></div>
              <div><strong>Your last name: </strong><?= $user->last_name; ?></div>
              <div><strong>Your full name: </strong><?= $user->full_name; ?></div>
              <div><strong>Mobile phone: </strong><?= $user->mobile_phone; ?></div>
              <div><strong>Home phone: </strong><?= $user->home_phone; ?></div>
              <div><strong>Work phone: </strong><?= $user->work_phone; ?></div>
              <div><strong>Street: </strong><?= $user->user_street; ?></div>
              <div><strong>City: </strong><?= $user->user_city; ?></div>
              <div><strong>State: </strong><?= $user->user_state; ?></div>
              <div><strong>Zip: </strong><?= $user->user_zip; ?></div>
              <div><strong>Facebook: </strong><?= $user->user_fb; ?></div>
              <div><strong>Twitter: </strong><?= $user->user_twitter; ?></div>
              <div><strong>Github: </strong><?= $user->user_github; ?></div>
              <div><strong>Google Plus: </strong><?= $user->user_gp; ?></div>
              <div><strong>Active: </strong><?= ($user->user_active == 0 ? 'No' : 'Yes'); ?></div>
              <div><strong>Profile: </strong><a href="<?= Config::get('URL') . 'profile/showProfile/' . $user->user_id; ?>"><?= $user->user_name; ?></a></div>
            </div>
          </div><!-- CARD -->
        </div><!-- COL -->
      <?php } ?>
      </div><!-- ROW -->