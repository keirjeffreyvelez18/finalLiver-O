<?php
	class userstab extends CI_Model {

    	function __construct(){
        	parent::__construct();
            $this->load->library('encrypt');
    	}

        

    	function users(){
    		$this->db->select('*');
            $this->db->from('users');
            $query = $this->db->get();
        	return $query->result();
    	}

    	function insert_user($datainsert = array()){
    	   $query = $this->db->insert('users', $datainsert);
    	   return $query;
        }

    	function delete_user($userid = 0){
    		$sql = "DELETE FROM users WHERE userid = ?";
    		$query = $this->db->query($sql, $userid);
    		return $query;
    	}

        function update_login(){
                $this->db->set('lastDateLogin', date('Y-m-d') );
                $this->db->set('lastTimeLogin', date('h:i:sa') );
                $this->db->where('userid', $this->session->userdata('userid'));
                $query = $this->db->update('users');
                return $query;
        }

        function update_email($dataupdate = array()){
                $this->db->set('email', $dataupdate['email']);
                $this->db->where('userid', $this->session->userdata('userid'));
                $query = $this->db->update('users');
                return $query;
        }

        function update_password($dataupdate = array()){
                $this->db->set('password', $dataupdate['password']);
                $this->db->where('userid', $this->session->userdata('userid'));
                $query = $this->db->update('users');
                return $query;            
        }

        function update_username($dataupdate = array()){
            $this->db->set('username', $dataupdate['username']);
            $this->db->where('userid', $this->session->userdata('userid'));
            $query = $this->db->update('users');
            return $query;
        }

        function update_dob($dataupdate = array()){
            $this->db->set('birthday', $dataupdate['birthday']);
            $this->db->where('userid', $this->session->userdata('userid'));
            $query = $this->db->update('users');
            return $query;
        }

        function update_gender($dataupdate = array()){
            $this->db->set('gender', $dataupdate['gender']);
            $this->db->where('userid', $this->session->userdata('userid'));
            $query = $this->db->update('users');
            return $query;
        }

        function getLog(){
            $this->db->select('*');
            $this->db->from('log');
            $this->db->join('users', 'log.userid=users.userid');
            $query = $this->db->get();
            return $query->result();
        }

        function insert_logout(){
            $this->db->set('datetimelogout',  Date('Y-m-d h:i:sa'));
            $this->db->where('userid', $this->session->userdata('userid'));
            $this->db->where('datetimelogin', $this->session->userdata('datetimelogin'));
            $this->db->update('log'); 
        }

        function login_user($email, $password){

            $this->db->select('*');
            $this->db->from('users');
            $this->db->where('email like binary', $email);
            $query = $this->db->get();

            if($query->num_rows()==1){
                $row= $query->row();
                if ($this->encrypt->decode($row->password)==$password) {

                    $log = array(
                        'datetimelogin' => Date('Y-m-d h:i:sa'),
                        'userid'=>$row->userid,
                    );
                    $this->session->set_userdata('datetimelogin', $log['datetimelogin']);
                    $query1 = $this->db->insert('log', $log);

                    $data=array(
                        'userid'=>$row->userid,
                        'username'=>$row->username,
                        'email'=> $row->email,
                        'password'=>$row->password,
                        'birthday'=>$row->birthday,
                        'gender'=>$row->gender,
                        'lastDateLogin' => $row->lastDateLogin
                    );
                    return $data;
                }
            }
        }
    }
?>
