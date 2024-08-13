@if ($block)
    @php

        $title = $block->json_params->title->{$locale} ?? $block->title;
        $brief = $block->json_params->brief->{$locale} ?? $block->brief;
        $content = $block->json_params->content->{$locale} ?? $block->content;
        $image = $block->image != '' ? $block->image : '';
        $image_background = $block->image_background != '' ? $block->image_background : '';
        $icon = $block->icon != '' ? $block->icon : '';
        $url_link = $block->url_link != '' ? $block->url_link : '';
        $url_link_title = $block->json_params->url_link_title->{$locale} ?? $block->url_link_title;
        $map = $block->json_params->map ?? '';
        $gallery_image = $block->json_params->gallery_image ?? [];
        // Filter all blocks by parent_id
        $block_childs = $blocks->filter(function ($item, $key) use ($block) {
            return $item->parent_id == $block->id;
        });
        $params['taxonomy'] = App\Consts::TAXONOMY['product'];
        $params['status'] = App\Consts::STATUS['active'];
        // list Category
        $rows = App\Models\ProductCategory::getSqlTaxonomy($params)
            ->limit(9)
            ->get();
    @endphp
    <main class="page-menu">
        <!--Our menu-->
        <section id="fhm-components-menu" class="components-menu">
            <div class="container">
                <div class="components-menu-head text-center">
                    <span class="sub-title">{{ $title }}</span>
                    <h1>{{ $brief }}</h1>
                </div>

                <div class="components-menu-list">
                    @if (isset($rows) && count($rows) > 0)
                    @foreach ($rows as $items)
                    <div class="components-menu-item">
                        <a href="{{route('frontend.page', ['taxonomy' => App\Consts::ROUTE_TAXONOMY['product'], 'alias' => $items->alias ?? ''])}}">
                            <div class="components-menu-image">
                                <img src="{{ $items->json_params->image??'' }}" alt="{{ $items->title }}" title="{{ $items->title }}">
                            </div>
                            <div class="components-menu-name">
                                <p>{{ $items->json_params->name->$locale ?? $items->name }}</p>
                            </div>
                        </a>
                    </div>
                    @endforeach
                    @endif

                </div>

            </div>
        </section>
    </main>
@endif
@push('script')
<script src="https://unpkg.com/masonry-layout@4/dist/masonry.pkgd.min.js"></script>
<script src="{{ asset('themes/frontend/assets/js/menu.js') }}"></script>
@endpush

