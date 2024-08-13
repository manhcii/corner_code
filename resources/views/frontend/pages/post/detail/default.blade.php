@extends('frontend.layouts.default')
@section('content')
    @php
        $seo_title = $seo_title ?? ($detail->json_params->seo_title->$locale ?? ($setting->{$locale . '-seo_title'} ?? ($setting->seo_title ?? '')));
        $seo_keyword = $seo_keyword ?? ($detail->json_params->seo_keyword->$locale ?? ($setting->{$locale . '-seo_keyword'} ?? ($setting->seo_keyword ?? '')));
        $seo_description = $seo_description ?? ($detail->json_params->seo_description->$locale ?? ($setting->{$locale . '-seo_description'} ?? ($setting->seo_description ?? '')));
        $seo_image = $seo_image ?? ($detail->json_params->image ?? (json_decode($setting->image)->seo_og_image ?? ''));
        $title = $detail->json_params->name->{$locale} ?? $detail->name;
        $image = $detail->image ?? '';
        $time = date('M d, Y', strtotime($detail->created_at));
        $content = $detail->json_params->content->{$locale} ?? 'Chưa cập nhật';
        $category = $taxonomys->first(function ($item, $key) use ($relationship) {
            return in_array($item->id, $relationship);
        });
        $link = route('frontend.page', ['taxonomy' => $detail->alias ?? '']);
    @endphp

    <section id="fhm-breadcrumb" class="breadcrumb">
        <div class="container">
            <div class="breadcrumb-list">
                <a href="{{ route('home.default') }}" title="Home" class="breadcrumb-link">@lang('Home')</a>
                <div class="breadcrumb-arrow">
                    <img src="{{ asset('./themes/frontend/assets/image/icons/breadcrumb-arrow.svg') }}" alt="Home"
                        title="Home" />
                </div>
                <a href="blog-list.html" title="Blog" class="breadcrumb-link">{{ $category->name }}</a>
                <div class="breadcrumb-arrow">
                    <img src="{{ asset('./themes/frontend/assets/image/icons/breadcrumb-arrow.svg') }}" alt="Home"
                        title="Home" />
                </div>
                <a href="" title="{{ $detail->name }}" class="breadcrumb-link">{{ $detail->name }}</a>
            </div>
        </div>
    </section>

    <main>
        <div class="container">
            <div class="row">
                <div class="col-12 col-xl-9 col-lg-9 order-1 order-xl-2 order-lg-2 col-left">
                    <div class="article-main">
                        <h1>{{ $title }}</h1>
                        <div class="article-des">
                            {!! $content !!}
                        </div>
                    </div>
                </div>
                <div class="col-12 col-xl-3 col-lg-3 order-2 order-xl-1 order-lg-1 col-right">
                    <ul class="article-tags d-flex">
                        @if (isset($detail->json_params->paramater->tag) && count($detail->json_params->paramater->tag) > 0)
                            @foreach ($detail->json_params->paramater->tag as $item)
                                <li class="aticle-tag-item">
                                    <a href="#">{{ $item }}</a>
                                </li>
                            @endforeach
                        @endif
                    </ul>
                </div>
            </div>
        </div>
    </main>
    <section id="fhm-article-related">
        <div class="aricle-related-wrap position-relative">
            <div class="container">
                <p class="sub-title text-center">Deals of the Day</p>
                <h3 class="title text-center">You May Also Like</h3>

                <div class="swiper article-related-swiper">
                    <div class="swiper-wrapper">
                        @if(isset($feature) && count($feature)>0)
                        @foreach($feature as $item)
                        <div class="swiper-slide">
                            <div class="article-item">
                                <div class="article-image">
                                    <a href="{{ $item->alias }}">
                                        <img src="{{ $item->image }}"
                                            alt="{{ $item->name }}" />
                                    </a>
                                </div>
                                <div class="article-info">
                                    <p class="article-category">Tips</p>
                                    <h4>
                                        <a href="{{ $item->alias }}">{{ $item->name }}</a>
                                    </h4>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        @endif

                    </div>
                </div>
            </div>
            <div class="swiper-button-prev">
                <svg width="25" height="24" viewBox="0 0 25 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M12.5 20L13.91 18.59L8.33 13L20.5 13L20.5 11L8.33 11L13.91 5.41L12.5 4L4.5 12L12.5 20Z"
                        fill="white" />
                </svg>
            </div>
            <div class="swiper-button-next">
                <svg width="25" height="24" viewBox="0 0 25 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M12.5 4L11.09 5.41L16.67 11H4.5V13H16.67L11.09 18.59L12.5 20L20.5 12L12.5 4Z" fill="white" />
                </svg>
            </div>
        </div>
    </section>
@endsection
