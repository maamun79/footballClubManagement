@extends('admin.main')

@section('title')
    <title>{{ $player->last_name }}</title>
@endsection

@section('content')
<!-- page heading start-->
<div class="page-heading">
    <h3>
        Player Details Info
    </h3>
    <ul class="breadcrumb">
        <li>
            <a href="/players">Players</a>
        </li>
        <li class="active"><small>{{ $player->first_name}}</small> {{ $player->last_name}}</li>
    </ul>
    @if(session()->has('message'))
        <div class="alert alert-success">
            {{ session()->get('message') }}
        </div>
    @endif
</div><hr>
 <!-- page heading end-->
<div class="wrapper">
    <div class="col-md-8 col-md-offset-2">
        <div class="row">
            <div class="col-md-12">
                <div class="panel widget-info-twt blue-box" id="player-button">
                    <h5>
                        {{ $player->first_name }} {{ $player->last_name }}
                        @if($player->status == "injured")
                            <img src="{{asset('admin/image/logo/injured.png')}}" style="height: 20px; width: 20px;" alt="">    
                        @endif
                    </h5>
                    <span class="subtitle">{{ $player->position }}</span>

                    <div class="avatar"><img alt="" src="{{asset('/')}}admin/image/player/{{$player->image}}"></div>
        
                    <h3 id="contract_end">Contract Remains</h3>
                    <span id="countdown-date" class="countdown-clock"></span>
                    <span id="countdown-hour" class="countdown-clock"></span>
                    <span id="countdown-min" class="countdown-clock"></span>
                    <span id="countdown-sec" class="countdown-clock"></span>
                </div>
            </div>
            <div class="col-md-12">
                <div class="panel">
                    <ul class="iconic-list">
                        <li>
                            <a href="/players/{{$player->id}}/edit">
                                <i class="fa fa-pencil"></i> Edit
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="fa fa-dollar"></i> Renew Contract
                            </a>
                        </li>
                        <li>
                            @if($player->status == "injured")
                                <a href="/players/{{$player->id}}/recovered">
                                    <i class="fa fa-check-square"></i> Recovered
                                </a>
                            @else
                                <a href="/players/{{$player->id}}/injured">
                                    <i class="fa fa-plus-square"></i> Mark as injured
                                </a>
                            @endif
                        </li>
                        <li>
                            <a href="#">
                                <i class="fa fa-angle-double-right"></i> Send on loan
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
                <div class="modal-dialog modal-sm" role="document">
                    <div class="modal-content">
                    ...
                    </div>
                </div>
                </div>
            <div class="col-md-12">
                 <!-- start details info -->
                 <ul class="p-info">
                    <li>
                        <div class="title">First Name</div>
                        <div class="desk">{{$player->first_name}}</div>
                    </li>
                    <li>
                        <div class="title">Last Name</div>
                        <div class="desk">{{$player->last_name}}</div>
                    </li>
                    <li>
                        <div class="title">DOB</div>
                        <div class="desk">{{$player->dob}}</div>
                    </li>
                    <li>
                        <div class="title">Nationality</div>
                        <div class="desk">{{$player->country}}</div>
                    </li>
                    <li>
                        <div class="title">Email</div>
                        <div class="desk">{{$player->email}}</div>
                    </li>
                    <li>
                        <div class="title">Contact No.</div>
                        <div class="desk">{{$player->contact_no}}</div>
                    </li>
                    <li>
                        <div class="title">Father Name</div>
                        <div class="desk">{{$player->father_name}}</div>
                    </li>
                    <li>
                        <div class="title">Mother Name</div>
                        <div class="desk">{{$player->mother_name}}</div>
                    </li>
                    <li>
                        <div class="title">Agent Name</div>
                        <div class="desk">{{$player->agent_name}}</div>
                    </li>
                    <li>
                        <div class="title">Contract Start Date</div>
                        <div class="desk">{{$player->contract_start_date}}</div>
                    </li>
                    <li>
                        <div class="title">Contract End Date</div>
                        <div class="desk">{{$player->contract_end_date}}</div>
                    </li>
                    <li>
                        <div class="title">Salary ($)</div>
                        <div class="desk">{{$player->salary_per_month}}</div>
                    </li>
                    <li>
                        <div class="title">Buying Price</div>
                        <div class="desk">{{$player->buying_price}}</div>
                    </li>
                    <li>
                        <div class="title">Previous Club</div>
                        <div class="desk">{{$player->previous_club}}</div>
                    </li>
                    <li>
                        <div class="title">Jersy No.</div>
                        <div class="desk">{{$player->jersy_no}}</div>
                    </li>
                    <li>
                        <div class="title">Position</div>
                        <div class="desk">{{$player->position}}</div>
                    </li>
                </ul>
                <!-- end details info -->
            </div>
        </div>
    </div>
</div>
<script>
// Set the date we're counting down to
var countDownDate = new Date("{{$player->contract_end_date}}").getTime();

// Update the count down every 1 second
var x = setInterval(function() {

  // Get today's date and time
  var now = new Date().getTime();

  // Find the distance between now and the count down date
  var distance = countDownDate - now;

  // Time calculations for days, hours, minutes and seconds
  var days = Math.floor(distance / (1000 * 60 * 60 * 24));
  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  var seconds = Math.floor((distance % (1000 * 60)) / 1000);

  // Display the result in the element with id="demo"
//   document.getElementById("contract_count_down").innerHTML = days + "d " + hours + "h "
//   + minutes + "m " + seconds + "s ";
  document.getElementById("countdown-date").innerHTML = (days < 10) ? "0"+days+"D " : days + "D ";
  document.getElementById("countdown-hour").innerHTML = (hours < 10) ? "0"+hours+"H " : hours + "H ";
  document.getElementById("countdown-min").innerHTML = (minutes < 10) ? "0"+minutes+"M " : minutes + "M ";
  document.getElementById("countdown-sec").innerHTML = (seconds < 10) ? "0"+seconds+"S " : seconds + "S ";

  // If the count down is finished, write some text
  if (distance < 0) {
    clearInterval(x);
    document.getElementById("contract_end").innerHTML = "CONTRACT EXPIRED";
  }
}, 1000);
</script>
@endsection

