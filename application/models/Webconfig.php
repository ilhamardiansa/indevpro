<?php 
class Webconfig extends CI_Model
{
    function config(){
       
        $config = array(
            'header1' => $this->db->get('profil')->row('header1'),
            'header2' => $this->db->get('profil')->row('header2'),
            'header3' => $this->db->get('profil')->row('header3'),
            'footer1' => $this->db->get('profil')->row('footer1'),
            'footer2' => $this->db->get('profil')->row('footer2'),
        );

        return $config;
    }
}