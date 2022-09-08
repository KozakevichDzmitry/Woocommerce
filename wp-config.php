<?php
/**
 * Основные параметры WordPress.
 *
 * Скрипт для создания wp-config.php использует этот файл в процессе установки.
 * Необязательно использовать веб-интерфейс, можно скопировать файл в "wp-config.php"
 * и заполнить значения вручную.
 *
 * Этот файл содержит следующие параметры:
 *
 * * Настройки базы данных
 * * Секретные ключи
 * * Префикс таблиц базы данных
 * * ABSPATH
 *
 * @link https://ru.wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Параметры базы данных: Эту информацию можно получить у вашего хостинг-провайдера ** //
/** Имя базы данных для WordPress */
define( 'DB_NAME', 'primdog' );

/** Имя пользователя базы данных */
define( 'DB_USER', 'root' );

/** Пароль к базе данных */
define( 'DB_PASSWORD', 'root' );

/** Имя сервера базы данных */
define( 'DB_HOST', 'localhost' );

/** Кодировка базы данных для создания таблиц. */
define( 'DB_CHARSET', 'utf8mb4' );

/** Схема сопоставления. Не меняйте, если не уверены. */
define( 'DB_COLLATE', '' );

/**#@+
 * Уникальные ключи и соли для аутентификации.
 *
 * Смените значение каждой константы на уникальную фразу. Можно сгенерировать их с помощью
 * {@link https://api.wordpress.org/secret-key/1.1/salt/ сервиса ключей на WordPress.org}.
 *
 * Можно изменить их, чтобы сделать существующие файлы cookies недействительными.
 * Пользователям потребуется авторизоваться снова.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'Sy+l{4Hpya]z;xdmZ:^Z)l<an>*,DNvaKowDf5AKhRG3uKrX{496n;y*XSkw>?5O' );
define( 'SECURE_AUTH_KEY',  'vY}xrrkr{?.(MbA)Y|(,^W|`}8M|rZZ5AD./K/<]0u5>7/(!_m{DkfE1@lQFwdIY' );
define( 'LOGGED_IN_KEY',    ']o=`w`74~wO@Vcx]!|*7-mAQn0GlL##wY:tIsT0sZxV{$Li8Ve.!u?]ToE!bj:BH' );
define( 'NONCE_KEY',        '6)0n~k~)*sdXs06)DS)y7IK/>S39iHBEHuOKBLmJ1%hXx&KJ7wpFT&GRm8g<Hgy6' );
define( 'AUTH_SALT',        'wh=xY[uK{#h,&.3HUzd(]x8=EW*S$MnZfXIh~:{c}3-%<PP;z%4=Sho:/JNJ&{*u' );
define( 'SECURE_AUTH_SALT', '.!Tmf13Z}iB)?X3bCs[@f6~cngf@l ?RRTd+;TsC^tEIxfN/Pc?9={ErI(M~2rqj' );
define( 'LOGGED_IN_SALT',   'g8xBssucBD AZ^_XCi29AMosX:=AgiuYc6Id{L?Y4;`b+]sf.c[79FN0{nAD.^bD' );
define( 'NONCE_SALT',       'ID>DNy/GT}<!=.LAqwL5U8j3&(4$S; 1/ek|C]hDknHsM]vq!)]9|=FNWRZd@sx8' );

/**#@-*/

/**
 * Префикс таблиц в базе данных WordPress.
 *
 * Можно установить несколько сайтов в одну базу данных, если использовать
 * разные префиксы. Пожалуйста, указывайте только цифры, буквы и знак подчеркивания.
 */
$table_prefix = 'wp_';

/**
 * Для разработчиков: Режим отладки WordPress.
 *
 * Измените это значение на true, чтобы включить отображение уведомлений при разработке.
 * Разработчикам плагинов и тем настоятельно рекомендуется использовать WP_DEBUG
 * в своём рабочем окружении.
 *
 * Информацию о других отладочных константах можно найти в документации.
 *
 * @link https://ru.wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* Произвольные значения добавляйте между этой строкой и надписью "дальше не редактируем". */



/* Это всё, дальше не редактируем. Успехов! */

/** Абсолютный путь к директории WordPress. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Инициализирует переменные WordPress и подключает файлы. */
require_once ABSPATH . 'wp-settings.php';
