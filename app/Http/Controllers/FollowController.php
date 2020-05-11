<?php

namespace App\Http\Controllers;

use App\FollowModel;
use Illuminate\Http\Request;

class FollowController extends Controller
{
    // get all following list
    public function getUserFollowingList(Request $request){
        $userID = $request->input('user_id');
        $following = FollowModel::where('user_id', $userID)->get();
        return response()->json($following);
    }

    // get all followers list
    public function getUserFollowersList(Request $request){
        $userID = $request->input('user_id');
        $followers = FollowModel::where('following_id', $userID)->get();
        return response()->json($followers);
    }

    // follow a new user
    public function followUser(Request $request){
        $userId = $request->input('user_id');
        $followingId = $request->input('following_id');

        $result = FollowModel::insert([
            'user_id'=> $userId,
            'following_id'=> $followingId
        ]);
        if ($result){
            return response()->json('error', false);
        } else {
            return response()->json('error', true);
        }
    }
}
