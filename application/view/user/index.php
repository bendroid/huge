
      <br><br>
      <h4 class="header center orange-text">UserController/index</h4>
      <h4 class="header center">Your profile</h4>
      <div class="row center">
        <h5 class="header col s12 light">A modern responsive front-end framework based on Material Design</h5>
      </div>
      <div class="row center">
        <a href="http://materializecss.com/getting-started.html" id="download-button" class="btn-large waves-effect waves-light orange">Get Started</a>
      </div>
      <br><br>
      <!-- echo out the system feedback (error and success messages) -->
        <?php $this->renderFeedbackMessages(); ?>

      <div class="row">
        <div class="col s12 m4">
          <div class="card grey lighten-5 z-depth-1">
		      <div class="card-image">
            <?php if (Config::get('USE_GRAVATAR')) { ?>
                <img class="responsive-img" src='<?= $this->user_gravatar_image_url; ?>' />
            <?php } else { ?>
                <img class="responsive-img" src='<?= $this->user_avatar_file; ?>' />
            <?php } ?>
            <span class="card-title"><?= $this->user_name; ?></span>
        </div><!-- card-image -->
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
            </div><!-- ACTION -->
          </div><!-- CARD -->
        </div><!-- COL -->

  <div class="col s12 m4">
    <div class="card">
        <div class="card-image">
            <?php if (Config::get('USE_GRAVATAR')) { ?>
                <img class="responsive-img" src='<?= $this->user_gravatar_image_url; ?>' />
            <?php } else { ?>
                <img class="responsive-img" src='<?= $this->user_avatar_file; ?>' />
            <?php } ?>
            <span class="card-title"><?= $this->user_name; ?></span>
        </div><!-- card-image -->
		<div class="card-panel grey lighten-5 z-depth-1">
<div class="row valign-wrapper">
<div class="col s2">
<?php if (Config::get('USE_GRAVATAR')) { ?>
<img class="responsive-img circle" src='<?= $this->user_gravatar_image_url; ?>' />
<?php } else { ?>
<img class="responsive-img circle" src='<?= $this->user_avatar_file; ?>' />
<?php } ?>
</div><!-- col s2 -->
<div class="col s10">
<span class="black-text">
This is a square image. Add the "circle" class to it to make it appear circular.
</span>
</div><!-- col s10 -->
</div><!-- row valign-wrapper -->
</div><!-- card panel -->
        <div class="card-content">
            <p>I am a very simple card. I am good at containing small bits of information. I am convenient because I require little markup to use effectively.</p>
        </div><!-- card-content -->
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
        </div><!-- card-action -->
    </div><!-- card -->
  </div><!-- col -->
  
  <div class="col s12 m4">
  <div class="card-panel grey lighten-5 z-depth-1">
<div class="row valign-wrapper">
<div class="col s4">
<?php if (Config::get('USE_GRAVATAR')) { ?>
<img class="responsive-img circle" src='<?= $this->user_gravatar_image_url; ?>' />
<?php } else { ?>
<img class="responsive-img circle" src='<?= $this->user_avatar_file; ?>' />
<?php } ?>
</div><!-- col s2 -->
<div class="col s8">
<span class="black-text">
This is a square image. Add the "circle" class to it to make it appear circular.
</span>
</div><!-- col s10 -->
</div><!-- row valign-wrapper -->
</div><!-- card panel -->
</div><!-- col -->

  <div class="col s12 m4">
  <div class="card-panel grey lighten-5 z-depth-1">
<div class="row valign-wrapper">
<div class="col s4">
<?php if (Config::get('USE_GRAVATAR')) { ?>
<img class="responsive-img circle" src='<?= $this->user_gravatar_image_url; ?>' />
<?php } else { ?>
<img class="responsive-img circle" src='<?= $this->user_avatar_file; ?>' />
<?php } ?>
</div><!-- col s2 -->
<div class="col s8">
<span class="black-text">
This is a square image. Add the "circle" class to it to make it appear circular.
</span>
</div><!-- col s10 -->
</div><!-- row valign-wrapper -->
</div><!-- card panel -->
</div><!-- col -->

</div><!-- row -->

