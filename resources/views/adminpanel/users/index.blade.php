@extends('adminpanel/template')

@section('content')
    <div class="card-body">
        <div class="float-right">
            <a href="{{route('register')}}" class="btn btn-primary btn-lg pull-right ">Yazar Ekle</a>
        </div>
        <div id="example_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4 no-footer"><div class="row"><div class="col-sm-12 col-md-6"><div class="dataTables_length" id="example_length"><label>Show <select name="example_length" aria-controls="example" class="form-control form-control-sm"><option value="5">5</option><option value="10">10</option><option value="25">25</option><option value="50">50</option><option value="100">100</option><option value="250">250</option><option value="500">500</option></select> entries</label></div></div><div class="col-sm-12 col-md-6"><div id="example_filter" class="dataTables_filter"><label><input type="search" class="form-control form-control-sm" placeholder="Search" aria-controls="example"></label><button type="button" class="btn btn-link btn-sm btn-icon ml-2 mb-1" data-toggle="tooltip" title="" data-original-title="Search"><i class="fa fa-fw fa-search"></i></button><button type="button" class="btn btn-link btn-sm btn-icon mb-1" data-toggle="tooltip" title="Reset"><i class="fa fa-fw fa-undo"></i></button></div></div></div><div class="row"><div class="col-sm-12"><table id="example" class="table table-hover dataTable no-footer dtr-inline" cellspacing="0" width="100%" role="grid" aria-describedby="example_info" style="width: 100%;">
            <thead>
            <tr role="row"><th class="sorting_asc" tabindex="0" aria-controls="example" rowspan="1" colspan="1" style="width: 86.5px;" aria-sort="ascending" aria-label="">ID</th>
                <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" style="width: 141.5px;" aria-label="">İsim</th>
                <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" style="width: 59.5px;" aria-label="">E-Mail</th>
                <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" style="width: 47.5px;" aria-label="">Doğum Tarihi</th>
                <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" style="width: 47.5px;" aria-label="">Kayıt Tarihi</th>

                <th class="sorting" rowspan="1" colspan="1" style="width: 71px;" aria-label=""></th></tr>
            </thead>
            <tbody>
            @foreach($users as $user)
                {!! Form::open(['route' => ['users.destroy', $user->id], 'method' => 'DELETE']) !!}
                <tr role="row" class="odd">
                    <td tabindex="0" class="sorting_1">{{$user->id}}</td>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->dob}}</td>
                    <td>{{$user->created_at}}</td>
                    <td class=" actions">
                        <a href="{{route('users.edit', $user->id)}}" class="btn btn-icon btn-pill btn-primary" data-toggle="tooltip" title="" data-original-title="Edit"><i class="fa fa-fw fa-edit"></i></a>
                        {!! Form::button('<i class="fa fa-fw fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-icon btn-pill btn-danger', 'title' => 'delete']) !!}
                    </td>
                </tr>
                {!! Form::close() !!}
            @endforeach
            </tbody>
        </table><div id="example_processing" class="dataTables_processing card" style="display: none;">Processing...</div></div></div><div class="row"><div class="col-sm-12 col-md-5"><div class="dataTables_info" id="example_info" role="status" aria-live="polite">Showing 1 to 25 of 57 entries</div></div><div class="col-sm-12 col-md-7"><div class="dataTables_paginate paging_simple_numbers" id="example_paginate"><ul class="pagination"><li class="paginate_button page-item previous disabled" id="example_previous"><a href="#" aria-controls="example" data-dt-idx="0" tabindex="0" class="page-link">Previous</a></li><li class="paginate_button page-item active"><a href="#" aria-controls="example" data-dt-idx="1" tabindex="0" class="page-link">1</a></li><li class="paginate_button page-item "><a href="#" aria-controls="example" data-dt-idx="2" tabindex="0" class="page-link">2</a></li><li class="paginate_button page-item "><a href="#" aria-controls="example" data-dt-idx="3" tabindex="0" class="page-link">3</a></li><li class="paginate_button page-item next" id="example_next"><a href="#" aria-controls="example" data-dt-idx="4" tabindex="0" class="page-link">Next</a></li></ul></div></div></div></div>
</div>
@endsection

@section('css')
@endsection

@section('js')
@endsection