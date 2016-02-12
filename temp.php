user_
user_name
user_email
first_name
last_name
full_name
mobile_phone
home_phone
work_phone
user_street
user_city
user_state
user_zip
user_fb
user_twitter
user_github
user_gp



<?= $this->; ?>
<?= $this->user_name; ?>
<?= $this->user_email; ?>
<?= $this->first_name; ?>
<?= $this->last_name; ?>
<?= $this->full_name; ?>
<?= $this->mobile_phone; ?>
<?= $this->home_phone; ?>
<?= $this->work_phone; ?>
<?= $this->user_street; ?>
<?= $this->user_city; ?>
<?= $this->user_state; ?>
<?= $this->user_zip; ?>
<?= $this->user_fb; ?>
<?= $this->user_twitter; ?>
<?= $this->user_github; ?>
<?= $this->user_gp; ?>

PROFILE:
<?= $user->user_name; ?>
<?= $user->user_email; ?>
<?= $user->first_name; ?>
<?= $user->last_name; ?>
<?= $user->full_name; ?>
<?= $user->mobile_phone; ?>
<?= $user->home_phone; ?>
<?= $user->work_phone; ?>
<?= $user->user_street; ?>
<?= $user->user_city; ?>
<?= $user->user_state; ?>
<?= $user->user_zip; ?>
<?= $user->user_fb; ?>
<?= $user->user_twitter; ?>
<?= $user->user_github; ?>
<?= $user->user_gp; ?>

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
<div><strong>Your account type is: </strong><?= $user->user_account_type; ?></div>

<div>Your username: <?= $this->user_name; ?></div>
<div>Your email: <?= $this->user_email; ?></div>
<div>Your email: <?= $this->first_name; ?></div>
<div>Your email: <?= $this->last_name; ?></div>
<div>Your email: <?= $this->full_name; ?></div>
<div>Mobile phone: <?= $this->mobile_phone; ?></div>
<div>Home phone: <?= $this->home_phone; ?></div>
<div>Work phone: <?= $this->work_phone; ?></div>
<div>Street: <?= $this->user_street; ?></div>
<div>City: <?= $this->user_city; ?></div>
<div>State: <?= $this->user_state; ?></div>
<div>Zip: <?= $this->user_zip; ?></div>
<div>Facebook: <?= $this->user_fb; ?></div>
<div>Twitter: <?= $this->user_twitter; ?></div>
<div>Github: <?= $this->user_github; ?></div>
<div>Google Plus: <?= $this->user_gp; ?></div>

<?php echo Session::get('user_avatar_file'); ?>
<?php echo Session::get('user_name'); ?>
<?php echo Session::get('user_email'); ?>
<?php echo Session::get('full_name'); ?>
<?php echo Session::get('first_name'); ?>
<?php echo Session::get('last_name'); ?>
<?php echo Session::get('mobile_phone'); ?>
<?php echo Session::get('home_phone'); ?>
<?php echo Session::get('work_phone'); ?>
<?php echo Session::get('user_fb'); ?>
<?php echo Session::get('user_twitter'); ?>
<?php echo Session::get('user_github'); ?>
<?php echo Session::get('user_gp'); ?>


Your avatar image:
    <?php if (Config::get('USE_GRAVATAR')) { ?>
Your gravatar pic (on gravatar.com): <img src='<?= $this->user_gravatar_image_url; ?>' />
    <?php } else { ?>
Your avatar pic (saved locally): <img src='<?= $this->user_avatar_file; ?>' />
    <?php } ?>

