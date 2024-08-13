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
    {{-- <section id="fhm-our-service" class="our-service" style="background: url('{{ $image_background }}')">
        <div class="container">
            <div class="our-service-content text-center">
                <span class="sub-title">{{ $title }}</span>
                <h3>{{ $brief }}</h3>
            </div>
            <div class="our-service-wrap">
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
                <div class="our-service-item">
                    <img src="{{ $image }}" alt="{{ $title_childs }}" title="{{ $title_childs }}">
                    <h4>{{ $title_childs }}</h4>
                    <p>
                        {{ $content_childs }}
                    </p>
                </div>
                @endforeach
                @endif
            </div>
        </div>
    </section> --}}
    <section id="fhm-popular-collections">
        <div class="container">
          <div class="popular-collections-content text-center">
            <p class="sub-title">{{ $brief }}</p>
            <h2 class="title">{{ $title }}</h2>
          </div>
          <div class="popular-collections-list">
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
            <div class="popular-collections-item">
              <img
                src="{{ $image }}"
                alt="Living Room Collection"
                title="Living Room Collection"
              />
              <div class="popular-collections-item-content position-absolute">
                <h5>{{ $title_childs }}</h5>
                <div class="button button-viewmore">
                  <a href="{{$url_link_childs  }}" title="Show Now">{{$url_link_childs_title  }}</a>
                </div>
              </div>
            </div>
            @endforeach
            @endif
          </div>
        </div>
      </section>
@endif
