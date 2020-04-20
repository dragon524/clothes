@extends('backend.layouts.app')

@section('title', 'Edit Age')

@push('styles')

    
@endpush


@section('content')

    <div class="block-header">
        <a href="{{route('admin.ages.index')}}" class="waves-effect waves-light btn btn-danger right m-b-15">
            <i class="material-icons left">arrow_back</i>
            <span>BACK</span>
        </a>
    </div>

    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header bg-indigo">
                    <h2>EDIT WORK STYLE</h2>
                </div>
                <div class="body">
                    <form action="{{route('admin.ages.update',$age->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="form-group form-float">
                            <label class="form-label">Name</label>
                            <div class="form-line">
                                <input type="text" name="name" class="form-control" value="{{$age->name}}">
                            </div>
                        </div>

                        <div class="form-group">
                            <img src="{{Storage::url('age/'.$age->image)}}" id="age-imgsrc-edit" alt="{{$age->title}}" class="img-responsive img-rounded">
                        </div>
                        <div class="form-group">
                            <input type="file" name="image" id="age-image-input-edit" style="display:none;">
                            <button type="button" class="btn bg-grey btn-sm waves-effect m-t-15" id="age-image-btn-edit">
                                <i class="material-icons">image</i>
                                <span>UPLOAD IMAGE</span>
                            </button>
                        </div>

                        <div class="form-group">
                            <label class="form-label">Description</label>
                            <div class="form-line">
                                <textarea name="description" rows="4" class="form-control no-resize">{{$age->description}}</textarea>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-indigo btn-lg m-t-15 waves-effect">
                            <i class="material-icons">update</i>
                            <span>Update</span>
                        </button>

                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('scripts')

<script>
    function showImage(fileInput,imgID){
        if (fileInput.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e){
                $(imgID).attr('src',e.target.result);
                $(imgID).attr('alt',fileInput.files[0].name);
            }
            reader.readAsDataURL(fileInput.files[0]);
        }
    }
    $('#age-image-btn-edit').on('click', function(){
        $('#age-image-input-edit').click();
    });
    $('#age-image-input-edit').on('change', function(){
        showImage(this, '#age-imgsrc-edit');
    });
</script>

@endpush
