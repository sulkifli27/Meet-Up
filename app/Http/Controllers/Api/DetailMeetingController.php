<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\DetailMeeting;
use App\Models\Meetup;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;


class DetailMeetingController extends Controller
{
    public function  index(Request $request)
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
            ->join('meetups as M', 'D.meetup_id', '=', 'M.id');

        return response()->json([
            'status' => 'success',
            'data' => $detailMeeting->paginate(10)
        ]);
    }

    public function show($id)
    {
        $detailMeeting = DetailMeeting::find($id);

        if (!$detailMeeting) {
            return response()->json([
                'status' => 'error',
                'message' => 'Meeting not found'
            ], 404);
        }

        return response()->json([
            'status' => 'success',
            'data' => $detailMeeting
        ]);
    }

    public function create(Request $request)
    {
        $rules = [
            'meetup_id' => 'required|string',
            'user_id' => 'required|unique:detail_meetings,user_id',
        ];

        $data = $request->all();

        $validator = Validator::make($data, $rules);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => $validator->errors()
            ], 400);
        }

        $userId = $request->input('user_id');
        $user = User::select('id')->where('id', $userId)->first();

        if (!$user) {
            return response()->json([
                'status' => 'error',
                'message' => 'id user not found'
            ], 404);
        }

        $meetId = $request->input('meetup_id');
        $idMeetup = Meetup::select('id')->where('id', $meetId)->first();

        if (!$idMeetup) {
            return response()->json([
                'status' => 'error',
                'message' => 'id meet up not found'
            ], 404);
        }

        $meeting = DetailMeeting::create($data);

        return response()->json([
            'status' => 'success',
            'data' => $meeting
        ]);
    }

    public function update(Request $request, $id)
    {
        $rules = [
            'comment' => 'string',

        ];

        $data = $request->all();

        $validator = Validator::make($data, $rules);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => $validator->errors()
            ], 400);
        }

        $detaimeet = DetailMeeting::find($id);
        if (!$detaimeet) {
            return response()->json([
                'status' => 'error',
                'message' => 'meet up not found'
            ], 404);
        }

        $detaimeet->comment = $request->input('comment');
        $detaimeet->save();

        return response()->json([
            'status' => 'success',
            'data' => $detaimeet,
        ]);
    }

    public function destroy($id)
    {
        $detaimeet = DetailMeeting::find($id);
        if (!$detaimeet) {
            return response()->json([
                'status' => 'error',
                'message' => 'meet up not found'
            ], 404);
        }

        $detaimeet->delete();

        return response()->json([
            'status' => 'success',
            'message' => '  meet up deleted'
        ]);
    }
}
