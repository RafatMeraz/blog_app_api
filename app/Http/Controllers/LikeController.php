<?php

namespace App\Http\Controllers;

use App\FavouriteModel;
use App\LikeModel;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    // get all likes
    public function getUserAllLikes(Request $request){
        $userId = $request->input('user_id');
        $likes = LikeModel::where('user_id', $userId)->get();
        return response()->json($likes);
    }

    // add to favourite
    public function addToLike(Request $request){
        $userId = $request->input('user_id');
        $postId = $request->input('post_id');
        $result = LikeModel::insert([
            'user_id'=> $userId,
            'post_id'=> $postId
        ]);
        if ($result){
            return response()->json([
                'error'=> false,
                'status'=> 'Added to Likes.'
            ]);
        } else {
            return response()->json([
                'error'=> true,
                'status'=> 'Failed to add likes.'
            ]);
        }
    }

    // remove from favourite
    public function removeFromFavourite(Request $request){
        $id = $request->input('id');
        $result = LikeModel::where('id', $id)->delete();
        if ($result){
            return response()->json([
                'error'=> false,
                'status'=> 'Remove to likes.'
            ]);
        } else {
            return response()->json([
                'error'=> true,
                'status'=> 'Failed to remove from likes.'
            ]);
        }
    }
}
