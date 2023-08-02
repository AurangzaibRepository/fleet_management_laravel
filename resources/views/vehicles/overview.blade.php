<div id="tab-overview" class="tabcontent">
    <div class="row">
        <div class="col-md-6">
            <div class="page-layout">
                {{Form::label('title', 'Details', ['class' => 'lbl-subtitle'])}}
                @include('vehicles.overview-fields')
            </div>
        </div>
        <div class="col-md-6">
            <div class="page-layout">
                {{Form::label('title', 'Open Issues', ['class' => 'lbl-subtitle'])}}
            </div>
        </div>
    </div>
</div>