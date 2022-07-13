<?php

require_once "Controller/FileControlador.php";
require_once "RouterClass.php";



define ("BASE_URL", '//'.$_SERVER["SERVER_NAME"] . ':' . $_SERVER["SERVER_PORT"] . dirname($_SERVER["PHP_SELF"]).'/');
define("LOGIN", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/login');
define("LOGOUT", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/logout');
$r = new Router();

/////////////////////////////////USUARIO///////////////////////////////

$r->addRoute("login", "GET", "FileControlador", "login");
$r->addRoute("fileForm", "GET", "FileControlador", "getFileForm");
$r->addRoute("editMenu/:ID", "GET", "FileControlador", "editMenu");
$r->addRoute("editUser", "POST", "FileControlador", "editUser");
$r->addRoute("deleteUser/:ID", "GET", "FileControlador", "deleteUser"); 
$r->addRoute("verifyUser", "POST", "FileControlador", "verifyUser");
$r->addRoute("logout", "GET", "FileControlador", "logout");
$r->addRoute("insertFile", "POST","FileControlador", "insertFile");

$r->setDefaultRoute("FileControlador", "login");
//RUN
$r->route($_GET['action'], $_SERVER['REQUEST_METHOD']);
