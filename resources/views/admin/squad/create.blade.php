@extends('admin.main')

@section('title')
 <title>Squad</title>
@endsection

@section('style')
 <!--multi-select-->
 <link rel="stylesheet" type="text/css" href="{{asset('admin/js/jquery-multi-select/css/multi-select.css')}}" />
@endsection


@section('content')
 <!-- page heading start-->
<div class="page-heading">
    <div class="row">
        <div class="col-md-12">
            <h3>
                Publish Squad
            </h3>
            <ul class="breadcrumb">
                <li>
                    <a href="/squad">Squad</a>
                </li>
                <li class="active">Create</li>
            </ul>
        </div>
    </div>
</div>
 <!-- page heading end-->
<hr/>
<!-- ----------jquery steps------------- -->
<div class="wrapper">
    <form action="/squads" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel">
                    <div class="panel-heading">
                        <div class="panel-title">
                            Publish Squad
                        </div>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-12 form-group">
                                <label for="tournament">Select Tournament<span style="color:red">*</span></label>
                                <!-- @error('tournament')
                                    <span style="color:red;">{{ $message }}</span>
                                @enderror -->
                                <select class="form-control m-bot15" id="tournament" name="tournament">
                                    <option value="">Select Tournament</option>
                                    <!-- fetch tournaments for declaring squad -->
                                    @foreach($tournaments as $tournament)
                                        <option value="{{$tournament->id}}">{{$tournament->name}} ({{$tournament->season}})</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-12 form-group">
                                <label for="match_id">Select Match<span style="color:red">*</span></label>
                                <!-- @error('match_id')
                                    <span style="color:red;">{{ $message }}</span>
                                @enderror -->
                                <!-- showing undefined match based on tournaments through ajax -->
                                <select class="form-control m-bot15" id="match_id" name="match_id">
                                    <option value="">Select Match</option>
                                </select>
                            </div>

                            <div class="form-group last">
                                <label class="control-label col-md-3">Select Player</label>

                                <div class="col-md-9">
                                    <select name="player_id[]" class="multi-select" multiple="" id="my_multi_select3">
                                        <!-- fatching players based on their playing positions -->
                                        @foreach($positions as $position)
                                            <optgroup label="{{$position->position}}">
                                                @foreach($players as $player)
                                                    @if($player->position == $position->position)
                                                        <option value="{{$player->id}}">{{$player->first_name}} {{$player->last_name}} ({{$player->jersy_no}})</option>
                                                    @endif
                                                @endforeach
                                            </optgroup>
                                        @endforeach
                                    </select>
                                </div>
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

<script>
    // ajax for selecting match autometically
    $('#tournament').on('change', function(e){
        console.log(e);

        let tournament_id = e.target.value;
        
        $.get('/ajax-match/' + tournament_id, function(data){
            $('#match_id').empty();

            $.each(data, function(index, tMatch){
                $('#match_id').append('<option value="'+tMatch.id+'">'+'VS '+tMatch.opposite_team+' (Match Day : '+tMatch.match_day+' - '+tMatch.match_type+' Match)'+'</option>');
            });
        });
    });
</script>
</div>

@endsection

@section('script')
        <!--multi-select-->
    <script type="text/javascript" src="{{asset('admin/js/jquery-multi-select/js/jquery.multi-select.js')}}"></script>
    <script type="text/javascript" src="{{asset('admin/js/jquery-multi-select/js/jquery.quicksearch.js')}}"></script>
    <script src="{{asset('admin/js/multi-select-init.js')}}"></script>
@endsection