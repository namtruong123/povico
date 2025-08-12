<div class="modal fade modal-search" id="search">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="d-flex justify-content-between align-items-center">
                <h5>Tìm kiếm</h5>
                <span class="icon-close icon-close-popup" data-bs-dismiss="modal"></span>
            </div>
            <form class="form-search" autocomplete="off">
                <fieldset class="text" style="position:relative;">
                    <input type="text" placeholder="Nhập từ khóa tìm kiếm..." class="" name="text" tabindex="0" value=""
                        aria-required="true" required="">
                </fieldset>
                <button class="" type="submit">
                    <svg class="icon" width="20" height="20" viewBox="0 0 24 24" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M11 19C15.4183 19 19 15.4183 19 11C19 6.58172 15.4183 3 11 3C6.58172 3 3 6.58172 3 11C3 15.4183 6.58172 19 11 19Z"
                            stroke="#181818" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                        <path d="M21.35 21.0004L17 16.6504" stroke="#181818" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round"></path>
                    </svg>
                </button>
            </form>
            <div>
                <h5 class="mb_16">Danh mục sản phẩm</h5>
                <ul class="list-tags">
                    @foreach($categories as $category)
                        <li>
                            <a href="{{ route('shop.category', $category->slug) }}" class="radius-60 link">
                                {{ $category->name }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
            <div>
                <h6 class="mb_16">Sản phẩm đã xem gần đây</h6>
                <div class="tf-grid-layout tf-col-2 lg-col-3 xl-col-4 loadmore-item" data-display="4" data-count="4">
                    {{-- Kết quả tìm kiếm sẽ được render ở đây --}}
                </div>
            </div>
            <!-- Load Item -->
            <div class="wd-load view-more-button text-center d-none">
                <button class="tf-loading btn-loadmore tf-btn btn-reset"><span
                        class="text text-btn text-btn-uppercase">Xem thêm</span></button>
            </div>
        </div>
    </div>
</div>