<?php

namespace App\Controllers;


class Home extends BaseController
{
    public function index(): string
    {

        $db = \Config\Database::connect();
        $query = $db->query('SELECT * FROM users');
        $results = $query->getResult();

        foreach ($results as $row) {
            echo "AAAA";
        }

        echo 'Total Results: ' . count($results);

        return view('welcome_message');
    }
}

class Profile extends BaseController
{
    public function index(): string
    {

        $db = \Config\Database::connect();
        $query = $db->query('SELECT * FROM users');
        $results = $query->getResult();

        return view('profile', ['users'->$results]);
    }
}
