<?php

/** @var \Laravel\Lumen\Routing\Router $router */

$router->get('/', function () use ($router) {
    return 'Welcome to Blog API!';
});

$router->post('/signUp', 'UserController@signUp');

$router->post('/signIn', 'UserController@signIn');

$router->post('/changePassword', 'UserController@changePassword');

$router->post('/changeUsername', 'UserController@changeUserName');

$router->post('/userDetails', 'UserController@getUserDetails');

$router->post('/categories', 'PostController@getAllCategories');

$router->post('/getPosts', 'PostController@getPosts');

$router->post('/getUserPosts', 'PostController@getUserPosts');

$router->post('/postNewBlog', 'PostController@postNewBlog');

$router->post('/getAllFavourites', 'FavouriteController@getAllFavourites');

$router->post('/addToFavourite', 'FavouriteController@postNewBlog');

$router->post('/removeFromFavourite', 'FavouriteController@removeFromFavourite');

$router->post('/getUserAllLikes', 'LikeController@getUserAllLikes');

$router->post('/addToLike', 'LikeController@addToLike');

$router->post('/removeFromFavourite', 'LikeController@removeFromFavourite');

$router->post('/getUserFollowingList', 'FollowController@getUserFollowingList');

$router->post('/getUserFollowersList', 'FollowController@getUserFollowersList');

$router->post('/followUser', 'FollowController@followUser');


