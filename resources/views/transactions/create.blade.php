@extends('layouts/app')

@section('content')

				@if ($errors->any())
					<div class='flash alert-danger'>
					@foreach ( $errors->all() as $error )
					<p>{{ $error }}</p>
					@endforeach
					</div>
				@endif

				@if(Session::has('alert-success'))
						<div class="alert alert-success">
									{{ Session::get('alert-success') }}
							</div>
				@endif

						<div class="form-group">
								<div class="item form-group">
								<label class="control-label col-sm-2" for="keterangan">Find Produk </label>
								<div class="col-sm-3">

												<div class="form-line">
													{!! Form::text('search', null,array('class' => 'form-control','data-validate-length-range'=>'5','name'=>'customer_name','id'=>'search','required'=>'required'),'') !!}

												</div>

								</div>
								</div>


						</div>






			<div class="col-sm-12">

				<div id="search_result" class="search_result">
				</div>

			</div>



        		@include('transactions/form/form', ['submit_text' => 'Proses Transaction'])







					<script type="text/javascript">
					$('#search').on('keyup',function(){
					$value=$(this).val();

					if ($value.length >= 3) {

							$.ajax({
							type : 'get',
							url : '{{URL::to('search')}}',
							data:{'search':$value},
							success:function(data){
							$('#search_result').html(data);
							}
							});

					}
					})
					</script>

					<script type="text/javascript">
					$.ajaxSetup({ headers: { 'csrftoken' : '{{ csrf_token() }}' } });
					</script>


					<script>
					(function() {
					    var delay = (function(){
					        var timer = 0;
					        return function(callback, ms){
					            clearTimeout (timer);
					            timer = setTimeout(callback, ms);
					        };
					    })();

					    $('#query').keyup(function() {
					        delay(function() {
					            var query = $('#query').val();
											var url = '{{ route("products.find", ":id") }}';
													url = url.replace(':id', query);
					            if (query.length >= 3) {
												$.post('{{ route("products.find", "1") }}',
												    {
												        value : value
												    },
												    function(data, status){
												        alert('value stored');
												    });



					            }
					        }, 200 );
					    });
					})();
					</script>


@endsection
