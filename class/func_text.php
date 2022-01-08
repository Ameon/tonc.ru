<?

	// $source - входная строка
	function textFilter($source, $substr_num = false, $strip_tags = false){
			
		$source = stripslashes($source); 

		$find = array('/data:/i', '/about:/i', '/vbscript:/i', '/onclick/i', '/onload/i', '/onunload/i', '/onabort/i', '/onerror/i', '/onblur/i', '/onchange/i', '/onfocus/i', '/onreset/i', '/onsubmit/i', '/ondblclick/i', '/onkeydown/i', '/onkeypress/i', '/onkeyup/i', '/onmousedown/i', '/onmouseup/i', '/onmouseover/i', '/onmouseout/i', '/onselect/i', '/javascript/i');
			
		$replace = array("d&#097;ta:", "&#097;bout:", "vbscript<b></b>:", "&#111;nclick", "&#111;nload", "&#111;nunload", "&#111;nabort", "&#111;nerror", "&#111;nblur", "&#111;nchange", "&#111;nfocus", "&#111;nreset", "&#111;nsubmit", "&#111;ndblclick", "&#111;nkeydown", "&#111;nkeypress", "&#111;nkeyup", "&#111;nmousedown", "&#111;nmouseup", "&#111;nmouseover", "&#111;nmouseout", "&#111;nselect", "j&#097;vascript");

		$source = preg_replace("#<iframe#i", "&lt;iframe", $source);
		$source = preg_replace("#<script#i", "&lt;script", $source);
			
		if(!$substr_num){
			$substr_num = 25000;
		}
		
		$source = str_ireplace("{", "&#123;", $source);
		$source = str_ireplace("`", "&#96;", $source);
		
		$source = preg_replace($find, $replace, $source);
		
		if($strip_tags){
			$source = strip_tags($source);
		}
		
		return $source;
	}

// Функция преобразования кодировки в utf-8

	function ajax_utf8($str){ 
		return iconv('utf-8', 'windows-1251', $str); 
	} 

?>











