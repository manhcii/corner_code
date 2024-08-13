@if ($block)
    @php
        $title = $block->json_params->title->{$locale} ?? $block->title;
        $brief = $block->json_params->brief->{$locale} ?? $block->brief;
        $content = $block->json_params->content->{$locale} ?? $block->content;
        $image = $block->image != '' ? $block->image : '';
        $image_background = $block->image_background != '' ? $block->image_background : '';
        $url_link = $block->url_link != '' ? $block->url_link : '';
        $url_link_title = $block->json_params->url_link_title->{$locale} ?? $block->url_link_title;
        $gallery_image = $block->json_params->gallery_image ?? null;
        // Filter all blocks by parent_id
        $block_childs = $blocks->filter(function ($item, $key) use ($block) {
            return $item->parent_id == $block->id;
        });
    @endphp
  <section id="fhm-testimonial">
    <div class="container">
      <div class="testimonial-content text-center">
        <h3 class="title">{{ $title }}</h3>
        <p class="sub-title">
          {{$brief}}
        </p>
      </div>
    </div>
    <div class="testimonial-review position-relative">
      <div class="container">
        <div class="swiper testimonial-swiper">
          <div class="swiper-wrapper">
            @if ($block_childs)
            @foreach ($block_childs as $item)
                @php
                    $title_childs = $item->json_params->title->{$locale} ?? $item->title;
                    $brief_childs = $item->json_params->brief->{$locale} ?? $item->brief;
                    $content_childs = $item->json_params->content->{$locale} ?? $item->content;
                    $image_childs = $item->image != '' ? $item->image : null;
                    $image_back_childs = $item->image_background != '' ? $item->image_background : null;
                    $gallery_image = $item->json_params->gallery_image ?? null;
                    $url_link_title = $item->json_params->url_link->{$locale} ?? $item->url_link;
                @endphp
            <div class="swiper-slide">
              <div class="testimonial-item">
                <div class="testimonial-des d-flex">
                  <div class="testimonial-des-quote">
                    <svg
                      width="40"
                      height="40"
                      viewBox="0 0 40 40"
                      fill="none"
                      xmlns="http://www.w3.org/2000/svg"
                    >
                      <g opacity="0.75">
                        <path
                          d="M13.483 19.3831H5.66634C5.79967 11.5998 7.33301 10.3165 12.1163 7.48312C12.6663 7.14979 12.8497 6.44979 12.5163 5.88312C12.1997 5.33312 11.483 5.14979 10.933 5.48312C5.29967 8.81646 3.33301 10.8498 3.33301 20.5331V29.5165C3.33301 32.3665 5.64967 34.6665 8.48301 34.6665H13.483C16.4163 34.6665 18.633 32.4498 18.633 29.5165V24.5165C18.633 21.5998 16.4163 19.3831 13.483 19.3831Z"
                          fill="#769496"
                        />
                        <path
                          d="M31.5163 19.3831H23.6996C23.8329 11.5998 25.3663 10.3165 30.1496 7.48312C30.6996 7.14979 30.8829 6.44979 30.5496 5.88312C30.2163 5.33312 29.5163 5.14979 28.9496 5.48312C23.3163 8.81646 21.3496 10.8498 21.3496 20.5498V29.5331C21.3496 32.3831 23.6663 34.6831 26.4996 34.6831H31.4996C34.4329 34.6831 36.6496 32.4665 36.6496 29.5331V24.5331C36.6663 21.5998 34.4496 19.3831 31.5163 19.3831Z"
                          fill="#769496"
                        />
                      </g>
                    </svg>
                  </div>
                  <p>
                    {{$content_childs}}
                  </p>
                </div>
                <div class="testimonial-info d-flex justify-content-between">
                  <img
                    class="info-avatar"
                    src="{{ $image_childs }}"
                    alt="what our satisfied customers say"
                    title="Jenny Huynh"
                  />
                  <div class="info-name">
                    <p>{{ $title_childs }}</p>
                    <span>{{ $brief_childs }} </span>
                  </div>
                  <div class="info-rating">
                    <span>{{ $url_link_title }}</span>
                    <svg
                      width="24"
                      height="24"
                      viewBox="0 0 24 24"
                      fill="none"
                      xmlns="http://www.w3.org/2000/svg"
                    >
                      <path
                        d="M12 2L15.09 8.26L22 9.27L17 14.14L18.18 21.02L12 17.77L5.82 21.02L7 14.14L2 9.27L8.91 8.26L12 2Z"
                        fill="#FFB23F"
                        stroke="#FFB23F"
                        stroke-width="1.5"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                      />
                    </svg>
                  </div>
                </div>
              </div>
            </div>
            @endforeach
            @endif
          </div>
        </div>
      </div>

      <div class="swiper-button-prev">
        <svg
          width="24"
          height="24"
          viewBox="0 0 24 24"
          fill="none"
          xmlns="http://www.w3.org/2000/svg"
        >
          <path
            d="M12 20L13.41 18.59L7.83003 13L20 13L20 11L7.83003 11L13.41 5.41L12 4L4.00003 12L12 20Z"
            fill="white"
          />
        </svg>
      </div>
      <div class="swiper-button-next">
        <svg
          width="24"
          height="24"
          viewBox="0 0 24 24"
          fill="none"
          xmlns="http://www.w3.org/2000/svg"
        >
          <path
            d="M12 4L10.59 5.41L16.17 11H4V13H16.17L10.59 18.59L12 20L20 12L12 4Z"
            fill="white"
          />
        </svg>
      </div>
    </div>
  </section>
@endif