<div class="row">
<div class="col s12 m8 offset-m2 l6 offset-l3">
<div class="card-panel grey lighten-5 z-depth-1">
<div class="row valign-wrapper">
<div class="col s2">
<?php if (Config::get('USE_GRAVATAR')) { ?>
<img class="responsive-img circle" src='<?= $this->user_gravatar_image_url; ?>' />
<?php } else { ?>
<img class="responsive-img circle" src='<?= $this->user_avatar_file; ?>' />
<?php } ?>
</div><!-- col s2 -->
<div class="col s10">
<span class="black-text">
This is a square image. Add the "circle" class to it to make it appear circular.
</span>
</div><!-- col s10 -->
</div><!-- row valign-wrapper -->
</div><!-- card panel -->
</div><!-- col s12 m8 -->
</div><!-- row -->

<br><br>
<br><br>
<br><br>

<!-- DEMO -->
<h2><i class="zmdi zmdi-pin m-r-5"></i> Profile Information</h2>
<form action="<?php echo Config::get('URL'); ?>user/editUserDemo_action" method="post">
<div class="row">

<div class="input-field col s6">
<input value="<?= $this->first_name; ?>" id="first_name" name="first_name" type="text" class="validate">
<label for="first_name">First Name</label>
</div>

<div class="input-field col s6">
<input value="<?= $this->last_name; ?>" id="last_name" name="last_name" type="text" class="validate">
<label for="last_name">Last Name</label>
</div>

</div>
<div class="row">

<div class="input-field col s6">
<input value="<?= $this->full_name; ?>" id="full_name" name="full_name" type="text" class="validate">
<label for="full_name">Full Name</label>
</div>

<div class="input-field col s6">
<input value="<?= $this->mobile_phone; ?>" id="mobile_phone" name="mobile_phone" type="text" class="validate">
<label for="mobile_phone">Mobile</label>
</div>

<div class="input-field col s6">
<input value="<?= $this->home_phone; ?>" id="home_phone" name="home_phone" type="text" class="validate">
<label for="home_phone">Home</label>
</div>

<div class="input-field col s6">
<input value="<?= $this->work_phone; ?>" id="work_phone" name="work_phone" type="text" class="validate">
<label for="work_phone">Work</label>
</div>

<div class="input-field col s6">
<input type="text" name="user_fb" value="<?= $this->user_fb; ?>" class="form-control" required />
<label for="user_fb">Facebook</label>
</div>

<div class="input-field col s6">
<input type="text" name="user_twitter" value="<?= $this->user_twitter; ?>" class="form-control" required />
<label for="user_twitter">Twitter</label>
</div>

<div class="input-field col s6">
<input type="text" name="user_github" value="<?= $this->user_github; ?>" class="form-control" required />
<label for="user_gihub">Github</label>
</div>

<div class="input-field col s6">
<input type="text" name="user_gp" value="<?= $this->user_gp; ?>" class="form-control" required />
<label for="user_gp">Google Plus</label>
</div>

<div class="input-field col s6">
<input type="text" name="user_street" value="<?= $this->user_street; ?>" class="form-control" required />
<label for="user_street">Street</label>
</div>

<div class="input-field col s6">
<input type="text" name="user_city" value="<?= $this->user_city; ?>" class="form-control" required />
<label for="user_city">City</label>
</div>

<div class="input-field col s6">
<input type="text" name="user_state" value="<?= $this->user_state; ?>" class="form-control" required />
<label for="user_state">State</label>
</div>

<div class="input-field col s6">
<input type="text" name="user_zip" value="<?= $this->user_zip; ?>" class="form-control" required />
<label for="user_zip">Zip</label>
</div>

</div>
<div class="m-t-30">
<button type="submit" class="btn btn-primary btn-sm">Save</button>
<button data-pmb-action="reset" class="btn btn-link btn-sm">Cancel</button>
</div>
</form>

<!-- END DEMO -->



<!-- EDIT ADDRESS -->
<h2><i class="zmdi zmdi-pin m-r-5"></i> Address Information</h2>
<div class="pmbb-edit">
<form action="<?php echo Config::get('URL'); ?>user/editUserAddress_action" method="post" class="" >
<dl class="dl-horizontal">
<dt class="p-t-10">Street</dt>

