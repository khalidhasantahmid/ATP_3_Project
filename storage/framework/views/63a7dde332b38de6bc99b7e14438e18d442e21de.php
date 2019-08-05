<?php $__env->startSection('content'); ?>
<center>

	<h1>Product List</h1>

	<table class="sTable">
            <tr>
                <th width="5%">Product Id</th>
                <th width="15%">Product Name</th>
                <th width="10%">Price</th>
                <th width="15%">Product Detail</th>
                <th width="25%">Image</th>
                <th width="15%">Added Date</th>
                <th width="15%">Added By</th>
            </tr>
            <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td width="5%"><?php echo e($product->id); ?></td>
                <td width="15%"><?php echo e($product->name); ?></td>
                <td width="10%"><?php echo e($product->price); ?></td>
                <td width="15%"><?php echo e($product->description); ?></td>
                <td width="25%"><img src="/assets/img/<?php echo e($product->path); ?>" style="width: 80px; height: 100px;"></td>
                <td width="15%"><?php echo e($product->addedDate); ?></td>
                <td width="15%"><?php echo e($product->addedBy); ?></td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </table>

 
</center>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.printHeader', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>