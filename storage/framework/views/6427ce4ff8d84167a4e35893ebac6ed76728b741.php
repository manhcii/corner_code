

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
<?php $__env->startSection('content'); ?>
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <?php echo e($module_name); ?>

            <a class="btn btn-sm btn-warning pull-right" href="<?php echo e(route(Request::segment(2) . '.create')); ?>"><i
                    class="fa fa-plus"></i> <?php echo app('translator')->get('Add'); ?></a>
        </h1>
    </section>

    <!-- Main content -->
    <section class="content">
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

        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title"><?php echo app('translator')->get('Update form'); ?></h3>
                <?php if(isset($languages)): ?>
                    <?php $__currentLoopData = $languages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($item->is_default == 1 && $item->lang_locale != Request::get('lang')): ?>
                            <?php if(Request::get('lang') != ''): ?>
                                <a class="text-primary pull-right"
                                    href="<?php echo e(route(Request::segment(2) . '.edit', $detail->id)); ?>" style="padding-left: 15px">
                                    <i class="fa fa-language"></i> <?php echo e(__($item->lang_name)); ?>

                                </a>
                            <?php endif; ?>
                        <?php else: ?>
                            <?php if(Request::get('lang') != $item->lang_locale): ?>
                                <a class="text-primary pull-right"
                                    href="<?php echo e(route(Request::segment(2) . '.edit', $detail->id)); ?>?lang=<?php echo e($item->lang_locale); ?>"
                                    style="padding-left: 15px">
                                    <i class="fa fa-language"></i> <?php echo e(__($item->lang_name)); ?>

                                </a>
                            <?php endif; ?>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
                <span class="pull-right"><?php echo app('translator')->get('Translations'); ?>: </span>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" action="<?php echo e(route(Request::segment(2) . '.update', $detail->id)); ?>" method="POST">
                <?php echo csrf_field(); ?>
                <?php echo method_field('PUT'); ?>
                <?php if(Request::get('lang') != '' && Request::get('lang') != $languageDefault->lang_locale): ?>
                    <input type="hidden" name="lang" value="<?php echo e(Request::get('lang')); ?>">
                <?php endif; ?>
                <div class="box-body">
                    <!-- Custom Tabs -->
                    <div class="nav-tabs-custom">
                        <ul class="nav nav-tabs">
                            <li class="active">
                                <a href="#tab_1" data-toggle="tab">
                                    <h5>
                                        <?php echo app('translator')->get('General information'); ?>
                                        <span class="text-danger">*</span>
                                    </h5>
                                </a>
                            </li>

                            <button type="submit" class="btn btn-primary btn-sm pull-right">
                                <i class="fa fa-floppy-o"></i>
                                <?php echo app('translator')->get('Save'); ?>
                            </button>
                        </ul>

                        <div class="tab-content">

                            <div class="tab-pane active" id="tab_1">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>
                                                <?php echo app('translator')->get('Title'); ?>
                                                <small class="text-red">*</small>
                                            </label>
                                            <input type="text" class="form-control" name="title"
                                                placeholder="<?php echo app('translator')->get('Title'); ?>"
                                                value="<?php echo e(old('title') ?? ($detail->json_params->title->$lang ?? $detail->title)); ?>"
                                                required>
                                        </div>
                                    </div>
                                    <?php if(isset($component_configs)): ?>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label><?php echo app('translator')->get('Layout'); ?></label>
                                                <select name="json_params[layout]" id="component_layout"
                                                    class="form-control select2" style="width: 100%">
                                                    <option value=""><?php echo app('translator')->get('Please select'); ?></option>
                                                    <?php $__currentLoopData = $component_configs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <?php if($item->component_code == $detail->component_code): ?>
                                                            <?php
                                                                $json_params = json_decode($item->json_params);
                                                            ?>
                                                            <?php if(isset($json_params->layout)): ?>
                                                                <?php $__currentLoopData = $json_params->layout; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $name => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                    <option value="<?php echo e($value); ?>"
                                                                        <?php echo e(isset($detail->json_params->layout) && $value == $detail->json_params->layout ? 'selected' : ''); ?>>
                                                                        <?php echo e(__($value)); ?>

                                                                    </option>
                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                            <?php endif; ?>
                                                        <?php endif; ?>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </select>
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>
                                                <?php echo app('translator')->get('Select Properties'); ?>
                                                <small class="text-red">*</small>
                                            </label>
                                            <select name="json_params[properties_id]" id="json_params_menu_id"
                                                class="form-control select2" style="width: 100%" required>
                                                <option value=""><?php echo app('translator')->get('Please select'); ?></option>
                                                <?php $__currentLoopData = $parameter; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <?php if($item->parent_id == 0 || $item->parent_id == null): ?>
                                                        <option value="<?php echo e($item->id); ?>"
                                                            <?php echo e(isset($detail->json_params->properties_id) && $detail->json_params->properties_id == $item->id ? 'selected' : ''); ?>>
                                                            <?php echo e($item->name); ?> (<?php echo e($item->is_type); ?>)
                                                        </option>
                                                    <?php endif; ?>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label><?php echo app('translator')->get('Status'); ?></label>
                                            <div class="form-control">
                                                <?php $__currentLoopData = App\Consts::STATUS; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <label>
                                                        <input type="radio" name="status" value="<?php echo e($value); ?>"
                                                            <?php echo e($detail->status == $value ? 'checked' : ''); ?>>
                                                        <small class="mr-15"><?php echo e(__($value)); ?></small>
                                                    </label>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label><?php echo app('translator')->get('Order'); ?></label>
                                            <input type="number" class="form-control" name="iorder"
                                                placeholder="<?php echo app('translator')->get('Order'); ?>"
                                                value="<?php echo e(old('iorder') ?? $detail->iorder); ?>">
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label><?php echo app('translator')->get('Brief'); ?></label>
                                            <textarea name="brief" id="brief" class="form-control" rows="5"><?php echo e(old('brief') ?? ($detail->json_params->brief->$lang ?? $detail->brief)); ?></textarea>
                                        </div>
                                    </div>

                                </div>
                            </div>

                        </div>
                    </div>

                </div>

                <div class="box-footer">
                    <a class="btn btn-success btn-sm" href="<?php echo e(route(Request::segment(2) . '.index')); ?>">
                        <i class="fa fa-bars"></i> <?php echo app('translator')->get('List'); ?>
                    </a>
                    <button type="submit" class="btn btn-primary pull-right btn-sm"><i class="fa fa-floppy-o"></i>
                        <?php echo app('translator')->get('Save'); ?></button>
                </div>
            </form>
        </div>
    </section>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    <script>
        $(document).ready(function() {

        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xamppp\htdocs\corner\shushi\resources\views/admin/pages/components/edit/properties.blade.php ENDPATH**/ ?>