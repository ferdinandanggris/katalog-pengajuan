<?php

namespace App\Http\Controllers;

use App\Models\RoleModel;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

    public function __construct()
    {
    }

    public function checkIsAdmin()
    {
        if (auth()->user()->role->slug != 'admin') {
            if (request()->method() != 'GET') {
                abort(403);
            }
        }
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->checkIsAdmin();
        return view('users.index', [
            'users' => User::with("role")->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->checkIsAdmin();
        return view('users.create',[
            'roles' => RoleModel::get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->checkIsAdmin();
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|unique:users',
            'role_id' => 'required',
            'password' => 'required',
        ]);

        $validatedData['password'] = bcrypt($validatedData['password']);
        $user = User::create($validatedData);
        return redirect('/users')->with('success', 'User is successfully saved');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $this->checkIsAdmin();
        return view('users.show', [
            'user' => User::findOrFail($id),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $this->checkIsAdmin();
        return view('users.edit', [
            'user' => User::findOrFail($id),
            'roles' => RoleModel::get()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->checkIsAdmin();
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'email' => "required|unique:users,email,{$id}",
            'role_id' => 'required',
        ]);

        if ($request->filled('password')) {
            $validatedData['password'] = bcrypt($request->password);
        }

        $user = User::findOrFail($id);
        $user->update($validatedData);
        return redirect('/users')->with('success', 'User is successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->checkIsAdmin();
        $user = User::findOrFail($id);
        $user->delete();
        return redirect('/users')->with('success', 'User is successfully deleted');
    }
}
