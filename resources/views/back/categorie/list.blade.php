

@extends('layouts.back')
@section('title', 'Utilisateurs')
@section('content')

<style>
    .popup {
        display: none; /* Hide pop-up by default */
        position: fixed; /* Position it fixed on the screen */
        z-index: 1; /* Make sure it is on top */
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        overflow: auto; /* Enable scrolling if needed */
        background-color: rgba(0, 0, 0, 0.4); /* Black background with transparency */
    }

    .popup-content {
        background-color: white;
        margin: 15% auto; /* Center pop-up on the screen */
        padding: 20px;
        border: 1px solid #888;
        width: 80%;
        max-width: 600px;
    }

    .close {
        color: #aaa;
        float: right;
        font-size: 28px;
        font-weight: bold;
    }

    .close:hover,
    .close:focus {
        color: black;
        text-decoration: none;
        cursor: pointer;
    }

</style>
 <!-- Content wrapper -->
 <div class="content-wrapper">
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-4 px-4 mb-4" style="background-color: white;border-radius: 0.375rem;font-size:18px;">
            <span class="text-muted fw-light">Total</span> {{$categories->count()}} Catégories
            <a href="{{route('add.admin.categories')}}"> <button class="primary-btn" style="float: right;">Ajouter une Catégorie</button></a>
        </h4>
        
        <!-- Borderless Table -->
        <div class="card">
            <h5 class="card-header">Catégories</h5>
            <div class="table-responsive text-nowrap">
            <table class="table table-borderless">
                <thead>
                <tr>
                    <th>Ref</th>
                    <th>Nom</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                    @foreach($categories as $categorie)
                    <tr>
                        <td>N° {{$categorie->id}}</td>
                       
                        <td>{{$categorie->typename}}</td>
                        <td>
                            <button class="btn-link" style="background-color: white;border:none" onclick="openPopup{{$categorie->id}}()" style="border: none!important"><span class="badge rounded-pill bg-label-danger "><i class="bx m-0 mx-1 bx-trash me-1"></i></span></button>
                            
                            <!-- Modal -->
                            <div id="popup{{$categorie->id}}" class="popup">
                                <div class="popup-content">
                                    <div class="row">
                                        <div class="col mb-3">
                                            <h6 class="modal__title">Suppression </h6>

                                            <p class="modal__text">Voulez-vous vraiment supprimer cette catégorie ?</p>
                                            <form action="{{ route('destroy.admin.categories',$categorie->id) }}" method="POST">   
                                                @csrf
                                                @method('DELETE') 
                                                <div class="modal__btns">
                                                    <button class="primary-btn" type="submit">Supprimer</button>
                                                    <button class="conference-btn"onclick="closePopup{{$categorie->id}}()" type="button">Annuler</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                        </td>
                    </tr>
                    
                    @endforeach
                </tbody>
            </table>
            </div>
        </div>
        <!--/ Borderless Table -->

        <div class="content-backdrop fade"></div>
  </div>
  <!-- Content wrapper -->
@endsection
@section('script')

<script>
    $(function(){
        $('.categorie').click(function() {
            $(this).addClass('active');
            $('.menu-item').not('.categorie').removeClass('active');
        });
        $('.categorie').addClass('active');
        $('.menu-item').not('.categorie').removeClass('active');

       
    })

    @foreach($categories as $categorie)

        function openPopup{{$categorie->id}}() {
            document.getElementById("popup{{$categorie->id}}").style.display = "block";
        }

        function closePopup{{$categorie->id}}() {
            document.getElementById("popup{{$categorie->id}}").style.display = "none";
        }
    @endforeach

</script>
@endsection