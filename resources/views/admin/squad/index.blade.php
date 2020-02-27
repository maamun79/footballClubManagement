@extends('admin.main')

@section('title')
 <title>Squad</title>
@endsection

@section('style')
<link href="{{ asset('admin/squad.css')}}" rel="stylesheet">
@endsection

@section('content')
 <!-- page heading start-->
<div class="page-heading">
    <div class="row">
        <div class="col-md-12">
            <div class="col-md-6">
                <h3>
                    Squad
                </h3>
                <ul class="breadcrumb">
                    <li class="active">Squad</li>
                </ul>
            </div>

            <div class="col-md-6">
                <a href="/squad/create" class="btn btn-success pull-right" style="margin-top: 16px">Publish Squad</a>
                
            </div>
        </div>
    </div>
</div>
 <!-- page heading end-->
<hr/>
<div class="wrapper">
    <div class="test">
        <main style="opacity: 1;" class="">
            <div class="js-stage stage texture">
                <div style="opacity: 1; transform: translateZ(-200px) translateY(0px);" class="js-world world">
                    
                    <div class="terrain js-terrain">
                        <div class="field field--alt"></div>
                        <div class="field ground">
                            <div class="field__texture field__texture--gradient"></div>
                            <div class="field__texture field__texture--gradient-b"></div>
                            <div class="field__texture field__texture--grass"></div>
                            <div class="field__line field__line--goal"></div>
                            <div class="field__line field__line--goal field__line--goal--far"></div>
                            <div class="field__line field__line--outline"></div>
                            <div class="field__line field__line--penalty">
                            
                                <!-- <select class="form-control" id="position" name="position">
                                    <option value="">Select GK</option>
                                    <option value="Goal Keeper">Goal Keeper</option>
                                    <option value="Centre Back">Centre Back</option>
                                    <option value="Full Back">Full Back</option>
                                </select> -->
                            
                            </div>
                            <div class="field__line field__line--penalty-arc"></div>
                            <div class="field__line field__line--penalty-arc field__line--penalty-arc--far"></div>
                            <div class="field__line field__line--mid"></div>
                            <div class="field__line field__line--circle"></div>
                            <div class="field__line field__line--penalty field__line--penalty--far">

                                
                            </div>
                        </div>
                        <div class="field__side field__side--front"></div>
                        <div class="field__side field__side--left"></div>
                        <div class="field__side field__side--right"></div>
                        <div class="field__side field__side--back"></div>
                    </div>
                </div>

            </div>
        </main>
    </div>
</div>
@endsection

<!-- @section('script')
    <script src="{{ asset('admin/squad.js')}}"></script>
@endsection -->