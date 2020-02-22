@extends('admin.main')

@section('title')
 <title>Add Match Stats</title>
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
        <li>
            <a href="/tournaments/{{$tournament->id}}/matches/{{$match->id}}">Barcelona VS {{$match->opposite_team}}</a>
        </li>
        <li class="active">Add Match Stats</li>
    </ul>
</div>
 <!-- page heading end-->
<hr/>

<div class="wrapper">
    <form action="/tournaments/{{$tournament->id}}/matches/{{$match->id}}/matchStats" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-md-10 col col-md-offset-1">
                <div class="panel" data-collapsed="0">
                    <div class="panel-heading">
                        <div class="panel-title">
                            Add Match Stats
                        </div>
                    </div>
                    <div class="panel-body">
                        <div class="row">

                            <div class="col-md-4 form-group">
                                <label for="shots">Total Shots <span style="color:red">*</span></label>
                                <!-- @error('shots')
                                    <span style="color:red;">{{ $message }}</span>
                                @enderror -->
                                <div>
                                    <input id="shots" name="shots" class="form-control" type="number" value="" placeholder="Total Shots" />
                                </div>
                            </div>

                            <div class="col-md-4 form-group">
                                <label for="shots_on_target">Shots on Target <span style="color:red">*</span></label>
                                <!-- @error('shots_on_target')
                                    <span style="color:red;">{{ $message }}</span>
                                @enderror -->
                                <div>
                                    <input id="shots_on_target" name="shots_on_target" class="form-control" type="number" value="" placeholder="Shots on Target" />
                                </div>
                            </div>

                            <div class="col-md-4 form-group">
                                <label for="possession">Possession(%) <span style="color:red">*</span></label>
                                <!-- @error('possession')
                                    <span style="color:red;">{{ $message }}</span>
                                @enderror -->
                                <div>
                                    <input id="possession" name="possession" class="form-control" type="number" value="" placeholder="Possession(%)"/>
                                </div>
                            </div>

                            <div class="col-md-4 form-group">
                                <label for="passes">Total Passes <span style="color:red">*</span></label>
                                <!-- @error('passes')
                                    <span style="color:red;">{{ $message }}</span>
                                @enderror -->
                                <div>
                                    <input id="passes" name="passes" class="form-control" type="number" value="" placeholder="Total Passes"/>
                                </div>
                            </div>

                            <div class="col-md-4 form-group">
                                <label for="pass_accuracy">Pass Accuracy(%) <span style="color:red">*</span></label>
                                <!-- @error('pass_accuracy')
                                    <span style="color:red;">{{ $message }}</span>
                                @enderror -->
                                <div>
                                    <input id="pass_accuracy" name="pass_accuracy" class="form-control" type="number" value="" placeholder="Pass Accuracy(%)" />
                                </div>
                            </div>

                            <div class="col-md-4 form-group">
                                <label for="foul_commited">Foul Attempted <span style="color:red">*</span></label>
                                <!-- @error('foul_commited')
                                    <span style="color:red;">{{ $message }}</span>
                                @enderror -->
                                <div>
                                    <input id="foul_commited" name="foul_commited" class="form-control" type="number" value="" placeholder="Foul Attempted"/>
                                </div>
                            </div>

                            <div class="col-md-4 form-group">
                                <label for="foul_conside">Fouls<span style="color:red">*</span></label>
                                <!-- @error('foul_conside')
                                    <span style="color:red;">{{ $message }}</span>
                                @enderror -->
                                <div>
                                    <input id="foul_conside" name="foul_conside" class="form-control" type="number" value="" placeholder="Fouls"/>
                                </div>
                            </div>

                            <div class="col-md-4 form-group">
                                <label for="yellow_cards">Yellow cards <span style="color:red">*</span></label>
                                <!-- @error('yellow_cards')
                                    <span style="color:red;">{{ $message }}</span>
                                @enderror -->
                                <div>
                                    <input id="yellow_cards" name="yellow_cards" class="form-control" type="number" value="" placeholder="Yellow Cards" />
                                </div>
                            </div>

                            <div class="col-md-4 form-group">
                                <label for="red_cards">Red Cards <span style="color:red">*</span></label>
                                <!-- @error('red_cards')
                                    <span style="color:red;">{{ $message }}</span>
                                @enderror -->
                                <div>
                                    <input id="red_cards" name="red_cards" class="form-control" type="number" value="" placeholder="Red Cards" />
                                </div>
                            </div>

                            <div class="col-md-4 form-group">
                                <label for="offsides">Offsides <span style="color:red">*</span></label>
                                <!-- @error('offsides')
                                    <span style="color:red;">{{ $message }}</span>
                                @enderror -->
                                <div>
                                    <input id="offsides" name="offsides" class="form-control" type="number" value="" placeholder="Offsides" />
                                </div>
                            </div>

                            <div class="col-md-4 form-group">
                                <label for="corners">Corners <span style="color:red">*</span></label>
                                <!-- @error('corners')
                                    <span style="color:red;">{{ $message }}</span>
                                @enderror -->
                                <div>
                                    <input id="corners" name="corners" class="form-control" type="number" value="" placeholder="Corners" />
                                </div>
                            </div>

                            <div class="col-md-4 form-group">
                                <label for="goal">Goals <span style="color:red">*</span></label>
                                <!-- @error('goals')
                                    <span style="color:red;">{{ $message }}</span>
                                @enderror -->
                                <div>
                                    <input id="goal" name="goal" class="form-control" type="number" value="" placeholder="Goals" />
                                </div>
                            </div>

                            <div class="col-md-4 form-group">
                                <label for="goal_consided">Opponent Goals <span style="color:red">*</span></label>
                                <!-- @error('goal_consided')
                                    <span style="color:red;">{{ $message }}</span>
                                @enderror -->
                                <div>
                                    <input id="goal_consided" name="goal_consided" class="form-control" type="number" value="" placeholder="Opponent Goals" />
                                </div>
                            </div>


                            <div class="col-md-4 form-group pull-right">
                                    <input type="submit" class="btn btn-success btn-block" style="margin-top: 25px">
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
      
@endsection