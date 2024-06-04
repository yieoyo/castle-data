<?php

namespace App\Http\Controllers;


use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(auth()->user()->role == 'user'){
            abort(403, 'You are not authorized');
        }
        $users = User::where('id', '!=', 1)->get();

        // return $dataTable->render('pages.users.index');
        return view('pages.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if(auth()->user()->role == 'user'){
            abort(403, 'You are not authorized');
        }
        return view('pages.users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest $request)
    {
        if(auth()->user()->role == 'user'){
            abort(403, 'You are not authorized');
        }
        $newUser = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
            'role' => 'user',
        ]);

        // If user created successfully
        if ($newUser) {
            return redirect()->route('users.index')->with('success', 'User created successfully');
        }
        return redirect()->back()->with('error', 'Failed to create user.');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        if(auth()->user()->id != $user->id  && auth()->user()->role == 'user'){
            abort(403, 'You are not authorized');
        }
        return view('pages.users.profile', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        if(auth()->user()->id != $user->id  && auth()->user()->role == 'user'){
            abort(403, 'You are not authorized');
        }
        return view('pages.users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        if(auth()->user()->id != $user->id  && auth()->user()->role == 'user'){
            abort(403, 'You are not authorized');
        }
        // If user created successfully
        if ($user->update($request->all())) {
            return redirect()->back()->with('success', 'User created successfully');
        }
        return redirect()->back()->with('error', 'Can not update user!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        if(auth()->user()->role == 'user'){
            abort(403, 'You are not authorized');
        }
        $user->delete();
        return redirect()->route('users.index')->with('success', 'User deleted successfully');
    }



    public function changePassword(Request $request, $userid)
    {
        if(auth()->user()->id != $userid && auth()->user()->role == 'user'){
            abort(403, 'You are not authorized');
        }
        // Validate the request
        $request->validate(['password' => 'required|min:6|confirmed']);
        $user = User::findOrFail($userid);
        // Check if authenticated user is authorized to change password for the user
        if ($user->update(['password' => bcrypt($request->input('password'))])) {
            // Redirect back or show a success message
            return redirect()->back()->with('success', 'Password changed successfully.');
        }
        return redirect()->back()->with('error', 'Password can not be changed.');
    }

}
