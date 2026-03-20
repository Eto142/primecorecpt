@include('dashboard.header')
<div class="content">
    <div class="container">
        <div class="page-title">
            <h3>Settings</h3>
        </div>

<div class="box box-primary">
            <div class="box-body">

    <div class="card-body text-center">
        <div class="mb-4">
           $0 USD
        </div>
        <form action="" method="">
            <div class="mb-3 text-start">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" placeholder="Enter Name" value="" required>
            </div>
            <div class="mb-3 text-start">
                <label for="name" class="form-label">Username</label>
                <input type="text" class="form-control" value="" required>
            </div>
            <div class="mb-3 text-start">
                <label for="name" class="form-label">Phone</label>
                <input type="text" class="form-control" value="" required>
            </div>


            <div class="mb-3 text-start">
                <label for="email" class="form-label">Email adress</label>
                <input type="email" class="form-control" value="" required>
            </div>
            <div class="mb-3 text-start">
                <label for="address" class="form-label">Address</label>
                <input type="text" class="form-control" value=""  required>
            </div>
            <div class="mb-3 text-start">
                <label for="country" class="form-label">Country</label>
                <input type="text" class="form-control" value=""  required>
            </div>


    </div>
</div>
</div>











        <div class="box box-primary">
            <div class="box-body">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="general-tab" data-bs-toggle="tab" href="#general" role="tab" aria-controls="general" aria-selected="true">Update Details</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="system-tab" data-bs-toggle="tab" href="#system" role="tab" aria-controls="system" aria-selected="false">Change Password</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="email-tab" data-bs-toggle="tab" href="#email" role="tab" aria-controls="email" aria-selected="false">Withdrawal</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="appearance-tab" data-bs-toggle="tab" href="#appearance" role="tab" aria-controls="appearance" aria-selected="false">Update Email</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="attributions-tab" data-bs-toggle="tab" href="#attributions" role="tab" aria-controls="attributions" aria-selected="false">Address</a>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade active show" id="general" role="tabpanel" aria-labelledby="general-tab">
                        <div class="col-md-6">
        <form action="#" method="post">
            <div class="mb-3 text-start">
            <div class="mb-3 text-start">
                <label for="address" class="form-label">Username</label>
                <input type="text" class="form-control" name="username" value="" readonly>
            </div>

                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" placeholder="Update Name" name="full_name" required>
            </div>
            <div class="mb-3 text-start">
                <label for="address" class="form-label">Email</label>
                <input type="email" class="form-control" name="email" value="" readonly>
            </div>
            <div class="mb-3 text-start">
                <label for="phone" class="form-label">Phone No</label>
                <input type="number" class="form-control" placeholder="Update Phone" name="phone" required>
            </div>
            <button class="btn btn-primary shadow-2 mb-4" name="update_details">Update</button>
        </form>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="system" role="tabpanel" aria-labelledby="system-tab">
                        <div class="col-md-6">
        <form action="#" method="post">
            <div class="mb-3 text-start">
                <label for="name" class="form-label">New Password</label>
                <input type="text" class="form-control" name="password" placeholder="Enter New Password" required>
            </div>
            <div class="mb-3 text-start">
                <label for="password" class="form-label">Confirm New Password</label>
                <input type="password" class="form-control" name="new_pass" placeholder="Enter Email" required>
            </div>
            <div class="mb-3 text-start">
                <label for="password" class="form-label">Current Password</label>
                <input type="password" class="form-control" name="cur_pass" placeholder="Password" required>
            </div>
            <button class="btn btn-primary shadow-2 mb-4" name="update_password">Update Password</button>
        </form>
        </div>
    </div>
                 <div class="tab-pane fade" id="email" role="tabpanel" aria-labelledby="system-tab">
                        <div class="col-md-6">
        <form action="#" method="post">
            <div class="mb-3 text-start">
                <label for="name" class="form-label">Bitcoin Wallet Addresss</label>
                <input type="text" name="btc" class="form-control" pl required>
            </div>
            <div class="mb-3 text-start">
                <label for="name" class="form-label">Ethereum Wallet Addresss</label>
                <input type="text" name="eth" class="form-control" pla required>
            </div>
            <div class="mb-3 text-start">
                <label for="name" class="form-label">USDT Wallet Addresss</label>
                <input type="text" name="usdt" class="form-control" required>
            </div>
            <button class="btn btn-primary shadow-2 mb-4" name="update_wallet">Update Wallet Details</button>
        </form>
        </div>
    </div>
        <div class="tab-pane fade" id="appearance" role="tabpanel" aria-labelledby="system-tab">
                        <div class="col-md-6">
        <form action="#" method="post">
            <div class="mb-3 text-start">
                <label for="name" class="form-label">New Email</label>
                <input type="email" name="email" class="form-control"  required>
            </div>                      

            <button class="btn btn-primary shadow-2 mb-4" name="update_email">Update Email</button>
        </form>
        </div>
    </div>
        <div class="tab-pane fade" id="attributions" role="tabpanel" aria-labelledby="system-tab">
                        <div class="col-md-6">
        <form action="#" method="post">
            <div class="mb-3 text-start">
                <label for="name" class="form-label">Address</label>
                <input type="text" class="form-control" name="address"  required>
            </div>
            <div class="mb-3 text-start">
                <label for="password" class="form-label">Postal</label>
                <input type="text" class="form-control" name="postal"  required>
            </div>
            <button class="btn btn-primary shadow-2 mb-4" name="update_address">Update Address</button>
        </form>
        </div>
    </div>

</div>
</div>
</div>

    @include('dashboard.footer')