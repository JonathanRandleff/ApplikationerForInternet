<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Recipe_model extends CI_Model {

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


    public function deleteComment($recipe, $comment_id) {
        $this->db->delete($recipe.'_comment', array('id' => $comment_id));
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

    public function retrieveComment($recipe){

        return $this->db->get($recipe.'_comment')->result();

    }




}