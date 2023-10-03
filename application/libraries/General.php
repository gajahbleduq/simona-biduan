<?php defined('BASEPATH') OR exit('No direct script access allowed');

class General {

    public function session_check(){
        $CI =& get_instance();
        $CI->user_id      = $CI->session->userdata('id');
        $CI->user_email   = $CI->session->userdata('email');
        $CI->user_nama    = $CI->session->userdata('full_name');
        $CI->user_alamat   = $CI->session->userdata('address');
        $CI->user_handphone   = $CI->session->userdata('phone');
        $CI->user_level   = $CI->session->userdata('role_id');
		$CI->user_photo   = $CI->session->userdata('photo');
		$CI->user_instansi   = $CI->session->userdata('instansi');
		$CI->user_instansi_id   = $CI->session->userdata('instansi_id');

        if ($CI->user_id=="") {
            redirect(site_url("logout"));
        }
    }
	
    public function session_active(){
        $CI =& get_instance();
        $CI->user_id      = $CI->session->userdata('id');
        if ($CI->user_id!="") {
            redirect(site_url("dashboards"));
        }
    }	

    public function session_level($level,$level2=0){
        $CI =& get_instance();
        $CI->user_level = $CI->session->userdata('role_id');
        if ($CI->user_level!=$level && $CI->user_level!=$level2) {
            redirect(site_url("dashboards"));
        }
    }

	public function datetime_indo($tanggal)
	{
		$returndate = '';
		if($tanggal !== null && $tanggal !== '0000-00-00 00:00:00') {
			$bulan = array(1 => 'January',
				'February',
				'March',
				'April',
				'May',
				'June',
				'July',
				'August',
				'September',
				'October',
				'November',
				'December'
			);
			$split = explode(' ', $tanggal);
			$tanggal = explode('-', $split[0]);
			$tgl = $tanggal[2] . ' ' . $bulan[(int)$tanggal[1]] . ' ' . $tanggal[0];
			$returndate = $tgl . ' ' . $split[1];
		}

		return $returndate;
	}

	public function set_captcha(){
		$CI =& get_instance();

		$n1 = rand(0,99);
		$n2 = rand(0,99);
		$sessdatacaptcha = array(
			'n1' => $n1,
			'n2' => $n2,
			'hasil' => $n1 + $n2
		);

		$CI->session->set_userdata($sessdatacaptcha);

		return true;
	}

	public function validate_captcha($value){
		$CI =& get_instance();

		$resultcaptcha = $CI->config->item('app_key').$CI->session->userdata('hasil');
		$resultcaptchainput = $CI->config->item('app_key').$value;

		if($resultcaptcha === $resultcaptchainput){
			return true;
		}else{
			return false;
		}
	}

	public function send_wa($number,$mesg){

		$CI =& get_instance();

		$data = array(
			'api_key' => $CI->config->item('app_key_wa'),
			'sender' => '6285323778786',
			'number' => $number,
			'message' => $mesg
		);
		$curl = curl_init();

		curl_setopt_array($curl, array(
			CURLOPT_URL => 'https://wa.srv15.wapanels.com/send-message',
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => '',
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 0,
			CURLOPT_FOLLOWLOCATION => true,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => 'POST',
			CURLOPT_POSTFIELDS => json_encode($data),
			CURLOPT_HTTPHEADER => array(
				'Content-Type: application/json'
			),
		));

		$response = curl_exec($curl);

		curl_close($curl);

		return $response;

	}

	public function send_mail($emailto,$emailsubject,$emaildata){

		$CI =& get_instance();

//		$our_server = 'mail.polkam.go.id';

//		ini_set('SMTP', $our_server );

		// Konfigurasi email
		$config = Array(
			'protocol' => 'smtp',
			'smtp_host' => 'mail.polkam.go.id',
			'smtp_crypto' => 'ssl/tls',
//			'smtp_port' => 995,
//			'smtp_port' => 465,
			'smtp_port' => 25,
			'smtp_user' => 'simonabiduan',
			'smtp_pass' => 'Polhuk4m!@#',
//			'smtp_pass' => 'simonabiduan',
			'mailtype'  => 'html',
			'charset'   => 'utf-8',
			'crlf'    => "\r\n",
			'newline' => "\r\n"
		);

		$CI->load->library('email');

		$CI->email->initialize($config);

		$CI->email->set_mailtype('html');

		$CI->email->from('simonabiduan@polkam.go.id', 'simonabiduan');
		$CI->email->to($emailto);

		$CI->email->subject($emailsubject);

		$dataviewmail = array(
			'notiket' => $emaildata['notiket'],
		);

		$mesg = $CI->load->view('email/template',$dataviewmail, true);
		$CI->email->message($mesg);

		//Send mail
		if($CI->email->send()){
			$status = 1;
		}else {
			$status = 0;
//			$status = $CI->email->print_debugger();
		}

		return $status;

	}

}
