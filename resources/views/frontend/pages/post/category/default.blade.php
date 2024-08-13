{{-- Check và gọi template tương ứng --}}
@extends('frontend.layouts.default')

@section('content')
    @php
        $seo_title = $seo_title ?? ($page->json_params->seo_title->$locale ?? ($setting->{$locale . '-seo_title'} ?? ($setting->seo_title ?? '')));
        $seo_keyword = $seo_keyword ?? ($page->json_params->seo_keyword->$locale ?? ($setting->{$locale . '-seo_keyword'} ?? ($setting->seo_keyword ?? '')));
        $seo_description = $seo_description ?? ($page->json_params->seo_description->$locale ?? ($setting->{$locale . '-seo_description'} ?? ($setting->seo_description ?? '')));
        $seo_image = $seo_image ?? ($page->json_params->image ?? (json_decode($setting->image)->seo_og_image ?? ''));
        $background_breadcrumbs = json_decode($setting->image)->background_breadcrumbs ?? '';

        $category_title = $page->json_params->name->{$locale} ?? $page->name;
        $category_brief = $page->json_params->brief->{$locale} ?? $page->brief;
        $category_description = $page->json_params->description->{$locale} ?? $page->description;
        $category_content = $page->json_params->content->{$locale} ?? $page->content;
        $category_image = $page->json_params->image != '' ? $page->json_params->image : $setting->background_breadcrumbs;
        $category_backgroud = $page->json_params->image_thumb != '' ? $page->json_params->image_thumb : $setting->background_breadcrumbs;
        $block_hot = $rows->take(3);
        $block_pich = $rows->random();
    @endphp
    <section id="fhm-breadcrumb" class="breadcrumb">
        <div class="container">
            <div class="breadcrumb-list">
                <a href="{{ route('home.default') }}" title="Home" class="breadcrumb-link">@lang('Home')</a>
                <div class="breadcrumb-arrow">
                    <img src="{{ asset('./themes/frontend/assets/image/icons/breadcrumb-arrow.svg') }}" alt="Home" title="Home" />
                </div>
                <a href="blog-list.html" title="{{ $page->json_params->name->{$locale} ?? $page->name }}" class="breadcrumb-link">{{ $page->json_params->name->{$locale} ?? $page->name }}</a>
            </div>
        </div>
    </section>
    {{-- <main class="page-blog-list">
        <section id="fhm-tabs-blogs" class="tabs-blogs">
            <div class="container">
                <div class="tabs-blogs-head text-center">
                    <span class="sub-title">{{ $page->json_params->name->{$locale} ?? $page->name }}</span>
                    <h1>{{ $page->json_params->description->{$locale}?? $page->description }}</h1>
                </div>
                <ul class="tabs-blogs-list" id="tabsBlogsList" role="tablist">
                    @foreach ($taxonomys as $val_taxonomy)
                    @if($loop->index < 1)
                    <li role="presentation">
                        <button class="tab-blogs-button active" data-bs-toggle="tab" data-bs-target="#tab-item-all"
                            type="button" role="tab" aria-controls="tab-item-all" aria-selected="true">All</button>
                    </li>
                    @else
                    <li role="presentation">
                        <button class="tab-blogs-button" data-bs-toggle="tab" data-bs-target="#tab-item-{{ $val_taxonomy->id }}"
                            type="button" role="tab" aria-controls="tab-item-{{ $val_taxonomy->id }}"
                            aria-selected="false">{{ $val_taxonomy->name }}</button>
                    </li>
                    @endif
                    @endforeach
                </ul>
                <div class="tab-content tabs-blogs-content" id="tabsBlogsContent">
                    @foreach ($taxonomys as $val_taxonomy)
                    @if($loop->index <1)
                    <div class="tab-pane fade show active"  id="tab-item-all" role="tabpanel" aria-labelledby="tab-item-all"data-perpage="{{ $rows->withQueryString()->perPage() }}"
                        data-currentpage="{{ $rows->withQueryString()->currentPage() }}"
                        data-taxonomy="{{ $val_taxonomy->id }}" data-lastpage="{{ $rows->withQueryString()->lastPage() }}">
                        <div class="tab-blogs-grid">
                            @foreach ($rows as $item_post)
                            <div class="blog-item">
                                <div class="blog-item-image">
                                    <img src="{{ $item_post->image ?? '' }}"
                                    alt="{{ $item_post->json_params->name->{$locale} ?? $item_post->name }}"
                                    title="{{ $item_post->json_params->name->{$locale} ?? $item_post->name }}" />
                                </div>
                                <div class="blog-item-info">
                                    <p class="blog-item-date">{{ date('M d, Y', strtotime($item_post->created_at)) }}</p>
                                    <a href="{{ route('frontend.page', ['taxonomy' => $item_post->alias ?? '']) }}" title="{{ $item_post->json_params->name->{$locale} ?? $item_post->name }}">
                                        {{ $item_post->json_params->name->{$locale} ?? $item_post->name }}
                                    </a>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        @if ($rows->withQueryString()->currentPage() < $rows->withQueryString()->lastPage())

                        <button class="button load-more"  onclick="loadMore('.tab-pane','.tab-blogs-grid','post')" title="Load more">Load more</button>
                    @endif

                    </div>
                    @else
                    @php
                        $data_relationship['id'] = $val_taxonomy->id;
                        $list_posts = App\Models\CmsRelationship::getCmsProduct($data_relationship)->paginate(App\Consts::PAGINATE['post']);
                    @endphp

                    <div class="tab-pane fade show"  id="tab-item-{{ $val_taxonomy->id }}" role="tabpanel" aria-labelledby="tab-item-{{ $val_taxonomy->id }}" data-perpage="{{ $list_posts->withQueryString()->perPage() }}"
                        data-currentpage="{{ $list_posts->withQueryString()->currentPage() }}"
                        data-taxonomy="{{ $val_taxonomy->id }}"
                        data-lastpage="{{ $list_posts->withQueryString()->lastPage() }}">
                        <div class="tab-blogs-grid">
                            @foreach ($list_posts as $item_post)
                            <div class="blog-item">
                                <div class="blog-item-image">
                                    <img src="{{ $item_post->image ?? '' }}"
                                    alt="{{ $item_post->json_params->name->{$locale} ?? $item_post->name }}"
                                    title="{{ $item_post->json_params->name->{$locale} ?? $item_post->name }}" />
                                </div>
                                <div class="blog-item-info">
                                    <p class="blog-item-date">{{ date('M d, Y', strtotime($item_post->created_at)) }}</p>
                                    <a href="{{ route('frontend.page', ['taxonomy' => $item_post->alias ?? '']) }}" title="{{ $item_post->json_params->name->{$locale} ?? $item_post->name }}">
                                        {{ $item_post->json_params->name->{$locale} ?? $item_post->name }}
                                    </a>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        @if ($list_posts->withQueryString()->currentPage() < $list_posts->withQueryString()->lastPage())

                        <button class="button load-more"  onclick="loadMore('.tab-pane','.tab-blogs-grid','post')" title="Load more">Load more</button>
                    @endif
                    </div>
                    @endif
                @endforeach
                </div>
            </div>
        </section>
    </main>
    <section id="fhm-featured-topics" class="featured-topics">
        <div class="featured-topics-left">
            <div class="container">
                <h3>@lang('Featured Topics')</h3>
                <div class="featured-topics-main">
                    @foreach($block_hot as $item)
                    <div class="featured-item">
                        <img src="{{ $item->image }}" alt="{{ $item->name }}" title="{{ $item->name }}">
                        <div class="featured-item-info">
                            <p class="featured-item-date">{{  date('M d, Y', strtotime($item->created_at)) }}</p>
                            <a href="{{route('frontend.page', ['taxonomy' => $item->alias ?? '']) }}" title="{{ $item->name }}">
                               {{$item->name}}

                            </a>
                            <p class="featured-item-des">
                                {{ $item->json_params->brief->{$locale} ?? $item->brief }}
                            </p>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="featured-topics-right">
            <img src="{{ asset('./themes/frontend/assets/image/page-blog-list-image2.png') }}" alt="Featured Topics" title="Featured Topics">
        </div>
    </section> --}}
    <section id="fhm-blogs-tab">
        <div class="container">
          <div class="row">
            <div class="col-12 col-xl-8 col-lg-8 offset-lg-2">
              <div class="blog-tabs-wrapper">
                <h1 class="title text-center">Our blogs</h1>
                <div class="blog-tabs-main">
                  <ul class="blogs-tab d-flex" id="blogs-tab" role="tablist">
                    @foreach ($taxonomys as $val_taxonomy)
                    @if($loop->index < 1)
                    <li class="blogs-tab-item" role="presentation">
                      <div class="blogs-tab-button active" id="tab-all-tab" data-bs-toggle="tab" data-bs-target="#tab-all"
                        type="button" role="tab" aria-controls="tab-all" aria-selected="true">
                        All Posts
                      </div>
                    </li>
                    @else
                    <li class="blogs-tab-item" role="presentation">
                      <div class="blogs-tab-button" id="tab-tips-tab" data-bs-toggle="tab" data-bs-target="#tab-{{ $val_taxonomy->id }}"
                        type="button" role="tab" aria-controls="tab-{{ $val_taxonomy->id }}" aria-selected="false">
                        {{ $val_taxonomy->name }}
                      </div>
                    </li>
                    @endif
                    @endforeach
                  </ul>

                  <div class="tab-content blog-tabs-content" id="blogs-tabContent">
                    @foreach ($taxonomys as $val_taxonomy)
                    @if($loop->index <1)
                    <div class="tab-pane  fade show active" id="tab-all" role="tabpanel" aria-labelledby="tab-all"
                      tabindex="0" data-perpage="{{ $rows->withQueryString()->perPage() }}"
                      data-currentpage="{{ $rows->withQueryString()->currentPage() }}"
                      data-taxonomy="{{ $val_taxonomy->id }}" data-lastpage="{{ $rows->withQueryString()->lastPage() }}">
                      <div class="list-blog">
                        @foreach ($rows as $item_post)
                        <div class="blog-item">
                          <div class="blog-item-image">
                            <a href="{{ route('frontend.page', ['taxonomy' => $item_post->alias ?? '']) }}" title="{{ $item_post->name }}">
                              <img src="{{ $item_post->image }}" alt="{{$item_post ->name }}"
                                title="{{ $item_post->name }}" />
                            </a>
                          </div>
                          <div class="blog-item-info">
                            <p class="blogs-category">Art</p>
                            <h3>
                              <a href="{{ route('frontend.page', ['taxonomy' => $item_post->alias ?? '']) }}" title=" B">{{ $item_post->name }}</a>
                            </h3>
                          </div>
                        </div>
                        @endforeach

                      </div>
                      @if ($rows->withQueryString()->currentPage() < $rows->withQueryString()->lastPage())
                      <div class="d-block text-center">
                        <button class="button2 load-more " onclick="loadMore('.tab-pane','.list-blog','post')" title="See more">
                          See more
                        </button>
                      </div>
                      @endif
                    </div>
                    @else
                    @php
                    $data_relationship['id'] = $val_taxonomy->id;
                    $list_posts = App\Models\CmsRelationship::getCmsProduct($data_relationship)->paginate(App\Consts::PAGINATE['post']);
                    @endphp
                    <div class="tab-pane fade" id="tab-{{ $val_taxonomy->id }}" role="tabpanel" aria-labelledby="tab-tips-tab" tabindex="0" data-perpage="{{ $list_posts->withQueryString()->perPage() }}"
                        data-currentpage="{{ $list_posts->withQueryString()->currentPage() }}"
                        data-taxonomy="{{ $val_taxonomy->id }}"
                        data-lastpage="{{ $list_posts->withQueryString()->lastPage() }}">
                      <div class="list-blog">
                        @foreach($list_posts as $item)
                        <div class="blog-item">
                          <div class="blog-item-image">
                            <a href="{{ route('frontend.page', ['taxonomy' => $item->alias ?? '']) }}" title="{{ $item->name }}">
                              <img src="{{ $item->image }}" alt="{{ $item->name }}"
                                title="{{ $item->name }}" />
                            </a>
                          </div>
                          <div class="blog-item-info">
                            <p class="blogs-category">Tips</p>
                            <h3>
                              <a href="{{ route('frontend.page', ['taxonomy' => $item->alias ?? '']) }}" title=" B">{{ $item->name }}</a>
                            </h3>
                          </div>
                        </div>
                        @endforeach
                      </div>
                      <div class="d-block text-center">
                        @if ($list_posts->withQueryString()->currentPage() < $list_posts->withQueryString()->lastPage())
                        <button class="button2 load-more" onclick="loadMore('.tab-pane','.list-blog','post')" title="See more">
                          See more
                        </button>
                        @endif
                      </div>
                    </div>
                    @endif
                    @endforeach
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
@endsection

@push('script')
<script src="{{ asset('themes/frontend/corner/js/masonry.js') }}"></script>

<script src="{{ asset('themes/frontend/corner/js/blogs.js') }}"></script>
@endpush
