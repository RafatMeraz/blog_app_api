<?php

namespace App\Http\Controllers;
use App\CategoryModel;
use App\PostModel;
use Illuminate\Http\Request;

class PostController extends Controller
{
    // get all categories
    public function getAllCategories(){
        $categories = CategoryModel::all();
        return response()->json($categories);
    }

    // get all posts
    public function getPosts(Request $request){
        $type = $request->input('type');
        $posts = PostModel::where('category_id', $type)->get();
        return response()->json($posts);
    }

    // get user all posts
    public function getUserPosts(Request $request){
        $userID = $request->input('user_id');
        $posts = PostModel::where('user_id', $userID)->get();
        return response()->json($posts);
    }

    // post a new blog
    public function postNewBlog(Request $request){
        $userID = $request->input('user_id');
        $title = $request->input('title');
        $content = $request->input('content');
        $categoryId = $request->input('category_id');

        $result = PostModel::insert([
            'user_id' => $userID,
            'title' => $title,
            'description' => $content,
            'category_id' => $categoryId
        ]);
        if ($result){
            return response()->json([
                'error'=> false,
                'status'=> 'Blog posted successfully.'
            ]);
        } else {
            return response()->json([
                'error'=> true,
                'status'=> 'Blog post failed. Try again.'
            ]);
        }
    }
}
