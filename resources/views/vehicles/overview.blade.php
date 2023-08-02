<div id="tab-overview" class="tabcontent">
    <div class="row">
        <div class="col-md-6">
            <div class="page-layout">
                {{Form::label('title', 'Details', ['class' => 'lbl-subtitle'])}}
                @foreach($data['details'] as $key => $value)
                <div class="row mt-2">
                    <div class="col-md-4">
                        {{Form::label($key, ucfirst($key), ['class' => 'lbl-key'])}}
                    </div>
                    <div class="col-md-6">
                        {{Form::label($key, $value, ['class' => 'lbl-value'])}}
                    </div>
                </div>
                @endForeach
            </div>
        </div>
        <div class="col-md-6">
            <div class="page-layout">
                {{Form::label('title', 'Open Issues', ['class' => 'lbl-subtitle'])}}
            </div>
        </div>
    </div>
</div>