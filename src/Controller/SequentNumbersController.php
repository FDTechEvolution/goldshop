<?php

namespace App\Controller;

use App\Controller\AppController;

/**
 * SequentNumbers Controller
 *
 * @property \App\Model\Table\SequentNumbersTable $SequentNumbers
 *
 * @method \App\Model\Entity\SequentNumber[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class SequentNumbersController extends AppController {

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index() {
        $where = [];
        //if(!$this->Core->isMultipleBranch()){
        array_push($where, ['SequentNumbers.branch_id' => $this->Core->getLocalBranchId()]);
        // }
        $q = $this->SequentNumbers->find()
                ->contain(['UserCreated', 'Orgs', 'Branches'])
                ->where($where)
                ->order(['SequentNumbers.doccode' => 'ASC']);
        $sequentNumbers = $q->toArray();

        $docTypeCodes = $this->TransactionCode->getDocumentCodes();
        $this->set(compact('sequentNumbers', 'docTypeCodes'));
    }

    /**
     * View method
     *
     * @param string|null $id Sequent Number id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null) {
        $sequentNumber = $this->SequentNumbers->get($id, [
            'contain' => ['Orgs', 'Branches']
        ]);

        $this->set('sequentNumber', $sequentNumber);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add() {
        $sequentNumber = $this->SequentNumbers->newEntity();
        if ($this->request->is('post')) {
            $sequentNumber = $this->SequentNumbers->patchEntity($sequentNumber, $this->request->getData());

            $sequentNumber->createdby = $this->Authen->getAuthenUserId();
            $sequentNumber->current_no = 0;
            $sequentNumber->isactive = 'Y';
            $sequentNumber->org_id = $this->Core->getOrgId();
            
            if (!$this->checkIsDuplicate($sequentNumber->branch_id, $sequentNumber->doccode)) {
                if ($this->SequentNumbers->save($sequentNumber)) {
                    $this->Flash->success(__('เพิ่มหมายเลขเอกสารใหม่แล้ว'));

                    return $this->redirect(['action' => 'index']);
                }
                $this->Flash->error(__('The sequent number could not be saved. Please, try again.'));
            } else {
                $this->Flash->error(__('แต่ละสาขาไม่สามารถบันทึกประเภทเอกสารซ้ำได้'));
            }
        }

        $docTypeCodes = $this->TransactionCode->getDocumentCodes('list');
        
        $branches = $this->SequentNumbers->Branches->find('list', ['limit' => 200]);
        $this->set(compact('sequentNumber', 'branches', 'docTypeCodes'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Sequent Number id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null) {
        $sequentNumber = $this->SequentNumbers->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $sequentNumber = $this->SequentNumbers->patchEntity($sequentNumber, $this->request->getData());

            $sequentNumber->modifiedby = $this->Authen->getAuthenUserId();
            if (!$this->checkIsDuplicate($sequentNumber->branch_id, $sequentNumber->doccode, $sequentNumber->id)) {
                if ($this->SequentNumbers->save($sequentNumber)) {
                    $this->Flash->success(__('The sequent number has been saved.'));

                    return $this->redirect(['action' => 'index']);
                }
                $this->Flash->error(__('The sequent number could not be saved. Please, try again.'));
            } else {
                $this->Flash->error(__('แต่ละสาขาไม่สามารถบันทึกประเภทเอกสารซ้ำได้'));
            }
        }

        $docTypeCodes = $this->TransactionCode->getDocumentCodes('list');
        $orgs = $this->SequentNumbers->Orgs->find('list', ['limit' => 200]);
        $branches = $this->SequentNumbers->Branches->find('list', ['limit' => 200]);
        $this->set(compact('sequentNumber', 'orgs', 'branches', 'docTypeCodes'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Sequent Number id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null) {
        $this->request->allowMethod(['post', 'delete']);
        $sequentNumber = $this->SequentNumbers->get($id);
        if ($this->SequentNumbers->delete($sequentNumber)) {
            $this->Flash->success(__('The sequent number has been deleted.'));
        } else {
            $this->Flash->error(__('The sequent number could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function autoCreateAll() {
        $docTypeCodes = $this->TransactionCode->getDocumentCodes();

        foreach ($docTypeCodes as $item) {
            $sequentNumber = $this->SequentNumbers->newEntity();
            $sequentNumber->doccode = $item['code'];
            $sequentNumber->createdby = $this->Authen->getAuthenUserId();
            $sequentNumber->current_no = 0;
            $sequentNumber->branch_id = $this->Core->getLocalBranchId();
            $sequentNumber->prefix = $item['code'];
            $sequentNumber->start_no = 1;
            $sequentNumber->running_length = 5;
            $sequentNumber->org_id = $this->Core->getLocalOrgId();
            $sequentNumber->isactive ='Y';

            if (!$this->checkIsDuplicate($sequentNumber->branch_id, $sequentNumber->doccode)) {
                if ($this->SequentNumbers->save($sequentNumber)) {
                    
                }
                
            }
        }

        return $this->redirect(['action' => 'index']);
    }

    private function checkIsDuplicate($branch_id = null, $docCode = null, $exceptId = null) {

        $_where = ['branch_id' => $branch_id, 'doccode' => $docCode];

        if (!is_null($exceptId) || $exceptId != '') {
            array_push($_where, ['id !=' => $exceptId]);
        }
        $q = $this->SequentNumbers->find()
                ->where($_where);
        $count = $q->count();

        if ($count > 0) {
            return true;
        }
        return false;
    }

}
