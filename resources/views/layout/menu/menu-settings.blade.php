<li class="menu-title"><span data-key="t-settings">Settings</span></li>
<li class="nav-item">
    <a href="{{url('/settings')}}" class="nav-link menu-link"> <i class="bi bi-speedometer2"></i> <span data-key="t-settings">Settings</span> </a>
</li> 
<li class="nav-item">
    <a class="nav-link menu-link" href="#settings-users" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="settings-users">
        <i class="bi bi-journal-medical"></i> <span data-key="t-pages">Users</span>
    </a>
    
    <div class="collapse menu-dropdown" id="settings-users">
        <ul class="nav nav-sm flex-column">
            <li class="nav-item">
                <a href="{{url('/settings/users/list')}}" class="nav-link" data-key="t-team"> List </a>
            </li>
            <li class="nav-item">
                <a href="{{url('/settings/users/add')}}" class="nav-link" data-key="t-team"> Add </a>
            </li>
        </ul>
    </div>
</li>
<li class="nav-item">
    <a class="nav-link menu-link" href="#settings-roles" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="settings-roles">
        <i class="bi bi-journal-medical"></i> <span data-key="t-pages">Role</span>
    </a>
    
    <div class="collapse menu-dropdown" id="settings-roles">
        <ul class="nav nav-sm flex-column">
            <li class="nav-item">
                <a href="{{url('/settings/roles/list')}}" class="nav-link" data-key="t-team"> List </a>
            </li>
            <li class="nav-item">
                <a href="{{url('/settings/roles/add')}}" class="nav-link" data-key="t-team"> Add </a>
            </li>
        </ul>
    </div>
</li>