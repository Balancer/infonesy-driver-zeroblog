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

		$result = [];
		foreach($blog_data->post as $d)
		{
			$x = new ZeroBlog($d->post_id);
			$x->set('zero_id', $blog_zero_id);
			$x->set('title', $d->title);
			$x->set('create_time', intval($d->date_published+0.5));
			$x->set('source', $d->body);

			$result[] = $x;
		}

		return $result;
	}
}
