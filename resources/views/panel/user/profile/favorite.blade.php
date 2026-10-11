@extends('panel.Layout.master')

@section('content')
    <div class="container">
        <nav class="breadcrumb-custom">
            <a href="{{ route('panel.index') }}">خانه</a>
            <span class="separator">/</span>
            <a href="{{ route('panel.profile.index') }}">پروفایل</a>
            <span class="separator">/</span>
            <span class="active">علاقه‌مندی‌ها</span>
        </nav>
    </div>


    <div class="container">
        <div class="row g-4">
            @include('panel.user.profile.sidebar')


            <div class="col-lg-9">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="fw-bold mb-0"><i class="bi bi-heart-fill text-cta"></i> علاقه‌مندی‌های من <small
                            class="text-muted-custom fs-6">({{$userFavorites->count()}} محصول)</small></h4>
                    <a href="{{route('panel.favorite.delete-favorite')}}" class="btn btn-outline-danger btn-sm"><i class="bi bi-trash"></i> حذف همه</a>
                </div>

                <div class="row g-3">

                    @foreach ($userFavorites as $userFavorite)
                        @if ($userFavorite->productVariant->validDiscount())
                            <div class="col-lg-3 col-md-4 col-6">
                                <div class="product-card">
                                    <span class="product-badge discount">
                                        @if ($userFavorite->productVariant->validDiscount()->type == 'percentage')
                                            {{ numberFormatAble($userFavorite->productVariant->validDiscount()->value ?? 0) }}
                                            %
                                        @else
                                            {{ numberFormatAble($userFavorite->productVariant->validDiscount()->value / 10 ?? 0) }}
                                            ت
                                        @endif
                                    </span>

                                    <div class="product-img">
                                        <img src="{{ asset($userFavorite->productVariant->product->image) }}" alt=""
                                            onerror="this.src='data:image/svg+xml,%3Csvg xmlns=%22http://www.w3.org/2000/svg%22 viewBox=%220 0 200 200%22%3E%3Crect fill=%22%23f1f2f6%22 width=%22200%22 height=%22200%22/%3E%3Ctext x=%22100%22 y=%22110%22 font-size=%2260%22 text-anchor=%22middle%22 fill=%22%236C5CE7%22%3E⌚%3C/text%3E%3C/svg%3E'">
                                    </div>
                                    <div class="product-info">
                                        <div class="product-brand">
                                            {{ $userFavorite->productVariant?->product?->brand->name ?? '' }}</div>
                                        <h6 class="product-title">
                                            <a
                                                href="{{ route('panel.show', ['product' => $userFavorite->productVariant->product->slug, 'productVariant' => $userFavorite->productVariant->id]) }}">
                                                {{ $userFavorite->productVariant->product?->name ?? '' }}
                                            </a>
                                        </h6>
                                        <div class="product-rating">
                                            <span class="stars">★★★★★</span>
                                            <span>(۴۲)</span>
                                        </div>
                                        <div class="product-price-row">
                                            <div>
                                                <div class="product-old-price">
                                                    {{ numberFormatAble($userFavorite->productVariant->price / 10) ?? 0 }}
                                                </div>
                                                <div class="product-price">
                                                    {{ numberFormatAble($userFavorite->productVariant->countable() / 10) ?? 0 }}
                                                    <small>ت</small>
                                                </div>
                                            </div>
                                            <button class="btn-add-to-cart"
                                                onclick="addToCart('{{ $userFavorite->productVariant->id }}','{{ $userFavorite->productVariant->product?->name ?? '' }}')"><i
                                                    class="bi bi-bag-plus">

                                                </i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @else
                            <div class="col-lg-3 col-md-4 col-6">
                                <div class="product-card">
                                    @if ($userFavorite->productVariant->new)
                                        <span class="product-badge new">جدید</span>
                                    @endif
                               
                                    <div class="product-img">
                                        <img src="{{ asset($userFavorite->productVariant->product->image) }}" alt=""
                                            onerror="this.src='data:image/svg+xml,%3Csvg xmlns=%22http://www.w3.org/2000/svg%22 viewBox=%220 0 200 200%22%3E%3Crect fill=%22%23f1f2f6%22 width=%22200%22 height=%22200%22/%3E%3Ctext x=%22100%22 y=%22110%22 font-size=%2260%22 text-anchor=%22middle%22 fill=%22%236C5CE7%22%3E⌚%3C/text%3E%3C/svg%3E'">
                                    </div>
                                    <div class="product-info">
                                        <div class="product-brand">{{ $userFavorite->productVariant->product?->brand->name ?? '' }}</div>
                                        <h6 class="product-title">
                                            <a
                                                href="{{ route('panel.show', ['product' =>$userFavorite->productVariant->product->slug, 'productVariant' =>$userFavorite->productVariant->id]) }}">
                                                {{ $userFavorite->productVariant->product?->name ?? '' }}
                                            </a>
                                        </h6>
                                        <div class="product-rating">
                                            <span class="stars">★★★★★</span>
                                            <span>(۲۲ نظر)</span>
                                        </div>
                                        <div class="product-old-price">&nbsp;</div>
                                        <div class="product-price-row">
                                            <div class="product-price">{{ numberFormatAble($userFavorite->productVariant->price / 10) ?? 0 }}
                                                <small>ت</small>
                                            </div>
                                            <button class="btn-add-to-cart"
                                                onclick='addToCart({{ $userFavorite->productVariant->id }},"{{ $userFavorite->productVariant->product?->name }}")'>
                                                <i class="bi bi-bag-plus"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach


                </div>
            </div>
        </div>
    </div>
@endsection
