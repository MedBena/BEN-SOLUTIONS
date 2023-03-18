<li class="menu-title"><span data-key="t-database">Database</span></li>
<li class="nav-item">
    <a href="{{url('/database')}}" class="nav-link menu-link"> <i class="bi bi-speedometer2"></i> <span data-key="t-database">Database</span> </a>
</li> 
<li class="nav-item">
    <a class="nav-link menu-link" href="#database-clients" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="database-clients">
        <i class="bi bi-journal-medical"></i> <span data-key="t-pages">Client</span>
    </a>
    
    <div class="collapse menu-dropdown" id="database-clients">
        <ul class="nav nav-sm flex-column">
            <li class="nav-item">
                <a href="{{url('/database/clients/list')}}" class="nav-link" data-key="t-team"> List </a>
            </li>
            <li class="nav-item">
                <a href="{{url('/database/clients/add')}}" class="nav-link" data-key="t-team"> Add </a>
            </li>
        </ul>
    </div>
</li>