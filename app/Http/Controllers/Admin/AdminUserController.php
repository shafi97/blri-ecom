<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserUpdateRequest;
use Yajra\DataTables\Facades\DataTables;
use App\Http\Requests\AdminUserStoreRequest;

class AdminUserController extends Controller
{
    public function index(Request $request)
    {
        if ($error = $this->authorize('admin-user-manage')) {
            return $error;
        }
        if ($request->ajax()) {
            $users = User::whereIn('role',['1']);
            return DataTables::of($users)
                ->addIndexColumn()
                ->addColumn('check', function ($row) {
                    return '<input type="checkbox" name="select[]" onclick="checkcheckbox()" id="check_'.$row->id.'" class="check" value="'.$row->id.'">';
                })
                ->addColumn('created_at', function ($row) {
                    return $row->created_at->diffForHumans();
                })
                ->addColumn('age', function ($row) {
                    return ageWithDays($row->d_o_b);
                })
                ->addColumn('image', function ($row) {
                    $src = asset('uploads/images/users/'.$row->image);
                    return '<img src="'.$src.'" width="100px">';
                })
                ->addColumn('action', function ($row) {
                    $btn = '';
                    if (userCan('admin-user-edit')) {
                        $btn .= view('button', ['type' => 'ajax-edit', 'route' => route('admin.admin-user.edit', $row->id) , 'row' => $row]);
                    }
                    if (userCan('admin-user-delete')) {
                        $btn .= view('button', ['type' => 'ajax-delete', 'route' => route('admin.admin-user.destroy', $row->id), 'row' => $row, 'src' => 'dt']);
                    }
                    return $btn;
                })
                ->rawColumns(['check', 'age', 'action', 'image', 'created_at'])
                ->make(true);
        }
        $roles = Role::all();
        return view('dashboard.admin_user.index', compact('roles'));
    }


    public function store(AdminUserStoreRequest $request)
    {
        if ($error = $this->authorize('admin-user-add')) {
            return $error;
        }
        $data = $request->validated();
        $data['role'] = '1';
        if($request->hasFile('image')){
            $data['image'] = imageStore($request, 'image','user', 'uploads/images/users/');
        }

        try {
            $user = User::create($data);
            $user->assignRole($request->role);
            return response()->json(['message'=> __('app.success-message')], 200);
        } catch (\Exception $e) {
            return response()->json(['message'=>__('app.oops')], 500);
            // return response()->json(['message'=>$e->getMessage()], 500);
        }
    }

    public function edit(Request $request, User $user)
    {
        if ($error = $this->authorize('user-edit')) {
            return $error;
        }
        if ($request->ajax()) {
            $roles = Role::all();
            $modal = view('dashboard.admin_user.edit')->with(['user' => $user, 'roles' => $roles])->render();
            return response()->json(['modal' => $modal], 200);
        }
        return abort(500);
    }

    public function update(UserUpdateRequest $request, User $user)
    {
        if ($error = $this->authorize('user-add')) {
            return $error;
        }
        $data = $request->validated();
        if(isset($request->password)){
            $data['password'] = bcrypt($request->password);
        }

        $image = User::find($user->id)->image;
        if($request->hasFile('image')){
            $data['image'] = imageUpdate($request, 'user', 'uploads/images/users/', $image);
        }

        try {
            $user->update($data);
            // if($request->permission){
            //     $permission = [
            //         'role_id' =>  $request->permission,
            //         'model_type' => "App\Models\User",
            //         'model_id' =>  $user->id,
            //     ];
            //     ModelHasRole::whereModel_id($user->id)->update($permission);
            // }
            return response()->json(['message'=> 'Data Successfully Inserted'], 200);
        } catch (\Exception $e) {
            return response()->json(['message'=>__('app.oops')], 500);
            // return response()->json(['message'=>$e->getMessage()], 500);
        }

    }

    public function destroy(User $admin_user)
    {
        if ($error = $this->authorize('admin-user-delete')) {
            return $error;
        }
        try {
            $admin_user->delete();
            return response()->json(['message'=> __('app.success-message')], 200);
        } catch (\Exception $e) {
            return response()->json(['message'=> __('app.oops')], 500);
            // return response()->json(['message'=>$e->getMessage()], 500);
        }
    }
}
