{{-- sidebar_filter.blade.php --}}
@php
    $categories = $categories ?? \App\Models\Category::withCount('products')->get();
    $colors = $colors ?? \App\Models\ProductAttribute::where('group_id', 1)->get();
@endphp

<form action="{{ route('products.filter') }}" method="GET" class="canvas-body" id="sidebar-filter-form">
    <div class="widget-facet facet-categories">
        <h6 class="facet-title">DANH MỤC SẢN PHẨM</h6>
        <ul class="facet-content">
            @foreach($categories as $category)
                <li>
                    <form action="{{ route('products.filter') }}" method="GET" style="display:inline;">
                        <label style="cursor:pointer;">
                            <input type="radio" name="category" value="{{ $category->id }}"
                                onchange="this.form.submit()"
                                {{ request('category') == $category->id ? 'checked' : '' }}>
                            {{ $category->name }} ({{ $category->products_count ?? $category->products->count() }})
                        </label>
                    </form>
                </li>
            @endforeach
        </ul>
    </div>
    {{-- <div class="widget-facet facet-color">
        <h6 class="facet-title">MÀU SẮC</h6>
        <div class="facet-color-box" style="display: flex; gap: 8px; flex-wrap: wrap;">
            @foreach($colors as $color)
                <label style="display:inline-flex;align-items:center;cursor:pointer;">
                    <input type="checkbox" name="color[]" value="{{ $color->id }}" 
                        {{ (is_array(request('color')) && in_array($color->id, request('color'))) || request('color') == $color->id ? 'checked' : '' }}>
                    <span class="color" style="background:{{ $color->color }};margin-left:4px;"></span>
                    <span class="color-name" style="margin-left:4px;">{{ $color->name }}</span>
                </label>
            @endforeach
        </div>
    </div>
    <div class="widget-facet facet-price">
        <h6 class="facet-title">GIÁ</h6>
        <div class="price-val-range" id="price-value-range" data-min="0" data-max="500"></div>
        <div class="box-price-product">
            <span id="price-min-value">{{ request('price_min', 0) }}</span>₫ - 
            <span id="price-max-value">{{ request('price_max', 99999) }}</span>₫
        </div>
        <input type="hidden" name="price_min" value="{{ request('price_min', 0) }}">
        <input type="hidden" name="price_max" value="{{ request('price_max', 99999) }}">
    </div>
    <div class="widget-facet facet-fieldset">
        <h6 class="facet-title">Tình trạng</h6>
        <div class="box-fieldset-item">
            <label>
                <input type="checkbox" name="is_new" value="1" {{ request('is_new') ? 'checked' : '' }}> Hàng mới
            </label>
            <label>
                <input type="checkbox" name="is_best_seller" value="1" {{ request('is_best_seller') ? 'checked' : '' }}> Bán chạy
            </label>
            <label>
                <input type="radio" name="availability" value="inStock" {{ request('availability') == 'inStock' ? 'checked' : '' }}> Còn hàng
            </label>
            <label>
                <input type="radio" name="availability" value="outStock" {{ request('availability') == 'outStock' ? 'checked' : '' }}> Hết hàng
            </label>
        </div>
    </div>
    <button type="submit" class="btn-filter">Áp dụng bộ lọc</button> --}}
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
    // Tự động submit khi chọn danh mục (radio đã có onchange)
    // Nếu muốn tự động submit khi chọn màu, giá, trạng thái thì thêm JS ở đây
</script>
@endpush