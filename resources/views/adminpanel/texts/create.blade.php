@extends('adminpanel/template')
@section('content')

    {!! Form::open(['route' => ['texts.store'], 'method' => 'POST', 'files' => true]) !!}
    <div class="card mb-4">
        <div class="card-header bg-white font-weight-bold">
            Yazı Ekleniyor...
        </div>
        <div class="card-body">
            <form>
                <div class="form-group">
                    <input type="text" class="form-control" name="titlePosted" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Başlık Giriniz..." required>
                </div>


                <div class="form-group">
                    <select class="form-control" id="exampleFormControlSelect1" name="catIdPosted" required>
                        @foreach($categories as $category)
                            <option value="{{$category->id}}">{{$category->title}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <textarea id="contentText" class="form-control" name="contentPosted" rows="3" placeholder="İçerik Giriniz..." required></textarea>
                </div>


                <div class="form-group">
                    <input type="file" class="form-control" name="image" onchange="readURL(this);" />
                    <img id="blah" class="form-control" src="http://placehold.it/180" alt="your image" />
                </div>
                <div class="card-footer bg-white">
                    {!! Form::submit('Ekle', ['class' => 'btn btn-primary']) !!}
                </div>
            </form>
        </div>
    </div>
    {!! Form::close() !!}
@endsection

@section('css')
    <link href="/adminpanel/imageupload/dist/css/bootstrap-imageupload.css" rel="stylesheet">
    <link rel="stylesheet" href="/adminpanel/trumbowyg/dist/ui/trumbowyg.min.css">
@endsection

@section('internalcss')
    img{
    max-width:180px;
    }
    input[type=file]{
    padding:10px;
    }
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