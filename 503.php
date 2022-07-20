<?

require_once($_SERVER["DOCUMENT_ROOT"] . "/bitrix/modules/main/include/prolog_before.php");

CHTTP::SetStatus("503 Service Temporarily Unavailable");

@define("ERROR_503", "Y");