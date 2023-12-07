

<div class="container-fluid">
    <div class="row">

        <div class="col-md-8 offset-md-2">
           
            <div class="alert alert-success alert-dismissible">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
              

            </div>
            
        </div>
        <div class="card col-md-10 offset-md-1">
            <div class="card-header text-white bg">
                <div class="header-title">
                    <h4 class="card-title">liste des Abonnnments</h4>
                </div>

                <form action="add">
                    <button class="btn btn-sm bg-primary float-right">
                        <i class="ri-add-fill "><span class="pl-1">Ajout abonnement</span></i>
                    </button>
                </form>

            </div>
            <div class="card-body">

                <table class="table dataTable no-footer" style="width: 100%;" id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_0_info">
                    <thead class="light">
                        <tr role="row">
                            <th class="" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="ID: activate " style="width: 62px;">ID</th>
                            <th class="" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Nom: activate " style="width: 70px;">Nom</th>
                            <th class="" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Source: activate " style="width: 70px;">description</th>
                            <th class="" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Disponibilité: activate " style="width: 70px;">Pirx</th>

                        </tr>


                    </thead>

                    <tbody>
                        @foreach ($abonnement as $Abonnement)
                        <tr>

                            <td><strong>{{ $Abonnement->idAb}}</strong></td>
                            <td>{{$Abonnement['name']}}</td>
                            <td>{{$Abonnement['description']}}</td>
                            <td>{{$Abonnement['prix']}}</td>

                            <td>
                                <div class="d-flex align-items-center list-action">
                                    <a class="badge bg-light-light mr-2" data-toggle="tooltip" data-placement="top" title="" data-original-title="Modifier" href=""><i class="dripicons dripicons-pencil"></i></a>
                                    <form action="">
                                        <a class="badge bg-danger-light mr-2" data-toggle="tooltip" data-placement="top" title="" data-original-title="Effacer" type="submit" href="" onclick="return confirm('Voulez vous supprimer cette critére ?')"><i class="dripicons dripicons-trash"></i></a>
                                    </form>

                                   
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
