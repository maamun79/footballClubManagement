 @foreach($stats as $stat)
    @if($match->id == $stat->match_id && $squad->player_id == $stat->player_id)
        <div class="row">
            <div class="col-md-2">
                    <img class="player-stat-photo" src="{{asset('/')}}admin/image/player/{{$squad->image}}" alt="">
            </div>
            <div class="col-md-4">
                <h4 class="modal-title player-stat-name" id="exampleModalLabel">{{$squad->first_name}} {{$squad->last_name}}</h4>
                <p style="font-size: small;">No. {{$squad->jersy_no}} {{$squad->position}}</p>
            </div>
            <div class="col-md-6">
                <div class="stat-rating">
                    <h5>Rating</h5>
                    <p>{{$stat->rating}}</p>
                </div>
            </div>

            <div style="margin-top:100px">
                <div class="col-md-3">
                    <p class="small-text">Time Played</p>
                    <h4 class="large-text">{{$stat->time_played}} min</h4>
                </div>
                <div class="col-md-3">
                    <p class="small-text">Goals</p>
                    <h4 class="large-text">{{$stat->goals}}</h4>
                </div>
                <div class="col-md-3">
                    <p class="small-text">Assist</p>
                    <h4 class="large-text">{{$stat->assist}}</h4>
                </div>
                <div class="col-md-3">
                    <p class="small-text">Cards</p>
                    <h4 class="large-text">Y-{{$stat->yellow_card}}/R-{{$stat->red_card}}</h4>
                </div>
            </div>

                <div class="col-md-12">
                    <p class="stat-heading"> Attack</p>
                </div>
                <div class="col-md-3">
                    <p class="small-text">Shots</p>
                    <h4 class="large-text">{{$stat->shots}}</h4>
                </div>
                <div class="col-md-3">
                    <p class="small-text">Shots on target</p>
                    <h4 class="large-text">{{$stat->shots_on_target}}</h4>
                </div>
                <div class="col-md-3">
                    <p class="small-text">Shots off target</p>
                    <h4 class="large-text">{{$stat->shots_off_target}}</h4>
                </div>
                <div class="col-md-3">
                    <p class="small-text">Dribbles attempted</p>
                    <h4 class="large-text">{{$stat->dribbles_attempted}}</h4>
                </div>
                <div class="col-md-3">
                    <p class="small-text">Dribbles won</p>
                    <h4 class="large-text">{{$stat->dribbles_won}}</h4>
                </div>
                <div class="col-md-3">
                    <p class="small-text">Offsides</p>
                    <h4 class="large-text">{{$stat->offsides}}</h4>
                </div>
                <div class="col-md-3">
                    <p class="small-text">Fouled</p>
                    <h4 class="large-text">{{$stat->fouled}}</h4>
                </div>

                
                <div class="col-md-12">
                    <p class="stat-heading"> Passes</p>
                </div>
                <div class="col-md-3">
                    <p class="small-text">Total passes</p>
                    <h4 class="large-text">{{$stat->total_passes}}</h4>
                </div>
                <div class="col-md-3">
                    <p class="small-text">Accurate passes</p>
                    <h4 class="large-text">{{$stat->accurate_passes}}</h4>
                </div>
                <div class="col-md-3">
                    <p class="small-text">Pass accuracy</p>
                    <h4 class="large-text">{{$stat->pass_accuracy}}%</h4>
                </div>
                <div class="col-md-3">
                    <p class="small-text">Key passes</p>
                    <h4 class="large-text">{{$stat->key_passes}}</h4>
                </div>
                <div class="col-md-3">
                    <p class="small-text">Through balls</p>
                    <h4 class="large-text">{{$stat->through_balls}}</h4>
                </div>
                <div class="col-md-3">
                    <p class="small-text">Crosses</p>
                    <h4 class="large-text">{{$stat->crosses}}</h4>
                </div>
                <div class="col-md-3">
                    <p class="small-text">Long balls</p>
                    <h4 class="large-text">{{$stat->long_balls}}</h4>
                </div>


                <div class="col-md-12">
                    <p class="stat-heading"> Defence</p>
                </div>
                <div class="col-md-3">
                    <p class="small-text">Aerials</p>
                    <h4 class="large-text">{{$stat->aerials}}</h4>
                </div>
                <div class="col-md-3">
                    <p class="small-text">Aerials won</p>
                    <h4 class="large-text">{{$stat->aerials_won}}</h4>
                </div>
                <div class="col-md-3">
                    <p class="small-text">Tackles attempted</p>
                    <h4 class="large-text">{{$stat->tackles_attempted}}</h4>
                </div>
                <div class="col-md-3">
                    <p class="small-text">Successfull tackles</p>
                    <h4 class="large-text">{{$stat->successfull_tackles}}</h4>
                </div>
                <div class="col-md-3">
                    <p class="small-text">Clearances</p>
                    <h4 class="large-text">{{$stat->clearances}}</h4>
                </div>
                <div class="col-md-3">
                    <p class="small-text">Interceptions</p>
                    <h4 class="large-text">{{$stat->interceptions}}</h4>
                </div>


                <div class="col-md-12">
                    <p class="stat-heading"> Errors</p>
                </div>
                <div class="col-md-3">
                    <p class="small-text">Foules</p>
                    <h4 class="large-text">{{$stat->foules}}</h4>
                </div>
                <div class="col-md-3">
                    <p class="small-text">Dispossessed</p>
                    <h4 class="large-text">{{$stat->dispossessed}}</h4>
                </div>
                <div class="col-md-3">
                    <p class="small-text">Dribbled past</p>
                    <h4 class="large-text">{{$stat->dribbled_past}}</h4>
                </div>
            
        </div>
        
        
    @endif
@endforeach