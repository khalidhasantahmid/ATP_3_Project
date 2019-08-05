<?php $__env->startSection('content'); ?>
<center>

	<h1>User List</h1>

	<table class="sTable">
            <tr>
                <th width="10%">Id</th>
                <th width="25%">Name</th>
                <th width="25%">Phone</th>
                <th width="25%">Email</th>
                <th width="15%">Type</th>
            </tr>
            <tbody id="Table3">
            <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td width="10%"><?php echo e($user->id); ?></td>
                <td width="25%"><?php echo e($user->name); ?></td>
                <td width="25%"><?php echo e($user->phone); ?></td>
                <td width="25%"><?php echo e($user->email); ?></td>
                <td width="15%"><?php echo e($user->type); ?></td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>

 
</center>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.printHeader', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>