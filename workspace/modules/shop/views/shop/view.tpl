{capture name=breadcrumbs}
    <span class="mr-2"><a href="/shop/">Главная</a></span>
    <span class="mr-2"><a href="/category/{$product.category.id}">{$product.category.name}</a></span>
    <span>{$product.name}</span>
{/capture}

{capture name="js_body"}
    <script src="/resources/js/single_product.js"></script>
{/capture}

<section class="ftco-section bg-light">
    <div class="container">
        <div id="product-{$product.id}" class="row">
            <div class="col-lg-6 mb-5 ftco-animate fadeInUp ftco-animated">
                <div>
                {foreach $product.photos as $photo}
                    {if $photo.cover == 1}
                        <a href="/images/{$photo.name}" class="image-popup">
                            <img src="/images/{$photo.name}" class="img-fluid">
                        </a>
                    {/if}
                {/foreach}
                </div>
                <div class="product-slider owl-carousel ftco-animate mt-5">
                    {foreach $product.photos as $photo}
                        <div class="item">
                            <div class="product">
                                <a href="/images/{$photo.name}" class="image-popup">
                                    <img class="img-fluid" src="/images/{$photo.name}">
                                </a>
                            </div>
                        </div>
                    {/foreach}
                </div>
            </div>

            <div class="col-lg-6 product-details pl-md-5 ftco-animate fadeInUp ftco-animated">
                <h3>{$product.name}</h3>
                <p class="price"><span>{$product.price}$</span></p>
                <div class="description">
                    {$product.description}
                </div>
                <div class="row mt-4">
                    <div class="w-100"></div>
                    <div class="input-group col-md-6 d-flex mb-3">
                        <span class="input-group-btn mr-2">
                            <button type="button" class="quantity-left-minus btn" data-type="minus" data-field="#quantity">
                                <i class="ion-ios-remove"></i>
                            </button>
                        </span>
                        <input type="text" id="quantity" name="quantity" class="form-control input-number" value="1" min="1" max="100">
                        <span class="input-group-btn ml-2">
                            <button type="button" class="quantity-right-plus btn" data-type="plus" data-field="#quantity">
                                 <i class="ion-ios-add"></i>
                             </button>
                        </span>
                    </div>
                </div>
                <p><a data-product="{$product.id}" href="#"
                      class="add-to-cart btn btn-primary py-3 px-5">
                        {if in_array($product.id, array_column($selectedProducts,'product'))}
                        <span class="cart-action">Удалить из корзины</span>
                    {else}
                        <span class="cart-action">Добавить в корзину</span>
                    {/if}
                </a></p>
            </div>
        </div>
    </div>
</section>