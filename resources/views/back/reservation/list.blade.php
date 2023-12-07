

@extends('layouts.back')
@section('title', 'Utilisateurs')
@section('content')
 <!-- Content wrapper -->
 <div class="content-wrapper">
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-4 px-4 mb-4" style="background-color: white;border-radius: 0.375rem;font-size:18px;">
            <span class="text-muted fw-light">Total</span> {{$reservations->count()}} Reservations
        </h4>
        
        <!-- Borderless Table -->
        <div class="card">
            <h5 class="card-header">Reservations</h5>
            <div class="table-responsive text-nowrap">
            <table class="table table-borderless">
                <thead>
                <tr>
                    <th>Ref</th>
                    <th>Date</th>
                    <th>Services</th>
                    <th>Packs</th>
                    <th>Prix Totale</th>
                </tr>
                </thead>
                <tbody>
                    @foreach($reservations as $reservation)
                    <tr>
                        <td>N° {{$reservation->idR}}</td>
                        <td>{{$reservation->date}}</td>
                        <td>
                        	@foreach(unserialize($reservation->services) as $service)
                                @if(!empty($service['name'])){{$service['name']}} | {{$service['qty']}} x {{$service['price']}}DT<br> @endif
                            @endforeach	
                        </td>
                        <td>
                            @foreach(unserialize($reservation->packs) as $pack)
                                @if(!empty($pack['name'])) {{$pack['name']}}  x {{$pack['price']}}DT <br>@endif
                            @endforeach	
                        </td>
                       
                        <td>{{$reservation['prix']}}DT</td>

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
        $('.reservation').click(function() {
            $(this).addClass('active');
            $('.menu-item').not('.reservation').removeClass('active');
        });
        $('.reservation').addClass('active');
        $('.menu-item').not('.reservation').removeClass('active');
    })
</script>
@endsection