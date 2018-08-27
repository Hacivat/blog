@extends('adminpanel/template')

@section('content')
    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Başlık</th>
            <th scope="col">Düzenle</th>
            <th scope="col">Kaldır</th>
        </tr>
        </thead>
        <tbody>
        @foreach($categories as $category)
            {!! Form::open(['route' => ['categories.destroy', $category->id], 'method' => 'DELETE']) !!}
            <tr>
                <th scope="row">{{$category->id}}</th>
                <td>{{$category->title}}</td>
                <td>
                    <a href="{{route('categories.edit', $category->id)}}" class="btn btn-icon btn-pill btn-primary" data-toggle="tooltip" title="" data-original-title="Edit"><i class="fa fa-fw fa-edit"></i></a>
                </td>
                <td>
                    {!! Form::button('<i class="fa fa-fw fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-icon btn-pill btn-danger', 'title' => 'delete']) !!}
                </td>
            </tr>
            {!! Form::close() !!}
        @endforeach
        <tr>
            {!! Form::open(['route' => ['categories.store', $category->id], 'method' => 'POST']) !!}
            <th scope="row">#</th>
            <td> <input class="form-control form-control-lg mb-3" type="text" placeholder="Yeni Kategori Giniriz" name="postedCat"></td>
            <td>
                {!! Form::button('Ekle', ['type' => 'submit', 'class' => 'btn btn-primary', 'title' => 'Ekle']) !!}
            </td>
            <td>
            </td>
            {!! Form::close() !!}
        </tr>
        </tbody>
    </table>
@endsection

@section('css')
@endsection

@section('js')
@endsection