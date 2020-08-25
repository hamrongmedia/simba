<form action="{{ url('/contact/email/createEmail') }}" id="sform" method="post">
	<?php
		$message = Session::get('message');
		if($message){
			echo '<span class="text-alert" style="color:blue;font-style: italic;">'.$message.'</span>';
			Session::put('message',null);
		}
	?>
	<br><br>
    <div class="error alert" style="display: none;"></div>
		<div class="form-dk-email">
				<input type="hidden" id="_token" name="_token" value=""/>
				{{ csrf_field()}}
					<input type="email" placeholder="Email của bạn" class="form-control email" required="" name="email">
					<input type="hidden" value="ĐĂNG KÝ NHẬN THÔNG TIN MỚI" class="form-control title" name="title">
					<button type="submit" name="submit" class="btn btn-default btn-dk btn-hover">Đăng ký</button>
		</div>
		<div class="checkbox hidden-xs">
		<label>
			<input type="checkbox" class="check" value="" required=""> Tôi đồng ý với các điều kiện &amp; điều khoản
		</label>
	</div>
</form>
