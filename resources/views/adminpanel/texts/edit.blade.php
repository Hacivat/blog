@extends('adminpanel/template')

@section('content')

    {!! Form::open(['route' => ['texts.update', $text->id], 'method' => 'PUT', 'files' => true]) !!}
    <div class="card mb-4">
        <div class="card-header bg-white font-weight-bold">
             # {{$text->id}} ID'li Yazı Düzenleniyor...
        </div>
        <div class="card-body">
            <form>
                <div class="form-group">
                    <input type="text" class="form-control" id="exampleInputEmail1" name="title" aria-describedby="emailHelp" value="{!! $text->title !!}" required>
                </div>
                <div class="form-group">
                    <select class="form-control" id="exampleFormControlSelect1" name="cat_id" required>
                        @foreach($categories as $category)
                            <option value="{{$category->id}}">{{$category->title}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <textarea id="contentText" class="form-control" name="content" rows="3" required>{!! $text->content !!}</textarea>
                </div>


                <div class="form-check">
                    @if($text->image)
                        <input class="form-check-input" type="checkbox" value="1" name="deleteimage" id="defaultCheck1">
                    @else
                        <input class="form-check-input" disabled type="checkbox" value="1" name="deleteimage" id="defaultCheck1">
                    @endif
                    <label class="form-check-label" for="defaultCheck1">
                        Resmi Kaldır
                    </label>
                </div>
                <div class="form-group">

                    <input type="file" class="form-control" name="image" onchange="readURL(this);" />
                    <img id="blah" class="form-control" @if($text->image != null) src="{{asset('uploads/images/'.$text->image)}}" @else src="http://placehold.it/180" @endif  alt="your image" />
                </div>
            </form>
        </div>
        <div class="card-footer bg-white">
            {!! Form::submit('Değiştir', ['class' => 'btn btn-primary']) !!}
        </div>
    </div>
    {!! Form::close() !!}

@endsection

@section('internalcss')
    img{
    max-width:180px;
    }
    input[type=file]{
    padding:10px;
    }
@endsection

@section('css')
    <link rel="stylesheet" href="/adminpanel/trumbowyg/dist/ui/trumbowyg.min.css">
    <link rel="stylesheet" href="/adminpanel/trumbowyg/dist/plugins/colors/ui/trumbowyg.colors.min.css">
@endsection

@section('js')
    <script src="//ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="/adminpanel/trumbowyg/dist/trumbowyg.min.js"></script>
    <script>window.jQuery || document.write('<script src="/adminpanel/js/vendor/jquery-3.2.1.min.js"><\/script>')</script>
    <script src="/adminpanel/trumbowyg/dist/plugins/colors/trumbowyg.colors.min.js"></script>

    <script>
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#blah')
                        .attr('src', e.target.result);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>

    <script>
        $('#contentText').trumbowyg({
            lang: 'tr',
            btns: [['viewHTML'],
                ['undo', 'redo'],
                ['formatting'],
                ['bold', 'italic', 'underline', 'strikethrough'],
                'btnGrp-semantic',
                ['superscript', 'subscript'],
                ['link'],
                ['insertImage'],
                'btnGrp-justify',
                'btnGrp-lists',
                ['foreColor', 'backColor'],
                ['horizontalRule'],
                ['justifyLeft', 'justifyCenter', 'justifyRight', 'justifyFull'],
                ['unorderedList', 'orderedList'],
                ['removeformat'],
                ['fullscreen'],
            ]
        });
    </script>
@endsection