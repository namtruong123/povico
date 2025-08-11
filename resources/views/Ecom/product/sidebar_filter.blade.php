{{-- sidebar_filter.blade.php --}}
@php
    $categories = $categories ?? \App\Models\Category::withCount('products')->get();
    $colors = $colors ?? \App\Models\ProductAttribute::where('group_id', 1)->get();
@endphp

<form action="{{ route('products.filter') }}" method="GET" class="canvas-body">
    <div class="widget-facet facet-categories">
        <h6 class="facet-title">DANH MỤC SẢN PHẨM</h6>
        <ul class="facet-content">
            @foreach($categories as $category)
                <li>
                    <a href="#" class="link">
                        <label>
                            <input type="radio" name="category" value="{{ $category->id }}" {{ request('category') == $category->id ? 'checked' : '' }}>
                            {{ $category->name }}
                        </label>
                        <span class="count-cate">({{ $category->products_count }})</span>
                    </a>
                </li>
            @endforeach
        </ul>
    </div>
    <div class="widget-facet facet-color">
        <h6 class="facet-title">MÀU SẮC</h6>
        <div class="facet-color-box" style="display: flex; gap: 8px; flex-wrap: wrap;">
            @foreach($colors as $color)
                <label style="cursor:pointer; display: flex; align-items: center;">
                    <input type="checkbox" name="color[]" value="{{ $color->id }}" {{ collect(request('color'))->contains($color->id) ? 'checked' : '' }} style="display:none;">
                    <span class="color" style="background: {{ $color->color }};"></span>
                    <span class="color-name" style="margin-left: 4px;">{{ $color->name }}</span>
                    @if(isset($color->products_count))
                        <span class="count-cate" style="margin-left: 4px;">({{ $color->products_count }})</span>
                    @endif
                </label>
            @endforeach
        </div>
    </div>
    <div class="widget-facet facet-price">
        <h6 class="facet-title">GIÁ</h6>
        <div class="price-val-range" id="price-value-range" data-min="0" data-max="500"></div>
        <div class="box-price-product">
            <div class="box-price-item">
                <span class="title-price">GIÁ THẤP</span>
                <div class="price-val" id="price-min-value" data-currency="$">0</div>
            </div>
            <div class="box-price-item">
                <span class="title-price">GIÁ CAO</span>
                <div class="price-val" id="price-max-value" data-currency="$">500</div>
            </div>
        </div>
    </div>
    <div class="widget-facet facet-fieldset">
        <h6 class="facet-title">Availability & Status</h6>
        <div class="box-fieldset-item">
            <fieldset class="fieldset-item">
                <input type="checkbox" name="is_new" value="1" {{ request('is_new') ? 'checked' : '' }}>
                <label>New Arrival</label>
            </fieldset>
            <fieldset class="fieldset-item">
                <input type="checkbox" name="is_best_seller" value="1" {{ request('is_best_seller') ? 'checked' : '' }}>
                <label>Best Seller</label>
            </fieldset>
            <fieldset class="fieldset-item">
                <input type="radio" name="availability" id="inStock" value="inStock" {{ request('availability') == 'inStock' ? 'checked' : '' }}>
                <label for="inStock">In stock</label>
            </fieldset>
            <fieldset class="fieldset-item">
                <input type="radio" name="availability" id="outStock" value="outStock" {{ request('availability') == 'outStock' ? 'checked' : '' }}>
                <label for="outStock">Out of stock</label>
            </fieldset>
        </div>
    </div>
    <button type="submit" class="btn-filter">Apply Filters</button>
</form>

<style>
    .color {
        display: inline-block;
        width: 24px;
        height: 24px;
        border-radius: 50%;
        border: 1px solid #ccc;
        margin-right: 8px;
        vertical-align: middle;
    }
    .color-name {
        vertical-align: middle;
        font-size: 14px;
    }
</style>

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var priceSlider = document.getElementById('price-value-range');
        var minValue = document.getElementById('price-min-value');
        var maxValue = document.getElementById('price-max-value');
        if (priceSlider && window.noUiSlider) {
            noUiSlider.create(priceSlider, {
                start: [0, 500],
                connect: true,
                range: {
                    'min': 0,
                    'max': 500
                }
            });
            priceSlider.noUiSlider.on('update', function(values, handle) {
                if (minValue && maxValue) {
                    minValue.textContent = Math.round(values[0]);
                    maxValue.textContent = Math.round(values[1]);
                }
            });
        }
    });
</script>
@endpush