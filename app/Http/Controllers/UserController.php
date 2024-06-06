<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\tbl_users;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;

class UserController extends Controller
{
    public function index()
    {
        return view('Login');
    }

    public function createAccount()
    {
        return view('Create_account');
    }

    public function insertUserAccount(Request $request)
    {
        $firstname      = $request->firstname;
        $middlename     = $request->middlename;
        $lastname       = $request->lastname;
        $suffix         = $request->suffix;
        $age            = $request->age;
        $email          = $request->email;
        $username       = $request->username;
        $password       = $request->password;
        $retypepassword = $request->retypepassword;

        $dataInput = array (
            $firstname,
            $middlename,
            $lastname,
            $age,
            $email,
            $username,
            $password,
            $retypepassword
        );

        if(in_array('', $dataInput))
        {
            return response()->JSON([
                'status'    => 'empty',
                 'message'  => 'Please input all required fields'
            ]);
        }

        else
        {
            $data = DB::table('tbl_users')->insert([
                'first_name'          => $firstname,
                'middle_name'         => $middlename,
                'last_name'           => $lastname,
                'suffix'              => $suffix,
                'age'                 => $age,
                'email'               => $email,
                'user_name'           => $username,
                'password'            => sha1($password),
                're_type_password'    => sha1($retypepassword),
                'created_at'          => date('Y-m-d')
            ]);
    
            if($data)
            {
                return response()->JSON([
                    'status'    => 'success',
                    'message'   => 'Successfully created!'
                ]);
            }
    
            else
            {
                return response()->JSON([
                    'message'   => 'Error!'
                ]);
            }
        }

    }

    public function checkEmailInDB(Request $request)
    {
        $email = $request->email;

        $checker = DB::table('tbl_users')->where('email', $email)->first();

        if($checker)
        {
            return response()->JSON([
                'status'    => 'success',
                'message'   => 'email already used!'
            ]);
        }

        else if(strpos($email, '@gmail.com') === false)
        {
            return response()->JSON([
                'status'    => 'checker',
                'message'   => 'input valid email!'
            ]);
        }

        else
        {
            return response()->JSON([
                'status'    => 'valid',
                'message'   => ''
            ]);
        }
    }

    public function login(Request $request)
    {
        $user_name = $request->user_name;
        $password = sha1($request->password);


        $checkInDB = DB::table('tbl_users')
        ->where('user_name', $user_name)
        ->where('password', $password)
        ->first();

        if($checkInDB)
        {
                $loginResult = Auth::loginUsingId($checkInDB->user_id);

                if($loginResult)
                {
                    // Store the username in the session
                    session(['user_name' => $user_name]);

                    return response()->JSON([
                        'status'    => 'success',
                        'user_name' => $user_name,
                    ]);  
                }

                else
                {   
                    return response()->JSON([
                        'message' => 'Authentication failed'
                    ]);
                }  
        }

        else
        {
            return response()->JSON([
                'message'   => 'Incorrect username or password'
            ]);

        }
    }

    public function indexAfterLogin()
    {

        if (Auth::check()) {

            return view('Index');
        } 
        else 
        {
            return view('Login');
            
        } 

     
    }


    public function logout(Request $request)
    {
        Auth::logout();

        // Clear all session data
        session()->flush();
        // Regenerate the session ID to prevent session fixation attacks
        session()->invalidate();

        session()->regenerateToken();

        return redirect()->route('login');
    }
}
