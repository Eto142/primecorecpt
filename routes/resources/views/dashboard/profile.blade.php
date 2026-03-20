@include('dashboard.header')

<!-- main header @e -->
<!-- content @s -->
<div class="nk-content nk-content-fluid">
    <div class="container-xl wide-lg">
        <div class="nk-content-body">
            <div class="nk-block-head">
                <div class="nk-block-head-content">
                    <div class="nk-block-head-sub"><span><a href="{{url('profile')}}">Account Setting</a></span></div>
                    <h2 class="nk-block-title fw-normal">My Profile</h2>
                    <div class="nk-block-des">
                        <p>You have full control to manage your own account setting. <span class="text-primary"><em
                                    class="icon ni ni-info" data-bs-toggle="tooltip" data-bs-placement="right"
                                    title="Tooltip on right"></em></span></p>
                    </div>
                </div>
            </div><!-- .nk-block-head -->
            <ul class="nk-nav nav nav-tabs">
                <li class="nav-item">
                    <a class="nav-link" href="{{url('profile')}}">Personal</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{url('photo')}}">Profile Picture</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href=" {{url('verify-account')}}">KYC Verification</a>
                </li>
                <!--<li class="nav-item">
                                    <a class="nav-link" href="crypto/profile-connected.php">Connect Social</a>
                                </li> -->
            </ul><!-- .nk-menu -->
            <!-- NK-Block @s -->
            <div class="nk-block">

                <div class="nk-block-head">
                    <div class="nk-block-head-content">
                        <h5 class="nk-block-title">Personal Information</h5>
                        <div class="nk-block-des">
                            <p>Basic info, like your name and address.</p>
                        </div>
                    </div>
                </div><!-- .nk-block-head -->
                <div class="nk-data data-list">
                    <div class="data-head">
                        <h6 class="overline-title">Basics</h6>
                    </div>

                    <div class="data-item" style="background-color: #ffcccb" data-bs-toggle="modal"
                        data-bs-target="#profile-edit">
                        <div class="data-col">
                            <span class="data-label">Account Status</span>
                            @if(Auth::user()->kyc_status==='0')
                            <div class="user-status user-status-unverified">Unverified</div>
                            @elseif(Auth::user()->kyc_status==='1')
                            <div class="user-status user-status-verified">verified</div>
                            @elseif(Auth::user()->kyc_status==='2')
                            <div class="user-status user-status-unverified">Failed</div>
                            @endif

                        </div>
                        <div class="data-col data-col-end"><span class="data-more disable"><em
                                    class="icon ni ni-lock-alt"></em></span></div>
                    </div><!-- .data-item -->


                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    @if($message = Session::get('success'))
                    <div class="alert alert-success">
                        <p>{{$message}}</p>
                    </div>
                    @endif

                    <form action="{{url('/profile-update')}}" method="POST">
                        @csrf

                        <div class="data-item" data-bs-toggle="modal" data-bs-target="#profile-edit">
                            <div class="data-col">
                                <span class="data-label">First Name</span>
                                <input value="{{Auth::user()->name}}" name="name" class="form-control form-control-lg">
                            </div>
                            <!--<div class="data-col data-col-end"><span class="data-more disable"><em class="icon ni ni-lock-alt"></em></span></div>-->
                        </div><!-- .data-item -->
                        <!--<div class="data-item" data-bs-toggle="modal" data-bs-target="#profile-edit">-->
                        <!--    <div class="data-col">-->
                        <!--        <span class="data-label">Display Name</span>-->
                        <!--        <span class="data-value"></span>-->
                        <!--    </div>-->
                        <!--    <div class="data-col data-col-end"><span class="data-more disable"><em class="icon ni ni-lock-alt"></em></span></div>-->
                        <!--</div>-->

                        <div class="data-item">
                            <div class="data-col">
                                <span class="data-label">Last Name</span>
                                <input value="{{Auth::user()->lname}}" name="lname"
                                    class="form-control form-control-md">
                            </div>
                            <!--<div class="data-col data-col-end"><span class="data-more disable"><em class="icon ni ni-lock-alt"></em></span></div>-->
                        </div><!-- .data-item -->
                        <div class="data-item">
                            <div class="data-col">
                                <span class="data-label">Email</span>
                                <input value="{{Auth::user()->email}}" name="email" class="form-control form-control-md"
                                    readonly>
                            </div>
                            <!--<div class="data-col data-col-end"><span class="data-more disable"><em class="icon ni ni-lock-alt"></em></span></div>-->
                        </div><!-- .data-item -->
                        <div class="data-item" data-bs-toggle="modal" data-bs-target="#profile-edit">
                            <div class="data-col">
                                <span class="data-label">Phone Number</span>
                                <input value="{{Auth::user()->phone}}" name="phone"
                                    class="form-control form-control-md">
                            </div>
                            <!--<div class="data-col data-col-end"><span class="data-more disable"><em class="icon ni ni-lock-alt"></em></span></div>-->
                        </div><!-- .data-item -->
                        <div class="data-item" data-bs-toggle="modal" data-bs-target="#profile-edit">
                            <div class="data-col">
                                <span class="data-label">Date of Birth</span>
                                <input type="text" name="dob" value="{{Auth::user()->dob}}"
                                    class="form-control form-control-lg date-picker-alt">
                            </div>
                            <!--<div class="data-col data-col-end"><span class="data-more disable"><em class="icon ni ni-lock-alt"></em></span></div>-->
                        </div><!-- .data-item -->
                        <div class="data-item" data-bs-toggle="modal" data-bs-target="#profile-edit"
                            data-tab-target="#address">
                            <div class="data-col">
                                <span class="data-label">Address</span>
                                <input type="text" name="address" value="{{Auth::user()->address}}"
                                    class="form-control form-control-md">
                            </div>
                            <!--<div class="data-col data-col-end"><span class="data-more disable"><em class="icon ni ni-lock-alt"></em></span></div>-->
                        </div><!-- .data-item -->
                        <div class="data-item" data-bs-toggle="modal" data-bs-target="#profile-edit"
                            data-tab-target="#address">
                            <div class="data-col">
                                <span class="data-label">Save Changes</span>
                                <span class="data-value"><button name="upload"
                                        class="btn btn-lg btn-warning">Save</button></span>
                            </div><br>
                            <!--<div class="data-col data-col-end"><span class="data-more disable"><em class="icon ni ni-lock-alt"></em></span></div>-->
                        </div>
                    </form>
                    <div class="data-item" data-bs-toggle="modal" data-bs-target="#profile-edit"
                        data-tab-target="#address">
                        <div class="data-col">
                            <span class="data-label">Password</span>
                            <span class="data-value"><button data-bs-toggle="modal" data-bs-target="#pass1"
                                    class="btn btn-lg btn-primary">Change password</button></span>
                        </div>
                        <!--<div class="data-col data-col-end"><span class="data-more disable"><em class="icon ni ni-lock-alt"></em></span></div>-->
                    </div>
                </div><!-- .nk-data -->

            </div>
            <!-- NK-Block @e -->
            <!-- //  Content End -->
        </div>
    </div>
</div>
@include('dashboard.footer')