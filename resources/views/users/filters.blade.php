<div class="dv-filter">
    {{Form::open(['id' => 'form-filter'])}}
    <div class="row">
        <div class="col-md-4">
            <div class="mb-3">
                {{Form::text('username', '', ['class' => 'form-control', 'placeholder' => 'Username'])}}
            </div>
        </div>
        <div class="col-md-4 mb-3">
            {{Form::text('phone', '', ['class' => 'form-control', 'placeholder' => 'Phone Number'])}}
        </div>
        <div class="col-md-4 mb-3">
            {{Form::select('status', $userStatus, $status, ['class' => 'form-select'])}}
        </div>
        <div class="col-md-4 mb-3">
            {{Form::text('joining_date', '', ['class' => 'form-control', 'placeholder' => 'Joining Date',
            'id' => 'joining_date', 'readonly' => 'readonly'])}}
        </div>
        <div class="col-md-4 d-flex align-items-center mb-3">
            <label id="lbl-new" class="checkbox"><input type="checkbox" id="new" {{($status=='New' ? 'checked' : '' )}}>
                New
                Visitor</label>

            <label id="" class="checkbox">
                <input type="checkbox" id="whatsapp" {{$status=='Whatsapp' ? 'checked' : '' }} />
                WhatsApp Session
            </label>
        </div>
        <div class="col-md-4 dv-buttons mb-3">
            {{Form::submit('Search', ['class' => 'btn btn-primary', 'id' => 'search'])}}
            {{Form::submit('Reset', ['class' => 'btn btn-secondary', 'id' => 'btn-reset'])}}
        </div>
    </div>
    {{Form::close()}}
</div>