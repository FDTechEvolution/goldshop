<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Controller\Component;

use Cake\Controller\Component;
use Cake\ORM\TableRegistry;
use upload;

/**
 * Description of Utils
 * use vendor https://www.verot.net/php_class_upload_samples.htm
 * enter require_once(ROOT . DS.'vendor' . DS  . 'class-upload-php-master' . DS . 'src' . DS . 'class.upload.php');
 * 
 * @author sakorn.s
 */
class UploadImageComponent extends Component {

    public $COVER_UPLOAD = 'img/uploads/cover/';
    public $PathOrder = 'img/uploads/order/';
    public $PathDesign = 'img/uploads/design/';
    public $PathProduct = 'img/uploads/product/';
    public $PathPawn = 'img/uploads/pawn/';
    public $Images = null;
    public $components = ['Core', 'Util', 'Authen'];

    public function uploadCover($file = null) {
        //$this->log($file,'debug');
        $handle = new upload($file);
        $data = [];
        if ($handle->uploaded) {
            $setNewFileName = 'article-cover-' . time() . "_" . rand(000000, 999999);
            $handle->file_new_name_body = $setNewFileName;
            $handle->image_resize = true;
            $handle->image_ratio_crop = 'L';
            $handle->image_y = 450;
            $handle->image_x = 500;
            $handle->process(WWW_ROOT . $this->COVER_UPLOAD);
            if ($handle->processed) {
                //$this->log($handle->file_dst_name,'debug');
                $image_id = $this->getSaveImage($handle, '/' . $this->COVER_UPLOAD);
                $handle->clean();
                $data = [
                    'status' => '200',
                    'image_id' => $image_id
                ];
            } else {
                $this->log($handle->error, 'debug');
                $data = [
                    'status' => '500',
                    'image_id' => null
                ];
            }

            return $data;
        }
    }

    public function uploadOrder($file = null) {
        //$this->log($file,'debug');
        $handle = new upload($file);
        $data = [];
        if ($handle->uploaded) {
            $setNewFileName = 'order-' . time() . "_" . rand(000000, 999999);
            $handle->file_new_name_body = $setNewFileName;
            $handle->image_resize = true;
            $handle->image_ratio_pixels = 500000;
            //$handle->image_ratio_crop = 'L';
            //$handle->image_y = 200;
            //$handle->image_x = 200;
            $handle->process(WWW_ROOT . $this->PathOrder);
            if ($handle->processed) {
                //$this->log($handle->file_dst_name,'debug');
                $image_id = $this->getSaveImage($handle, '/' . $this->PathOrder);
                $handle->clean();
                $data = [
                    'status' => '200',
                    'image_id' => $image_id
                ];
            } else {
                $this->log($handle->error, 'debug');
                $data = [
                    'status' => '500',
                    'image_id' => null
                ];
            }

            return $data;
        }
    }

    public function uploadNormal($file = null) {
        //$this->log($file,'debug');
        $handle = new upload($file);
        $data = [];
        if ($handle->uploaded) {
            $setNewFileName = 'knowledge-image-' . time() . "_" . rand(000000, 999999);
            $handle->file_new_name_body = $setNewFileName;
            $handle->image_resize = true;
            $handle->image_ratio_pixels = 500000;
            //$handle->image_ratio_crop = 'L';
            //$handle->image_y = 200;
            //$handle->image_x = 200;
            $handle->process(WWW_ROOT . $this->COVER_UPLOAD);
            if ($handle->processed) {
                $this->log($handle->file_dst_name, 'debug');
                $image_id = $this->getSaveImage($handle, '/' . $this->COVER_UPLOAD);
                $handle->clean();
                $data = [
                    'status' => '200',
                    'image_id' => $image_id
                ];
            } else {
                $this->log($handle->error, 'debug');
                $data = [
                    'status' => '500',
                    'image_id' => null
                ];
            }

            return $data;
        }
    }

