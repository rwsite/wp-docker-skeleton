<?php
/**
 * Основные параметры WordPress.
 *
 * Скрипт для создания wp-config.php использует этот файл в процессе
 * установки. Необязательно использовать веб-интерфейс, можно
 * скопировать файл в "wp-config.php" и заполнить значения вручную.
 *
 * Этот файл содержит следующие параметры:
 *
 * * Настройки MySQL
 * * Секретные ключи
 * * Префикс таблиц базы данных
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** Параметры MySQL: Эту информацию можно получить у вашего хостинг-провайдера ** //
/** Имя базы данных для WordPress */
define('DB_NAME', 'wp_site');

/** Имя пользователя MySQL */
define('DB_USER', 'root');

/** Пароль к базе данных MySQL */
define('DB_PASSWORD', 'root');

/** Имя сервера MySQL */
define('DB_HOST', 'mysql');

/** Кодировка базы данных для создания таблиц. */
define('DB_CHARSET', 'utf8');

/** Схема сопоставления. Не меняйте, если не уверены. */
define('DB_COLLATE', '');

/**#@+
 * Уникальные ключи и соли для аутентификации.
 *
 * Смените значение каждой константы на уникальную фразу.
 * Можно сгенерировать их с помощью {@link https://api.wordpress.org/secret-key/1.1/salt/ сервиса ключей на WordPress.org}
 * Можно изменить их, чтобы сделать существующие файлы cookies недействительными. Пользователям потребуется авторизоваться снова.
 *
 * @since 2.6.0
 */
define('AUTH_KEY', '');
define('SECURE_AUTH_KEY', '');
define('LOGGED_IN_KEY', '');
define('NONCE_KEY', '');
define('AUTH_SALT', '');
define('SECURE_AUTH_SALT', '');
define('LOGGED_IN_SALT', '');
define('NONCE_SALT', '');

/**#@-*/

/* Префикс таблиц в базе данных WordPress. */
$table_prefix = 'rwp_';

/* WordPress debug mode for developers. */
define('WP_DEBUG', true);
define('WP_DEBUG_DISPLAY', true);
define('WP_DEBUG_LOG', true);
define('WP_DEBUG_SCRIPT', true);
define('WP_LOCAL_DEV', true);

/* PHP Memory */
define('WP_MEMORY_LIMIT', '64M');
define('WP_MAX_MEMORY_LIMIT', '256M');
define('ENFORCE_GZIP', true);


$domain = 'site.local';
$httpHost = $_SERVER['HTTP_HOST'] ?? $domain;

if (isset($_SERVER['HTTP_HOST'])) {
    define('WP_HOME', 'https://'.$domain);
    define('WP_SITEURL', 'https://'.$domain.'/wp');
    define('WP_CONTENT_URL', 'https://'.$httpHost.'/wp-content');
    define('WP_CONTENT_DIR', dirname(__FILE__).'/wp-content');
}


/*define('WP_REDIS_HOST', 'redis-7.2');
define('WP_REDIS_PORT', '6379');
define('WP_REDIS_PREFIX', 'rwsire_');*/

/** Absolute path to the WordPress directory. */
if (!defined('ABSPATH')) {
    define('ABSPATH', realpath(dirname(__FILE__).'/wp/'));
}

require_once 'vendor/autoload.php';

/** Инициализирует переменные WordPress и подключает файлы. */
require_once(ABSPATH.'wp-settings.php');
