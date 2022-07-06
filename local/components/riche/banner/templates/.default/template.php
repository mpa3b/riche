<?php

use Bitrix\Main\Page\Asset;

Asset::getInstance()->addJs("//cdn.jsdelivr.net/npm/vue@2/dist/vue.js");
?>
<div id="banner">
    {{ banners }}
</div>