@extends('admin.main')

@section('title')
<title>Tournaments</title>
@endsection

@section('content')
<!-- page heading start-->
<div class="page-heading">
    <div class="row">
        <div class="col-md-12">
            <div class="col-md-4">
                <h3>
                    Tournaments
                </h3>
                <ul class="breadcrumb">
                    <li class="active"> Tournaments</li>
                </ul>
            </div>

            <div class="col-md-4" style="margin-top: 16px">
                <div id="end-T"></div> <span>End Tournaments</span><br>
                <div id="running-T"></div> <span>Running Tournaments</span><br>
                <div id="upcomming-T"></div> <span>Upcomming Tournaments</span><br>
            </div>

            <div class="col-md-4">
                <a href="/tournaments/create" class="btn btn-success pull-right" style="margin-top: 16px">Create Tournament</a>
            </div>
        </div>
    </div>
    @if(session()->has('message'))
        <div class="alert alert-success">
            {{ session()->get('message') }}
        </div>
    @endif

</div>
<hr>
<!-- page heading end-->
<!--body wrapper start-->
<div class="wrapper">
    <div class="row">
        <div class="col-md-12">
            <!--statistics start-->
            <div class="row state-overview">

                @foreach( $tournaments as $tournament)
                <div class="col-md-6 col-xs-12 col-sm-4">
                    <div style="" class="panel {{$tournament->start_date > date('m/d/Y') ? 'purple' : 
                    ($tournament->start_date <= date('m/d/Y') && $tournament->end_date > date('m/d/Y') ? 'green' : 'red')}}">
                        <div class="row">
                            <div class="col-md-2">
                                <img class="index-T-logo" src="{{asset('/')}}admin/image/tournament-logo/{{$tournament->logo}}"alt="">
                            </div>
                            <div class="col-md-10">
                                <div class="state-value">
                                <div class="value">{{$tournament->name}}<small>({{$tournament->season}})</small></div>
                                <div class="title inedx-T-date">Start date : {{$tournament->start_date}}</div>
                                <div class="title inedx-T-date">End date : {{$tournament->end_date}}</div>
                                <a href="/tournaments/{{$tournament->id}}" class="tournament-details">View Matches</a>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
                
                @endforeach
            </div>

        </div>
    </div>
</div>

@endsection