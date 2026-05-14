<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class userController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user = User::all();
        return view('user/index', compact('user'));
    }

    public function create()
    {
        return view('user/create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'position' => 'required',
        ]);

        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->position = $request->position;
        $user->save();

        return redirect('user')->with('success', 'User berhasil ditambahkan');
    }

    public function edit($id)
    {
        $user = User::find($id);
        return view('user/edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $id,
            'position' => 'required',
        ]);

        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->position = $request->position;

        if ($request->password) {
            $user->password = bcrypt($request->password);
        }

        $user->save();

        return redirect('user')->with('success', 'User berhasil diupdate');
    }

    public function delete($id)
    {
        $user = User::find($id);

        if ($user->id == auth()->user()->id) {
            return redirect('user')->with('error', 'Tidak dapat menghapus akun sendiri');
        }

        $user->delete();
        return redirect('user')->with('success', 'User berhasil dihapus');
    }
}
