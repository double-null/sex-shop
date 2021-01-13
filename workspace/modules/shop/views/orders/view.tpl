{assign var="url" value="{'orders/'}{$model->id}"}
{core\App::$breadcrumbs->addItem(['text' => $model->id, 'url' => $url])}
<div class="h1">{$model->id}</div>

<table class="table table-striped">
    <thead class="thead-dark">
        <tr>
            <th scope="col">Ключ</th>
            <th scope="col">Значение</th>
        </tr>
    </thead>

    <tr>
        <td>ID</td>
        <td>{$model.id}</td>
    </tr>
    <tr>
        <td>Имя</td>
        <td>{$model.name}</td>
    </tr>
    <tr>
        <td>Фамилия</td>
        <td>{$model.surname}</td>
    </tr>
    <tr>
        <td>Адрес доставки</td>
        <td>{$model.delivery_adress}</td>
    </tr>
    <tr>
        <td>Телефон</td>
        <td>{$model.phone}</td>
    </tr>
    <tr>
        <td>E-mail</td>
        <td>{$model.email}</td>
    </tr>
    <tr>
        <td>Комментарий</td>
        <td>{$model.comment}</td>
    </tr>
    <tr>
        <td>Товары</td>
        <td>
            {foreach $products as $product}
                {$product.name} <br>
                {foreach $model.products|json_decode as $selectedProduct}
                    {if $selectedProduct->product == $product.id}
                        Количество {$selectedProduct->quantity}
                    {/if}
                {/foreach}

                <br>
            {/foreach}
        </td>
    </tr>
</table>