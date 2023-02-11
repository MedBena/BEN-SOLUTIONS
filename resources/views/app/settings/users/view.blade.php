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
                                <div class="me-2"><i class="ri-map-pin-user-line me-1 fs-16 align-middle"></i>Phoenix, USA</div>
                                <div>
                                    <i class="ri-building-line me-1 fs-16 align-middle"></i>Themesbrand
                                </div>
                            </div>
                            <p>Product visual designer, expert in UI design</p>
                        </div>
                        <div class="col-xl-3 col-lg-5">
                            <div>
                                <p class="text-muted fw-medium mb-2">Language Knows</p>
                                <ul class="list-inline mb-4">
                                    <li class="list-inline-item">
                                        <span class="badge badge-soft-info">English</span>
                                    </li>
                                    <li class="list-inline-item">
                                        <span class="badge badge-soft-info">Russian</span>
                                    </li>
                                    <li class="list-inline-item">
                                        <span class="badge badge-soft-info">Chinese</span>
                                    </li>
                                </ul>
                            </div>

                            <div>
                                <p class="text-muted fw-medium mb-2">Featured Skills</p>
                                <ul class="d-flex gap-2 flex-wrap list-unstyled mb-0">
                                    <li>
                                        <span class="badge badge-soft-dark">Business Marketing</span>
                                    </li>
                                    <li>
                                        <span class="badge badge-soft-dark">Google Ads Management</span>
                                    </li>
                                    <li>
                                        <span class="badge badge-soft-dark">Social Ads Management</span>
                                    </li>
                                    <li>
                                        <span class="badge badge-soft-dark">Content SEO</span>
                                    </li>
                                </ul>
                            </div>
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
                            <a class="nav-link fs-14" data-bs-toggle="tab" href="#activities" role="tab">
                                <i class="ri-list-unordered d-inline-block d-md-none"></i> <span class="d-none d-md-inline-block">Activities</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link fs-14" data-bs-toggle="tab" href="#projects" role="tab">
                                <i class="ri-price-tag-line d-inline-block d-md-none"></i> <span class="d-none d-md-inline-block">Projects</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link fs-14" data-bs-toggle="tab" href="#friends" role="tab">
                                <i class="ri-folder-4-line d-inline-block d-md-none"></i> <span class="d-none d-md-inline-block">Friends</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link fs-14" data-bs-toggle="tab" href="#documents" role="tab">
                                <i class="ri-folder-4-line d-inline-block d-md-none"></i> <span class="d-none d-md-inline-block">Documents</span>
                            </a>
                        </li>
                    </ul>
                    </div>
                    <div class="col-lg-auto order-lg-2">
                        <a href="pages-profile-settings.html" class="btn btn-secondary"><i class="ri-edit-box-line align-bottom"></i> Edit Profile</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="tab-content text-muted">
            <div class="tab-pane active" id="overview-tab" role="tabpanel">
                <div class="row">
                    <div class="col-xxl-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-1">
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
                                    <div class="col-md-1">
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
                                    <div class="col-md-1">
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
        </div>
    </div>
</div>
@endsection