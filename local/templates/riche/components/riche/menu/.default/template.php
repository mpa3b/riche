<?
/**
 * Bitrix vars
 *
 * @var CBitrixComponentTemplate $this
 * @var CBitrixComponent         $component
 *
 * @var array                    $arParams
 * @var array                    $arResult
 *
 * @var string                   $templateName
 * @var string                   $templateFile
 * @var string                   $templateFolder
 * @var array                    $templateData
 *
 * @var string                   $componentPath
 * @var string                   $parentTemplateFolder
 *
 * @var CDatabase                $DB
 * @var CUser                    $USER
 * @var CMain                    $APPLICATION
 */

//TODO: MOCK DATA
$arResult['ITEMS'] = [];
for ($i = 0; $i < 12; $i++) {
    $arResult['ITEMS'][] = [
        'id'             => 17713,
        'name'           => 'Эффективное масло для профилактики растяжек Mama Oil',
        'price'          => 933.00,
        'discount_price' => 700.00,
        'images'         => [
            'mobile'  => "https://via.placeholder.com/400x60",
            'desktop' => "https://via.placeholder.com/600x60"
        ],
        'link'           => "/catalog/telo/krem-i-balzam-dlya-ruk/effektivnoe-maslo-ot-rastyazhek-mama-oil/"
    ];
}

