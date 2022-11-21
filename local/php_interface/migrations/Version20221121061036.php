<?php

namespace Sprint\Migration;


class Version20221121061036 extends Version
{
    protected $description = "";

    protected $moduleVersion = "4.1.2";

    /**
     * @throws Exceptions\HelperException
     * @return bool|void
     */
    public function up()
    {
        $helper = $this->getHelperManager();
        $helper->UserTypeEntity()->saveUserTypeEntity(array (
  'ENTITY_ID' => 'BLOG_POST',
  'FIELD_NAME' => 'UF_GRATITUDE',
  'USER_TYPE_ID' => 'integer',
  'XML_ID' => 'UF_GRATITUDE',
  'SORT' => '100',
  'MULTIPLE' => 'N',
  'MANDATORY' => 'N',
  'SHOW_FILTER' => 'N',
  'SHOW_IN_LIST' => 'N',
  'EDIT_IN_LIST' => 'Y',
  'IS_SEARCHABLE' => 'N',
  'SETTINGS' => 
  array (
  ),
));
        $helper->UserTypeEntity()->saveUserTypeEntity(array (
  'ENTITY_ID' => 'BLOG_POST',
  'FIELD_NAME' => 'UF_IMPRTANT_DATE_END',
  'USER_TYPE_ID' => 'datetime',
  'XML_ID' => 'UF_IMPRTANT_DATE_END',
  'SORT' => '100',
  'MULTIPLE' => 'N',
  'MANDATORY' => 'N',
  'SHOW_FILTER' => 'N',
  'SHOW_IN_LIST' => 'N',
  'EDIT_IN_LIST' => 'Y',
  'IS_SEARCHABLE' => 'N',
  'SETTINGS' => 
  array (
  ),
  'EDIT_FORM_LABEL' => 
  array (
    'en' => 'Active until',
    'ru' => 'Срок действия',
  ),
  'LIST_COLUMN_LABEL' => 
  array (
    'en' => 'Active until',
    'ru' => 'Срок',
  ),
  'LIST_FILTER_LABEL' => 
  array (
    'en' => NULL,
    'ru' => NULL,
  ),
  'ERROR_MESSAGE' => 
  array (
    'en' => NULL,
    'ru' => NULL,
  ),
  'HELP_MESSAGE' => 
  array (
    'en' => NULL,
    'ru' => NULL,
  ),
));
        $helper->UserTypeEntity()->saveUserTypeEntity(array (
  'ENTITY_ID' => 'HLBLOCK_ProductMarkingCodeGroup',
  'FIELD_NAME' => 'UF_XML_ID',
  'USER_TYPE_ID' => 'string',
  'XML_ID' => 'XML_ID',
  'SORT' => '100',
  'MULTIPLE' => 'N',
  'MANDATORY' => 'Y',
  'SHOW_FILTER' => 'S',
  'SHOW_IN_LIST' => 'Y',
  'EDIT_IN_LIST' => 'Y',
  'IS_SEARCHABLE' => 'N',
  'SETTINGS' => 
  array (
    'SIZE' => 16,
    'ROWS' => 1,
    'REGEXP' => '/^[0-9]{1,16}$/',
    'MIN_LENGTH' => 0,
    'MAX_LENGTH' => 0,
    'DEFAULT_VALUE' => '',
  ),
  'EDIT_FORM_LABEL' => 
  array (
    'en' => 'Product group ID',
    'ru' => 'Код группы товаров',
  ),
  'LIST_COLUMN_LABEL' => 
  array (
    'en' => 'Product group ID',
    'ru' => 'Код группы товаров',
  ),
  'LIST_FILTER_LABEL' => 
  array (
    'en' => 'Product group ID',
    'ru' => 'Код группы товаров',
  ),
  'ERROR_MESSAGE' => 
  array (
    'en' => NULL,
    'ru' => NULL,
  ),
  'HELP_MESSAGE' => 
  array (
    'en' => NULL,
    'ru' => NULL,
  ),
));
        $helper->UserTypeEntity()->saveUserTypeEntity(array (
  'ENTITY_ID' => 'HLBLOCK_ProductMarkingCodeGroup',
  'FIELD_NAME' => 'UF_NAME',
  'USER_TYPE_ID' => 'string',
  'XML_ID' => 'NAME',
  'SORT' => '200',
  'MULTIPLE' => 'N',
  'MANDATORY' => 'Y',
  'SHOW_FILTER' => 'S',
  'SHOW_IN_LIST' => 'Y',
  'EDIT_IN_LIST' => 'Y',
  'IS_SEARCHABLE' => 'N',
  'SETTINGS' => 
  array (
    'SIZE' => 100,
    'ROWS' => 1,
    'REGEXP' => '',
    'MIN_LENGTH' => 1,
    'MAX_LENGTH' => 255,
    'DEFAULT_VALUE' => '',
  ),
  'EDIT_FORM_LABEL' => 
  array (
    'en' => 'Product group',
    'ru' => 'Группа товаров',
  ),
  'LIST_COLUMN_LABEL' => 
  array (
    'en' => 'Product group',
    'ru' => 'Группа товаров',
  ),
  'LIST_FILTER_LABEL' => 
  array (
    'en' => 'Product group',
    'ru' => 'Группа товаров',
  ),
  'ERROR_MESSAGE' => 
  array (
    'en' => NULL,
    'ru' => NULL,
  ),
  'HELP_MESSAGE' => 
  array (
    'en' => NULL,
    'ru' => NULL,
  ),
));
        $helper->UserTypeEntity()->saveUserTypeEntity(array (
  'ENTITY_ID' => 'PRODUCT',
  'FIELD_NAME' => 'UF_PRODUCT_GROUP',
  'USER_TYPE_ID' => 'hlblock',
  'XML_ID' => 'MARKING_CODE_GROUP',
  'SORT' => '100',
  'MULTIPLE' => 'N',
  'MANDATORY' => 'N',
  'SHOW_FILTER' => 'S',
  'SHOW_IN_LIST' => 'Y',
  'EDIT_IN_LIST' => 'Y',
  'IS_SEARCHABLE' => 'N',
  'SETTINGS' => 
  array (
    'DISPLAY' => 'LIST',
    'LIST_HEIGHT' => 1,
    'HLBLOCK_ID' => 'ProductMarkingCodeGroup',
    'HLFIELD_ID' => 'UF_NAME',
    'DEFAULT_VALUE' => 0,
  ),
  'EDIT_FORM_LABEL' => 
  array (
    'en' => 'Product group',
    'ru' => 'Группа товаров',
  ),
  'LIST_COLUMN_LABEL' => 
  array (
    'en' => 'Product group',
    'ru' => 'Группа товаров',
  ),
  'LIST_FILTER_LABEL' => 
  array (
    'en' => 'Product group',
    'ru' => 'Группа товаров',
  ),
  'ERROR_MESSAGE' => 
  array (
    'en' => NULL,
    'ru' => NULL,
  ),
  'HELP_MESSAGE' => 
  array (
    'en' => NULL,
    'ru' => NULL,
  ),
));
    }

    public function down()
    {
        //your code ...
    }
}
