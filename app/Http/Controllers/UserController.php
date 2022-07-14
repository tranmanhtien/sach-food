<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Product;
use App\Http\Requests\User\UserRegister;
use App\Http\Requests\User\UserLogin;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Notifications\RegisterUserNotification;
use Illuminate\Support\Facades\Log;
use App\Mail\RegisterUser;
use Illuminate\Support\Facades\Mail;

class UserController extends Controller
{
    public function newpass($email)
    {
        return view('page.newpass', compact('email'));
    }
    public function postpasss(Request $request)
    {
        $pass = $request->password;
        $email = $request->email;
        $user = User::where('email', '=', $email)->get();
        //dd($user->id);
        if (!empty($user[0]->id)) {
            $user[0]->password = Hash::make($request->password);
            $user[0]->save();
            return redirect()->route('home.login')->with('error', "Mời bạn đăng nhập");
        } else {
            return redirect()->route('home.newpass', $email)->with('error', "Lỗi");
        }
    }
    public function getemail(Request $request)
    {
        $email = $request->email;
        $user = User::where('email', '=', $email)->get();

        if (!empty($user[0]->id)) {
            return redirect()->route('home.newpass', $email);
        } {
            return redirect()->route('home.changepass')->with('error', "Không có email nào như vậy");
        }
    }
    public function changepass()
    {
        return view('page.changepass');
    }
    //mật khẩu 12345678
    public function Login()
    {
        return view('page.login');
    }
    public function Register()
    {
        return view('page.register');
    }
    public function PostRegister(UserRegister $request)
    {
        if (!Hash::check($request->password, $request->password2)) {
            if (User::create([
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'level' => 1,
                'is_active' => '1'
            ])) {
                Mail::to($request->email)->send(new RegisterUser());
                return redirect()->route('home.login')->with('success', "Đăng ký thành công");
            } else {
                return redirect()->route('home.register')->with('error', "Không hợp lệ vui lòng làm lại!");
            }
        } else
            return redirect()->route('home.register')->with('error', "Lỗi mật khẩu không giống nhau!");
    }

    public function activeUser(Request $request)
    {
        $active_token = $request->input('active-token');
        $num_active_token = User::where('active_token', '=', "$active_token")->where('is_active', '=', '0')->count();
        if ($num_active_token > 0) {
            User::where('active_token', '=', "$active_token")->where('is_active', '=', '0')->update([
                'is_active' => '1'
            ]);
            $user = User::where('active_token', '=',  $active_token)->where('is_active', '=', '1')->first();
            session([
                'login' => true,
                'id'    => $user->id,
                'name'  => $user->name,
            ]);

            return redirect('kich-hoat-thanh-cong');
        } else {
            return abort(404);
        }
    }

    public function activeSuccess()
    {
        return view('user.active-user-success');
    }

    public function PostLogin(UserLogin $request)
    {
        // Validate thông tin email, password để tiến hành
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt(['email' => $credentials['email'], 'password' => $credentials['password'], 'role' => '1'])) {
            // Authentication was successful...
            return redirect('admin');
        } else if (Auth::attempt(['email' => $credentials['email'], 'password' => $credentials['password'], 'role' => '0'])) {
            return redirect()->route('home');
        }

        return back()->withErrors([
            'login_fail' => 'The provided credentials do not match our records.',
        ]);
    }
    public function view()
    {
        $products = Product::orderBy('id', 'DESC')->search()->paginate(20);

        return view('pages.content.home', compact(['products']));
    }
    public function logout()
    {
        Auth::logout();
        return redirect()->route('home');
    }
}
