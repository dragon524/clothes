@extends('frontend.layouts.app')

@section('styles')
@endsection

@section('content')

    <section class="section">
        <div class="container">
            <div class="row">

                <div class="col s12 m3">
                    <div class="agent-sidebar">
                        @include('agent.sidebar')
                    </div>
                </div>

                <div class="col s12 m9">

                    <h4 class="agent-title" style="text-transform: none;">Billing Info of {{$messages[0]->name}}</h4>
                    <div class="col s12 m1"></div>
                    <div class="col s12 m10">
                        <div class="row">
                            <div class="col s12 m12">
                              <div class="card" style="background-color: #e6e6e6;">
                                <div class="card-content">
                                    <?php 
                                        $house_info = DB:: table('houses')->where('id', $messages[0]->house_id)->get();
                                        $building_info = DB:: table('buildings')->where('id', $house_info[0]->building)->get();

                                    ?>
                                    <h6><strong>Name : </strong>{{$messages[0]->name}}</h6>
                                    <h6><strong>Email : </strong>{{$messages[0]->email}}</h6>
                                    <h6><strong>Phone : </strong>{{$messages[0]->phone}}</h6>
                                    <h6><strong>Building : </strong>{{$building_info[0]->title}}</h6>
                                    <h6><strong>House : </strong>{{$house_info[0]->title}}</h6>
                                    <h6><strong>People : </strong>{{$messages[0]->capacity}}</h6>
                                    <h6><strong>Start Date : </strong>{{date('M d, Y', strtotime($messages[0]->start_date) )}}</h6>
                                    <h6><strong>End Date : </strong>{{date('M d, Y', strtotime($messages[0]->end_date) )}}</h6>
                                    <h6><strong>Total Price : </strong>&dollar; {{$house_info[0]->price + $building_info[0]->parking_price}}</h6>
                                    <hr>
                                    <?php
                                        $billing_info = DB:: table('billings')->where('message_id', $messages[0]->id)->get();
                                        $total_paid = 0;
                                        foreach ($billing_info as $key => $value) {
                                            $total_paid += $value->pay_amount;
                                        }
                                    ?>
                                    <h6 style="color: green"><strong style="font-weight: bold;">Total Paid : </strong>&dollar; {{$total_paid}}</h6>
                                    <h6 style="color: red"><strong style="font-weight: bold;">Total Remain : </strong>&dollar; {{$house_info[0]->price + $building_info[0]->parking_price-$total_paid}}</h6>
                                    
                                </div>
                              </div>
                            </div>
                        </div>
                    </div>
                    <div class="col s12 m3"></div>
                    <div class="col s12 m6" style="display: inline-flex; text-align: center;">
                        <p class="agent-title" style="text-transform: none; font-size: 20px; margin-right: 30px; text-align: center; font-weight: bold; color: #615e5e;">Pay History</p>
                        <span>
                            <a href="#modal1" style="text-align: center; margin-top: 20px;" class="waves-effect waves-light btn modal-trigger">
                                <i class="material-icons">add</i>
                            </a>
                        </span>
                    </div>
                    <div class="agent-content" style="width: 60%; margin: 0 auto">
                        <table class="striped responsive-table">
                            <thead>
                                <tr>
                                    <th>SL.</th>
                                    <th>Pay Date</th>
                                    <th>Pay Amount</th>
                                </tr>
                            </thead>
                    
                            <tbody>
                            <?php
                                $cnt = 1;
                            ?>
                            @foreach( $billings as $key => $billing )
                                <tr>
                                    <td class="right-left">{{$cnt}}.</td>
                                    <td><strong>&dollar;{{$billing->pay_amount}}</strong></td>
                                    <td>{{date('M d, Y', strtotime($billing->pay_date) )}}</td>
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
    </section>

    <div id="modal1" class="modal" style="width: 350px;">
        <form action="{{route('agent.message.add_pay',$messages[0]->id)}}" method="get">
            <div class="modal-content">
                 <div class="row">
                    <div class="col s12 m12">
                        <h4 style="text-align: center; color: #bd1818; font-family: serif;">Add Pay History</h4>
                        <label>Pay amount : </label><input type="number" name="pay_amount" placeholder="Enter Pay amount" required="">
                        <label>Pay Date : </label><input type="date" name="pay_date"placeholder="Enter Pay date" required="">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button class="waves-effect waves-light btn">Add</button>
                <a href="#!" class="modal-close waves-effect waves-light btn" style="background-color: #c10c0c">Cancel</a>
            </div>
        </form>
    </div>

@endsection

@section('scripts')
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
@endsection