USER:
      <div class="row">
        <div class="col s12 m4">
          <div class="card blue-grey darken-1">
            <div class="card-content white-text">
              <span class="card-title">Card Title</span>
              <p>I am a very simple card. I am good at containing small bits of information.
              I am convenient because I require little markup to use effectively.</p>
            </div>
            <div class="card-action">
              <div><strong>Your username: </strong><?= $this->user_name; ?></div>
              <div><strong>Your email: </strong><?= $this->user_email; ?></div>
              <div><strong>Your first name: </strong><?= $this->first_name; ?></div>
              <div><strong>Your last name: </strong><?= $this->last_name; ?></div>
              <div><strong>Your full name: </strong><?= $this->full_name; ?></div>
              <div><strong>Mobile phone: </strong><?= $this->mobile_phone; ?></div>
              <div><strong>Home phone: </strong><?= $this->home_phone; ?></div>
              <div><strong>Work phone: </strong><?= $this->work_phone; ?></div>
              <div><strong>Street: </strong><?= $this->user_street; ?></div>
              <div><strong>City: </strong><?= $this->user_city; ?></div>
              <div><strong>State: </strong><?= $this->user_state; ?></div>
              <div><strong>Zip: </strong><?= $this->user_zip; ?></div>
              <div><strong>Facebook: </strong><?= $this->user_fb; ?></div>
              <div><strong>Twitter: </strong><?= $this->user_twitter; ?></div>
              <div><strong>Github: </strong><?= $this->user_github; ?></div>
              <div><strong>Google Plus: </strong><?= $this->user_gp; ?></div>
              <div><strong>Your account type is: </strong><?= $this->user_account_type; ?></div>
            </div>
          </div>
        </div>

PROFILE:
      <div class="row">
        <div class="col s12 m4">
          <div class="card blue-grey darken-1">
            <div class="card-content white-text">
              <span class="card-title">Card Title</span>
              <p>I am a very simple card. I am good at containing small bits of information.
              I am convenient because I require little markup to use effectively.</p>
            </div>
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
            </div>
          </div>
        </div>

<div><strong>Your username: </strong><?= $this->user_name; ?></div>
<div><strong>Your email: </strong><?= $this->user_email; ?></div>
<div><strong>Your first name: </strong><?= $this->first_name; ?></div>
<div><strong>Your last name: </strong><?= $this->last_name; ?></div>
<div><strong>Your full name: </strong><?= $this->full_name; ?></div>
<div><strong>Mobile phone: </strong><?= $this->mobile_phone; ?></div>
<div><strong>Home phone: </strong><?= $this->home_phone; ?></div>
<div><strong>Work phone: </strong><?= $this->work_phone; ?></div>
<div><strong>Street: </strong><?= $this->user_street; ?></div>
<div><strong>City: </strong><?= $this->user_city; ?></div>
<div><strong>State: </strong><?= $this->user_state; ?></div>
<div><strong>Zip: </strong><?= $this->user_zip; ?></div>
<div><strong>Facebook: </strong><?= $this->user_fb; ?></div>
<div><strong>Twitter: </strong><?= $this->user_twitter; ?></div>
<div><strong>Github: </strong><?= $this->user_github; ?></div>
<div><strong>Google Plus: </strong><?= $this->user_gp; ?></div>
<div><strong>Your account type is: </strong><?= $this->user_account_type; ?></div>
<br><br>
<br><br>
<br><br>
<div><strong>Your username: </strong><?php echo Session::get('user_name'); ?>
<div><strong>Your email: </strong><?php echo Session::get('user_email'); ?>
<div><strong>Your first name: </strong><?php echo Session::get('first_name'); ?>
<div><strong>Your last name: </strong><?php echo Session::get('last_name'); ?>
<div><strong>Your full name: </strong><?php echo Session::get('full_name'); ?>
<div><strong>Mobile phone: </strong><?php echo Session::get('mobile_phone'); ?>
<div><strong>Home phone: </strong><?php echo Session::get('home_phone'); ?>
<div><strong>Work phone: </strong><?php echo Session::get('work_phone'); ?>
<div><strong>Street: </strong><?php echo Session::get('user_street'); ?>
<div><strong>City: </strong><?php echo Session::get('user_city'); ?>
<div><strong>State: </strong><?php echo Session::get('user_state'); ?>
<div><strong>Zip: </strong><?php echo Session::get('user_zip'); ?>
<div><strong>Facebook: </strong><?php echo Session::get('user_fb'); ?>
<div><strong>Twitter: </strong><?php echo Session::get('user_twitter'); ?>
<div><strong>Github: </strong><?php echo Session::get('user_github'); ?>
<div><strong>Google Plus: </strong><?php echo Session::get('user_gp'); ?>
<div><strong>Your account type is: </strong><?php echo Session::get('user_account_type'); ?>
<br><br>
<br><br>
<br><br>