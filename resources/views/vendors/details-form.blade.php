{{Form::open()}}
    <div class="page-layout">
        <div class="row mb-2">
            <div class="col-md-12 d-flex justify-content-end">
                <a href="{{route('vendors')}}" class="btn-primary">Back</a>
            </div>
        </div>
        <div class="row">
            <div class="col-md-2 d-flex align-items-center">
                {{Form::label('name', 'Name:')}}
            </div>
            <div class="col-md-4">
                {{Form::text('name', $data->name, ['class' => 'form-control'])}}
            </div>
            <div class="col-md-2 d-flex align-items-center">
                {{Form::label('contact', 'Contact Number:')}}
            </div>
            <div class="col-md-4">
                {{Form::text('contact', $data->phone, ['class' => 'form-control'])}}
            </div>
            <div class="col-md-2 mt-2 d-flex align-items-center">
                {{Form::label('contactname', 'Contact Name:')}}
            </div>
            <div class="col-md-4 mt-2">
                {{Form::text('contact', $data->contact_name, ['class' => 'form-control'])}}
            </div>
            <div class="col-md-2 mt-2 d-flex align-items-center">
                {{Form::label('contactemail', 'Contact Email:')}}
            </div>
            <div class="col-md-4 mt-2">
                {{Form::text('contact', $data->contact_email, ['class' => 'form-control'])}}
            </div>
            <div class="col-md-2 mt-2 d-flex align-items-center">
                {{Form::label('website', 'Website:')}}
            </div>
            <div class="col-md-4 mt-2">
                {{Form::text('contact', $data->website, ['class' => 'form-control'])}}
            </div>
            <div class="col-md-2 mt-2 d-flex align-items-center">
                {{Form::label('address', 'Address:')}}
            </div>
            <div class="col-md-4 mt-2">
                {{Form::text('contact', $data->street_address, ['class' => 'form-control'])}}
            </div>
            <div class="col-md-2 mt-2 d-flex align-items-center">
                {{Form::label('city', 'City:')}}
            </div>
            <div class="col-md-4 mt-2">
                {{Form::text('contact', $data->city, ['class' => 'form-control'])}}
            </div>
            <div class="col-md-2 mt-2 d-flex align-items-center">
                {{Form::label('country', 'Country:')}}
            </div>
            <div class="col-md-4 mt-2">
                {{Form::text('contact', $data->country, ['class' => 'form-control'])}}
            </div>
        </div>
    </div>
    {{Form::close()}}