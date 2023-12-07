@extends('layouts.app')
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>

<div class="container-fluid">
    <div class="row">

    
        <div class="card col-md-10 offset-md-1">
            <div class="card-header text-white bg">
                <div class="header-title">
                    <h4 class="card-title">liste des catégorie</h4>
                </div>
                @if(isset($data))
                <form action="editCat/{{$data->id}}"  method="POST">
                    @csrf
                    @method('PUT')
                    <label for="NomS"> Nom du catégorie </label>
                        <input type="text" name="nomC" placeholder="Nom" class="form-control" required value="{{$data->typename}}">
                    <button class="btn btn-sm bg-primary float-right">
                        <i class="ri-add-fill "><span class="pl-1">modifier catégorie</span></i>
                    </button>
                </form>
                @else
                <form action="/addC"  method="POST">
                    @csrf
                    <label for="NomS"> Nom du catégorie </label>
                        <input type="text" name="nomC" placeholder="Nom" class="form-control" required>
                    <button class="btn btn-sm bg-primary float-right">
                        <i class="ri-add-fill "><span class="pl-1">Ajout catégorie</span></i>
                    </button>
                </form>
                @endif

            </div>
            <div class="card-body">

                <table class="table dataTable no-footer" style="width: 100%;" id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_0_info">
                    <thead class="light">
                        <tr role="row">
                            <th class="" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1"  style="width: 62px;">ID</th>
                            <th class="" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1"  style="width: 70px;">Nom</th>
                            <th class="" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Action: activate " style="width: 90px;">Action</th>
                        </tr>


                    </thead>

                    <tbody>
                    @foreach($typesS as $type)
                        <tr>

                            <td><strong>{{ $type->id}}</strong></td>
                            <td>{{$type['typename']}}</td>
                            

                            <td>
                                <div class="d-flex align-items-center list-action">
                                <form action="/editC/{{$type->id}}">
                                <button class="btn btn-sm bg-primary float-right">
                                    <i class="ri-add-fill "><span class="pl-1">Modifier</span></i>
                                </button>
                            </form>
                            <form action="deleteC/{{$type->id}}">
                                <button class="btn btn-sm bg-primary float-right">
                                    <i class="ri-add-fill "><span class="pl-1">Supprimer</span></i>
                                </button>
                            </form>
                            
                                                                       
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
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>


