{{-- Get menu id in component $component->json_params->menu_id --}}
@php
    $params['status'] = App\Consts::STATUS['active'];
    $params['is_featured'] = true;
    $params['is_type'] = App\Consts::TAXONOMY['post'];
    $rows_post = App\Models\CmsPost::getsqlCmsPost($params)
        ->limit(3)
        ->get();
@endphp

  @php
  $menu_childs = $menu->filter(function ($item, $key) use ($component) {
    return $item->parent_id == $component->json_params->menu_id;
  });
@endphp
  <div class="header-nav d-none d-lg-block d-xl-block">
    <nav>
      <ul class="nav-list">
        @foreach ($menu_childs as $val_menu1)
      @php
        $parent_name = $val_menu1->json_params->name->$locale ?? $val_menu1->name ?? '';
        $parent_image = $val_menu1->json_params->image ?? 'themes/frontend/vape/assets/img/no-image.jpg';
        $parent_link = $val_menu1->url_link ?? '#';
        $parent_image_title = $val_menu1->json_params->img_title ?? '#';
        $parent_image_link = $val_menu1->json_params->img_link ?? '#';

        $menu_childs_0 = $menu->filter(function ($item, $key) use ($val_menu1) {
          return $item->parent_id == $val_menu1->id;
        });
        if ($val_menu1->json_params->style == 'image') {
                                                        continue;
                                                    }
      @endphp
       @if (isset($val_menu1->json_params->style) && $val_menu1->json_params->style == 'header-nav-button')
        <li>
          <a href="{{ $parent_link }}" class="{{ $val_menu1->json_params->style == 'menu-image' ? $val_menu1->json_params->style : 'nav-item' }}" title="{{ $parent_name }}">{{ $parent_name }}</a>
          <div class="mega-menu position-absolute">
            <div class="container">
              <div class="mega-menu-main d-flex">
                <div class="mega-menu-list d-flex">
                    @foreach ($menu_childs_0 as $val_menu2)
                    @php
                      $menu_childs_1 = $menu->filter(function ($item, $key) use ($val_menu2) {
                          return $item->parent_id == $val_menu2->id;
                      });
                      $name = $val_menu2->json_params->name->$locale ?? $val_menu2->name ?? '';
                      $link = $val_menu2->url_link ?? '#';
                      $image = $val_menu2->json_params->image ?? 'themes/frontend/vape/assets/img/no-image.jpg';
                      if ($val_menu2->json_params->style == 'image') {
                                                        continue;
                                             }
                    @endphp
                  <div class="mega-menu-col">
                    <a href="{{ $link }}" class="nav-item-parent" title="{{ $name }}">{{ $name }}</a>
                    <ul class="mega-menu-list">
                        @if ($menu_childs_1)
                        @foreach ($menu_childs_1 as $val_menu3)
                          @php
                            $menu_childs2 = $menu->filter(function ($item, $key) use ($val_menu3) {
                                return $item->parent_id == $val_menu3->id;
                            });
                            $name = $val_menu3->json_params->name->$locale ?? $val_menu3->name ?? '';
                            $link = $val_menu3->url_link ?? '#';
                            $image = $val_menu3->json_params->image ?? 'themes/frontend/vape/assets/img/no-image.jpg';
                          @endphp
                      <li>
                        <a href="{{ $link }}" class="nav-item" title="{{ $name }}">
                         {{$name}}
                        </a>
                      </li>
                      @endforeach
                      @endif
                    </ul>
                  </div>
                  @endforeach

                </div>
                @php
                $menu_image = $menu_childs_0->first(function ($item, $key) {
                    return ($item->json_params->style == 'image');
                });
                 @endphp
                <div class="mega-menu-image">
                  <img src="{{$menu_image->json_params->image??''}}" alt="FHM" title="FHM" />
                </div>
              </div>
            </div>
          </div>
        </li>
        @else
        <li>
          <a href="{{ $parent_link }}" class="nav-item" title="{{ $parent_name }}">{{ $parent_name }}</a>
          @if ($val_menu1->sub > 0)
          <ul class="nav-list-lv0 position-absolute">
            @foreach ($menu_childs_0 as $val_menu2)
            @php
              $menu_childs1 = $menu->filter(function ($item, $key) use ($val_menu2) {
                  return $item->parent_id == $val_menu2->id;
              });
            @endphp
            <li><a href="{{ $val_menu2->url_link }}" class="nav-item" title="{{ $val_menu2->json_params->name->$locale ?? $val_menu2->name }} ">{{ $val_menu2->json_params->name->$locale ?? $val_menu2->name }}</a></li>
            @endforeach
          </ul>
          @endif
        </li>
        @endif
        @endforeach
      </ul>
    </nav>
  </div>
