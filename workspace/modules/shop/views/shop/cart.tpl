{capture name=breadcrumbs}
    <span class="mr-2"><a href="/shop/">Главная</a></span>
    <span>Корзина</span>
{/capture}

<section class="ftco-section ftco-cart">
    <div class="container">
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
                                            <input type="text" name="quantity" class="quantity form-control input-number"
                                                   value="{$selectedProduct.quantity}" min="1" max="100">
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
                <p class="text-center"><a href="/shop/checkout" class="btn btn-primary py-3 px-4">Оформить заказ</a></p>
            </div>
        </div>
    </div>
</section>