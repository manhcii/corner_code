<a  class="btn btn-sm <?php echo e($data->status=='active'?'btn-success':'btn-warning'); ?> lb-active" data-value="<?php echo e($data->status); ?>" data-type="<?php echo e($type?$type:''); ?>"  style="width:150px;"> <?php echo app('translator')->get($data->status); ?></a>
<?php /**PATH C:\xamppp\htdocs\flavor-fusion\resources\views/admin/components/load-change-status.blade.php ENDPATH**/ ?>