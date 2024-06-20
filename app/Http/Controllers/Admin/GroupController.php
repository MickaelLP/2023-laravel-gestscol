<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\GroupRequest;
use App\Models\Group;
use Illuminate\Http\Request;

class GroupController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $groups = Group::all();
        return view('admin.group.index', ['groups' => $groups]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->authorize('create', Group::class);
        return view('admin.group.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(GroupRequest $request)
    {
        $this->authorize('create', Group::class);
        $data = $request->validated();
        $group = Group::create($data);
        return redirect()->route('admin.group.show', $group);
    }

    /**
     * Display the specified resource.
     */
    public function show(Group $group)
    {
        $this->authorize('view', $group);
        return view('admin.group.show', ['group' => $group]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Group $group)
    {
        $this->authorize('update', $group);
        return view('admin.group.edit', ['group' => $group]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(GroupRequest $request, Group $group)
    {
        $this->authorize('update', $group);
        $data = $request->validated();
        $group->fill($data);
        $group->save();
        return redirect()->route('admin.group.show', $group);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Group $group)
    {
        $this->authorize('delete', $group);
        $group->delete();
        return redirect()->route('admin.group.index');
    }
}
