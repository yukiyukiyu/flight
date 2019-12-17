<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Announcement;

class AnnouncementController extends Controller
{
    public function announcement($id)
    {
        return view('announcement.detail', ['announcement' => Announcement::find($id)]);
    }
}
