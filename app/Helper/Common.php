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
	* Show HTMl Price Product 
	* @param $product
	* return view
	*/
	public static function priceProduct($product)
	{
		$html = '<div class="wp-price-sp">';
			if($product->sale_price) {
				$html.= '<span class="int">'.self::priceFormat($product->sale_price).'đ</span>';
				$html.= '<span class=""><span class="span-gia" style="text-decoration: line-through;color: #333333;font-weight: normal;font-size: 14px;">'.self::priceFormat($product->price).' đ</span></span>';
			} else {
				$html.= '<span class="int">'.self::priceFormat($product->price).' đ</span>';
			}
		$html.= '</div>';
		return $html;
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

    /*
    * Show all action data
    * @param Object $data
    * @param String $model
    * @param String $url
    * @return String $view
    */
    public static function showDataAction($data, $url)
    {
        $html = '<a href="'.$url.'" class="btn btn-icon btn-sm btn-primary tip"><i class="fa fa-pencil-square-o"></i></a>&ensp;';
        if( !$data->is_deleted ) :
            $html .= '<a href="javascript:void(0);" data-id="'.$data->id.'" class="btn btn-icon btn-sm btn-danger deleteDialog tip"><i class="fa fa-trash"></i></a>';
        else:
            $html .= '<a href="javascript:void(0);" data-id="'.$data->id.'" class="btn btn-icon btn-sm btn-info restoreDialog tip" data-toggle="tooltip" title="Khôi phục"><i class="fa fa-refresh"></i></a>';
        endif;
        return $html;
    }
}
