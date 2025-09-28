<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * Localized language
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'local' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', 'root' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication unique keys and salts.
 *
 * Change these to different unique phrases! You can generate these using
 * the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}.
 *
 * You can change these at any point in time to invalidate all existing cookies.
 * This will force all users to have to log in again.
 *
 * @since 2.6.0
 */


/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';


/* Add any custom values between this line and the "stop editing" line. */



/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the documentation.
 *
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
if ( ! defined( 'WP_DEBUG' ) ) {
	define( 'WP_DEBUG', false );
}


define('AUTH_KEY',         'O83H87jZuZiPv8YWll/mB26Ik/2Rclc7BaZ676NP2Rr7d/vfw/NRVP/XNtA074DkOLWgGHfdA19tjMcPhC8hAg==');
define('SECURE_AUTH_KEY',  'Ae4s9rHhV2zkiJw3x2rmSHb4T7Lk9ku3WVu27fCxvhrj3uN+TLldM65KtwpXyvDJX5SOdVrZAOWqVDHJeaxbeg==');
define('LOGGED_IN_KEY',    'OkTjHEaYUKo1FOG4QNs5qjZh05UcQ59t3C++p9RsesyyQXhXmh1Qx8AZ6iR9d0bSPI76jienBDMWEypactmqjg==');
define('NONCE_KEY',        'JMb+dg7pBjG6VeE0uo0ScLqhPElQhLUGn7xQiOxKfnUybprNCILzn0cenhHoWNOYPp/j1R0YENk89BIorY9gLQ==');
define('AUTH_SALT',        'JA69wAk9iWujUxTAe/Y0enSCQzCMKywRwU7KubYnROs10DZ62dh0f+GOOegn1phP4FAYC3Vroc9u2uB0uR41cQ==');
define('SECURE_AUTH_SALT', '6fTZdKyiV+dl9akm7oroV1B0KWsxe/+LtpKRfpLyJWIyLknrQZ/V3SdjI7WNMbEgaFWdlfLOFQev1g6+dy7YzQ==');
define('LOGGED_IN_SALT',   '3SSCaH/uLhlIZ865UKgLyDMGjbA69PqaUaHFHb6O4HqSJ/BZ5wyKAGZV2sXypmtGNuxoqAT4uC+GuPPm6CsSaA==');
define('NONCE_SALT',       '2NVDYj0g8PWwAPvseAkaexfw6THKehoR0AiAl4Jbx6+/WQoDoGTiqoPDZqQZOC+ynbPK1Z6oJ8cI/IcrfMHJbw==');
define( 'WP_ENVIRONMENT_TYPE', 'local' );
/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
