<?if(session_id() == '') {session_start();}?>
<?
	// ������ ��������� ��� ������ ������
	$LangArray = array("ru", "en", "el", "es");
    // ���� �� ���������
    $DefaultLang = "ru";
	
	// ���� ���� ��� ������ � �������� � ������ ���������� ��� �������
    if(isset($_SESSION['NowLang'])) {
		
		// ��������� ���� ��������� ���� �������� ��� ������
		if(!in_array($_SESSION['NowLang'], $LangArray)) {
		// ������������ �����, ���������� ���� �� ���������
		$_SESSION['NowLang'] = $DefaultLang;
		}
    }
    else {
		
		$_SESSION['NowLang'] = $DefaultLang;
		
    }
	 // ��������� ���� ��������� ������� ����� GET
    if(isset($_GET['lang'])){$language = addslashes($_GET['lang']);
	
		if($language) {
		// ��������� ���� ��������� ���� �������� ��� ������
			if(!in_array($language, $LangArray)) {
			// ������������ �����, ���������� ���� �� ���������
			$_SESSION['NowLang'] = $DefaultLang;
			}
			else {
			// ��������� ���� � ������
			$_SESSION['NowLang'] = $language;
			}
		}
	}
	
	// ��������� ������� ����
    $CurLang = addslashes($_SESSION['NowLang']);
	
	require_once(ROOT_DIR.'/basic/lang/'.$CurLang.'.php');


?>