<?php

namespace App\Controller\Component;

use Cake\Controller\Component;
use Cake\ORM\TableRegistry;

class DocSequentComponent extends Component {

    public $SequentNumbers = null;
    public $components = ['Core'];

    public function getLatest($doceCode = null) {
        $data = $this->getLast($doceCode);
        return $data['docno'];
    }

    public function getLatestAndSave($doceCode = null) {

        $data = $this->getLast($doceCode);
        $documentNo = $data['docno'];
        if (!$data['docSequent'] == null) {
            $docSequent = $data['docSequent'];
            $docSequent->current_no = $docSequent->current_no + 1;
            $docSequent->current_sequent = $documentNo;
            $this->SequentNumbers->save($docSequent);
        }


        return $documentNo;
    }

    private function getLast($doceCode) {
        $data = [];
        if (is_null($doceCode)) {
            $data['docno'] = 'ไม่พบหมายเลขเอกสาร';
            $data['docSequent'] = null;
        }

        $this->SequentNumbers = TableRegistry::get('SequentNumbers');
        $q = $this->SequentNumbers->find()
                ->where([
            'SequentNumbers.doccode' => $doceCode,
            'SequentNumbers.isactive' => 'Y',
            'OR' => [
                ['SequentNumbers.branch_id' => '0'],
                ['SequentNumbers.branch_id' => $this->Core->getLocalBranchId()]
            ]
        ]);

        $documentNo = '';
        if (sizeof($q->toArray()) > 0) {
            $docSequent = $q->first();
            $data['docno'] = $this->generateDocumentNo($docSequent);
            $data['docSequent'] = $docSequent;
        } else {
            $data['docno'] = 'ไม่พบหมายเลขเอกสาร';
            $data['docSequent'] = null;
        }

        return $data;
    }

    private function generateDocumentNo($docSequent) {
        $documentNo = sprintf("%'.0" . $docSequent->running_length . "d", ($docSequent->current_no + 1));
        $documentNo = $docSequent->prefix . $documentNo . $docSequent->suffix;
        return $documentNo;
    }

}
