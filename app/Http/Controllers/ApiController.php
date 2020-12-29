<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Member;

class ApiController extends Controller
{
    //store the user details
    public function storeMember(Request $request) {
        $member = new Member;
        $member->name = $request->name;
        $member->email = $request->email;
        $member->password= $request->password;
        $member->address = $request->address;
        $member->age = $request->age;
        $member->save();

        return response()->json([
                'message' => 'User record saved'
        ], 201);

    }
    //Get the user details
    public function getMember($email, $password) {
        $user = Member::where('email', '=', $email)->first();
        if(!$user) {
            return response()->json([
                'message' => 'User Not Found'
            ], 404);
        } else {
            //$userp = $user->password, $password);
            if(strcmp($password, $user->password)== 0) {
                $member = Member::where('email', $email)->get()->toJson(JSON_PRETTY_PRINT);
                return response($member, 200);
            } else {
                return response()->json([
                    'message' => 'password does not match'
                ], 404);
            }
        }

        // if(Member::where('email', $email)-> exists()){
        //     $member = Member::where('email', $email)->get()->toJson(JSON_PRETTY_PRINT);
        //     return response($member, 200);
        // } else {

        //     return response()->json([
        //         'message' => 'User Not Found'
        //     ], 404);
        // }

    }

}
