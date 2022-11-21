<?php

namespace Sprint\Migration;


class Version20221121061338 extends Version
{
    protected $description = "";

    protected $moduleVersion = "4.1.2";

    public function up()
    {
        $helper = $this->getHelperManager();
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'calendar',
  'NAME' => '~ft_b_calendar_event',
  'VALUE' => '1',
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'catalog',
  'NAME' => 'subscribe_repeated_notify',
  'VALUE' => 'Y',
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'conversion',
  'NAME' => 'GENERATE_INITIAL_DATA',
  'VALUE' => 'generated',
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'conversion',
  'NAME' => 'START_DATE_TIME',
  'VALUE' => '2022-11-09 10:46:59',
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'currency',
  'NAME' => 'installed_currencies',
  'VALUE' => 'RUB,USD,EUR,UAH,BYN',
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'dev2fun.imagecompress',
  'NAME' => 'convert_mode',
  'VALUE' => 
  array (
    0 => 'hitConvert',
    1 => 'postConvert',
  ),
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'dev2fun.imagecompress',
  'NAME' => 'convert_quality',
  'VALUE' => '80',
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'dev2fun.imagecompress',
  'NAME' => 'enable_element',
  'VALUE' => 'Y',
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'dev2fun.imagecompress',
  'NAME' => 'enable_resize',
  'VALUE' => 'Y',
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'dev2fun.imagecompress',
  'NAME' => 'enable_save',
  'VALUE' => 'Y',
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'dev2fun.imagecompress',
  'NAME' => 'enable_section',
  'VALUE' => 'Y',
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'dev2fun.imagecompress',
  'NAME' => 'jpeg_progressive',
  'VALUE' => 'Y',
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'dev2fun.imagecompress',
  'NAME' => 'jpegoptim_compress',
  'VALUE' => '80',
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'dev2fun.imagecompress',
  'NAME' => 'opti_algorithm_jpeg',
  'VALUE' => 'jpegoptim',
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'dev2fun.imagecompress',
  'NAME' => 'opti_algorithm_png',
  'VALUE' => 'optipng',
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'dev2fun.imagecompress',
  'NAME' => 'optipng_compress',
  'VALUE' => '3',
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'dev2fun.imagecompress',
  'NAME' => 'path_to_jpegoptim',
  'VALUE' => '/usr/bin',
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'dev2fun.imagecompress',
  'NAME' => 'path_to_optipng',
  'VALUE' => '/usr/bin',
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'fileman',
  'NAME' => 'stickers_use_hotkeys',
  'VALUE' => 'N',
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'fileman',
  'NAME' => 'use_editor_3',
  'VALUE' => 'Y',
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'form',
  'NAME' => 'FORM_DEFAULT_PERMISSION',
  'VALUE' => '10',
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'form',
  'NAME' => 'GROUP_DEFAULT_RIGHT',
  'VALUE' => 'D',
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'form',
  'NAME' => 'RECORDS_LIMIT',
  'VALUE' => '5000',
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'form',
  'NAME' => 'RESULTS_PAGEN',
  'VALUE' => '10',
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'form',
  'NAME' => 'SIMPLE',
  'VALUE' => 'N',
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'form',
  'NAME' => 'USE_HTML_EDIT',
  'VALUE' => 'Y',
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'iblock',
  'NAME' => 'change_user_by_group_active_modify',
  'VALUE' => 'Y',
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'iblock',
  'NAME' => 'combined_list_mode',
  'VALUE' => 'Y',
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'iblock',
  'NAME' => 'custom_edit_form_use_property_id',
  'VALUE' => 'Y',
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'iblock',
  'NAME' => 'detail_image_size',
  'VALUE' => '200',
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'iblock',
  'NAME' => 'event_log_iblock',
  'VALUE' => 'Y',
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'iblock',
  'NAME' => 'excel_export_rights',
  'VALUE' => 'Y',
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'iblock',
  'NAME' => 'iblock_activity_dates',
  'VALUE' => '1,2,6',
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'iblock',
  'NAME' => 'iblock_activity_dates_period',
  'VALUE' => '86400',
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'iblock',
  'NAME' => 'iblock_menu_max_sections',
  'VALUE' => '50',
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'iblock',
  'NAME' => 'list_full_date_edit',
  'VALUE' => 'N',
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'iblock',
  'NAME' => 'list_image_size',
  'VALUE' => '50',
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'iblock',
  'NAME' => 'num_catalog_levels',
  'VALUE' => '6',
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'iblock',
  'NAME' => 'path2rss',
  'VALUE' => '/upload/',
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'iblock',
  'NAME' => 'property_features_enabled',
  'VALUE' => 'Y',
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'iblock',
  'NAME' => 'show_xml_id',
  'VALUE' => 'Y',
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'iblock',
  'NAME' => 'use_htmledit',
  'VALUE' => 'Y',
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'landing',
  'NAME' => 'new_blocks',
  'VALUE' => 
  array (
    'date' => 1667988532,
    'items' => 
    array (
      0 => '68.1.faq',
      1 => '68.2.faq',
      2 => '68.3.faq',
      3 => '68.4.faq',
      4 => '68.5.faq',
      5 => '68.6.faq',
    ),
  ),
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'landing',
  'NAME' => 'pub_path_s1',
  'VALUE' => '/lp/',
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'location',
  'NAME' => 'address_format_code',
  'VALUE' => 'RU',
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'main',
  'NAME' => '~cpf_map_value',
  'VALUE' => 'YToyOntpOjA7czo1OiJTbWFsbCI7aToxO3M6MzoiQmlnIjt9',
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'main',
  'NAME' => '~crypto_b_im_conference',
  'VALUE' => 
  array (
    'PASSWORD' => true,
  ),
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'main',
  'NAME' => '~crypto_b_mail_oauth',
  'VALUE' => 
  array (
    'TOKENS' => true,
  ),
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'main',
  'NAME' => '~crypto_b_socialservices_user',
  'VALUE' => 
  array (
    'OATOKEN' => true,
    'REFRESH_TOKEN' => true,
  ),
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'main',
  'NAME' => '~crypto_b_user_auth_code',
  'VALUE' => 
  array (
    'OTP_SECRET' => true,
  ),
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'main',
  'NAME' => '~crypto_b_user_phone_auth',
  'VALUE' => 
  array (
    'OTP_SECRET' => true,
  ),
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'main',
  'NAME' => '~mp24_paid',
  'VALUE' => '',
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'main',
  'NAME' => '~mp24_paid_date',
  'VALUE' => '',
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'main',
  'NAME' => '~new_license18_0_sign',
  'VALUE' => 'Y',
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'main',
  'NAME' => '~PARAM_CLIENT_LANG',
  'VALUE' => 'ru',
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'main',
  'NAME' => '~PARAM_COMPOSITE',
  'VALUE' => 'N',
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'main',
  'NAME' => '~PARAM_FINISH_DATE',
  'VALUE' => '75c91ec990031aed9a6cf395c39eec47a3e8d1b83811096d1f3d163dc339d9b2.2023-01-11',
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'main',
  'NAME' => '~PARAM_MAX_SERVERS',
  'VALUE' => '2',
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'main',
  'NAME' => '~PARAM_MAX_USERS',
  'VALUE' => 'a7e8289313a838940f7e5127d469cfdab543693e286ba72412b0e41da6a85588.0',
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'main',
  'NAME' => '~PARAM_PARTNER_ID',
  'VALUE' => '1608805',
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'main',
  'NAME' => '~PARAM_PHONE_SIP',
  'VALUE' => 'N',
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'main',
  'NAME' => '~rsa_key_pem',
  'VALUE' => '-----BEGIN PRIVATE KEY-----
MIICdwIBADANBgkqhkiG9w0BAQEFAASCAmEwggJdAgEAAoGBAJ6/ro+uQxQju0Ru
6QDumE99uaPJaKmv7ylyCePYtgNT1soGRs34Hm5FXUCWvZScwUkh6ZgmWQ0aXpJ5
SedNgtQ/FqzcIBTcimSuafJFT/Gnya1Ogi6kKUvj89+p7EQrO94Fn+Ku0lYWG7m2
eSGbr03mqygv04XwHt1SIB2fCURBAgMBAAECgYAZy3m43Q8HQbsXJpJz1VEocXxt
sbdxAyZwbJhQzpDcv43CK/zrUOrY7ip16UiK0mHR2VHUqD6GE4fUcyLgE8czJj17
F52N2YTeBqR/f4+QN57AAyfByKNDdsrAZDif6GqeuiwKkEbf0rFSogs93QZIGiD/
l0xxdn4zfd8kbALBNQJBAMpf1SBWQDSayEX0HlSYMDgtuOjwJvrpgoug6oqjaAGC
kJfaZQKyeMwQLpcOjTGQ5DQAH0G8ty6qvwRhl+LdOJMCQQDI0Hw2LwDKlYtyndOm
gWIEfRKFW0rwZ+gRCnLyf3/ZXr2zIcMXecuCm3ZFeXBGuoxmy8iqGoofoCjhJCGz
ojhbAkEAhN742rtmemNpvOw0AczOVARJFL+giDtKmAx2EcKJ5fvonZspmOS/BRRW
0p0ePP3ppu6xlwKlrwEyW1kMVUpz+wJABmqS7XBHCDILCJh+YL2Vkisk4lnuZQwM
4C6DSbhFL37VdNnJUAC2PfAVsVaV/cyMG+S6/qRmcWg+piLvaLvwLQJBALpdKQNb
rozO0aA9nJN0hOtXRJDYMRtBYCKXVSPCaz9Vea8beArEMLwPseD0HJALLwn7PVSp
v5clDjB2haZeruY=
-----END PRIVATE KEY-----
',
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'main',
  'NAME' => '~rsa_keys_openssl',
  'VALUE' => 
  array (
    'M' => 'QUQJnx0gUt0e8IXTLyir5k2vmyF5trkbFlbSruKfBd47K0Tsqd/z40sppC6CTq3Jp/FPRfJprmSK3BQg3KwWP9SCTedJeZJeGg1ZJpjpIUnBnJS9lkBdRW4e+M1GBsrWUwO22OMJcinvr6loyaO5fU+Y7gDpbkS7IxRDro+uv54=',
    'E' => 'AQAB',
    'D' => 'NcECbCTffTN+dnFMl/8gGkgG3T0LolKx0t9GkAosup5q6J84ZMDKdkOjyMEnA8CeN5CPf3+kBt6E2Y2dF3s9JjPHE+Aic9SHE4Y+qNRR2dFh0opI6XUq7tjqUOv8K8KNv9yQzlCYbHAmA3G3sW18cShR1XOSJhe7QQcP3bh5yxk=',
    'chunk' => 128,
  ),
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'main',
  'NAME' => '~sale_converted_15',
  'VALUE' => 'Y',
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'main',
  'NAME' => '~sale_paysystem_converted',
  'VALUE' => 'Y',
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'main',
  'NAME' => '~show_composite_banner',
  'VALUE' => 'N',
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'main',
  'NAME' => '~support_finish_date',
  'VALUE' => '2023-01-11',
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'main',
  'NAME' => '~update_autocheck_result',
  'VALUE' => 
  array (
    'check_date' => 1668982889,
    'result' => false,
    'error' => '',
    'modules' => 
    array (
    ),
  ),
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'main',
  'NAME' => 'admin_lid',
  'VALUE' => 'ru',
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'main',
  'NAME' => 'admin_passwordh',
  'VALUE' => 'FVgQemYUBwUtCUVcBRcOCgsTAQ==',
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'main',
  'NAME' => 'all_bcc',
  'VALUE' => 'copies@riche.skin',
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'main',
  'NAME' => 'allow_qrcode_auth',
  'VALUE' => 'N',
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'main',
  'NAME' => 'allow_socserv_authorization',
  'VALUE' => 'Y',
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'main',
  'NAME' => 'ALLOW_SPREAD_COOKIE',
  'VALUE' => 'Y',
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'main',
  'NAME' => 'attach_images',
  'VALUE' => 'N',
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'main',
  'NAME' => 'auth_components_template',
  'VALUE' => '',
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'main',
  'NAME' => 'auth_controller_sso',
  'VALUE' => 'N',
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'main',
  'NAME' => 'auth_multisite',
  'VALUE' => 'N',
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'main',
  'NAME' => 'auto_time_zone',
  'VALUE' => 'N',
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'main',
  'NAME' => 'backup_secret_key',
  'VALUE' => 'FHMREHRGJFh9TR0GRATvqOAoNl3rqIUq',
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'main',
  'NAME' => 'bx_fast_download',
  'VALUE' => 'Y',
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'main',
  'NAME' => 'captcha_registration',
  'VALUE' => 'N',
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'main',
  'NAME' => 'captcha_restoring_password',
  'VALUE' => 'N',
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'main',
  'NAME' => 'collect_geonames',
  'VALUE' => 'Y',
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'main',
  'NAME' => 'compres_css_js_files',
  'VALUE' => 'N',
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'main',
  'NAME' => 'control_file_duplicates',
  'VALUE' => 'Y',
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'main',
  'NAME' => 'convert_mail_header',
  'VALUE' => 'Y',
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'main',
  'NAME' => 'convert_original_file_name',
  'VALUE' => 'Y',
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'main',
  'NAME' => 'CONVERT_UNIX_NEWLINE_2_WINDOWS',
  'VALUE' => 'N',
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'main',
  'NAME' => 'cookie_name',
  'VALUE' => 'RICHE',
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'main',
  'NAME' => 'custom_register_page',
  'VALUE' => '',
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'main',
  'NAME' => 'device_history_cleanup_days',
  'VALUE' => '180',
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'main',
  'NAME' => 'disk_space',
  'VALUE' => '',
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'main',
  'NAME' => 'dump_archive_size_limit',
  'VALUE' => '1048576000',
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'main',
  'NAME' => 'dump_archive_size_limit_auto',
  'VALUE' => '104857600',
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'main',
  'NAME' => 'dump_auto_interval_auto',
  'VALUE' => '7',
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'main',
  'NAME' => 'dump_auto_time_auto',
  'VALUE' => '10',
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'main',
  'NAME' => 'dump_base',
  'VALUE' => '1',
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'main',
  'NAME' => 'dump_base_auto',
  'VALUE' => '1',
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'main',
  'NAME' => 'dump_base_skip_log',
  'VALUE' => '1',
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'main',
  'NAME' => 'dump_base_skip_log_auto',
  'VALUE' => '0',
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'main',
  'NAME' => 'dump_base_skip_search',
  'VALUE' => '1',
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'main',
  'NAME' => 'dump_base_skip_search_auto',
  'VALUE' => '0',
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'main',
  'NAME' => 'dump_base_skip_stat',
  'VALUE' => '1',
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'main',
  'NAME' => 'dump_base_skip_stat_auto',
  'VALUE' => '0',
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'main',
  'NAME' => 'dump_bucket_id',
  'VALUE' => '0',
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'main',
  'NAME' => 'dump_bucket_id_auto',
  'VALUE' => '-1',
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'main',
  'NAME' => 'dump_delete_old_auto',
  'VALUE' => '1',
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'main',
  'NAME' => 'dump_do_clouds',
  'VALUE' => '0',
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'main',
  'NAME' => 'dump_do_clouds_auto',
  'VALUE' => '0',
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'main',
  'NAME' => 'dump_encrypt',
  'VALUE' => '0',
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'main',
  'NAME' => 'dump_file_kernel',
  'VALUE' => '0',
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'main',
  'NAME' => 'dump_file_kernel_auto',
  'VALUE' => '1',
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'main',
  'NAME' => 'dump_file_public',
  'VALUE' => '1',
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'main',
  'NAME' => 'dump_file_public_auto',
  'VALUE' => '1',
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'main',
  'NAME' => 'dump_integrity_check',
  'VALUE' => '0',
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'main',
  'NAME' => 'dump_integrity_check_auto',
  'VALUE' => '1',
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'main',
  'NAME' => 'dump_max_exec_time',
  'VALUE' => '30',
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'main',
  'NAME' => 'dump_max_exec_time_auto',
  'VALUE' => '20',
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'main',
  'NAME' => 'dump_max_exec_time_sleep',
  'VALUE' => '3',
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'main',
  'NAME' => 'dump_max_exec_time_sleep_auto',
  'VALUE' => '3',
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'main',
  'NAME' => 'dump_max_file_size',
  'VALUE' => '0',
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'main',
  'NAME' => 'dump_max_file_size_auto',
  'VALUE' => '0',
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'main',
  'NAME' => 'dump_old_cnt_auto',
  'VALUE' => '3',
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'main',
  'NAME' => 'dump_old_size_auto',
  'VALUE' => '0',
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'main',
  'NAME' => 'dump_old_time_auto',
  'VALUE' => '0',
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'main',
  'NAME' => 'dump_site_id',
  'VALUE' => 
  array (
  ),
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'main',
  'NAME' => 'dump_site_id_auto',
  'VALUE' => NULL,
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'main',
  'NAME' => 'dump_temporary_cache',
  'VALUE' => 'Bn0yNYf7w8NTSSqZheIfSRlGSDfRt2Eb',
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'main',
  'NAME' => 'dump_use_compression',
  'VALUE' => '0',
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'main',
  'NAME' => 'dump_use_compression_auto',
  'VALUE' => '1',
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'main',
  'NAME' => 'duplicates_max_size',
  'VALUE' => '100',
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'main',
  'NAME' => 'email_from',
  'VALUE' => 'mail@riche.skin',
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'main',
  'NAME' => 'error_reporting',
  'VALUE' => '85',
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'main',
  'NAME' => 'event_log_block_user',
  'VALUE' => 'N',
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'main',
  'NAME' => 'event_log_cleanup_days',
  'VALUE' => '7',
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'main',
  'NAME' => 'event_log_file_access',
  'VALUE' => 'N',
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'main',
  'NAME' => 'event_log_group_policy',
  'VALUE' => 'N',
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'main',
  'NAME' => 'event_log_login_fail',
  'VALUE' => 'N',
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'main',
  'NAME' => 'event_log_login_success',
  'VALUE' => 'N',
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'main',
  'NAME' => 'event_log_logout',
  'VALUE' => 'N',
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'main',
  'NAME' => 'event_log_marketplace',
  'VALUE' => 'N',
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'main',
  'NAME' => 'event_log_module_access',
  'VALUE' => 'N',
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'main',
  'NAME' => 'event_log_password_change',
  'VALUE' => 'N',
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'main',
  'NAME' => 'event_log_password_request',
  'VALUE' => 'N',
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'main',
  'NAME' => 'event_log_permissions_fail',
  'VALUE' => 'N',
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'main',
  'NAME' => 'event_log_register',
  'VALUE' => 'N',
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'main',
  'NAME' => 'event_log_register_fail',
  'VALUE' => 'N',
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'main',
  'NAME' => 'event_log_task',
  'VALUE' => 'N',
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'main',
  'NAME' => 'event_log_user_delete',
  'VALUE' => 'N',
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'main',
  'NAME' => 'event_log_user_edit',
  'VALUE' => 'N',
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'main',
  'NAME' => 'event_log_user_groups',
  'VALUE' => 'N',
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'main',
  'NAME' => 'fill_to_mail',
  'VALUE' => 'N',
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'main',
  'NAME' => 'gather_catalog_stat',
  'VALUE' => 'Y',
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'main',
  'NAME' => 'GROUP_DEFAULT_RIGHT',
  'VALUE' => 'D',
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'main',
  'NAME' => 'GROUP_DEFAULT_TASK',
  'VALUE' => '1',
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'main',
  'NAME' => 'hide_panel_for_users',
  'VALUE' => NULL,
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'main',
  'NAME' => 'image_resize_quality',
  'VALUE' => '95',
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'main',
  'NAME' => 'imageeditor_proxy_enabled',
  'VALUE' => 'N',
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'main',
  'NAME' => 'imageeditor_proxy_white_list',
  'VALUE' => NULL,
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'main',
  'NAME' => 'inactive_users_block_days',
  'VALUE' => '0',
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'main',
  'NAME' => 'last_backup_end_time',
  'VALUE' => '0',
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'main',
  'NAME' => 'last_backup_start_time',
  'VALUE' => '0',
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'main',
  'NAME' => 'last_mp_modules_result',
  'VALUE' => 
  array (
    'check_date' => 1667980804,
    'update_module' => 
    array (
    ),
    'end_update' => 
    array (
    ),
    'new_module' => 
    array (
    ),
  ),
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'main',
  'NAME' => 'mail_additional_parameters',
  'VALUE' => '',
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'main',
  'NAME' => 'mail_event_bulk',
  'VALUE' => '5',
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'main',
  'NAME' => 'mail_event_period',
  'VALUE' => '14',
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'main',
  'NAME' => 'mail_gen_text_version',
  'VALUE' => 'Y',
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'main',
  'NAME' => 'mail_link_protocol',
  'VALUE' => '',
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'main',
  'NAME' => 'map_left_menu_type',
  'VALUE' => 'local',
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'main',
  'NAME' => 'map_top_menu_type',
  'VALUE' => 'main',
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'main',
  'NAME' => 'max_file_size',
  'VALUE' => '0',
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'main',
  'NAME' => 'move_js_to_body',
  'VALUE' => 'N',
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'main',
  'NAME' => 'mp_modules_date',
  'VALUE' => 
  array (
    0 => 
    array (
      'ID' => 'dev2fun.imagecompress',
      'NAME' => 'Оптимизация картинок',
      'TMS' => 1667989468,
    ),
    2 => 
    array (
      'ID' => 'ls.codegeneratorfree',
      'NAME' => 'Массовая генерация символьного кода FREE',
      'TMS' => 1668983008,
    ),
  ),
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'main',
  'NAME' => 'new_user_email_auth',
  'VALUE' => 'Y',
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'main',
  'NAME' => 'new_user_email_required',
  'VALUE' => 'Y',
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'main',
  'NAME' => 'new_user_email_uniq_check',
  'VALUE' => 'Y',
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'main',
  'NAME' => 'new_user_phone_auth',
  'VALUE' => 'Y',
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'main',
  'NAME' => 'new_user_phone_required',
  'VALUE' => 'N',
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'main',
  'NAME' => 'new_user_registration',
  'VALUE' => 'Y',
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'main',
  'NAME' => 'new_user_registration_cleanup_days',
  'VALUE' => '7',
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'main',
  'NAME' => 'new_user_registration_def_group',
  'VALUE' => '3,4',
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'main',
  'NAME' => 'new_user_registration_email_confirmation',
  'VALUE' => 'N',
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'main',
  'NAME' => 'optimize_css_files',
  'VALUE' => 'N',
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'main',
  'NAME' => 'optimize_js_files',
  'VALUE' => 'N',
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'main',
  'NAME' => 'PARAM_MAX_SITES',
  'VALUE' => '0',
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'main',
  'NAME' => 'PARAM_MAX_USERS',
  'VALUE' => '0',
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'main',
  'NAME' => 'phone_number_default_country',
  'VALUE' => '1',
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'main',
  'NAME' => 'profile_history_cleanup_days',
  'VALUE' => '0',
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'main',
  'NAME' => 'profile_image_height',
  'VALUE' => '',
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'main',
  'NAME' => 'profile_image_size',
  'VALUE' => '',
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'main',
  'NAME' => 'profile_image_width',
  'VALUE' => '',
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'main',
  'NAME' => 'rating_assign_authority_group',
  'VALUE' => '4',
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'main',
  'NAME' => 'rating_assign_authority_group_add',
  'VALUE' => '2',
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'main',
  'NAME' => 'rating_assign_authority_group_delete',
  'VALUE' => '2',
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'main',
  'NAME' => 'rating_assign_rating_group',
  'VALUE' => '3',
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'main',
  'NAME' => 'rating_assign_rating_group_add',
  'VALUE' => '1',
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'main',
  'NAME' => 'rating_assign_rating_group_delete',
  'VALUE' => '1',
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'main',
  'NAME' => 'rating_assign_type',
  'VALUE' => 'auto',
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'main',
  'NAME' => 'rating_authority_rating',
  'VALUE' => '2',
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'main',
  'NAME' => 'rating_authority_weight_formula',
  'VALUE' => 'Y',
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'main',
  'NAME' => 'rating_community_authority',
  'VALUE' => '30',
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'main',
  'NAME' => 'rating_community_last_visit',
  'VALUE' => '90',
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'main',
  'NAME' => 'rating_community_size',
  'VALUE' => '1',
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'main',
  'NAME' => 'rating_count_vote',
  'VALUE' => '10',
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'main',
  'NAME' => 'rating_normalization',
  'VALUE' => '10',
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'main',
  'NAME' => 'rating_normalization_type',
  'VALUE' => 'auto',
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'main',
  'NAME' => 'rating_self_vote',
  'VALUE' => 'Y',
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'main',
  'NAME' => 'rating_start_authority',
  'VALUE' => '3',
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'main',
  'NAME' => 'rating_text_like_d',
  'VALUE' => 'Это нравится',
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'main',
  'NAME' => 'rating_text_like_n',
  'VALUE' => 'Не нравится',
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'main',
  'NAME' => 'rating_text_like_y',
  'VALUE' => 'Нравится',
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'main',
  'NAME' => 'rating_vote_show',
  'VALUE' => 'Y',
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'main',
  'NAME' => 'rating_vote_template',
  'VALUE' => 'like',
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'main',
  'NAME' => 'rating_vote_type',
  'VALUE' => 'like',
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'main',
  'NAME' => 'rating_vote_weight',
  'VALUE' => '10',
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'main',
  'NAME' => 'rcm_component_usage',
  'VALUE' => '1668996603',
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'main',
  'NAME' => 'save_original_file_name',
  'VALUE' => 'Y',
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'main',
  'NAME' => 'secure_logout',
  'VALUE' => 'Y',
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'main',
  'NAME' => 'send_mid',
  'VALUE' => 'Y',
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'main',
  'NAME' => 'server_name',
  'VALUE' => 'riche.local',
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'main',
  'NAME' => 'server_uniq_id',
  'VALUE' => 'cf7e793eba359c7dbcead30eb98a077a',
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'main',
  'NAME' => 'session_auth_only',
  'VALUE' => 'Y',
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'main',
  'NAME' => 'session_expand',
  'VALUE' => 'Y',
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'main',
  'NAME' => 'session_id_ttl',
  'VALUE' => '60',
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'main',
  'NAME' => 'session_show_message',
  'VALUE' => 'Y',
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'main',
  'NAME' => 'show_panel_for_users',
  'VALUE' => NULL,
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'main',
  'NAME' => 'signer_default_key',
  'VALUE' => '15297fa6a3b7c7ea7b51d90714dfec85d275171f11d60741eb0931ac04437531b080d4954e6f88e9b11b7bd1a14b42aeda28af3f54965c6e8b29f60d983d9477',
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'main',
  'NAME' => 'site_checker_success',
  'VALUE' => 'Y',
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'main',
  'NAME' => 'site_name',
  'VALUE' => 'riche.local',
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'main',
  'NAME' => 'skip_mask',
  'VALUE' => '1',
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'main',
  'NAME' => 'skip_mask_array',
  'VALUE' => 
  array (
    0 => '/upload/resize_cache',
  ),
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'main',
  'NAME' => 'skip_mask_array_auto',
  'VALUE' => NULL,
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'main',
  'NAME' => 'skip_mask_auto',
  'VALUE' => '0',
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'main',
  'NAME' => 'smile_gallery_id',
  'VALUE' => '1',
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'main',
  'NAME' => 'sms_default_service',
  'VALUE' => '',
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'main',
  'NAME' => 'stable_versions_only',
  'VALUE' => 'Y',
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'main',
  'NAME' => 'store_password',
  'VALUE' => 'Y',
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'main',
  'NAME' => 'strong_update_check',
  'VALUE' => 'Y',
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'main',
  'NAME' => 'track_outgoing_emails_click',
  'VALUE' => 'Y',
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'main',
  'NAME' => 'track_outgoing_emails_read',
  'VALUE' => 'Y',
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'main',
  'NAME' => 'translate_key_yandex',
  'VALUE' => '',
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'main',
  'NAME' => 'translit_original_file_name',
  'VALUE' => 'Y',
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'main',
  'NAME' => 'update_autocheck',
  'VALUE' => '',
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'main',
  'NAME' => 'update_devsrv',
  'VALUE' => 'Y',
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'main',
  'NAME' => 'update_is_gzip_installed',
  'VALUE' => 'Y',
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'main',
  'NAME' => 'update_load_timeout',
  'VALUE' => '30',
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'main',
  'NAME' => 'update_safe_mode',
  'VALUE' => 'N',
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'main',
  'NAME' => 'update_site',
  'VALUE' => 'www.1c-bitrix.ru',
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'main',
  'NAME' => 'update_site_ns',
  'VALUE' => 'Y',
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'main',
  'NAME' => 'update_site_proxy_addr',
  'VALUE' => '',
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'main',
  'NAME' => 'update_site_proxy_pass',
  'VALUE' => '',
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'main',
  'NAME' => 'update_site_proxy_port',
  'VALUE' => '',
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'main',
  'NAME' => 'update_site_proxy_user',
  'VALUE' => '',
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'main',
  'NAME' => 'update_stop_autocheck',
  'VALUE' => 'N',
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'main',
  'NAME' => 'update_system_check',
  'VALUE' => '21.11.2022 06:00:38',
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'main',
  'NAME' => 'update_system_update',
  'VALUE' => '21.11.2022 01:21:29',
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'main',
  'NAME' => 'upload_dir',
  'VALUE' => 'upload',
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'main',
  'NAME' => 'url_preview_enable',
  'VALUE' => 'N',
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'main',
  'NAME' => 'url_preview_save_images',
  'VALUE' => 'N',
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'main',
  'NAME' => 'use_digest_auth',
  'VALUE' => 'N',
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'main',
  'NAME' => 'use_encrypted_auth',
  'VALUE' => 'Y',
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'main',
  'NAME' => 'use_hot_keys',
  'VALUE' => 'N',
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'main',
  'NAME' => 'use_minified_assets',
  'VALUE' => 'N',
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'main',
  'NAME' => 'use_secure_password_cookies',
  'VALUE' => 'N',
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'main',
  'NAME' => 'use_session_id_ttl',
  'VALUE' => 'N',
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'main',
  'NAME' => 'use_time_zones',
  'VALUE' => 'N',
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'main',
  'NAME' => 'user_device_geodata',
  'VALUE' => 'Y',
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'main',
  'NAME' => 'user_device_history',
  'VALUE' => 'Y',
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'main',
  'NAME' => 'user_device_notify',
  'VALUE' => 'N',
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'main',
  'NAME' => 'user_profile_history',
  'VALUE' => 'Y',
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'main',
  'NAME' => 'vendor',
  'VALUE' => '1c_bitrix',
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'messageservice',
  'NAME' => 'clean_up_period',
  'VALUE' => '14',
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'messageservice',
  'NAME' => 'sender.sms.ednaru',
  'VALUE' => 
  array (
    'is_migrated_to_new_api' => 'Y',
  ),
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'sale',
  'NAME' => 'account_number_template',
  'VALUE' => '',
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'sale',
  'NAME' => 'ADDRESS_different_set',
  'VALUE' => 'N',
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'sale',
  'NAME' => 'affiliate_life_time',
  'VALUE' => '30',
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'sale',
  'NAME' => 'affiliate_param_name',
  'VALUE' => 'partner',
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'sale',
  'NAME' => 'affiliate_plan_type',
  'VALUE' => 'N',
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'sale',
  'NAME' => 'allow_deduction_on_delivery',
  'VALUE' => NULL,
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'sale',
  'NAME' => 'allow_guest_order_view',
  'VALUE' => NULL,
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'sale',
  'NAME' => 'allow_guest_order_view_paths',
  'VALUE' => 
  array (
    's1' => '',
  ),
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'sale',
  'NAME' => 'allow_guest_order_view_status',
  'VALUE' => 
  array (
  ),
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'sale',
  'NAME' => 'allow_pay_status',
  'VALUE' => 'N',
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'sale',
  'NAME' => 'archive_blocked_order',
  'VALUE' => 'Y',
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'sale',
  'NAME' => 'archive_limit',
  'VALUE' => '10',
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'sale',
  'NAME' => 'archive_params',
  'VALUE' => 
  array (
    'PERIOD' => 365,
    'STATUS_ID' => 
    array (
      0 => 'N',
      1 => 'F',
    ),
  ),
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'sale',
  'NAME' => 'archive_time_limit',
  'VALUE' => '5',
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'sale',
  'NAME' => 'basket_discount_converted',
  'VALUE' => 'Y',
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'sale',
  'NAME' => 'basket_refresh_gap',
  'VALUE' => '0',
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'sale',
  'NAME' => 'check_type_on_pay',
  'VALUE' => 'sell',
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'sale',
  'NAME' => 'COUNT_DELIVERY_TAX',
  'VALUE' => 'N',
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'sale',
  'NAME' => 'COUNT_DISCOUNT_4_ALL_QUANTITY',
  'VALUE' => 'N',
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'sale',
  'NAME' => 'crypt_algorithm',
  'VALUE' => 'RC4',
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'sale',
  'NAME' => 'default_currency',
  'VALUE' => 'RUB',
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'sale',
  'NAME' => 'delete_after',
  'VALUE' => '',
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'sale',
  'NAME' => 'delivery_handles_custom_path',
  'VALUE' => '/bitrix/php_interface/include/sale_delivery/',
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'sale',
  'NAME' => 'encode_fuser_id',
  'VALUE' => 'N',
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'sale',
  'NAME' => 'expiration_processing_events',
  'VALUE' => 'Y',
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'sale',
  'NAME' => 'format_quantity',
  'VALUE' => 'AUTO',
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'sale',
  'NAME' => 'get_discount_percent_from_base_price',
  'VALUE' => 'N',
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'sale',
  'NAME' => 'GRAPH_HEIGHT',
  'VALUE' => '600',
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'sale',
  'NAME' => 'GRAPH_WEIGHT',
  'VALUE' => '800',
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'sale',
  'NAME' => 'GROUP_DEFAULT_RIGHT',
  'VALUE' => 'D',
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'sale',
  'NAME' => 'location',
  'VALUE' => '',
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'sale',
  'NAME' => 'location_zip',
  'VALUE' => '',
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'sale',
  'NAME' => 'lock_catalog',
  'VALUE' => 'Y',
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'sale',
  'NAME' => 'MAX_LOCK_TIME',
  'VALUE' => '30',
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'sale',
  'NAME' => 'measurement_path',
  'VALUE' => '/bitrix/modules/sale/measurements.php',
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'sale',
  'NAME' => 'order_changes_cleaner_active',
  'VALUE' => 'Y',
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'sale',
  'NAME' => 'order_changes_cleaner_days',
  'VALUE' => '30',
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'sale',
  'NAME' => 'order_changes_cleaner_limit',
  'VALUE' => '10000',
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'sale',
  'NAME' => 'order_email',
  'VALUE' => 'order@riche.skin',
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'sale',
  'NAME' => 'order_history_action_log_level',
  'VALUE' => '1',
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'sale',
  'NAME' => 'order_history_log_level',
  'VALUE' => '1',
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'sale',
  'NAME' => 'order_list_date',
  'VALUE' => '30',
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'sale',
  'NAME' => 'order_list_fields',
  'VALUE' => 'ID,USER,PAY_SYSTEM,PRICE,STATUS,PAYED,PS_STATUS,CANCELED,BASKET',
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'sale',
  'NAME' => 'p2p_allow_collect_data',
  'VALUE' => 'Y',
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'sale',
  'NAME' => 'p2p_del_exp',
  'VALUE' => '10',
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'sale',
  'NAME' => 'p2p_del_period',
  'VALUE' => '10',
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'sale',
  'NAME' => 'p2p_status_list',
  'VALUE' => 
  array (
    0 => 'N',
    1 => 'F',
    2 => 'F_CANCELED',
    3 => 'F_DELIVERY',
    4 => 'F_PAY',
    5 => 'F_OUT',
  ),
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'sale',
  'NAME' => 'path2user_ps_files',
  'VALUE' => '/bitrix/php_interface/include/sale_payment/',
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'sale',
  'NAME' => 'pay_amount',
  'VALUE' => 
  array (
    1 => 
    array (
      'AMOUNT' => 100.0,
      'CURRENCY' => 'RUB',
    ),
    2 => 
    array (
      'AMOUNT' => 500.0,
      'CURRENCY' => 'RUB',
    ),
    3 => 
    array (
      'AMOUNT' => 1000.0,
      'CURRENCY' => 'RUB',
    ),
    4 => 
    array (
      'AMOUNT' => 2500.0,
      'CURRENCY' => 'RUB',
    ),
  ),
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'sale',
  'NAME' => 'pay_reminder',
  'VALUE' => 
  array (
    's1' => 
    array (
      'after' => '0',
      'frequency' => '0',
      'period' => '0',
    ),
  ),
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'sale',
  'NAME' => 'product_reserve_clear_period',
  'VALUE' => '3',
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'sale',
  'NAME' => 'product_reserve_condition',
  'VALUE' => 'O',
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'sale',
  'NAME' => 'product_viewed_save',
  'VALUE' => 'N',
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'sale',
  'NAME' => 'QUANTITY_FACTORIAL',
  'VALUE' => 'N',
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'sale',
  'NAME' => 'regular_archive_active',
  'VALUE' => 'Y',
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'sale',
  'NAME' => 'SALE_ADMIN_NEW_PRODUCT',
  'VALUE' => 'N',
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'sale',
  'NAME' => 'sale_data_file',
  'VALUE' => '',
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'sale',
  'NAME' => 'sale_location_selector_appearance',
  'VALUE' => 'steps',
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'sale',
  'NAME' => 'sale_locationpro_enabled',
  'VALUE' => 'Y',
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'sale',
  'NAME' => 'sale_locationpro_import_performed',
  'VALUE' => 'Y',
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'sale',
  'NAME' => 'sale_locationpro_migrated',
  'VALUE' => 'Y',
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'sale',
  'NAME' => 'sale_ps_fail_path',
  'VALUE' => '/',
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'sale',
  'NAME' => 'sale_ps_success_path',
  'VALUE' => '/',
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'sale',
  'NAME' => 'sale.location.index_recheck_counter',
  'VALUE' => '3',
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'sale',
  'NAME' => 'sale.location.index_valid',
  'VALUE' => 'Y',
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'sale',
  'NAME' => 'sale.location.indexed_langs',
  'VALUE' => 'ru:en',
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'sale',
  'NAME' => 'sale.location.indexed_types',
  'VALUE' => '',
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'sale',
  'NAME' => 'shipment_status_on_allow_delivery',
  'VALUE' => '',
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'sale',
  'NAME' => 'shipment_status_on_shipped',
  'VALUE' => '',
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'sale',
  'NAME' => 'SHOP_SITE_s1',
  'VALUE' => 's1',
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'sale',
  'NAME' => 'show_basket_props_in_order_list',
  'VALUE' => 'Y',
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'sale',
  'NAME' => 'show_order_product_xml_id',
  'VALUE' => 'N',
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'sale',
  'NAME' => 'show_order_sum',
  'VALUE' => 'N',
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'sale',
  'NAME' => 'show_paysystem_action_id',
  'VALUE' => 'N',
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'sale',
  'NAME' => 'status_on_allow_delivery',
  'VALUE' => '',
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'sale',
  'NAME' => 'status_on_allow_delivery_one_of',
  'VALUE' => '',
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'sale',
  'NAME' => 'status_on_change_allow_delivery_after_paid',
  'VALUE' => 'N',
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'sale',
  'NAME' => 'status_on_half_paid',
  'VALUE' => '',
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'sale',
  'NAME' => 'status_on_paid',
  'VALUE' => '',
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'sale',
  'NAME' => 'status_on_payed_2_allow_delivery',
  'VALUE' => NULL,
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'sale',
  'NAME' => 'status_on_shipped_shipment',
  'VALUE' => '',
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'sale',
  'NAME' => 'status_on_shipped_shipment_one_of',
  'VALUE' => '',
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'sale',
  'NAME' => 'subscribe_prod',
  'VALUE' => 
  array (
    's1' => 
    array (
      'del_after' => '0',
    ),
  ),
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'sale',
  'NAME' => 'tracking_check_period',
  'VALUE' => '24',
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'sale',
  'NAME' => 'tracking_check_switch',
  'VALUE' => 'N',
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'sale',
  'NAME' => 'tracking_map_statuses',
  'VALUE' => 
  array (
  ),
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'sale',
  'NAME' => 'use_ccards',
  'VALUE' => 'Y',
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'sale',
  'NAME' => 'use_sale_discount_only',
  'VALUE' => 'Y',
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'sale',
  'NAME' => 'use_secure_cookies',
  'VALUE' => 'N',
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'sale',
  'NAME' => 'value_precision',
  'VALUE' => '2',
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'sale',
  'NAME' => 'viewed_capability',
  'VALUE' => 'N',
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'sale',
  'NAME' => 'viewed_count',
  'VALUE' => '10',
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'sale',
  'NAME' => 'viewed_time',
  'VALUE' => '5',
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'sale',
  'NAME' => 'WEIGHT_different_set',
  'VALUE' => 'N',
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'sale',
  'NAME' => 'weight_koef',
  'VALUE' => '1',
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'sale',
  'NAME' => 'weight_unit',
  'VALUE' => 'г',
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'search',
  'NAME' => 'agent_duration',
  'VALUE' => '30',
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'search',
  'NAME' => 'agent_stemming',
  'VALUE' => 'Y',
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'search',
  'NAME' => 'dbnode_id',
  'VALUE' => 'N',
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'search',
  'NAME' => 'dbnode_status',
  'VALUE' => 'ok',
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'search',
  'NAME' => 'exclude_mask',
  'VALUE' => '/bitrix/*;/404.php;/upload/*;*/.hg/*;*/.svn/*;*/.git/*;*/cgi-bin/*;/bitrix_personal/*;/local/*',
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'search',
  'NAME' => 'full_text_engine',
  'VALUE' => 'bitrix',
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'search',
  'NAME' => 'include_mask',
  'VALUE' => '*.php;*.html;*.htm',
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'search',
  'NAME' => 'letters',
  'VALUE' => '-',
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'search',
  'NAME' => 'max_body_size',
  'VALUE' => '100000',
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'search',
  'NAME' => 'max_file_size',
  'VALUE' => '',
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'search',
  'NAME' => 'max_result_size',
  'VALUE' => '500',
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'search',
  'NAME' => 'mysql_note',
  'VALUE' => NULL,
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'search',
  'NAME' => 'page_tag_property',
  'VALUE' => 'tags',
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'search',
  'NAME' => 'sphinx_connection',
  'VALUE' => '127.0.0.1:9306',
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'search',
  'NAME' => 'sphinx_index_name',
  'VALUE' => 'bitrix',
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'search',
  'NAME' => 'sphinx_note',
  'VALUE' => NULL,
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'search',
  'NAME' => 'stat_phrase',
  'VALUE' => 'Y',
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'search',
  'NAME' => 'stat_phrase_save_days',
  'VALUE' => '360',
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'search',
  'NAME' => 'suggest_save_days',
  'VALUE' => '30',
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'search',
  'NAME' => 'use_social_rating',
  'VALUE' => 'Y',
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'search',
  'NAME' => 'use_stemming',
  'VALUE' => 'Y',
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'search',
  'NAME' => 'use_tf_cache',
  'VALUE' => 'N',
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'search',
  'NAME' => 'use_word_distance',
  'VALUE' => 'Y',
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'search',
  'NAME' => 'version',
  'VALUE' => 'v2.0',
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'sender',
  'NAME' => '~mail_max_consent_requests',
  'VALUE' => '1',
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'sender',
  'NAME' => 'address_from',
  'VALUE' => '',
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'sender',
  'NAME' => 'address_send_to_me',
  'VALUE' => '',
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'sender',
  'NAME' => 'auto_agent_interval',
  'VALUE' => '0',
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'sender',
  'NAME' => 'auto_method',
  'VALUE' => 'agent',
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'sender',
  'NAME' => 'GROUP_DEFAULT_RIGHT',
  'VALUE' => 'D',
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'sender',
  'NAME' => 'interval',
  'VALUE' => '20',
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'sender',
  'NAME' => 'link_protocol',
  'VALUE' => '',
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'sender',
  'NAME' => 'mail_consent',
  'VALUE' => 'Y',
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'sender',
  'NAME' => 'mail_headers',
  'VALUE' => 
  array (
  ),
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'sender',
  'NAME' => 'max_emails_per_cron',
  'VALUE' => '500',
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'sender',
  'NAME' => 'max_emails_per_hit',
  'VALUE' => '500',
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'sender',
  'NAME' => 'reiterate_interval',
  'VALUE' => '60',
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'sender',
  'NAME' => 'reiterate_method',
  'VALUE' => 'agent',
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'sender',
  'NAME' => 'sub_link',
  'VALUE' => '',
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'sender',
  'NAME' => 'thread_type',
  'VALUE' => 'Single',
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'sender',
  'NAME' => 'track_mails',
  'VALUE' => 'Y',
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'sender',
  'NAME' => 'unsub_link',
  'VALUE' => '',
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'socialservices',
  'NAME' => 'allow_encrypted_tokens',
  'VALUE' => '1',
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'socialservices',
  'NAME' => 'bitrix24net_domain',
  'VALUE' => 'http://riche.skin',
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'socialservices',
  'NAME' => 'bitrix24net_id',
  'VALUE' => 'ext.636b5cc98c3e74.14444029',
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'socialservices',
  'NAME' => 'bitrix24net_secret',
  'VALUE' => 'BxEw8OV4rKHAUnuqJB1NAe6xfatwivpo72bmjpTI7RJ4NZy0pA',
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'socialservices',
  'NAME' => 'google_api_key',
  'VALUE' => 'AIzaSyA7puwZwGDJgOjcAWsFsY7hQcrioC13A18',
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'socialservices',
  'NAME' => 'google_appid',
  'VALUE' => '798910771106.apps.googleusercontent.com',
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'sprint.editor',
  'NAME' => 'instagram_app_id',
  'VALUE' => '2741760692768967',
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'sprint.editor',
  'NAME' => 'instagram_app_secret',
  'VALUE' => '828e97ef193404e336cbc1e7e9628412',
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'sprint.editor',
  'NAME' => 'load_dotjs',
  'VALUE' => 'yes',
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'sprint.editor',
  'NAME' => 'load_jquery',
  'VALUE' => 'no',
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'sprint.editor',
  'NAME' => 'load_jquery_ui',
  'VALUE' => 'yes',
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'sprint.migration',
  'NAME' => 'schema_agentschema',
  'VALUE' => 'd1a63a2bcfbda9140ed8c3e66dbca8a5',
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'sprint.migration',
  'NAME' => 'schema_eventschema',
  'VALUE' => 'f116b160e99e1915271ba2561279c363',
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'sprint.migration',
  'NAME' => 'schema_groupschema',
  'VALUE' => '984d24691e27ad38189e2113fb52ea20',
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'sprint.migration',
  'NAME' => 'schema_hlblockschema',
  'VALUE' => '2ed6e3db11d8fba8489021d31beee255',
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'sprint.migration',
  'NAME' => 'schema_iblockschema',
  'VALUE' => 'd65c2e9189b8edda1587396b6a9e374c',
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'sprint.migration',
  'NAME' => 'schema_optionschema',
  'VALUE' => 'e36108545b187828fc709d10bf088bce',
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'sprint.migration',
  'NAME' => 'schema_usertypeentitiesschema',
  'VALUE' => '9672e5e38e9b1566feaee97f5d0a780c',
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'sprint.migration',
  'NAME' => 'upgrade3_0cb1fbfb39557866ff1875c8228ecb05',
  'VALUE' => '1',
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'storeassist',
  'NAME' => 'num_orders',
  'VALUE' => 
  array (
    'newDay' => 0,
    'prevDay' => 0,
  ),
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'storeassist',
  'NAME' => 'progress_percent',
  'VALUE' => '0',
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'vote',
  'NAME' => 'VOTE_COMPATIBLE_OLD_TEMPLATE',
  'VALUE' => 'N',
));
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'vote',
  'NAME' => 'VOTE_DIR',
  'VALUE' => '',
));
    }

    public function down()
    {
        //your code ...
    }
}
