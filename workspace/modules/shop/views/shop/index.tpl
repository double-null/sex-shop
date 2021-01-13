{capture name=breadcrumbs}
    <span class="mr-2"><a href="/shop/">Главная</a></span>
    <span>{$category.name}</span>
{/capture}

<section class="ftco-section bg-light">
    <div class="container-fluid">
        <div class="row">
            {foreach $products as $product}
                <div class="col-sm col-md-6 col-lg-3 ftco-animate fadeInUp ftco-animated">
                    <div id="product-{$product.id}" class="product">
                        <a href="/product/{$product.id}/" class="img-prod">
                            {foreach $product.photos as $photo}
                                {if $photo.cover == 1}
                                    <img class="img-fluid" src="/images/{$photo.name}">
                                {/if}
                            {/foreach}
                        </a>
                        <div class="text py-3 px-3">
                            <h3><a href="/product/{$product.id}/">{$product.name}</a></h3>
                            <hr>
                            <p class="bottom-area d-flex">
                                <a data-product="{$product.id}" href="#" class="add-to-cart">
                                    {if in_array($product.id, $selectedProducts)}
                                        <span class="cart-action">
                                            Удалить из корзины
                                        </span>
                                        <span>
                                            <i class="ion-ios-add ml-1"></i>
                                        </span>
                                    {else}
                                        <span class="cart-action">
                                            Добавить в корзину
                                        </span>
                                        <span><i class="ion-ios-add ml-1"></i></span>
                                    {/if}
                                </a>
                            </p>
                        </div>
                    </div>
                </div>
            {/foreach}
        </div>

        <div class="row mt-5">
            <div class="col text-center">
                {workspace\modules\shop\widgets\Pagination::widget()->setParams($page, $totalProducts, '/shop/page=')->run()}
            </div>
        </div>
    </div>
</section>
