<?php
/**
 * Podstawowa konfiguracja WordPressa.
 *
 * Ten plik zawiera konfiguracje: ustawień MySQL-a, prefiksu tabel
 * w bazie danych, tajnych kluczy, używanej lokalizacji WordPressa
 * i ABSPATH. Więćej informacji znajduje się na stronie
 * {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Kodeksu. Ustawienia MySQL-a możesz zdobyć
 * od administratora Twojego serwera.
 *
 * Ten plik jest używany przez skrypt automatycznie tworzący plik
 * wp-config.php podczas instalacji. Nie musisz korzystać z tego
 * skryptu, możesz po prostu skopiować ten plik, nazwać go
 * "wp-config.php" i wprowadzić do niego odpowiednie wartości.
 *
 * @package WordPress
 */

// ** Ustawienia MySQL-a - możesz uzyskać je od administratora Twojego serwera ** //
/** Nazwa bazy danych, której używać ma WordPress */
define('DB_NAME', 'workflowtrends');

/** Nazwa użytkownika bazy danych MySQL */
define('DB_USER', 'workflowtrends');

/** Hasło użytkownika bazy danych MySQL */
define('DB_PASSWORD', 'worktrendpure123');

/** Nazwa hosta serwera MySQL */
define('DB_HOST', 'localhost');

/** Kodowanie bazy danych używane do stworzenia tabel w bazie danych. */
define('DB_CHARSET', 'utf8');

/** Typ porównań w bazie danych. Nie zmieniaj tego ustawienia, jeśli masz jakieś wątpliwości. */
define('DB_COLLATE', '');

/**#@+
 * Unikatowe klucze uwierzytelniania i sole.
 *
 * Zmień każdy klucz tak, aby był inną, unikatową frazą!
 * Możesz wygenerować klucze przy pomocy {@link https://api.wordpress.org/secret-key/1.1/salt/ serwisu generującego tajne klucze witryny WordPress.org}
 * Klucze te mogą zostać zmienione w dowolnej chwili, aby uczynić nieważnymi wszelkie istniejące ciasteczka. Uczynienie tego zmusi wszystkich użytkowników do ponownego zalogowania się.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'DJ*wW:,nb$Weu Pi-Q !ph2%WfUV]$_{LY/9Yn8!$M|>r22u+/pOr82?N|jk+Q{!');
define('SECURE_AUTH_KEY',  '9U/1Y~L00!9D A>^l4=(Wp;.|])CMOKK`L3kU!fWuBnXE-fiZL5tCsKHpiuwocDL');
define('LOGGED_IN_KEY',    'PK#bs1ib9=,f<7hoVi}J[(RZYr241t5URJNd92})4)9{q2Q-nR@Y4/~kual!W-D2');
define('NONCE_KEY',        'lYYk0.BpF>&%w%J5<?H&$[i71~r0Epls-vrmFBDKbL-rHD,OxBLacjhY-eij+oeg');
define('AUTH_SALT',        't4LxL4w]sCIY1fl5)f(tz/m6bXgQY|D0ZQ^(/JK: @/Y~ur.>W#g[uXjoSR9WJA ');
define('SECURE_AUTH_SALT', '73FxRn+$(7-5hg7$!T+y]8/tn~PLXgO[WP~D+uU+8>3&A(k~UKd!c+P9Nd4ihqs9');
define('LOGGED_IN_SALT',   '{lSlJ-;XqI.DwR/;lG!+rrw<RXd;tm.)|$(PBqjduKVE0(lA0Yxk=faOKYra&n_m');
define('NONCE_SALT',       'UsJ}vb&WdTybBgO&4WrV3>bMugJ[#jDiRZlP5G9N|0|DmRK-D4|$UH( QXN3j<D.');

/**#@-*/

/**
 * Prefiks tabel WordPressa w bazie danych.
 *
 * Możesz posiadać kilka instalacji WordPressa w jednej bazie danych,
 * jeżeli nadasz każdej z nich unikalny prefiks.
 * Tylko cyfry, litery i znaki podkreślenia, proszę!
 */
$table_prefix  = 'wp_';

/**
 * Kod lokalizacji WordPressa, domyślnie: angielska.
 *
 * Zmień to ustawienie, aby włączyć tłumaczenie WordPressa.
 * Odpowiedni plik MO z tłumaczeniem na wybrany język musi
 * zostać zainstalowany do katalogu wp-content/languages.
 * Na przykład: zainstaluj plik de_DE.mo do katalogu
 * wp-content/languages i ustaw WPLANG na 'de_DE', aby aktywować
 * obsługę języka niemieckiego.
 */
define('WPLANG', 'pl_PL');

/**
 * Dla programistów: tryb debugowania WordPressa.
 *
 * Zmień wartość tej stałej na true, aby włączyć wyświetlanie ostrzeżeń
 * podczas modyfikowania kodu WordPressa.
 * Wielce zalecane jest, aby twórcy wtyczek oraz motywów używali
 * WP_DEBUG w miejscach pracy nad nimi.
 */
define('WP_DEBUG', false);

/* To wszystko, zakończ edycję w tym miejscu! Miłego blogowania! */

/** Absolutna ścieżka do katalogu WordPressa. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Ustawia zmienne WordPressa i dołączane pliki. */
require_once(ABSPATH . 'wp-settings.php');
