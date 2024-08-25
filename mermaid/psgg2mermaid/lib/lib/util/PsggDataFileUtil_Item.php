<?php
/**
 * Generated by Haxe 4.1.3
 */

namespace lib\util;

use \php\_Boot\HxDynamicStr;
use \php\Boot;
use \system\Cs2Hx;
use \system\collections\generic\Dictionary;
use \psgg\HxFile;
use \php\_Boot\HxString;

class PsggDataFileUtil_Item {
	/**
	 * @var int
	 */
	const NAME_COL = 2;
	/**
	 * @var int
	 */
	const START_COL = 3;
	/**
	 * @var int
	 */
	const STATE_ROW = 2;

	/**
	 * @var string
	 */
	public $m_bitmap_buf;
	/**
	 * @var string
	 */
	public $m_chart_buf;
	/**
	 * @var Dictionary
	 */
	public $m_chart_ht;
	/**
	 * @var \Array_hx
	 */
	public $m_chart_name_list;
	/**
	 * @var \Array_hx
	 */
	public $m_chart_state_list;
	/**
	 * @var string
	 */
	public $m_config_buf;
	/**
	 * @var \Array_hx
	 */
	public $m_editor_col_list;
	/**
	 * @var \Array_hx
	 */
	public $m_editor_name_list;
	/**
	 * @var \Array_hx
	 */
	public $m_editor_row_list;
	/**
	 * @var \Array_hx
	 */
	public $m_editor_state_list;
	/**
	 * @var string
	 */
	public $m_header_buf;
	/**
	 * @var string
	 */
	public $m_help_buf;
	/**
	 * @var string
	 */
	public $m_iteminf_buf;
	/**
	 * @var Dictionary
	 */
	public $m_name_dic;
	/**
	 * @var string
	 */
	public $m_setting_buf;
	/**
	 * @var Dictionary
	 */
	public $m_state_dic;
	/**
	 * @var string
	 */
	public $m_tmpfnc;
	/**
	 * @var string
	 */
	public $m_tmpfnc_buf;
	/**
	 * @var string
	 */
	public $m_tmpsrc;
	/**
	 * @var string
	 */
	public $m_tmpsrc_buf;

	/**
	 * @return void
	 */
	public function __construct () {
	}

	/**
	 * @return \Array_hx
	 */
	public function GetAllNames () {
		#src/lib/util/PsggDataFileUtil_Item.hx:186: characters 9-21
		$this->chart_init();
		#src/lib/util/PsggDataFileUtil_Item.hx:187: characters 9-54
		$list = new \Array_hx();
		#src/lib/util/PsggDataFileUtil_Item.hx:188: lines 188-191
		$_g = 0;
		$_g1 = $this->m_name_dic->get_Keys();
		while ($_g < $_g1->length) {
			#src/lib/util/PsggDataFileUtil_Item.hx:188: characters 14-15
			$k = ($_g1->arr[$_g] ?? null);
			#src/lib/util/PsggDataFileUtil_Item.hx:188: lines 188-191
			++$_g;
			#src/lib/util/PsggDataFileUtil_Item.hx:190: characters 13-25
			$list->arr[$list->length++] = $k;
		}
		#src/lib/util/PsggDataFileUtil_Item.hx:192: characters 9-20
		return $list;
	}

	/**
	 * @return \Array_hx
	 */
	public function GetAllStates () {
		#src/lib/util/PsggDataFileUtil_Item.hx:176: characters 9-21
		$this->chart_init();
		#src/lib/util/PsggDataFileUtil_Item.hx:177: characters 9-54
		$list = new \Array_hx();
		#src/lib/util/PsggDataFileUtil_Item.hx:178: lines 178-181
		$_g = 0;
		$_g1 = $this->m_state_dic->get_Keys();
		while ($_g < $_g1->length) {
			#src/lib/util/PsggDataFileUtil_Item.hx:178: characters 14-15
			$k = ($_g1->arr[$_g] ?? null);
			#src/lib/util/PsggDataFileUtil_Item.hx:178: lines 178-181
			++$_g;
			#src/lib/util/PsggDataFileUtil_Item.hx:180: characters 13-25
			$list->arr[$list->length++] = $k;
		}
		#src/lib/util/PsggDataFileUtil_Item.hx:182: characters 9-20
		return $list;
	}

