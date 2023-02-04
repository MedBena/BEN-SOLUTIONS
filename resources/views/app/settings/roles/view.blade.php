@php
    $title = "Roles - Details";
@endphp
@extends('layout.index')
@section('content')
    <div class="row">
        <div class="col-xxl-12">
            <div class="card overflow-hidden">
                <div class="card-body">
                    <div class="table-card table-responsive">
                        <table class="table mb-0">
                            <tbody>
                                <tr>
                                    <th style="width:110px;">Name</th>
                                    <td class="text-muted">{{$infos->name}}</td>
                                </tr>
                                <tr>
                                    <th style="width:110px;">Description</th>
                                    <td class="text-muted">{{$infos->description}}</td>
                                </tr>
                                <tr>
                                    <th style="width:110px;">Created by</th>
                                    <td class="text-muted">{{$infos->createdBy()}} - <small>{{date('d/m/Y H:i',strtotime($infos->created_at))}}</small></td>
                                </tr>
                                <tr>
                                    <th style="width:110px;">Updated by</th>
                                    <td class="text-muted">{{$infos->updatedBy()}} - <small>{{date('d/m/Y H:i',strtotime($infos->updated_at))}}</small></td>
                                </tr>
                                @if ($infos->deleted_by!=NULL)
                                    <tr>
                                        <th style="width:110px;">Deleted by</th>
                                        <td class="text-muted">{{$infos->deletedBy()}} - <small>{{date('d/m/Y H:i',strtotime($infos->updated_at))}}</small></td>
                                    </tr>    
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script src="{{asset('assets/js/app/settings/roles.js')}}"></script>
@endsection