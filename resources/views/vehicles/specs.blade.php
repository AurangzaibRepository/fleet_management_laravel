<div id="tab-specs" class="tabcontent">
    <div class="row">
        <div class="col-md-6">
            <div class="page-layout">
                {{Form::label('title', 'Dimensions', ['class' => 'lbl-subtitle'])}}
                @foreach($data['dimensions'] as $key => $value)
                <div class="row mt-2">
                    <div class="col-md-4">
                        {{Form::label($key, ucfirst($key), ['class' => 'lbl-key'])}}
                    </div>
                    <div class="col-md-8">
                        {{Form::label($key, $value, ['class' => 'lbl-value'])}}
                    </div>
                </div>
                @endForeach
            </div>
        </div>
        <div class="col-md-6">
            <div class="page-layout">
                {{Form::label('title', 'Engine', ['class' => 'lbl-subtitle'])}}
                @foreach($data['engine'] as $key => $value)
                <div class="row mt-2">
                    <div class="col-md-4">
                        {{Form::label($key, ucfirst($key), ['class' => 'lbl-key'])}}
                    </div>
                    <div class="col-md-8">
                        {{Form::label($key, $value, ['class' => 'lbl-value'])}}
                    </div>
                </div>
                @endForeach
            </div>
        </div>
    </div>
</div>