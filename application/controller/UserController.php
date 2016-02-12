<?php

/**
 * UserController
 * Controls everything that is user-related
 */
class UserController extends Controller
{
    /**
     * Construct this object by extending the basic Controller class.
     */
    public function __construct()
    {
        parent::__construct();

        // VERY IMPORTANT: All controllers/areas that should only be usable by logged-in users
        // need this line! Otherwise not-logged in users could do actions.
        Auth::checkAuthentication();
    }

    /**
     * Show user's PRIVATE profile
     */
    public function index()
    {
        $this->View->render('user/index', array(
            'user_name' => Session::get('user_name'),
            'first_name' => Session::get('first_name'),
            'last_name' => Session::get('last_name'),
            'full_name' => Session::get('full_name'),
            'mobile_phone' => Session::get('mobile_phone'),
            'home_phone' => Session::get('home_phone'),
            'work_phone' => Session::get('work_phone'),
            'user_fb' => Session::get('user_fb'),
            'user_twitter' => Session::get('user_twitter'),
            'user_github' => Session::get('user_github'),
            'user_gp' => Session::get('user_gp'),
            'user_street' => Session::get('user_street'),
            'user_city' => Session::get('user_city'),
            'user_state' => Session::get('user_state'),
            'user_zip' => Session::get('user_zip'),
            'user_email' => Session::get('user_email'),
            'user_gravatar_image_url' => Session::get('user_gravatar_image_url'),
            'user_avatar_file' => Session::get('user_avatar_file'),
            'user_account_type' => Session::get('user_account_type')
        ));
    }

    /**
     * Show user's PRIVATE profile
     */
    public function test()
    {
        $this->View->render('user/test', array(
            'user_name' => Session::get('user_name'),
            'first_name' => Session::get('first_name'),
            'last_name' => Session::get('last_name'),
            'full_name' => Session::get('full_name'),
            'mobile_phone' => Session::get('mobile_phone'),
            'home_phone' => Session::get('home_phone'),
            'work_phone' => Session::get('work_phone'),
            'user_fb' => Session::get('user_fb'),
            'user_twitter' => Session::get('user_twitter'),
            'user_github' => Session::get('user_github'),
            'user_gp' => Session::get('user_gp'),
            'user_street' => Session::get('user_street'),
            'user_city' => Session::get('user_city'),
            'user_state' => Session::get('user_state'),
            'user_zip' => Session::get('user_zip'),
            'user_email' => Session::get('user_email'),
            'user_gravatar_image_url' => Session::get('user_gravatar_image_url'),
            'user_avatar_file' => Session::get('user_avatar_file'),
            'user_account_type' => Session::get('user_account_type')
        ));
    }

    /**
     * Show edit-my-username page
     */
    public function editUsername()
    {
        $this->View->render('user/editUsername');
    }

    /**
     * Edit user name (perform the real action after form has been submitted)
     */
    public function editUsername_action()
    {
        // check if csrf token is valid
        if (!Csrf::isTokenValid()) {
            LoginModel::logout();
            Redirect::home();
            exit();
        }

        UserModel::editUserName(Request::post('user_name'));
        Redirect::to('user/editUsername');
    }

    /**
     * Show edit-my-user-email page
     */
    public function editUserEmail()
    {
        $this->View->render('user/editUserEmail');
    }

    /**
     * Edit user email (perform the real action after form has been submitted)
     */
    // make this POST
    public function editUserEmail_action()
    {
        UserModel::editUserEmail(Request::post('user_email'));
        Redirect::to('user/editUserEmail');
    }

    /**
     * Edit avatar
     */
    public function editAvatar()
    {
        $this->View->render('user/editAvatar', array(
            'avatar_file_path' => AvatarModel::getPublicUserAvatarFilePathByUserId(Session::get('user_id'))
        ));
    }

    /**
     * Perform the upload of the avatar
     * POST-request
     */
    public function uploadAvatar_action()
    {
        AvatarModel::createAvatar();
        Redirect::to('user/editAvatar');
    }

    /**
     * Delete the current user's avatar
     */
    public function deleteAvatar_action()
    {
        AvatarModel::deleteAvatar(Session::get("user_id"));
        Redirect::to('user/editAvatar');
    }

    /**
     * Show the change-account-type page
     */
    public function changeUserRole()
    {
        $this->View->render('user/changeUserRole');
    }

    /**
     * Perform the account-type changing
     * POST-request
     */
    public function changeUserRole_action()
    {
        if (Request::post('user_account_upgrade')) {
            // "2" is quick & dirty account type 2, something like "premium user" maybe. you got the idea :)
            UserRoleModel::changeUserRole(2);
        }

        if (Request::post('user_account_downgrade')) {
            // "1" is quick & dirty account type 1, something like "basic user" maybe.
            UserRoleModel::changeUserRole(1);
        }

        Redirect::to('user/changeUserRole');
    }

    /**
     * Password Change Page
     */
    public function changePassword()
    {
        $this->View->render('user/changePassword');
    }

