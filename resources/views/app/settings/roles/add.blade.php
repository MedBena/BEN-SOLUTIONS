@php
    $title = "Add Role";
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
                <form action="{{url('/settings/roles/addRole')}}" method="post" id="from-add-role">
                    @csrf
                    <div class="row gy-4 mb-4">
                        <div class="col-xxl-3 col-md-6">
                            <div>
                                <label for="name" class="form-label">Name <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="name" name="role[name]" placeholder="Name">
                                <div class="invalid-feedback"></div>
                            </div>
                        </div>
                    </div>
                    <div class="row gy-4 mb-4">
                        <div class="col-xxl-3 col-md-6">
                            <div>
                                <label for="description" class="form-label">Description</label>
                                <textarea class="form-control" id="description" rows="3" placeholder="Description" name="role[description]"></textarea>
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
    <script src="{{asset('assets/js/app/settings/roles.js')}}"></script>
@endsection