<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\User;
use App\Tasklist;

class UsersController extends Controller
{
    public function index()
    {
        $users = User::paginate(10);
        
        return view('users.index', [
            'users' => $users,
        ]);
    }
    public function show($id)
    {
        $user = User::find($id);
        $tasklists = $user->tasklists()->orderBy('created_at', 'desc')->paginate(10);
        $count_tasklists = $user->tasklists()->count();
        
        $data = [
            'user' => $user,
            'tasklists' => $tasklists,
        ];
        
        $data += $this->counts($user);
        
        return view('users.show', $data);
    }
    public function edit($id)
    {   
        $user = User::find($id);
        $tasklist = Tasklist::find($id);
        if (\Auth::user()->id === $tasklist->user_id){
        $data = [
            'user' => $user,
            'tasklist' => $tasklist,
        ];
        return view ('users.edit', $data);
        } else {
        return redirect()->guest(route('login.get'));
        }
    }
    public function update(Request $request, $id)
    {    
        $tasklist = Tasklist::find($id);
        $tasklist->status = $request->status;
        $tasklist->content = $request->content;
        $tasklist->save();
       
        if (\Auth::user()->id === $tasklist->user_id) {
        $this->validate($request, [
            'status' => 'required|max:10',   
            'content' => 'required|max:255',
        ]);
        } 
        return redirect('/');
    }
}
