<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

class PeopleTable extends Table {

    public function initialize(array $config) {
        parent::initialize(($config));
        $this->setDisplayField('email');
        $this->hasMany('Messages');
    }

    public function findMe(Query $query, array $options){
        $me = $options['me'];
        return $query
            ->where(['OR' =>[['name like' => '%' .$me .'%'],
                            ['email like' => '%' . $me .'%']
            ]])
            ->order(['age'=>'asc']);
    }

    public function findByAge(Query $query, array $options){
        return $query->order(['age'=>'asc'])->order(['name'=>'asc']);
    }

    public function validationDefault(Validator $validator) {
        $validator
            ->integer('id', 'idは整数で入力下さい。')
            ->allowEmpty('id', 'create');

        $validator
            ->scalar('name', 'テキストを入力下さい。')
            ->requirePresence('name', 'create')
            ->notEmpty('name', '名前は必ず入力して下さい。');

        $validator
            ->scalar('email', 'テキストを入力下さい。')
            ->allowEmpty('email')
            ->email('email', false, 'メールアドレスを記入して下さい。');

        $validator
            ->integer('age', '整数を入力下さい。')
            ->requirePresence('age', 'create') 
            ->notEmpty('age', '必ず値を入力下さい。')
            ->greaterThan('age', -1, 'ゼロ以上の値を入力下さい。');

        return $validator;
    }
}