	/**
	 * @return string
	 */
	public function GetCodeOutputEnd () {
		#src/lib/util/PsggDataFileUtil_Item.hx:227: characters 9-149
		return $this->get_setting_String_String("setupinfo", "code_output_end");
	}

	/**
	 * @return string
	 */
	public function GetCodeOutputStart () {
		#src/lib/util/PsggDataFileUtil_Item.hx:223: characters 9-151
		return $this->get_setting_String_String("setupinfo", "code_output_start");
	}

	/**
	 * @param string $doc_path
	 * 
	 * @return string
	 */
	public function GetGenDir ($doc_path) {
		#src/lib/util/PsggDataFileUtil_Item.hx:204: characters 9-74
		return HxFile::GetDirectoryName($this->GetGeneratedSource($doc_path));
	}

	/**
	 * @param string $doc_path
	 * 
	 * @return string
	 */
	public function GetGeneratedSource ($doc_path) {
		#src/lib/util/PsggDataFileUtil_Item.hx:196: characters 9-150
		$gensrc = $this->get_setting_String_String("setting", "gen_src");
		#src/lib/util/PsggDataFileUtil_Item.hx:197: characters 9-156
		$genrdir = $this->get_setting_String_String("setupinfo", "genrdir");
		#src/lib/util/PsggDataFileUtil_Item.hx:198: characters 9-96
		$path2 = HxFile::Combine_String_String_String($doc_path, $genrdir, $gensrc);
		#src/lib/util/PsggDataFileUtil_Item.hx:199: characters 9-59
		$path3 = HxFile::GetFullPath($path2);
		#src/lib/util/PsggDataFileUtil_Item.hx:200: characters 9-21
		return $path3;
	}

	/**
	 * @return string
	 */
	public function GetGeneratedSourceFileName () {
		#src/lib/util/PsggDataFileUtil_Item.hx:208: characters 9-150
		$gensrc = $this->get_setting_String_String("setting", "gen_src");
		#src/lib/util/PsggDataFileUtil_Item.hx:209: characters 9-22
		return $gensrc;
	}

	/**
	 * @param string $doc_path
	 * 
	 * @return string
	 */
	public function GetIncDir ($doc_path) {
		#src/lib/util/PsggDataFileUtil_Item.hx:213: characters 9-153
		$rdir = $this->get_setting_String_String("setupinfo", "incrdir");
		#src/lib/util/PsggDataFileUtil_Item.hx:214: lines 214-217
		if (($rdir === null) || (mb_strlen($rdir) === 0)) {
			#src/lib/util/PsggDataFileUtil_Item.hx:216: characters 13-24
			return null;
		}
		#src/lib/util/PsggDataFileUtil_Item.hx:218: characters 9-78
		$path2 = HxFile::Combine_String_String($doc_path, $rdir);
		#src/lib/util/PsggDataFileUtil_Item.hx:219: characters 9-46
		return HxFile::GetFullPath($path2);
	}

	/**
	 * @return \Array_hx
	 */
	public function GetNameList () {
		#src/lib/util/PsggDataFileUtil_Item.hx:296: characters 9-27
		$this->editor_list_init();
		#src/lib/util/PsggDataFileUtil_Item.hx:297: characters 9-34
		return $this->m_editor_name_list;
	}

	/**
	 * @return \Array_hx
	 */
	public function GetNameRowList () {
		#src/lib/util/PsggDataFileUtil_Item.hx:301: characters 9-27
		$this->editor_list_init();
		#src/lib/util/PsggDataFileUtil_Item.hx:302: characters 9-33
		return $this->m_editor_row_list;
	}

