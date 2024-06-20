@extends('adminlte::page')
@section('plugins.DataTables',true)



@section('content')
<div class="container">
    <!-- <div class="row justify-content-center"> -->
        <div class="row my-5">
            <div class="col-md-10 mx-auto">
                <div class="card my-3">
                    <div class="card-header">
                        <div class="text-center text-uppercase">
                            Employes

                        </div>
                    </div>
                    <div class="card-body">
                        <table id="myTable" class=" table table-bordered table-stripped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Fullname</th>
                                    <th>Departement</th>
                                    <th>Hired</th>
                                    <th></th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
                
                
            </div>
        </div>
    <!-- </div> -->
</div>
@endsection

@section('js')
   <script>
    $(document).ready(function(){
        $('#myTable').DataTable({
            dom :'Bfrtip',
            buttons :[
                'copy','excel','csv','pdf','print','colvis'
            ]
        });
    });
   </script>

@endsection