<div id="small-dialog3" class="mfp-hide">
    <div class="select-city">
        <h3>Escolha uma localização ou use a sua <span class="local" city="<?php echo $location->city ?? "funchal"; ?>">localização</span></h3>
        <select class="list_of_cities">
            <option selected style="display:none;">Select City</option>
            <?php foreach ($locations as $locationItem): ?>
                <optgroup label="<?php echo $locationItem['county']; ?>">
                    <?php foreach ($locationItem['cities'] as $city): ?>
                        <option value="<?php echo $city?>"><?php echo $city?></option>
                    <?php endforeach;?>
                </optgroup>
            <?php endforeach; ?>
        </select>
        <div class="clearfix"></div>
    </div>
    <div class="stores">
    </div>
</div>