$arResult['ITEMS'][0]['images']['mobile']  = 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAZAAAAJYBAMAAAC+wq27AAAAG1BMVEXMzMyWlpacnJyqqqrFxcWxsbGjo6O3t7e+vr6He3KoAAAACXBIWXMAAA7EAAAOxAGVKw4bAAAFRUlEQVR4nO3ZS2/bOBSGYVKWL0tTbp0srV4mWcadFuhSTjKdWdrGoGt7ECBdOp1B1nEL9HcPD0lJTOpcFi3oAu8DRPocOQCPJF6kKAUAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAwI81eFO8v5t26f5T/O3T1/Llzd2UUs+43cIYM7+TdshLe/RGUteG5+p2SurKFSKN8a1p0y6ncvRQktTrC25TSrlxhWylMe5Ut2mXtRwsbBiYuqQ2JdXxhZTmbT41k1tph74p/vtrbTZKZWZUnbmS2pTU1hUykJupK6e1TbtkZiW9aiV/N5eb6iZOSZWukI60Ta1HcdplW1RyNz5TajpWUtJJnFLqmoUUon33KOK0y9SNAmt7vUL3mMQppVmhpRDfcG2qKO1SPpPt8qhuuL02bUpqfegKuXK3Us/24jYJO6ZVdleGC5S7+070/a20PohSSrYVrpBpmELmUXIWEvrmoP56PV10whTyPEopnZrKFeLPp5zcNjmZ3DJZ3QG6zdgULpm9fm1KaXqgXCGlG24H9s5pk9M3o2hs7Zjqj/VY1lqZ/9V2HKWEpKPeKmQSJW9tqtzUjeyZgay1Nm0hRZQSkkb4QtyYk0shTfK25qTbjEhZ4dZaB/KXlfxiVkQpocVI+UJMaP4wSl7HHM6ayS4r1mElFsbnmYlSOm6K9oX4dkshTaq/M542k4o25qj6s7QdSJvwiyil4wacR66ILNKbkVUbvxw53LMr4kaaR/qI7QNt1q7M3Fa2X33EjVCPjFp2AA6zvPuun/zGezZqmWD8UCED0667djV/vwqp5/NVlIKeaVfoWdMf6vl8HKV02kLqFdZJlIKr6DG214xQ9QprFKV02kLuW/1a5biZ2GWJIjvbsfdt9atCZ6+fQm6i5Nmn3kVTVb+5jeqnkMMoJaajJ0QTJ+/UrGZNz8/92Z+OmufCYZzS0g8/s9uVb7edEd2Ylstia9+e2UMh975FcSvfshmAF/LyoSdXaO/eooRF0n3vtToyl181D4Yz81rWWvM9fK8VCrnvTeNWbpmsWce796n7+aYxFNJp3vi2SazlrhqYUfvZeiVp2rzxbVNS+qG38X1fwjp6VrfTTiVp797GB0/9/8i38rcwq+zb/0cAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA/Cp0+Pnl/WKFmOLtPUfuFDK0n7QxRhVKZUP5aJ2Vl0p9MBdKT5Qqf25LHzHMf7/nyI5C3HZ8o65DIfnr6qvdnC8r/Un11z+/tQ8YqlP15qXKqr4N3RcnSi+Hsuu8WNijevlS9Tb2SFTIwUpdhkI6c7/pnuhr1btKWYcU0r34MO9sZupf9fH8ndIXbvfxXE6wtocGE/UuLmR4PJiEQrLKb/KJzm6+pO1Q9tbKqnwyOFlu3qtX9tzryu1eqZk9qu0hdWl/bGeS/uEKue5tQiG63gx1f3WZthDb2d2JnhyvJtJYaZfshnUfGaovnY2Kr0j2WX1/RdTRJPEVkZbIaV99WtnL4Foru+iKZMvwxVBI97n6vo+oxTx5IdJH1HLzea6uqzNprezaPqL6B+GLoRD3wW2jUUulnnSkQXbUUttqVql+eSzNkV07aqn+JHwxLsTffmemnkdU6kKeoLdJ3YIf5HPqBvwg+jh1CwAAT/A/xKPO9PPCMc4AAAAASUVORK5CYII=';
$arResult['ITEMS'][0]['images']['desktop'] = 'data:image/png;base64,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';
foreach ($arResult['ITEMS'] as $key => &$arItem) {
    if ($key !== 0) {
        $arItem['images']['mobile']  .= $key;
        $arItem['images']['desktop'] .= $key;
    }
}
$arItem = $arResult['ITEMS'][0];
unset($arResult['ITEMS'][0]);
?>
<div id="catalog-items" data-items='<?= json_encode($arResult['ITEMS']) ?>'>

    <article class="item">
                <div class="data">
                    <a class="image" href="<?= $arItem['link'] ?>">
                        <picture>
                            <source media="(max-width: 568px)"
                                    srcset="<?= $arItem['images']['mobile'] ?>">
                            <source media="(min-width: 568px)"
                                    srcset="<?= $arItem['images']['desktop'] ?>">
                            <img class="lazy" src="/res/spacer.gif">
                        </picture>
                    </a>
                    <div class="caption">
                        <div class="title-wrapper">
                            <h3 class="title">
                                <?= $arItem['name'] ?>
                            </h3>
                        </div>
                    </div>
                </div>
                <div class="actions">
                    <noindex>
                        <div class="product-card__price">
                            <span class="product-card__price-value-old"><?= $arItem['price'] ?> руб.</span>
                            <span class="product-card__price-value-base"><?= $arItem['discount_price'] ?> руб.</span>
                        </div>
                        <div class="action-list">
                            <a href="#" class="add btn" rel="nofollow">
                                В корзину
                            </a>
                        </div>
                    </noindex>
                </div>
            </article>
</div>
<script type="text/template" id="catalog-items--template">

    <% _.each(items,function(item,key,list){ %>
    <article class="item">
        <div class="data">
            <a class="image" href="<%- item.link %>">
                <picture>
                    <source media="(max-width: 568px)"
                            srcset="<%- item.images.mobile %>">
                    <source media="(min-width: 568px)"
                            srcset="<%- item.images.desktop %>">
                    <img class="lazy" src="/res/spacer.gif">
                </picture>
            </a>
            <div class="caption">
                <div class="title-wrapper">
                    <h3 class="title">
                        <%- item.name %>
                    </h3>
                </div>
            </div>
        </div>
        <div class="actions">
            <noindex>
                <div class="product-card__price">
                    <span class="product-card__price-value-old"><%- item.price %> руб.</span>
                    <span class="product-card__price-value-base"><%- item.discount_price %> руб.</span>
                </div>
                <div class="action-list">
                    <a href="#" class="add btn" rel="nofollow">
                        В корзину
                    </a>
                </div>
            </noindex>
        </div>
    </article>
    <% }); %>

</script>