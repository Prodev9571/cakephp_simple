<?php
// src/Controller/ArticlesController.php

namespace App\Controller;
use Cake\ORM\TableRegistry;
use Cake\Datasource\ConnectionManager;
class ContactsController extends AppController
{
	public function index()
    {
        $contacts = $this->Contacts->find('all');
        $this->set(compact('contacts'));
    }

    public function indexExt(){
    	$conn = ConnectionManager::get('default');
    	$contacts_companies = TableRegistry::get('Contacts');
        $companies = $contacts_companies->find('Contacts_Companies');
        $stmt = $conn->execute($companies);
        $rows = $stmt->fetchAll('assoc');
        $this->set(compact('rows'));
    }
    public function add(){
    	$conn = ConnectionManager::get('default');
		$first_name = $this->request->data("first_name");
		$last_name = $this->request->data("last_name");
		$phone_number = $this->request->data("phone_number");
		$address = $this->request->data("address");
		$notes = $this->request->data("notes");
		$add_notes = $this->request->data("add_notes");
		$internal_notes = $this->request->data("internal_notes");
		$comments = $this->request->data("comments");
		$contactsTable = TableRegistry::getTableLocator()->get('Contacts');
		$contacts = $contactsTable->newEntity();

		$contacts->first_name = $first_name;
		$contacts->last_name = $last_name;
		$contacts->phone_number = $phone_number;
		$contacts->address = $address;
		$contacts->notes = $notes;
		$contacts->add_notes = $add_notes;
		$contacts->internal_notes = $internal_notes;
		$contacts->comments = $comments;
		if ($contactsTable->save($contacts)) {
		    // The $article entity contains the id now
		    $id = $contacts->id;
		}
		
    }
}