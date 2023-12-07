@extends('layouts.app')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <div class="card-header text-white bg">
                    <h4 class="card-title">modifier Abonnement</h4>
                </div>

                <div class="card-body">

                    <form action="/edit/{{$Abonnement->idAb}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="id" value="{{$Abonnement->idAb}}" />

                        <div class="form-section">
                            <label for="Name"> Name </label>
                            <input type="text" name="name" placeholder="Name" class="form-control" value="{{$Abonnement->name}}" required>

                            <label for="Prix"> Prix </label>
                            <input type="text" name="prix" placeholder="Prix" class="form-control" value="{{$Abonnement->prix}}" required>

                            <label for="Disponibilite"> Description </label>
                            <input type="text" name="description" placeholder="Description" class="form-control" value="{{$Abonnement->description}}" required>


                        </div>
                        <br>

                        <div class="form-group row">
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-success float-right">Enregistrer</button>
                            </div>
                        </div>

                    </form>
                </div>

            </div>
        </div>
    </div>


</div>


