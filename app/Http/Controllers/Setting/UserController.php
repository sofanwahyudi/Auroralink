<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role as ModelsRole;
use DB;

class UserController extends Controller
{
        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {

        //JIKA DI KOMEN MAKA USER BISA MELAKUKAN AKSI ROLE/PERMISSION YANG DI KOMEN
        // $this->middleware('permission:role-list|role-create|role-edit|role-delete', ['only' => ['index','store']]);
        //  $this->middleware('permission:role-create', ['only' => ['create','store']]);
        //  $this->middleware('permission:role-edit', ['only' => ['edit','update']]);
         // $this->middleware('permission:role-delete', ['only' => ['destroy']]);
    }
    public function index(Request $request)
    {
        $data = User::all();
        return view('setting.users.index')->withData($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users',
            'role' => 'required'
            ]);
            $role = '3';
            $password = $request->password;
            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = Hash::make($password);
            $user->assignRole($role);
            $user->save();
            return redirect()->back()->with('success','Data Berhasil disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('users.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $this->validate($request,[
            'role' => 'required'
            ]);


            // if($request->role == null){
            //     $role = 0;
            // }
            // else{
            //     $role = has($request->role);
            // }
            $user = User::findOrFail($id);
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->syncRoles(explode(',', $request->role));

            if ($user->save()) {
                return redirect()->back()->with('success','Data Berhasil disimpan');
            } else {
                return redirect()->back()->with('danger','Ups... Maaf');
            }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        if ($user->delete()) {
            return redirect()->back()->with('success','Data Berhasil dihapus');
        } else {
            return redirect()->back()->with('danger','Ups...');
        }
    }
    public function exportExcel() {
        $namafile = 'Pelanggan'.date('Y-m-d_H-i-s').'.xlsx';
        return Excel::download(new ExportUser, $namafile);
    }

    public function exportCsv() {
        $namafile = 'Pelanggan'.date('Y-m-d_H-i-s').'.csv';
        return Excel::download(new ExportUser, $namafile);
    }

    public function deleteMultiple(Request $request){

        $ids = $request->ids;
        User::whereIn('id',explode(",",$ids))->delete();
        return response()->json(['success'=>"Data Berhasil Di Hapus."]);

    }
    public function rolePermission(Request $request)
    {
        $role = $request->get('role');

        $permissions = null;
        $hasPermission = null;

        $roles = ModelsRole::all()->pluck('name');

        if (!empty($role))
        {
            $getRole = ModelsRole::findByName($role);

            $hasPermission = DB::table('role_has_permission')->select('permission.name')->join('permissions', 'role_has_permissions.permission_id', '=', 'permissions.id')->where('role_id', $getRole->id)->get()->pluck('name')->all();

            $permission = Permission::all()->pluck('name');
        }
        return view('setting.permission.role_permission', compact('roles', 'permissions', 'hasPermission'));
    }

    public function addPermission(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|unique:permissions'
        ]);
        $permission = Permission::firstOrCreate([

            'name' => $request->name
        ]);
        return redirect()->back();
    }
    public function setPermission(Request $request, $role)
    {

        $role = ModelsRole::findByName($role);

        $role->syncPermissions($request->permission);
        return redirect()->back()->with(['success' => 'Permission to Role Saved!']);
    }
}