	/**
	 * @return string
	 */
	public function GetSrcEnc () {
		#src/lib/util/PsggDataFileUtil_Item.hx:231: characters 9-137
		return $this->get_setting_String_String("setting", "src_enc");
	}

	/**
	 * @return \Array_hx
	 */
	public function GetStateColList () {
		#src/lib/util/PsggDataFileUtil_Item.hx:311: characters 9-27
		$this->editor_list_init();
		#src/lib/util/PsggDataFileUtil_Item.hx:312: characters 9-33
		return $this->m_editor_col_list;
	}

	/**
	 * @return \Array_hx
	 */
	public function GetStateList () {
		#src/lib/util/PsggDataFileUtil_Item.hx:306: characters 9-27
		$this->editor_list_init();
		#src/lib/util/PsggDataFileUtil_Item.hx:307: characters 9-35
		return $this->m_editor_state_list;
	}

	/**
	 * @return string
	 */
	public function GetStatemachine () {
		#src/lib/util/PsggDataFileUtil_Item.hx:235: characters 9-146
		return $this->get_setting_String_String("setupinfo", "statemachine");
	}

	/**
	 * @param string $state
	 * @param string $name
	 * 
	 * @return string
	 */
	public function GetVal ($state, $name) {
		#src/lib/util/PsggDataFileUtil_Item.hx:171: characters 9-21
		$this->chart_init();
		#src/lib/util/PsggDataFileUtil_Item.hx:172: characters 9-36
		return $this->get_val($state, $name);
	}

	/**
	 * @return void
	 */
	public function chart_init () {
		#src/lib/util/PsggDataFileUtil_Item.hx:52: lines 52-55
		if ($this->m_chart_ht !== null) {
			#src/lib/util/PsggDataFileUtil_Item.hx:54: characters 13-19
			return;
		}
		#src/lib/util/PsggDataFileUtil_Item.hx:56: characters 9-67
		$this->m_chart_ht = IniUtil::CreateHashtable($this->m_chart_buf);
		#src/lib/util/PsggDataFileUtil_Item.hx:57: characters 9-49
		$this->m_chart_state_list = $this->get_staterow_list();
		#src/lib/util/PsggDataFileUtil_Item.hx:58: characters 9-47
		$this->m_chart_name_list = $this->get_namecol_list();
		#src/lib/util/PsggDataFileUtil_Item.hx:59: characters 9-82
		$this->m_state_dic = new Dictionary();
		#src/lib/util/PsggDataFileUtil_Item.hx:60: characters 9-57
		$stateids = $this->get_stateid_list();
		#src/lib/util/PsggDataFileUtil_Item.hx:61: lines 61-68
		$_g = 0;
		while ($_g < $stateids->length) {
			#src/lib/util/PsggDataFileUtil_Item.hx:61: characters 14-16
			$id = ($stateids->arr[$_g] ?? null);
			#src/lib/util/PsggDataFileUtil_Item.hx:61: lines 61-68
			++$_g;
			#src/lib/util/PsggDataFileUtil_Item.hx:63: characters 13-72
			$s = $this->get_chart_String_String("id_state_dic", $id);
			#src/lib/util/PsggDataFileUtil_Item.hx:64: lines 64-67
			if (!(($s === null) || (mb_strlen($s) === 0))) {
				#src/lib/util/PsggDataFileUtil_Item.hx:66: characters 17-39
				$this->m_state_dic->Add($s, $id);
			}
		}
		#src/lib/util/PsggDataFileUtil_Item.hx:69: characters 9-81
		$this->m_name_dic = new Dictionary();
		#src/lib/util/PsggDataFileUtil_Item.hx:70: characters 9-55
		$nameids = $this->get_nameid_list();
		#src/lib/util/PsggDataFileUtil_Item.hx:71: lines 71-78
		$_g = 0;
		while ($_g < $nameids->length) {
			#src/lib/util/PsggDataFileUtil_Item.hx:71: characters 14-16
			$id = ($nameids->arr[$_g] ?? null);
			#src/lib/util/PsggDataFileUtil_Item.hx:71: lines 71-78
			++$_g;
			#src/lib/util/PsggDataFileUtil_Item.hx:73: characters 13-71
			$n = $this->get_chart_String_String("id_name_dic", $id);
			#src/lib/util/PsggDataFileUtil_Item.hx:74: lines 74-77
			if (!(($n === null) || (mb_strlen($n) === 0))) {
				#src/lib/util/PsggDataFileUtil_Item.hx:76: characters 17-38
				$this->m_name_dic->Add($n, $id);
			}
		}
	}

