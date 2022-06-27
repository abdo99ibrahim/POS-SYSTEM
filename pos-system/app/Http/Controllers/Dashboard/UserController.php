<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware(['permission:read_users'])->only('index');
        $this->middleware(['permission:create_users'])->only('create');
        $this->middleware(['permission:update_users'])->only('edit');
        $this->middleware(['permission:delete_users'])->only('destroy');
    }
    public function index(Request $request)
    {
        $users = User::whereRoleIs('admin')->where(function($q) use ($request){
          return  $q->when($request->search,function($query) use ($request){
            return  $query->where('first_name','like', '%' .$request->search. '%')->orWhere('last_name','like', '%' .$request->search. '%');
            });
        })->latest()->paginate(5);
        // $users = User::whereRoleIs('admin')->get();
        return view('dashboard.users.index',compact('users'));
    }

    public function create()
    {
        return view('dashboard.users.create');
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            // 'email' => 'required|unique:users',
            'email' => ['required','email'],
            'password' => 'required|confirmed',

        ]);
        $request_data = $request->except(['password','password_confirmation','permissions']);
        $request_data['password']=bcrypt($request->password);

        $user = User::create($request_data);
        $user->attachRole('admin');
        $user->syncPermissions($request->permissions);
        session()->flash('success',__('site.added_successfully'));
        return redirect()->route('dashboard.users.index');
    }

    public function edit(User $user)
    {
        return view('dashboard.users.edit',compact('user'));
    }
    public function update(Request $request, User $user)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => ['required','email'],

        ]);
        $request_data = $request->except(['permissions']);
        $user->update($request_data);
        $user->syncPermissions($request->permissions);
        session()->flash('success',__('site.updated_successfully'));
        return redirect()->route('dashboard.users.index');
    }
    public function destroy(User $user)
    {
        $user->delete();
        session()->flash('success',__('site.deleted_successfully'));
        return redirect()->route('dashboard.users.index');
    }
}
