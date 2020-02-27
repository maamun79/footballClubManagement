@extends('admin.main')

@section('title')
    <title>{{ $injuredPlayer->last_name }}</title>
@endsection

@section('style')
    <!--pickers css-->
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/js/bootstrap-datepicker/css/datepicker-custom.css')}}" />
@endsection

@section('content')
<!-- page heading start-->
<div class="page-heading">
    <h3>
        Injury Details
    </h3>
    <ul class="breadcrumb">
        <li>
            <a href="/players">Players</a>
        </li>
        <li>
            <a href="/players/{{$injuredPlayer->id}}">{{$injuredPlayer->last_name}}</a>
        </li>
        <li class="active">Injury Details</li>
    </ul>
    <!-- @if(session()->has('message'))
        <div class="alert alert-success">
            {{ session()->get('message') }}
        </div>
    @endif -->
</div><hr>
 <!-- page heading end-->

 <div class="wrapper">
    <form action="/players/{{$injuredPlayer->id}}/injured" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-md-6 col col-md-offset-3">
                <div class="panel" data-collapsed="0">
                    <div class="panel-heading">
                        <div class="panel-title">
                            Add Injury Details
                        </div>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-12 form-group">
                                <label for="injury_type">Select Injury Type<span style="color:red">*</span></label>
                                <!-- @error('injury_type')
                                    <span style="color:red; font-size: 0.8em">{{ $message }}</span>
                                @enderror -->
                                <select class="form-control m-bot15" id="injury_type" name="injury_type">
                                    <option value="">Select Injury Type</option>
                                    <option value="Hamstring strains">Hamstring strains</option>
                                    <option value="Muscle strain">Muscle strain</option>
                                    <option value="Knee ligament injuries">Knee ligament injuries</option>
                                    <option value="Rotator cuff strains">Rotator cuff strains</option>
                                    <option value="Ankle sprain">Ankle sprain</option>
                                    <option value="Achilles tendonitis">Achilles tendonitis</option>
                                    <option value="Jumper’s knee">Jumper’s knee</option>
                                    <option value="Shin splints">Shin splints</option>
                                    <option value="Metatarsal stress fractures">Metatarsal stress fractures</option>
                                    <option value="Concussions">Concussions</option>
                                    <option value="Others">Others</option>
                                </select>
                            </div>

                            <div class="col-md-12 form-group">
                                <label for="injury_date">Injured Date <span style="color:red">*</span></label>
                                <!-- @error('injury_date')
                                <span style="color:red; font-size: 0.8em">{{ $message }}</span>
                                @enderror -->
                                <div>
                                    <input id="injury_date" name="injury_date" class="form-control form-control-inline input-medium default-date-picker"  size="16" type="text" value="" />
                                </div>
                            </div>

                            <div class="col-md-12 form-group">
                                <label for="possible_comeback_date">Possible Comeback Date <span style="color:red">*</span></label>
                                <!-- @error('possible_comeback_date')
                                <span style="color:red; font-size: 0.8em">{{ $message }}</span>
                                @enderror -->
                                <div>
                                    <input id="possible_comeback_date" name="possible_comeback_date" class="form-control form-control-inline input-medium default-date-picker"  size="16" type="text" value="" />
                                </div>
                            </div>

                            <div class="col-md-12 form-group">
                                <label for="treatment_status">Treatment Status</label>
                                <!-- @error('treatment_status')
                                <span style="color:red; font-size: 0.8em">{{ $message }}</span>
                                @enderror -->
                                <div>
                                    <input type="text" id="treatment_status" name="treatment_status" class="form-control" placeholder="Treatment Status">
                                </div>
                            </div>

                            <div class="col-md-12 form-group">
                                <input type="submit" class="btn btn-success pull-right">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>

 @endsection

 @section('script')
    <!--pickers plugins-->
    <script type="text/javascript" src="{{ asset('admin/js/bootstrap-datepicker/js/bootstrap-datepicker.js')}}"></script>
    <!--pickers initialization-->
    <script src="{{ asset('admin/js/pickers-init.js')}}"></script>
 @endsection