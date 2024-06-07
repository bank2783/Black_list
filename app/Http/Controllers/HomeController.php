<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Roster;
class HomeController extends Controller
{
    public function showRoster(){
        return view("main.show_roster");
    }
    public function showRosterManagementPage(){
        $roster = Roster::orderBy("created_at","desc")->paginate(20);
        return view("main.roster_management",compact("roster"));
    }

    
}
