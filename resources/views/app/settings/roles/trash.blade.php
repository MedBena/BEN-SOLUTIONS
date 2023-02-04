@php
    $title = "Trash - Roles";
@endphp
@extends('layout.index')
@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header align-items-center d-flex">
                <h5 class="card-title mb-0 flex-grow-1">{{$title}}</h5>
                <div class="flex-shrink-0">
                    <a href="{{url('/settings/roles/list')}}" class="btn btn-soft-info btn-sm">
                        <i class=" ri-eye-line align-middle"></i> List role
                    </a>
                </div>
            </div>
            <div class="card-body">
               <div class="table-responsive">
                <table id="roles-datatables" class="display table table-bordered table-nowrap" style="width:100%">
                    <thead>
                        <tr>
                            <th>REF</th>
                            <th>Title</th>
                            <th>Deleted By</th>
                            <th>Deleted At</th>
                            <th>Created At</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($roles as $item)
                            <tr>
                                <td>{{"R-".$item->id}}</td>
                                <td>{{$item->name}}</td>
                                <td>{{$item->deletedBy()}}</td>                                
                                <td>{{date('d/m/Y h:i',strtotime($item->deleted_at))}}</td>
                                <td>{{date('d/m/Y h:i',strtotime($item->created_at))}}</td>
                                <td>
                                    <div class="hstack gap-3 flex-wrap">
                                        <a href="{{url('/settings/roles/view/'.$item->id)}}" class="btn btn-sm btn-soft-info">Details</a>
                                        <a href="{{url('/settings/roles/update/'.$item->id)}}" class="link-success fs-15"><i class="ri-edit-2-line"></i></a>
                                        <a href="{{url('/settings/roles/get-back/'.$item->id)}}" class="link-warning fs-15"><i class="ri-arrow-go-back-line"></i></a>
                                        <a href="javascript:void(0);" onclick="DeleteWithUrl('{{url('/settings/roles/delete/'.$item->id.'/'.true)}}');" class="link-danger fs-15"><i class="ri-delete-bin-line"></i></a>
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
    <script src="{{asset('assets/js/app/settings/roles.js')}}"></script>
@endsection