<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\ORM\TableRegistry;

/**
 * PawnLines Controller
 *
 * @property \App\Model\Table\PawnLinesTable $PawnLines
 *
 * @method \App\Model\Entity\PawnLine[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PawnLinesController extends AppController
{
    public $Branches = null;
    public $Orgs = null;
    public function beforeFilter(Event $event) {
        parent::beforeFilter($event);
        $this->Branches = TableRegistry::get('Branches');
        $this->Orgs = TableRegistry::get('Orgs');
        $this->loadModel('PawnLines');

        if (!$this->Authen->authen()) {
            return $this->redirect(USERPERMISSION);
        }
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Products', 'Pawns']
        ];
        $pawnLines = $this->paginate($this->PawnLines);

        $this->set(compact('pawnLines'));
    }

    /**
     * View method
     *
     * @param string|null $id Pawn Line id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $pawnLine = $this->PawnLines->get($id, [
            'contain' => ['Products', 'Pawns']
        ]);

        $this->set('pawnLine', $pawnLine);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $pawnLine = $this->PawnLines->newEntity();
        if ($this->request->is('post')) {
            $pawnLine = $this->PawnLines->patchEntity($pawnLine, $this->request->getData());
            if ($this->PawnLines->save($pawnLine)) {
                $this->Flash->success(__('The pawn line has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The pawn line could not be saved. Please, try again.'));
        }
        $products = $this->PawnLines->Products->find('list', ['limit' => 200]);
        $pawns = $this->PawnLines->Pawns->find('list', ['limit' => 200]);
        $this->set(compact('pawnLine', 'products', 'pawns'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Pawn Line id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $pawnLine = $this->PawnLines->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $pawnLine = $this->PawnLines->patchEntity($pawnLine, $this->request->getData());
            if ($this->PawnLines->save($pawnLine)) {
                $this->Flash->success(__('The pawn line has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The pawn line could not be saved. Please, try again.'));
        }
        $products = $this->PawnLines->Products->find('list', ['limit' => 200]);
        $pawns = $this->PawnLines->Pawns->find('list', ['limit' => 200]);
        $this->set(compact('pawnLine', 'products', 'pawns'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Pawn Line id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $pawnLine = $this->PawnLines->get($id);
        if ($this->PawnLines->delete($pawnLine)) {
            $this->Flash->success(__('The pawn line has been deleted.'));
        } else {
            $this->Flash->error(__('The pawn line could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
