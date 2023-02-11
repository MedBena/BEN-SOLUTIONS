@php
    $title = "Users";
@endphp
@extends('layout.index')
@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header align-items-center d-flex">
                <h5 class="card-title mb-0 flex-grow-1">{{$title}}</h5>
                <div class="flex-shrink-0">
                    <a href="{{url('/settings/users/add')}}" class="btn btn-soft-info btn-sm">
                        <i class="ri-add-circle-line align-middle"></i> Add user
                    </a>
                    <a href="{{url('/settings/users/trash')}}" class="btn btn-soft-danger btn-sm">
                        <i class="ri-delete-bin-line align-middle"></i> Trash
                    </a>
                </div>
            </div>
            <div class="card-body">
               <div class="table-responsive">
                <table id="buttons-datatables" class="display table table-bordered table-nowrap" style="width:100%">
                    <thead>
                        <tr>
                            <th>REF</th>
                            <th>Username</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>E-mail</th>
                            <th>Status</th>
                            <th>Created</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $item)
                            <tr>
                                <td>{{"U-".$item->id}}</td>
                                <td>{{$item->username}}</td>
                                <td>{{$item->contact->first_name}}</td>
                                <td>{{$item->contact->last_name}}</td>
                                <td>{{$item->contact->email}}</td>
                                <td>{!! $item->get_statut() !!}</td>
                                <td>{{date('d/m/Y h:i',strtotime($item->created_at))}}</td>
                                <td>
                                    <div class="hstack gap-3 flex-wrap">
                                        <a href="{{url('/settings/users/view/'.$item->id)}}" class="btn btn-sm btn-soft-info">Details</a>
                                        <a href="{{url('/settings/users/update/'.$item->id)}}" class="link-success fs-15"><i class="ri-edit-2-line"></i></a>
                                        <a href="javascript:void(0);" onclick="DeleteWithUrl('{{url('/settings/users/delete/'.$item->id)}}');" class="link-danger fs-15"><i class="ri-delete-bin-line"></i></a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
    <script src="{{asset('assets/js/app/settings/user.js')}}"></script>
@endsection