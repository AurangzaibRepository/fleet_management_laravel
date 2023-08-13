<div class="page-layout">
    {{Form::label('title', 'Details', ['class' => 'lbl-subtitle'])}}
    @foreach($data['details'] as $key => $value)
    <div class="row mt-2">
        <div class="col-md-4">
        {{Form::label($key, formatKeyLabel($key), ['class' => 'lbl-key'])}}
        </div>
        <div class="col-md-8">
        {{Form::label($key, $value, ['class' => 'lbl-value'])}}
        </div>
    </div>
    @endforeach
</div>