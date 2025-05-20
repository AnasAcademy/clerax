<!-- <div class="product-card">
    <figure>
        <div class="image-box">
            <a href="{{ $product->getUrl() }}" class="image-box__a">
                @php
                    $hasDiscount = $product->getActiveDiscount();
                @endphp

                <div class="badges-lists">
                    @if($product->getAvailability() < 1)
                        <span class="out-of-stock-badge">
                            <span>{{ trans('update.out_of_stock') }}</span>
                        </span>
                    @elseif($hasDiscount)
                        <span class="badge badge-danger">{{ trans('public.offer',['off' => $hasDiscount->percent]) }}</span>
                    @elseif($product->isPhysical() and empty($product->delivery_fee))
                        <span class="badge badge-warning">{{ trans('update.free_shipping') }}</span>
                    @endif

                        @include('web.default.includes.product_custom_badge', ['itemTarget' => $product])
                </div>

                <img src="{{ $product->thumbnail }}" class="img-cover" alt="{{ $product->title }}">
            </a>

        </div>

        <figcaption class="product-card-body">
           

            <a href="{{ $product->getUrl() }}">
                <h3 class="product-title font-weight-bold font-16 text-dark-blue">مبادئ إدارة الأعمال</h3>
            </a>

            <p class="slide-hint text-dark">تعلّم الأساسيات اللي يبنى عليها كل مشروع ناجح.</p>

          

           

            <div class="product-price-box mt-25 text-dark">
                @if(!empty($isRewardProducts) and !empty($product->point))
                    <span class="text-warning real font-14">{{ $product->point }} {{ trans('update.points') }}</span>
                @elseif($product->price > 0)
                    @if($product->getPriceWithActiveDiscountPrice() < $product->price)
                        <span class="real">{{ handlePrice($product->getPriceWithActiveDiscountPrice(), true, true, false, null, true, 'store') }}</span>
                        <span class="off ml-10">{{ handlePrice($product->price, true, true, false, null, true, 'store') }}</span>
                    @else
                        <span class="real">{{ handlePrice($product->price, true, true, false, null, true, 'store') }}</span>
                    @endif
                @else
                    <span class="real">{{ trans('public.free') }}</span>
                @endif
            </div>
            <div class="mt-20 d-flex flex-row justify-content-between align-items-center">
                <a type="submit" class="btn new-btn rounded-pill w-50 p-1" href="/login">
                التسجيل في الدورة
                </a>
                <div class="d-flex flex-row justify-content-center align-items-center gap-1">
                    <span class="text-gray">Google</span>
                    <img src="/assets/default/img/google.png" alt="google" class="" width="20px" height="20px">
                </div>
            </div>
        </figcaption>
    </figure>
</div> -->
