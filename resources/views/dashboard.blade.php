{{-- filepath: c:\laragon\www\passakorn1\resources\views\dashboard.blade.php --}}
@extends('template.backend.master')

@section('content')
<style>
  .app-header,
.app-sidebar {
    display: none !important;
}

.app-main {
    margin-left: 0 !important;
    padding-top: 0 !important;
}
    .overview-title {
        font-weight: 700;
        color: #25324b;
    }

    .overview-subtitle {
        color: #748094;
    }

    .summary-card {
        height: 100%;
        border: 0;
        border-radius: 14px;
        box-shadow: 0 5px 18px rgba(31, 45, 61, .08);
    }

    .summary-label {
        color: #718096;
        font-size: 14px;
    }

    .summary-value {
        margin: 8px 0 0;
        color: #24324a;
        font-size: 28px;
        font-weight: 700;
    }

    .summary-icon {
        display: grid;
        width: 48px;
        height: 48px;
        place-items: center;
        border-radius: 12px;
        font-size: 23px;
    }

    .product-card {
        height: 100%;
        overflow: hidden;
        border: 1px solid #edf0f4;
        border-radius: 12px;
        background: #fff;
        transition: transform .2s ease, box-shadow .2s ease;
    }

    .product-card:hover {
        transform: translateY(-3px);
        box-shadow: 0 10px 24px rgba(31, 45, 61, .12);
    }

    .product-photo,
    .product-no-photo {
        width: 100%;
        height: 170px;
        object-fit: cover;
        background: #f1f5f9;
    }

    .product-no-photo {
        display: grid;
        place-items: center;
        color: #1683d8;
        font-size: 42px;
    }

    .product-details {
        padding: 16px;
    }

    .product-details h3 {
        overflow: hidden;
        margin: 0 0 8px;
        color: #263449;
        font-size: 17px;
        text-overflow: ellipsis;
        white-space: nowrap;
    }

    .product-description {
        display: -webkit-box;
        min-height: 40px;
        overflow: hidden;
        color: #788397;
        font-size: 13px;
        -webkit-box-orient: vertical;
        -webkit-line-clamp: 2;
    }

    .product-price {
        color: #1683d8;
        font-size: 18px;
        font-weight: 700;
    }

    @media (max-width: 576px) {
        .product-photo,
        .product-no-photo {
            height: 210px;
        }
    }
</style>

<main class="app-main">
    <div class="app-content-header">
        <div class="container-fluid">
            <div class="d-flex flex-wrap justify-content-between align-items-center gap-3">
                <div>
                    <h1 class="overview-title fs-3 mb-1">ภาพรวมสินค้า</h1>
                    <div class="overview-subtitle">สรุปรายการสินค้าที่มีในร้าน</div>
                </div>

                {{-- filepath: c:\laragon\www\passakorn1\resources\views\dashboard.blade.php --}}
{{-- ...existing code... --}}
<div class="d-flex gap-2">
    <a href="{{ route('users') }}" class="btn btn-primary">
        <i class="bi bi-box-seam me-1"></i> จัดการสินค้า
    </a>

    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit" class="btn btn-outline-danger">
            <i class="bi bi-box-arrow-right me-1"></i> ออกจากระบบ
        </button>
    </form>
</div>
{{-- ...existing code... --}}
                    <i class="bi bi-plus-lg me-1"></i> จัดการสินค้า
                </a>
            </div>
        </div>
    </div>

    <div class="app-content">
        <div class="container-fluid">
            <div class="row g-3 mb-4">
                <div class="col-12 col-sm-6 col-xl-4">
                    <div class="card summary-card">
                        <div class="card-body d-flex justify-content-between align-items-center">
                            <div>
                                <div class="summary-label">สินค้าทั้งหมด</div>
                                <div class="summary-value">{{ $productCount }}</div>
                            </div>
                            <div class="summary-icon text-primary bg-primary-subtle">
                                <i class="bi bi-box-seam"></i>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-sm-6 col-xl-4">
                    <div class="card summary-card">
                        <div class="card-body d-flex justify-content-between align-items-center">
                            <div>
                                <div class="summary-label">ราคาเฉลี่ยต่อสินค้า</div>
                                <div class="summary-value">฿{{ number_format($averagePrice, 2) }}</div>
                            </div>
                            <div class="summary-icon text-success bg-success-subtle">
                                <i class="bi bi-currency-baht"></i>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-sm-6 col-xl-4">
                    <div class="card summary-card">
                        <div class="card-body d-flex justify-content-between align-items-center">
                            <div class="me-2">
                                <div class="summary-label">สินค้าเพิ่มล่าสุด</div>
                                <div class="summary-value fs-5">
                                    {{ $latestProduct?->name ?? 'ยังไม่มีสินค้า' }}
                                </div>
                            </div>
                            <div class="summary-icon text-warning bg-warning-subtle">
                                <i class="bi bi-stars"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card border-0 shadow-sm">
                <div class="card-header bg-white d-flex justify-content-between align-items-center">
                    <div>
                        <h2 class="card-title fw-bold mb-1">สินค้าในร้าน</h2>
                        <div class="text-secondary small">สินค้า 8 รายการล่าสุด</div>
                    </div>
                    <a href="{{ route('index') }}" target="_blank" class="btn btn-outline-primary btn-sm">
                        ดูหน้าร้าน
                    </a>
                </div>

                <div class="card-body">
                    <div class="row g-3">
                        @forelse ($products as $product)
                            <div class="col-12 col-sm-6 col-lg-4 col-xl-3">
                                <article class="product-card">
                                    @if ($product->image)
                                        <img
                                            class="product-photo"
                                            src="{{ asset('storage/' . $product->image) }}"
                                            alt="{{ $product->name }}">
                                    @else
                                        <div class="product-no-photo" aria-label="ไม่มีรูปสินค้า">
                                            <i class="bi bi-image"></i>
                                        </div>
                                    @endif

                                    <div class="product-details">
                                        <h3 title="{{ $product->name }}">{{ $product->name }}</h3>
                                        <p class="product-description">
                                            {{ $product->description ?: 'ไม่มีรายละเอียดสินค้า' }}
                                        </p>
                                        <div class="product-price">
                                            ฿{{ number_format($product->price, 2) }}
                                        </div>
                                    </div>
                                </article>
                            </div>
                        @empty
                            <div class="col-12">
                                <div class="py-5 text-center text-secondary">
                                    <i class="bi bi-box-seam fs-1 d-block mb-2"></i>
                                    ยังไม่มีสินค้า
                                    <div class="mt-3">
                                        <a href="{{ route('users') }}" class="btn btn-primary">
                                            เพิ่มสินค้าแรก
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection