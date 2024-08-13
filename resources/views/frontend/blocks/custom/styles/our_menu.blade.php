@if ($block)
    @php
        $title = $block->json_params->title->{$locale} ?? $block->title;
        $brief = $block->json_params->brief->{$locale} ?? $block->brief;
        $content = $block->json_params->content->{$locale} ?? $block->content;
        $image = $block->image != '' ? $block->image : null;
        $image_background = $block->image_background != '' ? $block->image_background : null;
        $url_link = $block->url_link != '' ? $block->url_link : '';
        $url_link_title = $block->json_params->url_link_title->{$locale} ?? $block->url_link_title;
        // Filter all blocks by parent_id
        $block_childs = $blocks->filter(function ($item, $key) use ($block) {
            return $item->parent_id == $block->id;
        });
        $taxonomyProject =  App\Models\CmsTaxonomy::where('taxonomy', 'product')
                                      ->where('parent_id',null)
                                      ->where('status','active')
                                      ->first();
         $listProject = App\Models\CmsTaxonomy::where('taxonomy', 'product')
                                      ->where('parent_id',$taxonomyProject->id)
                                      ->where('status','active')->latest()
                                      ->get();
    @endphp
    <section id="fhm-ideas">
        <div class="container">
            <h2 class="title text-center">room ideas</h2>
            <div class="ideas-tab d-flex" id="ideas-tab" role="tablist">
                @foreach($listProject as $key => $item)
                <li class="ideas-item {{ $key === 0 ? ' active' : '' }}" id="ideas-item-1-tab" data-bs-toggle="pill" data-bs-target="#ideas-item-{{ $item->id }}"
                    type="button" role="tab" aria-controls="ideas-item-{{ $item->id }}" aria-selected="true">
                    {{ $item->name }}
                </li>
                @endforeach
            </div>
        </div>
        <div class="ideas-content tab-content" id="ideas-tabContent">
            @foreach($listProject as $key => $item)
            @php
            $data_relationship['id'] = $item->id;
            $list_posts = App\Models\CmsRelationship::getCmsProduct($data_relationship)->paginate(App\Consts::PAGINATE['product']);
            @endphp
            <div class="ideas-item-content tab-pane fade show {{ $key === 0 ? ' active' : '' }}" id="ideas-item-{{ $item->id }}" role="tabpanel"
                aria-labelledby="ideas-item-1-tab" tabindex="0">
                <div class="swiper ideas-tab1-swiper">
                    <div class="swiper-wrapper">
                        @foreach($list_posts as $item)
                        <div class="swiper-slide">
                            <img src="{{ $item->image }}" alt="{{ $item->name }}"
                                title="{{ $item->name }}" />
                        </div>
                        @endforeach
                    </div>

                    <div class="swiper-button-prev">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M12 20L13.41 18.59L7.83002 13L20 13L20 11L7.83002 11L13.41 5.41L12 4L4.00002 12L12 20Z"
                                fill="#769496" />
                        </svg>
                    </div>
                    <div class="swiper-button-next">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path d="M12 4L10.59 5.41L16.17 11H4V13H16.17L10.59 18.59L12 20L20 12L12 4Z"
                                fill="#769496" />
                        </svg>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </section>
@endif
