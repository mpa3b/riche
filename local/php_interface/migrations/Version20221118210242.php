<?php

namespace Sprint\Migration;


class Version20221118210242 extends Version
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
        $formHelper = $helper->Form();
        $formId = $formHelper->saveForm(array (
  'NAME' => 'Время раскрыть твой полноценный уход',
  'SID' => 'QUIZ_FRONT',
  'BUTTON' => 'Отправить',
  'C_SORT' => '100',
  'FIRST_SITE_ID' => NULL,
  'IMAGE_ID' => '51',
  'USE_CAPTCHA' => 'N',
  'DESCRIPTION' => '<p>
	 Эвапотранспирация, если принять во внимание воздействие фактора времени, повышает промывной потенциал почвенной влаги. Изучение отражает уровень грунтовых вод. Рендзина, несмотря на внешние воздействия, нагревает ореховатый лизиметр, хотя этот факт нуждается в дальнейшей тщательной экспериментальной проверке.
</p>',
  'DESCRIPTION_TYPE' => 'html',
  'FORM_TEMPLATE' => '',
  'USE_DEFAULT_TEMPLATE' => 'Y',
  'SHOW_TEMPLATE' => NULL,
  'MAIL_EVENT_TYPE' => 'FORM_FILLING_QUIZ_FRONT',
  'SHOW_RESULT_TEMPLATE' => NULL,
  'PRINT_RESULT_TEMPLATE' => NULL,
  'EDIT_RESULT_TEMPLATE' => NULL,
  'FILTER_RESULT_TEMPLATE' => '',
  'TABLE_RESULT_TEMPLATE' => '',
  'USE_RESTRICTIONS' => 'N',
  'RESTRICT_USER' => '0',
  'RESTRICT_TIME' => '0',
  'RESTRICT_STATUS' => '',
  'STAT_EVENT1' => 'form',
  'STAT_EVENT2' => '',
  'STAT_EVENT3' => '',
  'LID' => NULL,
  'C_FIELDS' => '0',
  'QUESTIONS' => '14',
  'STATUSES' => '1',
  'arSITE' => 
  array (
    0 => 's1',
  ),
  'arMENU' => 
  array (
    'ru' => 'Узнать результат',
  ),
  'arGROUP' => 
  array (
  ),
  'arMAIL_TEMPLATE' => 
  array (
  ),
));
        $formHelper->saveStatuses($formId, array (
  0 => 
  array (
    'CSS' => 'statusgreen',
    'C_SORT' => '100',
    'ACTIVE' => 'Y',
    'TITLE' => 'DEFAULT',
    'DESCRIPTION' => 'DEFAULT',
    'DEFAULT_VALUE' => 'Y',
    'HANDLER_OUT' => NULL,
    'HANDLER_IN' => NULL,
  ),
));
        $formHelper->saveFields($formId, array (
  0 => 
  array (
    'ACTIVE' => 'Y',
    'TITLE' => 'Твой возвраст',
    'TITLE_TYPE' => 'text',
    'SID' => 'AGE',
    'C_SORT' => '100',
    'ADDITIONAL' => 'N',
    'REQUIRED' => 'Y',
    'IN_FILTER' => 'Y',
    'IN_RESULTS_TABLE' => 'Y',
    'IN_EXCEL_TABLE' => 'Y',
    'FIELD_TYPE' => '',
    'IMAGE_ID' => NULL,
    'COMMENTS' => '',
    'FILTER_TITLE' => 'Твой возвраст',
    'RESULTS_TABLE_TITLE' => 'Твой возвраст',
    'ANSWERS' => 
    array (
      0 => 
      array (
        'MESSAGE' => 'до 18',
        'VALUE' => '',
        'FIELD_TYPE' => 'radio',
        'FIELD_WIDTH' => '0',
        'FIELD_HEIGHT' => '0',
        'FIELD_PARAM' => '',
        'C_SORT' => '0',
        'ACTIVE' => 'Y',
      ),
      1 => 
      array (
        'MESSAGE' => 'от 18 до 24',
        'VALUE' => '',
        'FIELD_TYPE' => 'radio',
        'FIELD_WIDTH' => '0',
        'FIELD_HEIGHT' => '0',
        'FIELD_PARAM' => '',
        'C_SORT' => '10',
        'ACTIVE' => 'Y',
      ),
      2 => 
      array (
        'MESSAGE' => 'от 24 до 32',
        'VALUE' => '',
        'FIELD_TYPE' => 'radio',
        'FIELD_WIDTH' => '0',
        'FIELD_HEIGHT' => '0',
        'FIELD_PARAM' => '',
        'C_SORT' => '20',
        'ACTIVE' => 'Y',
      ),
      3 => 
      array (
        'MESSAGE' => 'от 32 до 38',
        'VALUE' => '',
        'FIELD_TYPE' => 'radio',
        'FIELD_WIDTH' => '0',
        'FIELD_HEIGHT' => '0',
        'FIELD_PARAM' => '',
        'C_SORT' => '30',
        'ACTIVE' => 'Y',
      ),
      4 => 
      array (
        'MESSAGE' => 'от 38 до 44',
        'VALUE' => '',
        'FIELD_TYPE' => 'radio',
        'FIELD_WIDTH' => '0',
        'FIELD_HEIGHT' => '0',
        'FIELD_PARAM' => '',
        'C_SORT' => '40',
        'ACTIVE' => 'Y',
      ),
      5 => 
      array (
        'MESSAGE' => 'от 44',
        'VALUE' => '',
        'FIELD_TYPE' => 'radio',
        'FIELD_WIDTH' => '0',
        'FIELD_HEIGHT' => '0',
        'FIELD_PARAM' => '',
        'C_SORT' => '50',
        'ACTIVE' => 'Y',
      ),
    ),
    'VALIDATORS' => 
    array (
    ),
  ),
  1 => 
  array (
    'ACTIVE' => 'Y',
    'TITLE' => 'Твой естественный цвет волос',
    'TITLE_TYPE' => 'text',
    'SID' => 'HAIR_COLOR',
    'C_SORT' => '200',
    'ADDITIONAL' => 'N',
    'REQUIRED' => 'Y',
    'IN_FILTER' => 'Y',
    'IN_RESULTS_TABLE' => 'Y',
    'IN_EXCEL_TABLE' => 'Y',
    'FIELD_TYPE' => '',
    'IMAGE_ID' => NULL,
    'COMMENTS' => '',
    'FILTER_TITLE' => 'Твой естественный цвет волос',
    'RESULTS_TABLE_TITLE' => 'Твой естественный цвет волос',
    'ANSWERS' => 
    array (
      0 => 
      array (
        'MESSAGE' => 'блонд',
        'VALUE' => '',
        'FIELD_TYPE' => 'radio',
        'FIELD_WIDTH' => '0',
        'FIELD_HEIGHT' => '0',
        'FIELD_PARAM' => '',
        'C_SORT' => '0',
        'ACTIVE' => 'Y',
      ),
      1 => 
      array (
        'MESSAGE' => 'русый',
        'VALUE' => '',
        'FIELD_TYPE' => 'radio',
        'FIELD_WIDTH' => '0',
        'FIELD_HEIGHT' => '0',
        'FIELD_PARAM' => '',
        'C_SORT' => '10',
        'ACTIVE' => 'Y',
      ),
      2 => 
      array (
        'MESSAGE' => 'шатен',
        'VALUE' => '',
        'FIELD_TYPE' => 'radio',
        'FIELD_WIDTH' => '0',
        'FIELD_HEIGHT' => '0',
        'FIELD_PARAM' => '',
        'C_SORT' => '20',
        'ACTIVE' => 'Y',
      ),
      3 => 
      array (
        'MESSAGE' => 'рыжий',
        'VALUE' => '',
        'FIELD_TYPE' => 'radio',
        'FIELD_WIDTH' => '0',
        'FIELD_HEIGHT' => '0',
        'FIELD_PARAM' => '',
        'C_SORT' => '30',
        'ACTIVE' => 'Y',
      ),
    ),
    'VALIDATORS' => 
    array (
    ),
  ),
  2 => 
  array (
    'ACTIVE' => 'Y',
    'TITLE' => 'Как твои волосы реагируют на зиму?',
    'TITLE_TYPE' => 'text',
    'SID' => 'HAIR_WINTER_REACTION',
    'C_SORT' => '300',
    'ADDITIONAL' => 'N',
    'REQUIRED' => 'N',
    'IN_FILTER' => 'Y',
    'IN_RESULTS_TABLE' => 'Y',
    'IN_EXCEL_TABLE' => 'Y',
    'FIELD_TYPE' => '',
    'IMAGE_ID' => NULL,
    'COMMENTS' => '',
    'FILTER_TITLE' => 'Как твои волосы реагируют на зиму?',
    'RESULTS_TABLE_TITLE' => 'Как твои волосы реагируют на зиму?',
    'ANSWERS' => 
    array (
      0 => 
      array (
        'MESSAGE' => 'становятся ломкими',
        'VALUE' => '',
        'FIELD_TYPE' => 'checkbox',
        'FIELD_WIDTH' => '0',
        'FIELD_HEIGHT' => '0',
        'FIELD_PARAM' => '',
        'C_SORT' => '0',
        'ACTIVE' => 'Y',
      ),
      1 => 
      array (
        'MESSAGE' => 'без изменений',
        'VALUE' => '',
        'FIELD_TYPE' => 'checkbox',
        'FIELD_WIDTH' => '0',
        'FIELD_HEIGHT' => '0',
        'FIELD_PARAM' => '',
        'C_SORT' => '10',
        'ACTIVE' => 'Y',
      ),
      2 => 
      array (
        'MESSAGE' => 'встают колом',
        'VALUE' => '',
        'FIELD_TYPE' => 'checkbox',
        'FIELD_WIDTH' => '0',
        'FIELD_HEIGHT' => '0',
        'FIELD_PARAM' => '',
        'C_SORT' => '20',
        'ACTIVE' => 'Y',
      ),
      3 => 
      array (
        'MESSAGE' => '42',
        'VALUE' => '',
        'FIELD_TYPE' => 'checkbox',
        'FIELD_WIDTH' => '0',
        'FIELD_HEIGHT' => '0',
        'FIELD_PARAM' => '',
        'C_SORT' => '30',
        'ACTIVE' => 'Y',
      ),
      4 => 
      array (
        'MESSAGE' => 'шилишпёр',
        'VALUE' => '',
        'FIELD_TYPE' => 'checkbox',
        'FIELD_WIDTH' => '0',
        'FIELD_HEIGHT' => '0',
        'FIELD_PARAM' => '',
        'C_SORT' => '40',
        'ACTIVE' => 'Y',
      ),
    ),
    'VALIDATORS' => 
    array (
    ),
  ),
  3 => 
  array (
    'ACTIVE' => 'Y',
    'TITLE' => 'Длина твоих волос?',
    'TITLE_TYPE' => 'text',
    'SID' => 'HAIR_LENGTH',
    'C_SORT' => '400',
    'ADDITIONAL' => 'N',
    'REQUIRED' => 'N',
    'IN_FILTER' => 'Y',
    'IN_RESULTS_TABLE' => 'Y',
    'IN_EXCEL_TABLE' => 'Y',
    'FIELD_TYPE' => '',
    'IMAGE_ID' => NULL,
    'COMMENTS' => '',
    'FILTER_TITLE' => 'Длина твоих волос?',
    'RESULTS_TABLE_TITLE' => 'Длина твоих волос?',
    'ANSWERS' => 
    array (
      0 => 
      array (
        'MESSAGE' => 'ноль',
        'VALUE' => '',
        'FIELD_TYPE' => 'radio',
        'FIELD_WIDTH' => '0',
        'FIELD_HEIGHT' => '0',
        'FIELD_PARAM' => '',
        'C_SORT' => '0',
        'ACTIVE' => 'Y',
      ),
      1 => 
      array (
        'MESSAGE' => 'ёжик',
        'VALUE' => '',
        'FIELD_TYPE' => 'radio',
        'FIELD_WIDTH' => '0',
        'FIELD_HEIGHT' => '0',
        'FIELD_PARAM' => '',
        'C_SORT' => '10',
        'ACTIVE' => 'Y',
      ),
      2 => 
      array (
        'MESSAGE' => 'средние',
        'VALUE' => '',
        'FIELD_TYPE' => 'radio',
        'FIELD_WIDTH' => '0',
        'FIELD_HEIGHT' => '0',
        'FIELD_PARAM' => '',
        'C_SORT' => '20',
        'ACTIVE' => 'Y',
      ),
      3 => 
      array (
        'MESSAGE' => 'чуть подлиннее',
        'VALUE' => '',
        'FIELD_TYPE' => 'radio',
        'FIELD_WIDTH' => '0',
        'FIELD_HEIGHT' => '0',
        'FIELD_PARAM' => '',
        'C_SORT' => '30',
        'ACTIVE' => 'Y',
      ),
      4 => 
      array (
        'MESSAGE' => 'длинные',
        'VALUE' => '',
        'FIELD_TYPE' => 'radio',
        'FIELD_WIDTH' => '0',
        'FIELD_HEIGHT' => '0',
        'FIELD_PARAM' => '',
        'C_SORT' => '40',
        'ACTIVE' => 'Y',
      ),
      5 => 
      array (
        'MESSAGE' => 'до пяток',
        'VALUE' => '',
        'FIELD_TYPE' => 'radio',
        'FIELD_WIDTH' => '0',
        'FIELD_HEIGHT' => '0',
        'FIELD_PARAM' => '',
        'C_SORT' => '50',
        'ACTIVE' => 'Y',
      ),
    ),
    'VALIDATORS' => 
    array (
    ),
  ),
  4 => 
  array (
    'ACTIVE' => 'Y',
    'TITLE' => 'Напиши сюда что-нибудь',
    'TITLE_TYPE' => 'text',
    'SID' => 'SAMPLE_STRING',
    'C_SORT' => '500',
    'ADDITIONAL' => 'N',
    'REQUIRED' => 'N',
    'IN_FILTER' => 'Y',
    'IN_RESULTS_TABLE' => 'Y',
    'IN_EXCEL_TABLE' => 'Y',
    'FIELD_TYPE' => '',
    'IMAGE_ID' => NULL,
    'COMMENTS' => '',
    'FILTER_TITLE' => 'Напиши сюда что-нибудь',
    'RESULTS_TABLE_TITLE' => 'Напиши сюда что-нибудь',
    'ANSWERS' => 
    array (
      0 => 
      array (
        'MESSAGE' => ' ',
        'VALUE' => '',
        'FIELD_TYPE' => 'text',
        'FIELD_WIDTH' => '0',
        'FIELD_HEIGHT' => '0',
        'FIELD_PARAM' => '',
        'C_SORT' => '0',
        'ACTIVE' => 'Y',
      ),
    ),
    'VALIDATORS' => 
    array (
    ),
  ),
  5 => 
  array (
    'ACTIVE' => 'Y',
    'TITLE' => 'Напиши сочинение на тему "Актуальность образа Печорина для реалий 21-го века"',
    'TITLE_TYPE' => 'text',
    'SID' => 'SAMPLE_TEXT',
    'C_SORT' => '600',
    'ADDITIONAL' => 'N',
    'REQUIRED' => 'N',
    'IN_FILTER' => 'Y',
    'IN_RESULTS_TABLE' => 'Y',
    'IN_EXCEL_TABLE' => 'Y',
    'FIELD_TYPE' => '',
    'IMAGE_ID' => NULL,
    'COMMENTS' => '',
    'FILTER_TITLE' => 'Напиши сочинение на тему "Актуальность образа Печорина для реалий 21-го века"',
    'RESULTS_TABLE_TITLE' => 'Напиши сочинение на тему "Актуальность образа Печорина для реалий 21-го века"',
    'ANSWERS' => 
    array (
      0 => 
      array (
        'MESSAGE' => ' ',
        'VALUE' => '',
        'FIELD_TYPE' => 'textarea',
        'FIELD_WIDTH' => '0',
        'FIELD_HEIGHT' => '0',
        'FIELD_PARAM' => '',
        'C_SORT' => '0',
        'ACTIVE' => 'Y',
      ),
    ),
    'VALIDATORS' => 
    array (
    ),
  ),
  6 => 
  array (
    'ACTIVE' => 'Y',
    'TITLE' => 'Ты согласна со следующими утверждениями? ',
    'TITLE_TYPE' => 'text',
    'SID' => 'AGREE',
    'C_SORT' => '700',
    'ADDITIONAL' => 'N',
    'REQUIRED' => 'N',
    'IN_FILTER' => 'Y',
    'IN_RESULTS_TABLE' => 'Y',
    'IN_EXCEL_TABLE' => 'Y',
    'FIELD_TYPE' => '',
    'IMAGE_ID' => NULL,
    'COMMENTS' => '',
    'FILTER_TITLE' => 'Ты согласна со следующими утверждениями? ',
    'RESULTS_TABLE_TITLE' => 'Ты согласна со следующими утверждениями? ',
    'ANSWERS' => 
    array (
      0 => 
      array (
        'MESSAGE' => 'котики',
        'VALUE' => '',
        'FIELD_TYPE' => 'checkbox',
        'FIELD_WIDTH' => '0',
        'FIELD_HEIGHT' => '0',
        'FIELD_PARAM' => '',
        'C_SORT' => '0',
        'ACTIVE' => 'Y',
      ),
      1 => 
      array (
        'MESSAGE' => 'кофеёк',
        'VALUE' => '',
        'FIELD_TYPE' => 'checkbox',
        'FIELD_WIDTH' => '0',
        'FIELD_HEIGHT' => '0',
        'FIELD_PARAM' => '',
        'C_SORT' => '10',
        'ACTIVE' => 'Y',
      ),
      2 => 
      array (
        'MESSAGE' => '42',
        'VALUE' => '',
        'FIELD_TYPE' => 'checkbox',
        'FIELD_WIDTH' => '0',
        'FIELD_HEIGHT' => '0',
        'FIELD_PARAM' => '',
        'C_SORT' => '20',
        'ACTIVE' => 'Y',
      ),
    ),
    'VALIDATORS' => 
    array (
    ),
  ),
  7 => 
  array (
    'ACTIVE' => 'Y',
    'TITLE' => 'Нажми и оно выпадет. Это -- селект. ',
    'TITLE_TYPE' => 'text',
    'SID' => 'DROPDOWN',
    'C_SORT' => '800',
    'ADDITIONAL' => 'N',
    'REQUIRED' => 'N',
    'IN_FILTER' => 'Y',
    'IN_RESULTS_TABLE' => 'Y',
    'IN_EXCEL_TABLE' => 'Y',
    'FIELD_TYPE' => '',
    'IMAGE_ID' => NULL,
    'COMMENTS' => '',
    'FILTER_TITLE' => 'Нажми и оно выпадет. Это -- селект. ',
    'RESULTS_TABLE_TITLE' => 'Нажми и оно выпадет. Это -- селект. ',
    'ANSWERS' => 
    array (
      0 => 
      array (
        'MESSAGE' => 'ух ты',
        'VALUE' => '',
        'FIELD_TYPE' => 'dropdown',
        'FIELD_WIDTH' => '0',
        'FIELD_HEIGHT' => '0',
        'FIELD_PARAM' => '',
        'C_SORT' => '0',
        'ACTIVE' => 'Y',
      ),
      1 => 
      array (
        'MESSAGE' => 'не надо',
        'VALUE' => '',
        'FIELD_TYPE' => 'dropdown',
        'FIELD_WIDTH' => '0',
        'FIELD_HEIGHT' => '0',
        'FIELD_PARAM' => '',
        'C_SORT' => '10',
        'ACTIVE' => 'Y',
      ),
      2 => 
      array (
        'MESSAGE' => 'ещё',
        'VALUE' => '',
        'FIELD_TYPE' => 'dropdown',
        'FIELD_WIDTH' => '0',
        'FIELD_HEIGHT' => '0',
        'FIELD_PARAM' => '',
        'C_SORT' => '20',
        'ACTIVE' => 'Y',
      ),
      3 => 
      array (
        'MESSAGE' => '9966',
        'VALUE' => '',
        'FIELD_TYPE' => 'dropdown',
        'FIELD_WIDTH' => '0',
        'FIELD_HEIGHT' => '0',
        'FIELD_PARAM' => '',
        'C_SORT' => '30',
        'ACTIVE' => 'Y',
      ),
    ),
    'VALIDATORS' => 
    array (
    ),
  ),
  8 => 
  array (
    'ACTIVE' => 'Y',
    'TITLE' => 'Выбери, что нравится',
    'TITLE_TYPE' => 'text',
    'SID' => 'CHOICE',
    'C_SORT' => '900',
    'ADDITIONAL' => 'N',
    'REQUIRED' => 'Y',
    'IN_FILTER' => 'Y',
    'IN_RESULTS_TABLE' => 'Y',
    'IN_EXCEL_TABLE' => 'Y',
    'FIELD_TYPE' => '',
    'IMAGE_ID' => NULL,
    'COMMENTS' => '',
    'FILTER_TITLE' => 'Выбери, что нравится',
    'RESULTS_TABLE_TITLE' => 'Выбери, что нравится',
    'ANSWERS' => 
    array (
      0 => 
      array (
        'MESSAGE' => 'котики',
        'VALUE' => '',
        'FIELD_TYPE' => 'multiselect',
        'FIELD_WIDTH' => '0',
        'FIELD_HEIGHT' => '0',
        'FIELD_PARAM' => '',
        'C_SORT' => '0',
        'ACTIVE' => 'Y',
      ),
      1 => 
      array (
        'MESSAGE' => 'шоколад',
        'VALUE' => '',
        'FIELD_TYPE' => 'multiselect',
        'FIELD_WIDTH' => '0',
        'FIELD_HEIGHT' => '0',
        'FIELD_PARAM' => '',
        'C_SORT' => '10',
        'ACTIVE' => 'Y',
      ),
      2 => 
      array (
        'MESSAGE' => 'кофе',
        'VALUE' => '',
        'FIELD_TYPE' => 'multiselect',
        'FIELD_WIDTH' => '0',
        'FIELD_HEIGHT' => '0',
        'FIELD_PARAM' => '',
        'C_SORT' => '20',
        'ACTIVE' => 'Y',
      ),
      3 => 
      array (
        'MESSAGE' => 'эклеры',
        'VALUE' => '',
        'FIELD_TYPE' => 'multiselect',
        'FIELD_WIDTH' => '0',
        'FIELD_HEIGHT' => '0',
        'FIELD_PARAM' => '',
        'C_SORT' => '30',
        'ACTIVE' => 'Y',
      ),
      4 => 
      array (
        'MESSAGE' => 'винишко',
        'VALUE' => '',
        'FIELD_TYPE' => 'multiselect',
        'FIELD_WIDTH' => '0',
        'FIELD_HEIGHT' => '0',
        'FIELD_PARAM' => '',
        'C_SORT' => '40',
        'ACTIVE' => 'Y',
      ),
    ),
    'VALIDATORS' => 
    array (
    ),
  ),
  9 => 
  array (
    'ACTIVE' => 'Y',
    'TITLE' => 'Укажи дату чего-нибудь',
    'TITLE_TYPE' => 'text',
    'SID' => 'DATE',
    'C_SORT' => '1000',
    'ADDITIONAL' => 'N',
    'REQUIRED' => 'N',
    'IN_FILTER' => 'Y',
    'IN_RESULTS_TABLE' => 'Y',
    'IN_EXCEL_TABLE' => 'Y',
    'FIELD_TYPE' => '',
    'IMAGE_ID' => NULL,
    'COMMENTS' => '',
    'FILTER_TITLE' => 'Укажи дату чего-нибудь',
    'RESULTS_TABLE_TITLE' => 'Укажи дату чего-нибудь',
    'ANSWERS' => 
    array (
      0 => 
      array (
        'MESSAGE' => ' ',
        'VALUE' => '',
        'FIELD_TYPE' => 'date',
        'FIELD_WIDTH' => '0',
        'FIELD_HEIGHT' => '0',
        'FIELD_PARAM' => '',
        'C_SORT' => '0',
        'ACTIVE' => 'Y',
      ),
    ),
    'VALIDATORS' => 
    array (
    ),
  ),
  10 => 
  array (
    'ACTIVE' => 'Y',
    'TITLE' => 'Приложи фотку. ',
    'TITLE_TYPE' => 'text',
    'SID' => 'PHOTO',
    'C_SORT' => '1100',
    'ADDITIONAL' => 'N',
    'REQUIRED' => 'N',
    'IN_FILTER' => 'Y',
    'IN_RESULTS_TABLE' => 'Y',
    'IN_EXCEL_TABLE' => 'Y',
    'FIELD_TYPE' => '',
    'IMAGE_ID' => NULL,
    'COMMENTS' => '',
    'FILTER_TITLE' => 'Приложи фотку. ',
    'RESULTS_TABLE_TITLE' => 'Приложи фотку. ',
    'ANSWERS' => 
    array (
      0 => 
      array (
        'MESSAGE' => ' ',
        'VALUE' => '',
        'FIELD_TYPE' => 'image',
        'FIELD_WIDTH' => '0',
        'FIELD_HEIGHT' => '0',
        'FIELD_PARAM' => '',
        'C_SORT' => '0',
        'ACTIVE' => 'Y',
      ),
    ),
    'VALIDATORS' => 
    array (
    ),
  ),
  11 => 
  array (
    'ACTIVE' => 'Y',
    'TITLE' => 'Скажи имэйл',
    'TITLE_TYPE' => 'text',
    'SID' => 'EMAIL',
    'C_SORT' => '1200',
    'ADDITIONAL' => 'N',
    'REQUIRED' => 'N',
    'IN_FILTER' => 'Y',
    'IN_RESULTS_TABLE' => 'Y',
    'IN_EXCEL_TABLE' => 'Y',
    'FIELD_TYPE' => '',
    'IMAGE_ID' => NULL,
    'COMMENTS' => '',
    'FILTER_TITLE' => 'Скажи имэйл',
    'RESULTS_TABLE_TITLE' => 'Скажи имэйл',
    'ANSWERS' => 
    array (
      0 => 
      array (
        'MESSAGE' => ' Твой адрес электронной почты',
        'VALUE' => '',
        'FIELD_TYPE' => 'email',
        'FIELD_WIDTH' => '0',
        'FIELD_HEIGHT' => '0',
        'FIELD_PARAM' => '',
        'C_SORT' => '0',
        'ACTIVE' => 'Y',
      ),
    ),
    'VALIDATORS' => 
    array (
    ),
  ),
  12 => 
  array (
    'ACTIVE' => 'Y',
    'TITLE' => 'Тут текст вопроса',
    'TITLE_TYPE' => 'text',
    'SID' => 'SOMETHING',
    'C_SORT' => '1300',
    'ADDITIONAL' => 'N',
    'REQUIRED' => 'N',
    'IN_FILTER' => 'Y',
    'IN_RESULTS_TABLE' => 'Y',
    'IN_EXCEL_TABLE' => 'Y',
    'FIELD_TYPE' => '',
    'IMAGE_ID' => NULL,
    'COMMENTS' => '',
    'FILTER_TITLE' => '',
    'RESULTS_TABLE_TITLE' => '',
    'ANSWERS' => 
    array (
      0 => 
      array (
        'MESSAGE' => ' Ответ',
        'VALUE' => '',
        'FIELD_TYPE' => 'text',
        'FIELD_WIDTH' => '0',
        'FIELD_HEIGHT' => '0',
        'FIELD_PARAM' => '',
        'C_SORT' => '0',
        'ACTIVE' => 'Y',
      ),
    ),
    'VALIDATORS' => 
    array (
    ),
  ),
  13 => 
  array (
    'ACTIVE' => 'Y',
    'TITLE' => '',
    'TITLE_TYPE' => 'text',
    'SID' => 'MARK',
    'C_SORT' => '1400',
    'ADDITIONAL' => 'N',
    'REQUIRED' => 'N',
    'IN_FILTER' => 'N',
    'IN_RESULTS_TABLE' => 'Y',
    'IN_EXCEL_TABLE' => 'Y',
    'FIELD_TYPE' => '',
    'IMAGE_ID' => NULL,
    'COMMENTS' => '',
    'FILTER_TITLE' => '',
    'RESULTS_TABLE_TITLE' => '',
    'ANSWERS' => 
    array (
      0 => 
      array (
        'MESSAGE' => 'Скрыто',
        'VALUE' => '',
        'FIELD_TYPE' => 'hidden',
        'FIELD_WIDTH' => '0',
        'FIELD_HEIGHT' => '0',
        'FIELD_PARAM' => '',
        'C_SORT' => '100',
        'ACTIVE' => 'Y',
      ),
    ),
    'VALIDATORS' => 
    array (
    ),
  ),
));
    }

    public function down()
    {
        //your code ...
    }
}

