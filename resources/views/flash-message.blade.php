
<script>

$(document).ready(function(){

	@if (Session::has('critique'))
	$.toast({
		heading: 'Avertissement',
		text : ('{{ Session::get("critique") }}', 'Un groupe sanguin a atteint le seuil minimal! @can('sms_alerte') <a href="{{ route('seuilsms.index') }}">Envoyer le message d\'alerte</a> @endcan'), 
		icon: 'warning',
		position : 'top-right',
		hideAfter: 10000000000000000,
		bgColor: '#DFAF2C',
		textcolor: 'black'
		})

	@endif

	@if (Session::has('success'))
	swal('Succés!', '{{Session::get("success")}}', 'success')
	@endif

	@if (Session::has('erreur'))
	swal('erreur', '{{Session::get("erreur")}}', 'erreur')
	@endif

	@if (Session::has('error'))
	swal('Erreur', '{{Session::get("error")}}', 'error')
	@endif


	@if ($errors->any())
	swal('Erreur!', `@foreach($errors->all() as $error) {{ $error . "\n" }} @endforeach`, 'error')

	@endif


});

</script>
