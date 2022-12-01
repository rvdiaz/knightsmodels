<?php
add_shortcode( 'modal-search', 'modal_search' );

function modal_search(){
    ?>
    <div class="modal-container">
        <label class="input-search-container">
            <span class="search-icon" id="submit-search"><img src="<?php echo wp_get_upload_dir()["baseurl"]?>/2022/11/search.png" alt="<?php _e('search', 'knightsmodels');?>"></span>
            <input type="text" name="Buscar en Knights Model" id="search-input" placeholder="Buscar en Knights Model">
        </label>
        <div class="product-search-results-container">
            <?php echo do_shortcode( '[products columns="3" limit="6"]' );?>
        </div>
    </div>

    <?php
}