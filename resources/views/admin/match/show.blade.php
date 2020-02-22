@extends('admin.main')

@section('title')
<title>Match Details</title>
@endsection

@section('content')
<!-- page heading start-->
<div class="page-heading">
    <div class="row">
        <div class="col-md-12">
            <div class="col-md-6">
                <h3>
                    Match Details</small>
                </h3>
                <ul class="breadcrumb">
                    <li>
                        <a href="/tournaments">Tournaments</a>
                    </li>
                    <li>
                        <a href="/tournaments/{{$tournament->id}}">Matches</a>
                    </li>
                    <li class="active">Details</li>
                </ul>
            </div>

            @if($matchStat->isEmpty())
                <div class="col-md-6">
                    <a href="/tournaments/{{$tournament->id}}/matches/{{$match->id}}/matchStats/create" class="btn btn-success pull-right" style="margin-top: 16px">Add Stats</a>
                </div>
            @endif
        </div>
    </div>
    <!-- @if(session()->has('message'))
        <div class="alert alert-success">
            {{ session()->get('message') }}
        </div>
    @endif -->

</div>
<hr>
<!-- page heading end-->
<div class="wrapper">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div>
                <div id="fixture-table-head">
                    <img class="tournament-logo" src="{{asset('/')}}admin/image/tournament-logo/{{$tournament->logo}}"
                        alt="">
                    <span class="table-title">{{$tournament->name}}({{$tournament->season}})</span><br>
                    <span class="table-title-date">Match Date : {{$match->match_date}}</span><br>
                    <span class="table-title-date">Starting Time : {{$match->starting_time}}</span><br>
                </div>
                <div id="match-stats">
                <!-- -----------------------Condition for home or away match-------------------------------- -->
                    @if($match->match_type == 'Home')
                        <div class="row">
                            <div class="col-md-5">
                                <span style="margin-left: 15px;">Match Day : {{$match->match_day}} ({{$match->match_type}})</span>
                                <div class="text-center">
                                    <div>
                                        <img id="match-stats-logo" src="{{ asset('admin/image/club-logo/fcb.png') }}" alt="">
                                    </div>
                                    <div>
                                        <span>Barcelona</span>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-2">
                                <div style="margin-top: 80px;">
                                    <div class="col-md-4">
                                        <span style="font-size: 2em; font-weight: 300;">
                                            @if($matchStat->isEmpty())
                                                -
                                            @else
                                                {{$matchStat[0]->goal}} 
                                            @endif
                                        </span>
                                    </div>
                                    <div class="col-md-4">
                                        <span><strong>&nbspVS</strong></span>
                                    </div>
                                    <div class="col-md-4">
                                        <span style="font-size: 2em; font-weight: 300;">
                                            @if($matchStat->isEmpty())
                                                -
                                            @else
                                                {{$matchStat[0]->goal_consided}}
                                            @endif
                                        </span>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-5">
                                <div class="text-center">
                                    <div>
                                        <img class="" id="match-stats-2nd-team-logo"
                                            src="{{asset('/')}}admin/image/club-logo/{{$match->opposite_team_logo}}" alt="">
                                    </div>
                                    <div>
                                        <span>{{$match->opposite_team}}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @elseif($match->match_type == 'Away')
                        <div class="row">
                            <div class="col-md-5">
                                <span style="margin-left: 15px;">Match Day : {{$match->match_day}} ({{$match->match_type}})</span>
                                <div class="text-center">
                                    <div>
                                        <img class="" id="match-stats-2nd-team-logo-away"
                                            src="{{asset('/')}}admin/image/club-logo/{{$match->opposite_team_logo}}" alt="">
                                    </div>
                                    <div>
                                        <span>{{$match->opposite_team}}</span>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-2">
                                <div style="margin-top: 80px;">
                                    <div class="col-md-4">
                                        <span style="font-size: 2em; font-weight: 300;">
                                            @if($matchStat->isEmpty())
                                                -
                                            @else
                                                {{$matchStat[0]->goal_consided}}
                                            @endif
                                        </span>
                                    </div>
                                    <div class="col-md-4">
                                        <span><strong>&nbspVS</strong></span>
                                    </div>
                                    <div class="col-md-4">
                                        <span style="font-size: 2em; font-weight: 300;">
                                            @if($matchStat->isEmpty())
                                                -
                                            @else
                                                {{$matchStat[0]->goal}} 
                                            @endif
                                        </span>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-5">
                                <div class="text-center">
                                    <div>
                                        <img id="match-stats-logo" src="{{ asset('admin/image/club-logo/fcb.png') }}" alt="">
                                    </div>
                                    <div>
                                        <span>Barcelona</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                <!-- -----------------------/ Condition for home or away match-------------------------------- -->
                </div>
                <!-- ---------------tabs--------------- -->
                <section class="panel" style="border-radius: 0">
                    <header class="panel-heading custom-tab" style="background-color:white !important">
                        <ul class="nav nav-tabs" id="stats-nav">
                            <li class="active col-md-6">
                                <a href="#lineups" data-toggle="tab" class="text-center">
                                    Lineups
                                </a>
                            </li>
                            <li class=" col-md-6">
                                <a href="#stats" data-toggle="tab" class="text-center">
                                    Stats
                                </a>
                            </li>
                        </ul>
                    </header>
                    <div class="panel-body">
                        <div class="tab-content">
                            <!-- -------lineups--------- -->
                            <div class="tab-pane active" id="lineups">
                                <div>
                                    <!-- -----------lineup pitch----------- -->
                                    
                                    <!-- -----------/lineup pitch----------- -->
                                </div>
                            </div>
                            <!-- ----------stats---------- -->
                            <div class="tab-pane " id="stats">
                                @if($matchStat->isEmpty())
                                    <p style="color:black">Not Publish Yet</p>
                                @else
                                    <div class="col-md-8 col-md-offset-3" style="color:black">
                                        <div class="col-md-6">
                                            <p>Total Shots</p>
                                            <p>Shots on Target</p>
                                            <p>Possession</p>
                                            <p>Total Passes</p>
                                            <p>Pass Accuracy</p>
                                            <p>Foul Attempted</p>
                                            <p>Fouls</p>
                                            <p>Yellow Cards</p>
                                            <p>Red Cards</p>
                                            <p>Offsides</p>
                                            <p>Corners</p>
                                            <p>Goals</p>
                                            <p>Opponent Goals</p>
                                        </div>
                                        <div class="col-md-6">
                                            <p>{{$matchStat[0]->shots}}</p>
                                            <p>{{$matchStat[0]->shots_on_target}}</p>
                                            <p>{{$matchStat[0]->possession}}%</p>
                                            <p>{{$matchStat[0]->passes}}</p>
                                            <p>{{$matchStat[0]->pass_accuracy}}%</p>
                                            <p>{{$matchStat[0]->foul_commited}}</p>
                                            <p>{{$matchStat[0]->foul_conside}}</p>
                                            <p>{{$matchStat[0]->yellow_cards}}</p>
                                            <p>{{$matchStat[0]->red_cards}}</p>
                                            <p>{{$matchStat[0]->offsides}}</p>
                                            <p>{{$matchStat[0]->corners}}</p>
                                            <p>{{$matchStat[0]->goal}}</p>
                                            <p>{{$matchStat[0]->goal_consided}}</p>
                                        </div>
                                    </div>
                                
                                    
                                @endif
                            </div>
                        </div>
                    </div>
                </section>
                <!-- ---------------tabs--------------- -->
            </div>
        </div>
    </div>
</div>

@endsection
