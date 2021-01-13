{assign var="url" value="{'products/'}{$model->id}"}
{core\App::$breadcrumbs->addItem(['text' => $model->name, 'url' => $url])}
<div class="h1">{$model->name}</div>

<table class="table table-striped">
    <thead class="thead-dark">
        <tr>
            <th scope="col">Ключ</th>
            <th scope="col">Значение</th>
        </tr>
    </thead>
    <tbody>
    <tr>
        <td>Id</td>
        <td>{$model->id}</td>
    </tr>
    <tr>
        <td>Категория</td>
        <td>{$model->category->name}</td>
    </tr>
    <tr>
        <td>Артикул</td>
        <td>{$model->mark}</td>
    </tr>
    <tr>
        <td>Название</td>
        <td>{$model->name}</td>
    </tr>
    <tr>
        <td>Описание</td>
        <td>{$model->description}</td>
    </tr>
    <tr>
        <td>Цена</td>
        <td>{$model->price}</td>
    </tr>

    {foreach $model->parameters as $param}
        <tr>
            <td>{$param->parameter->name}</td>
            <td>{$param->value}</td>
        </tr>
    {/foreach}

    <tr>
        <td>Фотографии</td>
        <td>
            <div class="row">
                {foreach $model->photos as $photo}
                    <div class="col-md-2">
                        <img class="img-fluid"  src="/images/{$photo->name}">
                    </div>
                {/foreach}
            </div>
        </td>
    </tr>
    </tbody>
</table>