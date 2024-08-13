<?php if($component): ?>
    <?php
        $title = $component->json_params->title->{$locale} ?? $component->title;
        $brief = $component->json_params->brief->{$locale} ?? $component->brief;
        $image = $component->image != '' ? $component->image : null;
        // Filter all blocks by parent_id
        $component_childs = $all_components->filter(function ($item, $key) use ($component) {
            return $item->parent_id == $component->id;
        });
    ?>
    
    <div class="header-right">
        <div class="header-search position-relative">
          <svg
            width="18"
            height="18"
            viewBox="0 0 18 18"
            fill="none"
            xmlns="http://www.w3.org/2000/svg"
          >
            <path
              d="M0.75 8.6087C0.75 11.8865 1.33726 13.7686 2.47712 14.8677C3.62344 15.9731 5.51266 16.4674 8.6087 16.4674C11.7047 16.4674 13.594 15.9731 14.7403 14.8677C15.8801 13.7686 16.4674 11.8865 16.4674 8.6087C16.4674 5.33093 15.8801 3.44882 14.7403 2.34967C13.594 1.24429 11.7047 0.75 8.6087 0.75C5.51266 0.75 3.62344 1.24429 2.47712 2.34967C1.33726 3.44882 0.75 5.33093 0.75 8.6087Z"
              stroke="#272727"
              stroke-width="1.5"
              stroke-linecap="round"
              stroke-linejoin="round"
            />
            <path
              d="M17.2174 17.2174L15.2609 15.2609"
              stroke="#272727"
              stroke-width="1.5"
              stroke-linecap="round"
              stroke-linejoin="round"
            />
          </svg>

          <div class="search-input position-absolute">
            <p class="title">Tìm kiếm sản phẩm của bạn</p>
            <div class="search-smart">
              <form
                action="/search"
                class="header-search-form input-group search-bar"
              >
                <input
                  type="text"
                  required=""
                  class="input-group-field"
                  placeholder="Nhập tên sản phẩm..."
                  autocomplete="off"
                />

                <button
                  type="submit"
                  class="btn icon-fallback-text enter-search position-absolute"
                  aria-label="Tìm kiếm"
                  title="Tìm kiếm"
                >
                  <svg
                    width="20"
                    height="20"
                    viewBox="0 0 20 20"
                    fill="none"
                    xmlns="http://www.w3.org/2000/svg"
                  >
                    <path
                      d="M14.1404 13.4673L19.852 19.1789C20.3008 19.6276 19.6276 20.3008 19.1789 19.852L13.4673 14.1404C12.0381 15.4114 10.1552 16.1835 8.09176 16.1835C3.6225 16.1835 0 12.5613 0 8.09176C0 3.6225 3.62219 0 8.09176 0C12.561 0 16.1835 3.62219 16.1835 8.09176C16.1835 10.1551 15.4115 12.038 14.1404 13.4673ZM0.951972 8.09176C0.951972 12.0356 4.14824 15.2316 8.09176 15.2316C12.0356 15.2316 15.2316 12.0353 15.2316 8.09176C15.2316 4.14797 12.0353 0.951972 8.09176 0.951972C4.14797 0.951972 0.951972 4.14824 0.951972 8.09176Z"
                      fill="#222222"
                    ></path>
                  </svg>
                </button>
              </form>
            </div>
          </div>
        </div>

        <a href="#" class="header-wishlist" title="Wishlist">
          <svg
            width="20"
            height="17"
            viewBox="0 0 20 17"
            fill="none"
            xmlns="http://www.w3.org/2000/svg"
          >
            <path
              d="M6.33337 0.833328C7.74202 0.833328 9.02699 1.53451 10 2.33333C10.9731 1.53451 12.2581 0.833328 13.6667 0.833328C16.7043 0.833328 19.1667 3.09207 19.1667 5.87821C19.1667 11.4958 12.7729 14.7675 10.6651 15.6934C10.2405 15.88 9.75956 15.88 9.33499 15.6934C7.22719 14.7675 0.833374 11.4957 0.833374 5.87807C0.833374 3.09194 3.29581 0.833328 6.33337 0.833328Z"
              stroke="#272727"
              stroke-width="1.5"
            />
          </svg>
        </a>

        <div class="header-cart position-relative">
          <a href="<?php echo e(route('frontend.page',['taxonomy'=>'gio-hang'])); ?>" class="header-cart-img" title="Cart">
            <svg
              width="17"
              height="17"
              viewBox="0 0 17 17"
              fill="none"
              xmlns="http://www.w3.org/2000/svg"
            >
              <path
                d="M4.95829 4.25C4.95829 8.97222 12.0416 8.97222 12.0416 4.25"
                stroke="#212135"
                stroke-width="1.5"
                stroke-linecap="round"
                stroke-linejoin="round"
              />
              <path
                d="M1.22871 7.86096C1.17822 8.11199 1.12599 8.37171 1.07148 8.64054C0.395092 12.4268 0.843477 14.1501 1.87341 15.0324C2.41335 15.4949 3.20019 15.8104 4.32232 16.0021C5.4433 16.1935 6.82608 16.25 8.49999 16.25C10.1739 16.25 11.5567 16.1935 12.6777 16.0021C13.7998 15.8104 14.5867 15.4949 15.1266 15.0324C16.1565 14.1501 16.6049 12.4268 15.9285 8.64056C15.874 8.37176 15.8218 8.11207 15.7713 7.86106C15.5039 6.53162 15.2855 5.44566 15.0375 4.53872C14.7425 3.4603 14.4277 2.72558 14.0086 2.20256C13.2189 1.21707 11.8626 0.75 8.49999 0.75C5.13743 0.75 3.78114 1.21707 2.99141 2.20256C2.57228 2.72558 2.25746 3.4603 1.96252 4.53872C1.71449 5.44564 1.49608 6.53156 1.22871 7.86096Z"
                stroke="#212135"
                stroke-width="1.5"
                stroke-linecap="round"
                stroke-linejoin="round"
              />
            </svg>
          </a>
          <div class="header-cart-quantity position-absolute"><?php echo e(session('cart') ? count(session('cart')) : 0); ?></div>
        </div>
      </div>
<?php endif; ?>
<?php /**PATH C:\xamppp\htdocs\corner\shushi\resources\views/frontend/components/header_default/header/layout/default.blade.php ENDPATH**/ ?>