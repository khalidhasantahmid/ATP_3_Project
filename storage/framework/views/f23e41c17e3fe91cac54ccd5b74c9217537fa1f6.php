<?php $__env->startSection('content'); ?>
<center>

	<h1>Print Invoice</h1>

    <a href="<?php echo e(route('print.invoice', ['cartId' => $cartId])); ?>"><b style="color: green;" id="print123"><h3>Print</h3></b></a></td>

<script type="text/javascript">

        $(document).ready(function(){
            $('#print123').printPage();
        });

    </script>
</center>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.printHeader', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>