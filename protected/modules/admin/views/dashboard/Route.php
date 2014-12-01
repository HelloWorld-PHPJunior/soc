<?php
$Route::get('user/{name}', function($name)
{
    return $name;
})
    ->where('name', '[A-Za-z]+');

$Route::get('user/{id}', function($id)
{
    return 'User '.$id;
})
    ->where('id', '[0-9]+');