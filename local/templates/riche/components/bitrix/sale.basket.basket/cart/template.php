<?
    
    if (!defined('B_PROLOG_INCLUDED') or B_PROLOG_INCLUDED !== true) {
        die();
    }
    
    /**
     * @var array                    $arParams
     * @var array                    $arResult
     * @var string                   $templateFolder
     * @var string                   $templateName
     * @var CMain                    $APPLICATION
     * @var CBitrixBasketComponent   $component
     * @var CBitrixComponentTemplate $this
     * @var array                    $giftParameters
     */
    
    use AkBars\Images;
    use AkBars\Template;
    
    $proportion = 1;
    $mode       = BX_RESIZE_IMAGE_PROPORTIONAL;
    
    $this->setFrameMode(true);
    
    $frame = $this->createFrame();

?>

<div class="sale-basket-basket--cart">
    
    <? $frame->begin(); ?>

    <div class="wrap">

        <div class="cart <? if ($arResult['allSum'] == 0) { ?>is-empty<? } ?>">

            <section class="cart--items">
                
                <? foreach ($arResult['ITEMS'] as $group => $list) { ?>
                    
                    <? if (!empty($list)) { ?>

                        <ul class="items <?= strtolower($group); ?>">
                            
                            <? foreach ($list as $arItem) { ?>

                                <li class="item"
                                    data-product-id="<?= $arItem['PRODUCT_ID']; ?>"
                                    data-id="<?= $arItem['ID']; ?>">

                                    <div class="description">

                                        <picture class="image">
                                            
                                            <?
                                                
                                                $image = CFile::resizeImageGet(
                                                    $arItem['DETAIL_PICTURE'],
                                                    Images::calculateImageSize(90, $proportion),
                                                    $mode,
                                                    false,
                                                    [],
                                                    false,
                                                    Images::JPEG_QUALITY
                                                );
                                                
                                                Images::getWebP($image);
                                            
                                            ?>
                                            
                                            <? if ($image['webp_src']) { ?>
                                                <source srcset="<?= $image['webp_src']; ?>"
                                                        type="<?= $image['webp_content_type']; ?>">
                                            <? } ?>

                                            <source srcset="<?= $image['src']; ?>"
                                                    type="<?= $image['content_type']; ?>">

                                            <img alt="<?= $arItem['NAME']; ?>"
                                                 title="<?= $arItem['NAME']; ?>"
                                                 loading="lazy">

                                        </picture>

                                        <div class="details">

                                            <h3><?= $arItem['NAME']; ?></h3>
                                            
                                            <? if (!empty($arItem['PROPS'])) { ?>

                                                <ul class="properties">
                                                    <? foreach ($arItem['PROPS'] as $code => $property) { ?>
                                                        <li class="<?= strtolower($code); ?>"><?= $property['VALUE']; ?></li>
                                                    <? } ?>
                                                </ul>
                                            
                                            <? } ?>

                                        </div>

                                    </div>

                                    <div class="numbers">

                                        <div class="price">

                                            <span class="label">Цена<? if (!empty($arItem['MEASURE_NAME'])) { ?> за <?= $arItem['MEASURE_NAME']; ?><? } ?></span>
                                            <span class="value"><?= $arItem['PRICE_FORMATED']; ?></span>

                                        </div>

                                        <div class="quantity">

                                            <span class="label">Количество</span>
                                            <input type="number"
                                                   value="<?= $arItem['QUANTITY']; ?>"
                                                   class="value"
                                                   min="1">

                                        </div>

                                        <div class="total">

                                            <span class="label">Сумма</span>
                                            <span class="value"><?= $arItem['SUM']; ?></span>

                                        </div>
                                    </div>

                                    <div class="controls">

                                        <button class="delete transparent button">
                                            <i class="icon trashcan"></i>
                                        </button>

                                    </div>

                                </li>
                            
                            <? } ?>

                        </ul>
                    
                    <? } ?>
                
                <? } ?>

            </section>

            <section class="cart--total">

                <div class="total">
                    <p>
                        Итого <span class="count"><?= Template::pluralUnits($arResult['BASKET_ITEMS_COUNT'],
                                                                            'товар'); ?></span>:
                        <span class="value"><?= $arResult['allSum_FORMATED']; ?></span>
                    </p>
                </div>

                <div class="actions">

                    <a href="<?= $arParams['BACK_URL']; ?>" class="button big white wider bold">
                        <i class="icon arrow--left wider left"></i>
                        <span>Продолжить покупки</span>
                    </a>

                    <a href="<?= $arParams['PATH_TO_ORDER']; ?>"
                       class="big button wider pull--right">
                        Оформить заказ
                    </a>

                </div>

            </section>

            <section class="cart--empty">

                <h4>В вашей корзине ничего нет</h4>

                <img src="<?= SITE_TEMPLATE_PATH; ?>/icons/cart--gray.svg" loading="lazy">

                <a href="<?= $arParams['CATALOG_URL']; ?>" class="primary big button bold">
                    <span>Перейти в каталог</span>
                    <i class="icon arrow right"></i>
                </a>

            </section>

        </div>

    </div>
    
    <? $frame->end(); ?>

</div>
