@extends('admin.admin')
@section('title', 'Thêm sản phẩm')
@section('content')
<style>
    .cke_notification, .cke_notification_message {
        display: none !important;
    }
</style>
<div class="container">
    <h2 class="mb-4">Thêm sản phẩm</h2>
    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <!-- Thông tin cơ bản -->
            <div class="col-md-6">
                <div class="card mb-4">
                    <div class="card-header"><h5>Thông tin sản phẩm</h5></div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label>Tên sản phẩm</label>
                            <input type="text" name="name" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label>Mã sản phẩm (SKU)</label>
                            <input type="text" name="sku" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label>Slug</label>
                            <input type="text" name="slug" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label>Danh mục</label>
                            <select name="category_id" class="form-select" required>
                                @foreach($categories as $cat)
                                    <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label>Nhóm phân loại</label>
                            <select name="attribute_group_id" id="attribute_group_id" class="form-select" required>
                                <option value="">-- Chọn nhóm phân loại --</option>
                                @foreach($attributeGroups as $group)
                                    <option value="{{ $group->id }}">{{ $group->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label>Phân loại</label>
                            <select name="attribute_id" class="form-control">
                                <option value="">-- Chọn màu --</option>
                                @foreach($attributes as $attr)
                                    <option value="{{ $attr->id }}">{{ $attr->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label>Giá gốc</label>
                                <input type="number" name="price" class="form-control" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>Giá khuyến mãi</label>
                                <input type="number" name="sale_price" class="form-control">
                            </div>
                        </div>
                        <div class="mb-3">
                            <label>Số lượng</label>
                            <input type="number" name="quantity" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label class="me-3"><input type="checkbox" name="is_favorite" value="1"> Yêu thích</label>
                            <label class="me-3"><input type="checkbox" name="is_new" value="1"> Mới</label>
                            <label><input type="checkbox" name="is_best_seller" value="1"> Bán chạy</label>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Ảnh chính & Gallery -->
            <div class="col-md-6">
                <div class="card mb-4">
                    <div class="card-header"><h5>Ảnh chính sản phẩm</h5></div>
                    <div class="card-body">
                        <input type="file" name="main_image" class="form-control mb-2" id="main_image_input" accept="image/*">
                        <img id="main_image_preview" src="#" alt="Preview" style="display:none;max-width:100px;max-height:100px;">
                        <button type="button" class="btn btn-sm btn-danger mt-2" id="remove_main_image" style="display:none;">Xóa ảnh</button>
                    </div>
                </div>
                <div class="card mb-4">
                    <div class="card-header"><h5>Gallery ảnh sản phẩm</h5></div>
                    <div class="card-body">
                        <input type="file" name="gallery[]" class="form-control mb-2" id="gallery_input" multiple accept="image/*">
                        <div id="gallery_preview" class="d-flex flex-wrap gap-2"></div>
                    </div>
                </div>
            </div>
            <!-- Mô tả & Thông số -->
            <div class="col-md-12">
                <div class="card mb-4">
                    <div class="card-header"><h5>Mô tả sản phẩm</h5></div>
                    <div class="card-body">
                        <textarea name="description" class="form-control ckeditor" rows="5"></textarea>
                    </div>
                </div>
                <div class="card mb-4">
                    <div class="card-header"><h5>Thông số sản phẩm</h5></div>
                    <div class="card-body">
                        <textarea name="specifications" class="form-control ckeditor" rows="5"></textarea>
                    </div>
                </div>
            </div>
        </div>
        <button class="btn btn-success">Lưu</button>
    </form>
</div>
<!-- CKEditor -->
<script src="https://cdn.ckeditor.com/4.22.1/standard/ckeditor.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        // CKEditor
        if (typeof CKEDITOR !== 'undefined') {
            document.querySelectorAll('.ckeditor').forEach(function(el) {
                CKEDITOR.replace(el);
            });
        }

        // Preview ảnh chính
        document.getElementById('main_image_input').addEventListener('change', function(e) {
            const [file] = e.target.files;
            const preview = document.getElementById('main_image_preview');
            const removeBtn = document.getElementById('remove_main_image');
            if (file) {
                preview.src = URL.createObjectURL(file);
                preview.style.display = 'block';
                removeBtn.style.display = 'inline-block';
            } else {
                preview.src = '#';
                preview.style.display = 'none';
                removeBtn.style.display = 'none';
            }
        });
        document.getElementById('remove_main_image').addEventListener('click', function() {
            const input = document.getElementById('main_image_input');
            input.value = '';
            document.getElementById('main_image_preview').style.display = 'none';
            this.style.display = 'none';
        });

        // Gallery preview & remove
        let galleryFiles = [];
        const galleryInput = document.getElementById('gallery_input');
        const galleryPreview = document.getElementById('gallery_preview');

        galleryInput.addEventListener('change', function(e) {
            galleryFiles = Array.from(e.target.files);
            renderGalleryPreview();
        });

        function renderGalleryPreview() {
            galleryPreview.innerHTML = '';
            galleryFiles.forEach((file, idx) => {
                const wrapper = document.createElement('div');
                wrapper.style.position = 'relative';
                wrapper.style.display = 'inline-block';

                const img = document.createElement('img');
                img.src = URL.createObjectURL(file);
                img.style.maxWidth = '70px';
                img.style.maxHeight = '70px';
                img.classList.add('border', 'rounded', 'me-2', 'mb-2');

                const removeBtn = document.createElement('button');
                removeBtn.type = 'button';
                removeBtn.innerHTML = '&times;';
                removeBtn.className = 'btn btn-xs btn-danger position-absolute top-0 end-0 p-0';
                removeBtn.style.width = '18px';
                removeBtn.style.height = '18px';
                removeBtn.style.fontSize = '14px';
                removeBtn.style.lineHeight = '14px';
                removeBtn.style.padding = '0';
                removeBtn.style.zIndex = 2;
                removeBtn.onclick = function() {
                    galleryFiles.splice(idx, 1);
                    renderGalleryPreview();
                    updateGalleryInput();
                };

                wrapper.appendChild(img);
                wrapper.appendChild(removeBtn);
                galleryPreview.appendChild(wrapper);
            });
            updateGalleryInput();
        }

        function updateGalleryInput() {
            // Tạo lại input file với các file còn lại
            const dataTransfer = new DataTransfer();
            galleryFiles.forEach(file => dataTransfer.items.add(file));
            galleryInput.files = dataTransfer.files;
        }

        // Load nhóm phân loại theo phân loại
        document.getElementById('attribute_group_id').addEventListener('change', function() {
            const groupId = this.value;
            const attributeSelect = document.getElementById('attribute_id');
            attributeSelect.innerHTML = '<option value="">-- Chọn nhóm phân loại --</option>';
            attributeSelect.disabled = true;
            if (groupId) {
                fetch(`/admin/attributes/by-group/${groupId}`)
                    .then(res => res.json())
                    .then(data => {
                        if (data.length > 0) {
                            data.forEach(attr => {
                                const option = document.createElement('option');
                                option.value = attr.id;
                                option.textContent = attr.name;
                                attributeSelect.appendChild(option);
                                });
                            attributeSelect.disabled = false;
                        }
                    });
            }
        });
    });
</script>
@endsection