	/**
	 * @return void
	 */
	public function editor_list_init () {
		#src/lib/util/PsggDataFileUtil_Item.hx:243: characters 9-21
		$this->chart_init();
		#src/lib/util/PsggDataFileUtil_Item.hx:244: lines 244-247
		if ($this->m_editor_name_list !== null) {
			#src/lib/util/PsggDataFileUtil_Item.hx:246: characters 13-19
			return;
		}
		#src/lib/util/PsggDataFileUtil_Item.hx:248: characters 9-49
		$this->m_editor_name_list = new \Array_hx();
		#src/lib/util/PsggDataFileUtil_Item.hx:249: characters 9-45
		$this->m_editor_row_list = new \Array_hx();
		#src/lib/util/PsggDataFileUtil_Item.hx:250: characters 9-25
		$row = 0;
		#src/lib/util/PsggDataFileUtil_Item.hx:251: lines 251-270
		while ($row <= 1000) {
			#src/lib/util/PsggDataFileUtil_Item.hx:253: characters 13-18
			++$row;
			#src/lib/util/PsggDataFileUtil_Item.hx:254: characters 13-57
			$s = $this->get_chart_val($row, 2);
			#src/lib/util/PsggDataFileUtil_Item.hx:255: lines 255-258
			if ($s === null) {
				#src/lib/util/PsggDataFileUtil_Item.hx:257: characters 17-25
				continue;
			}
			#src/lib/util/PsggDataFileUtil_Item.hx:259: characters 13-37
			$s = Cs2Hx::Trim($s);
			#src/lib/util/PsggDataFileUtil_Item.hx:260: lines 260-263
			if (($s === null) || (mb_strlen($s) === 0)) {
				#src/lib/util/PsggDataFileUtil_Item.hx:262: characters 17-25
				continue;
			}
			#src/lib/util/PsggDataFileUtil_Item.hx:264: characters 13-57
			$c = HxString::charCodeAt(\mb_strtolower($s), 0);
			#src/lib/util/PsggDataFileUtil_Item.hx:265: lines 265-269
			if (($c === 33) || ($c === 95) || (($c >= 97) && ($c <= 122))) {
				#src/lib/util/PsggDataFileUtil_Item.hx:267: characters 17-43
				$_this = $this->m_editor_name_list;
				$_this->arr[$_this->length++] = $s;
				#src/lib/util/PsggDataFileUtil_Item.hx:268: characters 17-44
				$_this1 = $this->m_editor_row_list;
				$_this1->arr[$_this1->length++] = $row;
			}
		}
		#src/lib/util/PsggDataFileUtil_Item.hx:271: characters 9-50
		$this->m_editor_state_list = new \Array_hx();
		#src/lib/util/PsggDataFileUtil_Item.hx:272: characters 9-45
		$this->m_editor_col_list = new \Array_hx();
		#src/lib/util/PsggDataFileUtil_Item.hx:273: characters 9-37
		$col = 2;
		#src/lib/util/PsggDataFileUtil_Item.hx:274: lines 274-292
		while ($col <= 10000) {
			#src/lib/util/PsggDataFileUtil_Item.hx:276: characters 13-18
			++$col;
			#src/lib/util/PsggDataFileUtil_Item.hx:277: characters 13-58
			$s = $this->get_chart_val(2, $col);
			#src/lib/util/PsggDataFileUtil_Item.hx:278: lines 278-281
			if ($s === null) {
				#src/lib/util/PsggDataFileUtil_Item.hx:280: characters 17-25
				continue;
			}
			#src/lib/util/PsggDataFileUtil_Item.hx:282: characters 13-37
			$s = Cs2Hx::Trim($s);
			#src/lib/util/PsggDataFileUtil_Item.hx:283: lines 283-286
			if (($s === null) || (mb_strlen($s) === 0)) {
				#src/lib/util/PsggDataFileUtil_Item.hx:285: characters 17-25
				continue;
			}
			#src/lib/util/PsggDataFileUtil_Item.hx:287: lines 287-291
			if (StateUtil::IsValidStateName($s)) {
				#src/lib/util/PsggDataFileUtil_Item.hx:289: characters 17-44
				$_this = $this->m_editor_state_list;
				$_this->arr[$_this->length++] = $s;
				#src/lib/util/PsggDataFileUtil_Item.hx:290: characters 17-44
				$_this1 = $this->m_editor_col_list;
				$_this1->arr[$_this1->length++] = $col;
			}
		}
	}

