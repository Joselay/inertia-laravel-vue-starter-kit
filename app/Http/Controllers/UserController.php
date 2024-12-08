<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Inertia;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();

        return inertia("Admin/Dashboard", [
            "users" => $users,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            "name" => ["required", "string"],
            "email" => ["required", "email"],
            "title" => ["required", "string"],
            "department" => ["required", "string"],
            "image" => ["required", "string"],
            "status" => ["required", "string"],
            "role" => ["required", "string"],
            "password" => ["required", "string"],
        ]);

        User::create($request->all());

        return redirect("/admin");
    }

    public function create()
    {
        return inertia("Admin/Users/Add");
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            "name" => ["required", "string"],
            "email" => ["required", "email"],
            "title" => ["required", "string"],
            "department" => ["required", "string"],
            "image" => ["required", "string"],
            "status" => ["required", "string"],
            "role" => ["required", "string"],
            "password" => ["required", "string"],
        ]);

        $user->update($request->all());

        return redirect("/admin");
    }

    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('admin')->with('success', 'User deleted successfully.');
    }

    public function edit(User $user)
    {
        return inertia("Admin/Users/Edit", [
            "user" => $user,
        ]);
    }
}
