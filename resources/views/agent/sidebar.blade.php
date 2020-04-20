<style>
    .truncate{
        overflow: unset;
    }
</style>
<ul class="collection with-header">

    <li class="collection-header center">
        <div class="m-t-10">
            <img src="{{Storage::url('users/'.auth()->user()->image)}}" alt="{{ auth()->user()->name }}" style="width:100px; height:100px;" class="circle responsive-img">
        </div>
        <h5 class="truncate">
            {{ auth()->user()->name }}
        </h5>
        <h6 class="m-t-0"><small>{{ auth()->user()->email }}</small></h6>
    </li>

    <a href="{{ route('agent.dashboard') }}">
        <li class="collection-item {{ Request::is('agent/dashboard') ? 'active' : '' }}">
            <i class="material-icons left">dashboard</i>
            <span>Dashboard<span>
        </li>
    </a>

    <a href="{{ route('agent.profile') }}">
        <li class="collection-item {{ Request::is('agent/profile') ? 'active' : '' }}">
            <i class="material-icons left">person</i>
            <span>Profile</span>
        </li>
    </a>

    <a href="{{ route('agent.building.index') }}">
        <li class="collection-item {{ Request::is('agent/building') ? 'active' : '' }}">
            <i class="material-icons left">apartment</i>
            <span>My Buildings<span>
        </li>
    </a>
    <a href="{{ route('agent.house.index') }}">
        <li class="collection-item {{ Request::is('agent/house') ? 'active' : '' }}">
            <i class="material-icons left">home</i>
            <span>My Houses<span>
        </li>
    </a>
    <a href="{{ route('agent.message') }}">
        <li class="collection-item {{ Request::is('agent/message*') ? 'active' : '' }}">
            <i class="material-icons left">access_alarm</i>
            <span>Booking Management</span>
        </li>
    </a>
    <a href="{{ route('agent.billing') }}">
        <li class="collection-item {{ Request::is('agent/billing*') ? 'active' : '' }}">
            <i class="material-icons left">monetization_on</i>
            <span>Billing Management</span>
        </li>
    </a>
    <a href="{{ route('agent.changepassword') }}">
        <li class="collection-item {{ Request::is('agent/changepassword') ? 'active' : '' }}">
            <i class="material-icons left">lock</i>
            <span>Change Password</span>
        </li>
    </a>
</ul>