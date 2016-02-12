<div class="card" id="profile-main">
<div class="pm-overview c-overflow">
<div class="pmo-pic">
<div class="p-relative">
<a href="">
<?php if (Config::get('USE_GRAVATAR')) { ?>
<img class="img-responsive" src='<?= $this->user_gravatar_image_url; ?>' alt="" />
<?php } else { ?>
<img class="img-responsive" src='<?= $this->user_avatar_file; ?>' alt="" />
<?php } ?>
</a>

<div class="dropdown pmop-message">
<a data-toggle="dropdown" href="" class="btn bgm-white btn-float z-depth-1">
<i class="zmdi zmdi-comment-text-alt"></i>
</a>

<div class="dropdown-menu">
<textarea placeholder="Write something..."></textarea>

<button class="btn bgm-green btn-icon"><i class="zmdi zmdi-mail-send"></i></button>
</div>
</div>

<a href="" class="pmop-edit">
<i class="zmdi zmdi-camera"></i> <span class="hidden-xs">Update Profile Picture</span>
</a>
</div>


<div class="pmo-stat">
<h2 class="m-0 c-white">1562</h2>
Total Connections
</br>Account Type: <?= $this->user_account_type; ?>
</div>
</div>

<div class="pmo-block pmo-contact hidden-xs">
<h2>Contact</h2>

<ul>
<li><i class="zmdi zmdi-phone"></i> <?= $this->mobile_phone; ?></li>
<li><i class="zmdi zmdi-email"></i> <?= $this->user_email; ?></li>
<li><i class="zmdi zmdi-twitter"></i> <a href="https://twitter.com/<?= $this->user_twitter; ?>" target="_blank"><?= $this->user_twitter; ?></a></li>
<li><i class="zmdi zmdi-facebook-box"></i> <a href="https://facebook.com/<?= $this->user_fb; ?>" target="_blank"><?= $this->user_fb; ?></a></li>
<li><i class="zmdi zmdi-github-box"></i> <a href="https://github.com/<?= $this->user_github; ?>" target="_blank"><?= $this->user_github; ?></a></li>
<li><i class="zmdi zmdi-google-plus-box"></i> <a href="https://plus.google.com/<?= $this->user_gp; ?>" target="_blank"><?= $this->user_gp; ?></a></li>
<li>
<i class="zmdi zmdi-pin"></i>
<address class="m-b-0">
<?= $this->user_street; ?> <br/>
<?= $this->user_city; ?>, <?= $this->user_state; ?><br/>
<?= $this->user_zip; ?>
</address>
</li>
</ul>
</div>

<div class="pmo-block pmo-items hidden-xs">
<h2>Connections</h2>

<div class="pmob-body">
<div class="row">
<!-- user images -->
</div>
</div>
</div>
</div>

<div class="pm-body clearfix">
<ul class="tab-nav tn-justified">
<li class="active waves-effect"><a href="<?php echo Config::get('URL'); ?>user/index">About</a></li>
<li class="waves-effect"><a href="<?php echo Config::get('URL'); ?>user/timeline">Timeline</a></li>
<li class="waves-effect"><a href="<?php echo Config::get('URL'); ?>user/photos">Photos</a></li>
<li class="waves-effect"><a href="<?php echo Config::get('URL'); ?>user/connections">Connections</a></li>
</ul>


<div class="pmb-block">
<div class="pmbb-header">
<h2><i class="zmdi zmdi-equalizer m-r-5"></i> Summary</h2>
<ul class="actions">
<button data-pmb-action="edit" class="btn bgm-blue btn-icon waves-effect waves-circle waves-float"><i class="zmdi zmdi-edit"></i></button>
</ul>
</div>
<div class="pmbb-body p-l-30">
<div class="pmbb-view">
Sed eu est vulputate, fringilla ligula ac, maximus arcu. Donec sed felis vel magna mattis ornare ut non turpis. Sed id arcu elit. Sed nec sagittis tortor. Mauris ante urna, ornare sit amet mollis eu, aliquet ac ligula. Nullam dolor metus, suscipit ac imperdiet nec, consectetur sed ex. Sed cursus porttitor leo.
</div>

