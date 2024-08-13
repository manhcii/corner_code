<?php
    if (isset($component->json_params->properties_id)) {
        $paramater_id = $component->json_params->properties_id;
        $detail_paramate = $parameter->first(function ($item) use ($paramater_id) {
            return $item->id == $paramater_id;
        });
        if ($detail_paramate) {
            $paramate_childs = $parameter->filter(function ($item) use ($detail_paramate) {
                return $item->parent_id == $detail_paramate->id;
            });
        }
    }
?>


<div class="products-filter-item">
    <div class="products-filter-item-heading d-flex justify-content-between align-items-center"
        aria-expanded="true" data-bs-toggle="collapse" data-bs-target="#filter-color">
        <h2 class="heading">Colors</h2>
        <div class="icon position-relative">
            <div class="line position-absolute">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <rect x="6" y="11" width="12" height="2" fill="#818181" />
                </svg>
            </div>
            <div class="line position-absolute">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <rect x="6" y="11" width="12" height="2" fill="#818181" />
                </svg>
            </div>
        </div>
    </div>
    <div id="filter-color" class="collapse show">
        <ul class="products-filter-item-criteria" data-type="checkbox-color">
            <li>
                <div class="checkbox checkbox-color" data-color="E5E9EA"
                    data-status="uncheck"></div>
            </li>
            <li>
                <div class="checkbox checkbox-color" data-color="F0E7E0"
                    data-status="uncheck"></div>
            </li>
            <li>
                <div class="checkbox checkbox-color" data-color="D2DDE3"
                    data-status="uncheck"></div>
            </li>
            <li>
                <div class="checkbox checkbox-color" data-color="DDDACB"
                    data-status="uncheck"></div>
            </li>
            <li>
                <div class="checkbox checkbox-color" data-color="C9CED4"
                    data-status="uncheck"></div>
            </li>
            <li>
                <div class="checkbox checkbox-color" data-color="D8CECC"
                    data-status="uncheck"></div>
            </li>
            <li>
                <div class="checkbox checkbox-color" data-color="BDC3B9"
                    data-status="uncheck"></div>
            </li>
            <li>
                <div class="checkbox checkbox-color" data-color="CABB9E"
                    data-status="uncheck"></div>
            </li>
            <li>
                <div class="checkbox checkbox-color" data-color="7C8D95"
                    data-status="uncheck"></div>
            </li>
            <li>
                <div class="checkbox checkbox-color" data-color="5F6C5A"
                    data-status="uncheck"></div>
            </li>
        </ul>
    </div>
</div>
<?php /**PATH C:\xamppp\htdocs\corner\shushi\resources\views/frontend/components/sidebar_product/properties/layout/size.blade.php ENDPATH**/ ?>