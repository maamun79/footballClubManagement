<div class="row">
    <div class="col-sm-12">
        <section class="panel">
            <header class="panel-heading">
                Injured Players
                <span class="tools pull-right">
                    <a href="javascript:;" class="fa fa-chevron-down"></a>
                </span>
            </header>
            <div class="panel-body">
                <div class="adv-table">
                    <table  class="display table table-bordered table-striped" id="dynamic-table">
                        <thead>
                            <tr>
                                <th>Jersy No.</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Position</th>
                                <th>Contract Ends</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($injuredPlayers as $injuredPlayer)
                            <tr class="gradeA">
                                <td>{{ $injuredPlayer->jersy_no}}</td>
                                <td>{{ $injuredPlayer->first_name}}</td>
                                <td>{{ $injuredPlayer->last_name}}</td>
                                <td>{{ $injuredPlayer->position}}</td>
                                <td>{{ $injuredPlayer->contract_end_date }}</td>
                                <td>
                                    <a href="players/{{$injuredPlayer->id}}" class="btn btn-success btn-sm" style="float:left;margin-right:2px"><i class="fa fa-eye"></i></a>
                                    <!-- <button type="submit" class="btn btn-danger btn-sm deleteBtn"><i class="fa fa-archive"></i></button>
                                    -->
                                     <a href="players/{{$injuredPlayer->id}}" class="btn btn-danger btn-sm deleteBtn"><i class="fa fa-archive"></i></a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Jersy No.</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Position</th>
                                <th>Contract Ends</th>
                                <th>Actions</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </section>
    </div>
</div>

<script>
    $('.deleteBtn').click(function (event) {
        event.preventDefault();
        var url = $(this).attr('href');

        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.value) {
                $.ajax({
                        url : url,
                        type : "POST",
                        data : {
                            '_method' : 'DELETE',
                            "_token": "{{ csrf_token() }}"
                        
                        },
                        success: function(data){
                            Swal.fire(
                                'Deleted!',
                                'Your file has been deleted.',
                                'success'
                            )
                            location.reload();
                        },
                        
                        error : function(){
                            Swal.fire(
                                'Opps...',
                                'Something went wrong',
                                'error'
                            )
                        }
                    })
                
            }
        })
    });
</script>