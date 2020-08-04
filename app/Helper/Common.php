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

	/*
	* Delete Flag Common
	*/
	public static function deleteFlag($delete_flag)
	{
		if($delete_flag) {
			return '<span class="label label-danger" style="margin-right:10px;">Ngưng hoạt động</span>';
		}
		return '<span class="label label-success">Công khai</span>';
	}
}
