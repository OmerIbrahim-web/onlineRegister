<?php

namespace App\Http\Controllers\admin\users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
//custom Spatie\Permission
use Spatie\Permission\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class userController extends Controller
{
    public function index(Request $request)
    {
    $data = User::orderBy('id','DESC')->paginate(5);
    return view('admin.users.show_users',compact('data'))
    ->with('i', ($request->input('page', 1) - 1) * 5);
    }//end of index

    public function create()
    {
    $roles = Role::pluck('name','name')->all();
    return view('admin.users.Add_user',compact('roles'));
    }//end of create

    public function store(Request $request)
    {
        try
        {
            // return $request;
            $this->validate($request, [
                'name' => 'required',
                'email' => 'required|email|unique:users,email',
                'password' => 'required|same:confirm-password',
                'roles' => 'required'
            ]);//end of validation
            
            $input = $request->all();
            $input['password'] = Hash::make($input['password']);
            $input['status'] = $request->status;
            
            $user = User::create($input);
            $user->assignRole($request->input('roles'));
            
            return redirect()->route('admin.users.index')
            ->with('success','User created successfully');
        }
        catch(\Exception $e)
        {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }

    }//end of store

    public function show($id)
    {
    $user = User::find($id);
    return view('admin.users.show',compact('user'));
    }//end of show

    public function edit($id)
    {
    $user = User::find($id);
    $roles = Role::pluck('name','name')->all();
    $userRole = $user->roles->pluck('name','name')->all();
    
    return view('admin.users.edit',compact('user','roles','userRole'));
    }//end of edit

    public function update(Request $request, $id)
    {
    $this->validate($request, [
    'name' => 'required',
    'email' => 'required|email|unique:users,email,'.$id,
    'password' => 'same:confirm-password',
    'roles' => 'required'
    ]);
    
    $input = $request->all();
    if(!empty($input['password'])){
        $input['password'] = Hash::make($input['password']);
    }else{
        $input = array_except($input,array('password'));
    }
    
    $user = User::find($id);
    $user->update($input);
    DB::table('model_has_roles')->where('model_id',$id)->delete();
    
    $user->assignRole($request->input('roles'));
    
    return redirect()->route('admin.users.index')
    ->with('success','User updated successfully');
    }//end of update

    public function destroy($id)
    {
    User::find($id)->delete();
    return redirect()->route('admin.users.index')
    ->with('success','User deleted successfully');
    }//end of destroy
}