	/**
	 * @param string $key
	 * 
	 * @return string
	 */
	public function get_chart ($key) {
		#src/lib/util/PsggDataFileUtil_Item.hx:106: characters 9-21
		$this->chart_init();
		#src/lib/util/PsggDataFileUtil_Item.hx:107: characters 9-81
		$v = IniUtil::GetValueFromHashtable($key, $this->m_chart_ht);
		#src/lib/util/PsggDataFileUtil_Item.hx:108: characters 16-47
		if ($v !== null) {
			#src/lib/util/PsggDataFileUtil_Item.hx:108: characters 28-40
			return HxDynamicStr::wrap($v)->toString();
		} else {
			#src/lib/util/PsggDataFileUtil_Item.hx:108: characters 43-47
			return null;
		}
	}

	/**
	 * @param string $group
	 * @param string $key
	 * 
	 * @return string
	 */
	public function get_chart_String_String ($group, $key) {
		#src/lib/util/PsggDataFileUtil_Item.hx:101: characters 9-21
		$this->chart_init();
		#src/lib/util/PsggDataFileUtil_Item.hx:102: characters 9-115
		return IniUtil::GetValueFromHashtable_String_String_DictionaryStringObject($group, $key, $this->m_chart_ht);
	}

	/**
	 * @param int $row
	 * @param int $col
	 * 
	 * @return string
	 */
	public function get_chart_val ($row, $col) {
		#src/lib/util/PsggDataFileUtil_Item.hx:85: characters 9-21
		$this->chart_init();
		#src/lib/util/PsggDataFileUtil_Item.hx:86: characters 9-79
		$state = ListUtil::Get($this->m_chart_state_list, $col - 1);
		#src/lib/util/PsggDataFileUtil_Item.hx:87: characters 9-77
		$name = ListUtil::Get($this->m_chart_name_list, $row - 1);
		#src/lib/util/PsggDataFileUtil_Item.hx:88: lines 88-91
		if ($row === 2) {
			#src/lib/util/PsggDataFileUtil_Item.hx:90: characters 13-25
			return $state;
		}
		#src/lib/util/PsggDataFileUtil_Item.hx:92: lines 92-95
		if ($col === 2) {
			#src/lib/util/PsggDataFileUtil_Item.hx:94: characters 13-24
			return $name;
		}
		#src/lib/util/PsggDataFileUtil_Item.hx:96: characters 9-45
		$v = $this->get_val($state, $name);
		#src/lib/util/PsggDataFileUtil_Item.hx:97: characters 9-17
		return $v;
	}

