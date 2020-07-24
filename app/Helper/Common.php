<?php
namespace App\Helpers;
class Common {
	/*
	* Price Product
    */
    public static function priceFormat($price)
    {
        if (!$price) {
            return 0;
        }
        $price = number_format($price);
        return str_replace('.',',',$price);
    }

	/*
	* number format price
	*/
	public static function numberFormat($n){
	    $output = '.';
	    return str_replace(",",$output,number_format($n));
	}
}
