<!doctype html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title><?= isset($title) ? $title : 'Register | MyWebsite' ?></title>
   <link rel="stylesheet" href="<?= base_url('css/bootstrap.min.css') ?>">
   <style>
        body {
            margin: 0;
            font-family: 'Poppins', 'Segoe UI', Roboto, sans-serif;
            background: linear-gradient(135deg, #e3f2fd, #f8fafc);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        .top-header {
            background: linear-gradient(90deg, #0d6efd, #2563eb);
            color: white;
            padding: 1rem 0.75rem;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            position: sticky;
            top: 0;
            z-index: 100;
        }

        .site-title {
            font-size: 1.8rem;
            font-weight: 600;
            margin: 0;
        }

        .nav-links {
            display: flex;
            gap: 1.5rem;
            list-style: none;
            margin: 0;
            padding: 0;
        }

        .nav-links a {
            color: #fff;
            text-decoration: none;
            font-weight: 500;
            transition: all 0.3s ease;
        }

        .nav-links a:hover {
            color: #dbeafe;
        }

        .main-content {
            flex: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 3rem 1rem;
            min-height: calc(100vh - 100px);
        }

        .form-card {
            background-color: #ffffff;
            border-radius: 1rem;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.08);
            padding: 2.5rem 2rem;
            width: 100%;
            max-width: 450px;
            transition: transform 0.3s ease;
        }

        .form-card:hover {
            transform: translateY(-3px);
        }

        .form-card h2 {
            text-align: center;
            font-weight: 600;
            color: #0d6efd;
            margin-bottom: 1.5rem;
        }

        .form-label {
            font-weight: 500;
            color: #333;
        }

        .btn-primary {
            background-color: #0d6efd;
            border: none;
            font-weight: 500;
            padding: 0.75rem;
            border-radius: 0.5rem;
            transition: background-color 0.3s ease;
        }

        .btn-primary:hover {
            background-color: #0b5ed7;
        }

        .login-text {
            text-align: center;
            margin-top: 1rem;
            color: #555;
        }

        .login-text a {
            color: #0d6efd;
            font-weight: 500;
            text-decoration: none;
        }

        .login-text a:hover {
            text-decoration: underline;
        }

        footer {
            text-align: center;
            background: #0d6efd;
            color: #fff;
            padding: 1rem;
            font-size: 0.9rem;
            margin-top: auto;
        }
   </style>
</head>
<body>

   <!-- Header -->
   <header class="top-header">
       <div class="container">
           <div class="d-flex justify-content-between align-items-center flex-wrap">
               <h1 class="site-title">MyPortal</h1>
               <nav>
                   <ul class="nav-links">
                       <li><a href="<?= base_url('register') ?>">Register</a></li>
                       <li><a href="<?= base_url('login') ?>">Login</a></li>
                   </ul>
               </nav>
           </div>
       </div>
   </header>

   <!-- Main Section -->
   <main class="main-content">
       <div class="form-card">
           <h2>Create Your Account</h2>

           <!-- Success Message -->
           <?php if(session()->getFlashdata('success')): ?>
               <div class="alert alert-success">
                   <?= session()->getFlashdata('success') ?>
               </div>
           <?php endif; ?>

           <!-- Validation Errors -->
           <?php if(isset($validation)): ?>
               <div class="alert alert-danger">
                   <?= $validation->listErrors() ?>
               </div>
           <?php endif; ?>

           <!-- Registration Form -->
           <?= form_open('/register') ?>
               <div class="mb-3">
                   <label for="name" class="form-label">Full Name</label>
                   <input name="name" type="text" value="<?= old('name') ?>" required class="form-control" id="name" placeholder="Enter your full name">
               </div>

               <div class="mb-3">
                   <label for="email" class="form-label">Email</label>
                   <input name="email" type="email" value="<?= old('email') ?>" required class="form-control" id="email" placeholder="Enter your email">
               </div>

               <div class="mb-3">
                   <label for="password" class="form-label">Password</label>
                   <input name="password" type="password" required class="form-control" id="password" placeholder="Enter your password">
               </div>

               <div class="mb-3">
                   <label for="pass_confirm" class="form-label">Confirm Password</label>
                   <input name="pass_confirm" type="password" required class="form-control" id="pass_confirm" placeholder="Re-enter your password">
               </div>

               <!-- 🔹 Role Selection -->
               <div class="mb-3">
                   <label for="role" class="form-label">Role</label>
                   <select name="role" id="role" class="form-select" required>
                       <option value="">-- Select Role --</option>
                       <option value="admin" <?= old('role') === 'admin' ? 'selected' : '' ?>>Admin</option>
                       <option value="teacher" <?= old('role') === 'teacher' ? 'selected' : '' ?>>Teacher</option>
                       <option value="student" <?= old('role') === 'student' ? 'selected' : '' ?>>Student</option>
                   </select>
               </div>

               <button type="submit" class="btn btn-primary w-100">Register</button>
           <?= form_close() ?>

           <p class="login-text">
               Already have an account? <a href="<?= base_url('login') ?>">Login here</a>
           </p>
       </div>
   </main>

   <!-- Footer -->
   <footer>
       <p>© <?= date('Y') ?> MyWebsite. All rights reserved.</p>
   </footer>

   <script src="<?= base_url('js/bootstrap.bundle.min.js') ?>"></script>
</body>
</html>
