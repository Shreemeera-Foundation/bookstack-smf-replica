<input
	type="number"
	id="{{ $name }}"
	name="{{ $name }}"
	class="smf-input-text-field"
	@if(isset($placeholder)) placeholder="{{$placeholder}}" @endif
	@if($autofocus ?? false) autofocus @endif
	@if($disabled ?? false) disabled="disabled" @endif
	@if($readonly ?? false) readonly="readonly" @endif
	@if($min ?? false) min="{{ $min }}" @endif
	@if($max ?? false) max="{{ $max }}" @endif
	@if(isset($model) || old($name)) value="{{ old($name) ? old($name) : $model->$name}}" @endif>
@if($errors->has($name))
	<div class="text-neg text-small">{{ $errors->first($name) }}</div>
@endif
