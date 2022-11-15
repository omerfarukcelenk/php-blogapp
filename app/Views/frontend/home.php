<?php echo  $this->extend('frontend/layouts/main'); ?>
<?= $this->section('style'); ?>
<style>
    body {
        text-align: center;
    }
</style>
<?= $this->endsection(); ?>
<?= $this->section('artical');?>
<main class="container">
    <div class="p-4 p-md-5 mb-4 text-white rounded bg-dark">
        <div class="col-md-6 px-0">
            <h1 class="display-4 fst-italic"><?=lang('Home.post.title')?> <?php echo $baslik;  ?></h1>
            <p class="lead my-3"><?php echo $icerik ?></p>
            <p class="rounded mb-0"><?= lang('Home.author')?> <a href="#" class="text-white lead fw-bold"> <?php echo $yazar ?></a></p>

            <br>
            <p class="lead my-3"><?=lang('Home.time') ?>  <?php echo  $zaman ?></p>

        </div>
    </div>



</main>

<?= $this->endsection();?>

<?= $this->section("contact");?>
    <h1 class="display-4"><?php echo lang('Home.contact')?></h1>
    <p class="lead my-3 fst-italic">Merhaba Bana ve youtube ve linkedin üzerinden ulaşabilirsiniz</p>
<?= $this->endsection();?>
<?= $this->section("about");?>
    <h1 class="display-4 "><?php echo lang('Home.about')?> </h1>
    <p class="lead my-3 fst-italic">Contrary to popular belief, Lorem Ipsum is not simply random text</p>
<?= $this->endsection();?>