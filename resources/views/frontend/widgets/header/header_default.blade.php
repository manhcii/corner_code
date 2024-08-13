@php
    $component_setting = $widget->header->json_params->component ?? [];
    // Filter selected
    $components_selected = $components->filter(function ($item) use ($component_setting) {
        return in_array($item->id, $component_setting);
    });
    // Reorder selected
    $components_selected = $components_selected->sortBy(function ($item) use ($component_setting) {
        return array_search($item->id, $component_setting);
    });
@endphp


<header>
    <div class="topbar text-center">
      <p>Shop at Design Crafter's Corner? Visit your retail website</p>
    </div>
    <div class="container">
      <div class="header-main d-flex justify-content-between">

            @if (isset($components_selected))
                @foreach ($components_selected as $component)
                    @if (
                        \View::exists(
                            'frontend.components.' . $widget->header->json_params->layout . '.' . $component->component_code . '.index'))
                        @include(
                            'frontend.components.' .
                                $widget->header->json_params->layout .
                                '.' .
                                $component->component_code .
                                '.index ')
                    @else
                        {{ 'View: frontend.components.' . $widget->header->json_params->layout . '.' . $component->component_code . '.index do not exists!' }}
                    @endif
                @endforeach
            @endif
        </div>
    </div>
</header>
