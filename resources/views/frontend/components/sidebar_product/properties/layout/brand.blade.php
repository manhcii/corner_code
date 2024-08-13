@php
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
@endphp

{{-- @isset($detail_paramate)
    <div class="block block-product-filter clearfix">
        <div class="block-title">
            <h2>{{ $detail_paramate->name }}</h2>
        </div>
        <div class="block-content">
            @isset($paramate_childs)
                <ul class="filter-items image">
                    @foreach ($paramate_childs as $item)
                        <li>
                            <span class="cursor click_input {{(isset($request['brand']) && $request['brand'] == $item->propety_value)?'active':''}}">
                                <input class="input_hiddent" value="{{ $item->propety_value }}" name="brand" type="radio" {{(isset($request['brand']) && $request['brand'] == $item->propety_value)?'checked':''}}>
                                <img src="{{ $item->image ?? '' }}" alt="{{ $item->title }}">
                            </span>
                        </li>
                    @endforeach
                </ul>
            @endisset
        </div>
    </div>
@endisset --}}
@isset($detail_paramate)
<div class="products-filter-item">
    <div class="products-filter-item-heading d-flex justify-content-between align-items-center"
        aria-expanded="true" data-bs-toggle="collapse" data-bs-target="#filter-brand">
        <h2 class="heading">
            {{ $detail_paramate->name }} <span class="quantity">(22)</span>
        </h2>
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

    <div id="filter-brand" class="collapse show">
        <div class="products-filter-item-search">
            <input type="text" placeholder="Search..." />
        </div>
        <ul class="products-filter-item-criteria" data-type="checkbox">
            @foreach ($paramate_childs as $item)
            <li>
                <div class="checkbox" data-status="check"></div>
                <p class="text">
                    {{ $item->name }} <span class="quantity">({{$item->count()}})</span>
                </p>
            </li>
            @endforeach
        </ul>
        <div class="clear-button">
            <div class="icon">
                <svg width="12" height="16" viewBox="0 0 12 16" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M1.99219 4.1642C2.03925 4.01857 2.10983 3.89065 2.25689 3.82178C2.4314 3.73912 2.59611 3.75683 2.75101 3.87097C2.78631 3.89656 2.81768 3.93001 2.84905 3.9615C3.8765 4.99271 4.90395 6.02392 5.93336 7.05513C5.95493 7.07677 5.97846 7.09842 6.01572 7.13581C6.03729 7.10629 6.05101 7.07677 6.07258 7.05513C7.10395 6.01605 8.13729 4.97893 9.17062 3.94379C9.35297 3.76077 9.56474 3.72338 9.7667 3.83358C10.0157 3.97134 10.0843 4.30589 9.90983 4.53024C9.88238 4.56566 9.85101 4.59715 9.81964 4.62864C8.79219 5.65985 7.76474 6.69105 6.73729 7.72226C6.71572 7.74391 6.69023 7.76162 6.64317 7.79901C6.68434 7.82656 6.71376 7.84034 6.73532 7.86396C7.76866 8.90107 8.80199 9.93621 9.83533 10.9733C10.0216 11.1603 10.0589 11.3827 9.93925 11.5854C9.8667 11.7093 9.74905 11.7723 9.61768 11.8156C9.56474 11.8156 9.51376 11.8156 9.46081 11.8156C9.3118 11.7802 9.20591 11.6818 9.10199 11.5755C8.09219 10.5601 7.08042 9.54656 6.07062 8.53109C6.04905 8.50945 6.03532 8.47993 6.00591 8.4386C5.96866 8.48386 5.95101 8.50945 5.92944 8.53109C4.91964 9.54656 3.90787 10.5601 2.89807 11.5755C2.79415 11.6798 2.68827 11.7782 2.53925 11.8156C2.48631 11.8156 2.43532 11.8156 2.38238 11.8156C2.34121 11.7999 2.30003 11.7861 2.26082 11.7664C2.1118 11.6975 2.03729 11.5716 1.99219 11.422C1.99219 11.3689 1.99219 11.3177 1.99219 11.2646C2.02944 11.115 2.12552 11.0087 2.2314 10.9044C3.24317 9.89095 4.25297 8.87548 5.26474 7.86199C5.28631 7.84034 5.31572 7.82656 5.35689 7.79705C5.3118 7.75965 5.28631 7.74194 5.26474 7.72029C4.25297 6.7068 3.24317 5.69133 2.2314 4.67784C2.12748 4.57353 2.02944 4.46727 1.99219 4.3177C1.99219 4.2685 1.99219 4.21537 1.99219 4.1642Z"
                        fill="black" />
                </svg>
            </div>
            <p class="text">Clear All</p>
        </div>
    </div>
</div>
@endisset
