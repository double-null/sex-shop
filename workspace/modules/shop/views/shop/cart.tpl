{capture name=breadcrumbs}
    <span class="mr-2"><a href="/shop/">Главная</a></span>
    <span>Корзина</span>
{/capture}

{capture name="js_body"}
    <script src="/resources/js/single_product.js"></script>
{/capture}

<section class="ftco-section ftco-cart">
    <div class="container">
        <form method="POST">
            <div class="row">
                <div class="col-md-12 ftco-animate">
                    <div class="cart-list">
                        <table class="table">
                            <thead class="thead-primary">
                            <tr class="text-center">
                                <th>&nbsp;</th>
                                <th>Фото товара</th>
                                <th>Название</th>
                                <th>Цена</th>
                                <th>Количество</th>
                                <th>Сумма</th>
                            </tr>
                            </thead>
                            <tbody>
                            {foreach $products as $product}
                                <tr class="product-item text-center">
                                    <td class="product-remove">
                                        <a href="#" class="remove-from-cart" data-product="{$product.id}">
                                            <span class="ion-ios-close"></span>
                                        </a>
                                    </td>

                                    <td class="image-prod">
                                        {foreach $product.photos as $photo}
                                            {if $photo.cover == 1}
                                                <div class="img" style="background-image:url(/images/{$photo.name});"></div>
                                            {/if}
                                        {/foreach}
                                    </td>

                                    <td class="product-name">
                                        <h3>{$product.name}</h3>
                                    </td>

                                    <td class="price">{$product.price}</td>
                                    {foreach $selectedProducts as $selectedProduct}
                                    {if $selectedProduct.product == $product.id}
                                        <td class="quantity">
                                            <div class="input-group mb-3">
                                                <span class="input-group-btn mr-2">
                                                    <button type="button" class="quantity-left-minus btn"
                                                            data-type="minus" data-field="#quantity_{$product.id}">
                                                        <i class="ion-ios-remove"></i>
                                                    </button>
                                                </span>
                                                <input id="quantity_{$product.id}" type="text"
                                                       name="products[{$product.id}]"
                                                       class="quantity form-control input-number"
                                                       value="{$selectedProduct.quantity}" min="1" max="100">
                                                <span class="input-group-btn ml-2">
                                                    <button type="button" class="quantity-right-plus btn"
                                                            data-type="plus" data-field="#quantity_{$product.id}">
                                                         <i class="ion-ios-add"></i>
                                                     </button>
                                                </span>
                                            </div>
                                        </td>
                                        <td class="total">{$product.price * $selectedProduct.quantity}</td>
                                    {/if}
                                    {/foreach}
                                </tr>
                            {/foreach}
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row justify-content-end">
                <div class="col col-lg-5 col-md-6 mt-5 cart-wrap ftco-animate">
                    <p class="text-center">
                        <input type="submit" value="Оформить заказ" href="/shop/checkout" class="btn btn-primary py-3 px-4">
                    </p>
                </div>
            </div>
        </form>
    </div>
</section>