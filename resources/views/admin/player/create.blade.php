@extends('admin.main')

@section('title')
    <title>Add Player</title>
@endsection

@section('style')
    <!-- country select  -->
    <link rel="stylesheet" href="{{asset('admin/country_selector/build/css/countrySelect.css')}}">
    <!--file upload-->
    <link rel="stylesheet" type="text/css" href="{{asset('admin/css/bootstrap-fileupload.min.css')}}" />
    <!--pickers css-->
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/js/bootstrap-datepicker/css/datepicker-custom.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('admin/js/bootstrap-timepicker/css/timepicker.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('admin/js/bootstrap-colorpicker/css/colorpicker.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('admin/js/bootstrap-daterangepicker/daterangepicker-bs3.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('admin/js/bootstrap-datetimepicker/css/datetimepicker-custom.css')}}" />
@endsection

@section('content')
<!-- page heading start-->
<div class="page-heading">
    <h3>
        Add Players
    </h3>
    <ul class="breadcrumb">
        <li>
            <a href="/players">Players</a>
        </li>
        <li class="active"> Add Player</li>
    </ul>
</div>
<!-- page heading end-->
<form action="/players" method="post" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-md-12">
            <div class="panel" data-collapsed="0">
                <div class="panel-heading">
                    <div class="panel-title">
                        Add Player
                    </div>
                </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-4 form-group">
                                <label for="first_name">First Name <span style="color:red">*</span></label>
                                @error('first_name')
                                    <span style="color:red; font-size: 0.8em">{{ $message }}</span>
                                @enderror
                                <input type="text" id="first_name" name="first_name" class="form-control" value="{{old('first_name')}}" placeholder="First Name">
                            </div>

                            <div class="col-md-4 form-group">
                                <label for="last_name">Last Name <span style="color:red">*</span></label>
                                @error('last_name')
                                    <span style="color:red; font-size: 0.8em">{{ $message }}</span>
                                @enderror
                                <input type="text" id="last_name" name="last_name" class="form-control" placeholder="Last Name">
                            </div>

                            <div class="col-md-4 form-group">
                                <label for="dob">Date of Birth <span style="color:red">*</span></label>
                                @error('dob')
                                <span style="color:red; font-size: 0.8em">{{ $message }}</span>
                                @enderror
                                <div>
                                    <input id="dob" name="dob" class="form-control form-control-inline input-medium default-date-picker"  size="16" type="text" value="" />
                                </div>
                            </div>

                            <div class="col-md-4 form-group">
                                <label for="country">Nationality <span style="color:red">*</span></label>
                                @error('country')
                                    <span style="color:red; font-size: 0.8em">{{ $message }}</span>
                                @enderror
                                <br>
                                <input type="text" id="country" name="country" class="form-control" placeholder="Nationality">
                            </div>

                            <div class="col-md-4 form-group">
                                <label for="email">Personal Email <span style="color:red">*</span></label>
                                @error('email')
                                    <span style="color:red; font-size: 0.8em">{{ $message }}</span>
                                @enderror
                                <input type="email" id="email" name="email" class="form-control" placeholder="Email">
                            </div>

                            <div class="col-md-4 form-group">
                                <label for="contact_no">Contact No.<span style="color:red">*</span></label>
                                @error('contact_no')
                                    <span style="color:red; font-size: 0.8em">{{ $message }}</span>
                                @enderror
                                <input type="text" id="contact_no" name="contact_no" class="form-control" placeholder="Contact No.">
                            </div>

                            <div class="col-md-4 form-group">
                                <label for="father_name">Father Name <span style="color:red">*</span></label>
                                @error('father_name')
                                    <span style="color:red; font-size: 0.8em">{{ $message }}</span>
                                @enderror
                                <input type="text" id="father_name" name="father_name" class="form-control" placeholder="Father Name">
                            </div>

                            <div class="col-md-4 form-group">
                                <label for="mother_name">Mother Name <span style="color:red">*</span></label>
                                @error('mother_name')
                                    <span style="color:red; font-size: 0.8em">{{ $message }}</span>
                                @enderror
                                <input type="text" id="mother_name" name="mother_name" class="form-control" placeholder="Mother Name">
                            </div>

                            <div class="col-md-4 form-group">
                                <label for="agent_name">Agent Name <span style="color:red">*</span></label>
                                @error('agent_name')
                                    <span style="color:red; font-size: 0.8em">{{ $message }}</span>
                                @enderror
                                <input type="text" id="agent_name" name="agent_name" class="form-control" placeholder="Agent Name">
                            </div>

                            <div class="col-md-4 form-group">
                                <label for="contract_start_date">Contract start date <span style="color:red">*</span></label>
                                @error('contract_start_date')
                                <span style="color:red; font-size: 0.8em">{{ $message }}</span>
                                @enderror
                                <div>
                                    <input id="contract_start_date" name="contract_start_date" class="form-control form-control-inline input-medium default-date-picker"  size="16" type="text" value="" />
                                </div>
                            </div>

                            <div class="col-md-4 form-group">
                                <label for="contract_end_date">Contract end date<span style="color:red">*</span></label>
                                @error('contract_end_date')
                                <span style="color:red; font-size: 0.8em">{{ $message }}</span>
                                @enderror
                                <div>
                                    <input id="contract_end_date" name="contract_end_date" class="form-control form-control-inline input-medium default-date-picker"  size="16" type="text" value="" />
                                </div>
                            </div>

                            <div class="col-md-4 form-group">
                                <label for="salary_per_month">Salary per month ($) <span style="color:red">*</span></label>
                                @error('salary_per_month')
                                    <span style="color:red; font-size: 0.8em">{{ $message }}</span>
                                @enderror
                                <input type="number" id="salary_per_month" name="salary_per_month" class="form-control" placeholder="Salary per month">
                            </div>

                            <div class="col-md-4 form-group">
                                <label for="buying_price">Buying Price <span style="color:red">*</span></label>
                                @error('buying_price')
                                    <span style="color:red; font-size: 0.8em">{{ $message }}</span>
                                @enderror
                                <input type="number" id="buying_price" name="buying_price" class="form-control" placeholder="Buying Price">
                            </div>

                            <div class="col-md-4 form-group">
                                <label for="previous_club">Previous Club <span style="color:red">*</span></label>
                                @error('previous_club')
                                    <span style="color:red; font-size: 0.8em">{{ $message }}</span>
                                @enderror
                                <input type="text" id="previous_club" name="previous_club" class="form-control" placeholder="Previous Club">
                            </div>

                            <div class="col-md-4 form-group">
                                <label for="jersy_no">Jersy No.<span style="color:red">*</span></label>
                                @error('jersy_no')
                                    <span style="color:red; font-size: 0.8em">{{ $message }}</span>
                                @enderror
                                <input type="number" id="jersy_no" name="jersy_no" class="form-control" placeholder="Jersy No.">
                            </div>
                            
                            <div class="col-md-4 form-group">
                                <label for="position">Select Position<span style="color:red">*</span></label>
                                @error('position')
                                    <span style="color:red; font-size: 0.8em">{{ $message }}</span>
                                @enderror
                                <select class="form-control m-bot15" id="position" name="position">
                                    <option value="">Select Position</option>
                                    <option value="Goal Keeper">Goal Keeper</option>
                                    <option value="Left Back">Left Back</option>
                                    <option value="Center Back L">Center Back L</option>
                                    <option value="Center Back R">Center Back R</option>
                                    <option value="Right Back">Right Back</option>
                                    <option value="Left Mid">Left Mid</option>
                                    <option value="Center Mid">Center Mid</option>
                                    <option value="Right Mid">Right Mid</option>
                                    <option value="Left Forward">Left Forward</option>
                                    <option value="Center Forward">Center Forward</option>
                                    <option value="Right Forward">Right Forward</option>
                                </select>
                            </div>

                            <div class="col-md-4 form-group">
                                <label id="imageLbl" >Image Upload <span style="color:red">*</span></label>
                                        @error('image')
                                            <span style="color:red; font-size: 0.8em">{{ $message }}</span>
                                        @enderror
                                        <div>
                                            <div class="fileupload fileupload-new" id="imageUploader" data-provides="fileupload">
                                                <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;">
                                                    <img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" alt="" />
                                                </div>
                                                <div class="fileupload-preview fileupload-exists thumbnail" value="{{old('image')}}" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                                                <div class="uploadbtn">
                                                    <span class="btn btn-default btn-file">
                                                    <span class="fileupload-new"><i class="fa fa-paper-clip"></i> Select image</span>
                                                    <span class="fileupload-exists"><i class="fa fa-undo"></i> Change</span>
                                                    <input type="file" name="image" class="default" />
                                                    </span>
                                                    <a href="#" class="btn btn-danger fileupload-exists" id="removeBtn" data-dismiss="fileupload"><i class="fa fa-trash"></i> Remove</a>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- <input type="file" name="image" class="form-control"> -->
                            </div>

                            <div class="col-md-4 form-group pull-right">
                                 <input type="submit" class="btn btn-success pull-right btn-block" id="addPlayerBtn">
                            </div>
                            
                        </div>
                    </div>
            </div>
        </div>
    </div>
 </form>

@endsection

@section('script')
    <!-- country select -->
    <script src="{{asset('admin/country_selector/build/js/countrySelect.min.js')}}"></script>
    <!--image upload-->
    <script type="text/javascript" src="{{asset('admin/js/bootstrap-fileupload.min.js')}}"></script>
    <!--pickers plugins-->
    <script type="text/javascript" src="{{ asset('admin/js/bootstrap-datepicker/js/bootstrap-datepicker.js')}}"></script>
    <script type="text/javascript" src="{{ asset('admin/js/bootstrap-datetimepicker/js/bootstrap-datetimepicker.js')}}"></script>
    <script type="text/javascript" src="{{ asset('admin/js/bootstrap-daterangepicker/moment.min.js')}}"></script>
    <script type="text/javascript" src="{{ asset('admin/js/bootstrap-daterangepicker/daterangepicker.js')}}"></script>
    <script type="text/javascript" src="{{ asset('admin/js/bootstrap-colorpicker/js/bootstrap-colorpicker.js')}}"></script>
    <script type="text/javascript" src="{{ asset('admin/js/bootstrap-timepicker/js/bootstrap-timepicker.js')}}"></script>
    <!--pickers initialization-->
    <script src="{{ asset('admin/js/pickers-init.js')}}"></script>
    <!-- country selector -->
    <script>
        $("#country").countrySelect();
    </script>

@endsection
