<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\tbl_users;

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
}
