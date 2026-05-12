<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

class EnvSettingsController extends Controller
{
    public function index()
    {
        return view('admin.settings.updateEnv');
    }

    public function updateEnv(Request $request)
    {
        $request->validate([
            'MAIL_MAILER' => 'required|string',
            'MAIL_HOST' => 'required|string',
            'MAIL_PORT' => 'required|numeric',
            'MAIL_USERNAME' => 'required|string',
            'MAIL_PASSWORD' => 'required|string',
            'MAIL_ENCRYPTION' => 'nullable|string',
            'MAIL_FROM_ADDRESS' => 'required|email',
            'MAIL_FROM_NAME' => 'required|string',
        ]);

        $envPath = base_path('.env');
        $envContent = file_get_contents($envPath);

        $data = [
            'MAIL_MAILER' => $request->MAIL_MAILER,
            'MAIL_HOST' => $request->MAIL_HOST,
            'MAIL_PORT' => $request->MAIL_PORT,
            'MAIL_USERNAME' => $request->MAIL_USERNAME,
            'MAIL_PASSWORD' => '"' . $request->MAIL_PASSWORD . '"',
            'MAIL_ENCRYPTION' => $request->MAIL_ENCRYPTION,
            'MAIL_FROM_ADDRESS' => $request->MAIL_FROM_ADDRESS,
            'MAIL_FROM_NAME' => '"' . $request->MAIL_FROM_NAME . '"',
        ];

        try {
            foreach ($data as $key => $value) {
                $envContent = preg_replace(
                    "/^{$key}=(.*)/m",
                    "{$key}={$value}",
                    $envContent
                );
            }

            file_put_contents($envPath, $envContent);

            Artisan::call('config:clear');

            $notification = [
            'message' => 'Email configuration updated Successfully !',
            'alert-type' => 'success',
        ];

            return redirect()->back()->with($notification);

        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error: ' . $e->getMessage());
        }
    }
}
