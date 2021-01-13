{core\App::$breadcrumbs->addItem(['text' => 'Create'])}
{*<div class="h1">{$h1}</div>*}

<div class="container">
    <form class="form-horizontal" name="create_form" id="create_form" method="post" action="/admin/parameters/create">
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" name="name" id="name" class="form-control"  required="required" />
        </div>

        <div class="form-group">
            <label for="type">Type:</label>
            <input type="text" name="type" id="type" class="form-control"  required="required" />
        </div>

        <div class="form-group">
            <label for="unit">Unit:</label>
            <input type="text" name="unit" id="unit" class="form-control"  required="required" />
        </div>


        <div class="form-group">
            <input type="submit" name="submit" id="submit_button" class="btn btn-dark" value="Submit">
        </div>
    </form>
</div>