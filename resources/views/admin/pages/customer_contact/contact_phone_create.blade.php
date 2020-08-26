<div class="wp-form-sdt">                                
    <form action="{{ url('/contact/phone/createPhone') }}" id="sform_phone" method="post">
	<input type="hidden" id="_token" name="_token" value=""/>
		{{ csrf_field()}}
        <div class="error uk-alert" style="display: none;"></div>
        <input type="text" class="form-group form-control phone" placeholder="Nhập số điện thoại" name="phone">
        <button type="submit" name="submit" class="btn btn-default btn-hover">Gọi lại cho tôi</button>
    </form>
</div>