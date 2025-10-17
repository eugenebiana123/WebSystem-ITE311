<?php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\Controller;

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
            'password'     => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
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

    // 🔹 Login authentication with role-based redirection
    public function login()
    {
        $session = session();
        $userModel = new UserModel();

        $email    = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        $user = $userModel->where('email', $email)->first();

        if ($user && password_verify($password, $user['password'])) {
            // ✅ Set session
            $session->set([
                'user_id'    => $user['id'],
                'name'       => $user['name'],
                'email'      => $user['email'],
                'role'       => $user['role'],
                'isLoggedIn' => true,
            ]);

            // ✅ Redirect by role
            switch ($user['role']) {
                case 'student':
                    return redirect()->to('/announcements');
                case 'teacher':
                    return redirect()->to('/teacher/dashboard');
                case 'admin':
                    return redirect()->to('/admin/dashboard');
                default:
                    return redirect()->to('/dashboard');
            }
        } else {
            $session->setFlashdata('error', 'Invalid email or password.');
            return redirect()->back();
        }
    }

    // 🔹 Logout
    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }

    // 🔹 General dashboard redirection (optional)
    public function dashboard()
    {
        if (! session()->get('isLoggedIn')) {
            return redirect()->to('/login')->with('error', 'Please log in first.');
        }

        $role = session()->get('role');

        if ($role === 'admin') {
            return view('auth/admin_dashboard');
        } elseif ($role === 'teacher') {
            return view('teacher_dashboard');
        } elseif ($role === 'student') {
            return view('announcements');
        } else {
            return view('auth/dashboard');
        }
    }
}
