<?php

class Availability{

public static function display($availability){
	if ($availability == 0) {
			echo "Out of Stock";
		}elseif ($availability == 1) {
			echo "In Stock";
	}

}

public static function displayClass($availability){
	if ($availability == 0) {
			echo "outfstock";
		}elseif ($availability == 1) {
			echo "instock";
	}
}

}
