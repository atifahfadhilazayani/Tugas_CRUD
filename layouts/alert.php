<div class="bg-slate-100">
    <?php if(isset($_COOKIE['message'])) : ?>
        <div class="p-3 bg-blue-700 m-3 rounded-xl text-white">
            <?= $_COOKIE['message']?>
        </div>
        <?php endif ?>
</div>