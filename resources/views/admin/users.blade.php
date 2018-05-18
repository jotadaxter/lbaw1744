@extends('admin.default')


@section('admin_content')

    <div class="panel-heading">
        <h3 class="panel-title">Users Lists</h3>
    </div>
    <ul class="list-group">


        @foreach($users as $user)
            <li class="list-group-item">
                <div class="row toggle horizontal-scrollbar-window" id="dropdown-detail-1" data-toggle="detail-1">

                    <div class="col-md-2 col-lg-2 col-lg-offset-1">
                        {{$user->username}}
                        <br>
                        <input type="image" src="/uploads/profile_images/{{$user->img}}" alt="Submit" width="80" height="80">
                        <a class="btn btn-success" href="{{url('/profile/'.$user->user_id)}}">Go to Profile</a>
                    </div>
                    <div class="col-md-8 col-lg-6">
                        <table class="white-box table table-user-information">
                            <tbody>
                            <tr>
                                <td>Username:</td>
                                <td><?=$user->username?></td>
                            </tr>
                            <tr>
                                <td>Join date:</td>
                                <td><?=$user->admission_date?></td>
                            </tr>
                            <tr>
                                <td>Date of Birth</td>
                                <td><?=$user->birth_date?></td>
                            </tr>
                            <tr>
                                <td>Email</td>
                                <td><?=$user->email?></td>
                            </tr>
                            <tr>
                                <td>Phone Number</td>
                                <td><?=$user->phone_number?><br></td>
                            </tr>
                            <tr>
                                <td>NIF</td>
                                <td><?=$user->nif?></td>
                            </tr>
                            </tbody>
                        </table>
                    </div>


                </div>

            </li>
        @endforeach


    </ul>
@endsection