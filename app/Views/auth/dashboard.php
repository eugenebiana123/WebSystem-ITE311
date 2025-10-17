<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title><?= isset($title) ? $title : 'Dashboard | MyWebsite' ?></title>
   <link rel="stylesheet" href="<?= base_url('css/bootstrap.min.css') ?>">

   <style>
      body {
         margin: 0;
         font-family: 'Segoe UI', Roboto, sans-serif;
         background-color: #f5f6fa;
      }

      /* Header */
      .top-header {
         background-color: #2c3e50;
         color: white;
         padding: 1rem 0;
         box-shadow: 0 2px 8px rgba(0,0,0,0.1);
      }

      .site-title {
         font-size: 1.8rem;
         font-weight: 600;
         margin: 0;
      }

      .nav-links {
         display: flex;
         gap: 1.5rem;
         margin: 0;
         list-style: none;
         padding: 0;
         align-items: center;
      }

      .nav-links a {
         color: white;
         text-decoration: none;
         font-size: 1rem;
         font-weight: 500;
         transition: 0.3s;
      }

      .nav-links a:hover {
         color: #dcdde1;
      }

      /* Main content */
      .main-content {
         display: flex;
         align-items: center;
         justify-content: center;
         min-height: calc(100vh - 100px);
      }

      .card {
         border: none;
         border-radius: 12px;
         background: white;
         box-shadow: 0 4px 20px rgba(0,0,0,0.1);
      }

      .page-title {
         font-size: 2rem;
         font-weight: 600;
         color: #2c3e50;
         text-align: center;
         margin-bottom: 1rem;
      }

      .welcome-text {
         color: #555;
         font-size: 1.1rem;
         text-align: center;
      }

      .btn-logout {
         background-color: #e74c3c;
         border: none;
         border-radius: 6px;
         padding: 0.5rem 1rem;
         color: white;
         transition: 0.3s;
      }

      .btn-logout:hover {
         background-color: #c0392b;
      }

      /* Role sections */
      .role-section {
         background-color: #ecf0f1;
         padding: 1rem;
         border-radius: 8px;
         margin-top: 1rem;
      }

      .role-section h4 {
         color: #2c3e50;
      }
   </style>
</head>

<body>
   <!-- Header -->
   <header class="top-header">
      <div class="container d-flex justify-content-between align-items-center flex-wrap">
         <h1 class="site-title">MyWebsite</h1>
         <nav>
            <ul class="nav-links">
               <li><a href="<?= base_url('dashboard') ?>">Dashboard</a></li>
               <li><a href="<?= base_url('about') ?>">About</a></li>
               <li><a href="<?= base_url('contact') ?>">Contact</a></li>
               <li><a href="<?= base_url('logout') ?>" class="btn-logout">Logout</a></li>
            </ul>
         </nav>
      </div>
   </header>

   <!-- Main Content -->
   <div class="container main-content">
      <div class="card p-5 text-center mx-auto" style="max-width: 700px;">
         <h2 class="page-title">Welcome, <?= esc(session()->get('name')) ?>!</h2>
         <p class="welcome-text">
            You are logged in as <strong><?= esc(session()->get('role')) ?></strong>.
         </p>
         <hr>

         <!-- Role-Based Display -->
         <?php $role = session()->get('role'); ?>

         <?php if ($role === 'admin'): ?>
            <div class="role-section">
               <h4>👑 Admin Dashboard</h4>
               <p>You have full access to manage users, courses, and settings.</p>
               <a href="<?= base_url('users/manage') ?>" class="btn btn-primary mt-2">Manage Users</a>
               <a href="<?= base_url('courses') ?>" class="btn btn-secondary mt-2">View Courses</a>
            </div>

         <?php elseif ($role === 'teacher'): ?>
            <div class="role-section">
               <h4>📘 Teacher Dashboard</h4>
               <p>Welcome, teacher! You can manage your classes and student attendance.</p>
               <a href="<?= base_url('classes') ?>" class="btn btn-primary mt-2">My Classes</a>
               <a href="<?= base_url('attendance') ?>" class="btn btn-secondary mt-2">Record Attendance</a>
            </div>

         <?php elseif ($role === 'student'): ?>
            <div class="role-section">
               <h4>🎓 Student Dashboard</h4>
               <p>Welcome to your student portal. Check your enrolled courses and grades.</p>
               <a href="<?= base_url('mycourses') ?>" class="btn btn-primary mt-2">My Courses</a>
               <a href="<?= base_url('grades') ?>" class="btn btn-secondary mt-2">View Grades</a>
            </div>

         <?php else: ?>
            <div class="role-section">
               <h4>⚙️ General Dashboard</h4>
               <p>Your role is not yet defined. Please contact the administrator.</p>
            </div>
         <?php endif; ?>

         <p class="text-muted mt-4">Explore your dashboard to manage your data and view updates.</p>
      </div>
   </div>

   <script src="<?= base_url('js/bootstrap.bundle.min.js') ?>"></script>
</body>
</html>
