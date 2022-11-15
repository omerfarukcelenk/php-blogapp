<?php echo  $this->extend('frontend/layouts/main'); ?>
<?= $this->section('style'); ?>
<style>
    body {
        text-align: center;
    }
</style>
<?= $this->endsection(); ?>
<?= $this->section('artical');?>
<table id="uyeler" class="table table-striped">
    <thead class="table-success">
        <tr>
            <th scope="col">Ad Soyad</th>
            <th scope="col">Meslek</th>
            <th scope="col">Yaş</th>
        </tr>
    </thead>
    <tbody>
        <?php echo view_cell('App\Libraries\ViewComponent::getUserView', ['type' => $type]); ?>
    </tbody>
</table>

<?= $this->endsection();?>
