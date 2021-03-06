<?php

namespace model\commentaire;

use core\model\orm\wOrm;

/**
 * Classe Commentaire
 * @method int getId()                  Returns the commentaire's id
 * @method string getAuthor()           Returns the commentaire's title
 * @method string getEmail()            Returns the commentaire's email
 * @method string getMessage()          Returns the commentaire's message
 * @method boolean getIs_published()    Returns true if the commentaire is published, false otherwise
 * @method string getCreate_date()      Returns the commentaire's creation datetime
 * @method string getUpdate_date()      Returns the commentaire's update datetime
 * @method string getArticle_id()       Returns the article's id
 */
class Commentaire extends wOrm
{
  /* Definition */
  protected $id;
  protected $author;
  protected $email;
  protected $message;
  protected $is_published;
  protected $create_date;
  protected $update_date;
  protected $article_id;

  public function __construct()
  {
    parent::__construct();
  }

  /* Custom methods should come here */

  public function isPublished()
  {
    return $this->getIsPublished();
  }

  /**
   * @return Article
   */
  public function getArticle()
  {
    return Article::find(array('id' => $this->getArticle_id()));
  }

  /**
   * @return string
   */
  public function getArticleTitle()
  {
    return $this->getArticle()->getTitle();
  }

  /**
   * @return string
   */
  public function getHashEmail()
  {
    return md5($this->getEmail());
  }
}

