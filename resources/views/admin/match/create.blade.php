@extends('admin.main')

@section('title')
 <title>Add Match</title>
@endsection

@section('style')
    <!-- country select  -->
    <link rel="stylesheet" href="{{asset('admin/country_selector/build/css/countrySelect.css')}}">
    <!--pickers css-->
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/js/bootstrap-datepicker/css/datepicker-custom.css')}}" />
    <!--file upload-->
    <link rel="stylesheet" type="text/css" href="{{asset('admin/css/bootstrap-fileupload.min.css')}}" />
    <!-- time picker -->
    <link rel="stylesheet" type="text/css" href="{{asset('admin/js/bootstrap-timepicker/css/timepicker.css')}}" />
    <!-- datetime picker -->
    <link rel="stylesheet" type="text/css" href="{{asset('admin/js/bootstrap-datetimepicker/css/datetimepicker-custom.css')}}" />
    
@endsection

@section('content')
 <!-- page heading start-->
<div class="page-heading">
    <h3>
        Add Match
    </h3>
    <ul class="breadcrumb">
        <li>
            <a href="/tournaments">Tournaments</a>
        </li>
        <li>
            <a href="/tournaments/{{$tournament->id}}">Matches</a>
        </li>
        <li class="active">Add Match</li>
    </ul>
</div>
 <!-- page heading end-->
<hr/>
<div class="wrapper">
    <form action="/tournaments/{{$tournament->id}}/matches" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-md-6 col col-md-offset-3">
                <div class="panel" data-collapsed="0">
                    <div class="panel-heading">
                        <div class="panel-title">
                            Add Match
                        </div>
                    </div>
                    <div class="panel-body">
                        <div class="row">

                            <div class="col-md-12 form-group">
                                <label for="match_date">Match date <span style="color:red">*</span></label>
                                @error('match_date')
                                    <span style="color:red;">{{ $message }}</span>
                                @enderror
                                <div>
                                    <input id="match_date" name="match_date" class="form-control form-control-inline input-medium default-date-picker" autocomplete="off"  size="16" type="text" value="" />
                                </div>
                            </div>

                            <div class="col-md-12 form-group">
                                <label for="starting_time">Starting Time<span style="color:red">*</span></label>
                                @error('starting_time')
                                    <span style="color:red;">{{ $message }}</span>
                                @enderror                               
                                <div class="bootstrap-timepicker">
                                    <input id="starting_time" name="starting_time" type="text" class="form-control timepicker-default">
                                </div>
                            </div>

                            <div class="col-md-12 form-group">
                                <label for="venue_name">Venue Name <span style="color:red">*</span></label> 
                                @error('venue_name')
                                    <span style="color:red;">{{ $message }}</span>
                                @enderror                              
                                <input type="text" id="venue_name" name="venue_name" class="form-control" value="{{old('venue_name')}}" placeholder="Venue Name">
                            </div>

                            <div class="col-md-12 form-group">
                                <label for="venue_country">Venue Country <span style="color:red">*</span></label>
                                @error('venue_country')
                                    <span style="color:red; font-size: 0.8em">{{ $message }}</span>
                                @enderror
                                <br>
                                <input type="text" id="venue_country" name="venue_country" class="form-control" placeholder="Venue Country">
                            </div>

                            <div class="col-md-12 form-group">
                                <label for="match_day">Match Day <span style="color:red">*</span></label> 
                                @error('match_day')
                                    <span style="color:red;">{{ $message }}</span>
                                @enderror                              
                                <input type="number" id="match_day" name="match_day" class="form-control" value="{{old('match_day')}}" placeholder="Match Day">
                            </div>

                            <div class="col-md-12 form-group">
                                <label for="opposite_team">Opposite Team <span style="color:red">*</span></label> 
                                @error('opposite_team')
                                    <span style="color:red;">{{ $message }}</span>
                                @enderror                              
                                <input type="text" id="opposite_team" name="opposite_team" class="form-control" value="{{old('opposite_team')}}" placeholder="Opposite Team">
                            </div>

                            <div class="col-md-12 form-group">
                                <label for="match_type">Match Type<span style="color:red">*</span></label>
                                @error('match_type')
                                    <span style="color:red;">{{ $message }}</span>
                                @enderror
                                <select class="form-control m-bot15" id="match_type" name="match_type">
                                    <option value="">Select Match Type</option>
                                    <option value="Home">Home</option>
                                    <option value="Away">Away</option>
                                </select>
                            </div>
                            <!-- ----------------------opposite team logo--------------------------- -->
                            <div class="col-md-8 form-group">
                                <label id="logoLbl" >Upload Opposite Team Logo <span style="color:red">*</span></label>
                                        @error('opposite_team_logo')
                                            <span style="color:red;"></span>
                                        @enderror
                                        <div>
                                            <div class="fileupload fileupload-new" id="logoUploader" data-provides="fileupload">
                                                <div class="fileupload-new thumbnail" style="width: 100px; height: 80px;">
                                                    <img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" alt="" />
                                                </div>
                                                <div class="fileupload-preview fileupload-exists thumbnail" value="{{old('opposite_team_logo')}}" style="width: 100px; height: 80px; line-height: 20px;"></div>
                                                <div class="uploadbtn">
                                                    <span class="btn btn-default btn-file" id="bttn-select">
                                                        <span class="fileupload-new"><i class="fa fa-paper-clip"></i> Select image</span>
                                                        <span class="fileupload-exists"><i class="fa fa-undo"></i> Change</span>
                                                        <input type="file" name="opposite_team_logo" class="default" />
                                                    </span><br>
                                                    <a href="#" class="btn btn-danger fileupload-exists" id="deleteBtn" data-dismiss="fileupload"><i class="fa fa-trash"></i> Remove</a>
                                                </div>
                                            </div>
                                        </div>
                            </div>
                            <!-- ----------------------tournament logo--------------------------- -->

                            <div class="col-md-4 form-group">
                                    <input type="submit" class="btn btn-success btn-block" style="margin-top:107px">
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
   <!-- time picker -->
    <script type="text/javascript" src="{{asset('admin/js/bootstrap-timepicker/js/bootstrap-timepicker.js')}}"></script>
    <!-- country select -->
    <script src="{{asset('admin/country_selector/build/js/countrySelect.min.js')}}"></script>
    <!--pickers plugins-->
    <script type="text/javascript" src="{{ asset('admin/js/bootstrap-datepicker/js/bootstrap-datepicker.js')}}"></script>
    <!--image upload-->
    <script type="text/javascript" src="{{asset('admin/js/bootstrap-fileupload.min.js')}}"></script>
     <!-- datetime picker -->
    <script type="text/javascript" src="{{asset('admin/js/bootstrap-datetimepicker/js/bootstrap-datetimepicker.js')}}"></script>
    <!--pickers initialization-->
    <script src="{{ asset('admin/js/pickers-init.js')}}"></script>
    <!-- country selector -->
    <script>
        $("#venue_country").countrySelect();
    </script>
@endsection