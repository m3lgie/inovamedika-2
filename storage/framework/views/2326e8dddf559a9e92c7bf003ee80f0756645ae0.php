<style media="screen">
.table {
 margin: auto;
 width: 50% !important;
 font-size: 10px;
}
</style>



    <link href="<?php echo e(asset('template/plugins/bootstrap/css/bootstrap.css')); ?>" rel="stylesheet">
<div class="item form-group">
		<div class="col-sm-12">
		<center> <h3> Laporan Penjualan </h3>
		<h4> Periode <?php echo e($start); ?> s/d <?php echo e($end); ?></h4></center>
		</div>
</div>

<div class="row justify-content-center">
<div class="col-sm-12">

	<table class="table table-bordered table-striped table-hover">
			<thead>
					<tr>
						<th>Id</th>
						<th>No Invoice</th>
						<th>Date</th>
						<th>Name</th>
						<th>Phone</th>
						<th>Total</th>
						<th>payment</th>
						<th>Status</th>

					</tr>
			</thead>

			<tbody>
				<?php 
				$i=0;
				$subtotal=0;
				$total=0;
				$totaldisc=0;
				 ?>
				<?php $__currentLoopData = $transactions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $transactions): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>

								<tr class="grade<?php echo e($transactions->id); ?>">
								 <td>


												 <?php echo e($i+1); ?>



								 </td>
								<td><?php echo e($transactions->invoice_no); ?></td>
								<td><?php echo e($transactions->date); ?></td>
								<td><?php echo e($transactions->customer_name); ?></td>
								<td><?php echo e($transactions->customer_phone); ?></td>
								<td><?php echo e(Konversi::rupiah($transactions->total)); ?></td>
								<td><?php echo e(Konversi::rupiah($transactions->payment)); ?></td>
								<td> <?php echo e(Konversi::status($transactions->status)); ?></td>



			</tr>
			<?php 
			$total+=$transactions->total;
			$i++;
			 ?>
			 <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>

			 <tr><td colspan="6"><h5>Total Transaksi</h5></td><td colspan="2"><h5><?php echo e(Konversi::rupiah($total)); ?></h5></td></tr>
			 <tr><td colspan="6"><h5>Total Transaksi</h5></td><td colspan="2"><h5><?php echo e($i); ?></h5></td></tr>
			</tbody>
	</table>


</div>
