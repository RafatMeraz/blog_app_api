<?php

/** @var \Laravel\Lumen\Routing\Router $router */

$router->get('/', function () use ($router) {
    return 'Welcome to Blog API!';
});

$router->post('/signUp', 'UserController@signUp');

$router->post('/signIn', 'UserController@signIn');

$router->post('/changePassword', ['middleware'=> 'auth','uses'=> 'UserController@changePassword']);

$router->post('/changeUsername', ['middleware'=> 'auth','uses'=> 'UserController@changeUserName']);

$router->post('/userDetails', ['middleware'=>'auth', 'uses'=>'UserController@getUserDetails']);

$router->post('/categories', ['middleware'=>'auth', 'uses'=> 'PostController@getAllCategories']);

$router->post('/getPosts', ['middleware'=>'auth', 'uses'=> 'PostController@getPosts']);

$router->post('/getUserPosts', ['middleware'=>'auth', 'uses'=> 'PostController@getUserPosts']);

$router->post('/postNewBlog', ['middleware'=>'auth', 'uses'=> 'PostController@postNewBlog']);

$router->post('/getAllFavourites', ['middleware'=>'auth', 'uses'=> 'FavouriteController@getAllFavourites']);

$router->post('/addToFavourite', ['middleware'=>'auth', 'uses'=> 'FavouriteController@postNewBlog']);

$router->post('/removeFromFavourite', ['middleware'=>'auth', 'uses'=> 'FavouriteController@removeFromFavourite']);

$router->post('/getUserAllLikes', ['middleware'=>'auth', 'uses'=> 'LikeController@getUserAllLikes']);

$router->post('/addToLike', ['middleware'=>'auth', 'uses'=> 'LikeController@addToLike']);

$router->post('/removeFromFavourite', ['middleware'=>'auth', 'uses'=> 'LikeController@removeFromFavourite']);

$router->post('/getUserFollowingList', ['middleware'=>'auth', 'uses'=> 'FollowController@getUserFollowingList']);

$router->post('/getUserFollowersList', ['middleware'=>'auth', 'uses'=> 'FollowController@getUserFollowersList']);

$router->post('/followUser', ['middleware'=>'auth', 'uses'=> 'FollowController@followUser']);
