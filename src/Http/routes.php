<?php


$router->get('contact', [
    'as'   => 'get.contact',
    'uses' => 'ContactController@getForm'
]);


$router->post('contact', [
    'as'   => 'post.contact',
    'uses' => 'ContactController@postContact'
]);


