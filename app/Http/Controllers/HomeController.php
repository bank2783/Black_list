<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function showRoster(){
        return view("main.show_roster");
    }
    public function showRosterManagementPage(){
        return view("main.roster_management");
    }
}
