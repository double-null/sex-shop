{assign var="url" value="{'products/'}{$model->id}"}
{core\App::$breadcrumbs->addItem(['text' => $model->name, 'url' => {$url}])}
{core\App::$breadcrumbs->addItem(['text' => 'Редактирование'])}
<div class="h1">Редактирование товара "{$model->name}"</div>

<div class="container">
    <form class="form-horizontal" name="edit_form" id="edit_form" method="post"
          action="/admin/products/update/{$model->id}" enctype="multipart/form-data">
        <h5 class="mt-5">Основная информация:</h5>
        <div class="form-group">
            <label for="category_id">Категория:</label>
            <select name="category_id" class="form-control">
                {foreach $categories as $category}
                    <option value="{$category.id}" {if ($category.id == $model->category->id)}selected{/if}>
                        {$category.name}
                    </option>
                {/foreach}
            </select>
        </div>

        <div class="form-group">
            <label for="mark">Артикул:</label>
            <input type="text" name="mark" id="mark" class="form-control" value="{$model->mark}" required="required" />
        </div>

        <div class="form-group">
            <label for="name">Название:</label>
            <input type="text" name="name" id="name" class="form-control" value="{$model->name}" required="required" />
        </div>

        <div class="form-group">
            <label for="description">Описание:</label>
            <textarea type="text" name="description" id="description" class="form-control" required="required" rows="12">{$model->description|htmlspecialchars}</textarea>
        </div>

        <div class="form-group">
            <label for="price">Цена:</label>
            <input type="text" name="price" id="price" class="form-control" value="{$model->price}" required="required" />
        </div>

        <h5 class="mt-5">Фото товара:</h5>

        <input class="add-photo" type="file" name="photo" class="form-control" />
        <input class="add-photo" type="file" name="photo"  class="form-control" />
        <input class="add-photo" type="file" name="photo"  class="form-control" />
        <button class="load-photo" id="photo" class="form-control" data-id="{$model->id}">Загрузить</button>

        <div id="product-photos-list" class="row mt-3">
            {foreach $model->photos as $photo}
                <div class="col-md-2">
                    <img class="img-fluid"  src="/images/{$photo->name}">
                    <a class="custom-link delete-photo" data-id="{$photo->id}" data-product="{$model->id}" href="#">
                        <i class="nav-icon fas fa-trash"></i>
                    </a>
                </div>
            {/foreach}
        </div>

        <h5 class="mt-5">Характеристики товара</h5>

        <div id="product-params-list" class="mt-3">
            {foreach $model->parameters as $param}
                <div class="form-group row param-item">
                    <div class="col-md-11">
                        <label for="price">{$param->parameter->name}:</label>
                        <input type="text" id="photo" class="form-control" name="Params[{$param->id}]"
                               value="{$param->value}" />
                    </div>
                    <div class="col-md-1">
                        <a class="custom-link delete-param" data-id="{$param->parameter->id}" data-product="{$model->id}"
                           data-fake="0" href="#">
                            <i class="nav-icon fas fa-trash"></i>
                        </a>
                    </div>
                </div>
            {/foreach}
        </div>

        <div class="form-group">
            <a href="#" class="add-param" data-product="{$model->id}" style="float: right;">Добавить характеристику</a>
        </div>

        <div class="form-group">
            <input type="submit" name="submit" id="submit_button" class="btn btn-dark" value="Редактировать">
        </div>
    </form>
</div>