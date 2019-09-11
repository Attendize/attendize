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