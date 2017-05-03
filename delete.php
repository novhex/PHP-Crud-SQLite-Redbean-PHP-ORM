<?php

/*
* PHP CRUD w/ SQLite
* copyright Vhexzhen Lei
*
*/

define('ROOT_DIR', 	realpath(dirname(__FILE__)) .'/');
require_once 'config/config.php';
require_once 'redbean_orm/rb.php';

//connect to our sqlite database using RedBean PHP ORM
R::setup($connection_string);

//retrieve user info from db
$userinfo = R::load('list',$_GET['id']);
//trash user info from db
$status = R::trash($userinfo);
header('location:index.php');

?>