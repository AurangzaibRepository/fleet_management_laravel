<div class="dv-filter">
    {{Form::open(['id' => 'form-filter'])}}
    <div class="row">
        <div class="col-md-4 mb-3">
            {{Form::text('name', '', ['class' => 'form-control', 'placeholder' => 'Name'])}}
        </div>
        <div class="col-md-4 mb-3">
            {{Form::text('phone', '', ['class' => 'form-control', 'placeholder' => 'Phone Number'])}}
        </div>
        <div class="col-md-4 d-flex align-items-end justify-content-end mb-3">
            {{Form::button('Search', ['class' => 'btn btn-primary', 'onClick' => 'PopulateUsers()'])}}
            {{Form::button('Reset', ['class' => 'btn btn-secondary', 'onClick' => 'resetFilters()'])}}
        </div>
    </div>
    {{Form::close()}}
</div>