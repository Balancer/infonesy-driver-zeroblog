<?php

namespace Infonesy\Drivers;

class ZeroBlog extends \B2\Obj
{
	function infonesy_uuid()
	{
		return 'zeronet.'.$this->id();
	}
}
