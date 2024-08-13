@if ($block)
    @php
        $title = $block->json_params->title->{$locale} ?? $block->title;
        $brief = $block->json_params->brief->{$locale} ?? $block->brief;
        $content = $block->json_params->content->{$locale} ?? $block->content;
        $image = $block->image != '' ? $block->image : null;
        $image_background = $block->image_background != '' ? $block->image_background : null;
        $url_link = $block->url_link ?? null;
        $url_link_title = $block->json_params->url_link_title->{$locale} ?? $block->url_link_title;
        // Filter all blocks by parent_id
        $block_childs = $blocks->filter(function ($item, $key) use ($block) {
            return $item->parent_id == $block->id && $item->json_params->style != 'decor';
        });
        $block_childs_decor = $blocks->filter(function ($item, $key) use ($block) {
            return $item->parent_id == $block->id && $item->json_params->style == 'decor';
        });
    @endphp

<section id="fhm-slider">
    <div class="swiper slider-swiper">
      <div class="swiper-wrapper">
        @if ($block_childs)
                    @foreach ($block_childs as $item)
                        @php
                            $title_childs = $item->json_params->title->{$locale} ?? $item->title;
                            $brief_childs = $item->json_params->brief->{$locale} ?? $item->brief;
                            $content_childs = $item->json_params->content->{$locale} ?? $item->content;
                            $image = $item->image != '' ? $item->image : null;
                            $image_background = $item->image_background != '' ? $item->image_background : null;
                            $url_link_childs = $item->url_link != '' ? $item->url_link : '';
                            $url_link_childs_title = $item->json_params->url_link_title->{$locale} ?? $item->url_link_title;
                            $icon_childs = $item->icon ?? '';
                            $gallery_image_childs = $item->json_params->gallery_image ?? '';
                        @endphp
        <div class="swiper-slide">
          <div class="slider-item">
            <img src="{{ $image }}" alt="The Home of Cozy" title="The Home of Cozy"/>
            <div class="slider-content position-absolute text-center">
              <div class="position-relative">
                <h1>{{ $title_childs }}</h1>
                <div class="decor-title position-absolute">
                  <svg
                    width="52"
                    height="51"
                    viewBox="0 0 52 51"
                    fill="none"
                    xmlns="http://www.w3.org/2000/svg"
                  >
                    <path
                      fill-rule="evenodd"
                      clip-rule="evenodd"
                      d="M39.687 17.176C23.5046 26.986 20.7788 28.1521 14.4092 22.3932C15.9886 27.8964 15.267 31.8987 12.3232 35.9923C19.6092 33.7716 20.9384 35.8004 24.6368 38.3395C22.3603 31.1523 25.5529 28.7876 39.687 17.176Z"
                      stroke="#FFB23F"
                      stroke-width="3"
                      stroke-miterlimit="1.5"
                      stroke-linecap="round"
                      stroke-linejoin="round"
                    />
                    <path
                      d="M33.6123 31.7903C33.8434 32.5452 33.9351 33.3468 34.0837 34.1209"
                      stroke="#FFB23F"
                      stroke-width="3"
                      stroke-miterlimit="1.5"
                      stroke-linecap="round"
                      stroke-linejoin="round"
                    />
                    <path
                      d="M30.5693 36.6563C31.1689 36.5644 31.7745 36.3939 32.3673 36.2556"
                      stroke="#FFB23F"
                      stroke-width="3"
                      stroke-miterlimit="1.5"
                      stroke-linecap="round"
                      stroke-linejoin="round"
                    />
                    <path
                      d="M34.8106 37.6726C34.8086 38.4141 34.9414 39.3726 35.1746 40.0877"
                      stroke="#FFB23F"
                      stroke-width="3"
                      stroke-miterlimit="1.5"
                      stroke-linecap="round"
                      stroke-linejoin="round"
                    />
                    <path
                      d="M36.7236 35.5361C37.5232 35.6009 38.3655 35.2784 39.1645 35.1787"
                      stroke="#FFB23F"
                      stroke-width="3"
                      stroke-miterlimit="1.5"
                      stroke-linecap="round"
                      stroke-linejoin="round"
                    />
                    <path
                      d="M19.0898 10.7007C19.1763 11.5475 19.3199 12.3838 19.488 13.2169"
                      stroke="#FFB23F"
                      stroke-width="3"
                      stroke-miterlimit="1.5"
                      stroke-linecap="round"
                      stroke-linejoin="round"
                    />
                    <path
                      d="M15.7627 15.4508C16.3964 15.3941 17.0033 15.3154 17.6274 15.2017"
                      stroke="#FFB23F"
                      stroke-width="3"
                      stroke-miterlimit="1.5"
                      stroke-linecap="round"
                      stroke-linejoin="round"
                    />
                    <path
                      d="M20.1582 16.729C20.1714 17.5212 20.3292 18.3631 20.4899 19.1421"
                      stroke="#FFB23F"
                      stroke-width="3"
                      stroke-miterlimit="1.5"
                      stroke-linecap="round"
                      stroke-linejoin="round"
                    />
                    <path
                      d="M22.1602 14.5608C22.8816 14.3809 23.549 14.1379 24.2952 14.0525"
                      stroke="#FFB23F"
                      stroke-width="3"
                      stroke-miterlimit="1.5"
                      stroke-linecap="round"
                      stroke-linejoin="round"
                    />
                  </svg>
                </div>
              </div>
              <p>
                {{$brief_childs}}
              </p>
              <div class="button button-slide"><a href="{{  $url_link_childs  }}" title="Shop Now">{{ $url_link_childs_title  }}</a></div>
            </div>
          </div>
        </div>
        @endforeach
        @endif
      </div>
    </div>
  </section>

@endif
