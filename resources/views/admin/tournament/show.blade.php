@extends('admin.main')

@section('title')
<title>Tournament Details</title>
@endsection

@section('content')
<!-- page heading start-->
<div class="page-heading">
    <div class="row">
        <div class="col-md-12">
            <div class="col-md-6">
                <h3>
                    {{$tournament->name}}<small>({{$tournament->season}})</small>
                </h3>
                <ul class="breadcrumb">
                    <li>
                        <a href="/tournaments">Tournaments</a>
                    </li>
                    <li class="active">Matches</li>
                </ul>
            </div>

            <div class="col-md-6">
                <a href="/tournaments/{{$tournament->id}}/matches/create" class="btn btn-success pull-right" style="margin-top: 16px">Add Match</a>
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
        <div class="col-md-8 col-md-offset-2">
            <div>
                <div id="fixture-table-head">
                    <img class="tournament-logo" src="{{asset('/')}}admin/image/tournament-logo/{{$tournament->logo}}" alt="">
                    <span class="table-title">{{$tournament->name}}({{$tournament->season}})</span><br>
                    <span class="table-title-date">Start Date : {{$tournament->start_date}}</span><br>
                    <span class="table-title-date">End Date : {{$tournament->end_date}}</span>
                </div>
                <table class="table table-bordered" id="fixture-table-body">
                    <tbody>
                        <!-- showing match list -->
                        @foreach($matches as $match)
                            <tr>
                                <td>
                                    <div class="col-md-6">
                                        <small>Match Day : {{$match->match_day}} ({{$match->match_type}})</small><br>
                                        <!-- showing home match and away match differently -->
                                        @if($match->match_type == "Home")
                                            <img class="club-logo" src="{{ asset('admin/image/club-logo/fcb.png') }}" alt="">
                                            <span>Barcelona </span><strong>vs</strong>
                                            <img class="club-logo" src="{{asset('/')}}admin/image/club-logo/{{$match->opposite_team_logo}}" alt="">
                                            <span>{{$match->opposite_team}}</span>
                                        @elseif($match->match_type == "Away")
                                            <img class="club-logo" src="{{asset('/')}}admin/image/club-logo/{{$match->opposite_team_logo}}" alt="">
                                            <span>{{$match->opposite_team}}</span><strong> vs</strong>
                                            <img class="club-logo" src="{{ asset('admin/image/club-logo/fcb.png') }}" alt="">
                                            <span>Barcelona </span>                                           
                                        @endif
                                    </div>
                                    <div class="col-md-2">
                                        <span>{{$match->match_date}}</span><br>
                                        <span>{{$match->starting_time}}</span>
                                    </div>
                                    <div class="col-md-2">
                                        <!-- showing match scores for defined matches -->
                                        @if($match->status == "Defined")
                                            @if($match->match_type == "Home")
                                                @foreach($matchStats as $matchStat)
                                                    @if($match->id == $matchStat->match_id)
                                                    <span>{{$matchStat->goal}} - {{$matchStat->goal_consided}}</span>
                                                    @endif
                                                @endforeach
                                            @elseif($match->match_type == "Away")
                                                @foreach($matchStats as $matchStat)
                                                    @if($match->id == $matchStat->match_id)
                                                    <span>{{$matchStat->goal_consided}} - {{$matchStat->goal}}</span>
                                                    @endif
                                                @endforeach
                                            @endif

                                            <!-- showing match result based on scores -->
                                            @foreach($matchStats as $matchStat)
                                                @if($match->id == $matchStat->match_id)
                                                    @if($matchStat->goal > $matchStat->goal_consided)
                                                        <span class="badge badge-success match-result">W</span>
                                                    @elseif($matchStat->goal < $matchStat->goal_consided)
                                                        <span class="badge badge-important match-result">L</span>
                                                    @elseif($matchStat->goal == $matchStat->goal_consided)
                                                        <span class="badge badge-warning match-result">D</span>
                                                    @endif
                                                @endif
                                            @endforeach
                                        <!-- showing message for those matches are not defined -->
                                        @elseif($match->status == "Undefined")
                                            <p class="text-danger text-center">Not defined yet</p>
                                        @endif
                                    </div>
                                    <div class="col-md-2">
                                        <a href="/tournaments/{{$tournament->id}}/matches/{{$match->id}}" class="btn btn-success btn-xs"><i class="fa fa-eye"></i></a>
                                    <!-- <button type="submit" class="btn btn-danger btn-sm deleteBtn"><i class="fa fa-archive"></i></button>
                                    -->
                                     <a href="" class="btn btn-danger btn-xs"><i class="fa fa-archive"></i></a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection