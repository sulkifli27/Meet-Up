<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $user = User::query();
        $userId = $request->query('id');

        $q =  $request->query('q');

        $user->when($userId, function ($query) use ($userId) {
            return $query->where('id', '=', $userId);
        });

        $user->when($q, function ($query) use ($q) {
            return $query->whereRaw("name LIKE '%" . strtolower($q) . "%'");
        });

        return response()->json([
            'status' => 'success',
            'data' => $user->paginate(10),
        ]);
    }

    public function show($id)
    {
        $user = User::find($id);

        if (!$user) {
            return response()->json([
                'status' => 'error',
                'message' => 'user not found'
            ], 404);
        }

        return response()->json([
            'status' => 'success',
            'data' => $user
        ]);
    }

    public function create(Request $request)
    {
        $rules = [
            'name' => 'required|string',
            'username' => 'required|string',
            'password' => 'required|string',
        ];

        $data['name'] = $request->input('name');
        $data['username'] = $request->input('username');
        $data['password'] = bcrypt($request->input('password'));

        $validator = Validator::make($data, $rules);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => $validator->errors()
            ], 400);
        }

        $user = User::create($data);

        return response()->json([
            'status' => 'success',
            'data' => $user
        ]);
    }

    public function update(Request $request, $id)
    {
        $rules = [
            'name' => 'string',
            'username' => 'string',
        ];

        $data['name'] = $request->input('name');
        $data['username'] = $request->input('username');

        $validator = Validator::make($data, $rules);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => $validator->errors()
            ], 400);
        }

        $user =  User::find($id);

        if (!$user) {
            return  response()->json([
                'status' => 'error',
                'message' => 'user not found'
            ], 404);
        }

        $user->fill($data);
        $user->save();

        return response()->json([
            'status' => 'success',
            'data' => $user
        ]);
    }

    public function destroy($id)
    {
        $user = User::find($id);

        if (!$user) {
            return response()->json([
                'status' => 'error',
                'message' => 'user not found'
            ], 404);
        }

        $user->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'user deleted'
        ]);
    }
}
