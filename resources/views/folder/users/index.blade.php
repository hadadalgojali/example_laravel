@extends('template')
@section('content')
<script>
    window.reactInit = {
        url       : "{{URL::to('/')}}",
        csrf_token: "{{csrf_token()}}",
    };
</script>

	<div class ="container-fluid">
		<h1 class ="mt-4">Informasi Pengguna</h1>
		<a class="btn btn-primary" href="{{URL::to('/')}}/users/form">Tambah</a>
		<hr/>
		<div id="grid-users"></div>
	</div>
@endsection

@push('scripts')
	<script type="text/javascript">
	</script>
@endpush