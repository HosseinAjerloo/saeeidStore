@props(['categories'])

<ul class="category-level">

    @foreach($categories as $category)

        <li class="category-level-item">

            <a href="#" class="category-level-link">

                <span>
                    {{ $category->name }}
                </span>

                @if($category->childs->isNotEmpty())
                    <i class="bi bi-chevron-left category-level-arrow"></i>
                @endif

            </a>

            @if($category->childs->isNotEmpty())

                <div class="category-submenu">

                    <div class="category-submenu-title">
                        {{ $category->name }}
                    </div>

                    <x-category-menu
                        :categories="$category->childs"
                    />

                </div>

            @endif

        </li>

    @endforeach

</ul>
