<?php
/**
 * Generated by Haxe 4.1.3
 */

namespace lib\util;

use \php\Boot;

class ArrayUtil {
	/**
	 * @param \Array_hx $array
	 * @param int $index
	 * @param string $error
	 * 
	 * @return string
	 */
	public static function GetVal ($array, $index, $error = null) {
		#src/lib/util/ArrayUtil.hx:10: lines 10-13
		if (($index >= 0) && ($index < $array->length)) {
			#src/lib/util/ArrayUtil.hx:12: characters 13-32
			return ($array->arr[$index] ?? null);
		}
		#src/lib/util/ArrayUtil.hx:14: characters 9-21
		return $error;
	}

	/**
	 * @return void
	 */
	public function __construct () {
	}
}

Boot::registerClass(ArrayUtil::class, 'lib.util.ArrayUtil');
