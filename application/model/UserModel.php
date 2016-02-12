<?php

/**
 * UserModel
 * Handles all the PUBLIC profile stuff. This is not for getting data of the logged in user, it's more for handling
 * data of all the other users. Useful for display profile information, creating user lists etc.
 */
class UserModel
{
    /**
     * Gets an array that contains all the users in the database. The array's keys are the user ids.
     * Each array element is an object, containing a specific user's data.
     * The avatar line is built using Ternary Operators, have a look here for more:
     * @see http://davidwalsh.name/php-shorthand-if-else-ternary-operators
     *
     * @return array The profiles of all users
     */
    public static function getPublicProfilesOfAllUsers()
    {
        $database = DatabaseFactory::getFactory()->getConnection();

        $sql = "SELECT user_id, user_name, first_name, last_name, full_name, mobile_phone, home_phone, work_phone, user_fb, user_twitter, user_github, user_gp, user_street, user_city, user_state, user_zip, user_email, user_active, user_has_avatar, user_deleted FROM users";
        $query = $database->prepare($sql);
        $query->execute();

        $all_users_profiles = array();

        foreach ($query->fetchAll() as $user) {

            // all elements of array passed to Filter::XSSFilter for XSS sanitation, have a look into
            // application/core/Filter.php for more info on how to use. Removes (possibly bad) JavaScript etc from
            // the user's values
            array_walk_recursive($user, 'Filter::XSSFilter');

            $all_users_profiles[$user->user_id] = new stdClass();
            $all_users_profiles[$user->user_id]->user_id = $user->user_id;
            $all_users_profiles[$user->user_id]->user_name = $user->user_name;
            $all_users_profiles[$user->user_id]->first_name = $user->first_name;
            $all_users_profiles[$user->user_id]->last_name = $user->last_name;
            $all_users_profiles[$user->user_id]->full_name = $user->full_name;
            $all_users_profiles[$user->user_id]->mobile_phone = $user->mobile_phone;
            $all_users_profiles[$user->user_id]->home_phone = $user->home_phone;
            $all_users_profiles[$user->user_id]->work_phone = $user->work_phone;
            $all_users_profiles[$user->user_id]->user_fb = $user->user_fb;
            $all_users_profiles[$user->user_id]->user_twitter = $user->user_twitter;
            $all_users_profiles[$user->user_id]->user_github = $user->user_github;
            $all_users_profiles[$user->user_id]->user_gp = $user->user_gp;
            $all_users_profiles[$user->user_id]->user_street = $user->user_street;
            $all_users_profiles[$user->user_id]->user_city = $user->user_city;
            $all_users_profiles[$user->user_id]->user_state = $user->user_state;
            $all_users_profiles[$user->user_id]->user_zip = $user->user_zip;
            $all_users_profiles[$user->user_id]->user_email = $user->user_email;
            $all_users_profiles[$user->user_id]->user_active = $user->user_active;
            $all_users_profiles[$user->user_id]->user_deleted = $user->user_deleted;
            $all_users_profiles[$user->user_id]->user_avatar_link = (Config::get('USE_GRAVATAR') ? AvatarModel::getGravatarLinkByEmail($user->user_email) : AvatarModel::getPublicAvatarFilePathOfUser($user->user_has_avatar, $user->user_id));
        }

        return $all_users_profiles;
    }

    /**
     * Gets a user's profile data, according to the given $user_id
     * @param int $user_id The user's id
     * @return mixed The selected user's profile
     */
    public static function getPublicProfileOfUser($user_id)
    {
        $database = DatabaseFactory::getFactory()->getConnection();

        $sql = "SELECT user_id, user_name, first_name, last_name, full_name, mobile_phone, home_phone, work_phone, user_fb, user_twitter, user_github, user_gp, user_street, user_city, user_state, user_zip, user_email, user_active, user_has_avatar, user_deleted
                FROM users WHERE user_id = :user_id LIMIT 1";
        $query = $database->prepare($sql);
        $query->execute(array(':user_id' => $user_id));

        $user = $query->fetch();

        if ($query->rowCount() == 1) {
            if (Config::get('USE_GRAVATAR')) {
                $user->user_avatar_link = AvatarModel::getGravatarLinkByEmail($user->user_email);
            } else {
                $user->user_avatar_link = AvatarModel::getPublicAvatarFilePathOfUser($user->user_has_avatar, $user->user_id);
            }
        } else {
            Session::add('feedback_negative', Text::get('FEEDBACK_USER_DOES_NOT_EXIST'));
        }

        // all elements of array passed to Filter::XSSFilter for XSS sanitation, have a look into
        // application/core/Filter.php for more info on how to use. Removes (possibly bad) JavaScript etc from
        // the user's values
        array_walk_recursive($user, 'Filter::XSSFilter');

        return $user;
    }

