<?php


namespace Marrs\MarrsAdmin\Http\Controllers\Admin;

use Marrs\MarrsAdmin\Http\Controllers\Controller;
use Marrs\MarrsAdmin\Models\Admin;
use Marrs\MarrsAdmin\Http\Requests\AdminRequest;

class AdminController extends Controller
{

    private $user;

    public function __construct(Admin $user)
    {
        $this->user = $user;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("marrs-admin::cruds.users.index", ["users" => $this->user->get()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("marrs-admin::cruds.users.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AdminRequest $request)
    {
        $user = $this->user->create($request->all());
        if ($request->password != "") {
            $user->password = bcrypt($request->password);
            $user->save();
        }

        return redirect()->route('admin.users.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function show(Admin $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function edit(Admin $user)
    {
        return view("marrs-admin::cruds.users.edit", ['user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function update(AdminRequest $request, Admin $user)
    {
        $user->update($request->only('name', 'email'));
        if ($request->password != "") {
            $user->password = bcrypt($request->password);
            $user->save();
        }

        return redirect()->route('admin.users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function destroy(Admin $user)
    {
        $user->delete();
        return redirect()->route('admin.users.index');
    }
}