<div class="pmbb-edit">
<div class="fg-line">
<textarea class="form-control" rows="5" placeholder="Summary...">Sed eu est vulputate, fringilla ligula ac, maximus arcu. Donec sed felis vel magna mattis ornare ut non turpis. Sed id arcu elit. Sed nec sagittis tortor. Mauris ante urna, ornare sit amet mollis eu, aliquet ac ligula. Nullam dolor metus, suscipit ac imperdiet nec, consectetur sed ex. Sed cursus porttitor leo.</textarea>
</div>
<div class="m-t-10">
<button class="btn btn-primary btn-sm">Save</button>
<button data-pmb-action="reset" class="btn btn-link btn-sm">Cancel</button>
</div>
</div>
</div>
</div>

<div class="pmb-block">
<div class="pmbb-header">
<h2><i class="zmdi zmdi-account m-r-5"></i> Basic Information</h2>

<ul class="actions">
<button data-pmb-action="edit" class="btn bgm-blue btn-icon waves-effect waves-circle waves-float"><i class="zmdi zmdi-edit"></i></button>
</ul>
</div>
<div class="pmbb-body p-l-30">
<div class="pmbb-view">
<dl class="dl-horizontal">
<dt>Full Name</dt>
<dd><?= $this->full_name; ?></dd>
</dl>
<dl class="dl-horizontal">
<dt>User Name</dt>
<dd><?= $this->user_name; ?></dd>
</dl>
<dl class="dl-horizontal">
<dt>Gender</dt>
<dd>Male</dd>
</dl>
<dl class="dl-horizontal">
<dt>Birthday</dt>
<dd>January 26, 1983</dd>
</dl>
<dl class="dl-horizontal">
<dt>Martial Status</dt>
<dd>Single</dd>
</dl>
</div>

<div class="pmbb-edit">
<dl class="dl-horizontal">
<dt class="p-t-10">Full Name</dt>
<form action="<?php echo Config::get('URL'); ?>user/editUserFullName_action" method="post" class="">
<dd>
<div class="fg-line">
<input type="text" name="full_name" class="form-control" placeholder="eg. <?= $this->full_name; ?>">
</div>
</dd>
</form>
</dl>
<dl class="dl-horizontal">
<dt class="p-t-10">User Name</dt>
<form action="<?php echo Config::get('URL'); ?>user/editUsername_action" method="post" class="">
<dd>
<div class="fg-line">
<input type="text" name="user_name" placeholder="eg. <?= $this->user_name; ?>" class="form-control" required />
</div>
</dd>
</form>
</dl>
<dl class="dl-horizontal">
<dt class="p-t-10">Gender</dt>
<dd>
<div class="fg-line">
<select class="form-control">
<option>Male</option>
<option>Female</option>
<option>Other</option>
</select>
</div>
</dd>
</dl>
<dl class="dl-horizontal">
<dt class="p-t-10">Birthday</dt>
<dd>
<div class="dtp-container dropdown fg-line">
<input type='text' class="form-control date-picker" data-toggle="dropdown" placeholder="Click here...">
</div>
</dd>
</dl>
<dl class="dl-horizontal">
<dt class="p-t-10">Martial Status</dt>
<dd>
<div class="fg-line">
<select class="form-control">
<option>Single</option>
<option>Married</option>
<option>Other</option>
</select>
</div>
</dd>
</dl>

<div class="m-t-30">
<button class="btn btn-primary btn-sm">Save</button>
<button data-pmb-action="reset" class="btn btn-link btn-sm">Cancel</button>
</div>
</div>
</div>
</div>
   

<div class="pmb-block">
<div class="pmbb-header">
<h2><i class="zmdi zmdi-phone m-r-5"></i> Contact Information</h2>