    /**
     * Password Change Action
     * Submit form, if retured positive redirect to index, otherwise show the changePassword page again
     */
    public function changePassword_action()
    {
        $result = PasswordResetModel::changePassword(
            Session::get('user_name'), Request::post('user_password_current'),
            Request::post('user_password_new'), Request::post('user_password_repeat')
        );

        if($result)
            Redirect::to('user/index');
        else
            Redirect::to('user/changePassword');
    }

    /*************************************************************
    *********************************
    **************************************************************/
    
    /**
     * Edit user mobile (perform the real action after form has been submitted)
     * Auth::checkAuthentication() makes sure that only logged in users can use this action and see this page
     */
    // make this POST
    public function editUserDemo_action()
    {
        Auth::checkAuthentication();
        
        EditModel::editUserFirstName(Request::post('first_name'));
        EditModel::editUserLastName(Request::post('last_name'));
        EditModel::editUserFullName(Request::post('full_name'));
        EditModel::editUserMobile(Request::post('mobile_phone'));
        EditModel::editUserHome(Request::post('home_phone'));
        EditModel::editUserWork(Request::post('work_phone'));
        EditModel::editUserFB(Request::post('user_fb'));
        EditModel::editUserTW(Request::post('user_twitter'));
        EditModel::editUserGH(Request::post('user_github'));
        EditModel::editUserGP(Request::post('user_gp'));
        EditModel::editUserStreet(Request::post('user_street'));
        EditModel::editUserCity(Request::post('user_city'));
        EditModel::editUserState(Request::post('user_state'));
        EditModel::editUserZip(Request::post('user_zip'));
        Redirect::to('user/index');
}

    public function editUserAddress_action()
    {
        Auth::checkAuthentication();
        
        EditModel::editUserStreet(Request::post('user_street'));
        EditModel::editUserCity(Request::post('user_city'));
        EditModel::editUserState(Request::post('user_state'));
        EditModel::editUserZip(Request::post('user_zip'));
        Redirect::to('user/index');
}
    
    public function editUserSocial_action()
    {
        Auth::checkAuthentication();
        
        EditModel::editUserFB(Request::post('user_fb'));
        EditModel::editUserTW(Request::post('user_twitter'));
        EditModel::editUserGH(Request::post('user_github'));
        EditModel::editUserGP(Request::post('user_gp'));
        Redirect::to('user/index');
}
    
    public function editUserFirstName_action()
    {
        Auth::checkAuthentication();
        EditModel::editUserFirstName(Request::post('first_name'));
        Redirect::to('user/index');
    }
    
    public function editUserLastName_action()
    {
        Auth::checkAuthentication();
        EditModel::editUserLastName(Request::post('last_name'));
        Redirect::to('user/index');
    }
    
    public function editUserFullName_action()
    {
        Auth::checkAuthentication();
        EditModel::editUserFullName(Request::post('full_name'));
        Redirect::to('user/index');
    }
    
    public function editUserMobile_action()
    {
        Auth::checkAuthentication();
        EditModel::editUserMobile(Request::post('mobile_phone'));
        Redirect::to('user/index');
    }
    
    public function editUserHome_action()
    {
        Auth::checkAuthentication();
        EditModel::editUserHome(Request::post('home_phone'));
        Redirect::to('user/index');
    }
    
    public function editUserWork_action()
    {
        Auth::checkAuthentication();
        EditModel::editUserWork(Request::post('work_phone'));
        Redirect::to('user/index');
    }
    
    public function editUserFB_action()
    {
        Auth::checkAuthentication();
        EditModel::editUserFB(Request::post('user_fb'));
        Redirect::to('user/index');
    }
    
    public function editUserTW_action()
    {
        Auth::checkAuthentication();
        EditModel::editUserTW(Request::post('user_twitter'));
        Redirect::to('user/index');
    }
    
    public function editUserGH_action()
    {
        Auth::checkAuthentication();
        EditModel::editUserGH(Request::post('user_github'));
        Redirect::to('user/index');
    }
    
    public function editUserGP_action()
    {
        Auth::checkAuthentication();
        EditModel::editUserGP(Request::post('user_gp'));
        Redirect::to('user/index');
    }
    
    public function editUserStreet_action()
    {
        Auth::checkAuthentication();
        EditModel::editUserStreet(Request::post('user_street'));
        Redirect::to('user/index');
    }
    
    public function editUserCity_action()
    {
        Auth::checkAuthentication();
        EditModel::editUserCity(Request::post('user_city'));
        Redirect::to('user/index');
    }
    
    public function editUserState_action()
    {
        Auth::checkAuthentication();
        EditModel::editUserState(Request::post('user_state'));
        Redirect::to('user/index');
    }
    
    public function editUserZip_action()
    {
        Auth::checkAuthentication();
        EditModel::editUserZip(Request::post('user_zip'));
        Redirect::to('user/index');
    }
}