<dd>
<div class="fg-line">
<input type="text" name="user_street" placeholder="eg. 100 Main Street" value="<?= $this->user_street; ?>" class="form-control" autocomplete="off">
</div>
</dd>

</dl>
<dl class="dl-horizontal">
<dt class="p-t-10">City</dt>

<dd>
<div class="fg-line">
<input type="text" name="user_city" placeholder="eg. New York" value="<?= $this->user_city; ?>" class="form-control" autocomplete="off">
</div>
</dd>

</dl>
<dl class="dl-horizontal">
<dt class="p-t-10">State</dt>

<dd>
<div class="fg-line">
<input type="text" name="user_state" placeholder="eg. NY" value="<?= $this->user_state; ?>" class="form-control" autocomplete="off">
</div>
</dd>

</dl>
<dl class="dl-horizontal" >
<dt class="p-t-10">Zip</dt>
<dd>
<div class="fg-line">
<input type="text" name="user_zip" value="<?= $this->user_zip; ?>" class="form-control" autocomplete="off">
</div>
</dd>

</dl>

<div class="m-t-30">
<button type="submit" class="btn btn-primary btn-sm">Save</button>
<button data-pmb-action="reset" class="btn btn-link btn-sm">Cancel</button>
</div>
</form>
</div>

<!-- EDIT SOCIAL -->
<h2><i class="zmdi zmdi-pin m-r-5"></i> Social Information</h2>
<div class="pmbb-edit">
<form action="<?php echo Config::get('URL'); ?>user/editUserSocial_action" method="post" role="form" data-toggle="validator">
<dl class="dl-horizontal">
<dt class="p-t-10">Twitter</dt>
<dd>
<div class="fg-line">
<input type="text" pattern="^[_A-z0-9]{1,}$" maxlength="15" name="user_twitter" placeholder="eg. <?= $this->user_twitter; ?>" value="<?= $this->user_twitter; ?>" class="form-control" required />
</div>
</dd>
</dl>
<dl class="dl-horizontal">
<dt class="p-t-10">Facebook</dt>

<dd>
<div class="fg-line">
<input type="text" name="user_fb" placeholder="eg. <?= $this->user_fb; ?>" value="<?= $this->user_fb; ?>" class="form-control" required />
</div>
</dd>

</dl>
<dl class="dl-horizontal">
<dt class="p-t-10">Google Plus</dt>

<dd>
<div class="fg-line">
<input type="text" name="user_gp" placeholder="eg. <?= $this->user_gp; ?>" value="<?= $this->user_gp; ?>" class="form-control" required />
</div>
</dd>

</dl>
<dl class="dl-horizontal">
<dt class="p-t-10">Github</dt>

<dd>
<div class="fg-line">
<input type="text" name="user_github" placeholder="eg. <?= $this->user_github; ?>" value="<?= $this->user_github; ?>" class="form-control" required />
</div>
</dd>

</dl>

<div class="m-t-30">
<button type="submit" class="btn btn-primary btn-sm">Save</button>
<button data-pmb-action="reset" class="btn btn-link btn-sm">Cancel</button>
</div>
</form>
</div>

