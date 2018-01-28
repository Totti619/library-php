<?php

if (!defined('BORROWED_DAYS')) define("BORROWED_DAYS", 15);
if (!defined('MAX_RESERVATIONS_PER_USER_ON_A_DAY')) define("MAX_RESERVATIONS_PER_USER_ON_A_DAY", 999);

/* DOCUMENT ROOT DIRECTORY */
if (!defined('ROOT')) define("ROOT", __DIR__."/");
if (!defined('HTTP')) define("HTTP", ($_SERVER["SERVER_NAME"] == "localhost")
    ? "http://localhost/DAW/library"
    : "http://totti/DAW/library"
);


/* DATABASE CONFIG */

if (!defined('DB_DRIVER')) define("DB_DRIVER", "mysql");
if (!defined('DB_HOST')) define("DB_HOST", "localhost");
if (!defined('DB_PORT')) define("DB_PORT", 3306);
if (!defined('DB_NAME')) define("DB_NAME", "library");
if (!defined('DB_USER')) define("DB_USER", "root");
if (!defined('DB_PASS')) define("DB_PASS", "");

/* end DATABASE CONFIG */