    /**
     * @param $user_name_or_email
     *
     * @return mixed
     */
    public static function getUserDataByUserNameOrEmail($user_name_or_email)
    {
        $database = DatabaseFactory::getFactory()->getConnection();

        $query = $database->prepare("SELECT user_id, user_name, user_email FROM users
                                     WHERE (user_name = :user_name_or_email OR user_email = :user_name_or_email)
                                           AND user_provider_type = :provider_type LIMIT 1");
        $query->execute(array(':user_name_or_email' => $user_name_or_email, ':provider_type' => 'DEFAULT'));

        return $query->fetch();
    }

    /**
     * Checks if a username is already taken
     *
     * @param $user_name string username
     *
     * @return bool
     */
    public static function doesUsernameAlreadyExist($user_name)
    {
        $database = DatabaseFactory::getFactory()->getConnection();

        $query = $database->prepare("SELECT user_id FROM users WHERE user_name = :user_name LIMIT 1");
        $query->execute(array(':user_name' => $user_name));
        if ($query->rowCount() == 0) {
            return false;
        }
        return true;
    }

    /**
     * Checks if a email is already used
     *
     * @param $user_email string email
     *
     * @return bool
     */
    public static function doesEmailAlreadyExist($user_email)
    {
        $database = DatabaseFactory::getFactory()->getConnection();

        $query = $database->prepare("SELECT user_id FROM users WHERE user_email = :user_email LIMIT 1");
        $query->execute(array(':user_email' => $user_email));
        if ($query->rowCount() == 0) {
            return false;
        }
        return true;
    }

    /**
     * Writes new username to database
     *
     * @param $user_id int user id
     * @param $new_user_name string new username
     *
     * @return bool
     */
    public static function saveNewUserName($user_id, $new_user_name)
    {
        $database = DatabaseFactory::getFactory()->getConnection();

        $query = $database->prepare("UPDATE users SET user_name = :user_name WHERE user_id = :user_id LIMIT 1");
        $query->execute(array(':user_name' => $new_user_name, ':user_id' => $user_id));
        if ($query->rowCount() == 1) {
            return true;
        }
        return false;
    }

    /**
     * Writes new email address to database
     *
     * @param $user_id int user id
     * @param $new_user_email string new email address
     *
     * @return bool
     */
    public static function saveNewEmailAddress($user_id, $new_user_email)
    {
        $database = DatabaseFactory::getFactory()->getConnection();

        $query = $database->prepare("UPDATE users SET user_email = :user_email WHERE user_id = :user_id LIMIT 1");
        $query->execute(array(':user_email' => $new_user_email, ':user_id' => $user_id));
        $count = $query->rowCount();
        if ($count == 1) {
            return true;
        }
        return false;
    }

    /**
     * Edit the user's name, provided in the editing form
     *
     * @param $new_user_name string The new username
     *
     * @return bool success status
     */
    public static function editUserName($new_user_name)
    {
        // new username same as old one ?
        if ($new_user_name == Session::get('user_name')) {
            Session::add('feedback_negative', Text::get('FEEDBACK_USERNAME_SAME_AS_OLD_ONE'));
            return false;
        }

        // username cannot be empty and must be azAZ09 and 2-64 characters
        if (!preg_match("/^[a-zA-Z0-9]{2,64}$/", $new_user_name)) {
            Session::add('feedback_negative', Text::get('FEEDBACK_USERNAME_DOES_NOT_FIT_PATTERN'));
            return false;
        }

        // clean the input, strip usernames longer than 64 chars (maybe fix this ?)
        $new_user_name = substr(strip_tags($new_user_name), 0, 64);

        // check if new username already exists
        if (self::doesUsernameAlreadyExist($new_user_name)) {
            Session::add('feedback_negative', Text::get('FEEDBACK_USERNAME_ALREADY_TAKEN'));
            return false;
        }

        $status_of_action = self::saveNewUserName(Session::get('user_id'), $new_user_name);
        if ($status_of_action) {
            Session::set('user_name', $new_user_name);
            Session::add('feedback_positive', Text::get('FEEDBACK_USERNAME_CHANGE_SUCCESSFUL'));
            return true;
        } else {
            Session::add('feedback_negative', Text::get('FEEDBACK_UNKNOWN_ERROR'));
            return false;
        }
    }

    /**
     * Edit the user's email
     *
     * @param $new_user_email
     *
     * @return bool success status
     */
    public static function editUserEmail($new_user_email)
    {
        // email provided ?
        if (empty($new_user_email)) {
            Session::add('feedback_negative', Text::get('FEEDBACK_EMAIL_FIELD_EMPTY'));
            return false;
        }

        // check if new email is same like the old one
        if ($new_user_email == Session::get('user_email')) {
            Session::add('feedback_negative', Text::get('FEEDBACK_EMAIL_SAME_AS_OLD_ONE'));
            return false;
        }

        // user's email must be in valid email format, also checks the length
        // @see http://stackoverflow.com/questions/21631366/php-filter-validate-email-max-length
        // @see http://stackoverflow.com/questions/386294/what-is-the-maximum-length-of-a-valid-email-address
        if (!filter_var($new_user_email, FILTER_VALIDATE_EMAIL)) {
            Session::add('feedback_negative', Text::get('FEEDBACK_EMAIL_DOES_NOT_FIT_PATTERN'));
            return false;
        }

        // strip tags, just to be sure
        $new_user_email = substr(strip_tags($new_user_email), 0, 254);

        // check if user's email already exists
        if (self::doesEmailAlreadyExist($new_user_email)) {
            Session::add('feedback_negative', Text::get('FEEDBACK_USER_EMAIL_ALREADY_TAKEN'));
            return false;
        }

        // write to database, if successful ...
        // ... then write new email to session, Gravatar too (as this relies to the user's email address)
        if (self::saveNewEmailAddress(Session::get('user_id'), $new_user_email)) {
            Session::set('user_email', $new_user_email);
            Session::set('user_gravatar_image_url', AvatarModel::getGravatarLinkByEmail($new_user_email));
            Session::add('feedback_positive', Text::get('FEEDBACK_EMAIL_CHANGE_SUCCESSFUL'));
            return true;
        }

        Session::add('feedback_negative', Text::get('FEEDBACK_UNKNOWN_ERROR'));
        return false;
    }

/***************************************************
EDITS
****************************************************/

    /**
     * Writes new mobile phone address to database
     *
     * @param $user_id int user id
     * @param $new_mobile_phone string new mobile phone address
     *
     * @return bool
     */
    public static function saveNewMobilePhone($user_id, $new_mobile_phone)
    {
        $database = DatabaseFactory::getFactory()->getConnection();

        $query = $database->prepare("UPDATE users SET mobile_phone = :mobile_phone WHERE user_id = :user_id LIMIT 1");
        $query->execute(array(':mobile_phone' => $new_mobile_phone, ':user_id' => $user_id));
        $count = $query->rowCount();
        if ($count == 1) {
            return true;
        }
        return false;
    }
    
    /**
     * Writes new mobile phone address to database
     *
     * @param $user_id int user id
     * @param $new_home_phone string new mobile phone address
     *
     * @return bool
     */
    public static function saveNewHomePhone($user_id, $new_home_phone)
    {
        $database = DatabaseFactory::getFactory()->getConnection();

        $query = $database->prepare("UPDATE users SET home_phone = :home_phone WHERE user_id = :user_id LIMIT 1");
        $query->execute(array(':home_phone' => $new_home_phone, ':user_id' => $user_id));
        $count = $query->rowCount();
        if ($count == 1) {
            return true;
        }
        return false;
    }

    
    
     /**
     * Edit the user's mobile, provided in the editing form
     *
     * @param $new_mobile_phone string The new username
     *
     * @return bool success status
     */
    public static function editUserMobile($new_mobile_phone)
    {
        // new mobile phone same as old one ?
        if ($new_mobile_phone == Session::get('mobile_phone')) {
            Session::add('feedback_negative', Text::get('FEEDBACK_USERNAME_SAME_AS_OLD_ONE'));
            return false;
        }

        /*
        // mobile phone cannot be empty and must be azAZ09 and 2-64 characters
        if (!preg_match("/^[a-zA-Z0-9]{2,64}$/", $new_mobile_phone)) {
            Session::add('feedback_negative', Text::get('FEEDBACK_USERNAME_DOES_NOT_FIT_PATTERN'));
            return false;
        }
        */

        // clean the input, strip phone numbers longer than 64 chars (maybe fix this ?)
        $new_mobile_phone = substr(strip_tags($new_mobile_phone), 0, 64);


        $status_of_action = self::saveNewMobilePhone(Session::get('user_id'), $new_mobile_phone);
        if ($status_of_action) {
            Session::set('mobile_phone', $new_mobile_phone);
            Session::add('feedback_positive', Text::get('FEEDBACK_MOBILE_PHONE_CHANGE_SUCCESSFUL'));
            return true;
        } else {
            Session::add('feedback_negative', Text::get('FEEDBACK_UNKNOWN_ERROR'));
            return false;
        }
    }
    
    
    
    /**
     * Edit the user's home, provided in the editing form
     *
     * @param $new_home_phone string The new username
     *
     * @return bool success status
     */
    public static function editUserHome($new_home_phone)
    {
        // new home phone same as old one ?
        if ($new_home_phone == Session::get('home_phone')) {
            Session::add('feedback_negative', Text::get('FEEDBACK_HOME_PHONE_SAME_AS_OLD_ONE'));
            return false;
        }

        /*
        // home phone cannot be empty and must be azAZ09 and 2-64 characters
        if (!preg_match("/^[a-zA-Z0-9]{2,64}$/", $new_home_phone)) {
            Session::add('feedback_negative', Text::get('FEEDBACK_USERNAME_DOES_NOT_FIT_PATTERN'));
            return false;
        }
        */

        // clean the input, strip phone numbers longer than 64 chars (maybe fix this ?)
        $new_home_phone = substr(strip_tags($new_home_phone), 0, 64);


        $status_of_action = self::saveNewHomePhone(Session::get('user_id'), $new_home_phone);
        if ($status_of_action) {
            Session::set('home_phone', $new_home_phone);
            Session::add('feedback_positive', Text::get('FEEDBACK_USERNAME_CHANGE_SUCCESSFUL'));
            return true;
        } else {
            Session::add('feedback_negative', Text::get('FEEDBACK_UNKNOWN_ERROR'));
            return false;
        }
    }
    
    
    /**
     * Edit the user's work, provided in the editing form
     *
     * @param $new_work_phone string The new work-phone
     *
     * @return bool success status
     */
    public static function editUserWork($new_work_phone)
    {
        // new username same as old one ?
        if ($new_work_phone == Session::get('work_phone')) {
            Session::add('feedback_negative', Text::get('FEEDBACK_USERNAME_SAME_AS_OLD_ONE'));
            return false;
        }

        /*
        // username cannot be empty and must be azAZ09 and 2-64 characters
        if (!preg_match("/^[a-zA-Z0-9]{2,64}$/", $new_work_phone)) {
            Session::add('feedback_negative', Text::get('FEEDBACK_USERNAME_DOES_NOT_FIT_PATTERN'));
            return false;
        }
        */

        // clean the input, strip phone numbers longer than 64 chars (maybe fix this ?)
        $new_work_phone = substr(strip_tags($new_work_phone), 0, 64);


        $status_of_action = self::saveNewUserWork(Session::get('user_id'), $new_work_phone);
        if ($status_of_action) {
            Session::set('work_phone', $new_work_phone);
            Session::add('feedback_positive', Text::get('FEEDBACK_USERNAME_CHANGE_SUCCESSFUL'));
            return true;
        } else {
            Session::add('feedback_negative', Text::get('FEEDBACK_UNKNOWN_ERROR'));
            return false;
        }
    }
    
    /**
     * Writes new work phone address to database
     *
     * @param $user_id int user id
     * @param $new_work_phone string new work phone address
     *
     * @return bool
     */
    public static function saveNewUserWork($user_id, $new_work_phone)
    {
        $database = DatabaseFactory::getFactory()->getConnection();

        $query = $database->prepare("UPDATE users SET work_phone = :work_phone WHERE user_id = :user_id LIMIT 1");
        $query->execute(array(':work_phone' => $new_work_phone, ':user_id' => $user_id));
        $count = $query->rowCount();
        if ($count == 1) {
            return true;
        }
        return false;
    }
    
    
    /**
     * Edit the user's work, provided in the editing form
     *
     * @param $new_user_fb string The new user-fb
     *
     * @return bool success status
     */
    public static function editUserFB($new_user_fb)
    {
        // new username same as old one ?
        if ($new_user_fb == Session::get('user_fb')) {
            Session::add('feedback_negative', Text::get('FEEDBACK_USERNAME_SAME_AS_OLD_ONE'));
            return false;
        }

        /*
        // username cannot be empty and must be azAZ09 and 2-64 characters
        if (!preg_match("/^[a-zA-Z0-9]{2,64}$/", $new_user_fb)) {
            Session::add('feedback_negative', Text::get('FEEDBACK_USERNAME_DOES_NOT_FIT_PATTERN'));
            return false;
        }
        */

        // clean the input, strip fb numbers longer than 64 chars (maybe fix this ?)
        $new_user_fb = substr(strip_tags($new_user_fb), 0, 64);


        $status_of_action = self::saveNewUserFB(Session::get('user_id'), $new_user_fb);
        if ($status_of_action) {
            Session::set('user_fb', $new_user_fb);
            Session::add('feedback_positive', Text::get('FEEDBACK_USERNAME_CHANGE_SUCCESSFUL'));
            return true;
        } else {
            Session::add('feedback_negative', Text::get('FEEDBACK_UNKNOWN_ERROR'));
            return false;
        }
    }
    
    /**
     * Writes new work fb address to database
     *
     * @param $user_id int user id
     * @param $new_user_fb string new work fb address
     *
     * @return bool
     */
    public static function saveNewUserFB($user_id, $new_user_fb)
    {
        $database = DatabaseFactory::getFactory()->getConnection();

        $query = $database->prepare("UPDATE users SET user_fb = :user_fb WHERE user_id = :user_id LIMIT 1");
        $query->execute(array(':user_fb' => $new_user_fb, ':user_id' => $user_id));
        $count = $query->rowCount();
        if ($count == 1) {
            return true;
        }
        return false;
    }
    
    
    /**
     * Edit the user's work, provided in the editing form
     *
     * @param $new_user_github string The new user-github
     *
     * @return bool success status
     */
    public static function editUserGH($new_user_github)
    {
        // new username same as old one ?
        if ($new_user_github == Session::get('user_github')) {
            Session::add('feedback_negative', Text::get('FEEDBACK_USERNAME_SAME_AS_OLD_ONE'));
            return false;
        }

        /*
        // username cannot be empty and must be azAZ09 and 2-64 characters
        if (!preg_match("/^[a-zA-Z0-9]{2,64}$/", $new_user_github)) {
            Session::add('feedback_negative', Text::get('FEEDBACK_USERNAME_DOES_NOT_FIT_PATTERN'));
            return false;
        }
        */

        // clean the input, strip github numbers longer than 64 chars (maybe fix this ?)
        $new_user_github = substr(strip_tags($new_user_github), 0, 64);


        $status_of_action = self::saveNewUserGH(Session::get('user_id'), $new_user_github);
        if ($status_of_action) {
            Session::set('user_github', $new_user_github);
            Session::add('feedback_positive', Text::get('FEEDBACK_USERNAME_CHANGE_SUCCESSFUL'));
            return true;
        } else {
            Session::add('feedback_negative', Text::get('FEEDBACK_UNKNOWN_ERROR'));
            return false;
        }
    }
    
    /**
     * Writes new work github address to database
     *
     * @param $user_id int user id
     * @param $new_user_github string new work github address
     *
     * @return bool
     */
    public static function saveNewUserGH($user_id, $new_user_github)
    {
        $database = DatabaseFactory::getFactory()->getConnection();

        $query = $database->prepare("UPDATE users SET user_github = :user_github WHERE user_id = :user_id LIMIT 1");
        $query->execute(array(':user_github' => $new_user_github, ':user_id' => $user_id));
        $count = $query->rowCount();
        if ($count == 1) {
            return true;
        }
        return false;
    }
    
    /**
     * Edit the user's work, provided in the editing form
     *
     * @param $new_user_twitter string The new twitter
     *
     * @return bool success status
     */
    public static function editUserTW($new_user_twitter)
    {
        // new username same as old one ?
        if ($new_user_twitter == Session::get('user_twitter')) {
            Session::add('feedback_negative', Text::get('FEEDBACK_USERNAME_SAME_AS_OLD_ONE'));
            return false;
        }

        /*
        // username cannot be empty and must be azAZ09 and 2-64 characters
        if (!preg_match("/^[a-zA-Z0-9]{2,64}$/", $new_user_twitter)) {
            Session::add('feedback_negative', Text::get('FEEDBACK_USERNAME_DOES_NOT_FIT_PATTERN'));
            return false;
        }
        */

        // clean the input, strip github numbers longer than 64 chars (maybe fix this ?)
        $new_user_twitter = substr(strip_tags($new_user_twitter), 0, 64);


        $status_of_action = self::saveNewUserTW(Session::get('user_id'), $new_user_twitter);
        if ($status_of_action) {
            Session::set('user_twitter', $new_user_twitter);
            Session::add('feedback_positive', Text::get('FEEDBACK_USERNAME_CHANGE_SUCCESSFUL'));
            return true;
        } else {
            Session::add('feedback_negative', Text::get('FEEDBACK_UNKNOWN_ERROR'));
            return false;
        }
    }
    
    /**
     * Writes new work github address to database
     *
     * @param $user_id int user id
     * @param $new_user_twitter string new work github address
     *
     * @return bool
     */
    public static function saveNewUserTW($user_id, $new_user_twitter)
    {
        $database = DatabaseFactory::getFactory()->getConnection();

        $query = $database->prepare("UPDATE users SET user_twitter = :user_twitter WHERE user_id = :user_id LIMIT 1");
        $query->execute(array(':user_twitter' => $new_user_twitter, ':user_id' => $user_id));
        $count = $query->rowCount();
        if ($count == 1) {
            return true;
        }
        return false;
    }

/*******************************************************
END EDITS
*******************************************************/    

    /**
     * Gets the user's id
     *
     * @param $user_name
     *
     * @return mixed
     */
    public static function getUserIdByUsername($user_name)
    {
        $database = DatabaseFactory::getFactory()->getConnection();

        $sql = "SELECT user_id FROM users WHERE user_name = :user_name AND user_provider_type = :provider_type LIMIT 1";
        $query = $database->prepare($sql);

        // DEFAULT is the marker for "normal" accounts (that have a password etc.)
        // There are other types of accounts that don't have passwords etc. (FACEBOOK)
        $query->execute(array(':user_name' => $user_name, ':provider_type' => 'DEFAULT'));

        // return one row (we only have one result or nothing)
        return $query->fetch()->user_id;
    }

    /**
     * Gets the user's data
     *
     * @param $user_name string User's name
     *
     * @return mixed Returns false if user does not exist, returns object with user's data when user exists
     */
    public static function getUserDataByUsername($user_name)
    {
        $database = DatabaseFactory::getFactory()->getConnection();

        $sql = "SELECT user_id, user_name, first_name, last_name, full_name, mobile_phone, home_phone, work_phone, user_fb, user_twitter, user_github, user_gp, user_street, user_city, user_state, user_zip, user_email, user_password_hash, user_active,user_deleted, user_suspension_timestamp, user_account_type,
                       user_failed_logins, user_last_failed_login
                  FROM users
                 WHERE (user_name = :user_name OR user_email = :user_name)
                       AND user_provider_type = :provider_type
                 LIMIT 1";
        $query = $database->prepare($sql);

        // DEFAULT is the marker for "normal" accounts (that have a password etc.)
        // There are other types of accounts that don't have passwords etc. (FACEBOOK)
        $query->execute(array(':user_name' => $user_name, ':provider_type' => 'DEFAULT'));

        // return one row (we only have one result or nothing)
        return $query->fetch();
    }

    /**
     * Gets the user's data by user's id and a token (used by login-via-cookie process)
     *
     * @param $user_id
     * @param $token
     *
     * @return mixed Returns false if user does not exist, returns object with user's data when user exists
     */
    public static function getUserDataByUserIdAndToken($user_id, $token)
    {
        $database = DatabaseFactory::getFactory()->getConnection();

        // get real token from database (and all other data)
        $query = $database->prepare("SELECT user_id, user_name, first_name, last_name, full_name, mobile_phone, home_phone, work_phone, user_fb, user_twitter, user_github, user_gp, user_street, user_city, user_state, user_zip, user_email, user_password_hash, user_active,
                                          user_account_type,  user_has_avatar, user_failed_logins, user_last_failed_login
                                     FROM users
                                     WHERE user_id = :user_id
                                       AND user_remember_me_token = :user_remember_me_token
                                       AND user_remember_me_token IS NOT NULL
                                       AND user_provider_type = :provider_type LIMIT 1");
        $query->execute(array(':user_id' => $user_id, ':user_remember_me_token' => $token, ':provider_type' => 'DEFAULT'));

        // return one row (we only have one result or nothing)
        return $query->fetch();
    }
}
