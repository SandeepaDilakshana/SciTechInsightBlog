<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\User;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

class UserController extends Controller implements HasMiddleware
{
    use SoftDeletes;

    public static function middleware(): array
    {
        return [
            'admin'
        ];
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.users.index')->with('users', User::paginate(10));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email'
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make('password')
        ]);

        $profile = Profile::create([
            'user_id' => $user->id,
            'avatar' => 'uploads/avatars/836.jpg'
        ]);


        $notification = [
            'message' => 'User added Successfully !',
            'alert-type' => 'success',
        ];

        return redirect()->route('users')->with($notification);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        $notification = [
            'message' => 'User has been moved to trash successfully!',
            'alert-type' => 'success',
        ];

        return redirect()->route('users')->with($notification);
    }

    public function admin($id){
        $user = User::findOrFail($id);

        $user->admin = 1;
        $user->save();

        $notification = [
            'message' => 'Successfully changed user permissions !',
            'alert-type' => 'success',
        ];

        return redirect()->route('users')->with($notification);
    }

    public function not_admin($id){
        $user = User::findOrFail($id);

        $user->admin = 0;
        $user->save();

        $notification = [
            'message' => 'Successfully changed user permissions !',
            'alert-type' => 'success',
        ];

        return redirect()->route('users')->with($notification);
    }

    public function usertrash()
    {
        $users = User::onlyTrashed()->latest()->paginate(10);

        return view('admin.users.trash', compact('users'));
    }

    public function deleteforever($id)
    {
        $user = User::withTrashed()->find($id);

        if ($user) {
            $user->forceDelete();
        }

        $notification = [
            'message' => 'User has been deleted successfully!',
            'alert-type' => 'success',
        ];

        return redirect()->back()->with($notification);
    }

    public function restore($id)
    {
        $users = User::onlyTrashed()->find($id)->restore();

        $notification = [
            'message' => 'User has been restored successfully!',
            'alert-type' => 'success',
        ];

        return redirect()->back()->with($notification);
    }
}
