<?php

namespace Infonesy\Drivers;

class ZeroBlog extends \B2\Obj
{
	function _blog_dir_def() { \B2\Exception::throw("You must define `blog_dir` field!"); }
}
