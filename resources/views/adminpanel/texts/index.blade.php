@extends('adminpanel/template')

@section('content')
    <div class="card-body">
        <div class="float-right">
            <a href="{{route('texts.create')}}" class="btn btn-primary btn-lg pull-right ">Yazı Ekle</a>
        </div>
        <div id="example_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4 no-footer">
            <div class="row">
                <form action="{{route('texts.search')}}" method="post">
                    {{csrf_field()}}
                    <div class="col-sm-12 col-md-6"><div id="example_filter" class="dataTables_filter">
                            <label>
                                <input type="search" name="search" class="form-control form-control-sm" placeholder="Search" aria-controls="example">
                            </label>
                                <button type="submit"  class="btn btn-link btn-sm btn-icon ml-2 mb-1" data-toggle="tooltip" title="" data-original-title="Search"><i class="fa fa-fw fa-search"></i>
                            </button>
                        </div>
                    </div>
                </form>

            </div>
            <div class="row"><div class="col-sm-12">
                    <table id="example" class="table table-hover dataTable no-footer dtr-inline" cellspacing="0" width="100%" role="grid" aria-describedby="example_info" style="width: 100%;">
            <thead>
            <tr role="row"><th class="sorting_asc" tabindex="0" aria-controls="example" rowspan="1" colspan="1" style="width: 86.5px;" aria-sort="ascending" aria-label="">ID</th><th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" style="width: 141.5px;" aria-label="">Başlık</th><th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" style="width: 59.5px;" aria-label="">Yazı</th><th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" style="width: 47.5px;" aria-label="">Resim</th><th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" style="width: 47.5px;" aria-label="">Kategori</th><th class="sorting" rowspan="1" colspan="1" style="width: 71px;" aria-label="">Yazar</th><th class="sorting" rowspan="1" colspan="1" style="width: 71px;" aria-label="">Slider</th><th class="sorting" rowspan="1" colspan="1" style="width: 71px;" aria-label=""></th></tr>
            </thead>
            <tbody>
                @foreach($texts as $text)
                    {!! Form::open(['route' => ['texts.destroy', $text->id], 'method' => 'DELETE']) !!}
                    <tr role="row" class="odd">
                        <td tabindex="0" class="sorting_1">{{$text->id}}</td>
                        <td>{{str_limit($text->title, 10, '...')}}</td>
                        <td>{{str_limit(strip_tags($text->content), 30, '...')}}</td>
                        <td>{{str_limit($text->image, 20, '...')}}</td>
                        <td>{{$text->isCategory->title}}</td>
                        <td>{{$text->isAuthor->name}}</td>
                        <td class="text-center">
                            @if($text->slider == 1)
                                <a href="{{route('texts.slider', ['id' => $text->id])}}" class="btn btn-icon btn-pill btn-success" data-toggle="tooltip" title="" data-original-title="Edit"><i class="fa fa-fw fa-edit"></i></a>
                            @else
                                <a href="{{route('texts.slider', ['id' => $text->id])}}" class="btn btn-icon btn-pill btn-danger" data-toggle="tooltip" title="" data-original-title="Edit"><i class="fa fa-fw fa-edit"></i></a>
                            @endif
                        </td>
                        <td class=" actions">
                            <a href="{{route('texts.edit', $text->id)}}" class="btn btn-icon btn-pill btn-primary" data-toggle="tooltip" title="" data-original-title="Edit"><i class="fa fa-fw fa-edit"></i></a>
                            {!! Form::button('<i class="fa fa-fw fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-icon btn-pill btn-danger', 'title' => 'delete']) !!}
                        </td>
                    </tr>
                    {!! Form::close() !!}
                @endforeach
            </tbody>
        </table><div id="example_processing" class="dataTables_processing card" style="display: none;">Processing...</div></div></div><div class="row"><div class="col-sm-12 col-md-5"><div class="dataTables_info" id="example_info" role="status" aria-live="polite">{{\App\Text::count()}} girdiden {{count($texts)}} adet gösteriliyor</div></div><div class="col-sm-12 col-md-7">
                    <div class="text-center">{{$texts->links()}}</div>                </div></div></div>
    </div>
@endsection

@section('css')
@endsection

@section('js')
@endsection