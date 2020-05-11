<?php

namespace App\Http\Controllers;

use App\FavouriteModel;
use Illuminate\Http\Request;

class FavouriteController extends Controller
{
    // get all favourites
    public function getAllFavourites(Request $request){
        $userId = $request->input('user_id');
        $favourites = FavouriteModel::where('user_id', $userId)->get();
        return response()->json($favourites);
    }

    // add to favourite
    public function addToFavourite(Request $request){
        $userId = $request->input('user_id');
        $postId = $request->input('post_id');
        $result = FavouriteModel::insert([
            'user_id'=> $userId,
            'post_id'=> $postId
        ]);
        if ($result){
            return response()->json([
               'error'=> false,
               'status'=> 'Added to favourites.'
            ]);
        } else {
            return response()->json([
                'error'=> true,
                'status'=> 'Failed to add favourites.'
            ]);
        }
    }

    // remove from favourite
    public function removeFromFavourite(Request $request){
        $id = $request->input('id');
        $result = FavouriteModel::where('id', $id)->delete();
        if ($result){
            return response()->json([
               'error'=> false,
               'status'=> 'Remove to favourites.'
            ]);
        } else {
            return response()->json([
                'error'=> true,
                'status'=> 'Failed to remove from favourites.'
            ]);
        }
    }
}
