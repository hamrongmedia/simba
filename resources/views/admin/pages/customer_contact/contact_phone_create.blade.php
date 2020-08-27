<div class="wp-form-sdt">                                
    <form action="{{ url('/contact/phone/createPhone') }}" id="sform_phone" method="post">
    <?php
		$message = Session::get('message');
		if($message){
			echo '<span class="text-alert" style="color:blue;font-style: italic;">'.$message.'</span>';
			Session::put('message',null);
			
		}
	?>
	<br><br>
	<input type="hidden" id="_token" name="_token" value=""/>
		{{ csrf_field()}}
        <div class="error uk-alert" style="display: none;"></div>
        <input type="text" class="form-group form-control phone" placeholder="Nhập số điện thoại" name="phone" required value="{{Request::old('phone')}}">
        <button type="submit" name="submit" class="btn btn-default btn-hover">Gọi lại cho tôi</button>
    </form>
</div>