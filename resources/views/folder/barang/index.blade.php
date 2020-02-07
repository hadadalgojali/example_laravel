@extends('template')
@section('content')
<script>
    window.reactInit = {
        url       : "{{URL::to('/')}}",
        csrf_token: "{{csrf_token()}}",
    };
</script>

	<div class ="container-fluid">

		<h1 class ="mt-4">Informasi Barang</h1>
		<a class="btn btn-primary" href="{{URL::to('/')}}/barang/form">Tambah</a>
		<hr/>
		<div id="grid-barang"></div>
	</div>
@endsection

@push('scripts')
	<script type="text/javascript">
	</script>
@endpush