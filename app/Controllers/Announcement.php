<?php

namespace App\Controllers;

use App\Models\AnnouncementModel;

class Announcement extends BaseController
{
    public function index()
    {
        $model = new AnnouncementModel();

        // Fetch all announcements ordered by latest first
        $data['announcements'] = $model->orderBy('created_at', 'DESC')->findAll();

        // Page title
        $data['title'] = 'Announcements';

        return view('announcements', $data);
    }
}
