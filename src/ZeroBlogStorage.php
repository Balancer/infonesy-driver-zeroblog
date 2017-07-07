<?php

namespace Infonesy\Drivers;

class ZeroBlogStorage extends \B2\Obj
{
	function blog_dir() { return $this->id(); }

	function load_array($class_name, $where)
	{
		if(is_object($class_name))
		{
			$object = $class_name;
			$class_name = get_class($class_name);
		}
		else
			$object = new $class_name(NULL);

		if(!preg_match('!/data/(\w{34})$!', $this->blog_dir(), $m))
			\B2\Exception::throw("Unknown ZeroID in blog_dir '%s'", $this->blog_dir());

		$blog_zero_id = $m[1];

		$blog_data = json_decode(file_get_contents($this->blog_dir().'/data/data.json'));

		$blog = new ZeroBlog($blog_zero_id);
		$blog->set('title', $blog_data->title);
		$blog->set('description', $blog_data->description);
		$blog->set('links', $blog_data->links);
		$blog->set('modify_time',  $blog_data->modified);

		$result = [];
		foreach($blog_data->post as $d)
		{
			$x = new ZeroBlogPost($d->post_id);
			$x->set('zero_id', $blog_zero_id);
			$x->set('title', $d->title);
			$x->set('create_time', round($d->date_published));
			$x->set('source', $d->body);

			$x->set('infonesy_container', $blog);
			$x->set('infonesy_node', $blog);

			$result[] = $x;
		}

		return $result;
	}
}
