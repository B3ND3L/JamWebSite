<?php
/**
 * Created by PhpStorm.
 * User: benjamin
 * Date: 06/12/16
 * Time: 23:51
 */
require ('../php/databaseConnector_class.php');
$db = new databaseConnector();
$db->addUser("cmoi","clui@googole.fr","02-12-2016 08:20:00");
$passwd = hash("sha256","la pepette");
echo $passwd;
$id = $db->getIdByEmail("clui@googole.fr");
$db->addPssword($id,$passwd);
echo $db->getPassword($id);