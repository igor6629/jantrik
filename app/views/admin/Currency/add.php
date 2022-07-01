<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Добавить валюту</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="<?= ADMIN;?>">Главная</a></li>
                    <li class="breadcrumb-item"><a href="<?= ADMIN;?>/currency">Список валют</a></li>
                    <li class="breadcrumb-item">Новая валюта</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <form action="<?=ADMIN;?>/currency/add" method="post" data-toggle="validator">
                    <div class="box-body">
                        <div class="form-group has-feedback">
                            <label for="title">Наименование валюты*</label>
                            <input type="text" name="title" class="form-control" id="title" placeholder="Гривна" required>
                        </div>
                        <div class="form-group has-feedback">
                            <label for="code">Код валюты*</label>
                            <input type="text" name="code" class="form-control" id="code" placeholder="UAH" required>
                        </div>
                        <div class="form-group">
                            <label for="symbol_left">Символ слева</label>
                            <input type="text" name="symbol_left" class="form-control" id="symbol_left">
                        </div>
                        <div class="form-group">
                            <label for="symbol_right">Символ справа</label>
                            <input type="text" name="symbol_right" class="form-control" id="symbol_right" placeholder="грн.">
                        </div>
                        <div class="form-group has-feedback">
                            <label for="value">Курс*<small>(только цифры с плавающей точкой)</small></label>
                            <input type="text" name="value" class="form-control" id="value" required placeholder="1">
                            <div class="help-block with-errors"></div>
                        </div>
                        <div class="form-group has-feedback">
                            <label for="value"><input type="checkbox" name="base">  Базовая валюта</label>
                        </div>
                    </div>
                    <div class="box-footer">
                        <button type="submit" class="btn btn-success">Добавить</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</section>
<!-- /.content -->