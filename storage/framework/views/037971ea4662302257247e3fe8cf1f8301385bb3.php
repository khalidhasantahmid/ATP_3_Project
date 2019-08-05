<?php $__env->startSection('content'); ?>
<center>

	<h1>Invoice</h1>

<br>

<h2>ID: <?php echo e($cartId); ?></h2>
	<table class="sTable">
            <tr>
                <th width="10%">Item Name</th>
                <th width="10%">Quantity</th>
                <th width="10%">Price</th>
                <th width="10%">Total</th>
            </tr>
            <?php $__currentLoopData = $carts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cart): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td width="10%"><?php echo e($cart->name); ?></td>
                <td width="10%"><?php echo e($cart->quantity); ?></td>
                <td width="15%"><?php echo e($cart->price); ?></td>
                <td width="20%"><?php echo e($cart->total); ?></td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td colspan="3" style="text-align: right;"><strong>Total : </strong></td>
                <td><?php echo e($cartTotal); ?></td>
            </tr>
        </table>

</center>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.printHeader', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>