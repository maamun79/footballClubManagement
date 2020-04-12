@extends('admin.main')

@section('title')
 <title>Add Scorer</title>
@endsection

@section('style')
     <link href="{{asset('admin/js/iCheck/skins/square/square.css')}}" rel="stylesheet">
     <link href="{{asset('admin/js/iCheck/skins/square/green.css')}}" rel="stylesheet">
@endsection

@section('content')
 <!-- page heading start-->
<div class="page-heading">
    <h3>
        Add Scorer
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
        <li class="active">Add Goal Scorer</li>
    </ul>
</div>
 <!-- page heading end-->
<hr/>

<div class="wrapper">
    <form action="/tournaments/{{$tournament->id}}/matches/{{$match->id}}/scorers" name="matchScorers" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-md-6 col col-md-offset-3">
                <div class="panel" data-collapsed="0">
                    <div class="panel-heading">
                        <div class="panel-title">
                            Add Goal Scorer
                        </div>
                    </div>
                    <div class="panel-body">
                        <div class="row" style="margin-left:5px">
                            @foreach($squads as $squad)
                                    <div class="col-md-8 form-group">
                                        <div class="checkbox ">        
                                            <input type="checkbox" class="scoreTest" value="{{$squad->id}}" id="sT" onclick="scoreT()">
                                            <label>{{$squad->first_name}} {{$squad->last_name}} ({{$squad->jersy_no}})</label> 
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <input style="display:none" type="number" class="form-control score" name="score">
                                    </div>
                            @endforeach
                        </div>
                        <input style="display:none" id="scoreSubmit" type="submit" class="btn btn-success pull-right">
                            
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>

<script>
    
    
    function scoreT(){
        let chk = document.getElementsByClassName("scoreTest");
        let inp = document.getElementsByClassName("score");
        let btn = document.getElementById("scoreSubmit");
        
        for( let i = 0; i<chk.length; i++){
            if(chk[i].checked == true){
                inp[i].style.display = "block";
            }else{
                inp[i].style.display = "none";
            }
        }

        if($('[class="scoreTest"]:checked').length > 0){
            btn.style.display = "block";
        }else{
            btn.style.display = "none";
        }
    }
</script>

@endsection

@section('script')
    <!--icheck -->
    <script src="{{asset('admin/js/iCheck/jquery.icheck.js')}}"></script>
    <script src="{{asset('admin/js/icheck-init.js')}}"></script>
@endsection