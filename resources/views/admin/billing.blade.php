@extends('backend.layouts.app')

@section('title', 'Biling')

@push('styles')

    <!-- JQuery DataTable Css -->
    <link rel="stylesheet" href="{{ asset('backend/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css') }}">

@endpush

@section('content')

    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header bg-indigo">
                    <h2>BILLING LIST</h2>
                </div>
                <div class="body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                            <thead>
                                <tr>
                                    <th>SL.</th>
                                    <th>Building</th>
                                    <th>House</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Start Date</th>
                                    <th>End Date</th>
                                    <th>Total Price</th>
                                    <th>Total Paid</th>
                                    <th>Total Remain</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php
                                    $cnt = 1;
                                ?>
                                @foreach( $billings as $key => $billing )
                                    <?php
                                        $house_info = DB::table('houses')->get()->where('id', $billing[0]->house_id);
                                        $building_info = DB::table('buildings')->get()->where('id', $house_info[$cnt - 1]->building)->toArray();
                                        $user_info = DB::table('users')->get()->where('id', $billing[0]->user_id)->toArray();
                                        $message_info = DB::table('messages')->get()->where('id', $billing[0]->message_id)->toArray();
                                       
                                        $total_paid = 0;
                                        foreach ($billing as $key => $value) {
                                            $total_paid += $value->pay_amount;
                                        }
                                    ?>
                                    <tr>
                                        <td>{{$cnt}}</td>
                                        <td>{{ str_limit(reset($building_info)->title, 20)}}</td>
                                        <td>{{ str_limit($house_info[$cnt - 1]->title, 20) }}</td>
                                        <td>{{reset($user_info) ->name}}</td>
                                        <td>{{reset($user_info) ->email}}</td>
                                        <td>{{date('M d, Y', strtotime(reset($message_info)->start_date) )}}</td>
                                        <td>{{date('M d, Y', strtotime(reset($message_info)->end_date) )}}</td>
                                        <td style="color: blue; font-weight: bold;">&dollar; {{reset($building_info)->parking_price + $house_info[$cnt - 1]->price}}</td>
                                        <td style="color: green; font-weight: bold;">&dollar; {{$total_paid}}</td>
                                        <td style="color: red; font-weight: bold;">&dollar; {{reset($building_info)->parking_price + $house_info[$cnt - 1]->price - $total_paid}}</td>
                                    </tr>
                                    <?php
                                        $cnt ++;
                                    ?>
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

@endpush