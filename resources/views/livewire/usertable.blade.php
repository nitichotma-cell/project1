{{-- filepath: c:\laragon\www\passakorn1\resources\views\livewire\usertable.blade.php --}}
<div class="product-admin">
    <style>
      
        .product-admin {
            min-height: 100vh;
            padding: 30px 0 50px;
            background: #f4f7fb;
        }

        .product-admin .page-title {
            margin: 0;
            color: #1e293b;
            font-size: 28px;
            font-weight: 700;
        }

        .product-admin .page-subtitle {
            margin-top: 6px;
            color: #718096;
        }

        .product-admin .panel {
            overflow: hidden;
            border: 1px solid #e7edf4;
            border-radius: 14px;
            background: #fff;
            box-shadow: 0 8px 24px rgba(31, 45, 61, .06);
        }

        .product-admin .panel-heading {
            padding: 18px 22px;
            border-bottom: 1px solid #edf1f5;
        }

        .product-admin .panel-heading h2 {
            margin: 0;
            color: #263449;
            font-size: 18px;
            font-weight: 700;
        }

        .product-admin .panel-body {
            padding: 22px;
        }

        .product-admin .form-label {
            margin-bottom: 7px;
            color: #344054;
            font-weight: 600;
        }

        .product-admin .form-control {
            min-height: 44px;
            border-color: #d9e1ea;
            border-radius: 8px;
        }

        .product-admin textarea.form-control {
            min-height: 105px;
        }

        .product-admin .form-control:focus {
            border-color: #4b9bea;
            box-shadow: 0 0 0 3px rgba(20, 121, 208, .12);
        }

        .product-admin .image-preview {
            display: block;
            width: 110px;
            height: 90px;
            margin-top: 12px;
            border: 1px solid #e7edf4;
            border-radius: 9px;
            object-fit: cover;
        }

        .product-admin .table-wrap {
            overflow-x: auto;
        }

        .product-admin .product-table {
            width: 100%;
            min-width: 700px;
            margin: 0;
            border-collapse: separate;
            border-spacing: 0;
        }

        .product-admin .product-table th {
            padding: 13px 16px;
            border-bottom: 1px solid #e7edf4;
            background: #f8fafc;
            color: #64748b;
            font-size: 13px;
            font-weight: 700;
            white-space: nowrap;
        }

        .product-admin .product-table td {
            padding: 14px 16px;
            border-bottom: 1px solid #edf1f5;
            color: #344054;
            vertical-align: middle;
        }

        .product-admin .product-table tr:last-child td {
            border-bottom: 0;
        }

        .product-admin .product-thumb {
            width: 62px;
            height: 56px;
            border-radius: 8px;
            object-fit: cover;
            background: #f1f5f9;
        }

        .product-admin .no-image {
            display: grid;
            width: 62px;
            height: 56px;
            place-items: center;
            border-radius: 8px;
            background: #f1f5f9;
            color: #94a3b8;
            font-size: 12px;
        }

        .product-admin .product-name {
            color: #1e293b;
            font-weight: 700;
        }

        .product-admin .product-description {
            max-width: 300px;
            color: #718096;
            white-space: normal;
        }

        .product-admin .product-price {
            color: #1479d0;
            font-weight: 700;
            white-space: nowrap;
        }

        .product-admin .empty-state {
            padding: 42px 20px !important;
            color: #718096 !important;
            text-align: center;
        }

        .product-admin .empty-icon {
            display: block;
            margin-bottom: 10px;
            font-size: 34px;
        }

        @media (max-width: 576px) {
            .product-admin {
                padding-top: 20px;
            }

            .product-admin .page-title {
                font-size: 23px;
            }

            .product-admin .panel-body {
                padding: 16px;
            }

            .product-admin .panel-heading {
                padding: 16px;
            }
        }
    </style>

    <main class="app-main">
        <div class="app-content">
            <div class="container-fluid">
                <div class="mb-4">
                    <h1 class="page-title">จัดการสินค้า</h1>
                    <p class="page-subtitle">เพิ่มสินค้าและจัดการรายการสินค้าที่แสดงในหน้าร้าน</p>
                </div>

                @if (session()->has('message'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('message') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="ปิด"></button>
                    </div>
                @endif

                <section class="panel mb-4">
                    <div class="panel-heading">
                        <h2>เพิ่มสินค้าใหม่</h2>
                    </div>

                    <div class="panel-body">
                        {{-- filepath: c:\laragon\www\passakorn1\resources\views\livewire\usertable.blade.php --}}
<form wire:submit.prevent="{{ $editingProductId ? 'update' : 'save' }}">
                            <div class="row g-3">
                                <div class="col-12 col-lg-6">
                                    <label for="product-name" class="form-label">ชื่อสินค้า</label>
                                    <input
                                        id="product-name"
                                        type="text"
                                        class="form-control"
                                        wire:model="name"
                                        placeholder="เช่น เสื้อยืดคอกลม">
                                    @error('name')
                                        <div class="text-danger small mt-1">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-12 col-lg-6">
                                    <label for="product-price" class="form-label">ราคา (บาท)</label>
                                    <input
                                        id="product-price"
                                        type="number"
                                        min="0"
                                        step="0.01"
                                        class="form-control"
                                        wire:model="price"
                                        placeholder="0.00">
                                    @error('price')
                                        <div class="text-danger small mt-1">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-12">
                                    <label for="product-description" class="form-label">รายละเอียดสินค้า</label>
                                    <textarea
                                        id="product-description"
                                        class="form-control"
                                        wire:model="description"
                                        placeholder="รายละเอียดหรือข้อมูลเพิ่มเติมของสินค้า"></textarea>
                                    @error('description')
                                        <div class="text-danger small mt-1">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-12">
                                    <label for="product-image" class="form-label">รูปสินค้า</label>
                                    <input
                                        id="product-image"
                                        type="file"
                                        class="form-control"
                                        wire:model="image"
                                        accept="image/*">
                                    <div class="form-text">รองรับไฟล์รูปภาพ ขนาดไม่เกิน 2 MB</div>
                                    <div class="form-text" wire:loading wire:target="image" role="status">
                                        กำลังอัปโหลดรูปสินค้า กรุณารอจนเสร็จก่อนกดบันทึก
                                    </div>

                                    @error('image')
                                        <div class="text-danger small mt-1">{{ $message }}</div>
                                    @enderror

                                    @if ($image)
                                        <img
                                            class="image-preview"
                                            src="{{ $image->temporaryUrl() }}"
                                            alt="ตัวอย่างรูปสินค้า">
                                    @endif
                                </div>

                                <div class="col-12 d-flex justify-content-end">
                                    <button
                                        type="submit"
                                        class="btn btn-primary px-4"
                                        wire:loading.attr="disabled"
                                        wire:target="image,save,update">
                                        <span wire:loading.remove wire:target="image,save,update">
                                            {{ $editingProductId ? 'บันทึกการแก้ไข' : 'บันทึกสินค้า' }}
                                        </span>
                                        <span wire:loading wire:target="image">
                                            กำลังอัปโหลดรูป...
                                        </span>
                                        <span wire:loading wire:target="save,update">
                                            กำลังบันทึก...
                                        </span>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </section>

                <section class="panel">
                    <div class="panel-heading d-flex justify-content-between align-items-center">
                        <h2>รายการสินค้า</h2>
                        <span class="badge text-bg-light">{{ $products->count() }} รายการ</span>
                    </div>

                    <div class="table-wrap">
                        <table class="product-table">
                            <thead>
                                <tr>
                                    <th>รูปภาพ</th>
                                    <th>ชื่อสินค้า</th>
                                    <th>รายละเอียด</th>
                                    <th>ราคา</th>
                                    <th class="text-center">จัดการ</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($products as $product)
                                    <tr wire:key="product-{{ $product->id }}">
                                        <td>
                                            @if ($product->image)
                                                <img
                                                    class="product-thumb"
                                                    src="{{ asset('storage/' . $product->image) }}"
                                                    alt="{{ $product->name }}">
                                            @else
                                                <div class="no-image">ไม่มีรูป</div>
                                            @endif
                                        </td>
                                        <td class="product-name">{{ $product->name }}</td>
                                        <td class="product-description">
                                            {{ $product->description ?: '—' }}
                                        </td>
                                        <td class="product-price">
                                            ฿{{ number_format($product->price, 2) }}
                                        </td>
                                        {{-- filepath: c:\laragon\www\passakorn1\resources\views\livewire\usertable.blade.php --}}
{{-- filepath: c:\laragon\www\passakorn1\resources\views\livewire\usertable.blade.php --}}
<td class="text-center">
    <div class="d-flex justify-content-center gap-2">
        <button
            type="button"
            class="btn btn-sm btn-outline-primary"
            wire:click="edit({{ $product->id }})">
            แก้ไข
        </button>

        <button
            type="button"
            class="btn btn-sm btn-outline-danger"
            wire:click="delete({{ $product->id }})">
            ลบสินค้า
        </button>
    </div>
</td>
</tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="empty-state">
                                            <span class="empty-icon">📦</span>
                                            ยังไม่มีสินค้า เพิ่มสินค้าได้จากแบบฟอร์มด้านบน
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </section>
            </div>
        </div>
    </main>
</div>