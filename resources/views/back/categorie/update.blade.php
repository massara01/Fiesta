@extends('layouts.back')
@section('title', 'categories')
@section('content')

<style>
    .sticky-header-section{
        background-color:#333333!important
    }
    .default-header-p {
        padding-top: 110px;
    }

    
    .file-upload .file-upload-select {
        display: block;
        cursor: pointer;
        text-align: left;
        overflow: hidden;
        position: relative;
        background: rgb(255, 255, 255);
        border: #c1c1c1 solid 1px;;
        height: 40px;
        color: black;
        font-size: 16px;
        line-height: 20px;
        width: 100%;
        -webkit-border-radius: 6px;
        border-radius: 6px;
        padding: 0 7px;

    }
    .file-upload .file-upload-select .file-select-button {
        background: rgb(255, 255, 255);
        border-right: #c1c1c1 solid 1px;
        padding: 10px;
        display: inline-block;
    }
    .file-upload .file-upload-select .file-select-name {
        display: inline-block;
        padding: 10px;
    }
    .file-upload .file-upload-select:hover .file-select-button {
        background: rgb(255, 255, 255);
        color: black;
        transition: all 0.2s ease-in-out;
        -moz-transition: all 0.2s ease-in-out;
        -webkit-transition: all 0.2s ease-in-out;
        -o-transition: all 0.2s ease-in-out;
    }
    .file-upload .file-upload-select input[type="file"] {
        display: none;
    }

</style>
          <!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">
                <h4 class="fw-bold py-4 px-4 mb-4" style="background-color: white;border-radius: 0.375rem;font-size:18px;">
                    Ajouter une <span class="text-muted fw-light">Catégorie </span>
                    <a href="{{route('list.admin.categories')}}"> <button class="primary-btn" style="float: right;">Liste des catégories</button></a>
                </h4>

              <!-- Basic Layout & Basic with Icons -->
              <div class="row">
                <!-- Basic Layout -->
                <div class="col-xxl">
                  <div class="card mb-4">
                   
                    <div class="card-body">
                      <form method="POST" action="{{route('update.admin.categories',$categorie->id)}}" enctype="multipart/form-data">
                        @csrf
                        @if(session()->has('success'))
                            <div class="container">
                                <div class="alert alert-success">
                                    {{ session()->get('success') }}
                                </div>
                            </div>
                        @endif
                        <div class="row my-3">

                            <label class="col-sm-2 mt-3 col-form-label" for="basic-default-name">Nom</label>
                            <div class="col-sm-4 mt-3">
                                <input type="text" class="form-control @error('name') is-invalid @enderror" value="{{ $categorie->name }}" name="name" id="basic-default-name" />
                                @error('name')
                                    <span class="alert alert-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-sm-12 mt-5">
                                <button type="submit" class="primary-btn">Ajouter</button>
                            </div>

                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- / Content -->
          </div>
          <!-- Content wrapper -->
@endsection
@section('script')
<script>
    $(document).ready(function(){

        let fileInput = document.getElementById("file-upload-input");
        let fileSelect = document.getElementsByClassName("file-upload-select")[0];
        fileSelect.onclick = function() {
            fileInput.click();
        }
        fileInput.onchange = function() {
            let filename = fileInput.files[0].name;
            let selectName = document.getElementsByClassName("file-select-name")[0];
            selectName.innerText = filename;
        }
        $('.categorie').click(function() {
            $(this).addClass('active');
            $('.menu-item').not('.categorie').removeClass('active');
        });
        $('.categorie').addClass('active');
        $('.menu-item').not('.categorie').removeClass('active');
    })
</script>
@endsection