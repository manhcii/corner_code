@if ($block)
    @php
        $title = $block->json_params->title->{$locale} ?? $block->title;
        $brief = $block->json_params->brief->{$locale} ?? $block->brief;
        $content = $block->json_params->content->{$locale} ?? $block->content;
        $image = $block->image != '' ? $block->image : null;
        $image_background = $block->image_background != '' ? $block->image_background : null;
        $url_link = $block->url_link ?? '';
        $url_link_title = $block->json_params->url_link_title->{$locale} ?? $block->url_link_title;
        $block_childs = $blocks->filter(function ($item, $key) use ($block) {
            return $item->parent_id == $block->id;
        });
    @endphp


<section id="fhm-breadcrumb" class="breadcrumb">
    <div class="container">
      <div class="breadcrumb-list">
        <a href="#" title="Home" class="breadcrumb-link">Home</a>
        <div class="breadcrumb-arrow">
          <svg
            width="6"
            height="14"
            viewBox="0 0 6 14"
            fill="none"
            xmlns="http://www.w3.org/2000/svg"
          >
            <path
              d="M2.12 13.512C2.06667 13.6827 1.98133 13.8053 1.864 13.88C1.74667 13.9547 1.61867 13.992 1.48 13.992C1.34133 13.992 1.21333 13.9547 1.096 13.88C0.989333 13.816 0.914667 13.72 0.872 13.592C0.818667 13.464 0.818667 13.3093 0.872 13.128L4.632 1.48C4.68533 1.30933 4.77067 1.18667 4.888 1.112C5.00533 1.02667 5.128 0.989333 5.256 0.999999C5.39467 0.999999 5.51733 1.03733 5.624 1.112C5.74133 1.176 5.82133 1.272 5.864 1.4C5.91733 1.51733 5.92267 1.66667 5.88 1.848L2.12 13.512Z"
              fill="#979797"
            />
          </svg>
        </div>
        <a href="/article" title="Article" class="breadcrumb-link">Blogs</a>
      </div>
    </div>
  </section>

@endif
