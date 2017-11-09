<?php

public function __construct()
{
	$routes = require_once config('app', 'app_routes');
	$this->filter = new Filter();

	foreach ($routes as $route) {
		$this->parentRoute = '';
		$this->merge_routes($route, true);
	}

}

private function merge_routes($route, $parent = [])
{
	$this->filter->transform($route);

	if ( $parent ) {
		$this->parentChild = $route['child'] ?? [];
		$this->parentPermission = $route['permission'];
	}

	if ( !$route['permission'] ){
		$route['permission'] = [];
	} elseif ( !isset($this->parentRoute['permission']) ) {
		$this->parentRoute['permission'] = $route['permission'];
	};

	if ( isset($route['permission']) &&  isset($this->parentRoute['permission']) ) {
		$route['permission'] =  $this->parentRoute['permission'] = array_unique(array_merge($this->parentRoute['permission'], $route['permission']));
	}

	if ( isset($this->parentChild[0]) && $route['path'] === $this->filter->url($this->parentChild[0]['path']) ) {
		$route['permission'] = $this->parentPermission;
		$this->parentRoute = $route;
		$url = $this->parentRoute['path'];
		$this->routes[$url] = $this->parentRoute;
		array_shift($this->parentChild);
	} elseif ( $route['path'] && $route['obj'] ) {
		$this->parentRoute['path'] = $url = $this->parentRoute['path'].$route['path'];
		$this->routes[$url]['path'] = $this->parentRoute['path'];
	}

	if ( key_exists('child', $route) ) {

		if ( isset($url) ) {
			unset($this->routes[$url]['child']);
		}

		foreach ($route['child'] as $key => $child) {
			$this->merge_routes($child);
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