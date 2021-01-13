{assign var="url" value="{'orders/'}{$model->id}"}
{core\App::$breadcrumbs->addItem(['text' => $model->id, 'url' => {$url}])}
{core\App::$breadcrumbs->addItem(['text' => 'Edit'])}
<div class="h1">{$h1} {$model->id}</div>

<div class="container">
    <form class="form-horizontal" name="edit_form" id="edit_form" method="post" action="/admin/orders/update/{$model->id}">
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" name="name" id="name" class="form-control" value="{$model->name}" required="required" />
        </div>

        <div class="form-group">
            <label for="surname">Surname:</label>
            <input type="text" name="surname" id="surname" class="form-control" value="{$model->surname}" required="required" />
        </div>

        <div class="form-group">
            <label for="delivery_address">Delivery_address:</label>
            <input type="text" name="delivery_address" id="delivery_address" class="form-control" value="{$model->delivery_address}" required="required" />
        </div>

        <div class="form-group">
            <label for="phone">Phone:</label>
            <input type="text" name="phone" id="phone" class="form-control" value="{$model->phone}" required="required" />
        </div>

        <div class="form-group">
            <label for="email">Email:</label>
            <input type="text" name="email" id="email" class="form-control" value="{$model->email}" required="required" />
        </div>

        <div class="form-group">
            <label for="comment">Comment:</label>
            <input type="text" name="comment" id="comment" class="form-control" value="{$model->comment}" required="required" />
        </div>

        <div class="form-group">
            <label for="products">Products:</label>
            <input type="text" name="products" id="products" class="form-control" value="{$model->products}" required="required" />
        </div>

        <div class="form-group">
            <label for="status">Status:</label>
            <input type="text" name="status" id="status" class="form-control" value="{$model->status}" required="required" />
        </div>


        <div class="form-group">
            <input type="submit" name="submit" id="submit_button" class="btn btn-dark" value="Submit">
        </div>
    </form>
</div>