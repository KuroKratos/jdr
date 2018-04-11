<input list="items" class="form-control">

<datalist id="items">
    <?php foreach($items as $i) { ?>
        <option value="<?= $i["name"] ?>"><?= $i["category"] ?></option>
    <?php } ?>
</datalist>