	/**
	 * @param string $key
	 * 
	 * @return string
	 */
	public function get_config ($key) {
		#src/lib/util/PsggDataFileUtil_Item.hx:26: characters 9-70
		$v = IniUtil::GetValue($key, $this->m_config_buf);
		#src/lib/util/PsggDataFileUtil_Item.hx:27: characters 16-49
		if ($v !== null) {
			#src/lib/util/PsggDataFileUtil_Item.hx:27: characters 29-41
			return HxDynamicStr::wrap($v)->toString();
		} else {
			#src/lib/util/PsggDataFileUtil_Item.hx:27: characters 44-48
			return null;
		}
	}

	/**
	 * @param string $key
	 * 
	 * @return string
	 */
	public function get_header ($key) {
		#src/lib/util/PsggDataFileUtil_Item.hx:21: characters 9-70
		$v = IniUtil::GetValue($key, $this->m_header_buf);
		#src/lib/util/PsggDataFileUtil_Item.hx:22: characters 16-49
		if ($v !== null) {
			#src/lib/util/PsggDataFileUtil_Item.hx:22: characters 29-41
			return HxDynamicStr::wrap($v)->toString();
		} else {
			#src/lib/util/PsggDataFileUtil_Item.hx:22: characters 44-48
			return null;
		}
	}

	/**
	 * @param string $group
	 * @param string $key
	 * 
	 * @return string
	 */
	public function get_help ($group, $key) {
		#src/lib/util/PsggDataFileUtil_Item.hx:39: characters 9-86
		return IniUtil::GetValue_String_String_String($group, $key, $this->m_help_buf);
	}

	/**
	 * @param string $group
	 * @param string $key
	 * 
	 * @return string
	 */
	public function get_iteminf ($group, $key) {
		#src/lib/util/PsggDataFileUtil_Item.hx:43: characters 9-89
		return IniUtil::GetValue_String_String_String($group, $key, $this->m_iteminf_buf);
	}

	/**
	 * @return \Array_hx
	 */
	public function get_namecol_list () {
		#src/lib/util/PsggDataFileUtil_Item.hx:128: characters 9-51
		$val = $this->get_chart("nameid_list");
		#src/lib/util/PsggDataFileUtil_Item.hx:129: characters 9-74
		$id_list = CsvUtil::GetALineString($val);
		#src/lib/util/PsggDataFileUtil_Item.hx:130: characters 9-59
		$name_list = new \Array_hx();
		#src/lib/util/PsggDataFileUtil_Item.hx:131: lines 131-139
		$_g = 0;
		while ($_g < $id_list->length) {
			#src/lib/util/PsggDataFileUtil_Item.hx:131: characters 14-15
			$i = ($id_list->arr[$_g] ?? null);
			#src/lib/util/PsggDataFileUtil_Item.hx:131: lines 131-139
			++$_g;
			#src/lib/util/PsggDataFileUtil_Item.hx:133: characters 13-31
			$v = "";
			#src/lib/util/PsggDataFileUtil_Item.hx:134: lines 134-137
			if (!(($i === null) || (mb_strlen($i) === 0))) {
				#src/lib/util/PsggDataFileUtil_Item.hx:136: characters 17-62
				$v = $this->get_chart_String_String("id_name_dic", $i);
			}
			#src/lib/util/PsggDataFileUtil_Item.hx:138: characters 13-30
			$name_list->arr[$name_list->length++] = $v;
		}
		#src/lib/util/PsggDataFileUtil_Item.hx:140: characters 9-25
		return $name_list;
	}

	/**
	 * @return \Array_hx
	 */
	public function get_nameid_list () {
		#src/lib/util/PsggDataFileUtil_Item.hx:150: characters 9-51
		$val = $this->get_chart("nameid_list");
		#src/lib/util/PsggDataFileUtil_Item.hx:151: characters 9-71
		$list = CsvUtil::GetALineString($val);
		#src/lib/util/PsggDataFileUtil_Item.hx:152: characters 9-20
		return $list;
	}