<ul class="actions">
<button data-pmb-action="edit" class="btn bgm-blue btn-icon waves-effect waves-circle waves-float"><i class="zmdi zmdi-edit"></i></button>
</ul>
</div>
<div class="pmbb-body p-l-30">
<div class="pmbb-view">
<dl class="dl-horizontal">
<dt>Mobile Phone</dt>
<dd><?= $this->mobile_phone; ?></dd>
</dl>
<dl class="dl-horizontal">
<dt>Home Phone</dt>
<dd><?= $this->home_phone; ?></dd>
</dl>
<dl class="dl-horizontal">
<dt>Work Phone</dt>
<dd><?= $this->work_phone; ?></dd>
</dl>
<dl class="dl-horizontal">
<dt>Email Address</dt>
<dd><?= $this->user_email; ?></dd>
</dl>
<dl class="dl-horizontal">
<dt>Twitter</dt>
<dd><a href="https://twitter.com/<?= $this->user_twitter; ?>" target="_blank"><?= $this->user_twitter; ?></a></dd>
</dl>
<dl class="dl-horizontal">
<dt>Facebook</dt>
<dd><a href="https://facebook.com/<?= $this->user_fb; ?>" target="_blank"><?= $this->user_fb; ?></a></dd>
</dl>
<dl class="dl-horizontal">
<dt>Google Plus</dt>
<dd><a href="https://plus.google.com/<?= $this->user_gp; ?>" target="_blank"><?= $this->user_gp; ?></a></dd>
</dl>
<dl class="dl-horizontal">
<dt>Github</dt>
<dd><a href="https://github.com/<?= $this->user_github; ?>" target="_blank"><?= $this->user_github; ?></a></dd>
</dl>
<dl class="dl-horizontal">
<dt>Skype</dt>
<dd><?= $this->user_name; ?></dd>
</dl>
<dl class="dl-horizontal">
<dt>First Name</dt>
<dd><?= $this->first_name; ?></dd>
</dl>
<dl class="dl-horizontal">
<dt>Last Name</dt>
<dd><?= $this->last_name; ?></dd>
</dl>
<dl class="dl-horizontal">
<dt>Full Name</dt>
<dd><?= $this->full_name; ?></dd>
</dl>

</div>

