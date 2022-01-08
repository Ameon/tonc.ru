<?if(session_id() == '') {session_start();}?>
<?
	// Массив доступных для выбора языков
	$LangArray = array("ru", "en", "el", "es");
    // Язык по умолчанию
    $DefaultLang = "ru";
	
	// Если язык уже выбран и сохранен в сессии отправляем его скрипту
    if(isset($_SESSION['NowLang'])) {
		
		// Проверяем если выбранный язык доступен для выбора
		if(!in_array($_SESSION['NowLang'], $LangArray)) {
		// Неправильный выбор, возвращаем язык по умолчанию
		$_SESSION['NowLang'] = $DefaultLang;
		}
    }
    else {
		
		$_SESSION['NowLang'] = $DefaultLang;
		
    }
	 // Выбранный язык отправлен скрипту через GET
    if(isset($_GET['lang'])){$language = addslashes($_GET['lang']);
	
		if($language) {
		// Проверяем если выбранный язык доступен для выбора
			if(!in_array($language, $LangArray)) {
			// Неправильный выбор, возвращаем язык по умолчанию
			$_SESSION['NowLang'] = $DefaultLang;
			}
			else {
			// Сохраняем язык в сессии
			$_SESSION['NowLang'] = $language;
			}
		}
	}
	
	// Открываем текущий язык
    $CurLang = addslashes($_SESSION['NowLang']);
	
	require_once(ROOT_DIR.'/basic/lang/'.$CurLang.'.php');


?>