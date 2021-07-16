<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Meetup;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class MeetupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $meetups = Meetup::all();
        return view('admin.meetup.index', compact('meetups'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('admin.meetup.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|string',
            'category' => 'required',
            'hour' => 'required',
            'description' => 'required|string',

        ]);

        $data['title'] = $request->get('title');
        $data['category'] = $request->get('category');
        $data['hour'] = $request->get('hour');
        $data['hour'] = $request->get('hour');
        $data['description'] = $request->get('description');
        $data['maker'] = Auth::user()->name;

        $meetup = Meetup::create($data);

        return redirect()->route('meetups.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $meetup = Meetup::FindOrFail($id);

        return view('admin.meetup.edit', compact('meetup'));
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

        $this->validate($request, [
            'title' => 'required|string',
            'category' => 'required',
            'hour' => 'required',
            'description' => 'required|string',
        ]);

        $meetup = Meetup::FindOrFail($id);
        $meetup->update($request->all());

        return redirect()->route('meetups.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $meetup = Meetup::FindOrFail($id);
        $meetup->delete();
        return redirect()->route('meetups.index');
    }
}
