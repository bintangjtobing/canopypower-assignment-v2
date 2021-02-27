<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Barryvdh\DomPDF\Facade as PDF;

use App\User;
use App\incidents;
use Illuminate\Support\Facades\Date;

class apiController extends Controller
{
    public function getLoggedUser()
    {
        return User::find(Auth::id());
    }
    public function getUsers()
    {
        return response()->json(User::orderBy('name', 'asc')->get());
    }
    public function deleteUser($id)
    {
        $getUser = User::find($id);
        $getUser->delete();
        return response()->json([], 204);
    }
    public function checkUserData(Request $req)
    {
        $data = $req->all();
        $userId = isset($data['id']) ? $data['id'] : null;
        $sameEmailUser = User::where(['email' => $data['email']])->first();
        $sameNameUser = User::where(['name' => $data['name']])->first();

        return response()->json([
            'existingEmail' => isset($sameEmailUser) && $sameEmailUser->id != $userId,
            'existingName' => isset($sameNameUser) && $sameNameUser->id != $userId,
        ]);
    }
    public function addUser(Request $request)
    {
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->username = strtolower($request->name);
        $user->role = $request->role;
        $user->status = '1';
        $user->gender = $request->gender;
        $user->phone = '000';
        if ($user->gender == 'M') {
            $arr = array(1, 3, 5);
            shuffle($arr);
            $randVal = $arr[0];
            $user->avatar = $randVal . '.jpg';
        } else {
            $arr = array(2, 4, 6);
            shuffle($arr);
            $randVal = $arr[0];
            $user->avatar = $randVal . '.jpg';
        }
        $user->subscription = $request->subscription;
        $user->password = Hash::make($request->password);
        $user->save();

        return response()->json($user, 201);
    }
    public function countUsers()
    {
        $userCount = DB::table('users')
            ->get()
            ->count();
        return response()->json($userCount);
    }
    public function getUserbyId($id)
    {
        return response()->json(User::find($id));
    }
    public function updateUser($id, Request $request)
    {
        $user = User::find($id);
        foreach (['name', 'role', 'gender', 'email', 'subscription'] as $field) {
            if (isset($request->{$field})) {
                $user->{$field} = $request->{$field};
            }
        }
        if ($request->password) {
            $user->password = Hash::make($request->password);
        }
        $user->save();
        return response()->json($user);
    }
    public function getIncident()
    {
        return incidents::all();
    }
    public function generatepdf()
    {
        $data = incidents::all();
        $pdf = PDF::loadView('pdf', compact('data', $data));
        $now = Date('d M Y');
        return $pdf->download('Generate incident summary ' . $now);
        // return view('pdf');
    }
}
