<div class="service-side-bar">



    @php
    $id = Auth::user()->id;
    $profileData = App\Models\User::find($id);
@endphp

    <div class="services-bar-widget">
        <h3 class="title">User Sidebar</h3>
        <div class="side-bar-categories">
            <img src="{{ !empty($profileData->photo) ? url('uploads/admin_images/' . $profileData->photo) : url('uploads/no_image.jpg') }}" class="rounded mx-auto d-block" alt="Image"
                style="width:100px; height:100px;">

                 <center>
                    <p><b>{{ $profileData->name }}</b></p>
                    <p><b>{{ $profileData->email }}</b></p>
                 </center>


                <br><br>

            <ul>

                <li>
                    <a href="#">User Dashboard</a>
                </li>
                <li>
                    <a href="{{ route('user.profile') }}">User Profile </a>
                </li>
                <li>
                    <a href="{{ route('user.change.password') }}">Change Password</a>
                </li>
                <li>
                    <a href="{{ route('user.booking') }}">Booking Details </a>
                </li>
                <li>
                    <a href="{{ route('user.logout') }}">Logout </a>
                </li>
            </ul>
        </div>
    </div>


</div>
