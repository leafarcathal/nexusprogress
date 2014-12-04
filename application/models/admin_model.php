<?php

class Admin_Model extends CI_Model {

    var $title = '';
    var $content = '';
    var $date = '';

    function __construct() {
        // Call the Model constructor
        parent::__construct();
    }

    public function loadContents($id = null, $orderby = null) {

        $this->db->select('*');
        $this->db->from('content');
        if ($id) {
            $this->db->where('id_content', $id);
        }
        $this->db->order_by($orderby);
        $loadQuery = $this->db->get();
        if ($loadQuery->num_rows() > 0) {
            return $loadQuery->result_array();
        } else {
            return false;
        }
    }

    public function loadLights($id = null, $orderby = null) {

        $this->db->select('*');
        $this->db->from('light');
        if ($id) {
            $this->db->where('id_light', $id);
        }
        $this->db->order_by($orderby);
        $loadQuery = $this->db->get();
        if ($loadQuery->num_rows() > 0) {
            return $loadQuery->result_array();
        } else {
            return false;
        }
    }

    public function addUserPoints($id_user, $id_content, $id_light) {

        $data = array(
            'id_user' => $id_user,
            'id_content' => $id_content,
            'id_light' => $id_light
        );

        if ($this->db->insert('user_light', $data)) {
            return true;
        } else {
            return false;
        }
    }

    public function loadUserPoints($id_user) {

        $this->db->select('content.name as Content, light.name as Light, light.value as Value, count(id_user_light) as NumberOfLights, sum(light.value) as TotalByLight, content.class as class, content.id_content as id_content');
        $this->db->from('user_light');
        $this->db->where('id_user', $id_user);
        $this->db->join('content', 'content.id_content = user_light.id_content', 'left');
        $this->db->join('light', 'light.id_light = user_light.id_light', 'left');
        $this->db->group_by('content.name');
        $this->db->order_by('content.id_content');
        $loadQuery = $this->db->get();
        if ($loadQuery->num_rows() > 0) {
            return $loadQuery->result_array();
        } else {
            return false;
        }
    }

    public function loadLightsByContent($id_user, $id_content) {
        $this->db->select('light.name as NameLight, light.value as Value, sum(light.Value) as TotalValue');
        $this->db->from('user_light');
        $this->db->where('id_user', $id_user);
        $this->db->where('id_content', $id_content);
        $this->db->join('light', 'user_light.id_light = light.id_light', 'left');
        $this->db->group_by('light.id_light');
        $loadQuery = $this->db->get();
        if ($loadQuery->num_rows() > 0) {
            return $loadQuery->result_array();
        } else {
            return false;
        }
    }

    public function loadLastPoints($id_user) {

        $this->db->select('light.name as LightName, content.name as ContentName, light.value as Value, user_light.id_user_light as idUserLight');
        $this->db->from('user_light');
        $this->db->join('light', 'light.id_light = user_light.id_light', 'left');
        $this->db->join('content', 'content.id_content = user_light.id_content', 'left');
        $this->db->where('id_user', $id_user);
        $this->db->order_by('idUserLight', 'desc');
        $this->db->limit(10);
        $loadQuery = $this->db->get();
        if ($loadQuery->num_rows() > 0) {
            return $loadQuery->result_array();
        } else {
            return false;
        }
    }

    public function passwordRecoveryAdd($id_user, $code) {

        $data = array(
            'id_user' => $id_user,
            'code' => $code
        );

        if ($this->db->insert('verify_password', $data)) {
            return true;
        } else {
            return false;
        }
    }

    public function passwordRecoveryCheck($id_user, $code) {

        $this->db->select('*');
        $this->db->from('verify_password');
        $this->db->where('id_user', $id_user);
        $this->db->where('code', $code);
        $loadQuery = $this->db->get();
        if ($loadQuery->num_rows() > 0) {
            return $loadQuery->result_array();
        } else {
            return false;
        }
    }

    public function removePoint($id_user, $id_content) {
        
        $this->db->where('id_user', $id_user);
        $this->db->where('id_user_light', $id_content);
        if($this->db->delete('user_light')){
            return true;
        } else {
            return false;
        }
    }

}
