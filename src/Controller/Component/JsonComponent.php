<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Controller\Component;

use Cake\Controller\Component;
use Cake\I18n\Time;
use Cake\Filesystem\Folder;
use Cake\Filesystem\File;

/**
 * Description of Utils
 *
 * @author sakorn.s
 */
class JsonComponent extends Component {

    public $Path = ROOT . DS . 'webroot' . DS . 'json' . DS;

    public function read($fileName = '') {
        $file = new File($this->Path . $fileName);
        $json = $file->read(true, 'r');
        $dataArr = json_decode($json, true);

        return $dataArr;
    }
    
    public function readLatestByFolder($floder = '') {
        $dir = new Folder($this->Path . $floder . DS);
        $files = $dir->find('.*\.json');

        foreach ($files as $file) {
            $file = new File($dir->pwd() . DS . $file);
            $json = $file->read(true, 'r');
            $dataArr = json_decode($json, true);


            // $file->write('I am overwriting the contents of this file');
            // $file->append('I am adding to the bottom of this file.');
            // $file->delete(); // I am deleting this file
            $file->close(); // Be sure to close the file when you're done

            return $dataArr;
        }
        return null;
    }

    public function readLatestByModel($modelName = '') {
        $dir = new Folder($this->Path . $modelName . DS);
        $files = $dir->find('.*\.json');

        foreach ($files as $file) {
            $file = new File($dir->pwd() . DS . $file);
            $json = $file->read(true, 'r');
            $dataArr = json_decode($json, true);


            // $file->write('I am overwriting the contents of this file');
            // $file->append('I am adding to the bottom of this file.');
            // $file->delete(); // I am deleting this file
            $file->close(); // Be sure to close the file when you're done

            return $dataArr;
        }
        
        return null;
    }

    public function deleteFilesByModel($modelName = '') {
        $dir = new Folder($this->Path . $modelName . DS);
        $files = $dir->find('.*\.json');
        foreach ($files as $file) {
            $file = new File($dir->pwd() . DS . $file);
            $file->delete();
        }
    }

    public function write($fileName = '_temp.json', $subDirec = '', $dataArr = []) {
        $path = $this->Path;
        if ($subDirec != '') {
            $path = $this->Path . $subDirec . DS;
        }
        $file = new File($path . $fileName, true);
        $file->write(json_encode($dataArr));
    }

}
