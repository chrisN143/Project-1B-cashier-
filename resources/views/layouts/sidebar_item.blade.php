{{-- <div class="menu-item">
    <!--begin:Menu link-->
    <a class="menu-link {{ Request::is('dashboard*') ? 'active' : '' }}" href="{{ route('dashboard') }}"><span
            class="menu-icon"><i class="ki-duotone ki-chart-pie-4 text-info fs-2"><span class="path1"></span><span
                    class="path2"></span><span class="path3"></span><span class="path4"></span></i></span><span
            class="menu-title">Dashboard
        </span></a>
    <!--end:Menu link-->
</div>
<div data-kt-menu-trigger="click" class="menu-item menu-accordion " aria-expanded="false">
    <!--begin:Menu link--><span class="menu-link"><span class="menu-icon"><i
                class="ki-duotone ki-code text-success fs-2"><span class="path1"></span><span
                    class="path2"></span><span class="path3"></span></i></span><span class="menu-title">Master Data
        </span><span class="menu-arrow"></span></span>
    <!--end:Menu link-->
    <!--begin:Menu sub-->
    <div class="menu-sub menu-sub-accordion" aria-expanded="false">

        <div class="menu-item">
            <!--begin:Menu link--><a class="menu-link {{ Request::is('product*') ? 'active' : '' }}"
                href="{{ route('product.index') }}"><span class="menu-bullet"><span
                        class="bullet bullet-dot"></span></span><span class="menu-title">Product</span></a>
            <!--end:Menu link-->
        </div>
        <!--end:Menu item-->

        <!--begin:Menu item-->
        <div class="menu-item">
            <!--begin:Menu link--><a class="menu-link {{ Request::is('store*') ? 'active' : '' }}"
                href="{{ route('store.index') }}"><span class="menu-bullet"><span
                        class="bullet bullet-dot"></span></span><span class="menu-title">Store</span></a>
            <!--end:Menu link-->
        </div>
        <!--end:Menu item-->

    </div>
    <!--end:Menu sub-->
</div> --}}

