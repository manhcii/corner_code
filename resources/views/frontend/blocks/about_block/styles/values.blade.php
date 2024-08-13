@if ($block)
    @php
        $title = $block->json_params->title->{$locale} ?? $block->title;
        $brief = $block->json_params->brief->{$locale} ?? $block->brief;
        $content = $block->json_params->content->{$locale} ?? $block->content;
        $image = $block->image != '' ? $block->image : '';
        $image_background = $block->image_background != '' ? $block->image_background : '';
        $url_link = $block->url_link != '' ? $block->url_link : '';
        $url_link_title = $block->json_params->url_link_title->{$locale} ?? $block->url_link_title;
        $icon = $block->icon ?? '';
        $gallery_image = $block->json_params->gallery_image ?? [];
        // Filter all blocks by parent_id
        $block_childs = $blocks->filter(function ($item, $key) use ($block) {
            return $item->parent_id == $block->id;
        });

    @endphp
<section id="fhm-space-restaurant" class="space-restaurant">
    <div class="container">
        <div class="space-restaurant-content text-center">
            <span class="sub-title">{{ $title }}</span>
            <h3>{{$brief}} </h3>
            <p>
                {{ $content }}
            </p>
        </div>
    </div>
    <div class="space-restaurant-main">
        <div class="swiper space-restaurant-swiper">
            <div class="swiper-wrapper">
                @if ($block_childs)
                @foreach ($block_childs as $item)
                    @php
                        $title_childs = $item->json_params->title->{$locale} ?? $item->title;
                        $brief_childs = $item->json_params->brief->{$locale} ?? $item->brief;
                        $content_childs = $item->json_params->content->{$locale} ?? $item->content;
                        $image_childs = $item->image != '' ? $item->image : null;
                        $image_background_childs = $item->image_background != '' ? $item->image_background : null;
                        $url_link_childs = $item->url_link != '' ? $item->url_link : '';
                        $url_link_childs_title = $item->json_params->url_link_title->{$locale} ?? $item->url_link_title;
                        $icon_childs = $item->icon ?? '';
                        $gallery_image_childs = $item->json_params->gallery_image ?? '';
                    @endphp
              <div class="swiper-slide">
                  <img src="{{ $image_childs }}" alt="FlavorFulFusion" title="FlavorFulFusion">
              </div>
              @endforeach
              @endif
            </div>
          </div>

          <div class="swiper-button-prev swiper-circle">
              <svg width="15" height="24" viewBox="0 0 15 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M14 1L2 13L14 22.6" stroke="#CF3031" stroke-width="2"/>
              </svg>
          </div>
          <div class="swiper-button-next swiper-circle">
              <svg width="15" height="24" viewBox="0 0 15 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M1 22.6L13 10.6L1 0.999977" stroke="#CF3031" stroke-width="2"/>
              </svg>
          </div>
    </div>

</section>

    {{-- <section id="fhm-about-values">
        @if (count($gallery_image) > 0)
            @foreach ($gallery_image as $val_img)
                <div class="decor-element">
                    <img src="{{ $val_img }}" alt="Pizza" title="Pizza" />
                </div>
            @endforeach
        @endif
        <div class="container">
            <div class="heading-block-m">
                <span class="badge"> {{ $title }} </span>
                <h2 class="title">{{ $brief }}</h2>
            </div>
            <div class="values-slider">
                <div class="swiper">
                    <div class="swiper-wrapper">
                        @if ($block_childs)
                            @foreach ($block_childs as $item)
                                @php
                                    $title_childs = $item->json_params->title->{$locale} ?? $item->title;
                                    $brief_childs = $item->json_params->brief->{$locale} ?? $item->brief;
                                    $content_childs = $item->json_params->content->{$locale} ?? $item->content;
                                    $image_childs = $item->image != '' ? $item->image : null;
                                    $image_background_childs = $item->image_background != '' ? $item->image_background : null;
                                    $url_link_childs = $item->url_link != '' ? $item->url_link : '';
                                    $url_link_childs_title = $item->json_params->url_link_title->{$locale} ?? $item->url_link_title;
                                    $icon_childs = $item->icon ?? '';
                                    $gallery_image_childs = $item->json_params->gallery_image ?? '';
                                @endphp
                                <div class="swiper-slide">
                                    <div class="values-item">
                                        <div class="values-icon">
                                            <img src="{{ $image_childs }}" alt="{{ $title_childs }}"
                                                title="{{ $title_childs }}" />
                                        </div>
                                        <div class="values-content">
                                            <span class="number">
                                                {{ $loop->index < 9 ? '0' . ($loop->index + 1) : $loop->index }} </span>
                                            <h3 class="title">{{ $title_childs }}</h3>
                                            <p class="desc">
                                                {{ $brief_childs }}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
                <div class="slider-button-next slider-button-next-m">
                    <svg width="12" height="17" viewBox="0 0 12 17" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path d="M1.69231 1.23077L10 9.53847L1.69231 16.1846" stroke="#CF3031" stroke-width="2" />
                    </svg>
                </div>
                <div class="slider-button-prev slider-button-prev-m">
                    <svg width="12" height="17" viewBox="0 0 12 17" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path d="M10.3077 1.23077L2 9.53847L10.3077 16.1846" stroke="#CF3031" stroke-width="2" />
                    </svg>
                </div>
            </div>
        </div>
    </section> --}}
@endif
