{{-- Get menu id in component $component->json_params->menu_id --}}
@php
    $params['status'] = App\Consts::STATUS['active'];
    $params['is_featured'] = true;
    $params['is_type'] = App\Consts::TAXONOMY['post'];
    $rows_post = App\Models\CmsPost::getsqlCmsPost($params)
        ->limit(3)
        ->get();
@endphp
<div class="show-menu-mobile d-block d-xl-none d-lg-none" type="button" data-bs-toggle="offcanvas"
    data-bs-target="#menumobile" aria-controls="menumobile">
    <svg height="24" viewBox="0 0 16 16" width="24" xmlns="http://www.w3.org/2000/svg">
        <g id="_31" data-name="31">
            <path d="m15.5 4h-15a.5.5 0 0 1 0-1h15a.5.5 0 0 1 0 1z" />
            <path d="m15.5 9h-15a.5.5 0 0 1 0-1h15a.5.5 0 0 1 0 1z" />
            <path d="m15.5 14h-15a.5.5 0 0 1 0-1h15a.5.5 0 0 1 0 1z" />
        </g>
    </svg>
</div>
@php
$menu_childs = $menu->filter(function ($item, $key) use ($component) {
  return $item->parent_id == $component->json_params->menu_id;
});
@endphp
<div class="offcanvas offcanvas-start" tabindex="-1" id="menumobile" aria-labelledby="menumobileLabel">
    <div class="offcanvas-body">
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>

        <nav class="nav-mobile">
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
                <li>
                    <a href="{{ $parent_link }}" class="nav-item" title="{{ $parent_name }}">{{ $parent_name }}</a>
                    @if ($val_menu1->sub > 0)
                    <ul class="nav-list-lv0 collapse" id="collapsesubmenu-{{ $val_menu1->id }}">
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
                        <li>
                            <a href="#" class="nav-item" title="{{ $name }}">{{ $name }}</a>

                            <ul class="nav-list-lv1 collapse" id="collapsesubmenu-lv1-{{ $val_menu2->id }}">
                                @foreach ($menu_childs_1 as $val_menu3)
                                @php
                                  $menu_childs_1 = $menu->filter(function ($item, $key) use ($val_menu3) {
                                      return $item->parent_id == $val_menu3->id;
                                  });
                                  $name = $val_menu3->json_params->name->$locale ?? $val_menu3->name ?? '';
                                  $link = $val_menu3->url_link ?? '#';
                                  $image = $val_menu3->json_params->image ?? 'themes/frontend/vape/assets/img/no-image.jpg';
                                  if ($val_menu3->json_params->style == 'image') {
                                                                    continue;
                                                         }
                                @endphp
                                <li>
                                    <a href="{{ $link }}" class="nav-item" title="{{ $name }}">{{ $name }}</a>
                                </li>
                                @endforeach
                            </ul>
                            <div class="close-sub-nav collapsed" data-bs-toggle="collapse" href="#collapsesubmenu-lv1-{{ $val_menu2->id }}"
                                role="button" aria-expanded="false" aria-controls="collapsesubmenulv1-{{ $val_menu2->id }}">
                                <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg"
                                    xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 512 512"
                                    style="enable-background: new 0 0 512 512" xml:space="preserve">
                                    <g>
                                        <g>
                                            <path
                                                d="M492,236H276V20c0-11.046-8.954-20-20-20c-11.046,0-20,8.954-20,20v216H20c-11.046,0-20,8.954-20,20s8.954,20,20,20h216			v216c0,11.046,8.954,20,20,20s20-8.954,20-20V276h216c11.046,0,20-8.954,20-20C512,244.954,503.046,236,492,236z" />
                                        </g>
                                    </g>
                                    <g></g>
                                    <g></g>
                                    <g></g>
                                    <g></g>
                                    <g></g>
                                    <g></g>
                                    <g></g>
                                    <g></g>
                                    <g></g>
                                    <g></g>
                                    <g></g>
                                    <g></g>
                                    <g></g>
                                    <g></g>
                                    <g></g>
                                </svg>

                                <svg id="svg1591" height="24" viewBox="0 0 6.3499999 6.3500002" width="24"
                                    xmlns="http://www.w3.org/2000/svg" xmlns:svg="http://www.w3.org/2000/svg">
                                    <g id="layer1" transform="translate(0 -290.65)">
                                        <path id="path2047"
                                            d="m.79427278 293.56039a.2646485.2646485 0 0 0 0 .52917h4.76146822a.2646485.2646485 0 0 0 0-.52917z"
                                            font-variant-ligatures="normal" font-variant-position="normal"
                                            font-variant-caps="normal" font-variant-numeric="normal"
                                            font-variant-alternates="normal" font-feature-settings="normal"
                                            text-indent="0" text-align="start" text-decoration-line="none"
                                            text-decoration-style="solid" text-decoration-color="rgb(0,0,0)"
                                            text-transform="none" text-orientation="mixed" white-space="normal"
                                            shape-padding="0" isolation="auto" mix-blend-mode="normal"
                                            solid-color="rgb(0,0,0)" solid-opacity="1" vector-effect="none" />
                                    </g>
                                </svg>
                            </div>
                        </li>
                        @endforeach

                    </ul>
                    <div class="close-sub-nav collapsed" data-bs-toggle="collapse" href="#collapsesubmenu-{{ $val_menu1->id }}"
                        role="button" aria-expanded="false" aria-controls="collapsesubmenu-{{ $val_menu1->id }}">
                        <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg"
                            xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 512 512"
                            style="enable-background: new 0 0 512 512" xml:space="preserve">
                            <g>
                                <g>
                                    <path
                                        d="M492,236H276V20c0-11.046-8.954-20-20-20c-11.046,0-20,8.954-20,20v216H20c-11.046,0-20,8.954-20,20s8.954,20,20,20h216			v216c0,11.046,8.954,20,20,20s20-8.954,20-20V276h216c11.046,0,20-8.954,20-20C512,244.954,503.046,236,492,236z" />
                                </g>
                            </g>
                        </svg>

                        <svg id="svg1591" height="24" viewBox="0 0 6.3499999 6.3500002" width="24"
                            xmlns="http://www.w3.org/2000/svg" xmlns:svg="http://www.w3.org/2000/svg">
                            <g id="layer1" transform="translate(0 -290.65)">
                                <path id="path2047"
                                    d="m.79427278 293.56039a.2646485.2646485 0 0 0 0 .52917h4.76146822a.2646485.2646485 0 0 0 0-.52917z"
                                    font-variant-ligatures="normal" font-variant-position="normal"
                                    font-variant-caps="normal" font-variant-numeric="normal"
                                    font-variant-alternates="normal" font-feature-settings="normal" text-indent="0"
                                    text-align="start" text-decoration-line="none" text-decoration-style="solid"
                                    text-decoration-color="rgb(0,0,0)" text-transform="none" text-orientation="mixed"
                                    white-space="normal" shape-padding="0" isolation="auto" mix-blend-mode="normal"
                                    solid-color="rgb(0,0,0)" solid-opacity="1" vector-effect="none" />
                            </g>
                        </svg>
                    </div>
                    @endif
                </li>
                @endforeach
            </ul>
        </nav>
    </div>
</div>
