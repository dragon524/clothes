@extends('backend.layouts.app')

@section('title', 'Create House')

@push('styles')

    <link rel="stylesheet" href="{{asset('backend/plugins/bootstrap-select/css/bootstrap-select.css')}}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.5/css/fileinput.min.css" media="all" rel="stylesheet" type="text/css" />

@endpush


@section('content')
<style>
    .kv-file-content{
        width:225px !important;
    }
    .krajee-default.file-preview-frame{
        margin:0;
    }
    .kv-file-content img{
        width: 100% !important;
        height: 140px !important;
    }
</style>

    <div class="block-header"></div>

    <div class="row clearfix">
        <form action="{{route('admin.house.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12 col-md-offset-2 col-lg-offset-2">
            <div class="card">
                <div class="header bg-indigo">
                    <h2>Create House</h2>
                </div>
                <div class="body">
                    <h5>House Info</h5>
                    <div class="form-group form-float">
                        <div class="form-line">
                            <input type="text" name="title" class="form-control" value="{{old('title')}}">
                            <label class="form-label">Title</label>
                        </div>
                    </div>
                    <?php
                        $buildings = DB::table('buildings')->select('title', 'id')->get();
                    ?>
                    <div class="form-group">
                        <select name="building" class="form-control show-tick">
                            <option value="">-- Select Building --</option>
                            @foreach($buildings as $val)
                            <option value="{{$val->id}}">{{$val->title}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group form-float">
                        <div class="form-line">
                            <input type="number" class="form-control" name="price" value="{{old('price')}}">
                            <label class="form-label">Rent Price (Monthly)</label>
                        </div>
                        <div class="help-info">US Dollar</div>
                    </div>

                    <div class="form-group form-float">
                        <div class="form-line">
                            <input type="number" class="form-control" name="area" value="{{old('area')}}">
                            <label class="form-label">Area</label>
                        </div>
                        <div class="help-info">Square Feet</div>
                    </div>

                    <div class="form-group form-float">
                        <div class="form-line">
                            <input type="number" class="form-control" name="bedroom" value="{{old('bedroom')}}">
                            <label class="form-label">Bedroom</label>
                        </div>
                    </div>

                    <div class="form-group form-float">
                        <div class="form-line">
                            <input type="number" class="form-control" name="bathroom" value="{{old('bathroom')}}">
                            <label class="form-label">Bathroom</label>
                        </div>
                    </div>

                    <div class="form-group form-float">
                        <div class="form-line">
                            <input type="number" class="form-control" name="capacity" value="{{old('capacity')}}">
                            <label class="form-label">Capacity</label>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="tinymce">Description</label>
                        <textarea name="description" id="tinymce">{{old('description')}}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="gallery">Gallery Image</label>
                        <input id="input-id" type="file" name="gallaryimage[]" class="file" data-preview-file-type="text" multiple>
                    </div>
                    <div class="form-group" style="text-align: center;">
                        {{-- BUTTON --}}
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
            </div>
        </div>
        </form>
    </div>

@endsection


@push('scripts')
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.5/js/fileinput.min.js"></script>

    <script src="{{ asset('backend/plugins/bootstrap-select/js/bootstrap-select.js') }}"></script>
    <script src="{{asset('backend/plugins/tinymce/tinymce.js')}}"></script>
    <script>
        $(function () {
            $("#input-id").fileinput();
        });

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
