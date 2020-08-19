<tr>
    <td> 
        <select onChange="selectProduct($(this));" class="add_id form-control select2" name="add_id[]" style="width:100% !important;">
            <option>-- Chọn sản phẩm --</option>
            @foreach($products as $product)
                <option value="{{ $product->id }}">{{ $product->name }}</option>
            @endforeach
        </select> 
        <span class="add_attr"></span> 
    </td>
    <td>
        <input type="text" disabled class="add_sku form-control" value="">
    </td>
    <td>
        <input onChange="update_total($(this));" type="number" min="0" class="add_price form-control" name="add_price[]" value="0">
    </td>
    <td>
        <input onChange="update_total($(this));" type="number" min="0" class="add_qty form-control" name="add_qty[]" value="0">
    </td>
    <td>
        <input type="number" disabled class="add_total form-control" value="0">
    </td>
    <td>
        <button onClick="$(this).parent().parent().remove();" class="btn btn-danger btn-md btn-flat" data-title="Delete">
            <i class="fa fa-times" aria-hidden="true"></i>
        </button>
    </td>
</tr>
<tr> </tr>