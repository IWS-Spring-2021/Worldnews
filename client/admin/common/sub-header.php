<h3 class="title-5 m-b-3"><?php echo $manage_name?></h3>
<div class="table-data__tool">
    <div class="table-data__tool-left">
        <div class="rs-select2--light rs-select2--md">
            <select class="js-select2" name="property">
                <option selected="selected">Category</option>
                <option value="">Cine</option>
                <option value="">Music</option>
                <option value="">Travel</option>
                <option value="">Lifestyle</option>

            </select>
            <div class="dropDownSelect2"></div>
        </div>
        <!-- <div class="rs-select2--light rs-select2--sm">
            <select class="js-select2" name="time">
                <option selected="selected">Today</option>
                <option value="">3 Days</option>
                <option value="">1 Week</option>
            </select>
            <div class="dropDownSelect2"></div>
        </div>
        <button class="au-btn-filter">
            <i class="zmdi zmdi-filter-list"></i>filters</button> -->
    </div>
    <div class="table-data__tool-right">
        <a href="/worldnews/client/admin/<?php echo $file_controller ?>"><button class="au-btn au-btn-icon au-btn--green au-btn--small">
                <i class="zmdi zmdi-plus"></i><?php echo $btn_add ?></button></a>
        <!-- <div class="rs-select2--dark rs-select2--sm rs-select2--dark2">
            <select class="js-select2" name="type">
                <option selected="selected">Export</option>
                <option value="">Option 1</option>
                <option value="">Option 2</option>
            </select>
            <div class="dropDownSelect2"></div>
        </div> -->
    </div>
</div>