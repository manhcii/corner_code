@if ($block)
    @php
        $title = $block->json_params->title->{$locale} ?? $block->title;
        $brief = $block->json_params->brief->{$locale} ?? $block->brief;
        $content = $block->json_params->content->{$locale} ?? $block->content;
        $background = $block->image_background != '' ? $block->image_background : url('assets/img/banner.jpg');
        $url_link = $block->url_link != '' ? $block->url_link : '';
        $url_link_title = $block->json_params->url_link_title->{$locale} ?? $block->url_link_title;

        $params['status'] = App\Consts::STATUS['active'];
        $params['is_featured'] = true;
        $params['is_type'] = App\Consts::TAXONOMY['post'];
        $rows = App\Models\CmsPost::getsqlCmsPost($params)
            ->limit(4)
            ->get();

    @endphp


<section id="fhm-home-blog" class="home-blog">
    <div class="container position-relative">
      <div class="home-blog-content">
        <span class="sub-title">{{ $title }}</span>
        <h3>{{ $brief }}</h3>
      </div>

      <div class="swiper home-blog-swiper">
        <div class="swiper-wrapper">
            @foreach ($rows as $item)
            @php
                $title_child = $item->json_params->name->{$locale} ?? $item->name;
                $brief_child = $item->json_params->brief->{$locale} ?? $item->brief;
                $content_child = $item->json_params->content->{$locale} ?? $item->content;
                $image_child = $item->image_thumb != '' ? $item->image_thumb : ($item->image != '' ? $item->image : 'data/images/no_image.jpg');
                $time = date('d.M.Y', strtotime($item->updated_at));
                $alias = $item->alias ?? '';

            @endphp

          <div class="swiper-slide">
            <div class="blog-item">
              <div class="blog-item-image">
                <img src="{{ $image_child }}" alt="Sushi protection in against good" title="Sushi protection in against good">
              </div>
              <div class="blog-item-info">
                <a href="{{ $alias }}" title="Sushi protection in against good  ">
                  {{ $title_child }}
                </a>
                <p class="blog-item-des">
                    {{ $brief }}
                </p>
              </div>
            </div>
          </div>
          @endforeach
        </div>
      </div>

      <div class="swiper-button-prev swiper-circle">
        <svg width="15" height="24" viewBox="0 0 15 24" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path d="M14 1L2 13L14 22.6" stroke="#727272" stroke-width="2"/>
        </svg>
      </div>
      <div class="swiper-button-next swiper-circle">
        <svg width="15" height="24" viewBox="0 0 15 24" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path d="M1 22.6008L13 10.6008L1 1.00083" stroke="#727272" stroke-width="2"/>
        </svg>
      </div>
    </div>
  </section>
@endif
