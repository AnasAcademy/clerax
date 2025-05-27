@php
if (empty($authUser) and auth()->check()) {
$authUser = auth()->user();
}

$navBtnUrl = null;
$navBtnText = null;

if(request()->is('forums*')) {
$navBtnUrl = '/forums/create-topic';
$navBtnText = trans('update.create_new_topic');
} else {
$navbarButton = getNavbarButton(!empty($authUser) ? $authUser->role_id : null, empty($authUser));

if (!empty($navbarButton)) {
$navBtnUrl = $navbarButton->url;
$navBtnText = $navbarButton->title;
}
}

$userLanguages = !empty($generalSettings['site_language']) ? [$generalSettings['site_language'] =>
getLanguages($generalSettings['site_language'])] : [];

if (!empty($generalSettings['user_languages']) and is_array($generalSettings['user_languages'])) {
$userLanguages = getLanguages($generalSettings['user_languages']);
}

$localLanguage = [];

foreach($userLanguages as $key => $userLanguage) {
$localLanguage[localeToCountryCode($key)] = $userLanguage;
}

$allWebinars = [];

if (isset($featureSubCategories)) {
$allWebinars = $featureSubCategories->flatMap(function($category) {
return $category->webinars->map(function($webinar) {
return [
'id' => $webinar->id,
'title' => $webinar->title ?? 'No Title',
];
});
})->values(); // reset array keys
}

$array = ['get_login','get_register','get_forget_password','get_reset_password'];

@endphp

<style>
.search-wrapper {
    position: relative;
    width: 100%;
    max-width: 300px;
    /* Adjust as needed */
}

.search-wrapper input.form-control {
    width: 100%;
    padding-left: 2.5rem;
    /* Leave space for icon */
    padding-right: 0.75rem;
}

.search-wrapper .search-icon {
    position: absolute;
    top: 50%;
    left: 10px;
    transform: translateY(-50%);
    border: none;
    background: none;
    padding: 0;
    margin: 0;
    cursor: pointer;
    display: flex;
    align-items: center;
    justify-content: center;
}

/* Optional RTL override */
[dir="rtl"] .search-wrapper input.form-control {
    padding-left: 0.75rem;
    padding-right: 2.5rem;
}

[dir="rtl"] .search-wrapper .search-icon {
    left: auto;
    right: 10px;
}

.search-wrapper .search-icon i {
    color: #666;
}

.form-inline {
    width: 38%;
}

.search-dropdown {
    position: absolute;
    top: 100%;
    left: 0;
    right: 0;
    background: #fff;
    border: 1px solid #ddd;
    z-index: 1000;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    max-height: 300px;
    overflow-y: auto;
    padding: 5px 0;
    border-radius: 6px;
}

.dropdown-item-title.fw-bold {
    font-weight: 600;
    color: #D3514A;
    cursor: none;
    padding: 5px 15px;

}

.dropdown-item {
    display: block;
    padding: 10px 15px;
    text-decoration: none;
    color: #333;
    font-size: 14px;
    cursor: pointer;
}

.dropdown-item:hover {
    background-color: #f8f9fa;
}


@media (max-width: 576px) {
    .form-inline {
        width: 100%;
    }

    .search-wrapper {
        max-width: 100%;
    }

    .search-wrapper input.form-control {
        font-size: 14px;
    }

    .search-wrapper .search-icon i {
        width: 16px;
        height: 16px;
    }
}
</style>

