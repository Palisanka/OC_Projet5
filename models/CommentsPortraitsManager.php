<?php
require_once('models/Manager.php');

class CommentsPortraitsManager extends Manager
{
    private $_db;

    public function __construct()
    {
        try {
            $this->_db = new PDO(
                'mysql:host=localhost;dbname=projet_5;charset=utf8',
                'root',
                'root',
                array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION)
            );
        } catch (Exception $e) {
            die('erreur : ' . $e->getMessage());
        }
    }

    public function getAdd($commentPortrait)
    {
        $req = $this->_db->prepare('INSERT INTO comments_portraits (id_portrait, pseudo, mail, content, date_comment, signaled) VALUES (?, ?, ?, ?, NOW(), 0)');
        $req->execute([
            $_GET['id'], 
            $_POST['pseudo'],
            $_POST['mail'],
            $_POST['content']
        ]); 
    }

    public function getListAllPortraits() 
    {
        $list = [];

        $req = $this->_db->prepare('SELECT id_portrait, pseudo, mail, date_comment, content DATE_FORMAT (date_comment, "%d/%m/%Y à %Hh%imin%ss") AS date_creation_comment FROM comments_portraits ORDER BY date_comment DESC');
        $req->execute();

        $req_join = $this->_db->prepare('SELECT * FROM portraits, comments_portraits WHERE portraits.id=comments_portraits.id_portrait ORDER BY date_comment DESC');
        $req_join->execute();

        while ($data = $req->fetch(PDO::FETCH_ASSOC))        
        {
            while ($data = $req_join->fetch(PDO::FETCH_ASSOC))           
            {
                $list [] = $data;  
            }
        }
        return $list;
    }

    public function getPortraitComment()
    {
        $list = [];

        $req = $this->_db->prepare('SELECT id, pseudo, mail, content, date_comment, signaled, DATE_FORMAT (date_comment, "%d/%m/%Y à %Hh%imin%ss") AS date_creation_comment FROM comments_portraits WHERE id_portrait= ? ORDER BY date_comment DESC LIMIT 0, 5');
        $req->execute(array(
            $_GET['id']
        ));

        while ($data = $req->fetch(PDO::FETCH_ASSOC))
        {
            $list [] = new CommentsPortraits($data); 
        }
        return $list;
    }

    public function getSignal($comments)
    {
        $req_signal = $this->_db->prepare('UPDATE comments_portraits SET signaled = 1 WHERE id = :idPortrait');
        $req_signal->execute([
            'idPortrait' => $comments->getId()
        ]);
    } 

    public function getListSignaled()
    {
        $list = [];

        $req = $this->_db->prepare('SELECT id_portrait, pseudo, mail, content, date_comment, DATE_FORMAT (date_comment, "%d/%m/%Y à %Hh%imin%ss") AS date_creation_comment FROM comments_portraits WHERE signaled = 1 ORDER BY date_comment DESC');
        $req->execute();

        $req_join = $this->_db->prepare('SELECT * FROM portraits, comments_portraits WHERE portraits.id=comments_portraits.id_portrait AND signaled = 1 ORDER BY date_comment DESC');
        $req_join->execute();

        while ($data = $req->fetch(PDO::FETCH_ASSOC))        
        {
            while ($data = $req_join->fetch(PDO::FETCH_ASSOC))           
            {
                $list [] = $data;  
            }
        }
        return $list;
    }
}