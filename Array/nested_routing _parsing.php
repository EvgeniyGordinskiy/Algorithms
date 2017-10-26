<?php

 function __construct()
{
	$routes = require_once SITE_ROOT.'/App/routes.php';
	foreach ($routes as $key => $route) {
		$this->merge_routes($route, false, $key);
	}
}

 function merge_routes($routes, $child = false, $component = false) {
	if ( $component ) {
		$this->component = $component;
	}
	foreach ($routes as $key => $route) {
		if ( is_array($route) ) {
			if ($key !== 'child' && $key !== 'permission' && !is_int($key)) {
				$route['component'] = $this->component;
				if ( key_exists('child', $route) ) {
					if ( $child ) {
						$this->parentKey .= $key;
					} else {
						$this->parentKey = $key;
					}
					$child = $route['child'];
					unset($route['child']);
					$this->routes[$this->parentKey] = $route;
					$this->merge_routes($child, true);
				} else {
					$this->routes[$this->parentKey.$key] = $route;
				}
			}
		}
	}
}


/*

[
		'/user' =>  [
			'obj'        => 'UserController@index',
			'permission' => '',
			'version'    => 1,
			'child'      => [
				'/{id}' => [
					'obj'        => 'UserController@get',
					'permission' => ['auth','admin'],
					'version'    => 1
				],
				'/{id}/post/{post_id}' => [
					'obj'        => 'UserController@getPost',
					'permission' => 'auth',
					'version'    => 1,
					'child'      => [
						'/delete' => [
							'obj'        => 'PostController@delete',
							'permission' => ['auth','admin'],
							'version'    => 1
						]
					]
				],
			]
		],

	]

	'/post' =>  [
			'obj'        => 'PostController@index',
			'permission' => '',
			'version'    => 1,
			'child'      => [
				'/{id}' => [
					'obj'        => 'PostController@get',
					'permission' => ['auth','admin'],
					'version'    => 1
				],
			]
		],


$users = require SITE_ROOT.'/App/versions/v1/users/routes.php';
$posts = require SITE_ROOT.'/App/versions/v1/posts/routes.php';
return
[
	'users' => $users,
	'posts' => $posts
];

result =>

array:6 [▼
  "/user" => array:4 [▶]
  "/user/{id}" => array:4 [▶]
  "/user/{id}/post/{post_id}" => array:4 [▶]
  "/user/{id}/post/{post_id}/delete" => array:4 [▶]
  "/post" => array:4 [▶]
  "/post/{id}" => array:4 [▶]
]

  */