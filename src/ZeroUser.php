<?php

namespace Infonesy\Drivers;

class ZeroUser extends \B2\Obj
{
	function infonesy_uuid()
	{
		return 'zeronet.'.$this->id();
	}
}
