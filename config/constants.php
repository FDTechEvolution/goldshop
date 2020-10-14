<?php 

define('DEFAULT_USER', '0');
define('PAGE_TITLE', 'ห้างทองเยาวราช ตรามังกร');

/***********
Document code
**************/
define('ORDER_SALES', 'ODS');
define('ORDER_PURCHASE', 'ODP');
define('INVOICE_SALES', 'IVS');
define('INVOICE_PURCHASE', 'IVP');
define('PAYMENT_IN', 'AR');
define('PAYMENT_OUT', 'AP');
define('SAVING_DEPOSIT', 'SVD');
define('SAVING_WITHDRAW', 'SVW');

/***********BUTTON*********/
define('TB_BT_EDIT','<button type="button" class="btn btn-icon waves-effect waves-light btn-secondary m-b-5"> <i class="fas fa-pencil-alt"></i> </button>');
define('BT_ADD', '<button type="button" class="btn btn-primary waves-effect waves-light"><i class="mdi mdi-plus-circle-multiple-outline"></i> เพิ่ม</button>');
define('BT_CREATE', '<button type="button" class="btn btn-success waves-effect waves-light"><i class="mdi mdi-plus-circle-multiple-outline"></i> สร้างรายการใหม่</button>');

define('BT_BACK', '<button type="button" class="btn btn-secondary waves-effect"><i class="ti-arrow-circle-left"></i> กลับ</button>');
define('BT_EDIT', '<button class="btn btn-icon waves-effect btn-secondary btn-sm"><span class=" ti-marker-alt"></span></button>');
define('BT_VIEW', '<button class="btn btn-icon waves-effect btn-primary btn-sm"><span class="fa fa-eye"></span></button>');
define('BT_DELETE', '<button type="button" class="btn btn-icon waves-effect btn-primary btn-sm"><i class="ti-trash"></i></button>');
define('BT_ADDUSER', '<button type="button" class="btn btn-info btn-block"><i class="ti-plus"></i> เพิ่มผู้ใช้</button>');
define('BT_SAVE', '<button type="submit" id="subm" class="btn btn-primary waves-effect"><i class="mdi mdi-content-save-all"></i> บันทึก</button>');
define('BT_PAYMENT_SAVE', '<button type="button" class="btn btn-block btn-lg btn-outline-secondary waves-effect waves-light m-b-5" data-toggle="modal" data-target="#key_receipt_modal" id="bt_receipt"> <i class="ion-cash m-r-5"></i> <span>รับเงิน</span> </button>');
define('BT_RESET', '<button type="reset" class="btn btn-secondary waves-effect">ล้างข้อมูล</button>');
define('PAGE_LIMIT', 20);
define('REQUIRE_FIELD', '<i class="text-danger"> * </i>');

define('ACTIVE', '<span class="badge badge-success">เปิดใช้งานอยู่</span>');
define('INACTIVE', '<span class="badge badge-warning">ปิดการใช้งาน</span>');
define('YES', '<span class="badge badge-success">ใช่</span>');
define('NO', '<span class="badge badge-warning">ไม่</span>');

//URL saction
define('USERPERMISSION','/users/displaypermission');
define('DEFAULT_HOME_URL','/home');


define('DATE_TIME_FORMATE', 'dd/MM/yyyy HH:mm');
define('TIME_FORMATE', 'HH:mm');
define('DATE_FORMATE', 'dd/MM/yyyy');
define('TH_DATE', 'en-IR@calendar=buddhist');


//MSG
define('MSG_DELETE_SUCCESS', 'ลบข้อมูลแล้ว');
define('MSG_DELETE_ERROR', 'ไม่สามารถลบข้อมูลได้');
define('MSG_DELETE_NOTFOUND', 'ไม่พบข้อมูลหรือข้อมูลโดนลบไปแล้วโดยผู้ใช้งานอื่น');