@extends('layouts.back')
@section('title', 'services')
@section('content')

<style>
    .sticky-header-section{
            background-color:#333333!important
        }
        .default-header-p {
            padding-top: 110px;
        }

        
        .file-upload .file-upload-select,.file-upload .file-upload-select1 {
            display: block;
            cursor: pointer;
            text-align: left;
            overflow: hidden;
            position: relative;
            background: white;
            border: 1px solid transparent;
            height: 40px;
            color: black;
            font-size: 16px;
            line-height: 20px;
            width: 100%;
            -webkit-border-radius: 6px;
            border-radius: 6px;
            padding: 0 7px;
            border: 1px #c1c1c1 solid
        }
        .file-upload .file-upload-select .file-select-button,.file-upload .file-upload-select1 .file-select-button1 {
            background: white;
            border-right: #c1c1c1 solid 1px;
            padding: 10px;
            display: inline-block;
        }
        .file-upload .file-upload-select .file-select-name,.file-upload .file-upload-select1 .file-select-name1 {
            display: inline-block;
            padding: 10px;
        }
        .file-upload .file-upload-select:hover .file-select-button,.file-upload .file-upload-select1:hover .file-select-button1 {
            background: white;
            color: black;
            transition: all 0.2s ease-in-out;
            -moz-transition: all 0.2s ease-in-out;
            -webkit-transition: all 0.2s ease-in-out;
            -o-transition: all 0.2s ease-in-out;
        }
        .file-upload .file-upload-select input[type="file"],.file-upload .file-upload-select1 input[type="file"] {
            display: none;
        }

</style>
          <!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">
                <h4 class="fw-bold py-4 px-4 mb-4" style="background-color: white;border-radius: 0.375rem;font-size:18px;">
                    Ajouter un <span class="text-muted fw-light">Service </span>
                    <a href="{{route('list.admin.services')}}"> <button class="primary-btn" style="float: right;">Liste des Services</button></a>
                </h4>

              <!-- Basic Layout & Basic with Icons -->
              <div class="row">
                <!-- Basic Layout -->
                <div class="col-xxl">
                  <div class="card mb-4">
                   
                    <div class="card-body">
                      <form method="POST" action="{{route('store.admin.services')}}" enctype="multipart/form-data">
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
                                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="basic-default-name" />
                                @error('name')
                                    <span class="alert alert-danger">{{ $message }}</span>
                                @enderror
                            </div>


                            <label class="col-sm-2 mt-3 col-form-label" for="basic-default-name">Prix (DT)</label>
                            <div class="col-sm-4 mt-3">
                                <input type="text" class="form-control @error('price') is-invalid @enderror"  name="price" id="basic-default-name" />
                                @error('price')
                                    <span class="alert alert-danger">{{ $message }}</span>
                                @enderror
                            </div>

            

                            
                            <label class="col-sm-2 mt-3 col-form-label" for="basic-default-company">Adresse</label>
                            <div class="col-sm-4 mt-3">
                                <input type="text" class="form-control @error('adress') is-invalid @enderror" name="adress" id="basic-default-company"/>
                                @error('adress')
                                    <span class="alert alert-danger">{{ $message }}</span>
                                @enderror
                            </div>
                    
                            <label class="col-sm-2 mt-3 col-form-label" for="basic-default-email">Type du service:</label>
                            <div class="col-sm-4 mt-3">
                                <select class="form-select @error('types') is-invalid @enderror" name="types" id="exampleFormControlSelect1" >
                                    <option selected disabled>Choisir un type de service</option>
                                    @foreach($typesS as $p)
                                        <option value="{{$p->typename}}">{{$p->typename}}</option>
                                    @endforeach
                                </select>

                                @error('pays')
                                    <span class="alert alert-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <label class="col-sm-2 mt-3 col-form-label" for="basic-default-email">Image</label>
                            <div class="col-sm-4 mt-3">
                                    <div class="file-upload">
                                        <div class="file-upload-select">
                                            <div class="file-select-button" >Choisir image</div>
                                        <div class="file-select-name">Aucun image choisi...</div> 
                                        <input type="file" value="{{old('image')}}" name="image" id="file-upload-input">
                                        </div>
                                    </div>
                                    @error('image')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                            </div>

                            <label class="col-sm-2 mt-3 col-form-label" for="basic-default-email">Image 360°</label>
                            <div class="col-sm-4 mt-3">
                                    <div class="file-upload">
                                        <div class="file-upload-select1">
                                            <div class="file-select-button1" >Choisir image 360°</div>
                                            <div class="file-select-name1">Aucun image choisi 360° ...</div> 
                                            <input type="file" value="{{old('image360')}}" name="image360" id="file-upload-input1">
                                        </div>
                                    </div>
                               
                            </div>

                            <label class="col-sm-2 mt-3 col-form-label" for="basic-default-email">Prestataire:</label>
                            <div class="col-sm-10 mt-3">
                                <select class="form-select @error('types') is-invalid @enderror" name="id_user" id="exampleFormControlSelect1" >
                                    <option selected disabled>Choisir un prestataire</option>
                                    @foreach($users as $user)
                                        <option value="{{$user->id}}">{{$user->nom}} {{$user->prenom }}</option>
                                    @endforeach
                                </select>

                                @error('pays')
                                    <span class="alert alert-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <label class="col-sm-2 mt-3 col-form-label" for="basic-default-email">Description</label>
                            <div class="col-sm-10 mt-3">
                                <textarea style="height: 150px" id="basic-default-email" class="form-control @error('description') is-invalid @enderror" name="description" class="form-control">{{old('description')}}</textarea>
                                @error('description')
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

        let fileInput1 = document.getElementById("file-upload-input1");
        let fileSelect1 = document.getElementsByClassName("file-upload-select1")[0];
        fileSelect1.onclick = function() {
            fileInput1.click();
        }
        fileInput1.onchange = function() {
            let filename1 = fileInput1.files[0].name;
            let selectName1 = document.getElementsByClassName("file-select-name1")[0];
            selectName1.innerText = filename1;
        }

    
        $('.services').click(function() {
            $(this).addClass('active');
            $('.menu-item').not('.services').removeClass('active');
        });
        $('.services').addClass('active');
        $('.menu-item').not('.services').removeClass('active');
    })
   
</script>
@endsection