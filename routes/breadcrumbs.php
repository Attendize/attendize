<?php
/**
 * Created by PhpStorm.
 * User: merdan
 * Date: 9/11/2019
 * Time: 15:07
 */
// Home
Breadcrumbs::for('home', function ($trail) {
    $trail->push('Home', route('home'));
});

Breadcrumbs::for('category', function ($trail,$category){
    $trail->parent('home');
    $trail->push($category->name ?? "Events", $category->url ?? '#');
});

Breadcrumbs::for('event',function($trail, $event){
    $trail->parent('category', $event->category);
    $trail->push($event->title,$event->event_url);
});