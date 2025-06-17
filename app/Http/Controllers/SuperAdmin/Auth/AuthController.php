<?php

namespace App\Http\Controllers\SuperAdmin\Auth;

use App\Models\User;
use App\Models\Tenant;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Jobs\DomainVerificationJob;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login()
    {
        return view('super-admin.auth.login');
    }

    public function register()
    {
        return view('super-admin.auth.register');
    }

    public function loginPost(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (auth()->attempt($request->only('email', 'password'))) {
            $subdomain = auth()->user()?->tenant?->subdomain;
            if ($subdomain) {
                return redirect('http://' . $subdomain . '.' . request()->getHost());
            } else {
                return redirect()->route('super.dashboard');
            }
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    public function registerPost(Request $request)
    {
        $request->validate([
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'subdomain' => ['required', 'string', 'max:255', 'unique:tenants,subdomain'],
        ]);

        $data = $request->all();

        $user = new User();
        $user->name = $data['first_name'] . ' ' . $data['last_name'];
        $user->email = $data['email'];
        $user->password = Hash::make($data['password']);
        $user->status = 1;

        if ($user->save()) {

            // authenticate the user
            // auth()->login($user);

            $tenant = Tenant::create([
                'subdomain' => $data['subdomain'],
                'user_id' => $user->id,
                'status' => 'pending',
                'verification_token' => Str::random(60),
            ]);
            $user->assignRole('Admin');
            $subdomain = $data['subdomain'];

            dispatch(new DomainVerificationJob($user, $tenant));

            return redirect('http://' . $subdomain . '.' . request()->getHost());
        }

        // return redirect('/register')->with('error', 'Something went wrong.');
    }

    public function logout()
    {
        auth()->logout();
        return redirect('/auth/login');
    }


    public function verifyDomain($subdomain, $token)
    {
        $tenant = Tenant::where('subdomain', $subdomain)
            ->where('verification_token', $token)
            ->firstOrFail();

        if ($tenant->status === 'pending') {
            $tenant->update([
                'status' => 'approved',
                'verification_token' => null,
                'verified_at' => now(),
                'trial_end_date' => now()->addDays(15)
            ]);

            // Optionally log in the user automatically
            auth()->login($tenant->user);

            return redirect('http://' . $subdomain . '.' . request()->getHost())
                ->with('success', 'Domain verified successfully!');
        }

        return redirect('http://' . $subdomain . '.' . request()->getHost())
            ->with('error', 'Domain already verified or invalid token.');
    }
}
