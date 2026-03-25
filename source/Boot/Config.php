<?php
/**
 * DATABASE
 */
if (strpos($_SERVER['HTTP_HOST'], "localhost")) {
    define("CONF_DB_HOST", "localhost");
    define("CONF_DB_USER", "****");
    define("CONF_DB_PASS", "");
    define("CONF_DB_NAME", "****");
} else {
    define("CONF_DB_HOST", "localhost");
    define("CONF_DB_USER", "****");
    define("CONF_DB_PASS", "****");
    define("CONF_DB_NAME", "****");
}

/**
 * PROJECT URLs
 */
define("CONF_URL_BASE", "https://www.roncoli.com.br");
define("CONF_URL_TEST", "https://www.localhost/roncoli");

/**
 * SITE
 */
define("CONF_SITE_NAME", "Roncoli");
define("CONF_SITE_TITLE", "Roncoli Rolamentos");
define("CONF_SITE_DESC", "Roncoli Rolamentos");
define("CONF_SITE_LANG", "pt_BR");
define("CONF_SITE_DOMAIN", "www.roncoli.com.br");
define("CONF_SITE_ADDR_STREET", "AV 11");
define("CONF_SITE_ADDR_NUMBER", "893");
define("CONF_SITE_ADDR_COMPLEMENT", "Entre ruas 9 e 10");
define("CONF_SITE_ADDR_CITY", "Rio Claro");
define("CONF_SITE_ADDR_STATE", "SP");
define("CONF_SITE_ADDR_ZIPCODE", "13.500-350");

/**
 * SOCIAL
 */
define("CONF_SOCIAL_FACEBOOK_APP", "5555555555");
define("CONF_SOCIAL_FACEBOOK_PAGE", "roncolirolamentos");
define("CONF_SOCIAL_FACEBOOK_AUTHOR", "author");
define("CONF_SOCIAL_INSTAGRAM_PAGE", "roncoli.rioclaro");

/**
 * DATES
 */
define("CONF_DATE_BR", "d/m/Y H:i:s");
define("CONF_DATE_APP", "Y-m-d H:i:s");

/**
 * PASSWORD
 */
define("CONF_PASSWD_MIN_LEN", 8);
define("CONF_PASSWD_MAX_LEN", 40);
define("CONF_PASSWD_ALGO", PASSWORD_DEFAULT);
define("CONF_PASSWD_OPTION", ["cost" => 10]);

/**
 * VIEW
 */
define("CONF_VIEW_PATH", __DIR__ . "/../../shared/views");
define("CONF_VIEW_EXT", "php");
define("CONF_VIEW_THEME", "roncoliweb");
define("CONF_VIEW_APP", "roncoliapp");
define("CONF_VIEW_ADMIN", "roncoliadm");

/**
 * UPLOAD
 */
define("CONF_UPLOAD_DIR", "storage");
define("CONF_UPLOAD_IMAGE_DIR", "images");
define("CONF_UPLOAD_FILE_DIR", "files");
define("CONF_UPLOAD_MEDIA_DIR", "medias");

/**
 * IMAGES
 */
define("CONF_IMAGE_CACHE", CONF_UPLOAD_DIR . "/" . CONF_UPLOAD_IMAGE_DIR . "/cache");
define("CONF_IMAGE_SIZE", 2000);
define("CONF_IMAGE_QUALITY", ["jpg" => 75, "png" => 5]);

/**
 * MAIL
 */
define("CONF_MAIL_HOST", "smtp.sendgrid.net");
define("CONF_MAIL_PORT", "587");
define("CONF_MAIL_USER", "apikey");
define("CONF_MAIL_PASS", "****");
define("CONF_MAIL_SENDER", ["name" => "Roncoli ", "address" => "xxx@xxx.com.br"]);
define("CONF_MAIL_SUPPORT", "xxx@xxx.com.br");
define("CONF_MAIL_OPTION_LANG", "br");
define("CONF_MAIL_OPTION_HTML", true);
define("CONF_MAIL_OPTION_AUTH", true);
define("CONF_MAIL_OPTION_SECURE", "tls");
define("CONF_MAIL_OPTION_CHARSET", "utf-8");
