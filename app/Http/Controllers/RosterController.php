<?php

namespace App\Http\Controllers;
use App\Models\Roster;
use Illuminate\Http\Request;

class RosterController extends Controller
{
    public function storeRoster(Request $request){
       
        $roster = Roster::create([
            'name' => $request->name,
            'identity_card_number' => $request->identity_card_number,
            'description' => $request->description,
            'status' => $request->status
        ]);
        return redirect()->back()->with('success','เพิ่มข้อมูลลำเร็จ');
    }

    public function editRoster(Request $request,$id){
        $roster = Roster::where('id',$id)->update([
            'name'=>$request->name,
            'identity_card_number'=> $request->identity_card_number,
            'description'=> $request->description,
            'status'=> $request->status
        ]);
    return redirect()->back()->with('success','แก้ไขข้อมูลสำเร็จ');
    }

    public function destroyRoster(Request $request,$id){
        $roster = Roster::where('id',$id)->delete();
        return redirect()->back()->with('success','ลบข้อมูลสำเร็จ');
    }
}