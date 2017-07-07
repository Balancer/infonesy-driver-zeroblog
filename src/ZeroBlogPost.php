<?php

namespace Infonesy\Drivers;

class ZeroBlogPost extends \B2\Obj
{
	function infonesy_uuid()
	{
		return 'zeronet.'.$this->zero_id().'.post_'.$this->id();
	}

	function infonesy_type() { return 'Blog'; }
	function infonesy_markup() { return 'Markdown'; }
}
