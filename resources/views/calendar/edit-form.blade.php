{{Form::open(['route' => 'saveCalendar'])}}
{{Form::hidden('id', $data->id)}}
{{Form::hidden('hdn_date', $data->date)}}
{{Form::hidden('hdn_time', old('time', $data->time))}}
{{Form::hidden('hdn_userid', $data->user_id)}}

<div class="row mb-3">
    <div class="col-2 d-flex flex-wrap align-content-center">{{Form::label('reminder', 'Reminder')}}</div>
    <div class="col-4">
        {{Form::select('reminder', $reminder, old('reminder', $data->reminder), ['class' => 'form-select'])}}
        <span class="spn-error" id="error-reminder">Reminder required</span>
    </div>
    <div class="col-2 d-flex flex-wrap align-content-center">{{Form::label('place', 'Place')}}</div>
    <div class="col-4">
        {{Form::text('place', old('place', $data->place), ['class' => 'form-control'])}}
        <span class="spn-error" id="error-place">Place required</span>
    </div>
</div>
<div class="row mb-3">
    <div class="col-2 d-flex flex-wrap align-content-center">{{Form::label('grades', 'Grades')}}</div>
    <div class="col-4">
        {{Form::text('grades', old('grades', $data->grades), ['class' => 'form-control'])}}
        <span class="spn-error" id="error-grades">Grades required</span>
    </div>
    <div class="col-2 d-flex flex-wrap align-content-center">{{Form::label('priorities', 'Priorities')}}</div>
    <div class="col-4">
        {{Form::select('priorities', $priorities, old('priorities', $data->priorities), ['class' =>
        'form-select'])}}
        <span class="spn-error" id="error-priorities">Priorities required</span>
    </div>
</div>
<div class="row mb-3">
    <div class="col-2 d-flex flex-wrap align-content-center">{{Form::label('date', 'Date')}}</div>
    <div class="col-4">
        {{Form::text('date', '', ['class' => 'form-control', 'readonly' =>'readonly'])}}
        <span class="spn-error" id="error-date">Date required</span>
    </div>
    <div class="col-2 d-flex flex-wrap align-content-center">{{Form::label('time', 'Time')}}</div>
    <div class="col-4">
        {{Form::text('time', null, ['class' => 'form-control', 'readonly' => 'readonly'])}}
        <span class="spn-error" id="error-time">Time required</span>
    </div>
</div>
<div class="row mb-3">
    <div class="col-2 d-flex flex-wrap align-content-center">{{Form::label('repeat', 'Repeat')}}</div>
    <div class="col-4">
        {{Form::select('repeat', $repeat, old('repeat', $data->repeat), ['class' => 'form-select'])}}
        <span class="spn-error" id="error-repeat">Repeat required</span>
    </div>
    <div class="col-2 d-flex flex-wrap align-content-center">{{Form::label('user_id', 'User')}}</div>
    <div class="col-4">
        {{Form::select('user_id', ['' => '-- Select --'], '', ['class' =>'form-select'])}}
        <span class="spn-error" id="error-user">User required</span>
    </div>
</div>
<div class="row">
    <div class="col-12 d-flex flex-wrap justify-content-end">
        {{Form::submit('Save', ['class' => 'btn btn-primary', 'onClick' => 'return validateForm()'])}}
        {{link_to_route('calendar', 'Back', null, ['class' => 'btn btn-secondary'])}}
    </div>
</div>
{{Form::close()}}