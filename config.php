<?php  // Moodle configuration file

unset($CFG);
global $CFG;
$CFG = new stdClass();

$CFG->dbtype    = 'pgsql';
$CFG->dblibrary = 'native';
$CFG->dbname    = 'moodlecloud';
$CFG->dbuser    = 'moodle';
$CFG->dbpass    = 'pass_CLOUD';
$CFG->prefix    = 'mdl_';
$CFG->dbhost    = 'db';

$CFG->wwwroot   = 'http://www.moodlecloud.id';

$CFG->dataroot  = '/var/www/moodledata';
$CFG->localcachedir = '/var/www/localcache'; 
$CFG->tempdir= '/var/www/temp'; 
$CFG->admin     = 'admin';
//$CFG->sslproxy = true;

## https://moodle.org/mod/forum/discuss.php?d=326352

$CFG->dbsessions = false;

$CFG->session_handler_class = '\core\session\redis';
$CFG->session_redis_host = 'redis';
$CFG->session_redis_prefix = ''; // Optional, default is don't set one.
$CFG->session_redis_acquire_lock_timeout = 1200;
$CFG->session_redis_lock_expire = 7200;
$CFG->xsendfile = 'X-Accel-Redirect';
$CFG->xsendfilealiases = array(
    '/dataroot/' => $CFG->dataroot,
    '/localcachedir/' => $CFG->localcachedir,
    '/tempdir/' => $CFG->tempdir,
);
$CFG->auth = 'manual,db';
//$CFG->auth = 'cas,manual';

$CFG->directorypermissions = 0777;
$CFG->enablecssoptimiser = true;
$CFG->cssoptimiserstats = true;
$CFG->cssoptimiserpretty = true;
$CFG->cachejs = true; 
//---

require_once(__DIR__ . '/lib/setup.php');


/*
ini_set ('display_errors','on');
ini_set ('log_errors','on');
ini_set ('display_startup_errors','on');
ini_set ('error_reporting',E_ALL);
 */

