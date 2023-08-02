<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        return view('admin.user.index');
    }

    public function edit($id)
    {
        $u = User::find($id);

        return view('admin.user.edit', compact('u'));
    }

    public function update(Request $request, $id)
    {
        $validate = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'passwordOld' => 'nullable',
            'password' => 'nullable',
        ]);

        $user = User::find($id);
        $passwordOldInDatabase = $user->password;

        if($request->passwordOld && $request->password) {
            if (Hash::check($request->passwordOld, $passwordOldInDatabase)) {
                $user = User::find($id)->update([
                    'name' => $request->name,
                    'email' => $request->email,
                    'password' => Hash::make($request->password)
                ]);
            } else {
                return back()->withErrors([
                    'error' => 'Password Lama Tidak Sesuai'
                ]);
            }
        }

        $user = User::find($id)->update([
            'name' => $request->name,
            'email' => $request->email,
        ]);

        return redirect()->route('user.index')->with('success', 'Data Akun Berhasil Di Update');
    }
}
