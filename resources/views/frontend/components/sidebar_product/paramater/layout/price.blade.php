
{{-- @isset($component)
<div class="block block-product-filter">
    <div class="block-title">
        <h2>{{$component->titel}}</h2>
    </div>
    <div class="block-content">
        <div id="slider-range" class="price-filter-wrap">
            <div class="filter-item price-filter d-flex">
                <div class="layout-slider">
                    <input id="price-filter" name="price" value="{{$request['price']??'0;1000'}}" />
                </div>
                <div class="layout-slider-settings ml-4">
                    <button type="submit" class="btn btn-success">@lang('Yes')</button>
                </div>
            </div>
        </div>
    </div>
</div>

@endisset --}}
@isset($component)
<div class="products-filter-item">
    <div class="products-filter-item-heading d-flex justify-content-between align-items-center"
        aria-expanded="true" data-bs-toggle="collapse" data-bs-target="#filter-price">
        <h2 class="heading">{{$component->title}}</h2>
        <div class="icon position-relative">
            <div class="line position-absolute">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <rect x="6" y="11" width="12" height="2" fill="#818181"></rect>
                </svg>
            </div>
            <div class="line position-absolute">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <rect x="6" y="11" width="12" height="2" fill="#818181"></rect>
                </svg>
            </div>
        </div>
    </div>
    <div id="filter-price" class="collapse show">
        <div class="products-filter-item-range-slider-wrapper">
            <div class="products-filter-item-range-slider"></div>
            <div
                class="products-filter-item-range-slider-input d-flex justify-content-between align-items-center">
                <input type="number" class="min" placeholder="Min" min="0"
                    max="99" oninput="changeValue('min')" />
                <div class="line"></div>
                <input type="number" class="max" placeholder="Max" min="1"
                    max="100" oninput="changeValue('max')" />
            </div>
        </div>
    </div>
</div>
@endisset
