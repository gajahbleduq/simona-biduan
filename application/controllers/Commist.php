<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Commist extends CI_Controller {

	public function __construct()
	{

		parent::__construct();

		$this->load->model('Commist_model');

		$this->load->library('General');

	}

	public function index() {

		$this->general->session_active();

		$email = $this->input->post("txt_email", true);

		$passwd = $this->input->post("txt_passwd", true);

		$captcha = $this->input->post("txt_captcha", true);

		if ($email!="" && $passwd!="" && $captcha!="") {

			$cekCaptcha = $this->general->validate_captcha($captcha);
			if(!$cekCaptcha){
				$this->session->set_flashdata('error', 'Captcha tidak valid.');
				redirect(site_url("login"));
			}else{

				$data_login = $this->Commist_model->get_login($email,$passwd);

				if (sizeof($data_login)>0) {

					$id = $data_login[0]["id"];

					$email = $data_login[0]["email"];

					$full_name = $data_login[0]["full_name"];

					$address = $data_login[0]["address"];

					$phone = $data_login[0]["phone"];

					$role_id = $data_login[0]["role_id"];

					$photo = $data_login[0]["photo"];

					$instansi_id = $data_login[0]["instansi_id"];

					$instansi = $data_login[0]["instansi"];

					if($photo == null){

						$photo = base_url('assets/avatar/user-default.png');

					}

					$sessdata = array(

						'id' => $id,

						'email' => $email,

						'full_name' => $full_name,

						'address' => $address,

						'phone' => $phone,

						'role_id' => $role_id,

						'photo' => $photo,

						'instansi' => $instansi,

						'instansi_id' => $instansi_id

					);

					$this->session->set_userdata($sessdata);

					redirect(site_url("dashboards"));

				} else {

					$this->session->set_flashdata('error', 'Masuk tidak valid. Silahkan coba lagi.');

					redirect(site_url("login"));

				}

			}
			
		}

		$this->general->set_captcha();

		$this->load->view('login');
		
	}

	function logout() {

		$this->session->sess_destroy();
		
		redirect(site_url("login"));

	}

	public function register() {

		$this->general->set_captcha();

		$this->load->view('register');
		
	}

	public function register_add() {

		$name = $this->input->post("register_name", true);

		$email = $this->input->post("register_email", true);

		$password = $this->input->post('register_password', true);

		$phone = $this->input->post("register_phone", true);

		$address = $this->input->post("register_address", true);

		$captcha = $this->input->post("txt_captcha", true);

		if ($name !== "" && $email !== "" && $password !== "" && $phone !== "" && $address !== "" && $captcha !== "") {

			$cekCaptcha = $this->general->validate_captcha($captcha);
			if(!$cekCaptcha){
				$this->session->set_flashdata('error', 'Captcha tidak valid.');
				redirect(site_url('register'));
			}else {

				$data_user = $this->Commist_model->get_users_byemail($email);

				if (sizeof($data_user) == 0) {

					$this->Commist_model->add_user_register($email, $password, $name, $address, $phone);

					$user_id = $this->db->insert_id();

					$role = 2;

					$this->Commist_model->add_role($user_id, $role);

					$this->session->set_flashdata('success', 'Pendaftaran berhasil. Akun Anda telah berhasil dibuat.');

					redirect(site_url("login"));

				} else {

					$this->session->set_flashdata('error', 'Alamat email sudah digunakan.');

					redirect(site_url('register'));

				}

			}

		}
		
	}

	public function dashboards() {

		$this->general->session_check();

		$data['site_title'] = "Dashboards";

		$data['site_menu'] = "dashboards";

		$this->load->view('site_header', $data);

		$this->load->view('site_sider', $data);

		$arrFulname = explode(' ',trim($this->user_nama));

		$data['full_name'] = $arrFulname[0];

		if($this->user_level == 2 ){

			$count_submitted = $this->Commist_model->count_all_reports_submitted_byuserid($this->user_id);
			$data['count_submitted'] = $count_submitted;

			$this->load->view('dashboards', $data);

		}else{

			if($this->user_level == 1) {
				$count_submitted = $this->Commist_model->count_all_reports_submitted();
			}else{
				$count_submitted = $this->Commist_model->count_all_reports_followedup_byinstansiid($this->user_instansi_id);
			}
			$data['count_submitted'] = $count_submitted;

			$count_surveys = $this->Commist_model->count_all_surveys();
			$data['count_surveys'] = $count_surveys;

			$this->load->view('adm_dashboards', $data);

		}

		$this->load->view('site_footer', $data);

	}

	public function adm_user() {
		$this->general->session_check();
		
		$this->general->session_level(1);

		$type = $this->input->post('type', true);

		$data['site_title'] = "Administrasi Pengguna";

		$data['site_menu'] = "adm_user";

		$data['data_users'] = $this->Commist_model->get_users();

		$data['data_roles'] = $this->Commist_model->get_roles();

		$data['data_kementerian'] = $this->Commist_model->get_kementerian($type);

		$data['data_instansi'] = $this->Commist_model->get_instansi($type);
		
		
		$this->load->view('site_header', $data);

		$this->load->view('site_sider', $data);

		$this->load->view('adm_user', $data);

		$this->load->view('site_footer', $data);
		
	}

	public function adm_user_add() {
		
		$this->general->session_check();

		$this->general->session_level(1);

		$name = $this->input->post('add_name', true);

		$email = $this->input->post('add_email', true);

		$password = $this->input->post('add_password', true);

		$phone = $this->input->post('add_phone', true);

		$address = $this->input->post('add_address', true);

		$status = $this->input->post('add_status', true);
		
		$role = $this->input->post('add_role', true);

		$instansi_id = $this->input->post('add_instansi', true);

		$created_by = $this->user_id;

		if ($name !== "" && $email !== "" && $password !== "" && $phone !== "" && $address !== "" && $status !== "" && $role !== "") {

			$data_user = $this->Commist_model->get_users_byemail($email);
			
			if (sizeof($data_user)==0) {

				$this->Commist_model->add_user($email, $password, $name, $address, $phone, $status, $instansi_id, $created_by);

				$user_id = $this->db->insert_id();
				
				$this->Commist_model->add_role($user_id, $role);

				$this->session->set_flashdata('success', 'Penambahan pengguna berhasil. Akun baru telah berhasil dibuat.');

				redirect(site_url("adm_user"));

			} else {

				$this->session->set_flashdata('error', 'Alamat email sudah digunakan.');

				redirect(site_url('adm_user'));	

			}

		}
		
	}

	public function adm_user_update($id) {

		$this->general->session_check();

		$this->general->session_level(1);
		
		$name = $this->input->post('edit_name', true);

		$email = $this->input->post('edit_email', true);

		$phone = $this->input->post('edit_phone', true);

		$address = $this->input->post('edit_address', true);

		$status = $this->input->post('edit_status', true);
		
		$role = $this->input->post('edit_role', true);

		$instansi_id = $this->input->post('edit_instansi', true);

		$updated_by = $this->user_id;

		if($email != "" && $name !== "" && $address !== "" && $phone !== "" && $status !== "" && $updated_by !== "" && $id !== "" )	{

			$this->Commist_model->update_user_byid($email, $name, $address, $phone, $status, $instansi_id, $updated_by, $id);

			if($role != "" && $id != "") {

				$this->Commist_model->update_role_byuserid($role, $id);

				$this->session->set_flashdata('success', 'Perubahan informasi pengguna berhasil. Akun '. $name .' telah diperbarui.');

			} else {

				$this->session->set_flashdata('error', 'Perubahan informasi pengguna tidak berhasil. Akun '. $name .' gagal diperbarui.');

			}

		} else {

			$this->session->set_flashdata('error', 'Perubahan informasi pengguna tidak berhasil. Account '. $name .' gagal diperbarui.');

		}

		redirect(site_url("adm_user"));
		
	}

	public function adm_user_delete($id) {
		
		$this->general->session_check();

		$this->general->session_level(1);

		$deleted_by = $this->user_id;

		$this->Commist_model->delete_user_byid($deleted_by, $id);
		
		// $this->Commist_model->delete_role_byuserid($id);

		$this->session->set_flashdata('success', 'Penghapusan pengguna berhasil. Akun telah dihapus.');

		redirect(site_url("adm_user"));

	}

	public function adm_survey() {
		$this->general->session_check();
		
		$this->general->session_level(1);

		$data['site_title'] = "Administrasi Survey";

		$data['site_menu'] = "adm_survey";

		$data['data_surveys'] = $this->Commist_model->get_survey_questions();
		
		$this->load->view('site_header', $data);

		$this->load->view('site_sider', $data);

		$this->load->view('adm_survey', $data);

		$this->load->view('site_footer', $data);
		
	}

	public function adm_survey_add() {

		$this->general->session_check();
		
		$this->general->session_level(1);

		$title = $this->input->post('add_title', true);

		$question = $this->input->post('add_question', true);

		if($title != "" && $question != "") {

			$this->Commist_model->insert_survey_questions($title, $question, $this->user_id);

			$this->session->set_flashdata('success', 'Penambahan survei berhasil. Pertanyaan survei baru telah berhasil dibuat.');

		} else {

			$this->session->set_flashdata('error', 'Gagal menambah survei. Pertanyaan survei baru tidak berhasil dibuat.');

		}

		redirect(site_url("adm_survey"));

	}

	public function adm_survey_update($surveyid) {

		$this->general->session_check();
		
		$this->general->session_level(1);

		$title = $this->input->post('edit_title', true);

		$question = $this->input->post('edit_question', true);

		if($title != "" && $question != "" && $surveyid != "") {

			$this->Commist_model->update_survey_questions($title, $question, $this->user_id, $surveyid);

			$this->session->set_flashdata('success', 'Perubahan survei berhasil. Pertanyaan survei telah diperbarui.');

		} else {

			$this->session->set_flashdata('error', 'Gagal merubah survei. Pertanyaan survei tidak berhasil diperbarui.');

		}

		redirect(site_url("adm_survey"));

	}

	public function adm_survey_delete($surveyid) {
		
		$this->general->session_check();
		
		$this->general->session_level(1);

		$this->Commist_model->delete_survey_questions($this->user_id, $surveyid);

		$this->session->set_flashdata('success', 'Penghapusan survei berhasil. Pertanyaan survei telah dihapus.');

		redirect(site_url("adm_survey"));
	}

	public function adm_instansi() {
		$this->general->session_check();
		
		$this->general->session_level(1);

		$data['site_title'] = "Administrasi Instansi";

		$data['site_menu'] = "adm_instansi";

		$data['data_instansi'] = $this->Commist_model->get_all_instansi();
		
		$this->load->view('site_header', $data);

		$this->load->view('site_sider', $data);

		$this->load->view('adm_instansi', $data);

		$this->load->view('site_footer', $data);
		
	}

	public function adm_instansi_add() {

		$this->general->session_check();
		
		$this->general->session_level(1);

		$instansi = $this->input->post('add_name', true);

		$type = $this->input->post('add_category', true);

		if($instansi != "" && $type != "") {

			$this->Commist_model->insert_instansi($instansi, $type, $this->user_id);

			$this->session->set_flashdata('success', 'Penambahan instansi berhasil. Instansi baru telah berhasil dibuat.');

		} else {

			$this->session->set_flashdata('error', 'Gagal menambah instansi. Instansi baru tidak berhasil dibuat.');

		}

		redirect(site_url("adm_instansi"));

	}

	public function adm_instansi_update($instansi_id) {

		$this->general->session_check();
		
		$this->general->session_level(1);

		$instansi = $this->input->post('edit_name', true);

		$type = $this->input->post('edit_category', true);

		if($instansi != "" && $type != "" && $instansi_id != "") {

			$this->Commist_model->update_instansi($instansi, $type, $this->user_id, $instansi_id);

			$this->session->set_flashdata('success', 'Perubahan instansi berhasil. Instansi telah diperbarui.');

		} else {

			$this->session->set_flashdata('error', 'Gagal merubah instansi. Instansi tidak berhasil diperbarui.');

		}

		redirect(site_url("adm_instansi"));

	}

	public function adm_instansi_delete($instansi_id) {
		
		$this->general->session_check();
		
		$this->general->session_level(1);

		$this->Commist_model->delete_instansi($this->user_id, $instansi_id);

		$this->session->set_flashdata('success', 'Penghapusan survei berhasil. Pertanyaan survei telah dihapus.');

		redirect(site_url("adm_instansi"));
	}

	public function profile() {

		$this->general->session_check();

		$data['site_title'] = "Akun";

		$data['site_menu'] = "account";

		$data['data_users'] = $this->Commist_model->get_users_byid($this->user_id);
		
		$this->load->view('site_header', $data);

		$this->load->view('site_sider', $data);

		$this->load->view('profile', $data);

		$this->load->view('site_footer', $data);

	}

	function set_upload_options($name) {

		$config = array();

		$config['upload_path'] = './assets/avatar/';

		$config['allowed_types'] = 'jpg|jpeg|png';

		$config['max_size']  = '1000';

		$config['file_name'] = $name;
		
		$config['overwrite'] = true;

		return $config;
		
	}

	public function profile_edit($id) {
		
		$this->load->library('upload');

		$this->general->session_check();

		$avatar = null;

		if ($_FILES["edit_photo"]['name'] != '') {
			
            $filename = "avatar_" . $id;

            $this->upload->initialize($this->set_upload_options($filename));

            if ($this->upload->do_upload("edit_photo")) {
				
                $dataInfo = $this->upload->data();


                $avatar = base_url('assets/avatar/'.$dataInfo['file_name']);

            } else {

                $errorfoto = $this->upload->display_errors();

                $errors = 'An uexpected error occurred during photo upload, '.$errorfoto;

				$this->session->set_flashdata('error', $errors);

				redirect(site_url("account/profile"));

            }

        }
		
		$nama = $this->input->post('edit_nama', true);

		$email = $this->input->post('edit_email', true);

		$phone = $this->input->post('edit_phone', true);

		$address = $this->input->post('edit_address', true);

		$updated_by = $this->user_id;

		$this->Commist_model->update_profile_byid($email, $nama, $address, $phone, $avatar, $updated_by, $id);

		$sessdata = array(

			'email' => $email,

			'full_name' => $nama,

			'address' => $address,

			'phone' => $phone,

		);

		$this->session->set_userdata($sessdata);

		if($avatar != null) {

			$this->session->set_userdata('photo',$avatar);
			
		}

		$this->session->set_flashdata('success', 'Perubahan profil berhasil. Akun Anda telah diperbarui.');

		redirect(site_url("account/profile"));
		
	}

	public function chgpass() {
		
		$this->general->session_check();

		$data['site_title'] = "Keamanan";

		$data['site_menu'] = "security";

		$data['data_users'] = $this->Commist_model->get_users_byid($this->user_id);
		
		$this->load->view('site_header', $data);

		$this->load->view('site_sider', $data);

		$this->load->view('chgpass', $data);

		$this->load->view('site_footer', $data);
		
	}
	
	public function chgpass_edit($id) {

		$this->general->session_check();
		
		$old = $this->input->post('old_password', true);

		$new = $this->input->post('new_password', true);

		$retype = $this->input->post('retype_password', true);

		$updated_by = $this->user_id;

		if ($old!="" && $new!="" && $retype!="") {

			if ($new == $retype) { 

				$data_pass = $this->Commist_model->get_login($this->user_email, $old);

				if (sizeof($data_pass)>0) {

					$this->Commist_model->chgpass($new, $updated_by, $id);

					$this->session->set_flashdata('success', 'Kata sandi telah diubah.');

					redirect(site_url("account/chgpass"));	

				} else {

					$this->session->set_flashdata('error', 'Kata sandi lama tidak cocok.');

					redirect(site_url("account/chgpass"));	

				}

			} else {

				$this->session->set_flashdata('error', 'Kata sandi baru dan konfirmasi kata sandi tidak cocok.');

				redirect(site_url("account/chgpass"));	

			}

		}	

	}

	public function all_tickets() {
		
		$this->general->session_check();

		$this->general->session_level(1,2);

		$data['site_title'] = "Semua Tiket";
		
		$data['site_menu'] = "all_tickets";

		$date = $this->input->post('filter_date', true);

		if($this->user_level == 1) {

			$count_all = $this->Commist_model->count_all_reports();
			
			$count_submitted = $this->Commist_model->count_all_reports_submitted();
			
			$count_accepted = $this->Commist_model->count_all_reports_accepted();

			$count_rejected = $this->Commist_model->count_all_reports_rejected();

			$count_processed = $this->Commist_model->count_all_reports_processed();

			$count_discussed = $this->Commist_model->count_all_reports_discussed();

			$count_followedup = $this->Commist_model->count_all_reports_followedup();

			$count_recommended = $this->Commist_model->count_all_reports_recommended();

			if(empty($date)) {

				$data_reports = $this->Commist_model->get_all_reports();

			} else {

				$data_reports = $this->Commist_model->get_all_reports_bydate($date);

			}
			
		} else {

			$count_all = $this->Commist_model->count_all_reports_byuserid($this->user_id);
			
			$count_submitted = $this->Commist_model->count_all_reports_submitted_byuserid($this->user_id);

			$count_accepted = $this->Commist_model->count_all_reports_accepted_byuserid($this->user_id);
			
			$count_rejected = $this->Commist_model->count_all_reports_rejected_byuserid($this->user_id);

			$count_processed = $this->Commist_model->count_all_reports_processed_byuserid($this->user_id);

			$count_discussed = $this->Commist_model->count_all_reports_discussed_byuserid($this->user_id);

			$count_followedup = $this->Commist_model->count_all_reports_followedup_byuserid($this->user_id);

			$count_recommended = $this->Commist_model->count_all_reports_recommended_byuserid($this->user_id);

			if(empty($date)) {

				$data_reports = $this->Commist_model->get_all_reports_byuserid($this->user_id);


			} else {

				$data_reports = $this->Commist_model->get_all_reports_byuserid_bydate($this->user_id, $date);

			}
		}

		$data['count_all'] = $count_all;

		$data['count_submitted'] = $count_submitted;

		$data['count_accepted'] = $count_accepted;

		$data['count_rejected'] = $count_rejected;

		$data['count_processed'] = $count_processed;

		$data['count_discussed'] = $count_discussed;

		$data['count_followedup'] = $count_followedup;

		$data['count_recommended'] = $count_recommended;

		$data['data_reports'] = $data_reports;

		$data['filter_date'] = $date;
		
		$this->load->view('site_header', $data);

		$this->load->view('site_sider', $data);

		$this->load->view('all_tickets', $data);

		$this->load->view('site_footer', $data);
		
	}

	private function humanTiming ($time)
	{

		$time = time() - $time; // to get the time since that moment
		$time = ($time<1)? 1 : $time;
		$tokens = array (
			31536000 => 'tahun',
			2592000 => 'bulan',
			604800 => 'minggu',
			86400 => 'hari',
			3600 => 'jam',
			60 => 'menit',
			1 => 'detik'
		);

		foreach ($tokens as $unit => $text) {
			if ($time < $unit) continue;
			$numberOfUnits = floor($time / $unit);
			return $numberOfUnits.' '.$text.(($numberOfUnits>1)?'':'').' lalu';
		}

	}
	
	public function ticket_details($noticket) {

		$this->general->session_check();

		$data['site_title'] = "Detail Tiket";

		$data['site_menu'] = "all_tickets";
		
		if($this->user_level == 2) {

			$dataTicket = $this->Commist_model->adm_get_reports_byticket($noticket, $this->user_id);

		} else {

			$dataTicket = $this->Commist_model->adm_get_reports_byticket($noticket);

		}
		
		if(count($dataTicket) === 0){

			redirect(site_url('all_tickets'));

		}

		$data['data_surveys'] = $this->Commist_model->get_survey_questions();

		$data['survey_answer_check'] = $this->Commist_model->get_survey_answer_bynoticket($noticket);

		$dataTicket = $dataTicket[0];
		$dataFile = $this->Commist_model->get_file_log($dataTicket['id'], 1);
		$dataTicket['file'] = $dataFile;
		$timeHumanFinishedAt = strtotime($dataTicket['finished_at']);
		$dataTicket['timeline_finished_by'] = $this->humanTiming($timeHumanFinishedAt);
		$data['ticket'] = $dataTicket;

		$dataReportLog = $this->Commist_model->get_report_log($dataTicket['id']);
		if(count($dataReportLog) > 0){
			foreach ($dataReportLog as $key => $item){
				$dataReportLogFile = $this->Commist_model->get_file_log_by_reportlogid($item['id']);
				$dataReportLog[$key]['file'] = $dataReportLogFile;
				$timeHuman = strtotime($item['created_at']);
				$dataReportLog[$key]['timeline'] = $this->humanTiming($timeHuman);

				//data report item
				if($item['to'] == 0) {
					$dataReportItem = $this->Commist_model->get_diskusi_by_reportLogId($item['id']);
					$dataReportItemFile = $this->Commist_model->get_file_diskusi($dataReportItem[0]['id']);
					if(count($dataReportItem) > 0){
						$dataReportLog[$key]['item'] = $dataReportItem[0];
						$dataReportLog[$key]['item']['file'] = $dataReportItemFile;
					}else{
						$dataReportLog[$key]['item'] = array();
					}
				}else{
					$dataReportLog[$key]['item'] = array();
				}

			}
		}

		$data['timeLine'] = $dataReportLog;

		$this->general->set_captcha();
		
		$this->load->view('site_header', $data);

		$this->load->view('site_sider', $data);

		$this->load->view('ticket_details', $data);
		
		$this->load->view('site_footer', $data);
		
	}

	public function ticket_survey($noticket) {

		$success = false;$msg = "";$statusCode = 400;
		$userid = null;
		if($this->session->userdata('id')){
			$this->general->session_check();
			$userid = $this->user_id;
		}

		$surveyids = $this->input->post('txt_id', true);
		$answers = $this->input->post('txt_answer', true);
		$captcha = $this->input->post("txt_captcha", true);
	
		if(!empty($surveyids) && !empty($answers)) {
			$cekCaptcha = $this->general->validate_captcha($captcha);
			if(!$cekCaptcha){
				if($this->session->userdata('id')) {
					$this->session->set_flashdata('error', 'Gagal pengisian survei. Captcha tidak valid.');
				}else{
					$msg = "Captcha tidak valid";
				}
			}else {
				if (count($surveyids) === count($answers)) {
					for ($i = 0; $i < count($surveyids); $i++) {
						$surveyid = $surveyids[$i];
						$answer = $answers[$i];
						$this->Commist_model->insert_survey_answer($surveyid, $answer, $noticket, $userid);
					}

					if ($this->session->userdata('id')) {
						$this->session->set_flashdata('success', 'Pengisian survei berhasil. Survei telah berhasil dikirimkan.');
					} else {
						$msg = "Survey berhasil dikirimkan";
						$success = true;
						$statusCode = 200;
					}
				} else {
					if ($this->session->userdata('id')) {
						$this->session->set_flashdata('error', 'Gagal pengisian survei. Survei tidak berhasil dikirimkan.');
					} else {
						$msg = "Survei tidak berhasil dikirimkan";
					}
				}
			}
		} else {
			if($this->session->userdata('id')) {
				$this->session->set_flashdata('error', 'Gagal pengisian survei. Survei tidak berhasil dikirimkan.');
			}else{
				$msg = "Survei tidak berhasil dikirimkan";
			}
		}

		if($this->session->userdata('id')){
			redirect(site_url("ticket/" . $noticket));
		}else{
			$result = array(
				"success" => $success,
				"message" => $msg,
				"status_code" => $statusCode
			);

			echo json_encode($result);
		}
	}
	

	public function submitted() {
		
		$this->general->session_check();

		$this->general->session_level(1,2);

		$data['site_title'] = "Diajukan";

		$data['site_menu'] = "ticket_status";

		$date = $this->input->post('filter_date', true);

		if($this->user_level == 1) {
			
			$count_submitted = $this->Commist_model->count_all_reports_submitted();
			
			$count_accepted = $this->Commist_model->count_all_reports_accepted();

			$count_rejected = $this->Commist_model->count_all_reports_rejected();

			$count_processed = $this->Commist_model->count_all_reports_processed();

			$count_discussed = $this->Commist_model->count_all_reports_discussed();
			
			$count_recommended = $this->Commist_model->count_all_reports_recommended();

			$count_followedup = $this->Commist_model->count_all_reports_followedup();
			
			if(empty($date)) {

				$data_reports = $this->Commist_model->get_all_reports_submitted();
			
			} else {

				$data_reports = $this->Commist_model->get_all_reports_submitted_bydate($date);

			}
			

		} else {
			
			$count_submitted = $this->Commist_model->count_all_reports_submitted_byuserid($this->user_id);

			$count_accepted = $this->Commist_model->count_all_reports_accepted_byuserid($this->user_id);
			
			$count_rejected = $this->Commist_model->count_all_reports_rejected_byuserid($this->user_id);

			$count_processed = $this->Commist_model->count_all_reports_processed_byuserid($this->user_id);

			$count_discussed = $this->Commist_model->count_all_reports_discussed_byuserid($this->user_id);
			
			$count_recommended = $this->Commist_model->count_all_reports_recommended_byuserid($this->user_id);

			$count_followedup = $this->Commist_model->count_all_reports_followedup_byuserid($this->user_id);

			if(empty($date)) {

				$data_reports = $this->Commist_model->get_all_reports_submitted_byuserid($this->user_id);

			} else {

				$data_reports = $this->Commist_model->get_all_reports_submitted_byuserid_bydate($this->user_id, $date);

			}
			
		}

		$data['count_submitted'] = $count_submitted;

		$data['count_accepted'] = $count_accepted;

		$data['count_rejected'] = $count_rejected;

		$data['count_processed'] = $count_processed;

		$data['count_discussed'] = $count_discussed;

		$data['count_followedup'] = $count_followedup;

		$data['count_recommended'] = $count_recommended;

		$data['data_reports'] = $data_reports;

		$data['filter_date'] = $date;

		$this->load->view('site_header', $data);

		$this->load->view('site_sider', $data);

		$this->load->view('submitted', $data);

		$this->load->view('site_footer', $data);
		
	}
	
	public function accepted() {
		
		$this->general->session_check();

		$this->general->session_level(1,2);

		$data['site_title'] = "Diterima";

		$data['site_menu'] = "ticket_status";

		$date = $this->input->post('filter_date', true);

		if($this->user_level == 1) {
			
			$count_submitted = $this->Commist_model->count_all_reports_submitted();
			
			$count_accepted = $this->Commist_model->count_all_reports_accepted();

			$count_rejected = $this->Commist_model->count_all_reports_rejected();

			$count_processed = $this->Commist_model->count_all_reports_processed();

			$count_discussed = $this->Commist_model->count_all_reports_discussed();

			$count_followedup = $this->Commist_model->count_all_reports_followedup();

			$count_recommended = $this->Commist_model->count_all_reports_recommended();

			if(empty($date)) {

				$data_reports = $this->Commist_model->get_all_reports_accepted();

			} else {

				$data_reports = $this->Commist_model->get_all_reports_accepted_bydate($date);

			}

		} else {
			
			$count_submitted = $this->Commist_model->count_all_reports_submitted_byuserid($this->user_id);

			$count_accepted = $this->Commist_model->count_all_reports_accepted_byuserid($this->user_id);
			
			$count_rejected = $this->Commist_model->count_all_reports_rejected_byuserid($this->user_id);

			$count_processed = $this->Commist_model->count_all_reports_processed_byuserid($this->user_id);

			$count_discussed = $this->Commist_model->count_all_reports_discussed_byuserid($this->user_id);

			$count_followedup = $this->Commist_model->count_all_reports_followedup_byuserid($this->user_id);

			$count_recommended = $this->Commist_model->count_all_reports_recommended_byuserid($this->user_id);

			if(empty($date)) {

				$data_reports = $this->Commist_model->get_all_reports_accepted_byuserid($this->user_id);

			} else {

				$data_reports = $this->Commist_model->get_all_reports_accepted_byuserid_bydate($this->user_id, $date);
				
			}

			
		}

		$data['count_submitted'] = $count_submitted;

		$data['count_accepted'] = $count_accepted;

		$data['count_rejected'] = $count_rejected;

		$data['count_processed'] = $count_processed;

		$data['count_discussed'] = $count_discussed;

		$data['count_followedup'] = $count_followedup;

		$data['count_recommended'] = $count_recommended;

		$data['data_reports'] = $data_reports;
		
		$data['filter_date'] = $date;

		$this->load->view('site_header', $data);

		$this->load->view('site_sider', $data);

		$this->load->view('accepted', $data);

		$this->load->view('site_footer', $data);
		
	}

	public function processed() {
		
		$this->general->session_check();

		$this->general->session_level(1,2);

		$data['site_title'] = "Diproses";

		$data['site_menu'] = "ticket_status";

		$date = $this->input->post('filter_date', true);

		if($this->user_level == 1) {
			
			$count_submitted = $this->Commist_model->count_all_reports_submitted();
			
			$count_accepted = $this->Commist_model->count_all_reports_accepted();

			$count_rejected = $this->Commist_model->count_all_reports_rejected();

			$count_processed = $this->Commist_model->count_all_reports_processed();

			$count_discussed = $this->Commist_model->count_all_reports_discussed();

			$count_followedup = $this->Commist_model->count_all_reports_followedup();

			$count_recommended = $this->Commist_model->count_all_reports_recommended();

			if(empty($date)) {

				$data_reports = $this->Commist_model->get_all_reports_bystatusid(4);

			} else {

				$data_reports = $this->Commist_model->get_all_reports_bystatusid_bydate(4, $date);

			}

		} else {
			
			$count_submitted = $this->Commist_model->count_all_reports_submitted_byuserid($this->user_id);

			$count_accepted = $this->Commist_model->count_all_reports_accepted_byuserid($this->user_id);
			
			$count_rejected = $this->Commist_model->count_all_reports_rejected_byuserid($this->user_id);

			$count_processed = $this->Commist_model->count_all_reports_processed_byuserid($this->user_id);

			$count_discussed = $this->Commist_model->count_all_reports_discussed_byuserid($this->user_id);

			$count_followedup = $this->Commist_model->count_all_reports_followedup_byuserid($this->user_id);

			$count_recommended = $this->Commist_model->count_all_reports_recommended_byuserid($this->user_id);

			if(empty($date)) {

				$data_reports = $this->Commist_model->get_all_reports_bystatusid_byuserid(4, $this->user_id);

			} else {

				$data_reports = $this->Commist_model->get_all_reports_bystatusid_byuserid_bydate(4, $this->user_id, $date);

			}

		}

		$data['count_submitted'] = $count_submitted;

		$data['count_accepted'] = $count_accepted;

		$data['count_rejected'] = $count_rejected;

		$data['count_processed'] = $count_processed;

		$data['count_discussed'] = $count_discussed;

		$data['count_followedup'] = $count_followedup;

		$data['count_recommended'] = $count_recommended;

		$data['data_reports'] = $data_reports;

		$data['filter_date'] = $date;

		$this->load->view('site_header', $data);

		$this->load->view('site_sider', $data);

		$this->load->view('processed', $data);

		$this->load->view('site_footer', $data);
		
	}

	public function discussed() {
		
		$this->general->session_check();

		$this->general->session_level(1,2);

		$data['site_title'] = "Didiskusikan";

		$data['site_menu'] = "ticket_status";

		$date = $this->input->post('filter_date', true);

		if($this->user_level == 1) {
			
			$count_submitted = $this->Commist_model->count_all_reports_submitted();
			
			$count_accepted = $this->Commist_model->count_all_reports_accepted();

			$count_rejected = $this->Commist_model->count_all_reports_rejected();

			$count_processed = $this->Commist_model->count_all_reports_processed();

			$count_discussed = $this->Commist_model->count_all_reports_discussed();

			$count_followedup = $this->Commist_model->count_all_reports_followedup();

			$count_recommended = $this->Commist_model->count_all_reports_recommended();

			if(empty($date)) {

				$data_reports = $this->Commist_model->get_all_reports_bystatusid(5);

			} else {

				$data_reports = $this->Commist_model->get_all_reports_bystatusid_bydate(5, $date);

			}


		} else {
			
			$count_submitted = $this->Commist_model->count_all_reports_submitted_byuserid($this->user_id);

			$count_accepted = $this->Commist_model->count_all_reports_accepted_byuserid($this->user_id);
			
			$count_rejected = $this->Commist_model->count_all_reports_rejected_byuserid($this->user_id);

			$count_processed = $this->Commist_model->count_all_reports_processed_byuserid($this->user_id);

			$count_discussed = $this->Commist_model->count_all_reports_discussed_byuserid($this->user_id);

			$count_followedup = $this->Commist_model->count_all_reports_followedup_byuserid($this->user_id);

			$count_recommended = $this->Commist_model->count_all_reports_recommended_byuserid($this->user_id);

			if(empty($date)) {

				$data_reports = $this->Commist_model->get_all_reports_bystatusid_byuserid(5, $this->user_id);

			} else {

				$data_reports = $this->Commist_model->get_all_reports_bystatusid_byuserid_bydate(5, $this->user_id, $date);

			}

			
		}

		$data['count_submitted'] = $count_submitted;

		$data['count_accepted'] = $count_accepted;

		$data['count_rejected'] = $count_rejected;

		$data['count_processed'] = $count_processed;

		$data['count_discussed'] = $count_discussed;

		$data['count_followedup'] = $count_followedup;

		$data['count_recommended'] = $count_recommended;

		$data['data_reports'] = $data_reports;

		$data['filter_date'] = $date;

		$this->load->view('site_header', $data);

		$this->load->view('site_sider', $data);

		$this->load->view('discussed', $data);

		$this->load->view('site_footer', $data);
		
	}

	public function followedup() {

		$this->general->session_check();

		$this->general->session_level(1,2);

		$data['site_title'] = "Diteruskan";

		$data['site_menu'] = "ticket_status";

		$date = $this->input->post('filter_date', true);

		if($this->user_level == 1) {

			$count_submitted = $this->Commist_model->count_all_reports_submitted();

			$count_accepted = $this->Commist_model->count_all_reports_accepted();

			$count_rejected = $this->Commist_model->count_all_reports_rejected();

			$count_processed = $this->Commist_model->count_all_reports_processed();

			$count_discussed = $this->Commist_model->count_all_reports_discussed();

			$count_followedup = $this->Commist_model->count_all_reports_followedup();

			$count_recommended = $this->Commist_model->count_all_reports_recommended();

			if(empty($date)) {

				$data_reports = $this->Commist_model->get_all_reports_bystatusid(7);

			} else {

				$data_reports = $this->Commist_model->get_all_reports_bystatusid_bydate(7, $date);

			}


		} else {

			$count_submitted = $this->Commist_model->count_all_reports_submitted_byuserid($this->user_id);

			$count_accepted = $this->Commist_model->count_all_reports_accepted_byuserid($this->user_id);

			$count_rejected = $this->Commist_model->count_all_reports_rejected_byuserid($this->user_id);

			$count_processed = $this->Commist_model->count_all_reports_processed_byuserid($this->user_id);

			$count_discussed = $this->Commist_model->count_all_reports_discussed_byuserid($this->user_id);

			$count_followedup = $this->Commist_model->count_all_reports_followedup_byuserid($this->user_id);

			$count_recommended = $this->Commist_model->count_all_reports_recommended_byuserid($this->user_id);

			if(empty($date)) {

				$data_reports = $this->Commist_model->get_all_reports_bystatusid_byuserid(7, $this->user_id);

			} else {

				$data_reports = $this->Commist_model->get_all_reports_bystatusid_byuserid_bydate(7, $this->user_id, $date);

			}

		}

		$data['count_submitted'] = $count_submitted;

		$data['count_accepted'] = $count_accepted;

		$data['count_rejected'] = $count_rejected;

		$data['count_processed'] = $count_processed;

		$data['count_discussed'] = $count_discussed;

		$data['count_followedup'] = $count_followedup;

		$data['count_recommended'] = $count_recommended;

		$data['data_reports'] = $data_reports;

		$data['filter_date'] = $date;

		$this->load->view('site_header', $data);

		$this->load->view('site_sider', $data);

		$this->load->view('followedup', $data);

		$this->load->view('site_footer', $data);

	}

	public function ins_followedup() {

		$this->general->session_check();

		$this->general->session_level(3);

		$data['site_title'] = "Diteruskan";

		$data['site_menu'] = "ticket_status";
		
		$date = $this->input->post('filter_date', true);

		if(empty($date)) {

			$data_reports = $this->Commist_model->get_all_reports_bystatusid_byinstansiid(7,$this->user_instansi_id);

		} else {

			$data_reports = $this->Commist_model->get_all_reports_bystatusid_byinstansiid_bydate(7,$this->user_instansi_id, $date);

		}

		$data['data_reports'] = $data_reports;

		$data['filter_date'] = $date;

		$this->load->view('site_header', $data);

		$this->load->view('site_sider', $data);

		$this->load->view('ins_followedup', $data);

		$this->load->view('site_footer', $data);

	}

	public function recommended() {
		
		$this->general->session_check();

		$this->general->session_level(1,2);

		$data['site_title'] = "Direkomendasikan";

		$data['site_menu'] = "ticket_status";

		$date = $this->input->post('filter_date', true);

		if($this->user_level == 1) {
			
			$count_submitted = $this->Commist_model->count_all_reports_submitted();
			
			$count_accepted = $this->Commist_model->count_all_reports_accepted();

			$count_rejected = $this->Commist_model->count_all_reports_rejected();

			$count_processed = $this->Commist_model->count_all_reports_processed();

			$count_discussed = $this->Commist_model->count_all_reports_discussed();

			$count_followedup = $this->Commist_model->count_all_reports_followedup();

			$count_recommended = $this->Commist_model->count_all_reports_recommended();

			if(empty($date)) {

				$data_reports = $this->Commist_model->get_all_reports_bystatusid(6);
				
			} else {

				$data_reports = $this->Commist_model->get_all_reports_bystatusid_bydate(6, $date);

			}

		} else {
			
			$count_submitted = $this->Commist_model->count_all_reports_submitted_byuserid($this->user_id);

			$count_accepted = $this->Commist_model->count_all_reports_accepted_byuserid($this->user_id);
			
			$count_rejected = $this->Commist_model->count_all_reports_rejected_byuserid($this->user_id);

			$count_processed = $this->Commist_model->count_all_reports_processed_byuserid($this->user_id);

			$count_discussed = $this->Commist_model->count_all_reports_discussed_byuserid($this->user_id);

			$count_followedup = $this->Commist_model->count_all_reports_followedup_byuserid($this->user_id);

			$count_recommended = $this->Commist_model->count_all_reports_recommended_byuserid($this->user_id);

			if(empty($date)) {

				$data_reports = $this->Commist_model->get_all_reports_bystatusid_byuserid(6, $this->user_id);

			} else {

				$data_reports = $this->Commist_model->get_all_reports_bystatusid_byuserid_bydate(6, $this->user_id, $date);

			}
			
		}

		$data['count_submitted'] = $count_submitted;

		$data['count_accepted'] = $count_accepted;

		$data['count_rejected'] = $count_rejected;

		$data['count_processed'] = $count_processed;

		$data['count_discussed'] = $count_discussed;

		$data['count_followedup'] = $count_followedup;

		$data['count_recommended'] = $count_recommended;

		$data['data_reports'] = $data_reports;

		$data['filter_date'] = $date;

		$data_instansi = $this->Commist_model->get_all_instansi();

		$data['data_instansi'] = $data_instansi;

		$this->load->view('site_header', $data);

		$this->load->view('site_sider', $data);

		$this->load->view('recommended', $data);

		$this->load->view('site_footer', $data);
		
	}

	public function rejected() {
		
		$this->general->session_check();

		$this->general->session_level(1,2);

		$data['site_title'] = "Ditolak";

		$data['site_menu'] = "ticket_status";

		$date = $this->input->post('filter_date', true);

		if($this->user_level == 1) {
			
			$count_submitted = $this->Commist_model->count_all_reports_submitted();
			
			$count_accepted = $this->Commist_model->count_all_reports_accepted();

			$count_rejected = $this->Commist_model->count_all_reports_rejected();

			$count_processed = $this->Commist_model->count_all_reports_processed();

			$count_discussed = $this->Commist_model->count_all_reports_discussed();

			$count_followedup = $this->Commist_model->count_all_reports_followedup();

			$count_recommended = $this->Commist_model->count_all_reports_recommended();

			if(empty($date)) {

				$data_reports = $this->Commist_model->get_all_reports_bystatusid(3);

			} else {

				$data_reports = $this->Commist_model->get_all_reports_bystatusid_bydate(3, $date);

			}

		} else {
			
			$count_submitted = $this->Commist_model->count_all_reports_submitted_byuserid($this->user_id);

			$count_accepted = $this->Commist_model->count_all_reports_accepted_byuserid($this->user_id);
			
			$count_rejected = $this->Commist_model->count_all_reports_rejected_byuserid($this->user_id);

			$count_processed = $this->Commist_model->count_all_reports_processed_byuserid($this->user_id);

			$count_discussed = $this->Commist_model->count_all_reports_discussed_byuserid($this->user_id);

			$count_followedup = $this->Commist_model->count_all_reports_followedup_byuserid($this->user_id);

			$count_recommended = $this->Commist_model->count_all_reports_recommended_byuserid($this->user_id);

			if(empty($date)) {

				$data_reports = $this->Commist_model->get_all_reports_bystatusid_byuserid(3, $this->user_id);

			} else {

				$data_reports = $this->Commist_model->get_all_reports_bystatusid_byuserid_bydate(3, $this->user_id, $date);

			}
			
		}

		$data['count_submitted'] = $count_submitted;

		$data['count_accepted'] = $count_accepted;

		$data['count_rejected'] = $count_rejected;

		$data['count_processed'] = $count_processed;

		$data['count_discussed'] = $count_discussed;

		$data['count_followedup'] = $count_followedup;

		$data['count_recommended'] = $count_recommended;

		$data['data_reports'] = $data_reports;

		$data['filter_date'] = $date;

		$this->load->view('site_header', $data);

		$this->load->view('site_sider', $data);

		$this->load->view('rejected', $data);

		$this->load->view('site_footer', $data);
		
	}

	function set_upload_options_ticket($name,$type) {

		$config = array();

		$config['allowed_types'] = 'gif|jpg|jpeg|png|pdf|doc|docx';

		if (strpos($type, 'image') !== false) {
			$config['upload_path'] = './assets/images/';
		}else{
			$config['upload_path'] = './assets/files/';
		}

		$config['max_size']  = '2000';

		$config['file_name'] = $name;

		$config['overwrite'] = false;

		return $config;

	}

	public function add_ticket() {
		$this->load->library('upload');
		$this->general->session_check();

		$errors = array();

		$title = $this->input->post('add_title', true);
		$description = $this->input->post('add_description', true);
		$date = $this->input->post('add_date', true);

		if($title != "" && $description != "" && $date != "") {

			//upload file
			$countfile = count($_FILES['uploadfile']['name']);
			$arr_file_name = $this->input->post('add_file', true);
			if ($countfile > 0) {
				$files = $_FILES;
				for ($i = 0; $i < $countfile; $i++) {

					$_FILES['uploadfile']['name'] = $files['uploadfile']['name'][$i];
					$_FILES['uploadfile']['type'] = $files['uploadfile']['type'][$i];
					$_FILES['uploadfile']['tmp_name'] = $files['uploadfile']['tmp_name'][$i];
					$_FILES['uploadfile']['error'] = $files['uploadfile']['error'][$i];
					$_FILES['uploadfile']['size'] = $files['uploadfile']['size'][$i];

					if ($_FILES['uploadfile']['name'] != '') {

						$created_at = date('YmdHis');
						$filename = "file"."_".$this->user_id."_".$created_at."_".$i;
						$filetype = $_FILES['uploadfile']['type'];
						$this->upload->initialize($this->set_upload_options_ticket($filename,$filetype));

						if (!$this->upload->do_upload('uploadfile')) {
							$error = $this->upload->display_errors();
							$errors[$i] = 'An error occurred during file upload : '.$_FILES['uploadfile']['name'].' ,'.$error;
						} else {
							$dataInfo = $this->upload->data();
							if (strpos($filetype, 'image') !== false) {
								$arrfoto[$i]['file_name'] = $arr_file_name[$i];
								$arrfoto[$i]['file_path'] = base_url('assets/images/'.$dataInfo['file_name']);
								$arrfoto[$i]['file_type'] = 'image';
							}else{
								$arrfoto[$i]['file_name'] = $arr_file_name[$i];
								$arrfoto[$i]['file_path'] = base_url('assets/files/'.$dataInfo['file_name']);
								$arrfoto[$i]['file_type'] = 'file';
							}
						}
					}

				}
			}

			if(count($errors) > 0){

				$msg = "";

				foreach ($errors as $element) {
					$msg = $msg.''.$element.'<br/>';
				}

				$this->session->set_flashdata('error', $msg);

				redirect(site_url("all_tickets"));
			}

			$no_ticket = $this->generate_random_string_helper();

			$report_log_id = $this->Commist_model->insert_ticket($no_ticket,$title, $description, $date, $this->user_id);

			if(count($arrfoto) > 0){
				
				foreach ($arrfoto as $element) {

					$this->Commist_model->insert_ticket_file($report_log_id, $element['file_type'], $element['file_name'], $element['file_path'], $this->user_id);
					
				}
			}

			$this->session->set_flashdata('success', 'Penambahan tiket berhasil. Laporan baru telah berhasil dibuat.');

		} else {

			$this->session->set_flashdata('error', 'Gagal menambah tiket. Laporan baru tidak berhasil dibuat.');
			
		}

		redirect(site_url('all_tickets'));
	}
	
	
	public function edit_ticket() {
		$this->load->library('upload');
		$this->general->session_check();

		$errors = array();

		$noticket = $this->input->post('edit_no_ticket', true);
		$reportid = $this->input->post('edit_id', true);
		$edit_report_log_id = $this->input->post('edit_report_log_id', true);
		$title = $this->input->post('edit_title', true);
		$description = $this->input->post('edit_description', true);
		$date = $this->input->post('edit_date', true);

		if($title != "" && $description != "" && $date != "" && $reportid) {

			//check old file and remove if necessary
			$arr_file_id = $this->input->post('id_report_file', true);
			if($arr_file_id != null){
				$this->Commist_model->delete_file_log_where_all_or_not_id('not in',$this->user_id,$edit_report_log_id,implode(', ', $arr_file_id));
			}else{
				$data_file_log = $this->Commist_model->get_file_log($reportid, 1);
				if(count($data_file_log) > 0){
					$this->Commist_model->delete_file_log_where_all_or_not_id('all',$this->user_id,$edit_report_log_id);

				}
			}

			//upload file
			if(isset($_FILES['uploadfileeditbaru'])) {
				$countfile = count($_FILES['uploadfileeditbaru']['name']);
				$arr_file_name = $this->input->post('add_file_edit_baru', true);
				if ($countfile > 0) {
					$files = $_FILES;
					for ($i = 0; $i < $countfile; $i++) {

						$_FILES['uploadfileeditbaru']['name'] = $files['uploadfileeditbaru']['name'][$i];
						$_FILES['uploadfileeditbaru']['type'] = $files['uploadfileeditbaru']['type'][$i];
						$_FILES['uploadfileeditbaru']['tmp_name'] = $files['uploadfileeditbaru']['tmp_name'][$i];
						$_FILES['uploadfileeditbaru']['error'] = $files['uploadfileeditbaru']['error'][$i];
						$_FILES['uploadfileeditbaru']['size'] = $files['uploadfileeditbaru']['size'][$i];

						if ($_FILES['uploadfileeditbaru']['name'] != '') {

							$created_at = date('YmdHis');
							$filename = "file" . "_" . $this->user_id . "_" . $created_at . "_" . $i;
							$filetype = $_FILES['uploadfileeditbaru']['type'];
							$this->upload->initialize($this->set_upload_options_ticket($filename, $filetype));

							if (!$this->upload->do_upload('uploadfileeditbaru')) {
								$error = $this->upload->display_errors();
								$errors[$i] = 'An error occurred during file upload : ' . $_FILES['uploadfileeditbaru']['name'] . ' ,' . $error;
							} else {
								$dataInfo = $this->upload->data();
								if (strpos($filetype, 'image') !== false) {
									$arrfoto[$i]['file_name'] = $arr_file_name[$i];
									$arrfoto[$i]['file_path'] = base_url('assets/images/' . $dataInfo['file_name']);
									$arrfoto[$i]['file_type'] = 'image';
								} else {
									$arrfoto[$i]['file_name'] = $arr_file_name[$i];
									$arrfoto[$i]['file_path'] = base_url('assets/files/' . $dataInfo['file_name']);
									$arrfoto[$i]['file_type'] = 'file';
								}
							}
						}

					}
				}

				if (count($errors) > 0) {

					$msg = "";

					foreach ($errors as $element) {
						$msg = $msg . '' . $element . '<br/>';
					}

					$this->session->set_flashdata('error', $msg);

					redirect(site_url("all_tickets"));
				}

				if (count($arrfoto) > 0) {
					foreach ($arrfoto as $element) {
						$this->Commist_model->insert_ticket_file($edit_report_log_id, $element['file_type'], $element['file_name'], $element['file_path'], $this->user_id);
					}
				}

			}

			$this->Commist_model->update_ticket_byid($title, $description, $date, $this->user_id, $reportid);

			$description_log = "Tiket dengan No" . $noticket . " telah diperbarui.";

			if($reportid != "" && $description_log != "") {

				$this->Commist_model->insert_ticket_log($reportid, $description_log, $this->user_id);

				$this->session->set_flashdata('success', 'Perubahan tiket berhasil. Laporan telah diperbarui.');

			} else {

				$this->session->set_flashdata('error', 'Gagal merubah tiket. Laporan tidak berhasil diperbarui.');

			}

		} else {

			$this->session->set_flashdata('error', 'Gagal merubah tiket. Laporan tidak berhasil diperbarui.');

		}
		
		redirect(site_url('all_tickets'));
		
	}

	public function delete_ticket($reportid, $noticket) {

		$this->general->session_check();

		if($this->user_level == 1) {

			$this->Commist_model->delete_ticket_bynoticket($this->user_id, $noticket);

			$description_log = "Laporan no. tiket " . $noticket . " telah dihapus.";

			$this->Commist_model->insert_ticket_log($reportid, $description_log, $this->user_id);

			$this->session->set_flashdata('success', 'Hapus tiket berhasil. Tiket No '. $noticket .' telah dihapus.');

		} else {

			$this->Commist_model->delete_ticket_bynoticket_byuserid($this->user_id, $noticket);

			$description_log = "Laporan no. tiket " . $noticket . " telah dihapus.";

			$this->Commist_model->insert_ticket_log($reportid, $description_log, $this->user_id);

			$this->session->set_flashdata('success', 'Hapus tiket berhasil. Tiket No '. $noticket .' telah dihapus.');

		}

		redirect(site_url('all_tickets'));
	
	}

	public function status_ticket($reportid) {

		$this->load->library('upload');
		$this->general->session_check();

		$errors = array();

		$urlfrom = $this->input->post('urlfrom', true);
		$from = $this->input->post('from', true);
		$to = $this->input->post('to', true);
		$description_log = $this->input->post('description', true);
		$pic = $this->input->post('pic', true);
		$selectFollowedUp = $this->input->post('selectFollowedUp', true);

		if($from != "" && $to != "" && $reportid != "") {

			//upload file
			$countfile = count($_FILES['uploadfile']['name']);
			$arr_file_name = $this->input->post('add_file', true);
			if ($countfile > 0) {
				$files = $_FILES;
				for ($i = 0; $i < $countfile; $i++) {

					$_FILES['uploadfile']['name'] = $files['uploadfile']['name'][$i];
					$_FILES['uploadfile']['type'] = $files['uploadfile']['type'][$i];
					$_FILES['uploadfile']['tmp_name'] = $files['uploadfile']['tmp_name'][$i];
					$_FILES['uploadfile']['error'] = $files['uploadfile']['error'][$i];
					$_FILES['uploadfile']['size'] = $files['uploadfile']['size'][$i];

					if ($_FILES['uploadfile']['name'] != '') {

						$created_at = date('YmdHis');
						$filename = "file"."_".$this->user_id."_".$created_at."_".$i;
						$filetype = $_FILES['uploadfile']['type'];
						$this->upload->initialize($this->set_upload_options_ticket($filename,$filetype));

						if (!$this->upload->do_upload('uploadfile')) {
							$error = $this->upload->display_errors();
							$errors[$i] = 'An error occurred during file upload : '.$_FILES['uploadfile']['name'].' ,'.$error;
						} else {
							$dataInfo = $this->upload->data();
							if (strpos($filetype, 'image') !== false) {
								$arrfoto[$i]['file_name'] = $arr_file_name[$i];
								$arrfoto[$i]['file_path'] = base_url('assets/images/'.$dataInfo['file_name']);
								$arrfoto[$i]['file_type'] = 'image';
							}else{
								$arrfoto[$i]['file_name'] = $arr_file_name[$i];
								$arrfoto[$i]['file_path'] = base_url('assets/files/'.$dataInfo['file_name']);
								$arrfoto[$i]['file_type'] = 'file';
							}
						}
					}

				}
			}

			if(count($errors) > 0){

				$msg = "";

				foreach ($errors as $element) {
					$msg = $msg.''.$element.'<br/>';
				}

				$this->session->set_flashdata('error', $msg);

				redirect(site_url($urlfrom));
			}

			$is_finished = 0;
			if($to == 3 || ($from == 7 && $to == 7)){
				//jika status ditolak dan status followed up oleh instansi
				$is_finished = 1;
			}

			$report_log_id = $this->Commist_model->update_ticket_status_byid($from, $to, $is_finished, $description_log, $this->user_id, $reportid);

			// saat tiket diterima/ditolak terdapat pic
			if(isset($pic)) {
				$this->Commist_model->update_ticket_pic($pic, $reportid);
			}

			//if isset select followed up, update followed up to
			if(isset($selectFollowedUp)){
				$this->Commist_model->update_followedup_to($reportid,$selectFollowedUp);
			}

			if(count($arrfoto) > 0){
				foreach ($arrfoto as $element) {
					$this->Commist_model->insert_ticket_file($report_log_id, $element['file_type'], $element['file_name'], $element['file_path'], $this->user_id);
				}
			}

			$this->session->set_flashdata('success', 'Pembaruan status berhasil. Status laporan telah diperbarui.');

		} else {
		
			$this->session->set_flashdata('error', 'Gagal pembaruan status. Status laporan tidak diperbarui.');

		}

		redirect(site_url($urlfrom));
	
	}

	public function finish_ticket($reportid,$noticket,$tourl) {

		$this->general->session_check();

		if($this->user_level == 1) {

			$update = $this->Commist_model->update_finish_ticket($this->user_id, $reportid);

			if($update) {
				$this->session->set_flashdata('success', 'Selesai tiket berhasil. Tiket No ' . $noticket . ' telah diselesaikan.');
			}else{
				$this->session->set_flashdata('error', 'Gagal menyelesaikan tiket. Status laporan tidak diperbarui.');
			}

		}

		redirect(site_url($tourl));

	}

	private function generate_random_string_helper() {
		$characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$characters_numb = '0123456789';
	
		$random_string = '';
		for ($i = 0; $i < 3; $i++) {
			$random_string .= strtoupper($characters[rand(0, strlen($characters) - 1)]);
		}
	
		for ($i = 0; $i < 7; $i++) {
			$random_string .= $characters_numb[rand(0, strlen($characters_numb) - 1)];
		}

		//cek no ticket di tabel t_ticket & t_report
		$data_ticket = $this->Commist_model->check_ticket($random_string);
		if(count($data_ticket) > 0){
			$this->generate_random_string_helper();
		}
	
		return $random_string;
	}
	
	public function ticket_generate() {

		$data['site_title'] = "Generate Nomor Tiket";

		$data['site_menu'] = "ticket_generate";

		$no_ticket = $this->generate_random_string_helper();

		$email = $this->input->post('txt_email', true);

		$phone = $this->input->post('txt_phone', true);

		$captcha = $this->input->post("txt_captcha", true);

		if($captcha!="") {

			$cekCaptcha = $this->general->validate_captcha($captcha);
			if(!$cekCaptcha){
				$this->session->set_flashdata('error', 'Captcha tidak valid.');
			}else {

				//pengecekan email atau wa harus diisi salah satu
				if(!empty($email) || !empty($phone)){
					$this->Commist_model->insert_ticket_generate($no_ticket, $email, $phone);

					//kirim wa
					$noWa = $phone;
					$statusWa = false;
					if(!empty($phone)) {
						if (!(substr($phone, 0, 2) === "62")) {
							$noWa = preg_replace("/^0+/", "62", $phone);
						}
						$msg = 'Berikut adalah nomor tiket untuk anda gunakan di Web Simona Biduan : '.$no_ticket;
						$statuswa = $this->general->send_wa($noWa,$msg);
						$decodestatuswa = json_decode($statuswa,true);
						$statusWa = $decodestatuswa['status'];
					}

					//kirim email
					if(!empty($email)) {
						$emailSubject = 'Nomor Tiket Monitoring Pelayanan Bidang Informasi dan Pengaduan Stakeholders';
						$emaildata = array(
							'notiket' => $no_ticket
						);
						$statusEmail = $this->general->send_mail($email,$emailSubject,$emaildata);
					}

					$this->session->set_flashdata('success', 'Nomor tiket telah dibuat. Mohon cek email Anda atau Whatsapp Anda secara berkala.');
				}else{
					$this->session->set_flashdata('error', 'Email atau Nomor Handphone Whatsapp tidak boleh kosong.');
				}

			}

			redirect(site_url(''));
		}

		$this->general->set_captcha();

		$this->load->view('public/site_header', $data);
		$this->load->view('public/site_sider', $data);
		$this->load->view('public/ticket_generate', $data);
		$this->load->view('public/site_footer', $data);

	}

	public function ticket_create() {
		$data['site_title'] = "Buat Tiket";

		$data['site_menu'] = "ticket_generate";
		
		$this->load->library('upload');

		$errors = array();

		$no_ticket = $this->input->post('txt_noticket', true);
		$txt_valid = $this->input->post('txt_valid', true);
		$name = $this->input->post('txt_fullname', true);
		$address = $this->input->post('txt_address', true);
		$title = $this->input->post('txt_title', true);
		$description = $this->input->post('txt_description', true);
		$date = $this->input->post('txt_date', true);
		$captcha = $this->input->post("txt_captcha", true);

		if($no_ticket != "" && $txt_valid != "" && $name != "" && $address != "" && $title != ""
			&& $description != "" && $captcha != "") {

			//cek captcha
			$cekCaptcha = $this->general->validate_captcha($captcha);
			if(!$cekCaptcha){
				$this->session->set_flashdata('error', 'Captcha tidak valid.');
			}else {

				// Cek nomor tiket sudah tersedia atau belum

				$data_generated = $this->Commist_model->generated_ticket($no_ticket, $txt_valid);

				if (sizeof($data_generated) > 0) {

					// Cek nomor tiket sudah digunakan atau belum

					$dataTicket = $this->Commist_model->adm_get_reports_byticket($no_ticket);

					if (sizeof($dataTicket) > 0) {

						$this->session->set_flashdata('error', 'Nomor tiket telah digunakan. Silahkan lakukan generate nomor tiket kembali.');

					} else {

						// cek user sudah ada apa belum
						$datauser = $this->Commist_model->get_users_by($txt_valid);

						if (count($datauser) > 0) {

							$user_id = $datauser[0]['id'];

						} else {

							// Jika nomor tiket belum digunakan, insert data

							$email = $data_generated[0]["email"];

							$phone = $data_generated[0]["phone"];

							// Insert data user, sebagai informasi pengaju laporan

							$pass_user_default = $this->config->item('pass_user_default');
							$user_id = $this->Commist_model->insert_user_bygenerate($email, $pass_user_default, $name, $address, $phone);

						}

						if ($user_id != "") {

							// Upload File
							$countfile = count($_FILES['uploadfile']['name']);
							$arr_file_name = $this->input->post('add_file', true);
							if ($countfile > 0) {
								$files = $_FILES;
								for ($i = 0; $i < $countfile; $i++) {

									$_FILES['uploadfile']['name'] = $files['uploadfile']['name'][$i];
									$_FILES['uploadfile']['type'] = $files['uploadfile']['type'][$i];
									$_FILES['uploadfile']['tmp_name'] = $files['uploadfile']['tmp_name'][$i];
									$_FILES['uploadfile']['error'] = $files['uploadfile']['error'][$i];
									$_FILES['uploadfile']['size'] = $files['uploadfile']['size'][$i];

									if ($_FILES['uploadfile']['name'] != '') {

										$created_at = date('YmdHis');
										$filename = "file" . "_" . $user_id . "_" . $created_at . "_" . $i;
										$filetype = $_FILES['uploadfile']['type'];
										$this->upload->initialize($this->set_upload_options_ticket($filename, $filetype));

										if (!$this->upload->do_upload('uploadfile')) {
											$error = $this->upload->display_errors();
											$errors[$i] = 'An error occurred during file upload : ' . $_FILES['uploadfile']['name'] . ' ,' . $error;
										} else {
											$dataInfo = $this->upload->data();
											if (strpos($filetype, 'image') !== false) {
												$arrfoto[$i]['file_name'] = $arr_file_name[$i];
												$arrfoto[$i]['file_path'] = base_url('assets/images/' . $dataInfo['file_name']);
												$arrfoto[$i]['file_type'] = 'image';
											} else {
												$arrfoto[$i]['file_name'] = $arr_file_name[$i];
												$arrfoto[$i]['file_path'] = base_url('assets/files/' . $dataInfo['file_name']);
												$arrfoto[$i]['file_type'] = 'file';
											}
										}
									}

								}
							}

							if (count($errors) > 0) {

								$msg = "";

								foreach ($errors as $element) {
									$msg = $msg . '' . $element . '<br/>';
								}

								$this->session->set_flashdata('error', $msg);

								redirect(site_url("ticket_create"));
							}

							$report_log_id = $this->Commist_model->insert_ticket_bygenerate($no_ticket, $title, $description, $date, $user_id);

							if (count($arrfoto) > 0) {

								foreach ($arrfoto as $element) {

									$this->Commist_model->insert_ticket_file($report_log_id, $element['file_type'], $element['file_name'], $element['file_path'], $user_id);

								}
							}

							$this->session->set_flashdata('success', 'Penambahan tiket berhasil. Laporan baru telah berhasil dibuat.');

						}

					}

				} else {

					$this->session->set_flashdata('error', 'Nomor tiket tidak tersedia. Silahkan lakukan generate nomor tiket terlebih dahulu.');

				}
			}

			redirect(site_url('ticket_create'));

		}

		$this->general->set_captcha();

		$this->load->view('public/site_header', $data);
		$this->load->view('public/site_sider', $data);
		$this->load->view('public/ticket_create', $data);
		$this->load->view('public/site_footer', $data);

	}

	public function ticket_search() {

		$this->general->set_captcha();

		$data['site_title'] = "Cari Tiket";

		$data['site_menu'] = "ticket_search";

		$this->load->view('public/site_header', $data);
		$this->load->view('public/site_sider', $data);
		$this->load->view('public/ticket_search', $data);
		$this->load->view('public/site_footer', $data);

	}

	public function search_ticket(){

		$noticket = $this->input->post("searchTicket", true);
		$captcha = $this->input->post("txt_captcha", true);

		$cekCaptcha = $this->general->validate_captcha($captcha);
		$success = true;
		$msg = "Get Ticket Detail";
		$statusCode = 200;
		$dataTicket = null;

		if(!$cekCaptcha){
			$success = false;
			$msg = "Captcha tidak valid";
			$statusCode = 400;
		}else {
			$data = $this->Commist_model->get_reports_byticket_public($noticket);
			if(count($data) == 0){
				$success = false;
				$msg = "Tiket tidak ditemukan";
				$statusCode = 400;
			}else{
				$dataTicket = $data[0];
			}
		}

		$result = array(
			"success" => $success,
    		"message" => $msg,
    		"status_code" => $statusCode,
			"data" => $dataTicket
		);

		echo json_encode($result);
	}

	public function ticket_log() {

		$this->general->set_captcha();

		$noticket = $this->input->post('searchTicket', true);

		$data['site_title'] = "Log Tiket";

		$data['site_menu'] = "ticket_search";
		

		$dataTicket = $this->Commist_model->adm_get_reports_byticket($noticket);

		
		if(count($dataTicket) === 0){

			redirect(site_url('ticket_search'));

		}

		$data['data_surveys'] = $this->Commist_model->get_survey_questions();

		$data['survey_answer_check'] = $this->Commist_model->get_survey_answer_bynoticket($noticket);

		$dataTicket = $dataTicket[0];
		$dataFile = $this->Commist_model->get_file_log($dataTicket['id'], 1);
		$dataTicket['file'] = $dataFile;
		$timeHumanFinishedAt = strtotime($dataTicket['finished_at']);
		$dataTicket['timeline_finished_by'] = $this->humanTiming($timeHumanFinishedAt);
		$data['ticket'] = $dataTicket;

		$dataReportLog = $this->Commist_model->get_report_log($dataTicket['id']);
		if(count($dataReportLog) > 0){
			foreach ($dataReportLog as $key => $item){
				$dataReportLogFile = $this->Commist_model->get_file_log_by_reportlogid($item['id']);
				$dataReportLog[$key]['file'] = $dataReportLogFile;
				$timeHuman = strtotime($item['created_at']);
				$dataReportLog[$key]['timeline'] = $this->humanTiming($timeHuman);

				//data report item
				if($item['to'] == 0) {
					$dataReportItem = $this->Commist_model->get_diskusi_by_reportLogId($item['id']);
					$dataReportItemFile = $this->Commist_model->get_file_diskusi($dataReportItem[0]['id']);
					if(count($dataReportItem) > 0){
						$dataReportLog[$key]['item'] = $dataReportItem[0];
						$dataReportLog[$key]['item']['file'] = $dataReportItemFile;
					}else{
						$dataReportLog[$key]['item'] = array();
					}
				}else{
					$dataReportLog[$key]['item'] = array();
				}

			}
		}

		$data['timeLine'] = $dataReportLog;
		
		$this->load->view('public/site_header', $data);

		$this->load->view('public/site_sider', $data);

		$this->load->view('public/ticket_log', $data);
		
		$this->load->view('public/site_footer', $data);
		
	}

}