{capture name=breadcrumbs}
    <span class="mr-2"><a href="/shop/">Главная</a></span>
    <span>Оформить заказ</span>
{/capture}

<section class="ftco-section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-8 ftco-animate">
                {if !empty($success)}
                    <div class="alert alert-success" role="alert">Заказ оформлен успешно</div>
                {/if}
                {if !empty($errors)}
                    {foreach from=$errors item=error}
                        <div class="alert alert-danger" role="alert">
                            {$error}
                        </div>
                    {/foreach}
                {/if}
                <form method="POST" class="billing-form bg-light p-3 p-md-5">
                    <h3 class="mb-4 billing-heading">Детали заказа</h3>
                    <div class="row align-items-end">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="firstname">Ваше имя</label>
                                <input type="text" class="form-control" name="name" placeholder="">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="lastname">Фамилия</label>
                                <input type="text" class="form-control" name="surname" placeholder="">
                            </div>
                        </div>
                        <div class="w-100"></div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="streetaddress">Адрес доставки</label>
                                <input type="text" class="form-control" name="delivery_address" placeholder="">
                            </div>
                        </div>
                        <div class="w-100"></div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="phone">Телефон</label>
                                <input type="text" class="form-control" name="phone" placeholder="">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="emailaddress">Email</label>
                                <input type="text" class="form-control" name="email" placeholder="">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="emailaddress">Комментрарий</label>
                                <input type="text" class="form-control" name="comment" placeholder="">
                            </div>
                        </div>
                        <p><input type="submit" class="btn btn-primary py-3 px-4" value="Заказать"></p>
                    </div>
                </form><!-- END -->
            </div> <!-- .col-md-8 -->
        </div>
    </div>
</section>