@php
    $title = "Add User";
@endphp
@extends('layout.index')
@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header  align-items-center d-flex">
                <h4 class="card-title mb-0  flex-grow-1">{{$title}}</h4>
                <div class="flex-shrink-0">
                    <a href="{{url('/settings/users/list')}}" class="btn btn-soft-info btn-sm">
                        <i class="ri-add-circle-line align-middle"></i> List user
                    </a>
                    <a href="{{url('/settings/users/trash')}}" class="btn btn-soft-danger btn-sm">
                        <i class="ri-delete-bin-line align-middle"></i> Trash
                    </a>
                </div>
            </div>
            <div class="card-body">
                <form action="{{url('/settings/users/addUser')}}" method="post" id="from-add-user" enctype="multipart/form-data">
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
                        <div class="col-xxl-3 col-md-6">
                            <div>
                                <label for="date_birth" class="form-label">Date of birth</label>
                                <input type="date" class="form-control" id="date_birth" name="contact[date_birth]">
                            </div>
                        </div> 
                        <div class="col-xxl-3 col-md-6">
                            <label class="form-label">Sexe</label>
                            <div class="form-check mb-2">
                                <input class="form-check-input" type="radio" name="contact[sexe]" id="sexe-1" value="Mr">
                                <label class="form-check-label" for="sexe-1">
                                    Mr
                                </label>
                            </div>                            
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="contact[sexe]" id="sexe-2" value="Miss">
                                <label class="form-check-label" for="sexe-2">
                                    Miss
                                </label>
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
                            <div>
                                <label for="profil_pic" class="form-label">Profile picture</label>
                                <input class="form-control" name="profil_pic" type="file" id="profil_pic" onchange="previewFile();">
                            </div>
                        </div>
                        <div class="col-xxl-3 col-md-6">
                            <div class="mt-4 mt-md-0">
                                <img class="img-thumbnail rounded-circle avatar-xl profil_pic" alt="200x200" src="{{asset('assets/images/users/user-dummy-img.jpg')}}" data-holder-rendered="true">
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
    <script src="{{asset('assets/js/app/settings/user.js')}}"></script>
@endsection