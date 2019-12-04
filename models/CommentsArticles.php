<?php
// namespace Oc\Projet_5\Models;

class CommentsArticles
{
    private $_id,
        $_id_article,
        $_pseudo,
        $_mail,
        $_date_comment,
        $_content,
        $_signaled;

    public function __construct(array $data)
    {
        $this->hydrate($data);
    }

    public function hydrate(array $data)
    {
        if (isset($data['id'])) {
            $this->setId($data['id']);
        }
        if (isset($data['id_article'])) {
            $this->setIdArticle($data['id_article']);
        }
        if (isset($data['pseudo'])) {
            $this->setPseudo($data['pseudo']);
        }
        if (isset($data['mail'])) {
            $this->setMail($data['mail']);
        }
        if (isset($data['date_comment'])) {
            $this->setDateComment($data['date_comment']);
        }
        if (isset($data['content'])) {
            $this->setContent($data['content']);
        }
        if (isset($data['signaled'])) {
            $this->setSignaled($data['signaled']);
        }
    }

    // GETTERS:
    public function getId()
    {
        return $this->_id;
    }

    public function getIdArticle()
    {
        return $this->_id_article;
    }

    public function getPseudo()
    {
        return $this->_pseudo;
    }

    public function getMail()
    {
        return $this->_mail;
    }

    public function getDateComment()
    {
        return $this->_date_comment;
    }

    public function getContent()
    {
        return $this->_content;
    }

    public function getSignaled()
    {
        return $this->_signaled;
    }

    //SETTERS:
    public function setId($id)
    {
        $id = (int) $id;
        if ($id > 0) {
            $this->_id = $id;
        }
    }

    public function setIdArticle($id_article)
    {
        $id_article = (int) $id_article;
        if ($id_article > 0) {
            $this->_id_article = $id_article;
        }
    }

    public function setPseudo($pseudo)
    {
        $this->_pseudo = htmlspecialchars($pseudo);
    }

    public function setMail($mail)
    {
        $this->_mail = $mail;
    }

    public function setDateComment($date_comment)
    {
        $this->_date_comment = $date_comment;
    }

    public function setContent($content)
    {
        if (is_string($content)) {
            $this->_content = htmlspecialchars($content);
        }
    }

    public function setSignaled($signaled)
    {
        if ($signaled == 0 or $signaled == 1) {
            $this->_signaled = $signaled;
        }
    }
}
