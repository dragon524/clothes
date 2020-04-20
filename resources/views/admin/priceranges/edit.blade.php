@extends('backend.layouts.app')

@section('title', 'Edit Price')

@push('styles')

    
@endpush


@section('content')

    <div class="block-header">
        <a href="{{route('admin.priceranges.index')}}" class="waves-effect waves-light btn btn-danger right m-b-15">
            <i class="material-icons left">arrow_back</i>
            <span>BACK</span>
        </a>
    </div>

    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header bg-indigo">
                    <h2>EDIT PRICE</h2>
                </div>
                <div class="body">
                    <form action="{{route('admin.priceranges.update',$pricerange->id)}}" method="POST">
                        @csrf
                        @method('PUT')

                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" name="name" class="form-control" value="{{ $pricerange->name }}">
                                    <label class="form-label">Item Name</label>
                                </div>
                            </div>
    
                            <!-- <div class="form-group">
                                <img src="{{Storage::url('pricerange/'.$pricerange->icon)}}" id="pricerange-imgsrc-edit" alt="{{$pricerange->name}}" class="img-responsive img-rounded">
                            </div>
                            <div class="form-group">
                                <input type="file" name="image" id="pricerange-image-input-edit" style="display:none;">
                                <button type="button" class="btn bg-grey btn-sm waves-effect m-t-15" id="pricerange-image-btn-edit">
                                    <i class="material-icons">image</i>
                                    <span>UPLOAD IMAGE</span>
                                </button>
                            </div> -->
                            
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="number" name="min" class="form-control" min="1" value="{{ $pricerange->min }}">
                                    <label class="form-label">Min Price (€)</label>
                                </div>
                            </div>

                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="number" name="max" class="form-control" min="1" value="{{ $pricerange->max }}">
                                    <label class="form-label">Max Price (€)</label>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="form-line">
                                    <textarea name="description" rows="4" class="form-control no-resize">{{ $pricerange->description }}</textarea>
                                    <label class="form-label">Description</label>
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
    $('#pricerange-image-btn-edit').on('click', function(){
        $('#pricerange-image-input-edit').click();
    });
    $('#pricerange-image-input-edit').on('change', function(){
        showImage(this, '#pricerange-imgsrc-edit');
    });
</script>

@endpush

