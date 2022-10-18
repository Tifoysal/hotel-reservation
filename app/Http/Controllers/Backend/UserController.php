<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Resort;
use App\Models\Transaction;
use App\Models\User;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Auth\ResetPasswordController;
use mysql_xdevapi\Exception;

class UserController extends Controller
{
    public function index()
    {
        $users = User::with('resort')->orderBy('id', 'desc')->paginate(10);
        return view('backend.layouts.user.list', compact('users'));
    }

    public function create()
    {
        $resorts=Resort::all();
        return view('backend.layouts.user.create',compact('resorts'));
    }

    public function userAddProcess(Request $request)
    {
        $this->validate($request,
            [
                'name'     => 'required|max:32',
                'email'    => 'email|required|max:96|unique:users,email',
                'phone'    => 'required',
                'password' => 'required',
                'resort_id' => 'required',
            ]
        );

        $file_name = '';

        if ($request->hasFile('image')) {

            $photo = $request->file('image');
            $file_name = uniqid('photo_', true) .date('ymdms') . '.' . $photo
                    ->getClientOriginalName();
            $photo->storeAs('user', $file_name);
        }

        $data = [
            'password' => Hash::make($request->input('password')),
            'name'     => $request->input('name'),
            'phone'    => $request->input('phone'),
            'email'    => $request->input('email'),
            'image'    => $file_name,
            'resort_id'    => $request->resort_id,
        ];

        $user = User::create($data);

        Toastr::success('User Registration Successful.', 'success', ["positionClass" => "toast-top-right"]);
        return redirect()->route('user.list');
    }

    public function login(Request $request)
    {
        return view('backend.layouts.user.login');
    }

    public function doLogin(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email'    => 'required',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $credentials = [
            'email'    => $request->input('email'),
            'password' => $request->input('password'),
        ];
//dd(auth()->guard('web')->attempt($credentials));
        try {
            if (auth()->attempt($credentials)) {
                if (auth()->user()->status === 'active') {
                    Toastr::success('Login Successful', 'success', ["positionClass" => "toast-top-right"]);
                    return redirect()->route('dashboard');

                } else {
                    Auth::logout();
                    Toastr::warning('Your account is deactivated.', 'warning', ["positionClass" => "toast-top-right"]);
                    return redirect()->back();
                }

            } else {
                Toastr::error("Invalid Credentials !", 'error', ["positionClass" => "toast-top-right"]);
                return redirect()->back();
            }
        } catch (\Exception $e) {
            Toastr::error($e->getMessage(), 'error', ["positionClass" => "toast-top-right"]);
            return redirect()->back();
        }
    }

    public function logout()
    {
        auth()->logout();
        Toastr::success('Logged out successfully.', 'success', ["positionClass" => "toast-top-right"]);
        return redirect()->route('login');
    }


    public function edit($id)
    {
        $user = User::find($id);
        $resorts=Resort::where('status','active')->get();
        return view('backend.layouts.user.edit', compact('user','resorts'));
    }

    public function profile($id)
    {

        $user = User::find($id);
        return view('backend.layouts.user.profile', compact('user'));
    }


    public function profileUpdate(Request $request, $id)
    {
        $this->validate($request,
            [
                'phone' => 'required',
                'name' => 'required',
            ]
        );

        $user=User::find($id);
        $file_name =$user->image ;

        if ($request->hasFile('image')) {

            $photo = $request->file('image');
            $file_name = uniqid('photo_', true) .date('ymdms') . '.' . $photo
                    ->getClientOriginalName();
            $photo->storeAs('user', $file_name);
        }

        $user->update([
                'name'    => $request->input('name'),
                'phone'    => $request->input('phone'),
                'image'    => $file_name,
            ]);

        Toastr::success('User info updated successfully.', 'success', ["positionClass" => "toast-top-right"]);

        return redirect()->back();
    }

    public function update(Request $request, $id)
    {
        $this->validate($request,
            [
                'resort_id' => 'required',
                'user_type' => 'required',
            ]
        );
        if(!empty($request->input('password')))
        {

            User::where('id', $id)->update([
                'password'   => bcrypt($request->input('password')),
                'user_type' => $request->input('user_type'),
                'status'    => $request->input('status'),
                'resort_id'    => $request->input('resort_id'),
            ]);
            $message='User info and password updated successfully.';
        }else
        {
            User::where('id', $id)->update([
                'resort_id'    => $request->input('resort_id'),
                'user_type' => $request->input('user_type'),
                'status'    => $request->input('status'),
            ]);
            $message='User info updated successfully.';
        }

        Toastr::success($message, 'success', ["positionClass" => "toast-top-right"]);

        return redirect()->route('user.list');
    }

    public function passes($value)
    {
        return Hash::check($value, auth()->user()->password);
    }

    public function updatePassword(Request $request)
    {
        try {
            $this->validate($request,
                [
                    'old_password' => 'required',
                    'new_password' => 'required'
                ]
            );
            if ($this->passes($request->old_password))
            {
                User::find(auth()->user()->id)->update(['password'=> Hash::make($request->new_password)]);
                Toastr::success('Password Updated.', 'success', ["positionClass" => "toast-top-right"]);
            }else
            {
                Toastr::error('Old Password not matched.', 'error', ["positionClass" => "toast-top-right"]);

            }
            return redirect()->back();

        }catch (Exception $e)
        {
            Toastr::error($e->getMessage(), 'error', ["positionClass" => "toast-top-right"]);
return redirect()->back();
        }


    }


}
