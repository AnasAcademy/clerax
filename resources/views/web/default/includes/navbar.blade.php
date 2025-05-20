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

$menuData = [
    'Explore roles' => [
        'Data Analyst',
        'Project Manager',
        'Cyber Security Analyst',
        'Data Scientist',
        'Business Intelligence Analyst',
        'Digital Marketing Specialist',
        'UI / UX Designer',
        'Machine Learning Engineer',
        'Social Media Specialist',
        'Computer Support Specialist',
        'View all',
    ],
    'Explore categories' => [
        'Business',
        'Data Science',
        'Information Technology',
        'Computer Science',
        'Life Sciences',
        'Physical Science and Engineering',
        'Personal Development',
        'Social Sciences',
        'Language Learning',
        'Arts and Humanities',
        'View all',
    ],
    'Explore trending skills' => [
        'Python',
        'Artificial Intelligence',
        'Excel',
        'Machine Learning',
        'SQL',
        'Project Management',
        'Power BI',
        'Marketing',
    ],
    'Earn a Professional Certificate' => [
        'Business',
        'Computer Science',
        'Data Science',
        'Information Technology',
        'View all',
    ]
];
@endphp

<div class="navbar-wrapper">

    <nav id="navbar" class="navbar navbar-expand-lg navbar-light position-relative">
        <div class="gap-3 flex-row-reverse {{ (!empty($isPanel) and $isPanel) ? 'container-fluid' : 'container'}}">
            <div class="d-flex flex-row-reverse align-items-center justify-content-between gap-3 w-100 p-20">

                <a class="navbar-brand navbar-order d-flex align-items-center justify-content-center mr-0 {{ (empty($navBtnUrl) and empty($navBtnText)) ? 'ml-auto' : '' }}"
                    href="/">
                    @if(!empty($generalSettings['logo']))
                    <img src="{{asset('store/new/cleraxLogo.png')}}" class="img-cover h-auto" alt="site logo">
                    @endif
                </a>

                <button class="navbar-toggler navbar-order" type="button" id="navbarToggle">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="d-none d-lg-flex navbar-toggle-content" id="navbarContent">
                    <div class="navbar-toggle-header d-flex justify-content-between d-lg-none">
                        <button class="btn-transparent" id="navbarClose">
                            <i data-feather="x" width="32" height="32"></i>
                        </button>
                    </div>

                    <ul class="navbar-nav mr-auto d-flex align-items-center gap-1">
                        @if(!empty($categories) and count($categories))
                        <li class="mr-lg-25">
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

                        @if(!empty($navbarPages) and count($navbarPages))
                        @foreach($navbarPages as $navbarPage)
                        <li class="nav-item p-0">
                            <a class="nav-link" href="{{ $navbarPage['link'] }}">{{ $navbarPage['title'] }}</a>
                        </li>
                        @endforeach
                        <a href="/register" class="d-flex d-lg-none btn new-btn rounded-sm font-16 w-100 p-2">
                            {{ trans('auth.register') }}
                        </a>

                        <a href="/login" class="d-flex d-lg-none btn new-btn-otline rounded-sm font-16 w-100 p-2">
                            {{ trans('auth.login') }}
                        </a>
                </div>
                @endif
                </ul>
            </div>

            <div class="d-none d-lg-flex align-items-center gap-1 p-0">
                <a href="/register" class="btn new-btn rounded-sm font-16 width-120px p-2">
                    {{ trans('auth.register') }}
                </a>

                <a href="/login" class="btn new-btn-otline rounded-sm font-16 width-120px p-2">
                    {{ trans('auth.login') }}
                </a>
            </div>
        </div>
    </nav>

    <div class="nav-dropdown-menu d-none bg-white shadow position-absolute border-top pt-30" id="categoryDropdown"
        style="top: 130px; left:5%; width: 90%; z-index: 1050; min-height: 400px; height: fit-content; border-radius: 22px;">
        <div class="container">
            <div class="d-flex  justify-content-between align-items-start flex-wrap">
                @foreach($menuData as $section => $items)
                <div class="mb-4 col-6 col-md-3">
                    <h6 class="fw-bold">{{ $section }}</h6>
                    <ul class="list-unstyled">
                        @foreach($items as $item)
                        <li>
                            <a href="#" class="text-dark text-decoration-none small d-block py-1">
                                {{ $item }}
                            </a>
                        </li>
                        @endforeach
                    </ul>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

@push('scripts_bottom')
<script src="/assets/default/js/parts/navbar.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<link href="/assets/default/vendors/flagstrap/css/flags.css" rel="stylesheet">
<script src="/assets/default/vendors/flagstrap/js/jquery.flagstrap.min.js"></script>
<script src="https://unpkg.com/feather-icons"></script>

<script>
    feather.replace();

    document.addEventListener('DOMContentLoaded', function () {
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
@endpush
