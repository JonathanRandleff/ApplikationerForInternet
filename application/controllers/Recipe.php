<?php
class Recipe extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Recipe_model', 'recipe');
    }
    public function view($page = 'meatballs')
    {
        if ( ! file_exists(APPPATH.'views/recipe/'.$page.'.php'))
        {
            // Whoops, we don't have a page for that!
            show_404();
        }
        $data['recipe'] = $this->recipe->retrieveRecipe();
        $data['comment'] = json_encode($this->recipe->retrieveComment($page));

        $this->load->view('templates/header', $data);
        $this->load->view('recipe/'.$page, $data);
    }

    public function deleteComment() {
        $id = htmlentities($this->input->post('id'), ENT_QUOTES);
        $page = htmlentities($this->input->post('page'), ENT_QUOTES);
        $this->recipe->deleteComment($page, $id);
    }


    public function createComment()
    {
        $this->form_validation->set_rules('comment_text', 'Comment Text', 'trim|required');

        if ($this->form_validation->run() === FALSE) {
        }
        else
        {
            $username = htmlentities($this->session->userdata('username'), ENT_QUOTES);
            $comment_text = htmlentities($this->input->post('comment_text'), ENT_QUOTES);
            $recipe = htmlentities($this->input->post('recipe'), ENT_QUOTES);

            $this->recipe->setUsername($username);
            $this->recipe->setCommentText($comment_text);
            $this->recipe->addComment($recipe);
        }
    }
}