	/**
	 * @param string $group
	 * 
	 * @return mixed
	 */
	public function get_setting ($group) {
		#src/lib/util/PsggDataFileUtil_Item.hx:35: characters 9-63
		return IniUtil::GetValue($group, $this->m_setting_buf);
	}

	/**
	 * @param string $group
	 * @param string $key
	 * 
	 * @return string
	 */
	public function get_setting_String_String ($group, $key) {
		#src/lib/util/PsggDataFileUtil_Item.hx:31: characters 9-89
		return IniUtil::GetValue_String_String_String($group, $key, $this->m_setting_buf);
	}

	/**
	 * @return \Array_hx
	 */
	public function get_stateid_list () {
		#src/lib/util/PsggDataFileUtil_Item.hx:144: characters 9-52
		$val = $this->get_chart("stateid_list");
		#src/lib/util/PsggDataFileUtil_Item.hx:145: characters 9-71
		$list = CsvUtil::GetALineString($val);
		#src/lib/util/PsggDataFileUtil_Item.hx:146: characters 9-20
		return $list;
	}

	/**
	 * @return \Array_hx
	 */
	public function get_staterow_list () {
		#src/lib/util/PsggDataFileUtil_Item.hx:112: characters 9-52
		$val = $this->get_chart("stateid_list");
		#src/lib/util/PsggDataFileUtil_Item.hx:113: characters 9-74
		$id_list = CsvUtil::GetALineString($val);
		#src/lib/util/PsggDataFileUtil_Item.hx:114: characters 9-60
		$state_list = new \Array_hx();
		#src/lib/util/PsggDataFileUtil_Item.hx:115: lines 115-123
		$_g = 0;
		while ($_g < $id_list->length) {
			#src/lib/util/PsggDataFileUtil_Item.hx:115: characters 14-15
			$i = ($id_list->arr[$_g] ?? null);
			#src/lib/util/PsggDataFileUtil_Item.hx:115: lines 115-123
			++$_g;
			#src/lib/util/PsggDataFileUtil_Item.hx:117: characters 13-31
			$v = "";
			#src/lib/util/PsggDataFileUtil_Item.hx:118: lines 118-121
			if (!(($i === null) || (mb_strlen($i) === 0))) {
				#src/lib/util/PsggDataFileUtil_Item.hx:120: characters 17-63
				$v = $this->get_chart_String_String("id_state_dic", $i);
			}
			#src/lib/util/PsggDataFileUtil_Item.hx:122: characters 13-31
			$state_list->arr[$state_list->length++] = $v;
		}
		#src/lib/util/PsggDataFileUtil_Item.hx:124: characters 9-26
		return $state_list;
	}

	/**
	 * @param string $state
	 * @param string $name
	 * 
	 * @return string
	 */
	public function get_val ($state, $name) {
		#src/lib/util/PsggDataFileUtil_Item.hx:156: lines 156-159
		if (($state === null) || (mb_strlen($state) === 0) || (($name === null) || (mb_strlen($name) === 0))) {
			#src/lib/util/PsggDataFileUtil_Item.hx:158: characters 13-24
			return null;
		}
		#src/lib/util/PsggDataFileUtil_Item.hx:160: characters 9-74
		$sid = DictionaryUtil::Get($this->m_state_dic, $state);
		#src/lib/util/PsggDataFileUtil_Item.hx:161: characters 9-72
		$nid = DictionaryUtil::Get($this->m_name_dic, $name);
		#src/lib/util/PsggDataFileUtil_Item.hx:162: lines 162-165
		if (($nid === null) || ($sid === null)) {
			#src/lib/util/PsggDataFileUtil_Item.hx:164: characters 13-24
			return null;
		}
		#src/lib/util/PsggDataFileUtil_Item.hx:166: characters 9-58
		$v = $this->get_chart_String_String($sid, $nid);
		#src/lib/util/PsggDataFileUtil_Item.hx:167: characters 9-17
		return $v;
	}
}

Boot::registerClass(PsggDataFileUtil_Item::class, 'lib.util.PsggDataFileUtil_Item');
