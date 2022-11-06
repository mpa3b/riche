<?

if (!defined("B_PROLOG_INCLUDED") or B_PROLOG_INCLUDED !== true) {
    die();
}

if (!empty($arResult)) {

    $itemSize = count($arResult);

    $strReturn = '<nav class="breadcrumb"><ul>';

    for ($index = 0; $index < $itemSize; $index++) {

        $title = htmlspecialcharsex($arResult[$index]["TITLE"]);

        $nextRef = ($index < $itemSize - 2 and $arResult[$index + 1]["LINK"] <> "" ?
                ' itemref="breadcrumbs-item-' . ($index + 1) . '"' : '');

        $child = ($index > 0 ? ' itemprop="child"' : '');

        if ($arResult[$index]["LINK"] <> "" and $index != $itemSize - 1) {

            $strReturn .= '<li itemtype="//data-vocabulary.org/breadcrumbs/"' . $child . $nextRef . '><a href="' .
                          $arResult[$index]["LINK"] . '" title="' . $title . '" itemprop="url">' . $title .
                          '</a></li>';

            $strReturn .= '<i class="icon-right-2"></i>';

        }
        else {

            $strReturn .= '<li>' . $title . '</li>';

        }

    }

    $strReturn .= '</ul></nav>';

    return $strReturn;

}
