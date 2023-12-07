
<!DOCTYPE html>
<html>
<head>




<style>
  @media print {
    @page {
    size: auto;   /* auto is the initial value */
    size: A4 portrait;
    margin: 0;  /* this affects the margin in the printer settings */
    border: 1px solid red;  /* set a border for all printed pages */
  }}
body {
  background: #e7e9ed;
  color: #181818;
  font-family: "Poppins", sans-serif;
  font-size: 14px;
  line-height: 22px;
}

form {
  padding: 0;
  margin: 0;
  display: inline;
}


</style>

<!-- Container -->
<div class="container-fluid invoice-container">



	<title>Reçu de paiement de réservation</title>
	<style>
		table {
			border-collapse: collapse;
			width: 100%;
		}

		th, td {
			text-align: left;
			padding: 8px;
			border-bottom: 1px solid #ddd;
		}

		tr:hover {
			background-color: #f5f5f5;
		}

		th {
			background-color: #4CAF50;
			color: white;
		}
	</style>
</head>

<body>
@foreach($reservation as $Reservation)

@if($idr == $Reservation->idR)
	<h2>Reçu de paiement de réservation</h2>

	<table>
		<tr>
			<th>Numéro de réservation</th>
			<td>{{$Reservation->idR}}</td>
		</tr>
		<tr>
			<th>Mail</th>
			<td>{{$Reservation->email}}</td>
		</tr>
		<tr>
			<th>Date de réservation</th>
			<td>{{$Reservation->date}}</td>
		</tr>
		<tr>
			<th>Montant total</th>
			<td>{{$Reservation->prix}}</td>
		</tr>
		<tr>
			<th>Méthode de paiement</th>
			<td>Carte de crédit</td>
		</tr>
	</table>
	@endif
    @endforeach

<div class="form-control btn btn-primary submit-button"> <a href="javascript:window.print()" class=""><i class="dripicons dripicons-download"></i> Imprimer</a>  </div>
    <footer>
      <!-- Pied de page de la page -->
    </footer>
</body>
</html>
