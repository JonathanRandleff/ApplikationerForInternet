<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Comment_model extends CI_Model {

    private $_comment_text;
    private $_username;

    public function setUsername($username)
    {
        $this->_username = $username;
    }
    public function setCommentText($comment_text)
    {
        $this->_comment_text = $comment_text;
    }


    public function addComment($recipe)
    {
        $data = array(
            'username' => $this->_username,
            'comment_text' => $this->_comment_text,
        );
        $this->db->insert($recipe.'_comment', $data);
        return $this->db->insert_id();
    }




}