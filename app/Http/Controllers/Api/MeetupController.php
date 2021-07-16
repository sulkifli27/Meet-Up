<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Meetup;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class MeetupController extends Controller
{
    public function index(Request $request)
    {
        $meetup = Meetup::query();
        $meetupId = $request->query('id');

        $q =  $request->query('q');

        $meetup->when($meetupId, function ($query) use ($meetupId) {
            return $query->where('id', '=', $meetupId);
        });

        $meetup->when($q, function ($query) use ($q) {
            return $query->whereRaw("title LIKE '%" . strtolower($q) . "%'");
        });

        return response()->json([
            'status' => 'success',
            'data' => $meetup->paginate(10),
        ]);
    }

    public function show($id)
    {
        $meetup = Meetup::find($id);

        if (!$meetup) {
            return response()->json([
                'status' => 'error',
                'message' => 'Room meetup not found'
            ], 404);
        }

        return response()->json([
            'status' => 'success',
            'data' => $meetup
        ]);
    }

    public function create(Request $request)
    {
        $rules = [
            'title' => 'string',
            'description' => 'string',
            'maker' => 'string',
        ];

        $data = $request->all();

        $validator = Validator::make($data, $rules);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => $validator->errors()
            ], 400);
        }

        $username = $request->input('maker');
        $user = User::select('name')->where('name', $username)->first();

        if (!$user) {
            return response()->json([
                'status' => 'error',
                'message' => 'username not found'
            ], 404);
        }

        $meetup = Meetup::create($data);

        return response()->json([
            'status' => 'success',
            'data' => $meetup
        ]);
    }

    public function update(Request $request, $id)
    {
        $rules = [
            'title' => 'string',
            'description' => 'string',
            'maker' => 'string',
        ];

        $data = $request->all();

        $validator = Validator::make($data, $rules);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => $validator->errors()
            ], 400);
        }

        $meetup =  Meetup::find($id);
        if (!$meetup) {
            return  response()->json([
                'status' => 'error',
                'message' => 'meetup not found'
            ], 404);
        }

        $username = $request->input('maker');
        $user = User::select('name')->where('name', $username)->first();
        if (!$user) {
            return response()->json([
                'status' => 'error',
                'message' => 'username not found'
            ], 404);
        }


        $meetup->fill($data);
        $meetup->save();

        return response()->json([
            'status' => 'success',
            'data' => $meetup,
        ]);
    }

    public function destroy($id)
    {
        $meetup = Meetup::find($id);
        if (!$meetup) {
            return response()->json([
                'status' => 'error',
                'message' => 'meet up not found'
            ], 404);
        }

        $meetup->delete();

        return response()->json([
            'status' => 'success',
            'message' => ' room meet ut deleted'
        ]);
    }
}
