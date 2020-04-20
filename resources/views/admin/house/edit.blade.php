@extends('backend.layouts.app')

@section('title', 'Edit House')

@push('styles')

    <link rel="stylesheet" href="{{asset('backend/plugins/bootstrap-select/css/bootstrap-select.css')}}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.5/css/fileinput.min.css" media="all" rel="stylesheet" type="text/css" />

@endpush


@section('content')
    <style>
        .img-responsive {
            width: 100%%;
            height: 180px;
        }
    </style>

    <div class="block-header"></div>

    <div class="row clearfix">
        <form action="{{route('admin.house.update',$house->slug)}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12 col-md-offset-2 col-lg-offset-2">
            <div class="card">
                <div class="header bg-indigo">
                    <h2>Edit HOUSE</h2>
                </div>
                <div class="body">

                    <div class="form-group form-float">
                        <div class="form-line">
                            <input type="text" name="title" class="form-control" value="{{$house->title}}">
                            <label class="form-label">House Title</label>
                        </div>
                    </div>
                    <?php
                        $buildings = DB::table('buildings')->select('title', 'id')->get();
                    ?>
                    <div class="form-group">
                        <select name="building" class="form-control show-tick">
                            <option value="">-- Select Building --</option>
                            @foreach($buildings as $val)
                            <option value="{{$val->id}}"<?php echo ($val->id == $house->building) ? "selected" : ''; ?>>{{$val->title}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group form-float">
                        <div class="form-line">
                            <input type="number" name="price" class="form-control" value="{{$house->price}}">
                            <label class="form-label">Price</label>
                        </div>
                        <div class="help-info">US Dollar</div>
                    </div>

                    <div class="form-group form-float">
                        <div class="form-line">
                            <input type="number" class="form-control" name="area" value="{{$house->area}}">
                            <label class="form-label">Area</label>
                        </div>
                        <div class="help-info">Square Feet</div>
                    </div>

                    <div class="form-group form-float">
                        <div class="form-line">
                            <input type="number" class="form-control" name="capacity" value="{{$house->capacity}}">
                            <label class="form-label">Capacity</label>
                        </div>
                    </div>

                    <div class="form-group form-float">
                        <div class="form-line">
                            <input type="number" class="form-control" name="bedroom" value="{{$house->bedroom}}">
                            <label class="form-label">Bedroom</label>
                        </div>
                    </div>

                    <div class="form-group form-float">
                        <div class="form-line">
                            <input type="number" class="form-control" name="bathroom" value="{{$house->bathroom}}">
                            <label class="form-label">Bathroom</label>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="tinymce">Description</label>
                        <textarea name="description" id="tinymce">{{$house->description}}</textarea>
                    </div>

                </div>
            </div>

            <div class="card">
                <div class="header bg-red">
                    <h2>GALLERY IMAGE</h2>
                </div>
                <div class="body">
                    <div class="gallery-box" id="gallerybox">
                        @foreach($house->gallery as $gallery)
                        <div class="gallery-image-edit" id="gallery-{{$gallery->id}}">
                            <button type="button" data-id="{{$gallery->id}}" class="btn btn-danger btn-sm"><i class="material-icons">delete_forever</i></button>
                            <img class="img-responsive" src="{{Storage::url('house/gallery/'.$gallery->name)}}" alt="{{$gallery->name}}">
                        </div>
                        @endforeach
                    </div>
                    <div class="gallery-box">
                        <hr>
                        <input type="file" name="gallaryimage[]" value="UPLOAD" id="gallaryimageupload" multiple>
                        <input type="hidden" name="GallaryImage" id="gallaryimageupload_hidden" <?php echo (count($house->gallery) > 0 ? 'value="OK"' : ""); ?>>
                        <button type="button" class="btn btn-info btn-lg right" id="galleryuploadbutton">UPLOAD GALLERY IMAGE</button>
                    </div>
                </div>
            </div>
            {{-- BUTTON --}}
            <div class="form-group" style="text-align: center;">
                <a href="{{route('admin.house.index')}}" class="btn btn-danger btn-lg m-t-15 waves-effect">
                    <i class="material-icons left">arrow_back</i>
                    <span>BACK</span>
                </a>

                <button type="submit" class="btn btn-indigo btn-lg m-t-15 waves-effect">
                    <i class="material-icons">save</i>
                    <span>SAVE</span>
                </button>
            </div>
        </div>
        </form>
    </div>
    

@endsection


@push('scripts')

    <script src="{{ asset('backend/plugins/bootstrap-select/js/bootstrap-select.js') }}"></script>

    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        // DELETE HOUSE GALLERY IMAGE
        $('.gallery-image-edit button').on('click',function(e){
            e.preventDefault();
            var id = $(this).data('id');
            var image = $('#gallery-'+id+' img').attr('alt');
            $.post("{{route('admin.gallery-remove')}}",{id:id,image:image},function(data){
                if(data.msg == true){
                    $('#gallery-'+id).remove();
                }
            });
        });

        $(function() {
            // Multiple images preview in browser
            var imagesPreview = function(input, placeToInsertImagePreview) {

                if (input.files) {
                    var filesAmount = input.files.length;

                    for (i = 0; i < filesAmount; i++) {
                        var reader = new FileReader();

                        reader.onload = function(event) {
                            $("#gallaryimageupload_hidden").val("OK");
                            $('<div class="gallery-image-edit not-uploaded" id="gallery-perview-'+i+'"><img src="'+event.target.result+'" class="img-responsive img-rounded"/></div>').appendTo(placeToInsertImagePreview);
                        }

                        reader.readAsDataURL(input.files[i]);
                    }
                }

            };

            $('#gallaryimageupload').on('change', function() {
                $("#gallaryimageupload_hidden").val("");
                $(".not-uploaded").remove();
                imagesPreview(this, 'div#gallerybox');
            });
        });

        $(document).on('click','#galleryuploadbutton',function(e){
            e.preventDefault();
            $('#gallaryimageupload').click();
        })

    </script>

    <script src="{{asset('backend/plugins/tinymce/tinymce.js')}}"></script>
    <script>
        $(function () {
            tinymce.init({
                selector: "textarea#tinymce",
                theme: "modern",
                height: 300,
                plugins: [
                    'advlist autolink lists link image charmap print preview hr anchor pagebreak',
                    'searchreplace wordcount visualblocks visualchars code fullscreen',
                    'insertdatetime media nonbreaking save table contextmenu directionality',
                    'emoticons template paste textcolor colorpicker textpattern imagetools'
                ],
                toolbar1: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
                toolbar2: 'print preview media | forecolor backcolor emoticons',
                image_advtab: true
            });
            tinymce.suffix = ".min";
            tinyMCE.baseURL = '{{asset('backend/plugins/tinymce')}}';
        });

        $(function () {
            tinymce.init({
                selector: "textarea#tinymce-nearby",
                theme: "modern",
                height: 300,
                plugins: [
                    'advlist autolink lists link image charmap print preview hr anchor pagebreak',
                    'searchreplace wordcount visualblocks visualchars code fullscreen',
                    'insertdatetime media nonbreaking save table contextmenu directionality',
                    'emoticons template paste textcolor colorpicker textpattern imagetools'
                ],
                toolbar1: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
                toolbar2: '',
                image_advtab: true
            });
            tinymce.suffix = ".min";
            tinyMCE.baseURL = '{{asset('backend/plugins/tinymce')}}';
        });
    </script>

@endpush
