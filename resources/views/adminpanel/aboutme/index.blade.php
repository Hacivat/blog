@extends('adminpanel/template')

@section('content')
    {!! Form::open(['route' => ['aboutme.update', $user->id], 'method' => 'PUT', 'files' => true]) !!}
    <div class="card mb-4">
        <div class="card-header bg-white font-weight-bold">
            Hakkımda
        </div>
        <div class="card-body">
            <form>
                <label for="exampleInputEmail1">İsim</label>
                <div class="form-group">
                    <input type="text" class="form-control" id="exampleInputEmail1" name="name" aria-describedby="emailHelp" value="{!! $user->name !!}" required>
                </div>

                <label for="exampleFormControlInput1">E-mail</label>
                <div class="form-group">
                    <input type="email" class="form-control" name="email" id="exampleFormControlInput1" value="{!! $user->email !!}">
                </div>


                <label for="date">Doğum Tarihi</label>
                <div class="form-group" id="date">
                    <input type="date" class="form-control" name="dob" id="exampleFormControlInput1" value="{!! $user->dob !!}">
                </div>

                <label for="job">Meslek</label>
                <div class="form-group">
                    <input type="text" class="form-control" id="job" name="job" aria-describedby="emailHelp" value="{!! $user->job !!}" required>
                </div>

                <label for="aboutme">Hakkımda</label>
                <div class="form-group">
                    <textarea id="contentText" id="aboutme" name="aboutme" class="form-control" name="content" rows="3" required>{!! $user->about_me !!}</textarea>
                </div>
                <label for="pp">Profil Fotoğrafı</label>
                <div class="form-group" id="pp">
                    <input type="file" class="form-control" name="image" onchange="readURL(this);"/>
                    <img @if($user->image != null || $user->image != '') src="{{asset('uploads/profiles/'.$user->image)}}" id="blah" class="form-control" style="height: 90px; width: 90px; border-radius: 50%;"  alt="your image" @endif />
                </div>

                <label for="job">Sosyal Linkler</label>
                <div class="form-group">
                    <input type="text" class="form-control" id="facebook" name="facebook" placeholder="Facebook" value="{!! $user->facebook !!}">
                    <input type="text" class="form-control" id="twitter" name="twitter" placeholder="Twitter" value="{!! $user->twitter !!}">
                    <input type="text" class="form-control" id="instagram" name="instagram" placeholder="Instagram" value="{!! $user->instagram !!}">
                    <input type="text" class="form-control" id="github" name="github" placeholder="Github" value="{!! $user->github !!}">
                    <input type="text" class="form-control" id="linkedin" name="linkedin" placeholder="Linkedin" value="{!! $user->linkedin !!}">
                    <input type="text" class="form-control" id="google" name="google" placeholder="Google" value="{!! $user->google !!}">
                    <input type="text" class="form-control" id="reddit" name="reddit" placeholder="Reddit" value="{!! $user->reddit !!}">
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