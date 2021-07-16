<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DetailMeeting;
use App\Models\Meetup;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DetailMeetingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $detailMeetupId = $request->input('id');



        $detailMeeting =  DB::table('detail_meetings as D')
            ->select(
                'D.id as id',
                'D.user_id',
                'D.comment as komentar',
                'D.meetup_id',
                'U.name as nama',
                'M.title as judul',
                'M.category as kategori',
                'M.hour as waktu',
                'M.description as deskripsi',
                'M.maker as nama '
            )
            ->join('users as U', 'U.id', '=', 'D.user_id')
            ->join('meetups as M', 'U.id', '=', 'D.user_id')
            ->where('D.user_id', Auth::user()->id)->first();

        // return response()->json($detailMeeting);
        return view('admin.detailmeeting.index', compact('detailMeeting'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $users = User::all();
        $rooms = Meetup::all();
        return view('admin.detailmeeting.create', compact('users', 'rooms'));
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
            'meetup_id' => 'required|string',
            'user_id' => 'required|unique:detail_meetings,user_id',
        ]);

        $data = $request->all();

        $meetup = DetailMeeting::create($data);
        return redirect()->route('detail-meeting.index');
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
        $detailMeeting = DetailMeeting::FindOrFail($id);
        return view('admin.detailmeeting.addComent', compact('detailMeeting'));
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


        // $data['comment'] = $request->get('comment');

        $detailMeeting = DetailMeeting::FindOrFail($id);
        $detailMeeting->comment = $request->get('comment');
        $detailMeeting->save();

        return redirect()->route('detail-meeting.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $detailMeetup = DetailMeeting::FindOrFail($id);
        $detailMeetup->delete();
        return redirect()->route('detail-meeting.index');
    }

    // function all meeting 
    public function allMeeting()
    {
        $detailMeeting =  DB::table('detail_meetings as D')
            ->select(
                'D.id as id',
                'D.user_id as userid',
                'D.comment as komentar',
                'D.meetup_id',
                'U.name as nama',
                'M.title as judul',
                'M.category as kategori',
                'M.hour as waktu',
                'M.description as deskripsi',
                'M.maker as nama '
            )
            ->join('users as U', 'U.id', '=', 'D.user_id')
            ->join('meetups as M', 'D.meetup_id', '=', 'M.id')
            ->get();

        // return response()->json($detailMeeting);
        return view('admin.detailmeeting.allmeeting', compact('detailMeeting'));
    }
}
