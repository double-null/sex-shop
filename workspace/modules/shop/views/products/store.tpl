{core\App::$breadcrumbs->addItem(['text' => 'Добавить'])}
<div class="h1">Добавление товара</div>

<div class="container">
    <form class="form-horizontal" name="create_form" id="create_form" method="post" enctype="multipart/form-data">

        <h5 class="mt-5">Основная информация:</h5>

        <div class="form-group">
            <label for="category_id">Категория:</label>
            <select class="form-control" name="category_id" required="required">
                <option>Выберите категорию</option>
                {foreach $categories as $category}
                    <option value="{$category.id}">{$category.name}</option>
                {/foreach}
            </select>
        </div>

        <div class="form-group">
            <label for="mark">Артикул:</label>
            <input type="text" name="mark" id="mark" class="form-control"  required="required" />
        </div>

        <div class="form-group">
            <label for="name">Название товара:</label>
            <input type="text" name="name" id="name" class="form-control"  required="required" />
        </div>

        <div class="form-group">
            <label for="description">Описание:</label>
            <input type="text" name="description" id="description" class="form-control"  required="required" />
        </div>

        <div class="form-group">
            <label for="price">Цена:</label>
            <input type="text" name="price" id="price" class="form-control"  required="required" />
        </div>

        <h5 class="mt-5">Фото товара:</h5>

        <input class="add-photo form-control" type="file" name="photos[]" multiple />


        <div id="product-photos-list" class="row mt-3"></div>

        <h5 class="mt-5">Характеристики товара</h5>

        <div id="product-params-list" class="mt-3"></div>

        <div class="form-group">
            <a href="#" class="add-param" style="float: right;">Добавить характеристику</a>
        </div>

        <div class="form-group">
            <input type="submit" name="submit" id="submit_button" class="btn btn-dark" value="Submit">
        </div>
    </form>
</div>