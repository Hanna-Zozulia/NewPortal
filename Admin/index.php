<?php
session_start();
require_once '../inc/database.php';
include_once ("modelAdmin/modelAdmin.php");
include_once ("modelAdmin/modelAdminNews.php");

include_once ("controllerAdmin/controllerAdmin.php");
include_once ("controllerAdmin/controllerAdminNews.php");

include ('routerAdmin/routingAdmin.php');
echo $response;