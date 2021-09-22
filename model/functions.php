<?php
session_start();

function add_field_1(){
	$_SESSION['field_1'] = array_slice($_POST,0,-1);
	for ($i=1; $i < 5; $i++) { 
		for ($j=1; $j < 5; $j++) {
			$a = 's' . $i . $j;

			foreach ($_SESSION['field_1'] as $key => $value) {
				if ($a == $key) {
					$_SESSION['field_1'][$a] == 'on';
				}
			}

			if ($_SESSION['field_1'][$a] != 'on') {
				$_SESSION['field_1'][$a] = 0;
			}

		}
	}
	ksort($_SESSION['field_1']);
}