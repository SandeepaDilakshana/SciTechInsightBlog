<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Symfony\Component\HttpFoundation\RedirectResponse;

class SettingsController extends Controller implements HasMiddleware
{
    public static function middleware(): array
    {
        return [
            'admin',
        ];
    }

    public function index()
    {
        return view('admin_panel.settings.settings')->with('settings', Setting::first());
    }

    public function update(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'site_name' => ['required', 'string', 'max:255'],
            'contact_number' => ['required', 'string'],
            'contact_email' => ['required', 'email'],
            'address' => ['required', 'string'],
        ]);

        $settings = Setting::first();

        $settings->update($validated);

        $notification = [
            'message' => 'Settings updated Successfully!',
            'alert-type' => 'success',
        ];

        return redirect()->back()->with($notification);
    }
}