<div class="pmbb-edit">
<dl class="dl-horizontal">
<dt class="p-t-10">Mobile Phone</dt>
<form action="<?php echo Config::get('URL'); ?>user/editUserMobile_action" method="post" class="">
<dd>
<div class="fg-line">
<input type="text" name="mobile_phone" placeholder="eg. <?= $this->mobile_phone; ?>" class="form-control input-mask" data-mask="(000) 000-0000" placeholder="eg: (000) 000-0000" maxlength="14" required />
</div>
</dd>
</form>
</dl>
<dl class="dl-horizontal">
<dt class="p-t-10">Home Phone</dt>
<form action="<?php echo Config::get('URL'); ?>user/editUserHome_action" method="post" class="">
<dd>
<div class="fg-line">
<input type="text" name="home_phone" placeholder="eg. <?= $this->home_phone; ?>" class="form-control input-mask" data-mask="(000) 000-0000" placeholder="eg: (000) 000-0000" maxlength="14" required />
</div>
</dd>
</form>
</dl>
<dl class="dl-horizontal">
<dt class="p-t-10">Work Phone</dt>
<form action="<?php echo Config::get('URL'); ?>user/editUserWork_action" method="post" class="">
<dd>
<div class="fg-line">
<input type="text" name="work_phone" placeholder="eg. <?= $this->work_phone; ?>" class="form-control input-mask" data-mask="(000) 000-0000" placeholder="eg: (000) 000-0000" maxlength="14" required />
</div>
</dd>
</form>
</dl>
<dl class="dl-horizontal">
<dt class="p-t-10">Email Address</dt>
<form action="<?php echo Config::get('URL'); ?>user/editUserEmail_action" method="post" class="">
<dd>
<div class="fg-line">
<input type="text" name="user_email" placeholder="eg. <?= $this->user_email; ?>" class="form-control" required />
</div>
</dd>
</form>
</dl>
<dl class="dl-horizontal">
<dt class="p-t-10">Twitter</dt>
<form action="<?php echo Config::get('URL'); ?>user/editUserTW_action" method="post" class="">
<dd>
<div class="fg-line">
<input type="text" name="user_twitter" placeholder="eg. <?= $this->user_twitter; ?>" class="form-control" required />
</div>
</dd>
</form>
</dl>
<dl class="dl-horizontal">
<dt class="p-t-10">Facebook</dt>
<form action="<?php echo Config::get('URL'); ?>user/editUserFB_action" method="post" class="">
<dd>
<div class="fg-line">
<input type="text" name="user_fb" placeholder="eg. <?= $this->user_fb; ?>" class="form-control" required />
</div>
</dd>
</form>
</dl>
<dl class="dl-horizontal">
<dt class="p-t-10">Google Plus</dt>
<form action="<?php echo Config::get('URL'); ?>user/editUserGP_action" method="post" class="">
<dd>
<div class="fg-line">
<input type="text" name="user_gp" placeholder="eg. <?= $this->user_gp; ?>" class="form-control" required />
</div>
</dd>
</form>
</dl>
<dl class="dl-horizontal">
<dt class="p-t-10">Github</dt>
<form action="<?php echo Config::get('URL'); ?>user/editUserGH_action" method="post" class="">
<dd>
<div class="fg-line">
<input type="text" name="user_github" placeholder="eg. <?= $this->user_github; ?>" class="form-control" required />
</div>
</dd>
</form>
</dl>
<dl class="dl-horizontal">
<dt class="p-t-10">First name</dt>
<form action="<?php echo Config::get('URL'); ?>user/editUserFirstName_action" method="post" class="">
<dd>
<div class="fg-line">
<input type="text" name="first_name" placeholder="eg. <?= $this->first_name; ?>" class="form-control" required />
</div>
</dd>
</form>
</dl>
<dl class="dl-horizontal">
<dt class="p-t-10">Last name</dt>
<form action="<?php echo Config::get('URL'); ?>user/editUserLastName_action" method="post" class="">
<dd>
<div class="fg-line">
<input type="text" name="last_name" placeholder="eg. <?= $this->last_name; ?>" class="form-control" required />
</div>
</dd>
</form>
</dl>
<dl class="dl-horizontal">
<dt class="p-t-10">Full name</dt>
<form action="<?php echo Config::get('URL'); ?>user/editUserFullName_action" method="post" class="">
<dd>
<div class="fg-line">
<input type="text" name="full_name" placeholder="eg. <?= $this->full_name; ?>" class="form-control" required />
</div>
</dd>
</form>
</dl>
<dl class="dl-horizontal">
<dt class="p-t-10">Skype</dt>
<dd>
<div class="fg-line">
<input type="text" class="form-control" placeholder="eg. <?= $this->user_name; ?>" required />
</div>
</dd>
</dl>
<div class="m-t-30">
<button class="btn btn-primary btn-sm">Save</button>
<button data-pmb-action="reset" class="btn btn-link btn-sm">Cancel</button>
</div>
</div>
</div>
</div>

<div class="pmb-block">
<div class="pmbb-header">
<h2><i class="zmdi zmdi-pin m-r-5"></i> Social</h2>

<ul class="actions">
<button data-pmb-action="edit" class="btn bgm-blue btn-icon waves-effect waves-circle waves-float"><i class="zmdi zmdi-edit"></i></button>
</ul>
</div>
<div class="pmbb-body p-l-30">
<div class="pmbb-view">
<dl class="dl-horizontal">
<dt>Twitter</dt>
<dd><a href="https://twitter.com/<?= $this->user_twitter; ?>" target="_blank"><?= $this->user_twitter; ?></a></dd>
</dl>
<dl class="dl-horizontal">
<dt>Facebook</dt>
<dd><a href="https://facebook.com/<?= $this->user_fb; ?>" target="_blank"><?= $this->user_fb; ?></a></dd>
</dl>
<dl class="dl-horizontal">
<dt>Google Plus</dt>
<dd><a href="https://plus.google.com/<?= $this->user_gp; ?>" target="_blank"><?= $this->user_gp; ?></a></dd>
</dl>
<dl class="dl-horizontal">
<dt>Github</dt>
<dd><a href="https://github.com/<?= $this->user_github; ?>" target="_blank"><?= $this->user_github; ?></a></dd>
</dl>
</div>