    public function uploadDesign($file = null) {
        // $this->log($file,'debug');
        $handle = new upload($file);

        $data = [];
        if ($handle->uploaded) {
            $setNewFileName = 'design-image-' . time() . "_" . rand(000000, 999999);
            $handle->file_new_name_body = $setNewFileName;
            $handle->image_resize = true;
            $handle->image_ratio_pixels = 500000;
            //$handle->image_ratio_crop = 'L';
            //$handle->image_y = 200;
            //$handle->image_x = 200;
            $handle->process(WWW_ROOT . $this->PathDesign);
            if ($handle->processed) {
                $this->log($handle->file_dst_name, 'debug');
                $image_id = $this->getSaveImage($handle, '/' . $this->PathDesign);
                $handle->clean();
                $data = [
                    'status' => '200',
                    'image_id' => $image_id
                ];
            } else {
                $this->log($handle->error, 'debug');
                $data = [
                    'status' => '500',
                    'image_id' => null
                ];
            }
            // $this->log($handle,'debug');
            return $data;
        }
    }

    public function uploadproductimage($file = null) {
        //$this->log($file,'debug');
        $handle = new upload($file);

        $data = [];
        if ($handle->uploaded) {
            $setNewFileName = 'product-image-' . time() . "_" . rand(000000, 999999);
            $handle->file_new_name_body = $setNewFileName;
            $handle->image_resize = true;
            $handle->image_ratio_pixels = 500000;
            //$handle->image_ratio_crop = 'L';
            //$handle->image_y = 200;
            //$handle->image_x = 200;
            $handle->process(WWW_ROOT . $this->PathProduct);
            if ($handle->processed) {
                $this->log($handle->file_dst_name, 'debug');
                $image_id = $this->getSaveImage($handle, '/' . $this->PathProduct);
                $handle->clean();
                $data = [
                    'status' => '200',
                    'image_id' => $image_id
                ];
            } else {
                $this->log($handle->error, 'debug');
                $data = [
                    'status' => '500',
                    'image_id' => null
                ];
            }
            $this->log($image_id,'debug');
            return $data;
        }
    }
    public function uploadpawnimage($file = null) {
        // $this->log($file,'debug');
        $handle = new upload($file);

        $data = [];
        if ($handle->uploaded) {
            $setNewFileName = 'product-image-' . time() . "_" . rand(000000, 999999);
            $handle->file_new_name_body = $setNewFileName;
            $handle->image_resize = true;
            $handle->image_ratio_pixels = 500000;
            //$handle->image_ratio_crop = 'L';
            //$handle->image_y = 200;
            //$handle->image_x = 200;
            $handle->process(WWW_ROOT . $this->PathPawn);
            if ($handle->processed) {
                $this->log($handle->file_dst_name, 'debug');
                $image_id = $this->getSaveImage($handle,  $this->PathPawn);
                $handle->clean();
                $data = [
                    'status' => '200',
                    'image_id' => $image_id
                ];
            } else {
                $this->log($handle->error, 'debug');
                $data = [
                    'status' => '500',
                    'image_id' => null
                ];
            }
            // $this->log($handle,'debug');
            return $data;
        }
    }

    private function getSaveImage($handle = null, $path = '') {
        $this->Images = TableRegistry::get('Images');
        $image = $this->Images->newEntity();

        $image->name = $handle->file_dst_name;
        $image->org_id = $this->Core->getLocalOrgId();
        $image->type = $handle->image_src_type;
        $image->path = $path . $handle->file_dst_name;
        $image->fullpath = $handle->file_dst_pathname;
        $image->description = 'file_src_name:' . $handle->file_src_name . ', resize from:' . $handle->image_src_x . 'X' . $handle->image_src_y;
        $image->createdby = '0';

        if ($this->Images->save($image)) {
            return $image->id;
        }else{
            $this->log($image->errors(),'debug');
        }
        return null;
    }

}
