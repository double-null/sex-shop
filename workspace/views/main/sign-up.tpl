{capture name=breadcrumbs}
    <span class="mr-2"><a href="/shop/">Главная</a></span>
    <span>Регистрация</span>
{/capture}

<section class="ftco-section bg-light">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center heading-section ftco-animate">
                <h1 class="big">Регистрация</h1>
                <h2>Регистрация</h2>
                <div class="row d-flex justify-content-center mt-5">
                    <div class="col-md-8">
                        {if !empty($errors)}
                            {foreach from=$errors item=error}
                                <div class="alert alert-danger" role="alert">
                                    {$error}
                                </div>
                            {/foreach}
                        {/if}
                        <form class="form-horizontal" name="create_form" id="create_form" method="post" action="/sign-up">
                            <div class="form-group">
                                <label for="username">Логин:</label>
                                <input type="text" name="username" id="username" class="form-control" required="required" />
                            </div>
                            <div class="form-group">
                                <label for="email">Email:</label>
                                <input type="text" name="email" id="email" class="form-control" required="required" />
                            </div>
                            <div class="form-group">
                                <label for="password">Пароль:</label>
                                <input type="password" name="password" id="password" class="form-control" required="required" />
                            </div>
                            <div class="form-group">
                                <input type="submit" id="submit_button" class="btn btn-primary" value="Зарегестрироваться">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
