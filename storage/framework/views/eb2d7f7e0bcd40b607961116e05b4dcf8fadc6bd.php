<?php $__env->startSection('title'); ?>
    <?php echo e($module_name); ?>

<?php $__env->stopSection(); ?>
<?php
    if (Request::get('lang') == $languageDefault->lang_locale || Request::get('lang') == '') {
        $lang = $languageDefault->lang_locale;
    } else {
        $lang = Request::get('lang');
    }
?>
<?php $__env->startSection('content-header'); ?>
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <?php echo e($module_name); ?>

            <a class="btn btn-sm btn-warning pull-right" href="<?php echo e(route(Request::segment(2) . '.create')); ?>"><i
                    class="fa fa-plus"></i> <?php echo app('translator')->get('Add'); ?></a>
        </h1>
    </section>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <!-- Main content -->
    <section class="content">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title"><?php echo app('translator')->get('Menu list'); ?></h3>
                <?php if(isset($languages)): ?>
                    <div class="collapse navbar-collapse pull-right">
                        <ul class="nav navbar-nav">
                            <li class="dropdown">
                                <a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="fa fa-language"></i>
                                    <?php echo e(Request::get('lang') && Request::get('lang') != $languageDefault->lang_code
                                        ? $languages->first(function ($item, $key) use ($lang) {
                                            return $item->lang_code == $lang;
                                        })['lang_name']
                                        : $languageDefault->lang_name); ?>

                                    <span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu" role="menu">
                                    <?php $__currentLoopData = $languages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php if($item->lang_code != $languageDefault->lang_code): ?>
                                            <li>
                                                <a href="<?php echo e(route(Request::segment(2) . '.index')); ?>?lang=<?php echo e($item->lang_locale); ?>"
                                                    style="padding-top:10px; padding-bottom:10px;">
                                                    <i class="fa fa-language"></i>
                                                    <?php echo e($item->lang_name); ?>

                                                </a>
                                            </li>
                                        <?php else: ?>
                                            <li>
                                                <a href="<?php echo e(route(Request::segment(2) . '.index')); ?>"
                                                    style="padding-top:10px; padding-bottom:10px;">
                                                    <i class="fa fa-language"></i>
                                                    <?php echo e($item->lang_name); ?>

                                                </a>
                                            </li>
                                        <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <span class="pull-right" style="padding: 15px"><?php echo app('translator')->get('Translations'); ?>: </span>
                <?php endif; ?>

            </div>
            <div class="box-body table-responsive">
                <?php if(session('errorMessage')): ?>
                    <div class="alert alert-warning alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <?php echo e(session('errorMessage')); ?>

                    </div>
                <?php endif; ?>
                <?php if(session('successMessage')): ?>
                    <div class="alert alert-success alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <?php echo e(session('successMessage')); ?>

                    </div>
                <?php endif; ?>
                <?php if($errors->any()): ?>
                    <div class="alert alert-danger alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <p><?php echo e($error); ?></p>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                <?php endif; ?>
                <?php if(count($rows) == 0): ?>
                    <div class="alert alert-warning alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <?php echo app('translator')->get('not_found'); ?>
                    </div>
                <?php else: ?>
                    <table class="table table-hover table-bordered">
                        <thead>
                            <tr>
                                <th><?php echo app('translator')->get('Title'); ?></th>
                                <th><?php echo app('translator')->get('Order'); ?></th>
                                <th><?php echo app('translator')->get('Updated at'); ?></th>
                                <th><?php echo app('translator')->get('Status'); ?></th>
                                <th><?php echo app('translator')->get('Action'); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $rows; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if($row->parent_id == 0 || $row->parent_id == null): ?>
                                    <form action="<?php echo e(route(Request::segment(2) . '.destroy', $row->id)); ?>" method="POST"
                                        onsubmit="return confirm('<?php echo app('translator')->get('confirm_action'); ?>')">
                                        <tr class="valign-middle">
                                            <td>
                                                <a href="<?php echo e(route(Request::segment(2) . '.edit', $row->id)); ?>">
                                                    <strong
                                                        style="font-size: 14px;"><?php echo e($row->json_params->name->$lang ?? $row->name); ?></strong>
                                                </a>
                                                <br>
                                                <?php echo e($row->json_params->name->$lang ?? $row->name); ?>

                                            </td>
                                            <td style="width: 100px;">
                                                <input data-token="<?php echo e(csrf_token()); ?>"
                                                    data-url="<?php echo e(route('admin.loadOrderVeryModel', ['table' => 'menus', 'id' => $row->id])); ?> "
                                                    class="lb-order text-center" type="number" min="0"
                                                    value="<?php echo e($row->iorder ? $row->iorder : 0); ?>" style="width:50px" />
                                            </td>
                                            <td>
                                                <?php echo e($row->updated_at); ?>

                                            </td>
                                            <td class="wrap-load-active" data-token="<?php echo e(csrf_token()); ?>"
                                                data-url="<?php echo e(route('admin.loadStatusMenu', ['id' => $row->id])); ?>">
                                                <?php echo $__env->make('admin.components.load-change-status', [
                                                    'data' => $row,
                                                    'type' => 'bản ghi',
                                                ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                            </td>
                                            <td>
                                                <a class="btn btn-sm btn-warning" data-toggle="tooltip"
                                                    title="<?php echo app('translator')->get('Edit'); ?>" data-original-title="<?php echo app('translator')->get('Edit'); ?>"
                                                    href="<?php echo e(route(Request::segment(2) . '.edit', $row->id)); ?>">
                                                    <i class="fa fa-pencil-square-o"></i>
                                                </a>
                                                <?php echo csrf_field(); ?>
                                                <?php echo method_field('DELETE'); ?>
                                                <button class="btn btn-sm btn-danger" type="submit" data-toggle="tooltip"
                                                    title="<?php echo app('translator')->get('Delete'); ?>" data-original-title="<?php echo app('translator')->get('Delete'); ?>">
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                            </td>
                                        </tr>
                                    </form>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                <?php endif; ?>
            </div>
            <div class="box-footer clearfix">
                <div class="row">
                    <div class="col-sm-5">
                        <?php echo app('translator')->get('Have '); ?> <?php echo e($rows->total()); ?> <?php echo app('translator')->get('records'); ?>
                    </div>
                    <div class="col-sm-7">
                        <?php echo e($rows->withQueryString()->links('admin.pagination.default')); ?>

                    </div>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\pizza\resources\views/admin/pages/menus/index.blade.php ENDPATH**/ ?>