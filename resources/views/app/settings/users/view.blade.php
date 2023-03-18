@php
    $title = "Information User";
@endphp

@extends('layout.index')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card overflow-hidden">
            <div class="rounded profile-basic position-relative" style="background-image:url({{asset('assets/images/profile-bg.jpg')}});background-size: cover;background-position: center;">
                <div class="bg-overlay bg-primary"></div>
            </div>
            <div class="card-body">
                <div class="position-relative">
                    <div class="mt-n5">
                        <img src="@if($infos->profil_pic!=NULL){{asset($public_path.'users/'.$infos->profil_pic)}}@else{{asset('assets/images/users/avatar-2.jpg')}}@endif" alt="" class="avatar-lg rounded-circle p-1 bg-card-custom mt-n4">
                    </div>
                </div>
                <div class="pt-3">
                    <div class="row justify-content-between gy-4">
                        <div class="col-xl-5 col-lg-5">
                            <h5 class="fs-17">{{$infos->contact->first_name}} {{$infos->contact->last_name}}</h5>
                            <div class="hstack gap-1 mb-3 text-muted">
                                {{-- <div class="me-2"><i class="ri-map-pin-user-line me-1 fs-16 align-middle"></i>Phoenix, USA</div>
                                <div>
                                    <i class="ri-building-line me-1 fs-16 align-middle"></i>Themesbrand
                                </div>
                            </div>
                            <p>Product visual designer, expert in UI design</p> --}}
                        </div>
                    </div>
                </div>
                <div class="row mt-2 mt-lg-4 gy-3">
                    <div class="col-lg order-1">
                        <ul class="nav nav-pills animation-nav gap-2 gap-lg-3 flex-grow-1" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link fs-14 active" data-bs-toggle="tab" href="#overview-tab" role="tab">
                                    <i class="ri-airplay-fill d-inline-block d-md-none"></i> <span class="d-none d-md-inline-block">Overview</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link fs-14" data-bs-toggle="tab" href="#edit-profile" role="tab">
                                    <i class="ri-list-unordered d-inline-block d-md-none"></i> <span class="d-none d-md-inline-block">Edit Profile</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="tab-content text-muted">
            <div class="tab-pane " id="overview-tab" role="tabpanel">
                <div class="row">
                    <div class="col-xxl-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-2">
                                        <div class="d-flex mt-4">
                                            <div class="flex-grow-1 overflow-hidden">
                                                <p class="mb-1">E-mail :</p>
                                                <h6 class="text-truncate mb-0">
                                                    @if($infos->contact->email != NULL)
                                                        {{$infos->contact->email}}
                                                    @else
                                                        {{"-"}}
                                                    @endif
                                                </h6>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="d-flex mt-4">
                                            <div class="flex-grow-1 overflow-hidden">
                                                <p class="mb-1">Phone :</p>
                                                <h6 class="text-truncate mb-0">
                                                    @if($infos->contact->phone != NULL)
                                                        {{$infos->contact->phone}}
                                                    @else
                                                        {{"-"}}
                                                    @endif
                                                </h6>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="d-flex mt-4">
                                            <div class="flex-grow-1 overflow-hidden">
                                                <p class="mb-1">Sexe :</p>
                                                <h6 class="text-truncate mb-0">
                                                    @if($infos->contact->sexe != NULL)
                                                        {{$infos->contact->sexe}}
                                                    @else
                                                        {{"-"}}
                                                    @endif
                                                </h6>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="d-flex mt-4">
                                            <div class="flex-grow-1 overflow-hidden">
                                                <p class="mb-1">Date of birth :</p>
                                                <h6 class="text-truncate mb-0">
                                                    @if($infos->contact->date_birth != NULL)
                                                        {{$infos->contact->date_birth}}
                                                    @else
                                                        {{"-"}}
                                                    @endif
                                                </h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane active" id="edit-profile" role="tabpanel">
                <div class="row">
                    <div class="col-xxl-12">
                        <div class="card">
                            <div class="card-body">
                                <form action="{{url('/settings/users/updUser')}}" method="post" id="from-upd-user" enctype="multipart/form-data">
                                    @csrf
                                    <div>
                                        <h5 class="mb-1">Contact Informations</h5>
                                    </div>
                                    <div class="row gy-4 mb-4">
                                        <div class="col-xxl-3 col-md-6">
                                            <div>
                                                <label for="first_name" class="form-label">First name <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" id="first_name" name="contact[first_name]" placeholder="First name" value="{{$infos->contact->first_name}}">
                                                <div class="invalid-feedback"></div>
                                            </div>
                                        </div>  
                                        <div class="col-xxl-3 col-md-6">
                                            <div>
                                                <label for="last_name" class="form-label">Last name <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" id="last_name" name="contact[last_name]" placeholder="Last name" value="{{$infos->contact->last_name}}">
                                                <div class="invalid-feedback"></div>
                                            </div>
                                        </div>  
                                        <div class="col-xxl-3 col-md-6">
                                            <div>
                                                <label for="email" class="form-label">E-mail <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" id="email" name="contact[email]" placeholder="E-mail" value="{{$infos->contact->email}}">
                                                <div class="invalid-feedback"></div>
                                            </div>
                                        </div>  
                                        <div class="col-xxl-3 col-md-6">
                                            <div>
                                                <label for="phone" class="form-label">Phone number</label>
                                                <input type="text" class="form-control" id="phone" name="contact[phone]" placeholder="Phone number" value="{{$infos->contact->phone}}">
                                                <div class="invalid-feedback"></div>
                                            </div>
                                        </div> 
                                        <div class="col-xxl-3 col-md-6">
                                            <div>
                                                <label for="date_birth" class="form-label">Date of birth</label>
                                                <input type="date" class="form-control" id="date_birth" name="contact[date_birth]" value="{{$infos->contact->date_birth}}">
                                            </div>
                                        </div> 
                                        <div class="col-xxl-3 col-md-6">
                                            <label class="form-label">Sexe</label>
                                            <div class="form-check mb-2">
                                                <input class="form-check-input" type="radio" name="contact[sexe]" id="sexe-1" value="Mr" @if(isset($infos->contact->sexe) && $infos->contact->sexe == "Mr") {{"checked"}} @endif>
                                                <label class="form-check-label" for="sexe-1">
                                                    Mr
                                                </label>
                                            </div>                            
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="contact[sexe]" id="sexe-2" value="Miss"  @if(isset($infos->contact->sexe) && $infos->contact->sexe == "Miss") {{"checked"}} @endif>
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
                                                <input type="text" class="form-control" id="username" name="user[username]" placeholder="Username" value="{{$infos->username}}">
                                                <div class="invalid-feedback"></div>
                                            </div>
                                        </div>   
                                        <div class="col-xxl-3 col-md-6">
                                            <div>
                                                <label for="role" class="form-label">Role <span class="text-danger">*</span></label>
                                                <select class="form-control" data-choices name="user[role_id]" id="role">
                                                    <option value="">Chose a role</option>
                                                    @foreach ($roles as $item)
                                                        <option value="{{$item->id}}" @if($item->id == $infos->role_id) {{"selected"}} @endif>{{$item->name}}</option>
                                                     @endforeach
                                                </select>
                                                <div class="invalid-feedback"></div>
                                            </div>
                                        </div>     
                                        <div class="col-xxl-3 col-md-6">
                                            <label class="form-label">Status</label>
                                            <div class="form-check mb-2">
                                                <input class="form-check-input input-status" type="radio" name="user[status]" id="status-1" value="{{$status['active']}}" @if(isset($infos->status) && $infos->status == "1") {{"checked"}} @endif>
                                                <label class="form-check-label" for="status-1">
                                                    {{ucfirst(array_keys($status, 1)[0])}}
                                                </label>
                                            </div>                            
                                            <div class="form-check">
                                                <input class="form-check-input input-status" type="radio" name="user[status]" id="status-2" value="{{$status['deactivated']}}"  @if(isset($infos->status) && $infos->status == "3") {{"checked"}} @endif>
                                                <label class="form-check-label" for="status-2">
                                                    {{ucfirst(array_keys($status, 3)[0])}}
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
                                                <img class="img-thumbnail rounded-circle avatar-xl profil_pic" alt="200x200" src="@if($infos->profil_pic!=NULL){{asset($public_path.'users/'.$infos->profil_pic)}}@else{{asset('assets/images/users/user-dummy-img.jpg')}}@endif" data-holder-rendered="true">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row gy-4 mb-4">
                                        <div class="col-xxl-3 col-md-6">
                                            <button type="button" onclick="handle_upd()" class="btn btn-info">Edit</button>
                                        </div>
                                    </div>
                                    <input type="hidden" name="refs" value="{{implode(',',[$infos->id,$infos->contact->id])}}">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
    <script src="{{asset('assets/js/plugins.js')}}"></script>
    <script src="{{asset('assets/js/app/settings/user.js')}}"></script>
@endsection