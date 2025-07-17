<?php

namespace App\Http\Controllers\admin;

use App\Models\Visitor;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;





use Illuminate\Foundation\Auth\User as AuthUser;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Hash as FacadesHash;

class AdminController extends Controller
{



    public function login()
    {
        return view('admin.login');
    }

    public function store(Request $request)
    {
        // تحقق من صحة البيانات المدخلة
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        // محاولة تسجيل الدخول
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            // إذا كانت البيانات صحيحة، إعادة توجيه المستخدم إلى لوحة التحكم
            return redirect()->route('admin.dashboard');
        } else {
            // إذا كانت البيانات خاطئة، إعادة المستخدم إلى صفحة تسجيل الدخول مع رسالة خطأ
            return back()->withErrors(['email' => 'البريد الإلكتروني أو كلمة المرور غير صحيحة']);
        }
    }
    public function logout()
    {
        return redirect()->route('admin.login');
    }


    // public function dashboard()
    // {

    //     return view('admin.index');
    // }

     public function index()
    {

        return view('admin.admins.edit');
    }
    public function dashboard()
    {

        return view('admin.index', [
            
        ]);
    }
    /**
    * Show the form for editing the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function edit()
    {
        $admin = Auth::user();
        return view('admin.admins.edit', compact('admin'));
    }

    /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function update(Request $request, $id)
    {
        // Retrieve a single instance of the admin user
        $admin = AuthUser::where('id', $id)->first();

        // Check if admin user exists
        if (!$admin) {
            return redirect()->route('admin.edit', $id)->with('error', 'Admin not found.');
        }

        // Validate the incoming request
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $admin->id,
            'password' => 'nullable|string|min:8',
        ]);

        // Update the admin's data
        $admin->name = $request->input('name');
        $admin->email = $request->input('email');

        // Update the password if it is provided
        if ($request->filled('password')) {
            $admin->password = FacadesHash::make($request->input('password'));
        }

        // Save the changes
        $admin->save();

        // Redirect with success message
        return redirect()->route('admin.edit', $id)->with('success', 'تم تحديث البيانات بنجاح.');
    }









}
