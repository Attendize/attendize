<?php

namespace App\Http\Controllers;

use App\Rules\OldPassword;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    /**
     * Show the edit user modal
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function showEditUser()
    {
        $data = [
            'user' => Auth::user(),
        ];

        return view('ManageUser.Modals.EditUser', $data);
    }

    /**
     * Updates the current user
     *
     * @param Request $request
     * @return mixed
     */
    public function postEditUser(Request $request)
    {
        // Validate the edit user form
        $validation = self::validate_edit_user($request);

        // If validation fails return
        if($validation->fails()){
            return response()->json([
                'status'   => 'error',
                'messages' => $validation->messages()->toArray(),
            ]);
        }

        // Save user info
        self::save_user_edit($request);

        // Return correct response
        return response()->json([
            'status'  => 'success',
            'message' => trans("Controllers.successfully_saved_details"),
        ]);
    }

    /**
     * Save user data from request
     *
     * @param Request $request
     *
     * @return bool
     */
    private function save_user_edit(Request $request){
        // Get the current logged user
        $user = Auth::user();

        // Fill user data form Form
        $user->first_name = $request->get('first_name');
        $user->last_name = $request->get('last_name');
        $user->email = $request->get('email');

        // If new password is provided, hash it
        if ($request->get('password')) {
            $user->password = Hash::make($request->get('new_password'));
        }

        return $user->save();
    }

    /**
     * Validate the edit user request
     *
     * @param Request $request
     * @return \Illuminate\Contracts\Validation\Validator
     */
    private function validate_edit_user(Request $request){
        // Create the validation rules and messages
        [$rules, $messages] = self::edit_user_rules_messages($request);

        // Validate the request
        return Validator::make($request->all(), $rules, $messages);
    }

    /**
     * Create the rules for edit the user
     *
     * @param Request $request
     * @return array
     */
    private function edit_user_rules_messages(Request $request)
    {
        // Create default rules
        $rules = [
            'email'      => [
                'required',
                'email',
                'unique:users,email,' . Auth::id() . ',id,account_id,' . Auth::user()->account_id
            ],
            'first_name' => ['required'],
            'last_name'  => ['required'],
        ];

        // Only add password rules if new password is provided
        if ($request->has('new_password') && !empty($request->get('new_password'))) {
            $rules = array_merge($rules, [
                'password'     => new OldPassword,
                'new_password' => ['min:8', 'confirmed', 'required_with:password']
            ]);
        }

        // Create the messages
        $messages = [
            'email.email'         => trans("Controllers.error.email.email"),
            'email.required'      => trans("Controllers.error.email.required"),
            'password.passcheck'  => trans("Controllers.error.password.passcheck"),
            'email.unique'        => trans("Controllers.error.email.unique"),
            'first_name.required' => trans("Controllers.error.first_name.required"),
            'last_name.required'  => trans("Controllers.error.last_name.required"),
        ];

        return [$rules, $messages];
    }
}
