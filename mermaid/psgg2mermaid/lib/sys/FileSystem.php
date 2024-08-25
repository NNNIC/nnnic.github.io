<?php
/**
 * Generated by Haxe 4.1.3
 */

namespace sys;

use \php\Boot;
use \haxe\io\Path;

/**
 * This class provides information about files and directories.
 * If `null` is passed as a file path to any function in this class, the
 * result is unspecified, and may differ from target to target.
 * See `sys.io.File` for the complementary file API.
 */
class FileSystem {
	/**
	 * Returns the full path of the file or directory specified by `relPath`,
	 * which is relative to the current working directory. The path doesn't
	 * have to exist.
	 * 
	 * @param string $relPath
	 * 
	 * @return string
	 */
	public static function absolutePath ($relPath) {
		#G:\HaxeToolkit\haxe\std/php/_std/sys/FileSystem.hx:72: lines 72-73
		if (Path::isAbsolute($relPath)) {
			#G:\HaxeToolkit\haxe\std/php/_std/sys/FileSystem.hx:73: characters 4-18
			return $relPath;
		}
		#G:\HaxeToolkit\haxe\std/php/_std/sys/FileSystem.hx:74: characters 3-44
		return Path::join(\Array_hx::wrap([
			\Sys::getCwd(),
			$relPath,
		]));
	}
}

Boot::registerClass(FileSystem::class, 'sys.FileSystem');
