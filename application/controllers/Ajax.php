<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ajax extends CI_Controller {

	public function __construct()
	{

		parent::__construct();

		$this->load->model('Commist_model');

		$this->load->library('General');

		$this->general->session_check();

	}

	public function index() {
		echo "Ajax Call";
	}

	public function search_ticket($noticket){

		$user_id = $this->session->userdata('id');
		$data = $this->Commist_model->get_reports_byticket($noticket,$user_id);

		$result = array(
			"success" => true,
    		"message" => "Get Ticket Detail",
    		"status_code" => 200,
			"data" => count($data) > 0 ? $data[0] : null
		);

		echo json_encode($result);
	}

	public function get_file($reportid, $to){

		$data = $this->Commist_model->get_file_log($reportid, $to);

		$result = array(
			"success" => true,
			"message" => "Get File of Log",
			"status_code" => 200,
			"data" => count($data) > 0 ? $data : null
		);

		echo json_encode($result);
	}

	function set_upload_options_file($name,$type) {

		$config = array();

		$config['allowed_types'] = '*';

		if (strpos($type, 'image') !== false) {
			$config['upload_path'] = './assets/images/';
		}else{
			$config['upload_path'] = './assets/files/';
		}

		$config['file_name'] = $name;

		$config['overwrite'] = false;

		return $config;

	}

	public function tambah_diskusi(){

		$this->load->library('upload');
		$this->general->session_check();

		$success = true;
		$statuscode = 200;
		$errors = array();

		$title_diskusi = $this->input->post('add_diskusi', true);
		$description_diskusi = $this->input->post('description_diskusi', true);
		$tanggal_diskusi = $this->input->post('tanggal_diskusi', true);
		$fromDiskusi = $this->input->post('fromDiskusi', true);
		$idReportDiskusi = $this->input->post('idReportDiskusi', true);

		if($title_diskusi !== ''){

			//upload file
			$countfile = count($_FILES['uploadfilediskusi']['name']);
			$arr_file_name = $this->input->post('add_file_diskusi', true);
			if ($countfile > 0) {
				$files = $_FILES;
				for ($i = 0; $i < $countfile; $i++) {

					$_FILES['uploadfilediskusi']['name'] = $files['uploadfilediskusi']['name'][$i];
					$_FILES['uploadfilediskusi']['type'] = $files['uploadfilediskusi']['type'][$i];
					$_FILES['uploadfilediskusi']['tmp_name'] = $files['uploadfilediskusi']['tmp_name'][$i];
					$_FILES['uploadfilediskusi']['error'] = $files['uploadfilediskusi']['error'][$i];
					$_FILES['uploadfilediskusi']['size'] = $files['uploadfilediskusi']['size'][$i];

					if ($_FILES['uploadfilediskusi']['name'] != '') {

						$created_at = date('YmdHis');
						$filename = "file_diskusi"."_".$this->user_id."_".$created_at."_".$i;
						$filetype = $_FILES['uploadfilediskusi']['type'];
						$this->upload->initialize($this->set_upload_options_file($filename,$filetype));

						if (!$this->upload->do_upload('uploadfilediskusi')) {
							$error = $this->upload->display_errors();
							$errors[$i] = 'Terjadi kesalahan pada upload file : '.$_FILES['uploadfile']['name'].' ,'.$error;
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

			$report_item_id = $this->Commist_model->insert_diskusi($idReportDiskusi, $fromDiskusi, $title_diskusi, $description_diskusi, $tanggal_diskusi, $this->user_id);

			if(count($arrfoto) > 0){

				foreach ($arrfoto as $element) {

					$this->Commist_model->insert_ticket_file_item($report_item_id, $element['file_type'], $element['file_name'], $element['file_path'], $this->user_id);

				}
			}

			$msg = 'Berhasil menambahkan diskusi. Laporan telah diperbarui';
			$statuscode = 400;

		}else{
			$success = false;
			$errors[] = 'Gagal menambahkan diskusi. <br/> Judul diskusi tidak boleh kosong';
			$statuscode = 400;
		}

		if(count($errors) > 0){

			$msg = "";

			foreach ($errors as $element) {
				$msg = $msg.''.$element.'<br/>';
			}
		}


		$result = array(
			"success" => $success,
			"message" => $msg,
			"status_code" => $statuscode,
			"data" => array(
				"id" => $idReportDiskusi
			)
		);

		echo json_encode($result);
	}

	public function get_data_diskusi($reportid, $from){

		$data = $this->Commist_model->get_diskusi_by_reportId($reportid, $from);

		if(count($data) > 0){
			foreach ($data as $key => $datum) {
				$dataFile = $this->Commist_model->get_file_diskusi($datum['id']);
				$data[$key]['file'] = $dataFile;
			}
		}

		$result = array(
			"success" => true,
			"message" => "Get Data Diskusi",
			"status_code" => 200,
			"data" => count($data) > 0 ? $data : null
		);

		echo json_encode($result);
	}

	public function remove_diskusi($itemId){

		$data = $this->Commist_model->delete_report_item($itemId, $this->user_id);

		$result = array(
			"success" => $data,
			"message" => $data ? "Diskusi berhasil dihapus" : "Diskusi gagal dihapus",
			"status_code" => 200,
			"data" => null
		);

		echo json_encode($result);
	}

	public function survey_chart() {
		$surveyId = $this->input->post('survey_id');

		if(empty($surveyId)) {
			$count_surveys = $this->Commist_model->count_all_surveys();
		} else {
			$count_surveys = $this->Commist_model->count_all_surveys_byid($surveyId);
		}
		
		header('Content-Type: application/json');
		echo json_encode($count_surveys);
	}

	public function total_tickets_chart() {

		$date = $this->input->post('date_range');

		if($this->user_level == 1) {
			
			if(empty($date)) {

				$count_tickets = $this->Commist_model->count_all_reports_stat();
				
			} else {
	
				$count_tickets = $this->Commist_model->count_all_reports_stat_bydate($date);
	
			}

		} else if ($this->user_level == 3 || $this->user_level == 4) {

			if(empty($date)) {

				$count_tickets = $this->Commist_model->count_all_reports_stat_byinstansiid($this->user_instansi_id);

			} else {

				$count_tickets = $this->Commist_model->count_all_reports_stat_byinstansiid_bydate($this->user_instansi_id, $date);
			}

		}
		
		header('Content-Type: application/json');
		echo json_encode($count_tickets);
	}

}