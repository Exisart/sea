<?php
session_start();
require_once 'model/functions.php';

require_once 'view/header.php';

if (isset($_POST['new_field'])) { // if field 1 is created
	add_field_1(); // add field 1
}
var_dump($_SESSION['field_1']);

/* add new field 1 */
if ($_POST['start'] == 1) {
	$_SESSION['start'] = 1;
	require_once 'view/add_field.php';
}

/* start new game */
if (empty($_SESSION)) {
	require_once 'view/start_0.php';
}

require_once 'view/footer.php';