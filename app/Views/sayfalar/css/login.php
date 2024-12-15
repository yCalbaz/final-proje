<div class="container">
    <div class="row">

        <div class="col-lg-4">
            <h1 class="mt-4 text-primary"><i>Giriş</i></h1>
            <?= validation_list_errors() ?>
            <?php
            if(isset($uyari))
            {
                echo '<div class="alert alert-danger" role="alert">';
                echo $uyari;
                echo '</div>';
            }
            ?>
            <form action="<?=base_url('login')?>" method="post">
                <?=csrf_field()?>
                <div class="form-group">
                    <label for="kulad">Kullanıcı Adı</label>
                    <input type="text" class="form-control" id="kulad" name="kulad">
                </div>
                <div class="form-group">
                    <label for="sifre">Şifre:</label>
                    <input type="password" class="form-control" id="sifre" name="sifre">
                </div>

                <input type="submit" name="gonder" class="btn btn-primary" value="Giriş Yap">

            </form>
            <div class='pb-5'></div>
        </div>
    </div>
</div>