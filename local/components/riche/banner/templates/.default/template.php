<?php

use Bitrix\Main\Page\Asset;
use Local\Vue;

Vue::includeComponent(['banner-component']);
?>
<div id="banner">
    <banner-component></banner-component>
</div>
<script>
    new Vue({
        el: '#banner',
        name: 'root',
    })
</script>