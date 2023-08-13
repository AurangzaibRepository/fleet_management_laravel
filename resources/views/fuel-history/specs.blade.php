<div class="page-layout">
    <div class="row">
    @foreach($data['specifications'] as $key => $value)
    <div class="col-md-4">
        {{Form::label($key, formatKeyLabel($key), ['class' => 'lbl-key'])}}
        <br/>
        {{Form::label($key, $value, ['class' => 'lbl-value bold'])}}
    </div>
    @endforeach
    </div>
</div>