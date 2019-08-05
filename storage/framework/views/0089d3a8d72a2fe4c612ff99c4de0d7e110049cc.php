<?php $__env->startSection('content'); ?>
<center>

	<h1>Order List</h1>

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
            <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td width="10%"><?php echo e($order->id); ?></td>
                <td width="10%"><?php echo e($order->oStatus); ?></td>
                <td width="15%"><?php echo e($order->cartId); ?></td>
                <td width="20%"><?php echo e($order->date); ?></td>
                <td width="10%"><?php echo e($order->cost); ?></td>
                <td width="20%"><?php echo e($order->address); ?></td>
                <td width="15%"><?php echo e($order->cEmail); ?></td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>

 
</center>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('.printHeader', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>