@if (!in_array(Route::currentRouteName(), $array))
<div class="navbar-wrapper">

    <nav id="navbar" class="navbar navbar-expand-lg navbar-light position-relative">
        <div class="gap-3 flex-row {{ (!empty($isPanel) and $isPanel) ? 'container-fluid' : 'container'}}">

            <div class="d-none d-lg-flex align-items-lg-center align-items-start gap-1 p-0 justify-content-start w-25">
                @if(!auth()->check())
                <a href="/register" class="btn new-btn rounded-sm font-16 width-120px p-2">
                    {{ trans('auth.register') }}
                </a>

                <a href="/login" class="btn new-btn-otline rounded-sm font-16 width-120px p-2">
                    {{ trans('auth.login') }}
                </a>
                @else
                <li class="dropdown ">
                    <a href="#" data-toggle="dropdown"
                        class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                        <img alt="image" src="{{ $authUser->getAvatar() }}" class="rounded-circle mr-1" width="20%">
                        <div class="d-sm-none d-lg-inline-block">{{ $authUser->full_name }}</div>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right W-25" style="width: fit-content;">
                        <a href="{{ getAdminPanelUrl() }}/logout" class="dropdown-item has-icon text-danger">
                            <i class="fas fa-sign-out-alt"></i> {{ trans('admin/main.logout') }}
                        </a>
                    </div>
                </li>
                @endif
            </div>

            <div
                class="d-flex flex-row-reverse flex-lg-row justify-content-between align-items-center gap-3 w-100 px-20  px-lg-0">



                <button class="navbar-toggler navbar-order" type="button" id="navbarToggle">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="d-none d-lg-flex navbar-toggle-content" id="navbarContent">
                    <div class="navbar-toggle-header d-flex justify-content-between d-lg-none">
                        <button class="btn-transparent" id="navbarClose">
                            <i data-feather="x" width="32" height="32"></i>
                        </button>
                    </div>

                    <ul class="navbar-nav mr-auto d-flex align-items-lg-center align-items-start gap-1">

                        @if(!empty($categories) and count($categories))

                        <li class="mr-xl-25">
                            <div class="menu-category">
                                <ul>
                                    <li id="categoriesMenuToggle"
                                        class="cursor-pointer user-select-none d-flex xs-categories-toggle category-nav-btn">
                                        <i data-feather="grid" width="20" height="20"
                                            class="mr-10 d-none d-lg-block"></i>
                                        {{ trans('categories.categories') }}
                                    </li>
                                </ul>
                            </div>
                        </li>
                        @endif

                        <!-- @if(!empty($navbarPages) and count($navbarPages))
                        @foreach($navbarPages as $navbarPage)
                        <li class="nav-item p-0">
                            <a class="nav-link" href="{{ $navbarPage['link'] }}">{{ $navbarPage['title'] }}</a>
                        </li>
                        @endforeach -->
                        <li class="nav-item p-0">
                            <a class="nav-link" href="/">الصفحة الرئيسية</a>
                        </li>
                        <li class="nav-item p-0">
                            <a class="nav-link" href="/classes?sort=newest">الدورات</a>
                        </li>

                        <li class="nav-item">

                            <form action="/search" method="get" class="w-100 form-inline my-2 my-lg-0 navbar-search">
                                <div class="search-wrapper position-relative">
                                    <input id="searchInput" class="form-control rounded" type="text" name="search"
                                        placeholder="{{ trans('navbar.search_anything') }}" aria-label="Search"
                                        autocomplete="off">
                                    <button type="submit" class="search-icon">
                                        <i data-feather="search" width="20" height="20"></i>
                                    </button>

                                    <!-- Dynamic Dropdown -->
                                    <div id="searchDropdown" class="search-dropdown d-none">
                                    </div>
                                </div>
                            </form>
                        </li>
                        @if(!auth()->check())
                        <a href="/register" class="d-flex d-lg-none btn new-btn rounded-sm font-16 w-100 p-2">
                            {{ trans('auth.register') }}
                        </a>

                        <a href="/login" class="d-flex d-lg-none btn new-btn-otline rounded-sm font-16 w-100 p-2">
                            {{ trans('auth.login') }}
                        </a>
                        @else
                        <div class="d-sm-inline-block d-lg-none">{{ $authUser->full_name }}</div>
                        <div class="dropdown-divider"></div>
                        <a href="{{ getAdminPanelUrl() }}/logout" class="dropdown-item has-icon text-danger d-flex d-lg-none">
                            <i class="fas fa-sign-out-alt"></i> {{ trans('admin/main.logout') }}
                        </a>
                        @endif
                </div>
                @endif
                </ul>
                <div class="d-flex flex-column-reverse flex-lg-column  w-25">
                    <a class="navbar-order d-flex align-items-center justify-content-center mr-0 {{ (empty($navBtnUrl) and empty($navBtnText)) ? 'ml-auto' : '' }}"
                        href="/">
                        @if(!empty($generalSettings['logo']))
                        <img src="{{asset('store/new/cleraxLogo.png')}}" class="img-cover h-auto" width="20%" alt="site logo">
                        @endif
                    </a>
                    <p class="d-flex flex-row-reverse align-items-center justify-content-end w-100">Powered by<img src="{{asset('store/new/lxera-black.png')}}" class="" width="20%" alt="site logo">
