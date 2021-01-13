{core\App::$breadcrumbs->addItem(['text' => 'Create'])}
{*<div class="h1">{$h1}</div>*}

<div class="container">
    <form class="form-horizontal" name="create_form" id="create_form" method="post" action="/admin/orders/create">
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" name="name" id="name" class="form-control"  required="required" />
        </div>

        <div class="form-group">
            <label for="surname">Surname:</label>
            <input type="text" name="surname" id="surname" class="form-control"  required="required" />
        </div>

        <div class="form-group">
            <label for="delivery_address">Delivery_address:</label>
            <input type="text" name="delivery_address" id="delivery_address" class="form-control"  required="required" />
        </div>

        <div class="form-group">
            <label for="phone">Phone:</label>
            <input type="text" name="phone" id="phone" class="form-control"  required="required" />
        </div>

        <div class="form-group">
            <label for="email">Email:</label>
            <input type="text" name="email" id="email" class="form-control"  required="required" />
        </div>

        <div class="form-group">
            <label for="comment">Comment:</label>
            <input type="text" name="comment" id="comment" class="form-control"  required="required" />
        </div>

        <div class="form-group">
            <label for="products">Products:</label>
            <input type="text" name="products" id="products" class="form-control"  required="required" />
        </div>

        <div class="form-group">
            <label for="status">Status:</label>
            <input type="text" name="status" id="status" class="form-control"  required="required" />
        </div>


        <div class="form-group">
            <input type="submit" name="submit" id="submit_button" class="btn btn-dark" value="Submit">
        </div>
    </form>
</div>