<div class="pmbb-edit">
<form action="<?php echo Config::get('URL'); ?>user/editUserSocial_action" method="post" role="form" data-toggle="validator">
<dl class="dl-horizontal">
<dt class="p-t-10">Twitter</dt>
<dd>
<div class="fg-line">
<input type="text" pattern="^[_A-z0-9]{1,}$" maxlength="15" name="user_twitter" placeholder="eg. <?= $this->user_twitter; ?>" class="form-control" required />
</div>
</dd>
</dl>
<dl class="dl-horizontal">
<dt class="p-t-10">Facebook</dt>

<dd>
<div class="fg-line">
<input type="text" name="user_fb" placeholder="eg. <?= $this->user_fb; ?>" class="form-control" required />
</div>
</dd>

</dl>
<dl class="dl-horizontal">
<dt class="p-t-10">Google Plus</dt>

<dd>
<div class="fg-line">
<input type="text" name="user_gp" placeholder="eg. <?= $this->user_gp; ?>" class="form-control" required />
</div>
</dd>

</dl>
<dl class="dl-horizontal">
<dt class="p-t-10">Github</dt>

<dd>
<div class="fg-line">
<input type="text" name="user_github" placeholder="eg. <?= $this->user_github; ?>" class="form-control" required />
</div>
</dd>

</dl>

<div class="m-t-30">
<button type="submit" class="btn btn-primary btn-sm">Save</button>
<button data-pmb-action="reset" class="btn btn-link btn-sm">Cancel</button>
</div>
</form>
</div>
</div>
</div>

<div class="pmb-block">
<div class="pmbb-header">
<h2><i class="zmdi zmdi-pin m-r-5"></i> Address Information</h2>

<ul class="actions">
<button data-pmb-action="edit" class="btn bgm-blue btn-icon waves-effect waves-circle waves-float"><i class="zmdi zmdi-edit"></i></button>
</ul>
</div>
<div class="pmbb-body p-l-30">
<div class="pmbb-view">
<dl class="dl-horizontal">
<dt>Street</dt>
<dd><?= $this->user_street; ?></dd>
</dl>
<dl class="dl-horizontal">
<dt>City</dt>
<dd><?= $this->user_city; ?></dd>
</dl>
<dl class="dl-horizontal">
<dt>State</dt>
<dd><?= $this->user_state; ?></dd>
</dl>
<dl class="dl-horizontal">
<dt>Zip</dt>
<dd><?= $this->user_zip; ?></dd>
</dl>
</div>

<div class="pmbb-edit">
<form action="<?php echo Config::get('URL'); ?>user/editUserAddress_action" method="post" class="" >
<dl class="dl-horizontal">
<dt class="p-t-10">Street</dt>

<dd>
<div class="fg-line">
<input type="text" name="user_street" placeholder="eg. 100 Main Street" class="form-control" autocomplete="off">
</div>
</dd>

</dl>
<dl class="dl-horizontal">
<dt class="p-t-10">City</dt>

<dd>
<div class="fg-line">
<input type="text" name="user_city" placeholder="eg. New York" class="form-control" autocomplete="off">
</div>
</dd>

</dl>
<dl class="dl-horizontal">
<dt class="p-t-10">State</dt>

<dd>
<div class="fg-line">
<input type="text" name="user_state" placeholder="eg. NY" class="form-control" autocomplete="off">
</div>
</dd>

</dl>
<dl class="dl-horizontal" >
<dt class="p-t-10">Zip</dt>
<dd>
<div class="fg-line">
<input type="text" name="user_zip" placeholder="eg. 10011" class="form-control" autocomplete="off">
</div>
</dd>

</dl>

<div class="m-t-30">
<button type="submit" class="btn btn-primary btn-sm">Save</button>
<button data-pmb-action="reset" class="btn btn-link btn-sm">Cancel</button>
</div>
</form>
</div>
</div>
</div>
</div>
</div>