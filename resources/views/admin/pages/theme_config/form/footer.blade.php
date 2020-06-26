<div id="footersettings" class="tab-pane">
	<h3 class="box-title">{{$page_name}}</h3>
	<div class="form-group">
	  <label for="">Coppyright text</label>
	   	@if($value != null && isset($value->coppyright_setting))
			<textarea class="form-control" rows="4" value="{{$value->coppyright_setting}}" name="coppyright_setting"></textarea>
		@else
			<textarea class="form-control" rows="4" placeholder="Enter ..." name="coppyright_setting"></textarea>
	    @endif
	</div>
</div> {{-- end --}}