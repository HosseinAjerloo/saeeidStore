<header class="main-header">
    <div class="container py-3">
        <div class="row align-items-center g-3">
            <!-- لوگو -->
            <div class="col-lg-3 col-4">
                <a href="index.html" class="header-logo">
                    <i class="bi bi-clock-history"></i> فروشگاه محمدی
                </a>
            </div>
            <!-- جستجو -->
            <div class="col-lg-6 col-6">
                <div class="search-bar">
                    <input type="text" id="search-input" placeholder="جستجو..." oninput="liveSearch(this)">
                    <button><i class="bi bi-search"></i></button>
                    <div id="search-suggestions" class="dropdown-menu w-100 show d-none"
                         style="position:absolute; top:100%; right:0; border-radius:12px; box-shadow:0 8px 30px rgba(108,92,231,0.12); padding:8px;"></div>
                </div>
            </div>
            <!-- آیکون‌ها -->
            <div class="col-lg-3 col-2">
                <div class="d-flex align-items-center justify-content-end gap-2">
                    <a href="pages/auth-login.html" class="header-icon">
                        <i class="bi bi-person"></i>
                    </a>
                    @if(\Illuminate\Support\Facades\Auth::check())
                        <a href="pages/profile-favorites.html" class="header-icon d-none d-sm-flex">
                            <i class="bi bi-heart"></i>
                            <span class="badge-count" id="fav-count" style="display:none">0</span>
                        </a>
                    @endif
                    <a href="{{route('panel.cart.index')}}" class="header-icon d-none d-sm-flex">
                        <i class="bi bi-bag"></i>
                        <span class="badge-count" id="cart-count" style="display:none">0</span>
                    </a>
                </div>
            </div>
        </div>

    </div>

    <!-- نوار دسته‌بندی با مگا منو -->
    <nav class="category-nav d-none d-lg-block">
        <div class="container">
            <ul>
                <li><a href="{{route('panel.index')}}"><i class="bi bi-house"></i> خانه</a></li>

                @foreach($categories as $category)
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle show" data-bs-toggle="dropdown" aria-expanded="true">
                            <img style="width: 1rem" src="{{asset($category->image)}}" alt="{{$category->name}}">
                            {{$category->name??''}}
                        </a>
                        <div class="dropdown-menu mega-menu mega-menu-4col " data-popper-placement="bottom-end"
                             style="position: absolute; inset: 0px 0px auto auto; margin: 0px; transform: translate(0px, 42px);">
                            <div class="row g-3">
                                @foreach($category->childs()->whereHas('childs.products.productVariant')->limit(3)->cursor() as $categoryChild)

                                    <div class="col-3">
                                        <h6>{{$categoryChild->name??''}}</h6>
                                        @foreach($categoryChild->childs as $child)
                                            <a href="pages/search.html" class="mega-item d-block">
                                                <i class="bi bi-arrow-left-short"></i>
                                                {{$child->name??''}}
                                            </a>
                                        @endforeach
                                    </div>

                                @endforeach
                            </div>
                        </div>
                    </li>
                @endforeach


                <li><a href="pages/amazing.html"><i class="bi bi-fire"></i> شگفت‌انگیزها</a></li>
            </ul>
        </div>
    </nav>
</header>
