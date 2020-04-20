@extends('backend.layouts.app')

@section('title', 'House')

@push('styles')

    <!-- JQuery DataTable Css -->
    <link rel="stylesheet" href="{{ asset('backend/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css') }}">

@endpush

@section('content')

    <div class="block-header">
        <a href="{{route('admin.house.create')}}" class="waves-effect waves-light btn right m-b-15 addbtn">
            <i class="material-icons left">add</i>
            <span>CREATE </span>
        </a>
    </div>

    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header bg-indigo">
                    <h2>HOUSE LIST</h2>
                </div>
                <div class="body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                            <thead>
                                <tr>
                                    <th>SL.</th>
                                    <th>Image</th>
                                    <th>Title</th>
                                    <th>Building</th>
                                    <th>Price</th>
                                    <th>Area</th>
                                    <th>Bedroom</th>
                                    <th>Bathroom</th>
                                    <th>Capacity</th>
                                    <th>Description</th>
                                    <th width="150">Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach( $houses as $key => $house )
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td>
                                        @if(count($house->gallery) > 0)
                                            @if(Storage::disk('public')->exists('house/gallery/'.$house->gallery[0]->name) && $house->gallery[0]->name)
                                                <img src="{{Storage::url('house/gallery/'.$house->gallery[0]->name)}}" title="{{$house->title}}" width="60" style="margin:0 auto" class="img-responsive img-rounded">
                                            @endif
                                        @endif
                                    </td>
                                    <td>
                                        <span title="{{$house->title}}">
                                            {{ str_limit($house->title,10) }}
                                        </span>
                                    </td>

                                    <?php
                                        $building = DB::table('buildings')->select('title')->where('id', $house->building)->get();
                                    ?>
                                    <td>{{$building[0]->title}}</td>
                                    <td>{{$house->price}}</td>
                                    <td>{{$house->area}}</td>
                                    <td>{{$house->bedroom}}</td>
                                    <td>{{$house->bathroom}}</td>
                                    <td>{{$house->capacity}}</td>
                                    <td>{!!$house->description!!}</td>

                                    <td class="text-center">
                                        <a href="{{route('admin.house.show',$house->slug)}}" class="btn btn-success btn-sm waves-effect">
                                            <i class="material-icons">visibility</i>
                                        </a>
                                        <a href="{{route('admin.house.edit',$house->slug)}}" class="btn btn-info btn-sm waves-effect">
                                            <i class="material-icons">edit</i>
                                        </a>
                                        <button type="button" class="btn btn-danger btn-sm waves-effect" onclick="deletePost({{$house->id}})">
                                            <i class="material-icons">delete</i>
                                        </button>
                                        <form action="{{route('admin.house.destroy',$house->slug)}}" method="POST" id="del-post-{{$house->id}}" style="display:none;">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection


@push('scripts')

    <!-- Jquery DataTable Plugin Js -->
    <script src="{{ asset('backend/plugins/jquery-datatable/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('backend/plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js') }}"></script>
    <script src="{{ asset('backend/plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('backend/plugins/jquery-datatable/extensions/export/buttons.flash.min.js') }}"></script>
    <script src="{{ asset('backend/plugins/jquery-datatable/extensions/export/jszip.min.js') }}"></script>
    <script src="{{ asset('backend/plugins/jquery-datatable/extensions/export/pdfmake.min.js') }}"></script>
    <script src="{{ asset('backend/plugins/jquery-datatable/extensions/export/vfs_fonts.js') }}"></script>
    <script src="{{ asset('backend/plugins/jquery-datatable/extensions/export/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('backend/plugins/jquery-datatable/extensions/export/buttons.print.min.js') }}"></script>

    <!-- Custom Js -->
    <script src="{{ asset('backend/js/pages/tables/jquery-datatable.js') }}"></script>

    <script>
        function deletePost(id){
            
            swal({
            title: 'Are you sure?',
            text: "If you delete house, all related booking info would be deleted!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.value) {
                    document.getElementById('del-post-'+id).submit();
                    swal(
                    'Deleted!',
                    'House has been deleted.',
                    'success'
                    )
                }
            })
        }
    </script>


@endpush