@if ($block)
    @php
        $title = $block->json_params->title->{$locale} ?? $block->title;
        $brief = $block->json_params->brief->{$locale} ?? $block->brief;
        $content = $block->json_params->content->{$locale} ?? $block->content;
        $image = $block->image != '' ? $block->image : '';
        $image_background = $block->image_background != '' ? $block->image_background : '';
        $url_link = $block->url_link != '' ? $block->url_link : '';
        $url_link_title = $block->json_params->url_link_title->{$locale} ?? $block->url_link_title;
        $gallery_image = $block->json_params->gallery_image ?? [];
        // Filter all blocks by parent_id
        $block_childs = $blocks->filter(function ($item, $key) use ($block) {
            return $item->parent_id == $block->id;
        });
    @endphp
{{-- <section id="fhm-booking-table" class="booking-table" style="background: url('{{ $image_background }}') no-repeat;background-size: cover">
    <div class="container">
      <div class="booking-table-content text-center">
        <span class="sub-title">{{ $title }} </span>
        <h3>{{ $brief }}</h3>
      </div>
      <div class="booking-table-form"  >
        <form class="form_ajax" action="{{route('frontend.contact.store')}}" id="bookingHome" method="POST">
            @csrf
            <input type="hidden" name="is_type" value="call_request" id="">
          <select name="json_params[persons]" id="bookingPersonHome" title="persons">
            <option value="PERSIONS" selected disabled class="d-none">PERSONS</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
            <option value="6">6</option>
          </select>
          <input type="date" name="json_params[date]" id="bookingDateHome">
          <input type="time" name="json_params[time]" id="bookingTimeHome">
          <button type="submit" title="{{ $url_link_title }}">{{ $url_link_title }}</button>
        </form>
      </div>

    </div>
  </section> --}}
  <section id="fhm-categories">
    <div class="categories-list">
      @foreach( $gallery_image as $item)
      <div class="category-item">
        <img src="{{ $item }}" alt="FHM" title="FHM" />
      </div>
      @endforeach
    </div>
  </section>

@endif
