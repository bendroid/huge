<?php

/**
 * EditController
 * Controls everything that is authentication-related
 */
class EditController extends Controller
{
    /**
     * Construct this object by extending the basic Controller class. The parent::__construct thing is necessary to
     * put checkAuthentication in here to make an entire controller only usable for logged-in users (for sure not
     * needed in the LoginController).
     */
    public function __construct()
    {
        parent::__construct();
		
		// this entire controller should only be visible/usable by logged in users, so we put authentication-check here
        Auth::checkAuthentication();
    }
	
	/**
     * This method controls what happens when you move to /edit/editUserDemo in your app.
     */
    public function index()
    {
        $this->View->render('user/index');
    }
	
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
	
    public function editUsername()
    {
        Auth::checkAuthentication();
        $this->View->render('user/index');
    }

    public function editUsername_action()
    {
        Auth::checkAuthentication();



        EditModel::editUserName(Request::post('user_name'));
        Redirect::to('user/index');
    }

    public function editUserEmail()
    {
        Auth::checkAuthentication();
        $this->View->render('user/index');
    }
	
    public function editUserEmail_action()
    {
        Auth::checkAuthentication();
        EditModel::editUserEmail(Request::post('user_email'));
        Redirect::to('user/index');
    }

    public function editAvatar()
    {
        Auth::checkAuthentication();
        $this->View->render('user/index', array(
            'avatar_file_path' => AvatarModel::getPublicUserAvatarFilePathByUserId(Session::get('user_id'))
        ));
    }

    public function uploadAvatar_action()
    {
        Auth::checkAuthentication();
        AvatarModel::createAvatar();
        Redirect::to('user/index');
    }

    public function deleteAvatar_action()
    {
        Auth::checkAuthentication();
        AvatarModel::deleteAvatar(Session::get("user_id"));
        Redirect::to('user/index');
    }

    public function changeUserRole()
    {
        Auth::checkAuthentication();
        $this->View->render('user/index');
    }

    public function changeUserRole_action()
    {
        Auth::checkAuthentication();

        if (Request::post('user_account_upgrade')) {
            // "2" is quick & dirty account type 2, something like "premium user" maybe. you got the idea :)
            UserRoleModel::changeUserRole(2);
        }

        if (Request::post('user_account_downgrade')) {
            // "1" is quick & dirty account type 1, something like "basic user" maybe.
            UserRoleModel::changeUserRole(1);
        }

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