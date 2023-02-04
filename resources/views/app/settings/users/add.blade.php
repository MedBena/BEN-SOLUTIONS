@php
    $title = "Add User";
@endphp
@extends('layout.index')
@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title mb-0">{{$title}}</h4>
            </div>
            <div class="card-body">
                <form action="{{url('/settings/users/addUser')}}" method="post" id="from-add-user">
                    @csrf
                    <div>
                        <h5 class="mb-1">Contact Informations</h5>
                    </div>
                    <div class="row gy-4 mb-4">
                        <div class="col-xxl-3 col-md-6">
                            <div>
                                <label for="first_name" class="form-label">First name <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="first_name" name="contact[first_name]" placeholder="First name">
                                <div class="invalid-feedback"></div>
                            </div>
                        </div>  
                        <div class="col-xxl-3 col-md-6">
                            <div>
                                <label for="last_name" class="form-label">Last name <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="last_name" name="contact[last_name]" placeholder="Last name">
                                <div class="invalid-feedback"></div>
                            </div>
                        </div>  
                        <div class="col-xxl-3 col-md-6">
                            <div>
                                <label for="email" class="form-label">E-mail <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="email" name="contact[email]" placeholder="E-mail">
                                <div class="invalid-feedback"></div>
                            </div>
                        </div>  
                        <div class="col-xxl-3 col-md-6">
                            <div>
                                <label for="phone" class="form-label">Phone number</label>
                                <input type="text" class="form-control" id="phone" name="contact[phone]" placeholder="Phone number">
                                <div class="invalid-feedback"></div>
                            </div>
                        </div>  
                    </div>
                    <div>
                        <h5 class="mb-1">User Informations</h5>
                    </div>
                    <div class="row gy-4 mb-4">
                        <div class="col-xxl-3 col-md-6">
                            <div>
                                <label for="username" class="form-label">Username <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="username" name="user[username]" placeholder="Username">
                                <div class="invalid-feedback"></div>
                            </div>
                        </div>   
                        <div class="col-xxl-3 col-md-6">
                            <div>
                                <label for="role" class="form-label">Role <span class="text-danger">*</span></label>
                                <select class="form-control" data-choices name="user[role_id]" id="role">
                                    <option value="">Chose a role</option>
                                    @foreach ($roles as $item)
                                        <option value="{{$item->id}}">{{$item->name}}</option>
                                     @endforeach
                                </select>
                                <div class="invalid-feedback"></div>
                            </div>
                        </div>   
                        <div class="col-xxl-3 col-md-6">
                            <div>
                                <label for="password" class="form-label">Password <span class="text-danger">*</span></label>
                                <input type="password" class="form-control" id="password" name="user[password]">
                                <div class="invalid-feedback"></div>
                            </div>
                        </div>   
                        <div class="col-xxl-3 col-md-6">
                            <label class="form-label">Status</label>
                            <div class="form-check mb-2">
                                <input class="form-check-input input-status" type="radio" name="user[status]" id="status-1" value="1" checked>
                                <label class="form-check-label" for="status-1">
                                    Active
                                </label>
                            </div>                            
                            <div class="form-check">
                                <input class="form-check-input input-status" type="radio" name="user[status]" id="status-2" value="3">
                                <label class="form-check-label" for="status-2">
                                    Deactivated
                                </label>
                            </div> 
                        </div> 
                    </div>
                    <div class="row gy-4 mb-4">
                        <div class="col-xxl-3 col-md-6">
                            <button type="button" onclick="handle_add()" class="btn btn-info">Add</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
    <script src="{{asset('assets/js/plugins.js')}}"></script>
    <script src="{{asset('assets/js/app/settings/roles.js')}}"></script>
@endsection