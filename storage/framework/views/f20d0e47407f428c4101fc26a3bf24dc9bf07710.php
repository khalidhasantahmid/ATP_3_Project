<?php $__env->startSection('content'); ?>
<center>

	<h1>Completed Orders</h1>
    <br>
    <h3>Total sale : <strong style="color: green;"><?php echo e($totalCost); ?></strong></h3>

	<table class="sTable">
            <tr>
                <th width="10%">Order Id</th>
                <th width="10%">Order Status</th>
                <th width="10%">Cart Id</th>
                <th width="20%">Date</th>
                <th width="5%">Cost</th>
                <th width="20%">Address</th>
                <th width="15%">Customer Email</th>
            </tr>
            <tbody id="Table">
            <?php $__currentLoopData = $sales; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sale): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td width="10%"><?php echo e($sale->id); ?></td>
                <td width="10%"><?php echo e($sale->oStatus); ?></td>
                <td width="15%"><?php echo e($sale->cartId); ?></td>
                <td width="20%"><?php echo e($sale->date); ?></td>
                <td width="10%"><?php echo e($sale->cost); ?></td>
                <td width="20%"><?php echo e($sale->address); ?></td>
                <td width="15%"><?php echo e($sale->cEmail); ?></td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>

 
</center>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.printHeader', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>