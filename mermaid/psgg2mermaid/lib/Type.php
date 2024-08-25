<?php
/**
 * Generated by Haxe 4.1.3
 */

use \php\_Boot\HxAnon;
use \php\Boot;
use \php\_Boot\HxClass;
use \php\_Boot\HxEnum;

/**
 * The Haxe Reflection API allows retrieval of type information at runtime.
 * This class complements the more lightweight Reflect class, with a focus on
 * class and enum instances.
 * @see https://haxe.org/manual/types.html
 * @see https://haxe.org/manual/std-reflection.html
 */
class Type {
	/**
	 * Returns the class of `o`, if `o` is a class instance.
	 * If `o` is null or of a different type, null is returned.
	 * In general, type parameter information cannot be obtained at runtime.
	 * 
	 * @param mixed $o
	 * 
	 * @return Class
	 */
	public static function getClass ($o) {
		#G:\HaxeToolkit\haxe\std/php/_std/Type.hx:43: lines 43-50
		if (is_object($o) && !($o instanceof HxClass) && !($o instanceof HxEnum)) {
			#G:\HaxeToolkit\haxe\std/php/_std/Type.hx:44: characters 4-54
			$cls = Boot::getClass(get_class($o));
			#G:\HaxeToolkit\haxe\std/php/_std/Type.hx:45: characters 11-54
			if ($cls === Boot::getClass(HxAnon::class)) {
				#G:\HaxeToolkit\haxe\std/php/_std/Type.hx:45: characters 38-42
				return null;
			} else {
				#G:\HaxeToolkit\haxe\std/php/_std/Type.hx:45: characters 45-53
				return $cls;
			}
		} else if (is_string($o)) {
			#G:\HaxeToolkit\haxe\std/php/_std/Type.hx:47: characters 4-22
			return Boot::getClass('String');
		} else {
			#G:\HaxeToolkit\haxe\std/php/_std/Type.hx:49: characters 4-15
			return null;
		}
	}

	/**
	 * Returns the name of class `c`, including its path.
	 * If `c` is inside a package, the package structure is returned dot-
	 * separated, with another dot separating the class name:
	 * `pack1.pack2.(...).packN.ClassName`
	 * If `c` is a sub-type of a Haxe module, that module is not part of the
	 * package structure.
	 * If `c` has no package, the class name is returned.
	 * If `c` is null, the result is unspecified.
	 * The class name does not include any type parameters.
	 * 
	 * @param Class $c
	 * 
	 * @return string
	 */
	public static function getClassName ($c) {
		#G:\HaxeToolkit\haxe\std/php/_std/Type.hx:69: lines 69-70
		if ($c === null) {
			#G:\HaxeToolkit\haxe\std/php/_std/Type.hx:70: characters 4-15
			return null;
		}
		#G:\HaxeToolkit\haxe\std/php/_std/Type.hx:71: characters 3-34
		return Boot::getHaxeName($c);
	}
}

Boot::registerClass(Type::class, 'Type');
