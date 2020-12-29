<?php
namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\ORM\Query;
class ContactsTable extends Table
{
    public function initialize(array $config)
    {
        $this->addBehavior('Timestamp');
    }

    public function FindContacts_Companies(Query $query, array $options){

        $query
        ->join([
            'companies' =>[
                'table' => 'companies',
                'type' => 'INNER',
                'conditions' => 'Contacts.company_id = Companies.id'
            ]
        ])
        ->select(['Contacts.id', 'Contacts.first_name', 'Contacts.last_name', 'Contacts.first_name','Contacts.phone_number', 'Companies.id', 'Companies.company_name', 'Companies.address']);

        return $query;
    }
}