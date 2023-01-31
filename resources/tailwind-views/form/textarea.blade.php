<textarea 
	id="{{ $name }}" 
	name="{{ $name }}" 
	rows="5"
	class="smf-input-textarea-field"
	@if($errors->has($name)) class="text-neg" @endif
	@if($isHidden ?? false) style="display: none" @endif
>@if(isset($model) || old($name)){{ old($name) ? old($name) : $model->$name}}@endif</textarea>
@if($errors->has($name))
    <div class="text-neg text-small">{{ $errors->first($name) }}</div>
@endif