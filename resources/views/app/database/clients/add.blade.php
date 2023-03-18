@php
    $title = "Add client";
@endphp
@extends('layout.index')
@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header  align-items-center d-flex">
                <h4 class="card-title mb-0  flex-grow-1">{{$title}}</h4>
                <div class="flex-shrink-0">
                    <a href="{{url('/database/clients/list')}}" class="btn btn-soft-info btn-sm">
                        <i class="ri-add-circle-line align-middle"></i> List clients
                    </a>
                    <a href="{{url('/database/clients/trash')}}" class="btn btn-soft-danger btn-sm">
                        <i class="ri-delete-bin-line align-middle"></i> Trash
                    </a>
                </div>
            </div>
            <div class="card-body">
                <form action="{{url('/database/clients/addClient')}}" method="post" id="from-add-client" enctype="multipart/form-data">
                    @csrf
                    <div>
                        <h5 class="mb-1">Contact Informations</h5>
                    </div>
                    {{-- <div class="row gy-4 mb-4">
                        <div class="col-xxl-3 col-md-6">
                            <div>
                                <label for="" class="form-label"> <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="" name="[]" placeholder="">
                                <div class="invalid-feedback"></div>
                            </div>
                        </div>  
                        <div class="col-xxl-3 col-md-6">
                            <label class="form-label"></label>
                            <div class="form-check mb-2">
                                <input class="form-check-input" type="radio" name="[]" id="-1" value="">
                                <label class="form-check-label" for="-1">
                                    
                                </label>
                            </div>                            
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="[]" id="-2" value="">
                                <label class="form-check-label" for="-2">
                                    
                                </label>
                            </div> 
                        </div> 
                        <div class="col-xxl-3 col-md-6">
                            <div>
                                <label for="" class="form-label"> <span class="text-danger">*</span></label>
                                <select class="form-control" data-choices name="[]" id="">
                                    <option value="">Chose a </option>
                                </select>
                                <div class="invalid-feedback"></div>
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
                                    <img class="img-thumbnail rounded-circle avatar-xl profil_pic" alt="200x200" src="{{asset('assets/images/clients/user-dummy-img.jpg')}}" data-holder-rendered="true">
                                </div>
                            </div>
                        </div>  
                        <div class="row gy-4 mb-4">
                            <div class="col-xxl-3 col-md-6">
                                <button type="button" onclick="handle_add()" class="btn btn-info">Add</button>
                            </div>
                        </div> 
                    </div> --}}
                    
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
    <script src="{{asset('assets/js/app/database/clients.js')}}"></script>
@endsection