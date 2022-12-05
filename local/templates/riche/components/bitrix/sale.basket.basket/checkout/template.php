<?
    
    if (!defined('B_PROLOG_INCLUDED') or B_PROLOG_INCLUDED !== true) {
        die();
    }
    
    use AkBars\Images;
    use AkBars\Template;
    
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
    
    $this->addExternalJs(Template::ASSETS . '/inputmask/dist/jquery.inputmask.js');
    
    $this->setFrameMode(true);
    
    $frame = $this->createFrame();
    $items = $this->createFrame();

?>

<div class="sale-basket-basket--order">

    <div class="wrap">

        <form action="/ajax/order.php" method="post" data-success="<?= $arParams['SUCCESS_URL']; ?>">

            <input type="hidden" name="PERSON_TYPE" value="1">

            <div class="row">

                <div class="sale-basket-basket--order--form half">
                    
                    <? $frame->begin(); ?>

                    <div class="column">

                        <section class="sale-basket-basket--order--form--personal">

                            <header>
                                <span class="number">01</span>
                                <h2>Заполните информацию о себе</h2>
                            </header>
                            
                            <? $personTypeDefault = false; ?>
                            
                            <? if (count($arResult['PERSONS']) > 1) { ?>

                                <div class="radios type required">
                                    
                                    <? foreach ($arResult['PERSONS'] as $arPerson) { ?>

                                        <div class="radio-wrapper">

                                            <input id="PERSON_TYPE<?= $arPerson['ID']; ?>"
                                                   data-code="<?= strtolower($arPerson['CODE']); ?>"
                                                   type="radio" name="PERSON_TYPE"
                                                   <? if ($arPerson['ACTIVE'] !== "Y") { ?>disabled<? } ?>
                                                   <? if (!$personTypeDefault) { ?>checked<? } ?>
                                                   value="<?= $arPerson['ID']; ?>" hidden>

                                            <label for="PERSON_TYPE<?= $arPerson['ID']; ?>"
                                                   <? if ($arPerson['ACTIVE'] !== "Y") { ?>disabled<? } ?>><?= $arPerson['NAME']; ?></label>

                                        </div>
                                        
                                        <? if (!$personTypeDefault) {
                                            $personTypeDefault = $arPerson['ID'];
                                        } ?>
                                    
                                    <? } ?>

                                </div>
                            
                            <? } else { ?>
                                
                                <? foreach ($arResult['PERSONS'] as $arPerson) { ?>

                                    <input id="PERSON_TYPE<?= $arPerson['ID']; ?>"
                                           type="hidden" name="PERSON_TYPE"
                                           readonly checked
                                           value="<?= $arPerson['ID']; ?>" hidden>
                                    
                                    <? if (!$personTypeDefault) {
                                        $personTypeDefault = $arPerson['ID'];
                                    } ?>
                                
                                <? } ?>
                            
                            <? } ?>

                            <div class="fields">
                                
                                <? foreach ($arResult['ORDER_PROPERTIES'] as $arProperty) { ?>
                                    
                                    <? if ($arProperty['CODE'] !== $arParams['STOCK_PROPERTY'] && in_array($arProperty['PERSON_TYPE_ID'], $arResult['PERSON_TYPES'])) { ?>

                                        <div class="field <?= strtolower($arProperty['CODE']); ?> <? if ($arProperty['REQUIRED'] == "Y") { ?> required<? } ?> <? if ($arProperty['PERSON_TYPE_ID'] != $personTypeDefault) { ?>hidden<? } ?>"
                                             data-person="<?= $arProperty['PERSON_TYPE_ID']; ?>">
                                            
                                            <? switch ($arProperty['TYPE']) {
                                                
                                                case 'ENUM' :
                                                    
                                                    ?>
                                                    <div class="select-wrapper">

                                                        <select name="<?= $arProperty['CODE']; ?>">
                                                            <option value hidden></option>
                                                            <? foreach ($arProperty['OPTIONS'] as $arOption) { ?>
                                                                <option value="<?= $arOption['VALUE'] ?>"><?= $arOption['NAME']; ?></option>
                                                            <? } ?>
                                                        </select>

                                                        <div class="controls">
                                                            <button class="transparent button clear">
                                                                <i class="icon delete only"></i>
                                                            </button>
                                                        </div>

                                                    </div>
                                                    <?
                                                    
                                                    break;
                                                
                                                default :
                                                    
                                                    ?>
                                                    <input name="<?= $arProperty['CODE']; ?>"
                                                        <? if (!empty($arResult['USER']) && !empty($arResult['USER'][$arProperty['CODE']])) { ?>
                                                            value="<?= $arResult['USER'][$arProperty['CODE']]; ?>"
                                                        <? } ?>
                                                           placeholder="<?= $arProperty['DEFAULT_VALUE']; ?>">
                                                    <?
                                                    
                                                    break;
                                                
                                            } ?>
                                            
                                            <? if ($arProperty['REQUIRED'] == "Y") { ?>
                                                <span class="error--message">Заполните поле</span>
                                            <? } ?>

                                            <span class="invalid--message">Поле заполнено неверно</span>

                                        </div>
                                    
                                    <? } ?>
                                
                                <? } ?>

                            </div>

                        </section>

                        <section class="sale-basket-basket--order--form--delivery">

                            <header>
                                <span class="number">02</span>
                                <h2>Способ доставки</h2>
                            </header>

                            <div class="radios required field delivery"
                                 data-pickup="<?= $arParams['PICKUP_DELIVERY']; ?>">
                                
                                <? foreach ($arResult['DELIVERY'] as $i => $arDelivery) { ?>

                                    <div class="radio-wrapper">

                                        <input id="DELIVERY<?= $arDelivery['ID']; ?>"
                                               data-code="<?= $arDelivery['XML_ID']; ?>"
                                               type="radio" name="DELIVERY"
                                               <? if ($i == 0) { ?>checked<? } ?>
                                               <? if ($arDelivery['ACTIVE'] !== "Y") { ?>disabled<? } ?>
                                               hidden value="<?= $arDelivery['ID']; ?>">

                                        <label for="DELIVERY<?= $arDelivery['ID']; ?>"
                                               <? if ($arDelivery['ACTIVE'] !==
                                                      "Y") { ?>disabled<? } ?>><?= $arDelivery['NAME']; ?></label>

                                    </div>
                                
                                <? } ?>

                                <span class="error--message">Выберите способ доставки</span>

                            </div>

                            <div class="fields">
                                
                                <? if (!empty($arParams['STOCK_PROPERTY'])) { ?>
                                    
                                    <? foreach ($arResult['ORDER_PROPERTIES'] as $arProperty) { ?>
                                        
                                        <? if ($arProperty['CODE'] == $arParams['STOCK_PROPERTY'] && in_array($arProperty['PERSON_TYPE_ID'], $arResult['PERSON_TYPES'])) { ?>

                                            <div class="field <?= strtolower($arProperty['CODE']); ?> <? if ($arProperty['REQUIRED'] == "Y") { ?> required<? } ?> <? if ($arProperty['PERSON_TYPE_ID'] != $personTypeDefault) { ?>hidden<? } ?>"
                                                 data-person="<?= $arProperty['PERSON_TYPE_ID']; ?>">

                                                <div class="select-wrapper">

                                                    <select name="<?= $arProperty['CODE']; ?>">
                                                        <option value hidden></option>
                                                        <? foreach ($arProperty['OPTIONS'] as $arOption) { ?>
                                                            <option value="<?= $arOption['VALUE'] ?>"><?= $arOption['NAME']; ?></option>
                                                        <? } ?>
                                                    </select>

                                                    <div class="controls">
                                                        <button class="transparent button clear">
                                                            <i class="icon delete only"></i>
                                                        </button>
                                                    </div>

                                                </div>

                                            </div>
                                        
                                        <? } ?>
                                    
                                    <? } ?>
                                
                                <? } ?>

                            </div>

                            <p class="hint">
                                Доставка в стоимость не включена.<br>
                                Стоимость доставки будет рассчитана после оформления заказа.
                            </p>

                        </section>
                        
                        <? if (!empty($arResult['PAYSYSTEM'])) { ?>

                            <section class="sale-basket-basket--order--form--payment">

                                <header>
                                    <span class="number">03</span>
                                    <h2>Способ оплаты</h2>
                                </header>

                                <div class="radios required field">
                                    
                                    <? foreach ($arResult['PAYSYSTEM'] as $i => $arPaySystem) { ?>

                                        <div class="radio-wrapper">

                                            <input id="PAYSYSTEM<?= $arPaySystem['ID']; ?>"
                                                   hidden
                                                   <? if ($i == 0) { ?>checked required<? } ?>
                                                   <? if ($arPaySystem['ACTIVE'] !== "Y") { ?>disabled<? } ?>
                                                   type="radio"
                                                   name="PAYSYSTEM"
                                                   value="<?= $arPaySystem['ID']; ?>">

                                            <label for="PAYSYSTEM<?= $arPaySystem['ID']; ?>"><?= $arPaySystem['NAME']; ?></label>

                                        </div>
                                    
                                    <? } ?>

                                    <span class="error--message">Выберите способ оплаты</span>

                                </div>

                            </section>
                        
                        <? } ?>

                    </div>
                    
                    <? $frame->end(); ?>

                </div>

                <div class="sale-basket-basket--order--cart half">
                    
                    <? $items->begin(); ?>

                    <div class="header">

                        <h2>Товары в заказе</h2>
                        
                        <? if ($arParams['PATH_TO_CART']) { ?>
                            <a href="<?= $arParams['PATH_TO_CART']; ?>">Редактировать</a>
                        <? } ?>

                    </div>

                    <div class="wrapper column">

                        <section class="sale-basket-basket--order--cart--items">
                            
                            <? foreach ($arResult['ITEMS'] as $group => $list) { ?>
                                
                                <? if (!empty($list)) { ?>

                                    <ul class="items <?= strtolower($group); ?> cart--items">
                                        
                                        <? foreach ($list as $arItem) { ?>

                                            <li class="item"
                                                data-product-id="<?= $arItem['PRODUCT_ID']; ?>"
                                                data-id="<?= $arItem['ID']; ?>">

                                                <div class="description">

                                                    <picture class="image hide--on-mobile">
                                                        
                                                        <?
                                                            
                                                            $image = CFile::resizeImageGet(
                                                                $arItem['DETAIL_PICTURE'],
                                                                Images::calculateImageSize(90, 1),
                                                                BX_RESIZE_IMAGE_PROPORTIONAL,
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
                                                                    <li><?= $property['VALUE']; ?></li>
                                                                <? } ?>
                                                            </ul>
                                                        
                                                        <? } ?>

                                                    </div>

                                                </div>

                                                <div class="numbers">

                                                    <div class="price hide--on-mobile">

                                                        <span class="label">Цена<? if (!empty($arItem['MEASURE_NAME'])) { ?> за <?= $arItem['MEASURE_NAME']; ?><? } ?></span>
                                                        <span class="value"><?= $arItem['PRICE_FORMATED']; ?></span>

                                                    </div>

                                                    <div class="quantity hide--on-mobile">

                                                        <span class="label">Кол-во</span>
                                                        <span class="value"><?= $arItem['QUANTITY']; ?></span>

                                                    </div>

                                                    <div class="total">

                                                        <span class="label">Сумма</span>
                                                        <span class="value"><?= $arItem['SUM']; ?></span>

                                                    </div>

                                                </div>

                                            </li>
                                        
                                        <? } ?>

                                    </ul>
                                
                                <? } ?>
                            
                            <? } ?>

                        </section>

                        <section class="sale-basket-basket--order--cart--total cart--total">

                            <h2 hidden>Итого</h2>

                            <div class="total">
                                <p>
                                    Итого
                                    <span class="count"><?= Template::pluralUnits($arResult['BASKET_ITEMS_COUNT'], 'товар'); ?></span>:
                                    <span class="value"><?= $arResult['allSum_FORMATED']; ?></span>
                                </p>
                            </div>

                            <div class="actions">

                                <button type="submit"
                                        class="big button wide progress submit">Оформить заказ
                                </button>

                                <div class="description">
                                    <p>Нажимая на кнопку «Заказать», вы соглашаетесь с политикой обработки ваших
                                        персональных данных.</p>
                                </div>

                            </div>

                        </section>

                    </div>
                    
                    <? $items->end(); ?>

                </div>

            </div>

        </form>

    </div>

</div>
