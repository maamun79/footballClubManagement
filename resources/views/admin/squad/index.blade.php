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
    @if(session()->has('message'))
        <div class="alert alert-success">
            {{ session()->get('message') }}
        </div>
    @endif
</div>
 <!-- page heading end-->
<hr/>
<div class="wrapper">
    <div class="row">
        <div class="col-md-4 side-selection">
            <!-- tab panel -->
            <section class="panel" style="border-radius: 0">
                <header class="panel-heading custom-tab" style="background-color:white !important">
                    <ul class="nav nav-tabs" id="squad-side">
                        <li class="active col-md-6">
                            <a href="#general" data-toggle="tab" class="text-center">
                                General
                            </a>
                        </li>
                        <li class=" col-md-6">
                            <a href="#players" data-toggle="tab" class="text-center">
                                Players
                            </a>
                        </li>
                    </ul>
                </header>
                <div class="panel-body">
                    <div class="tab-content">
                        <!-- -------general--------- -->
                        <div class="tab-pane active" id="general">
                            <!-- selecting options -->
                            <div class="row">
                                <div class="col-md-12 form-group">
                                    <label for="tournament">Select Tournament<span style="color:red">*</span></label>
                                    <select class="form-control m-bot15" id="tournament" name="tournament">
                                        <option value="">Select Tournament</option>
                                        <!-- fetch tournaments for declaring squad -->
                                        <option value="">Test 1</option>
                                        <option value="">Test 2</option>
                                    </select>
                                </div>

                                <div class="col-md-12 form-group">
                                    <label for="match">Select Match<span style="color:red">*</span></label>
                                    <select class="form-control m-bot15" id="match" name="match">
                                        <option value="">Select Match</option>
                                        <!-- fetch tournaments for declaring squad -->
                                        <option value="">Test 1</option>
                                        <option value="">Test 2</option>
                                    </select>
                                </div>

                                <div class="col-md-12 form-group">
                                    <label for="formation">Select Formation<span style="color:red">*</span></label>
                                    <select class="form-control m-bot15" id="formation" name="formation">
                                        <option value="">Select Formation</option>
                                        <!-- fetch tournaments for declaring squad -->
                                        <option value="">4-4-2</option>
                                        <option value="">4-2-3-1</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <!-- -------players--------- -->
                        <div class="tab-pane" id="players">
                            <div class="row">
                                <div class="col-md-6" style="margin-right: -6px;">
                                    <div ondrop="drop(event)" ondragover="allowDrop(event)" class="side-img-div">
                                        <div draggable="true" ondragstart="drag(event)" id="drag1">
                                            <img src="{{asset('admin/image/player/1581099705.png')}}" alt="" class="player-img-side">
                                            <p style="color:#fff;margin: 0;text-align: center;">Mamun (10)</p>
                                            <p style="color:#fff;margin: 0;text-align: center;">Left Back</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6" style="margin-right: -6px;">
                                    <div ondrop="drop(event)" ondragover="allowDrop(event)" class="side-img-div">
                                        <div draggable="true" ondragstart="drag(event)" id="drag2">
                                            <img src="{{asset('admin/image/player/1581099705.png')}}" alt="" class="player-img-side">
                                            <p style="color:#fff;margin: 0;text-align: center;">Mamun (10)</p>
                                            <p style="color:#fff;margin: 0;text-align: center;">Left Back</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6" style="margin-right: -6px;">
                                    <div ondrop="drop(event)" ondragover="allowDrop(event)" class="side-img-div">
                                        <div draggable="true" ondragstart="drag(event)" id="drag3">
                                            <img src="{{asset('admin/image/player/1581099705.png')}}" alt="" class="player-img-side">
                                            <p style="color:#fff;margin: 0;text-align: center;">Mamun (10)</p>
                                            <p style="color:#fff;margin: 0;text-align: center;">Left Back</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6" style="margin-right: -6px;">
                                    <div ondrop="drop(event)" ondragover="allowDrop(event)" class="side-img-div">
                                        <div draggable="true" ondragstart="drag(event)" id="drag4">
                                            <img src="{{asset('admin/image/player/1581099705.png')}}" alt="" class="player-img-side">
                                            <p class="player-text">Mamun (10)</p>
                                            <p class="player-text">Left Back</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6" style="margin-right: -6px;">
                                    <div ondrop="drop(event)" ondragover="allowDrop(event)" class="side-img-div">
                                        <div draggable="true" ondragstart="drag(event)" id="drag5">
                                            <img src="{{asset('admin/image/player/1581099705.png')}}" alt="" class="player-img-side">
                                            <p class="player-text">Mamun (10)</p>
                                            <p class="player-text">Left Back</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6" style="margin-right: -6px;">
                                    <div ondrop="drop(event)" ondragover="allowDrop(event)" class="side-img-div">
                                        <div draggable="true" ondragstart="drag(event)" id="drag6">
                                            <img src="{{asset('admin/image/player/1581099705.png')}}" alt="" class="player-img-side">
                                            <p class="player-text">Mamun (10)</p>
                                            <p class="player-text">Left Back</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6" style="margin-right: -6px;">
                                    <div ondrop="drop(event)" ondragover="allowDrop(event)" class="side-img-div">
                                        <div draggable="true" ondragstart="drag(event)" id="drag7">
                                            <img src="{{asset('admin/image/player/1581099705.png')}}" alt="" class="player-img-side">
                                            <p class="player-text">Mamun (10)</p>
                                            <p class="player-text">Left Back</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6" style="margin-right: -6px;">
                                    <div ondrop="drop(event)" ondragover="allowDrop(event)" class="side-img-div">
                                        <div draggable="true" ondragstart="drag(event)" id="drag8">
                                            <img src="{{asset('admin/image/player/1581099705.png')}}" alt="" class="player-img-side">
                                            <p class="player-text">Mamun (10)</p>
                                            <p class="player-text">Left Back</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6" style="margin-right: -6px;">
                                    <div ondrop="drop(event)" ondragover="allowDrop(event)" class="side-img-div">
                                        <div draggable="true" ondragstart="drag(event)" id="drag9">
                                            <img src="{{asset('admin/image/player/1581099705.png')}}" alt="" class="player-img-side">
                                            <p class="player-text">Mamun (10)</p>
                                            <p class="player-text">Left Back</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6" style="margin-right: -6px;">
                                    <div ondrop="drop(event)" ondragover="allowDrop(event)" class="side-img-div">
                                        <div draggable="true" ondragstart="drag(event)" id="drag10">
                                            <img src="{{asset('admin/image/player/1581099705.png')}}" alt="" class="player-img-side">
                                            <p class="player-text">Mamun (10)</p>
                                            <p class="player-text">Left Back</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6" style="margin-right: -6px;">
                                    <div ondrop="drop(event)" ondragover="allowDrop(event)" class="side-img-div">
                                        <div draggable="true" ondragstart="drag(event)" id="drag11">
                                            <img src="{{asset('admin/image/player/1581099705.png')}}" alt="" class="player-img-side">
                                            <p class="player-text">Mamun (10)</p>
                                            <p class="player-text">Left Back</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <button class="btn btn-success">Submit</button>
        </div>
        <!-- /tab panel -->
        
        
        <!-- pitch -->
        <div class="col-md-7">
            <!-- ========================= include pitch ==================== -->
            @include('admin.squad.inc.pitch')
            <!-- ========================= /include pitch ==================== -->
        </div>
    </div>
<script>
    function allowDrop(ev) {
    ev.preventDefault();
    }

    function drag(ev) {
    ev.dataTransfer.setData("text", ev.target.id);
    }

    function drop(ev) {
    ev.preventDefault();
    var data = ev.dataTransfer.getData("text");
    ev.target.appendChild(document.getElementById(data));
}
</script>
</div>
@endsection

<!-- @section('script')
    <script src="{{ asset('admin/squad.js')}}"></script>
@endsection -->