</p>
                </div>
            </div>


        </div>
    </nav>

    <div class="nav-dropdown-menu d-none bg-white shadow position-absolute border-top pt-30" id="categoryDropdown"
        style="top: 110px; left:5%; width: 90%; z-index: 1050; min-height: 400px; height: fit-content; border-radius: 22px;">
        <div class="container">
            <div class="d-flex justify-content-start align-items-start flex-wrap">

                {{-- Column 1: Explore Categories --}}
                <div class="mb-4 col-12 col-md-3">
                    <h6 class="fw-bold text-orange mb-20">Explore Categories</h6>
                    @foreach($categories as $category)
                    <a href="{{ $category->getUrl() }}" class="text-dark text-decoration-none d-block fw-medium">
                        {{ $category->title }}
                    </a>
                    @endforeach
                </div>

                {{-- Column 2: Explore Roles --}}
                <div class="mb-4 col-12 col-md-3">
                    <h6 class="fw-bold text-orange mb-20">Explore Roles</h6>
                    <ul class="list-unstyled">
                        <!-- <li><a href="#" class="text-dark text-decoration-none d-block py-1">Frontend Developer</a></li>
                        <li><a href="#" class="text-dark text-decoration-none d-block py-1">Backend Developer</a></li>
                        <li><a href="#" class="text-dark text-decoration-none d-block py-1">UI/UX Designer</a></li>
                        <li><a href="#" class="text-dark text-decoration-none d-block py-1">Data Analyst</a></li> -->
                    </ul>
                </div>

                {{-- Column 3: Explore Trending Skills --}}
                <div class="mb-4 col-12 col-md-3">
                    <h6 class="fw-bold text-orange mb-20">Explore Trending Skills</h6>
                    <ul class="list-unstyled">
                        <!-- <li><a href="#" class="text-dark text-decoration-none d-block py-1">React</a></li>
                        <li><a href="#" class="text-dark text-decoration-none d-block py-1">Laravel</a></li>
                        <li><a href="#" class="text-dark text-decoration-none d-block py-1">Tailwind CSS</a></li>
                        <li><a href="#" class="text-dark text-decoration-none d-block py-1">Python</a></li> -->
                    </ul>
                </div>

                {{-- Column 4: Earn a Professional Certificate --}}
                <div class="mb-4 col-12 col-md-3">
                    <h6 class="fw-bold text-orange mb-20">Earn a Professional Certificate</h6>
                    <ul class="list-unstyled">
                        <!-- <li><a href="#" class="text-dark text-decoration-none d-block py-1">Google UX Design</a></li>
                        <li><a href="#" class="text-dark text-decoration-none d-block py-1">Meta Frontend</a></li>
                        <li><a href="#" class="text-dark text-decoration-none d-block py-1">IBM Data Science</a></li>
                        <li><a href="#" class="text-dark text-decoration-none d-block py-1">AWS Cloud Practitioner</a>
                        </li> -->
                    </ul>
                </div>
            </div>
        </div>
    </div>

</div>
@endif

@push('scripts_bottom')
<script src="/assets/default/js/parts/navbar.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<link href="/assets/default/vendors/flagstrap/css/flags.css" rel="stylesheet">
<script src="/assets/default/vendors/flagstrap/js/jquery.flagstrap.min.js"></script>
<script src="https://unpkg.com/feather-icons"></script>

<script>
feather.replace();

document.addEventListener('DOMContentLoaded', function() {
    const toggleBtn = document.getElementById('categoriesMenuToggle');
    const dropdown = document.getElementById('categoryDropdown');
    let timeout;

    if (!toggleBtn || !dropdown) return;

    const showMenu = () => {
        clearTimeout(timeout);
        dropdown.classList.remove('d-none');
    };

    const hideMenu = () => {
        timeout = setTimeout(() => {
            dropdown.classList.add('d-none');
        }, 200);
    };

    toggleBtn.addEventListener('mouseenter', showMenu);
    toggleBtn.addEventListener('mouseleave', hideMenu);
    dropdown.addEventListener('mouseenter', showMenu);
    dropdown.addEventListener('mouseleave', hideMenu);
});
</script>

<script>
const allWebinars = @json($allWebinars);
</script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    const searchInput = document.getElementById('searchInput');
    const searchDropdown = document.getElementById('searchDropdown');

    if (!searchInput || !searchDropdown) {
        console.warn("Search input or dropdown not found in DOM.");
        return;
    }

    // Render all or filtered webinars
    function renderDropdownItems(filtered) {
        if (filtered.length === 0) {
            searchDropdown.innerHTML = `<div class="dropdown-item text-muted">لا توجد نتائج</div>`;
            return;
        }

        searchDropdown.innerHTML = `
        <div class="dropdown-item-title fw-bold text-primary" style="cursor: default;">
            أكثر الدورات رواجًا
        </div>
        ${filtered.map(item => `
            <a href="/webinars/${item.id}" class="dropdown-item">${item.title}</a>
        `).join('')}
    `;
    }


    // Show all webinars on focus (even with empty input)
    searchInput.addEventListener('focus', () => {
        renderDropdownItems(allWebinars); // full list
        searchDropdown.classList.remove('d-none');
        searchDropdown.style.display = 'block';
    });

    // Filter dropdown while typing
    searchInput.addEventListener('input', () => {
        const query = searchInput.value.toLowerCase().trim();

        const filtered = allWebinars.filter(w =>
            w.title.toLowerCase().includes(query)
        );

        renderDropdownItems(filtered);
        searchDropdown.classList.remove('d-none');
        searchDropdown.style.display = 'block';
    });

    // Hide dropdown on outside click
    document.addEventListener('click', (e) => {
        if (!searchInput.contains(e.target) && !searchDropdown.contains(e.target)) {
            searchDropdown.classList.add('d-none');
            searchDropdown.style.display = 'none';
        }
    });
});
</script>



@endpush