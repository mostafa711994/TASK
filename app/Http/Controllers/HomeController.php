<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Yajra\DataTables\DataTables;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
            // Implement role and permission
//        $role = Role::create(['name'=>'admin']);
//        $permission = Permission::create(['name'=>'delete user']);


        // Assign role to permission

//            $role = Role::findById(1);
//            $permission = Permission::findById(1);
//            $role->givePermissionTo($permission);


        // Assign users to role (admin)
//        auth()->user()->assignRole('admin');


        // Get users have admin role


        if ($request->ajax()) {
            $user = User::role('admin')->get();
            return Datatables::of($user)

                ->addColumn('action', function($user){
                    if(auth()->user()->hasRole('admin')){
                        $action = '
<a class="btn btn-success" id="edit-user"  data-id='.$user->id.'>Edit</a>
<meta name="csrf-token" content="{{ csrf_token() }}">
<a id="delete-user" data-id='.$user->id.' class="btn btn-danger delete-user">Delete</a>';

                        return $action;
                    }
                    return ;
                })

                ->rawColumns(['action'])

                ->make(true);
        }



      return view('home');


    }

    public function edit($id){

        $user = User::find($id);

        return response()->json([
            'data'=> $user
        ]);
    }


    public function update(Request $request, $id){

        $request->validate([

            'name'=> 'required|max:50',
            'email' => 'required|email|max:50|unique:users,email,' . $id,

        ]);

        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;

        $user->save();

        return response()->json([ 'success' => true ]);

    }


    public function delete($id){

        $user = user::find($id);

        $user->delete();

        return response()->json([ 'success' => true ]);

    }
















}