@push('sidebar_item')
    @foreach (config('sidebar.menu') as $item)
        @if (isset($item['permission']))
            @if ($item['permission'] !== 'All')
                @if (auth()->user()->hasAnyPermission($item['permission']))
                    @if (isset($item['header']))
                        <!--begin:Menu item-->
                        <div class="menu-item pt-5">
                            <!--begin:Menu content-->
                            <div class="menu-content"><span
                                    class="menu-heading fw-bold text-uppercase fs-7">{{ $item['header'] }}</span>
                            </div>
                            <!--end:Menu content-->
                        </div>
                        <!--end:Menu item-->
                    @endif

                    @if (isset($item['url']))
                        <!--begin:Menu item-->
                        <div class="menu-item">
                            <!--begin:Menu link-->
                            <a class="menu-link {{ Request::is($item['url'] . '*') ? 'active' : '' }}"
                                href="{{ url($item['url']) }}"><span class="menu-icon"><i class="{{ $item['icon'] }}"><span
                                            class="path1"></span><span class="path2"></span><span
                                            class="path3"></span><span class="path4"></span></i></span><span
                                    class="menu-title">{{ $item['text'] }}
                                </span></a>
                            <!--end:Menu link-->
                        </div>
                        <!--end:Menu item-->
                    @endif

                    @if (isset($item['submenu']))
                        <!--begin:Menu item-->
                        <div data-kt-menu-trigger="click"
                            class="menu-item menu-accordion {{ isset($item['submenu']) &&
                            collect($item['submenu'])->contains(function ($subItem) {
                                return Request::is($subItem['url'] . '*');
                            })
                                ? 'show'
                                : '' }}">
                            <!--begin:Menu link--><span class="menu-link"><span class="menu-icon"><i
                                        class="{{ $item['icon'] }}"><span class="path1"></span><span
                                            class="path2"></span><span class="path3"></span></i></span><span
                                    class="menu-title">{{ $item['text'] }}
                                </span><span class="menu-arrow"></span></span>
                            <!--end:Menu link-->
                            <!--begin:Menu sub-->
                            <div class="menu-sub menu-sub-accordion">
                                @foreach ($item['submenu'] as $subItem)
                                    @if ($subItem['permission'] !== 'All')
                                        @if (auth()->user()->hasAnyPermission($item['permission']))
                                            <!--begin:Menu item-->
                                            <div class="menu-item">
                                                <!--begin:Menu link--><a
                                                    class="menu-link {{ Request::is($subItem['url'] . '*') ? 'active' : '' }}"
                                                    href="{{ url($subItem['url']) }}"><span class="menu-bullet"><span
                                                            class="bullet bullet-dot"></span></span><span
                                                        class="menu-title">{{ $subItem['text'] }}</span></a>
                                                <!--end:Menu link-->
                                            </div>
                                            <!--end:Menu item-->
                                        @endif
                                    @else
                                        <!--begin:Menu item-->
                                        <div class="menu-item">
                                            <!--begin:Menu link--><a
                                                class="menu-link {{ Request::is($subItem['url'] . '*') ? 'active' : '' }}"
                                                href="{{ url($subItem['url']) }}"><span class="menu-bullet"><span
                                                        class="bullet bullet-dot"></span></span><span
                                                    class="menu-title">{{ $subItem['text'] }}</span></a>
                                            <!--end:Menu link-->
                                        </div>
                                        <!--end:Menu item-->
                                    @endif
                                @endforeach
                            </div>
                            <!--end:Menu sub-->
                        </div>
                        <!--end:Menu item-->
                    @endif
                @endif
            @else
                @if (isset($item['header']))
                    <!--begin:Menu item-->
                    <div class="menu-item pt-5">
                        <!--begin:Menu content-->
                        <div class="menu-content"><span
                                class="menu-heading fw-bold text-uppercase fs-7">{{ $item['header'] }}</span>
                        </div>
                        <!--end:Menu content-->
                    </div>
                    <!--end:Menu item-->
                @endif

                @if (isset($item['url']))
                    <!--begin:Menu item-->
                    <div class="menu-item">
                        <!--begin:Menu link-->
                        <a class="menu-link {{ Request::is($item['url'] . '*') ? 'active' : '' }}"
                            href="{{ url($item['url']) }}"><span class="menu-icon"><i class="{{ $item['icon'] }}"><span
                                        class="path1"></span><span class="path2"></span><span class="path3"></span><span
                                        class="path4"></span></i></span><span class="menu-title">{{ $item['text'] }}
                            </span></a>
                        <!--end:Menu link-->
                    </div>
                    <!--end:Menu item-->
                @endif

                @if (isset($item['submenu']))
                    <!--begin:Menu item-->
                    <div data-kt-menu-trigger="click"
                        class="menu-item menu-accordion {{ isset($item['submenu']) &&
                        collect($item['submenu'])->contains(function ($subItem) {
                            return Request::is($subItem['url'] . '*');
                        })
                            ? 'show'
                            : '' }}">
                        <!--begin:Menu link--><span class="menu-link"><span class="menu-icon"><i
                                    class="{{ $item['icon'] }}"><span class="path1"></span><span
                                        class="path2"></span><span class="path3"></span></i></span><span
                                class="menu-title">{{ $item['text'] }}
                            </span><span class="menu-arrow"></span></span>
                        <!--end:Menu link-->
                        <!--begin:Menu sub-->
                        <div class="menu-sub menu-sub-accordion">
                            @foreach ($item['submenu'] as $subItem)
                                @if ($subItem['permission'] !== 'All')
                                    @if (auth()->user()->hasAnyPermission($item['permission']))
                                        <!--begin:Menu item-->
                                        <div class="menu-item">
                                            <!--begin:Menu link--><a
                                                class="menu-link {{ Request::is($subItem['url'] . '*') ? 'active' : '' }}"
                                                href="{{ url($subItem['url']) }}"><span class="menu-bullet"><span
                                                        class="bullet bullet-dot"></span></span><span
                                                    class="menu-title">{{ $subItem['text'] }}</span></a>
                                            <!--end:Menu link-->
                                        </div>
                                        <!--end:Menu item-->
                                    @endif
                                @else
                                    <!--begin:Menu item-->
                                    <div class="menu-item">
                                        <!--begin:Menu link--><a
                                            class="menu-link {{ Request::is($subItem['url'] . '*') ? 'active' : '' }}"
                                            href="{{ url($subItem['url']) }}"><span class="menu-bullet"><span
                                                    class="bullet bullet-dot"></span></span><span
                                                class="menu-title">{{ $subItem['text'] }}</span></a>
                                        <!--end:Menu link-->
                                    </div>
                                    <!--end:Menu item-->
                                @endif
                            @endforeach
                        </div>
                        <!--end:Menu sub-->
                    </div>
                    <!--end:Menu item-->
                @endif
            @endif
        @else
            @if (isset($item['header']))
                <!--begin:Menu item-->
                <div class="menu-item pt-5">
                    <!--begin:Menu content-->
                    <div class="menu-content"><span
                            class="menu-heading fw-bold text-uppercase fs-7">{{ $item['header'] }}</span>
                    </div>
                    <!--end:Menu content-->
                </div>
                <!--end:Menu item-->
            @endif

            @if (isset($item['url']))
                <!--begin:Menu item-->
                <div class="menu-item">
                    <!--begin:Menu link-->
                    <a class="menu-link {{ Request::is($item['url'] . '*') ? 'active' : '' }}"
                        href="{{ url($item['url']) }}"><span class="menu-icon"><i class="{{ $item['icon'] }}"><span
                                    class="path1"></span><span class="path2"></span><span class="path3"></span><span
                                    class="path4"></span></i></span><span class="menu-title">{{ $item['text'] }}
                        </span></a>
                    <!--end:Menu link-->
                </div>
                <!--end:Menu item-->
            @endif

            @if (isset($item['submenu']))
                <!--begin:Menu item-->
                <div data-kt-menu-trigger="click"
                    class="menu-item menu-accordion {{ isset($item['submenu']) &&
                    collect($item['submenu'])->contains(function ($subItem) {
                        return Request::is($subItem['url'] . '*');
                    })
                        ? 'show'
                        : '' }}">
                    <!--begin:Menu link--><span class="menu-link"><span class="menu-icon"><i
                                class="{{ $item['icon'] }}"><span class="path1"></span><span class="path2"></span><span
                                    class="path3"></span></i></span><span class="menu-title">{{ $item['text'] }}
                        </span><span class="menu-arrow"></span></span>
                    <!--end:Menu link-->
                    <!--begin:Menu sub-->
                    <div class="menu-sub menu-sub-accordion">
                        @foreach ($item['submenu'] as $subItem)
                            <!--begin:Menu item-->
                            <div class="menu-item">
                                <!--begin:Menu link--><a
                                    class="menu-link {{ Request::is($subItem['url'] . '*') ? 'active' : '' }}"
                                    href="{{ url($subItem['url']) }}"><span class="menu-bullet"><span
                                            class="bullet bullet-dot"></span></span><span
                                        class="menu-title">{{ $subItem['text'] }}</span></a>
                                <!--end:Menu link-->
                            </div>
                            <!--end:Menu item-->
                        @endforeach
                    </div>
                    <!--end:Menu sub-->
                </div>
                <!--end:Menu item-->
            @endif
        @endif
    @endforeach
@endpush
