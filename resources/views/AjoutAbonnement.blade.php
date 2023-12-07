@extends('layouts.app')
<div class="container-fluid">


    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <div class="card-header text-white bg">
                    <h4 class="card-title">Ajout Abonnement</h4>
                </div>

                <div class="card-body">

                    <form action="add" method="POST" enctype="multipart/form-data">
                        @csrf
                       

                        <input type="hidden" name="Matricule" value="" />

                        <div class="form-section">
                            <label for="NomCR"> Nom d'Abonnement </label>
                            <input type="text" name="name" placeholder="Nom" class="form-control" value="" required>

                            <label for="Prix"> prix</label>
                            <input type="text" name="prix" placeholder="Source" class="form-control" value="" required>

                            <label for="Disponibilite"> description </label>
                            <input type="text" name="description" placeholder="Disponibilite" class="form-control" value="" required>


                        </div>
                        <br>

                        <div class="form-group row">
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-success float-right">Ajouter</button>
                            </div>
                        </div>

                    </form>
                </div>

            </div>
        </div>
    </div>


</div>


