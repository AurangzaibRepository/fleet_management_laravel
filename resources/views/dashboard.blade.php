@extends('/layouts/main')
<!-- Styles-->
@push('styles')
<link rel="stylesheet" href="{{asset('css/dashboard.css')}}">
</link>
@endpush

@section('contents')
{{Form::label('lbl-page-header', 'Dashboard', ['id' => 'lbl-page-header'])}}

<div class="row dv-base">
    <div class="col-md-5">
        <!-- Activity -->
        <div id="dv-activity">
        </div>

        <!-- New Users -->
        <div class="dv-new-users dv-box">
            <label class="dv-box-header">New Users</label>
            <div>
                @foreach ($newUserList as $user)
                <div class="dv-user">
                    <div class="user-card">
                        <img src="{{asset('images/leaf-icon.png')}}"></img>
                        <div class="user-info">
                            <span class="username">{{$user->user_name}}</span><br />
                            <span class="phone">{{$user->phone_no}}</span>
                        </div>
                    </div>
                    <div class="join-info">
                        <span></span>
                        <span>joined <br /> {{$user->createdAt}}</span>
                    </div>
                </div>
                @endforeach
            </div>
            <br />
            <div class="row dv-view-all">
                <a class="lnk-view-all" href="{{route('users', ['status' => 'new'])}}">view all
                    &nbsp;></a>
            </div>
        </div>
    </div>
    <div class="col-md-7">

        <div class="dv-active-users dv-box">
            <label class="dv-box-header">Current Users</label>
            <table class="tbl-active-users">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Recent Activity</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($currentUserList as $user)
                    <tr>
                        <td>
                            <div>
                                <img src="{{asset('images/leaf-icon.png')}}"></img>
                                <span class="username">{{$user[0]}}</span>
                            </div>
                        </td>
                        <td>{{$user[1]}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <br />
            <div class="row dv-view-all">
                <a class="lnk-view-all" href="{{route('users', ['status' => 'current'])}}">view all
                    &nbsp;></a>
            </div>
        </div>

        <div class="dv-whatsapp-sessions dv-box">
            <label class="dv-box-header">Whatsapp Sessions</label>

            <table class="tbl-whatsapp-sessions">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Session Time</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($whatsAppSessionList as $session)
                    <tr>
                        <td>
                            <div>
                                <img src="{{asset('images/leaf-icon.png')}}"></img>
                                <span class="username">{{$session->user_name}}<span>
                            </div>
                        </td>
                        <td>{{$session->whatsapp_session_time}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <br />
            <div class="row dv-view-all">
                <a class="lnk-view-all" href="{{route('users', ['status' => 'whatsapp'])}}">view all&nbsp;></a>
            </div>
        </div>
    </div>
</div>
@endSection


<!-- Scripts -->
@push('scripts')
<script src=" {{asset('js/highcharts.js')}}"></script>
<script src="{{asset('js/dashboard.js')}}"></script>
@endpush