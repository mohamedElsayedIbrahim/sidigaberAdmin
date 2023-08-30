<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Stmt\Return_;

class ResponsibilityController extends Controller
{
    public function index(){
        $users = User::paginate(10);
        return view('responsibilities.index',['users'=>$users]);
    }

    public function create(){
        $users = User::select('id','name')->get();
        return view('responsibilities.create',['users'=>$users]);
    }

    function store(Request $request) {
        $request->validate([
            'user'=>'required|exists:users,id',
            'schools'=>'required',
            'schools:*'=>'exists:branches,id'
        ]);

        try {
            $user = User::find($request->user);
            $user->branches()->sync($request->schools);
            return redirect()->route('responsibilities.index')->with('message','Successfully Assigned');
        } catch (\Throwable $th) {
            return back()->with('error',$th->getMessage());
        }
    }

    function destroy($user){
        $record = DB::table('branch_user')->where('id','=',$user)->delete();
        return redirect()->route('responsibilities.index')->with('message','Successfully Deleted');
    }
}
