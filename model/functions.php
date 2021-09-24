<?php
session_start();

function add_field_1(){ // add array field 1
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

function check_ships(){ // check ships and get them
	$arr_field_1 = $_SESSION['field_1'];
	$ships = array();	

	foreach ($arr_field_1 as $key => $value) {
		$go = 0;

		/* check for replay */
		foreach ($ships as $value_2) {
			foreach ($value_2 as $value_3) {
				if ($key === $value_3) {
					$go = 1; // replay
				}
			}
		}

		/* get ships */
		if ($go !== 1) {
			$k_0 = str_replace('s', '', $key);
			$k = $k_0;

			/* vertical */
			$ship = array();
			$k_2 = $k - 10;

			if ($value === 'on' && $arr_field_1['s' . $k_2] !== 'on') {
				$ship[] = 's' . $k;
				
				$k = $k + 10;
				if ($k < 45 && $arr_field_1['s' . $k] === 'on') {
					$ship[] = 's' . $k;

					$k = $k + 10;
					if ($k < 45 && $arr_field_1['s' . $k] === 'on') {
						$ship[] = 's' . $k;
						$ships[3] = $ship;
					} else {
						$ships[2] = $ship;
					}
				} else {
					/* horisontal */
					$k = $k_0;
					$k_2 = $k - 1;

					if ($arr_field_1['s' . $k_2] !== 'on') {
						$go = 10 < $k && $k < 15 || 20 < $k && $k < 25 || 30 < $k && $k < 35 || 40 < $k && $k < 45;
						$k = $k + 1;

						if ($go && $arr_field_1['s' . $k] === 'on') {
							$ship[] = 's' . $k;

							$k = $k + 1;
							if ($go && $arr_field_1['s' . $k] === 'on') {
								$ship[] = 's' . $k;
								$ships[3] = $ship;
							} else {
								$ships[2] = $ship;
							}
						} else {
							$ships[1] = $ship;
						}
					}
				}
			}
		}
	}
	ksort($ships);

	return $ships;
}