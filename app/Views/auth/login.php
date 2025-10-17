<!doctype html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title><?= isset($title) ? $title : 'Login | MyWebsite' ?></title>
   <link rel="stylesheet" href="<?= base_url('css/bootstrap.min.css') ?>">
   <style>
        /* Base */
        body {
            margin: 0;
            font-family: 'Poppins', 'Segoe UI', Roboto, sans-serif;
            background: linear-gradient(135deg, #e3f2fd, #f8fafc);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        /* Header */
        .top-header {
            background: linear-gradient(90deg, #0d6efd, #2563eb);
            color: #fff;
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

        /* Navbar */
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

        /* Main Layout */
        .main-content {
            flex: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 3rem 1rem;
        }

        /* Login Card */
        .form-card {
            background-color: #fff;
            border-radius: 1rem;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.08);
            padding: 2.5rem 2rem;
            width: 100%;
            max-width: 420px;
            transition: transform 0.3s ease;
        }

        .form-card:hover {
            transform: translateY(-3px);
        }

        .form-card h3 {
            text-align: center;
            font-weight: 600;
            color: #0d6efd;
            margin-bottom: 1.5rem;
        }

        .form-label {
            font-weight: 500;
            color: #333;
        }

        /* Buttons */
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

        /* Alerts */
        .alert {
            border-radius: 0.5rem;
        }

        /* Footer Text */
        .register-text {
            text-align: center;
            margin-top: 1rem;
            color: #555;
        }

        .register-text a {
            color: #0d6efd;
            font-weight: 500;
            text-decoration: none;
        }

        .register-text a:hover {
            text-decoration: underline;
        }

        /* Footer */
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
               <h1 class="site-title">MyWebsite</h1>
               <nav>
                   <ul class="nav-links">
                       <li><a href="<?= base_url('register') ?>">Register</a></li>
                       <li><a href="<?= base_url('login') ?>">Login</a></li>
                   </ul>
               </nav>
           </div>
       </div>
   </header>

   <!-- Main Content -->
   <main class="main-content">
       <div class="form-card">
           <h3>Welcome Back</h3>

           <!-- Flash message -->
           <?php if (session()->getFlashdata('error')): ?>
               <div class="alert alert-danger">
                   <?= session()->getFlashdata('error') ?>
               </div>
           <?php endif; ?>

           <!-- Validation Errors -->
           <?php if(isset($validation)): ?>
               <div class="alert alert-danger">
                   <?= $validation->listErrors() ?>
               </div>
           <?php endif; ?>

           <!-- Login Form -->
           <?= form_open('login/auth') ?>
               <?= csrf_field() ?>
               <div class="mb-3">
                   <label for="email" class="form-label">Email</label>
                   <input type="email" name="email" class="form-control" id="email" value="<?= old('email') ?>" required placeholder="Enter your email">
               </div>
               <div class="mb-3">
                   <label for="password" class="form-label">Password</label>
                   <input type="password" name="password" class="form-control" id="password" required placeholder="Enter your password">
               </div>
               <button type="submit" class="btn btn-primary w-100">Login</button>
           <?= form_close() ?>

           <p class="register-text">
               Don’t have an account? <a href="<?= base_url('register') ?>">Register here</a>
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
