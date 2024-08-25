<?php
header("Content-Type: text/html;charset=Shift_JIS");
ini_set('default_charset' , 'UTF-8');
mb_language("Japanese");
mb_internal_encoding("UTF-8");
error_reporting(1);


define('DISPLAY_COUNT',250);
define('DATA_FILE',"./searchdata.php");
define('TEMP_FILE',"./sdata.tmp");


$result = "";
if($_GET['keyword']){$keywords = $_GET['keyword'];}
$keywords = trim($keywords);
$resultCount = 0;

if(ini_get('magic_quotes_gpc') == "1") {
  $keywords = stripslashes($keywords);
}

if(file_exists(DATA_FILE)){
	require_once(DATA_FILE);
	if($encoding == ""){$encoding = "SJIS";}
	$keywords = mb_convert_encoding($keywords,"UTF-8",$encoding);


	$keywords = htmlspecialchars($keywords);
	if(strlen($keywords) > 0){
		$i = 0;
		foreach($searchData as $k=>$v){
			
			$res1 = searchKeywords($v['title'],$keywords);
			$res2 = searchKeywords($v['contents'],$keywords);

			if($res1 === true||$res2 === true){
				$url = $v['permalink'];
				$title = $v['title'];
				$body = $v['contents'];
				$v = "";
				unset($searchData[$key]);
				
				
				if($res2 === false){
					if(strlen($body) > DISPLAY_COUNT){
						$body = mb_substr($body,0,DISPLAY_COUNT)."...";
					}
				}else{
					$half = 2 / DISPLAY_COUNT;
					if(($res - $half) <= 0){
						$body = mb_substr($body,0,DISPLAY_COUNT)."...";
					}else{
						$t = ($res - $half) + DISPLAY_COUNT;
						$blen = strlen($body);
						if($t > $blen){
							$body = mb_substr($body,($res - $half),DISPLAY_COUNT)."...";
						}else{
							$body = mb_substr($body,($res - $half),$blen - ($res - $half));
						}
					}
				}
				
				$body = boldKeywords($body,$keywords);
				$url = mb_convert_encoding($url,$encoding,"ASCII,JIS,UTF-8,EUC-JP,SJIS");
				$title = mb_convert_encoding($title,$encoding,"ASCII,JIS,UTF-8,EUC-JP,SJIS");
				$body = mb_convert_encoding($body,$encoding,"ASCII,JIS,UTF-8,EUC-JP,SJIS");
				$result .= '<dt><a href="'.$url.'">'.boldKeywords($title,$keywords).'</a></dt>'."\n";
				$result .=  '<dd>'.$body.'</dd>'."\n";
				$resultCount++;
			}
			$i++;
		}
		
		if($result == ""){
			$result = "<b>%%%keywords%%%</b>に一致する情報は見つかりませんでした。";
		}else{
			$result = "<dl>".$result."</dl>";
		}
	}else{
		$result = "キーワードが指定されていません。";
	}
	
}else{
	$result = "検索用データベースファイルが見つかりませんでした。";
}

$keywords = mb_convert_encoding($keywords,$encoding,"ASCII,JIS,UTF-8,EUC-JP,SJIS");
$result = mb_convert_encoding($result,$encoding,"ASCII,JIS,UTF-8,EUC-JP,SJIS");
$data = @join("",@file(TEMP_FILE));
$data = str_replace("%%%result%%%",$result,$data);
$data = str_replace("%%%keywords%%%",$keywords,$data);
$data = str_replace("%%%count%%%",$resultCount,$data);
$data = mb_convert_encoding($data,$encoding,"ASCII,JIS,UTF-8,EUC-JP,SJIS");

print $data;




function searchKeywords($text,$keywords){
	$keywords = trim($keywords);
	$keywords = mb_convert_encoding($keywords,'UTF-8', "ASCII,JIS,UTF-8,EUC-JP,SJIS");
	$text = mb_convert_encoding($text, 'UTF-8', "ASCII,JIS,UTF-8,EUC-JP,SJIS");
	$text = mb_strtolower($text,"UTF-8");
	$text = str_replace("　", " ", $text);


	$keywords = str_replace("　"," ",$keywords);
	$keywords = mb_strtolower($keywords,"UTF-8");
	$key = explode(" ",$keywords);

	$r = 0;
	$i = 0;
	$value = false;


	foreach($key as $item){
		if(strlen($item) > 0){
			$res = strpos($text,$item);
			if($res === false){
				$value = false;
				break;
			}else{
				$value = true;
			}
			$i++;
		}
	}



	return $value;
}

function boldKeywords($text,$keywords){
	
	$keywords = trim($keywords);
	$keywords = str_replace("　"," ",$keywords);
	$keywords = str_replace("  "," ",$keywords);
	$key = explode(" ",$keywords);
	
	foreach($key as $item){
		$text = str_replace($item,"<b>".$item."</b>",$text);
	}
	return $text;
}


?>