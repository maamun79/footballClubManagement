@extends('admin.main')

@section('title')
 <title>Create Tournament</title>
@endsection

@section('style')
    <!--pickers css-->
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/js/bootstrap-datepicker/css/datepicker-custom.css')}}" />
    <!--file upload-->
    <link rel="stylesheet" type="text/css" href="{{asset('admin/css/bootstrap-fileupload.min.css')}}" />
@endsection

@section('content')
 <!-- page heading start-->
<div class="page-heading">
    <h3>
        Create Tournament
    </h3>
    <ul class="breadcrumb">
        <li>
            <a href="/tournaments">Tournaments</a>
        </li>
        <li class="active">Create Tournament</li>
    </ul>
</div>
 <!-- page heading end-->
<hr/>
<div class="wrapper">
    <form action="/tournaments" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-md-6 col col-md-offset-3">
                <div class="panel" data-collapsed="0">
                    <div class="panel-heading">
                        <div class="panel-title">
                            Add Tournament
                        </div>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-12 form-group">
                                <label for="name">Tournament Name <span style="color:red">*</span></label> 
                                @error('name')
                                    <span style="color:red;">{{ $message }}</span>
                                @enderror                         
                                <input type="text" id="name" name="name" class="form-control" value="{{old('name')}}" placeholder="Tournament Name">
                            </div>

                            <div class="col-md-12 form-group">
                                <label for="start_date">Start date <span style="color:red">*</span></label>
                                @error('start_date')
                                    <span style="color:red;">{{ $message }}</span>
                                @enderror
                                <div>
                                    <input id="start_date" name="start_date" class="form-control form-control-inline input-medium default-date-picker" autocomplete="off"  size="16" type="text" value="" />
                                </div>
                            </div>

                            <div class="col-md-12 form-group">
                                <label for="end_date">End date<span style="color:red">*</span></label>
                                @error('end_date')
                                    <span style="color:red;">{{ $message }}</span>
                                @enderror                               
                                <div>
                                    <input id="end_date" name="end_date" class="form-control form-control-inline input-medium default-date-picker" autocomplete="off"  size="16" type="text" value="" />
                                </div>
                            </div>

                            <div class="col-md-12 form-group">
                                <label for="organizer">Organizer <span style="color:red">*</span></label> 
                                @error('organizer')
                                    <span style="color:red;">{{ $message }}</span>
                                @enderror                              
                                <input type="text" id="organizer" name="organizer" class="form-control" value="{{old('organizer')}}" placeholder="Tournament Name">
                            </div>

                            <div class="col-md-12 form-group">
                                <label for="season">Season <span style="color:red">*</span></label> 
                                @error('season')
                                    <span style="color:red;">{{ $message }}</span>
                                @enderror                              
                                <input type="text" id="season" name="season" class="form-control" value="{{old('season')}}" placeholder="Season">
                            </div>
                            <!-- ----------------------tournament logo--------------------------- -->
                            <div class="col-md-8 form-group">
                                <label id="logoLbl" >Upload Tournament Logo <span style="color:red">*</span></label>
                                        @error('logo')
                                            <span style="color:red; font-size: 0.8em">{{$message}}</span>
                                        @enderror
                                        <div>
                                            <div class="fileupload fileupload-new" id="logoUploader" data-provides="fileupload">
                                                <div class="fileupload-new thumbnail" style="width: 100px; height: 80px;">
                                                    <img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" alt="" />
                                                </div>
                                                <div class="fileupload-preview fileupload-exists thumbnail" value="{{old('logo')}}" style="width: 100px; height: 80px; line-height: 20px;"></div>
                                                <div class="uploadbtn">
                                                    <span class="btn btn-default btn-file" id="bttn-select">
                                                        <span class="fileupload-new"><i class="fa fa-paper-clip"></i> Select image</span>
                                                        <span class="fileupload-exists"><i class="fa fa-undo"></i> Change</span>
                                                        <input type="file" name="logo" class="default" />
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
    <!--pickers plugins-->
    <script type="text/javascript" src="{{ asset('admin/js/bootstrap-datepicker/js/bootstrap-datepicker.js')}}"></script>
    <!--pickers initialization-->
    <script src="{{ asset('admin/js/pickers-init.js')}}"></script>
    <!--image upload-->
    <script type="text/javascript" src="{{asset('admin/js/bootstrap-fileupload.min.js')}}"></script>
@endsection