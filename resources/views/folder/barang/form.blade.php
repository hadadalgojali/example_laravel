@extends('template')
@section('content')
	<div class ="container-fluid">
		<div style="margin-top: 10px;display: none;" id="msg-success" class="alert alert-primary" role="alert">Success</div>
		<div style="margin-top: 10px;display: none;" id="msg-error" class="alert alert-danger" role="alert">Failed</div>

		<h1 class ="mt-4">Formulir Barang</h1>
		<form action="#" id="form_process" method="POST">
			<input type="hidden" name="id" id="id" value="{{ $id }}" />
			<div id="textfield-code"  data-code="{{ $code }}"></div>
			<div id="textfield-barang" data-barang="{{ $barang }}"></div>
		</form>
		<button class="btn btn-primary" id="btn-save">Simpan</button> <i id="loading" class="fa fa-spinner fa-pulse fa-fw" style="display: none;"></i>
	</div>
@endsection

@push('scripts')
	<script type="text/javascript">
		$("#btn-save").click(function(){
			document.getElementById('msg-success').style.display = "none";
			document.getElementById('msg-error').style.display = "none";
			document.getElementById('loading').style.display = "";
			document.getElementById('btn-save').disabled = true;
			var url = "";

			if ($("#id").val().length == 0) {
				url = "{{ URL('/') }}/api/v1/create/barang";
			}else{
				url = "{{ URL('/') }}/api/v1/update/barang";
			}

			axios.post(url, encrypt_parameter({
				parameter : $("#form_process").serialize(),
			}))
			.then(function (response) {
				console.log(response);
				if (response.data.code == 200) {
					document.getElementById('msg-success').style.display = "";
					$("#msg-success").html(response.data.message);
				}else{
					document.getElementById('msg-error').style.display = "";
					$("#msg-error").html(response.data.message);
				}
				document.getElementById('loading').style.display = "none";
				document.getElementById('btn-save').disabled = false;
				// $("msg-success").html("Error connection");
			})
			.catch(error => {
				document.getElementById('msg-error').style.display = "";
				$("msg-error").html("Error connection");
				document.getElementById('loading').style.display = "none";
				document.getElementById('btn-save').disabled = false;
			});
		});
	</script>
@endpush