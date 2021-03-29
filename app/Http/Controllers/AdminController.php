<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Role;
use App\Permission;
use App\Department;
use Hash;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:administrator');
    }

    public function dashboard()
    {
        return view('admin/dashboard');
    }

    public function usersIndex()
    {
        $users = User::orderBy('id', 'desc')->paginate(10);
        $count = 1;
        return view('admin.manage.users.index', compact('users', 'count'));
    }

    public function usersCreate()
    {
        $roles = Role::all();
        $departments = Department::all();
        return view('admin.manage.users.create', compact('roles', 'departments'));
    }

    public function usersStore(Request $request)
    {
        $this->validate($request, [
            'name'          => 'required|max:255',
            'email'         => 'required|email|unique:users'
        ]);

        if(!empty($request->password)){
            $password = trim($request->password);
        }else{
            $password = 'password';
        }

        $user = new User;

        $user->name         = $request->name;
        $user->email        = $request->email;

        if($request->department_id == 0){
            $user->department_id = null;
        }else{
            $user->department_id = $request->department_id;
        }

        $user->password     = Hash::make($password);
        $user->save();

        $user->syncRoles(explode(',', $request->roles));
        return redirect()->route('usersIndex');
    }

    public function usersShow($id){
        $user = User::findOrFail($id);
        return view('admin.manage.users.show', compact('user'));
    }

    public function usersEdit($id){
        $user = User::findOrFail($id);
        $roles = Role::all();
        $departments = Department::all();
        return view('admin.manage.users.edit', compact('user', 'roles', 'departments'));
    }

    public function usersUpdate(Request $request, $id){
        $this->validate($request, [
            'name'          => 'required|max:255',
            'email'         => 'required|email|unique:users,email,' . $id,
        ]);

        $user = User::findOrFail($id);

        if($request->password_options == 'manual'){
            $user->password = Hash::make($request->password);
        }else if($request->password_options == 'auto'){
            $password = 'password';
            $user->password = Hash::make($password);
        }
        
        $user->name         = $request->name;
        $user->email        = $request->email;

        if($request->department_id == 0){
            $user->department_id = null;
        }else{
            $user->department_id = $request->department_id;
        }

        $user->save();

        $user->syncRoles(explode(',', $request->roles));
        return redirect()->route('usersShow', $id);
    }

    // Permissions Methods | Start

    public function permissionsIndex(){
        $permissions = Permission::orderBy('id', 'desc')->paginate(10);
        $count = 1;
        return view('admin.manage.permissions.index', compact('permissions', 'count'));
    }

    public function permissionsShow($id){
        $permission = Permission::findOrFail($id);
        return view('admin.manage.permissions.show', compact('permission'));
    }

    public function permissionsCreate(){
        return view('admin.manage.permissions.create');
    }

    public function permissionsStore(Request $request){
        if($request->permission_type == 'basic'){
            $this->validate($request, [
                'display_name'          => 'required|max:255',
                'name'                  => 'required|max:255|alphadash|unique:permissions,name',
                'description'           => 'sometimes|max:255'
            ]);

            $permission = new Permission;
            $permission->display_name           = $request->display_name;
            $permission->name                   = $request->name;
            $permission->description            = $request->description;
            $permission->save();

            return redirect()->route('permissionsIndex');

        }else if($request->permission_type == 'crud'){
            $this->validate($request, [
                'resource' => 'required|min:3|max:100|alpha'
            ]);

            $crud = explode(',', $request->crud_selected);

            if(count($crud) > 0){
                foreach($crud as $x){
                    $slug           = strtolower($x) . '-' . strtolower($request->resource);
                    $display_name   = ucwords($x . ' ' . $request->resource);
                    $description    = "Allow a user to " . strtoupper($x) . ' a ' . ucwords($request->resource);

                    $permission = new Permission;
                    $permission->display_name           = $display_name;
                    $permission->name                   = $slug;
                    $permission->description            = $description;
                    $permission->save();
                }
            }

            return redirect()->route('permissionsIndex');
        }else{
            return redirect()->route('permissionsCreate')->withInput();
        }
    }

    public function permissionsEdit($id){
        $permission = Permission::findOrFail($id);
        return view('admin.manage.permissions.edit', compact('permission'));
    }

    public function permissionsUpdate(Request $request, $id){
        $this->validate($request, [
            'display_name'      => 'required|max:255',
            'description'       => 'required|max:255'
        ]);

        $permission = Permission::findOrFail($id);
        $permission->display_name           = $request->display_name;
        $permission->description            = $request->description;
        $permission->save();

        return redirect()->route('permissionsShow', $id);
    }

    // Permissions Methods | End

    // Roles Methods | Start

    public function rolesIndex(){
        $roles = Role::all();
        return view('admin.manage.roles.index', compact('roles'));
    }

    public function rolesCreate(){
        $permissions = Permission::all();
        return view('admin.manage.roles.create', compact('permissions'));
    }

    public function rolesStore(Request $request){
        $this->validate($request, [
            'display_name'          => 'required|max:255',
            'name'                  => 'required|max:255|alphadash|unique:roles,name',
            'description'           => 'sometimes|max:255'
        ]);

        $role = new Role;
        $role->display_name           = $request->display_name;
        $role->name                   = $request->name;
        $role->description            = $request->description;
        $role->save();

        if($request->permissions){
            $role->syncPermissions(explode(',', $request->permissions));
        }

        return redirect()->route('rolesIndex');
    }

    public function rolesShow($id){
        $role = Role::findOrFail($id);
        return view('admin.manage.roles.show', compact('role'));
    }

    public function rolesEdit($id){
        $role = Role::findOrFail($id);
        $permissions = Permission::all();
        return view('admin.manage.roles.edit', compact('permissions', 'role'));
    }

    public function rolesUpdate(Request $request, $id){
        $this->validate($request, [
            'display_name'          => 'required|max:255',
            'description'           => 'sometimes|max:255'
        ]);

        $role = Role::findOrFail($id);
        $role->display_name           = $request->display_name;
        $role->description            = $request->description;
        $role->save();

        if($request->permissions){
            $role->syncPermissions(explode(',', $request->permissions));
        }

        return redirect()->route('rolesShow', $id);
    }

    // Roles Methods | End
    
    // Departments Methods | Start

    public function departmentsIndex(){
        $departments = Department::orderBy('department', 'asc')->paginate(50);
        return view('admin.manage.departments.index', compact('departments'));
    }

    public function departmentsCreate(){
        return view('admin.manage.departments.create');
    }

    public function departmentsStore(Request $request){
        $this->validate($request, [
            'department'        => 'required|max:255',
            'organized_by'      => 'required|max:255'
        ]);

        $department = new Department;
        $department->department     = $request->department;
        $department->organized_by   = $request->organized_by;
        $department->save();

        return redirect()->route('departmentsIndex');
    }

    public function departmentsShow($id){
        $department = Department::findOrFail($id);
        return view('admin.manage.departments.show', compact('department'));
    }

    public function departmentsEdit($id){
        $department = Department::findOrFail($id);
        return view('admin.manage.departments.edit', compact('department'));
    }

    public function departmentsUpdate(Request $request, $id){
        $this->validate($request, [
            'department'        => 'required|max:255',
            'organized_by'      => 'required|max:255'
        ]);

        $department = Department::findOrFail($id);
        $department->department     = $request->department;
        $department->organized_by   = $request->organized_by;
        $department->save();

        return redirect()->route('departmentsIndex');
    }
    
    // Departments Methods | End
}
