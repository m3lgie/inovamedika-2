<?php $__env->startSection('content'); ?>

				<?php if($errors->any()): ?>
					<div class='flash alert-danger'>
					<?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
					<p><?php echo e($error); ?></p>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
					</div>
				<?php endif; ?>

				<?php if(Session::has('alert-success')): ?>
						<div class="alert alert-success">
									<?php echo e(Session::get('alert-success')); ?>

							</div>
				<?php endif; ?>

						<div class="form-group">
								<div class="item form-group">
								<label class="control-label col-sm-2" for="keterangan">Find Produk </label>
								<div class="col-sm-3">

												<div class="form-line">
													<?php echo Form::text('search', null,array('class' => 'form-control','data-validate-length-range'=>'5','name'=>'customer_name','id'=>'search','required'=>'required'),''); ?>


												</div>

								</div>
								</div>


						</div>






			<div class="col-sm-12">

				<div id="search_result" class="search_result">
				</div>

			</div>



        		<?php echo $__env->make('transactions/form/form', ['submit_text' => 'Proses Transaction'], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>







					<script type="text/javascript">
					$('#search').on('keyup',function(){
					$value=$(this).val();

					if ($value.length >= 3) {

							$.ajax({
							type : 'get',
							url : '<?php echo e(URL::to('search')); ?>',
							data:{'search':$value},
							success:function(data){
							$('#search_result').html(data);
							}
							});

					}
					})
					</script>

					<script type="text/javascript">
					$.ajaxSetup({ headers: { 'csrftoken' : '<?php echo e(csrf_token()); ?>' } });
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
											var url = '<?php echo e(route("products.find", ":id")); ?>';
													url = url.replace(':id', query);
					            if (query.length >= 3) {
												$.post('<?php echo e(route("products.find", "1")); ?>',
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


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts/app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>