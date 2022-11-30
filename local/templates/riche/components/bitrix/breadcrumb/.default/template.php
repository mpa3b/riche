<?

if (!defined("B_PROLOG_INCLUDED") or B_PROLOG_INCLUDED !== true) {
    die();
}

if (!empty($arResult)) {

    $itemSize = count($arResult);

    $strReturn = '<nav class="breadcrumb">';
    $strReturn .= '<img src="' . SITE_TEMPLATE_PATH . '/images/logo.svg">';
    $strReturn .= '<ul>';

    for ($index = 0; $index < $itemSize; $index++) {

        $title = htmlspecialcharsex($arResult[$index]["TITLE"]);

        $child = ($index > 0 ? ' itemprop="child"' : '');

        if ($arResult[$index]["LINK"] <> "" and $index != $itemSize - 1) {

            $strReturn .= '<li itemtype="//data-vocabulary.org/breadcrumbs/"' . $child . '>';
            $strReturn .= '<a href="' . $arResult[$index]["LINK"] . '" title="' . $title . '" itemprop="url">' . $title . '</a>';
            $strReturn .= '<i class="icon-chevron-right"></i>';
            $strReturn .= '</li>';

        }
        else {

            if (!empty($arParams['PAGE_DESCRIPTION'])) {

                $strReturn .= '<li>' . $title . '<span class="page-description">' . $arParams['PAGE_DESCRIPTION'] . '</span></li>';

            }
            else {

                $strReturn .= '<li>' . $title . '</li>';

            }

        }

    }

    $strReturn .= '</ul></nav>';

    return $strReturn;

}
