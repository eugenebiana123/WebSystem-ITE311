<?php

namespace App\Controllers;

use App\Models\UserModel;

class Auth extends BaseController
{
    // 🔹 Registration form
    public function regform()
    {
        helper(['form']);
        return view('auth/register');
    }

    // 🔹 Create account
    public function createAcc()
    {
        helper(['form']);
        $users = new UserModel();

        $data = [
            'name'         => $this->request->getPost('name'),
            'email'        => $this->request->getPost('email'),
            'password'     => $this->request->getPost('password'),
            'pass_confirm' => $this->request->getPost('pass_confirm'),
            'role'         => $this->request->getPost('role'),

        ];

        if (! $users->save($data)) {
            return redirect()->back()
                             ->withInput()
                             ->with('errors', $users->errors());
        }

        return redirect()->to('/register/success')
                         ->with('success', 'Account created successfully!');
    }

    // 🔹 Registration success page
    public function success()
    {
        return view('register_success');
    }

    // 🔹 Login form
    public function logForm()
    {
        helper(['form', 'url']);
        return view('auth/login');
    }

    // 🔹 Login authentication
    public function login()
    {
        $session = session();
        $users   = new UserModel();

        $email    = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        $user = $users->where('email', $email)->first();

        if ($user) {
            if (password_verify($password, $user['password'])) {
                $sessionData = [
                    'id'         => $user['id'],
                    'name'       => $user['name'],
                    'email'      => $user['email'],
                    'role'       => $user['role'],
                    'isLoggedIn' => true,
                ];
                $session->set($sessionData);

                return redirect()->to('/dashboard');
            } else {
                return redirect()->back()->with('error', 'Wrong password.');
            }
        } else {
            return redirect()->back()->with('error', 'Email not found.');
        }
    }

    // 🔹 Logout
    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }

    // 🔹 Dashboard redirection based on role
    public function dashboard()
    {
        if (! session()->get('isLoggedIn')) {
            return redirect()->to('/login')->with('error', 'Please log in first.');
        }

        $role = session()->get('role');

        if ($role === 'admin') {
            return view('auth/admin_dashboard');
        } else {
            return view('auth/dashboard');
        }
    }
}
