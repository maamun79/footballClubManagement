@extends('admin.main')

@section('title')
<title>Match Details</title>
@endsection

@section('style')
    <script src="{{asset('admin/steps/jquery.steps.js')}}"></script>
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

            <div class="col-md-6">
                @if($matchStat->isEmpty())
                    <a href="/tournaments/{{$tournament->id}}/matches/{{$match->id}}/matchStats/create" class="btn btn-success pull-right" style="margin-top: 16px">Add Stats</a>
                @endif
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
                                             <!-- showing match scores -->
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
                                            <!-- showing opposite team scores -->
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
                                            <!-- showing opposite team scores for away match -->
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
                                            <!-- showing scores for away match -->
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
                              @if($squads->isEmpty())
                                <span>Not Published Yet</span>
                              @else
                                <div class="full-field">
                                    <!-- -----------lineup pitch----------- -->
                                    <div class="side-top">
                                        <div class="goal-bar1">
                                    
                                        </div>
                                        @foreach($squads as $squad)
                                            <!-- left mid -->
                                            @if($squad->position == "Left Mid")
                                                <div class="lineups lm">
                                                    <!-- ------------card------------ -->
                                                    <div class="">
                                                        @foreach($stats as $stat)
                                                            @if($squad->player_id == $stat->player_id && $stat->red_card > 0 && $stat->yellow_card == 0)
                                                                <img src="{{asset('admin/image/logo/red-card.png')}}" class="card" alt="">
                                                            @elseif($squad->player_id == $stat->player_id && $stat->yellow_card > 0 && $stat->red_card == 0)
                                                                <img src="{{asset('admin/image/logo/yellow-card.png')}}" class="card" alt="">
                                                            @elseif($squad->player_id == $stat->player_id && $stat->yellow_card > 0 && $stat->red_card > 0)
                                                                <img src="{{asset('admin/image/logo/red-card.png')}}" class="card" alt="">
                                                            @endif
                                                        @endforeach
                                                    </div>
                                                    <!-- ------------/card------------ -->
                                                    <a href="#" class="" data-toggle="modal" data-target="#exampleModal{{$squad->player_id}}">
                                                        <div>
                                                            <span class="jersy_no">{{$squad->jersy_no}}</span>
                                                        </div>
                                                    <!-- -----------------scorrer------------------ -->
                                                        <div class="">
                                                            @foreach($stats as $stat)
                                                                @if($squad->player_id == $stat->player_id && $stat->goals > 0)
                                                                    <img src="{{asset('admin/image/logo/football.png')}}" class="score-ball" alt="">
                                                                @endif
                                                            @endforeach
                                                        </div>
                                                        <!-- -----------------/scorrer------------------ -->
                                                        <div>
                                                            <p style="color: #fff">{{$squad->last_name}}</p>
                                                        </div>
                                                    </a>
                                                    @foreach($stats as $stat)
                                                        @if($squad->player_id == $stat->player_id)
                                                            <p class="rating-front">{{$stat->rating}}</p>
                                                        @endif
                                                    @endforeach
                                                </div>
                                            @endif
                                        @endforeach

                                        @foreach($squads as $squad)
                                            <!-- center mid -->
                                            @if($squad->position == "Center Mid")
                                                <div class="lineups cm">
                                                    <!-- ------------card------------ -->
                                                    <div class="">
                                                        @foreach($stats as $stat)
                                                            @if($squad->player_id == $stat->player_id && $stat->red_card > 0 && $stat->yellow_card == 0)
                                                                <img src="{{asset('admin/image/logo/red-card.png')}}" class="card" alt="">
                                                            @elseif($squad->player_id == $stat->player_id && $stat->yellow_card > 0 && $stat->red_card == 0)
                                                                <img src="{{asset('admin/image/logo/yellow-card.png')}}" class="card" alt="">
                                                            @elseif($squad->player_id == $stat->player_id && $stat->yellow_card > 0 && $stat->red_card > 0)
                                                                <img src="{{asset('admin/image/logo/red-card.png')}}" class="card" alt="">
                                                            @endif
                                                        @endforeach
                                                    </div>
                                                    <!-- ------------/card------------ -->
                                                    <a href="#" class="" data-toggle="modal" data-target="#exampleModal{{$squad->player_id}}">
                                                        <div>
                                                            <span class="jersy_no">{{$squad->jersy_no}}</span>
                                                        </div>
                                                    <!-- -----------------scorrer------------------ -->
                                                        <div class="">
                                                            @foreach($stats as $stat)
                                                                @if($squad->player_id == $stat->player_id && $stat->goals > 0)
                                                                    <img src="{{asset('admin/image/logo/football.png')}}" class="score-ball" alt="">
                                                                @endif
                                                            @endforeach
                                                        </div>
                                                        <!-- -----------------/scorrer------------------ -->
                                                        <div>
                                                            <p style="color: #fff">{{$squad->last_name}}</p>
                                                        </div>
                                                    </a>
                                                    @foreach($stats as $stat)
                                                        @if($squad->player_id == $stat->player_id)
                                                            <p class="rating-front">{{$stat->rating}}</p> 
                                                        @endif   
                                                    @endforeach                                   
                                                </div>
                                            @endif
                                        @endforeach

                                        @foreach($squads as $squad)
                                            <!-- right mid -->
                                            @if($squad->position == "Right Mid")
                                                <div class="lineups rm">
                                                    <!-- ------------card------------ -->
                                                    <div class="">
                                                        @foreach($stats as $stat)
                                                            @if($squad->player_id == $stat->player_id && $stat->red_card > 0 && $stat->yellow_card == 0)
                                                                <img src="{{asset('admin/image/logo/red-card.png')}}" class="card" alt="">
                                                            @elseif($squad->player_id == $stat->player_id && $stat->yellow_card > 0 && $stat->red_card == 0)
                                                                <img src="{{asset('admin/image/logo/yellow-card.png')}}" class="card" alt="">
                                                            @elseif($squad->player_id == $stat->player_id && $stat->yellow_card > 0 && $stat->red_card > 0)
                                                                <img src="{{asset('admin/image/logo/red-card.png')}}" class="card" alt="">
                                                            @endif
                                                        @endforeach
                                                    </div>
                                                    <!-- ------------/card------------ -->
                                                    <a href="#" class="" data-toggle="modal" data-target="#exampleModal{{$squad->player_id}}">
                                                        <div>
                                                            <span class="jersy_no">{{$squad->jersy_no}}</span>
                                                        </div>
                                                    <!-- -----------------scorrer------------------ -->
                                                        <div class="">
                                                            @foreach($stats as $stat)
                                                                @if($squad->player_id == $stat->player_id && $stat->goals > 0)
                                                                    <img src="{{asset('admin/image/logo/football.png')}}" class="score-ball" alt="">
                                                                @endif
                                                            @endforeach
                                                        </div>
                                                        <!-- -----------------/scorrer------------------ -->
                                                        <div>
                                                            <p style="color: #fff">{{$squad->last_name}}</p>
                                                        </div>
                                                    </a>
                                                    @foreach($stats as $stat)
                                                        @if($squad->player_id == $stat->player_id)
                                                            <p class="rating-front">{{$stat->rating}}</p>
                                                        @endif
                                                    @endforeach
                                                </div>
                                            @endif
                                        @endforeach

                                        @foreach($squads as $squad)
                                        <!-- left forward -->
                                            @if($squad->position == "Left Forward")
                                                <div class="lineups lf">
                                                    <!-- ------------card------------ -->
                                                    <div class="">
                                                        @foreach($stats as $stat)
                                                            @if($squad->player_id == $stat->player_id && $stat->red_card > 0 && $stat->yellow_card == 0)
                                                                <img src="{{asset('admin/image/logo/red-card.png')}}" class="card" alt="">
                                                            @elseif($squad->player_id == $stat->player_id && $stat->yellow_card > 0 && $stat->red_card == 0)
                                                                <img src="{{asset('admin/image/logo/yellow-card.png')}}" class="card" alt="">
                                                            @elseif($squad->player_id == $stat->player_id && $stat->yellow_card > 0 && $stat->red_card > 0)
                                                                <img src="{{asset('admin/image/logo/red-card.png')}}" class="card" alt="">
                                                            @endif
                                                        @endforeach
                                                    </div>
                                                    <!-- ------------/card------------ -->
                                                    <a href="#" class="" data-toggle="modal" data-target="#exampleModal{{$squad->player_id}}">
                                                        <div>
                                                            <span class="jersy_no">{{$squad->jersy_no}}</span>
                                                        </div>
                                                    <!-- -----------------scorrer------------------ -->
                                                        <div class="">
                                                            @foreach($stats as $stat)
                                                                @if($squad->player_id == $stat->player_id && $stat->goals > 0)
                                                                    <img src="{{asset('admin/image/logo/football.png')}}" class="score-ball" alt="">
                                                                @endif
                                                            @endforeach
                                                        </div>
                                                        <!-- -----------------/scorrer------------------ -->
                                                        <div>
                                                            <p style="color: #fff">{{$squad->last_name}}</p>
                                                        </div>
                                                    </a>
                                                    @foreach($stats as $stat)
                                                        @if($squad->player_id == $stat->player_id)
                                                            <p class="rating-front">{{$stat->rating}}</p>
                                                        @endif
                                                    @endforeach
                                                </div>
                                            @endif
                                        @endforeach

                                        @foreach($squads as $squad)
                                        <!-- center forward -->
                                            @if($squad->position == "Center Forward")
                                                <div class="lineups cf">
                                                    <!-- ------------card------------ -->
                                                    <div class="">
                                                        @foreach($stats as $stat)
                                                            @if($squad->player_id == $stat->player_id && $stat->red_card > 0 && $stat->yellow_card == 0)
                                                                <img src="{{asset('admin/image/logo/red-card.png')}}" class="card" alt="">
                                                            @elseif($squad->player_id == $stat->player_id && $stat->yellow_card > 0 && $stat->red_card == 0)
                                                                <img src="{{asset('admin/image/logo/yellow-card.png')}}" class="card" alt="">
                                                            @elseif($squad->player_id == $stat->player_id && $stat->yellow_card > 0 && $stat->red_card > 0)
                                                                <img src="{{asset('admin/image/logo/red-card.png')}}" class="card" alt="">
                                                            @endif
                                                        @endforeach
                                                    </div>
                                                    <!-- ------------/card------------ -->
                                                    <a href="#" class="" data-toggle="modal" data-target="#exampleModal{{$squad->player_id}}">
                                                        <div>
                                                            <span class="jersy_no">{{$squad->jersy_no}}</span>
                                                        </div>
                                                    <!-- -----------------scorrer------------------ -->
                                                        <div class="">
                                                            @foreach($stats as $stat)
                                                                @if($squad->player_id == $stat->player_id && $stat->goals > 0)
                                                                    <img src="{{asset('admin/image/logo/football.png')}}" class="score-ball" alt="">
                                                                @endif
                                                            @endforeach
                                                        </div>
                                                        <!-- -----------------/scorrer------------------ -->
                                                        <div>
                                                            <p style="color: #fff">{{$squad->last_name}}</p>
                                                        </div>
                                                    </a>
                                                    @foreach($stats as $stat)
                                                        @if($squad->player_id == $stat->player_id)
                                                            <p class="rating-front">{{$stat->rating}}</p>
                                                        @endif
                                                    @endforeach
                                                </div>
                                            @endif
                                        @endforeach

                                        @foreach($squads as $squad)
                                            <!-- right forward -->
                                            @if($squad->position == "Right Forward")
                                                <div class="lineups rf">
                                                    <!-- ------------card------------ -->
                                                    <div class="">
                                                        @foreach($stats as $stat)
                                                            @if($squad->player_id == $stat->player_id && $stat->red_card > 0 && $stat->yellow_card == 0)
                                                                <img src="{{asset('admin/image/logo/red-card.png')}}" class="card" alt="">
                                                            @elseif($squad->player_id == $stat->player_id && $stat->yellow_card > 0 && $stat->red_card == 0)
                                                                <img src="{{asset('admin/image/logo/yellow-card.png')}}" class="card" alt="">
                                                            @elseif($squad->player_id == $stat->player_id && $stat->yellow_card > 0 && $stat->red_card > 0)
                                                                <img src="{{asset('admin/image/logo/red-card.png')}}" class="card" alt="">
                                                            @endif
                                                        @endforeach
                                                    </div>
                                                    <!-- ------------/card------------ -->
                                                    <a href="#" class="" data-toggle="modal" data-target="#exampleModal{{$squad->player_id}}">
                                                        <div>
                                                            <span class="jersy_no">{{$squad->jersy_no}}</span>
                                                        </div>
                                                    <!-- -----------------scorrer------------------ -->
                                                        <div class="">
                                                            @foreach($stats as $stat)
                                                                @if($squad->player_id == $stat->player_id && $stat->goals > 0)
                                                                    <img src="{{asset('admin/image/logo/football.png')}}" class="score-ball" alt="">
                                                                @endif
                                                            @endforeach
                                                        </div>
                                                        <!-- -----------------/scorrer------------------ -->
                                                        <div>
                                                            <p style="color: #fff">{{$squad->last_name}}</p>
                                                        </div>
                                                    </a>
                                                    @foreach($stats as $stat)
                                                        @if($squad->player_id == $stat->player_id)
                                                            <p class="rating-front">{{$stat->rating}}</p>
                                                        @endif
                                                    @endforeach
                                                </div>
                                            @endif
                                        @endforeach
                                    </div>
                                    <div class="middle-circle">

                                    </div>

                                    <div class="side-bottom">
                                        @foreach($squads as $squad)
                                            <!-- left back -->
                                            @if($squad->position == "Left Back")
                                                <div class="lineups lb">
                                                    <!-- ------------card------------ -->
                                                    <div class="">
                                                        @foreach($stats as $stat)
                                                            @if($squad->player_id == $stat->player_id && $stat->red_card > 0 && $stat->yellow_card == 0)
                                                                <img src="{{asset('admin/image/logo/red-card.png')}}" class="card" alt="">
                                                            @elseif($squad->player_id == $stat->player_id && $stat->yellow_card > 0 && $stat->red_card == 0)
                                                                <img src="{{asset('admin/image/logo/yellow-card.png')}}" class="card" alt="">
                                                            @elseif($squad->player_id == $stat->player_id && $stat->yellow_card > 0 && $stat->red_card > 0)
                                                                <img src="{{asset('admin/image/logo/red-card.png')}}" class="card" alt="">
                                                            @endif
                                                        @endforeach
                                                    </div>
                                                    <!-- ------------/card------------ -->
                                                    <a href="#" class="" data-toggle="modal" data-target="#exampleModal{{$squad->player_id}}">
                                                        <div>
                                                            <span class="jersy_no">{{$squad->jersy_no}}</span>
                                                        </div>
                                                    <!-- -----------------scorrer------------------ -->
                                                        <div class="">
                                                            @foreach($stats as $stat)
                                                                @if($squad->player_id == $stat->player_id && $stat->goals > 0)
                                                                    <img src="{{asset('admin/image/logo/football.png')}}" class="score-ball" alt="">
                                                                @endif
                                                            @endforeach
                                                        </div>
                                                        <!-- -----------------/scorrer------------------ -->
                                                        <div>
                                                            <p style="color: #fff">{{$squad->last_name}}</p>
                                                        </div>
                                                    </a>
                                                    @foreach($stats as $stat)
                                                        @if($squad->player_id == $stat->player_id)
                                                            <p class="rating-front">{{$stat->rating}}</p>
                                                        @endif
                                                    @endforeach
                                                </div>
                                            @endif
                                        @endforeach

                                        @foreach($squads as $squad)
                                            <!-- center back 1 -->
                                            @if($squad->position == "Center Back L")
                                                <div class="lineups cb1">
                                                    <!-- ------------card------------ -->
                                                    <div class="">
                                                        @foreach($stats as $stat)
                                                            @if($squad->player_id == $stat->player_id && $stat->red_card > 0 && $stat->yellow_card == 0)
                                                                <img src="{{asset('admin/image/logo/red-card.png')}}" class="card" alt="">
                                                            @elseif($squad->player_id == $stat->player_id && $stat->yellow_card > 0 && $stat->red_card == 0)
                                                                <img src="{{asset('admin/image/logo/yellow-card.png')}}" class="card" alt="">
                                                            @elseif($squad->player_id == $stat->player_id && $stat->yellow_card > 0 && $stat->red_card > 0)
                                                                <img src="{{asset('admin/image/logo/red-card.png')}}" class="card" alt="">
                                                            @endif
                                                        @endforeach
                                                    </div>
                                                    <!-- ------------/card------------ -->
                                                    <a href="#" class="" data-toggle="modal" data-target="#exampleModal{{$squad->player_id}}">
                                                        <div>
                                                            <span class="jersy_no">{{$squad->jersy_no}}</span>
                                                        </div>
                                                    <!-- -----------------scorrer------------------ -->
                                                        <div class="">
                                                            @foreach($stats as $stat)
                                                                @if($squad->player_id == $stat->player_id && $stat->goals > 0)
                                                                    <img src="{{asset('admin/image/logo/football.png')}}" class="score-ball" alt="">
                                                                @endif
                                                            @endforeach
                                                        </div>
                                                        <!-- -----------------/scorrer------------------ -->
                                                        <div>
                                                            <p style="color: #fff">{{$squad->last_name}}</p>
                                                        </div>
                                                    </a>
                                                    @foreach($stats as $stat)
                                                        @if($squad->player_id == $stat->player_id)
                                                            <p class="rating-front">{{$stat->rating}}</p>
                                                        @endif
                                                    @endforeach
                                                </div>
                                            @endif
                                        @endforeach

                                        @foreach($squads as $squad)
                                            <!-- center back 2 -->
                                            @if($squad->position == "Center Back R")
                                                <div class="lineups cb2">
                                                    <!-- ------------card------------ -->
                                                    <div class="">
                                                        @foreach($stats as $stat)
                                                            @if($squad->player_id == $stat->player_id && $stat->red_card > 0 && $stat->yellow_card == 0)
                                                                <img src="{{asset('admin/image/logo/red-card.png')}}" class="card" alt="">
                                                            @elseif($squad->player_id == $stat->player_id && $stat->yellow_card > 0 && $stat->red_card == 0)
                                                                <img src="{{asset('admin/image/logo/yellow-card.png')}}" class="card" alt="">
                                                            @elseif($squad->player_id == $stat->player_id && $stat->yellow_card > 0 && $stat->red_card > 0)
                                                                <img src="{{asset('admin/image/logo/red-card.png')}}" class="card" alt="">
                                                            @endif
                                                        @endforeach
                                                    </div>
                                                    <!-- ------------/card------------ -->
                                                    <a href="#" class="" data-toggle="modal" data-target="#exampleModal{{$squad->player_id}}">
                                                        <div>
                                                            <span class="jersy_no">{{$squad->jersy_no}}</span>
                                                        </div>
                                                    <!-- -----------------scorrer------------------ -->
                                                        <div class="">
                                                            @foreach($stats as $stat)
                                                                @if($squad->player_id == $stat->player_id && $stat->goals > 0)
                                                                    <img src="{{asset('admin/image/logo/football.png')}}" class="score-ball" alt="">
                                                                @endif
                                                            @endforeach
                                                        </div>
                                                        <!-- -----------------/scorrer------------------ -->
                                                        <div>
                                                            <p style="color: #fff">{{$squad->last_name}}</p>
                                                        </div>
                                                    </a>
                                                    @foreach($stats as $stat)
                                                        @if($squad->player_id == $stat->player_id)
                                                            <p class="rating-front">{{$stat->rating}}</p>
                                                        @endif
                                                    @endforeach
                                                </div>
                                            @endif
                                        @endforeach

                                        @foreach($squads as $squad)
                                                <!-- Right back -->
                                            @if($squad->position == "Right Back")
                                                <div class="lineups rb">
                                                    <!-- ------------card------------ -->
                                                    <div class="">
                                                        @foreach($stats as $stat)
                                                            @if($squad->player_id == $stat->player_id && $stat->red_card > 0 && $stat->yellow_card == 0)
                                                                <img src="{{asset('admin/image/logo/red-card.png')}}" class="card" alt="">
                                                            @elseif($squad->player_id == $stat->player_id && $stat->yellow_card > 0 && $stat->red_card == 0)
                                                                <img src="{{asset('admin/image/logo/yellow-card.png')}}" class="card" alt="">
                                                            @elseif($squad->player_id == $stat->player_id && $stat->yellow_card > 0 && $stat->red_card > 0)
                                                                <img src="{{asset('admin/image/logo/red-card.png')}}" class="card" alt="">
                                                            @endif
                                                        @endforeach
                                                    </div>
                                                    <!-- ------------/card------------ -->
                                                    <a href="#" class="" data-toggle="modal" data-target="#exampleModal{{$squad->player_id}}">
                                                        <div>
                                                            <span class="jersy_no">{{$squad->jersy_no}}</span>
                                                        </div>
                                                        <!-- -----------------scorrer------------------ -->
                                                            <div class="">
                                                                @foreach($stats as $stat)
                                                                    @if($squad->player_id == $stat->player_id && $stat->goals > 0)
                                                                        <img src="{{asset('admin/image/logo/football.png')}}" class="score-ball" alt="">
                                                                    @endif
                                                                @endforeach
                                                            </div>
                                                            <!-- -----------------/scorrer------------------ -->
                                                        <div>
                                                            <p style="color: #fff">{{$squad->last_name}}</p>
                                                        </div>
                                                    </a>
                                                    @foreach($stats as $stat)
                                                        @if($squad->player_id == $stat->player_id)
                                                            <p class="rating-front">{{$stat->rating}}</p>
                                                        @endif
                                                    @endforeach
                                                </div>
                                            @endif
                                        @endforeach

                                        <div class="goal-bar2">
                                            @foreach($squads as $squad)
                                                <!-- goal keeper -->
                                                @if($squad->position == "Goal Keeper")
                                                    <div class="lineups gk">
                                                        <!-- ------------card------------ -->
                                                        <div class="">
                                                            @foreach($stats as $stat)
                                                                @if($squad->player_id == $stat->player_id && $stat->red_card > 0 && $stat->yellow_card == 0)
                                                                    <img src="{{asset('admin/image/logo/red-card.png')}}" class="card" alt="">
                                                                @elseif($squad->player_id == $stat->player_id && $stat->yellow_card > 0 && $stat->red_card == 0)
                                                                    <img src="{{asset('admin/image/logo/yellow-card.png')}}" class="card" alt="">
                                                                @elseif($squad->player_id == $stat->player_id && $stat->yellow_card > 0 && $stat->red_card > 0)
                                                                    <img src="{{asset('admin/image/logo/red-card.png')}}" class="card" alt="">
                                                                @endif
                                                            @endforeach
                                                        </div>
                                                        <!-- ------------/card------------ -->
                                                        <a href="#" class="" data-toggle="modal" data-target="#exampleModal{{$squad->player_id}}">
                                                            <div>
                                                                <span class="jersy_no">{{$squad->jersy_no}}</span>
                                                            </div>
                                                            <!-- -----------------scorrer------------------ -->
                                                            <div class="">
                                                                @foreach($stats as $stat)
                                                                    @if($squad->player_id == $stat->player_id && $stat->goals > 0)
                                                                        <img src="{{asset('admin/image/logo/football.png')}}" class="score-ball" alt="">
                                                                    @endif
                                                                @endforeach
                                                            </div>
                                                            <!-- -----------------/scorrer------------------ -->
                                                            <div>
                                                                <p style="color: #fff">{{$squad->last_name}}</p>
                                                            </div>
                                                        </a>
                                                        @foreach($stats as $stat)
                                                            @if($squad->player_id == $stat->player_id)
                                                                <p class="rating-front">{{$stat->rating}}</p>
                                                            @endif
                                                        @endforeach
                                                    </div>
                                                @endif
                                            @endforeach
                                        </div>
                                    </div>
                                    <!-- -----------/lineup pitch----------- -->
                                </div>
                                @endif
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

                <!-- Modal -->
                @foreach($squads as $squad)
                    <div class="modal fade" id="exampleModal{{$squad->player_id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        @if($squad->stat_status == "Undefined")
                            <form action="/tournaments/{{$tournament->id}}/matches/{{$match->id}}/squads/{{$squad->squad_id}}/playerStats/{{$squad->player_id}}" name="matchStat" method="post" enctype="multipart/form-data">
                            @csrf
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                            <h4 class="modal-title" style="float:left" id="exampleModalLabel">{{$squad->first_name}} {{$squad->last_name}}</h4>
                                            <img class="squad-photo" src="{{asset('/')}}admin/image/player/{{$squad->image}}" alt="">
                                        </div>
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="square-widget">
                                                    <div class="widget-container">                                         
                        <!-- =================================== Create Player Stats Modal ========================== -->
                                            @include('admin.match.inc.createPlayerStats')
                        <!-- =================================== /Create Player Stats Modal ========================== -->
                                                    </div>
                                                </div>     
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <input type="submit" class="btn btn-primary">
                                        </div>
                                    </div>
                                </div>
                            </form>
                        @else
                            <div class="modal-dialog" role="document">
                                <div class="modal-content stat-modal">
                                    <div class="modal-header custom-modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="square-widget">
                                                <div class="widget-container">                                            
                                    <!-- =================================== show Player Stats Modal ========================== -->
                                                        @include('admin.match.inc.showPlayerStats')
                                    <!-- =================================== /show Player Stats Modal ========================== -->                                                           
                                                </div>
                                            </div>     
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

@endsection
