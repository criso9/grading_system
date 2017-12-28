<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Student;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    // protected function validator(array $data)
    // {
    //     return Validator::make($data, [
    //         // 'name' => 'required|string|max:255',
    //         // 'email' => 'required|string|email|max:255|unique:users',
    //         // 'password' => 'required|string|min:6|confirmed',

    //         'stud_no' => 'required',
    //         'course' => 'required',
    //         'first_name' => 'required',
    //         'last_name' => 'required',
    //         'email' => 'required|email',
    //         'password' => 'required|confirmed',
    //         'birth_date' => 'required',
    //         'gender' => 'required',
    //         'address' => 'required'
    //     ]);
    // }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    // protected function create(array $data)
    // {
    //     return User::create([
    //         'name' => $data['name'],
    //         'email' => $data['email'],
    //         'password' => bcrypt($data['password']),
    //     ]);
    // }

    // public function create()
    // {
    //     return view('auth.register');
    // }

    public function store(Request $request)
    {
        
            //$validator = Validator::make($request = Input::all(), validator());
            $validator = Validator::make($request = Input::all(), Student::$rules);
            
            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }
          
            $data = new User;

            $data->name = $request['first_name'].' '.$request['middle_name'].' '.$request['last_name'];
            $data->email = $request['email'];
            $data->password = bcrypt($request['password']);
            $data->role_id = '2';

            $data->save();

            $userId = $data->id;

            Student::create([
                'user_id' => $userId,
                'stud_no' => $request['stud_no'],
                'first_name' => $request['first_name'],
                'middle_name' => $request['middle_name'],
                'last_name' => $request['last_name'],
                'birth_date' => $request['birth_date'],
                'gender' => $request['gender'],
                'course' => $request['course'],
                'address' => $request['address'],
                'date_reg' => date("Y-m-d"),
            ]);
            
            return redirect('admin')->withMessage('Registration Successful, you can now login.');
           
    }
}
