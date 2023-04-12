<?php

namespace App\Http\Controllers;

use App\Models\SettingsModel;
use Illuminate\Http\Request;

class LandingPageController extends Controller
{
    public function index()
    {
        $settings = SettingsModel::all()[0];
        return view('landing_page.welcome', [
            'settings' => $settings
        ]);
    }
}