<!-- EDIT ALL -->
<h2><i class="zmdi zmdi-pin m-r-5"></i> Individual Updates</h2>
<div class="pmbb-edit">
<dl class="dl-horizontal">
<dt class="p-t-10">Mobile Phone</dt>
<form action="<?php echo Config::get('URL'); ?>user/editUserMobile_action" method="post" class="">
<dd>
<div class="fg-line">
<input type="text" name="mobile_phone" placeholder="eg. <?= $this->mobile_phone; ?>" value="<?= $this->mobile_phone; ?>" class="form-control input-mask" data-mask="(000) 000-0000" placeholder="eg: (000) 000-0000" maxlength="14" required />
</div>
</dd>
</form>
</dl>
<dl class="dl-horizontal">
<dt class="p-t-10">Home Phone</dt>
<form action="<?php echo Config::get('URL'); ?>user/editUserHome_action" method="post" class="">
<dd>
<div class="fg-line">
<input type="text" name="home_phone" placeholder="eg. <?= $this->home_phone; ?>" value="<?= $this->home_phone; ?>" class="form-control input-mask" data-mask="(000) 000-0000" placeholder="eg: (000) 000-0000" maxlength="14" required />
</div>
</dd>
</form>
</dl>
<dl class="dl-horizontal">
<dt class="p-t-10">Work Phone</dt>
<form action="<?php echo Config::get('URL'); ?>user/editUserWork_action" method="post" class="">
<dd>
<div class="fg-line">
<input type="text" name="work_phone" placeholder="eg. <?= $this->work_phone; ?>" value="<?= $this->work_phone; ?>" class="form-control input-mask" data-mask="(000) 000-0000" placeholder="eg: (000) 000-0000" maxlength="14" required />
</div>
</dd>
</form>
</dl>
<dl class="dl-horizontal">
<dt class="p-t-10">Email Address</dt>
<form action="<?php echo Config::get('URL'); ?>user/editUserEmail_action" method="post" class="">
<dd>
<div class="fg-line">
<input type="text" name="user_email" placeholder="eg. <?= $this->user_email; ?>" value="<?= $this->user_email; ?>" class="form-control" required />
</div>
</dd>
</form>
</dl>
<dl class="dl-horizontal">
<dt class="p-t-10">Twitter</dt>
<form action="<?php echo Config::get('URL'); ?>user/editUserTW_action" method="post" class="">
<dd>
<div class="fg-line">
<input type="text" name="user_twitter" placeholder="eg. <?= $this->user_twitter; ?>" value="<?= $this->user_twitter; ?>" class="form-control" required />
</div>
</dd>
</form>
</dl>
<dl class="dl-horizontal">
<dt class="p-t-10">Facebook</dt>
<form action="<?php echo Config::get('URL'); ?>user/editUserFB_action" method="post" class="">
<dd>
<div class="fg-line">
<input type="text" name="user_fb" placeholder="eg. <?= $this->user_fb; ?>" value="<?= $this->user_fb; ?>" class="form-control" required />
</div>
</dd>
</form>
</dl>
<dl class="dl-horizontal">
<dt class="p-t-10">Google Plus</dt>
<form action="<?php echo Config::get('URL'); ?>user/editUserGP_action" method="post" class="">
<dd>
<div class="fg-line">
<input type="text" name="user_gp" placeholder="eg. <?= $this->user_gp; ?>" value="<?= $this->user_gp; ?>" class="form-control" required />
</div>
</dd>
</form>
</dl>
<dl class="dl-horizontal">
<dt class="p-t-10">Github</dt>
<form action="<?php echo Config::get('URL'); ?>user/editUserGH_action" method="post" class="">
<dd>
<div class="fg-line">
<input type="text" name="user_github" placeholder="eg. <?= $this->user_github; ?>" value="<?= $this->user_github; ?>" class="form-control" required />
</div>
</dd>
</form>
</dl>
<dl class="dl-horizontal">
<dt class="p-t-10">First name</dt>
<form action="<?php echo Config::get('URL'); ?>user/editUserFirstName_action" method="post" class="">
<dd>
<div class="fg-line">
<input type="text" name="first_name" placeholder="eg. <?= $this->first_name; ?>" value="<?= $this->first_name; ?>" class="form-control" required />
</div>
</dd>
</form>
</dl>
<dl class="dl-horizontal">
<dt class="p-t-10">Last name</dt>
<form action="<?php echo Config::get('URL'); ?>user/editUserLastName_action" method="post" class="">
<dd>
<div class="fg-line">
<input type="text" name="last_name" placeholder="eg. <?= $this->last_name; ?>" value="<?= $this->last_name; ?>" class="form-control" required />
</div>
</dd>
</form>
</dl>
<dl class="dl-horizontal">
<dt class="p-t-10">Full name</dt>
<form action="<?php echo Config::get('URL'); ?>user/editUserFullName_action" method="post" class="">
<dd>
<div class="fg-line">
<input type="text" name="full_name" placeholder="eg. <?= $this->full_name; ?>" value="<?= $this->full_name; ?>" class="form-control" required />
</div>
</dd>
</form>
</dl>
<div class="m-t-30">
<button class="btn btn-primary btn-sm">Save</button>
<button data-pmb-action="reset" class="btn btn-link btn-sm">Cancel</button>
</div>
</div>
<!-- END EDIT ALL -->
