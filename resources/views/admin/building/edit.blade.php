@extends('backend.layouts.app')

@section('title', 'Edit Building')

@push('styles')

    <link rel="stylesheet" href="{{asset('backend/plugins/bootstrap-select/css/bootstrap-select.css')}}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.5/css/fileinput.min.css" media="all" rel="stylesheet" type="text/css" />

@endpush


@section('content')

    <style>
        .img-responsive {
            height: 180px;
        }
    </style>

    <div class="block-header"></div>

    <div class="row clearfix">
        <form action="{{route('admin.building.update',$building->slug)}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="col-lg-8 col-md-4 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header bg-indigo">
                    <h2>Edit Building</h2>
                </div>
                <div class="body">
                    <?php
                        $agents = DB::table('users')->where('role_id', 2)->get();
                    ?>
                    <h5>Assigned to </h5>
                    <div class="form-group">
                        <select name="agent" class="form-control show-tick">
                            <option value="">-- Select Agent --</option>
                            @foreach($agents as $val)
                            <option value="{{$val->id}}" <?php echo ($building->agent_id == $val->id) ? 'selected' : '' ?> >{{$val->name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <h5>Building Info</h5>
                    <div class="form-group form-float">
                        <div class="form-line">
                            <input type="text" name="title" class="form-control" value="{{$building->title}}">
                            <label class="form-label">Title</label>
                        </div>
                    </div>

                    <div class="form-group form-float">
                        <div class="form-line">
                            <input type="text" class="form-control" name="city" value="{{$building->city}}">
                            <label class="form-label">City</label>
                        </div>
                    </div>

                    <div class="form-group form-float">
                        <div class="form-line">
                            <input type="text" class="form-control" name="address" value="{{$building->address}}">
                            <label class="form-label">Address</label>
                        </div>
                    </div>

                    <div class="form-group form-float">
                        <h5>Google Map</h5>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="text" name="location_latitude" class="form-control" value="{{$building->location_latitude}}" />
                                <label class="form-label">Latitude</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="text" name="location_longitude" class="form-control" value="{{$building->location_longitude}}" />
                                <label class="form-label">Longitude</label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group form-float">
                        <div class="form-line">
                            <input type="number" class="form-control" name="area" value="{{$building->area}}">
                            <label class="form-label">Area</label>
                        </div>
                        <div class="help-info">Square Feet</div>
                    </div>

                    <div class="form-group">
                        <label for="tinymce">Description</label>
                        <textarea name="description" id="tinymce">{!! $building->description !!}</textarea>
                    </div>

                    <hr>
                    <div class="form-group">
                        <label for="tinymce-nearby">Nearby</label>
                        <textarea name="nearby" id="tinymce-nearby">{!!$building->address!!}</textarea>
                    </div>

                </div>
            </div>

            <div class="card">
                <div class="header bg-red">
                    <h2>GALLERY IMAGE</h2>
                </div>
                <div class="body">
                    <div class="gallery-box" id="gallerybox">
                        @foreach($building->gallery as $gallery)
                        <div class="gallery-image-edit" id="gallery-{{$gallery->id}}">
                            <button type="button" data-id="{{$gallery->id}}" class="btn btn-danger btn-sm"><i class="material-icons">delete_forever</i></button>
                            <img class="img-responsive" src="{{Storage::url('building/gallery/'.$gallery->name)}}" alt="{{$gallery->name}}">
                        </div>
                        @endforeach
                    </div>
                    <div class="gallery-box">
                        <hr>
                        <input type="file" name="gallaryimage[]" value="UPLOAD" id="gallaryimageupload" multiple>
                        <input type="hidden" name="GallaryImage" id="gallaryimageupload_hidden" <?php echo (count($building->gallery) > 0 ? 'value="OK"' : ""); ?>>
                        <button type="button" class="btn btn-info btn-lg right" id="galleryuploadbutton">UPLOAD GALLERY IMAGE</button>
                    </div>
                </div>
            </div>

        </div>
        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header bg-indigo">
                    <h2>Parking Info</h2>
                </div>
                <div class="body">
                    <div class="form-group">
                        <select name="parking" class="form-control show-tick">
                            <option value="">-- SELECT PARKING TYPE --</option>
                            <option value="garbage" {{ $building->parking=='garbage' ? 'selected' : '' }}>Garbage</option>
                            <option value="outside" {{ $building->parking=='outside' ? 'selected' : '' }}>Outside</option>
                        </select>
                    </div>
                    <div class="form-group form-float">
                        <div class="form-line">
                            <input type="number" class="form-control" name="parking_price" value="{{$building->parking_price}}">
                            <label class="form-label">Parking Price</label>
                        </div>
                        <div class="help-info">US Dollar</div>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="header bg-indigo">
                    <h2>Floor Plan</h2>
                </div>
                <div class="body">
                    <div class="form-group">
                        @if(Storage::disk('public')->exists('building/'.$building->floor_plan) && $building->floor_plan )
                            <img src="{{Storage::url('building/'.$building->floor_plan)}}" alt="{{$building->title}}" class="img-responsive img-rounded" style="width:100%; height:auto;"> <br>
                        @endif
                        <input type="file" name="floor_plan">
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="header bg-indigo">
                    <h2>Featured Info</h2>
                </div>
                <div class="body">
                    <div class="form-group">
                        @if($building->featured == true)
                            <input type="checkbox" id="featured" name="featured" class="filled-in" value="1" checked/>
                        @else
                            <input type="checkbox" id="featured" name="featured" class="filled-in" value="1"/>
                        @endif
                        <label for="featured">Featured</label>
                    </div>
                    <div class="form-group form-float">
                        <div class="form-line">
                            <input type="text" class="form-control" name="video" value="{{$building->video}}">
                            <label class="form-label">Featured Video</label>
                        </div>
                        <div class="help-info">Youtube Link</div>
                    </div>
                    <div class="embed-video center">
                        {!! $videoembed !!}
                    </div>
                    <div class="form-group">
                        <h5>Featured Image</h5>
                        @if(Storage::disk('public')->exists('building/'.$building->image))
                            <img src="{{Storage::url('building/'.$building->image)}}" alt="{{$building->title}}" class="img-responsive img-rounded" style="width:100%; height: auto;"> <br>
                        @endif
                        <input type="file" name="image">
                    </div>

                    {{-- BUTTON --}}
                    <a href="{{route('admin.building.index')}}" class="btn btn-danger btn-lg m-t-15 waves-effect">
                        <i class="material-icons left">arrow_back</i>
                        <span>BACK</span>
                    </a>

                    <button type="submit" class="btn btn-indigo btn-lg m-t-15 waves-effect">
                        <i class="material-icons">save</i>
                        <span>SAVE</span>
                    </button>

                </div>
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

        // DELETE BUILDING GALLERY IMAGE
        $('.gallery-image-edit button').on('click',function(e){
            e.preventDefault();
            var id = $(this).data('id');
            var image = $('#gallery-'+id+' img').attr('alt');
            $.post("{{route('admin.gallery-delete')}}",{id:id,image:image},function(data){
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
                height: 200,
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
                height: 100,
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
