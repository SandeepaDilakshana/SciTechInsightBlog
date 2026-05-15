<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('admin_panel.pages.editprofile', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $user = $request->user();

    $user->fill($request->validated());

    if ($user->isDirty('email')) {
        $user->email_verified_at = null;
    }

    if ($request->hasFile('avatar')) {
        $avatar = $request->file('avatar');
        $avatar_new_name = time() . '_' . $avatar->getClientOriginalName();
        $avatar->move(public_path('uploads/avatars'), $avatar_new_name);

        $user->profile->avatar = 'uploads/avatars/' . $avatar_new_name;
    }

    $user->save();

    $user->profile->update([
        'facebook' => $request->facebook,
        'youtube' => $request->youtube,
        'about' => $request->about
    ]);

    $notification = [
            'message' => 'Your profile has been updated successfully!',
            'alert-type' => 'success',
        ];

    return Redirect::route('profile.edit')->with('status', 'profile-updated')->with($notification);
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
