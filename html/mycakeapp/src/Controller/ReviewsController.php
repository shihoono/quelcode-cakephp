<?php
namespace App\Controller;

use App\Controller\AppController;
use Exception;

/**
 * Reviews Controller
 *
 * @property \App\Model\Table\ReviewsTable $Reviews
 *
 * @method \App\Model\Entity\Review[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ReviewsController extends AuctionController
{

    /**
     * View method
     *
     * @param string|null $id Review id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $reviews = $this->Reviews->find('all',[
            'conditions'=>['reviewee_id'=> $id],
            'order'=>['created'=>'desc']]);

        try{
            $user = $this->Users->get($id);
        } catch(Exception $e){
            $user = null;
        }

        $rate_avg = $this->getAvg($id);

        $this->set(compact('reviews', 'user', 'rate_avg'));
    }

    private function getAvg($id)
    {
        $rate = $this->Reviews->find('all',[
            'fields'=>['rate'],
            'conditions'=>['reviewee_id'=>$id]]);
        $rate_avg = collection($rate)->avg('rate');
        return $rate_avg;      
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add($bidinfo_id = null)
    {
        $review = $this->Reviews->newEntity();

        //評価済みかどうか判定
        $reviewed = $this->Reviews->find()->where(['bidinfo_id' => $bidinfo_id, 'reviewer_id' => $this->Auth->user('id')])->count();

        try {
            $bidinfo = $this->Bidinfo->get($bidinfo_id, ['contain'=>['Biditems']]);

            if ($this->request->is('post')) {
                if($bidinfo->trading_status === 2){
                    if($reviewed === 0){
                        $review = $this->Reviews->patchEntity($review, $this->request->getData());
                        $review->reviewer_id = $this->Auth->user('id');
                        //ログイン者が落札者
                        if($this->Auth->user('id') === $bidinfo->user_id){
                            $review->reviewee_id = $bidinfo->biditem->user_id;
                        }
                        //ログイン者が出品者
                        if($this->Auth->user('id') === $bidinfo->biditem->user_id){
                            $review->reviewee_id = $bidinfo->user_id;
                        }
                        $review->bidinfo_id = $bidinfo->id;

                        if ($this->Reviews->save($review)) {
                            $this->Flash->success(__('評価しました。'));

                            return $this->redirect(['action' => 'add', $bidinfo->id]);
                        }
                        $this->Flash->error(__('保存に失敗しました。もう一度入力下さい。'));
                    } else {
                        $this->Flash->error(__('評価済みです。'));
                    }
                } else {
                    $this->Flash->error(__('取引が完了していません。'));
                }
            }
        } catch(Exception $e){
            $bidinfo = null;
        }

        $this->set(compact('review', 'bidinfo','reviewed'));
    }

}
