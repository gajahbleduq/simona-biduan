<?php
class Commist_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function get_login($email, $passwd) {
		$mpass = md5($passwd);
		$sql = "SELECT u.id, u.email, u.hash, u.full_name, u.address, u.phone, u.is_active, u.photo, ur.role_id, u.instansi_id, i.instansi FROM t_user u LEFT JOIN t_user_role ur ON ur.user_id = u.id LEFT JOIN t_instansi i ON i.id = u.instansi_id WHERE u.email = ? AND u.hash = ? AND u.is_active = 1 AND u.deleted_at IS NULL AND u.deleted_by IS NULL";
		$query = $this->db->query($sql, array($email, $mpass));
	
		return $query->result_array();
	}

    function get_users() {
		$sql = "SELECT u.id, u.email, u.hash, u.full_name, u.address, u.phone, u.is_active, u.created_at, (SELECT full_name FROM t_user WHERE id = u.created_by) as created_name, ur.role_id, i.instansi FROM t_user u LEFT JOIN t_user_role ur ON ur.user_id = u.id LEFT JOIN t_instansi i ON i.id = u.instansi_id WHERE u.deleted_at IS NULL AND u.deleted_by IS NULL AND u.hash IS NOT NULL ORDER BY u.created_at DESC, u.full_name ASC";
		$query = $this->db->query($sql);
	
		return $query->result_array();
	}

    function get_roles() {
		$sql = "SELECT r.id, r.name, r.created_at FROM t_role r";
		$query = $this->db->query($sql);
	
		return $query->result_array();
	}

    function get_kementerian() {
		$sql = "SELECT i.id, i.instansi, type, i.created_at, (SELECT full_name FROM t_user WHERE id = i.created_by) as created_name, updated_at, (SELECT full_name FROM t_user WHERE id = i.updated_by) as updated_name, deleted_at, (SELECT full_name FROM t_user WHERE id = i.deleted_by) as deleted_name FROM t_instansi i WHERE i.type = 1 AND i.deleted_at IS NULL AND i.deleted_by IS NULL";
		$query = $this->db->query($sql);
	
		return $query->result_array();
	}

    function get_instansi() {
		$sql = "SELECT i.id, i.instansi, type, i.created_at, (SELECT full_name FROM t_user WHERE id = i.created_by) as created_name, updated_at, (SELECT full_name FROM t_user WHERE id = i.updated_by) as updated_name, deleted_at, (SELECT full_name FROM t_user WHERE id = i.deleted_by) as deleted_name FROM t_instansi i WHERE i.type = 2 AND i.deleted_at IS NULL AND i.deleted_by IS NULL";
		$query = $this->db->query($sql);
	
		return $query->result_array();
	}

    function get_all_instansi() {
		$sql = "SELECT i.id, i.instansi, type, i.created_at, (SELECT full_name FROM t_user WHERE id = i.created_by) as created_name, updated_at, (SELECT full_name FROM t_user WHERE id = i.updated_by) as updated_name, deleted_at, (SELECT full_name FROM t_user WHERE id = i.deleted_by) as deleted_name FROM t_instansi i WHERE i.deleted_at IS NULL AND i.deleted_by IS NULL ORDER BY i.created_at DESC, i.instansi ASC";
		$query = $this->db->query($sql);
	
		return $query->result_array();
	}

	function get_survey_questions() {
		$sql = "SELECT sq.id, sq.title, sq.question, sq.created_at, (SELECT full_name FROM t_user u WHERE u.id = sq.created_by) as created_name, updated_at, (SELECT full_name FROM t_user u WHERE u.id = sq.updated_by) as updated_name FROM t_survey_question sq WHERE sq.deleted_at IS NULL AND sq.deleted_by IS NULL ORDER BY sq.created_at DESC, sq.title ASC";
		$query = $this->db->query($sql);
	
		return $query->result_array();
	}

	function get_survey_answer_bynoticket($noticket) {
		$sql = "SELECT s.survey_id, s.answer, s.no_ticket, s.created_at, s.created_by FROM t_survey s WHERE s.no_ticket = ?";
		$query = $this->db->query($sql, array($noticket));
	
		return $query->result_array();
	}

	function insert_survey_questions($title, $question, $userid) {
		$created_at = date('Y-m-d H:i:s');

		$sql = "INSERT INTO t_survey_question (title, question, created_at, created_by) values (?, ?, ?, ?) ";

		$this->db->query($sql, array($title, $question, $created_at, $userid));
	}

	function insert_survey_answer($surveyid, $answer, $noticket, $userid) {
		$created_at = date('Y-m-d H:i:s');

		$sql = "INSERT INTO t_survey (survey_id, answer, no_ticket, created_at, created_by) values (?, ?, ?, ?, ?) ";

		$this->db->query($sql, array($surveyid, $answer, $noticket, $created_at, $userid));
	}
	
	function update_survey_questions($title, $question, $userid, $surveyid) {
		$updated_at = date('Y-m-d H:i:s');

		$sql = "UPDATE t_survey_question SET title = ?, question = ?, updated_at = ?, updated_by = ? WHERE id = ? ";

		$this->db->query($sql, array($title, $question, $updated_at, $userid, $surveyid));
	}

	function delete_survey_questions($userid, $surveyid) {
		$deleted_at = date('Y-m-d H:i:s');

		$sql = "UPDATE t_survey_question SET deleted_at = ?, deleted_by = ? WHERE id = ? ";

		$this->db->query($sql, array($deleted_at, $userid, $surveyid));
	}

	function insert_instansi($instansi, $type, $userid) {
		$created_at = date('Y-m-d H:i:s');

		$sql = "INSERT INTO t_instansi (instansi, type, created_at, created_by) values (?, ?, ?, ?) ";

		$this->db->query($sql, array($instansi, $type, $created_at, $userid));
	}
	
	function update_instansi($instansi, $type, $userid, $instansi_id) {
		$updated_at = date('Y-m-d H:i:s');

		$sql = "UPDATE t_instansi SET instansi = ?, type = ?, updated_at = ?, updated_by = ? WHERE id = ? ";

		$this->db->query($sql, array($instansi, $type, $updated_at, $userid, $instansi_id));
	}

	function delete_instansi($userid, $instansi_id) {
		$deleted_at = date('Y-m-d H:i:s');

		$sql = "UPDATE t_instansi SET deleted_at = ?, deleted_by = ? WHERE id = ? ";

		$this->db->query($sql, array($deleted_at, $userid, $instansi_id));
	}
	
    function get_users_byid($id) {
		$sql = "SELECT u.id, u.email, u.hash, u.full_name, u.address, u.phone, u.is_active, ur.role_id FROM t_user u LEFT JOIN t_user_role ur ON ur.user_id = u.id WHERE u.id = ?";
		$query = $this->db->query($sql, array($id));
	
		return $query->row_array();
	}

	function get_users_byemail($email) {
		$sql = "SELECT u.id, u.email, u.hash, u.full_name, u.address, u.phone, u.is_active FROM t_user u WHERE u.email = ?";
		$query = $this->db->query($sql, array($email));
	
		return $query->result_array();
	}

	function get_users_by($value) {
		$sql = "SELECT u.id, u.email, u.hash, u.full_name, u.address, u.phone, u.is_active FROM t_user u WHERE u.phone = ? OR u.email = ?";
		$query = $this->db->query($sql, array($value,$value));

		return $query->result_array();
	}

	function add_user_register($email, $password, $nama, $address, $phone) {
		$mpass = md5($password);

		$created_at = date('Y-m-d H:i:s');

		$sql = "INSERT INTO t_user (email, hash, full_name, address, phone, is_active, created_at) values (?, ?, ?, ?, ?, 1, ?) ";

		$this->db->query($sql, array($email, $mpass, $nama, $address, $phone, $created_at));

		return $this->db->insert_id();
	}
	
	function add_user($email, $password, $nama, $address, $phone, $status, $instansi_id, $created_by) {
		$mpass = md5($password);

		$created_at = date('Y-m-d H:i:s');

		$sql = "INSERT INTO t_user (email, hash, full_name, address, phone, is_active, instansi_id, created_at, created_by) values (?, ?, ?, ?, ?, ?, ?, ?, ?) ";

		$this->db->query($sql, array($email, $mpass, $nama, $address, $phone, $status, $instansi_id, $created_at, $created_by));

		return $this->db->insert_id();
	}

	function add_role($user_id, $role) {

		$created_at = date('Y-m-d H:i:s');

		$sql = "INSERT INTO t_user_role (user_id, role_id, created_at) values (?, ?, ?) ";

		$this->db->query($sql, array($user_id, $role, $created_at));
	}

    function update_user_byid($email, $nama, $address, $phone, $status, $instansi_id, $updated_by, $id) {
		$updated_at = date('Y-m-d H:i:s');

		$sql = "UPDATE t_user SET email = ?, full_name = ?, address = ?, phone = ?, is_active = ?, instansi_id = ?, updated_at = ?, updated_by = ? WHERE id = ?";

		$this->db->query($sql, array($email, $nama, $address, $phone, $status, $instansi_id, $updated_at, $updated_by, $id));
	}

	function update_role_byuserid($role, $userid) {
		$sql = "UPDATE t_user_role SET role_id = ? WHERE user_id = ?";

		$this->db->query($sql, array($role, $userid));
	}

	function delete_user_byid($deleted_by, $id) {
		$deleted_at = date('Y-m-d H:i:s');

		$sql = "UPDATE t_user SET deleted_at = ?, deleted_by = ? WHERE id = ?";

		$this->db->query($sql, array($deleted_at, $deleted_by, $id));
	}

	function delete_role_byuserid($userid) {
		$sql = "DELETE FROM t_user_role WHERE user_id = ?";

		$this->db->query($sql, array($userid));
	}

	function update_profile_byid($email, $nama, $address, $phone, $avatar, $updated_by, $id) {
		$updated_at = date('Y-m-d H:i:s');

		$sql = "UPDATE t_user SET email = ?, full_name = ?, address = ?, phone = ?, photo = ?, updated_at = ?, updated_by = ? WHERE id = ?";

		$this->db->query($sql, array($email, $nama, $address, $phone, $avatar, $updated_at, $updated_by, $id));
	}

	function chgpass($password, $updated_by, $id) {
		
		$mpass = md5($password);

		$updated_at = date('Y-m-d H:i:s');

		$sql = "UPDATE t_user SET hash = ?, updated_at = ?, updated_by = ? WHERE id = ?";

		$this->db->query($sql, array($mpass, $updated_at, $updated_by, $id));
	}

	function count_all_reports() {

		$sql = "SELECT COUNT(*) as total_reports FROM t_report where deleted_at is null";

		return $this->db->query($sql)->row()->total_reports;
	}

	function count_all_reports_byuserid($userid) {

		$sql = "SELECT COUNT(*) as total_reports FROM t_report WHERE created_by = ? and deleted_at is null";

		return $this->db->query($sql, array($userid))->row()->total_reports;
	}

	function count_all_reports_submitted() {

		$sql = "SELECT COUNT(*) as total_reports FROM t_report WHERE status = 1 and deleted_at is null";

		return $this->db->query($sql)->row()->total_reports;
	}

	function count_all_reports_submitted_byuserid($userid) {

		$sql = "SELECT COUNT(*) as total_reports FROM t_report WHERE status = 1 AND created_by = ? and deleted_at is null";

		return $this->db->query($sql, array($userid))->row()->total_reports;
	}

	function count_all_reports_accepted() {

		$sql = "SELECT COUNT(*) as total_reports FROM t_report WHERE status in (2,4,5,6,7) and deleted_at is null";

		return $this->db->query($sql)->row()->total_reports;
	}

	function count_all_reports_accepted_byuserid($userid) {

		$sql = "SELECT COUNT(*) as total_reports FROM t_report WHERE status in (2,4,5,6,7) AND created_by = ? and deleted_at is null";

		return $this->db->query($sql, array($userid))->row()->total_reports;
	}

	function count_all_reports_rejected() {

		$sql = "SELECT COUNT(*) as total_reports FROM t_report WHERE status = 3 and deleted_at is null";

		return $this->db->query($sql)->row()->total_reports;
	}

	function count_all_reports_rejected_byuserid($userid) {

		$sql = "SELECT COUNT(*) as total_reports FROM t_report WHERE status = 3 AND created_by = ? and deleted_at is null";

		return $this->db->query($sql, array($userid))->row()->total_reports;
	}

	function count_all_reports_processed() {

		$sql = "SELECT COUNT(*) as total_reports FROM t_report WHERE status = 4 and deleted_at is null";

		return $this->db->query($sql)->row()->total_reports;
	}

	function count_all_reports_processed_byuserid($userid) {

		$sql = "SELECT COUNT(*) as total_reports FROM t_report WHERE status = 4 AND created_by = ? and deleted_at is null";

		return $this->db->query($sql, array($userid))->row()->total_reports;
	}

	function count_all_reports_discussed() {

		$sql = "SELECT COUNT(*) as total_reports FROM t_report WHERE status = 5 and deleted_at is null";

		return $this->db->query($sql)->row()->total_reports;
	}

	function count_all_reports_discussed_byuserid($userid) {

		$sql = "SELECT COUNT(*) as total_reports FROM t_report WHERE status = 5 AND created_by = ? and deleted_at is null";

		return $this->db->query($sql, array($userid))->row()->total_reports;
	}
	
	function count_all_reports_followedup() {

		$sql = "SELECT COUNT(*) as total_reports FROM t_report WHERE status = 7 and deleted_at is null";

		return $this->db->query($sql)->row()->total_reports;
	}

	function count_all_reports_followedup_byuserid($userid) {

		$sql = "SELECT COUNT(*) as total_reports FROM t_report WHERE status = 7 AND created_by = ? and deleted_at is null";

		return $this->db->query($sql, array($userid))->row()->total_reports;
	}

	function count_all_reports_followedup_byinstansiid($instansiid) {

		$sql = "SELECT COUNT(*) as total_reports FROM t_report WHERE status = 7 AND followed_up_to = ? and deleted_at is null";

		return $this->db->query($sql, array($instansiid))->row()->total_reports;
	}

	function count_all_reports_recommended() {

		$sql = "SELECT COUNT(*) as total_reports FROM t_report WHERE status = 6 and deleted_at is null";

		return $this->db->query($sql)->row()->total_reports;
	}

	function count_all_reports_recommended_byuserid($userid) {

		$sql = "SELECT COUNT(*) as total_reports FROM t_report WHERE status = 6 AND created_by = ? and deleted_at is null";

		return $this->db->query($sql, array($userid))->row()->total_reports;
	}

	function count_all_surveys() {

		$sql = "SELECT 
			sq.title,
			s.survey_id,
			COUNT(CASE WHEN s.answer = 5 THEN 1 END) as sangat_puas,
			COUNT(CASE WHEN s.answer = 4 THEN 1 END) as puas,
			COUNT(CASE WHEN s.answer = 3 THEN 1 END) as cukup,
			COUNT(CASE WHEN s.answer = 2 THEN 1 END) as kurang_puas,
			COUNT(CASE WHEN s.answer = 1 THEN 1 END) as tidak_puas
		FROM t_survey s 
		LEFT JOIN t_survey_question sq ON sq.id = s.survey_id
		GROUP BY sq.title, s.survey_id
		ORDER BY sq.title ASC
		";

		$query = $this->db->query($sql);
	
		return $query->result_array();
	}

	function count_all_surveys_byid($surveyId) {

		$sql = "SELECT 
			sq.title,
			s.survey_id,
			COUNT(CASE WHEN s.answer = 5 THEN 1 END) as sangat_puas,
			COUNT(CASE WHEN s.answer = 4 THEN 1 END) as puas,
			COUNT(CASE WHEN s.answer = 3 THEN 1 END) as cukup,
			COUNT(CASE WHEN s.answer = 2 THEN 1 END) as kurang_puas,
			COUNT(CASE WHEN s.answer = 1 THEN 1 END) as tidak_puas
		FROM t_survey s 
		LEFT JOIN t_survey_question sq ON sq.id = s.survey_id
		WHERE s.survey_id = ?
		GROUP BY sq.title, s.survey_id
		ORDER BY sq.title ASC
		";

		$query = $this->db->query($sql, array($surveyId));
	
		return $query->result_array();
	}

	function count_all_reports_stat() {

		$sql = "SELECT DATE(created_at) as date,
				COUNT(*) as total_reports
		FROM t_report
		WHERE deleted_at IS NULL
			AND created_at >= CURDATE() - INTERVAL 2 WEEK
		GROUP BY DATE(created_at)
		";

		$query = $this->db->query($sql);
	
		return $query->result_array();
	}

	function count_all_reports_stat_byinstansiid($instansi_id) {

		$sql = "SELECT DATE(created_at) as date,
				COUNT(*) as total_reports
		FROM t_report
		WHERE
			deleted_at IS NULL
			AND status = 7
			AND followed_up_to = ?
			AND created_at >= CURDATE() - INTERVAL 2 WEEK
		GROUP BY DATE(created_at)
		";

		$query = $this->db->query($sql, array($instansi_id));
	
		return $query->result_array();
	}

	function count_all_reports_stat_bydate($date) {
		$sql = "SELECT DATE(created_at) as date,
				COUNT(*) as total_reports
				FROM t_report
				WHERE deleted_at IS NULL";
	
		if (strpos($date, 'to') !== false) {
			// Jika input berupa rentang tanggal
			list($start_date, $end_date) = explode(' to ', $date);
			$sql .= " AND DATE(created_at) BETWEEN ? AND ? GROUP BY DATE(created_at)";
			$query = $this->db->query($sql, array($start_date, $end_date));
		} else {
			// Jika hanya satu tanggal
			$sql .= " AND DATE(created_at) = ? GROUP BY DATE(created_at)";
			$query = $this->db->query($sql, array($date));
		}
		
	
		return $query->result_array();
	}

	function count_all_reports_stat_byinstansiid_bydate($instansi_id, $date) {
		$sql = "SELECT DATE(created_at) as date,
				COUNT(*) as total_reports
				FROM t_report
				WHERE deleted_at IS NULL
				AND status = 7
				AND followed_up_to = ?";
	
		if (strpos($date, 'to') !== false) {
			// Jika input berupa rentang tanggal
			list($start_date, $end_date) = explode(' to ', $date);
			$sql .= " AND DATE(created_at) BETWEEN ? AND ? GROUP BY DATE(created_at)";
			$query = $this->db->query($sql, array($instansi_id, $start_date, $end_date));
		} else {
			// Jika hanya satu tanggal
			$sql .= " AND DATE(created_at) = ? GROUP BY DATE(created_at)";
			$query = $this->db->query($sql, array($instansi_id, $date));
		}
		
	
		return $query->result_array();
	}

	function get_all_reports() {
		$sql = "SELECT
				r.id,
				r.no_ticket,
				r.title,
				r.description,
				r.date,
				r.status,
				r.created_at,
				(
				SELECT
					full_name
				FROM
					t_user u
				WHERE
					u.id = r.created_by) as created_name,
				r.updated_at,
				(
				SELECT
					full_name
				FROM
					t_user u
				WHERE
					u.id = r.updated_by) as updated_name,
				r.is_finished,
				r.finished_at,
				(
				SELECT
					full_name
				FROM
					t_user u
				WHERE
					u.id = r.finished_by) as finished_name,
				r.followed_up_to as instansi_id,
				i.instansi as instansi_name
			FROM
				t_report r
			left join 
				t_instansi i on i.id = r.followed_up_to
			WHERE
				r.deleted_at IS NULL
				AND
				r.deleted_by IS NULL
			ORDER BY
   				r.created_at DESC, r.updated_at DESC, r.status ASC";
		$query = $this->db->query($sql);
	
		return $query->result_array();
	}

	function get_all_reports_bydate($date) {
		$sql = "SELECT
				r.id,
				r.no_ticket,
				r.title,
				r.description,
				r.date,
				r.status,
				r.created_at,
				(
				SELECT
					full_name
				FROM
					t_user u
				WHERE
					u.id = r.created_by) as created_name,
				r.updated_at,
				(
				SELECT
					full_name
				FROM
					t_user u
				WHERE
					u.id = r.updated_by) as updated_name,
				r.is_finished,
				r.finished_at,
				(
				SELECT
					full_name
				FROM
					t_user u
				WHERE
					u.id = r.finished_by) as finished_name,
				r.followed_up_to as instansi_id,
				i.instansi as instansi_name
			FROM
				t_report r
			LEFT JOIN 
				t_instansi i ON i.id = r.followed_up_to
			WHERE
				r.deleted_at IS NULL
				AND
				r.deleted_by IS NULL";
	
		if (strpos($date, 'to') !== false) {
			// Jika input berupa rentang tanggal
			list($start_date, $end_date) = explode(' to ', $date);
			$sql .= " AND DATE(r.created_at) BETWEEN ? AND ? ORDER BY r.created_at DESC, r.updated_at DESC, r.status ASC";
			$query = $this->db->query($sql, array($start_date, $end_date));
		} else {
			// Jika hanya satu tanggal
			$sql .= " AND DATE(r.created_at) = ? ORDER BY r.created_at DESC, r.updated_at DESC, r.status ASC";
			$query = $this->db->query($sql, array($date));
		}
	
		return $query->result_array();
	}
	

	function get_all_reports_byuserid($userid) {
		$sql = "SELECT
				r.id,
				r.no_ticket,
				r.title,
				r.description,
				r.date,
				r.status,
				r.created_at,
				(
				SELECT
					full_name
				FROM
					t_user u
				WHERE
					u.id = r.created_by) as created_name,
				r.updated_at,
				(
				SELECT
					full_name
				FROM
					t_user u
				WHERE
					u.id = r.updated_by) as updated_name,
				r.is_finished,
				r.finished_at,
				(
				SELECT
					full_name
				FROM
					t_user u
				WHERE
					u.id = r.finished_by) as finished_name,
				r.followed_up_to as instansi_id,
				i.instansi as instansi_name
			FROM
				t_report r
			left join 
				t_instansi i on i.id = r.followed_up_to
			WHERE
				r.created_by = ?
				AND
				r.deleted_at IS NULL
				AND
				r.deleted_by IS NULL
			ORDER BY
   				r.created_at DESC, r.updated_at DESC, r.status ASC";
		$query = $this->db->query($sql, array($userid));
	
		return $query->result_array();
	}

	function get_all_reports_byuserid_bydate($userid, $date) {
		$sql = "SELECT
				r.id,
				r.no_ticket,
				r.title,
				r.description,
				r.date,
				r.status,
				r.created_at,
				(
				SELECT
					full_name
				FROM
					t_user u
				WHERE
					u.id = r.created_by) as created_name,
				r.updated_at,
				(
				SELECT
					full_name
				FROM
					t_user u
				WHERE
					u.id = r.updated_by) as updated_name,
				r.is_finished,
				r.finished_at,
				(
				SELECT
					full_name
				FROM
					t_user u
				WHERE
					u.id = r.finished_by) as finished_name,
					r.followed_up_to as instansi_id,
					i.instansi as instansi_name
			FROM
				t_report r
			LEFT JOIN 
				t_instansi i ON i.id = r.followed_up_to
			WHERE
				r.created_by = ?
				AND
				r.deleted_at IS NULL
				AND
				r.deleted_by IS NULL";
	
		if (strpos($date, 'to') !== false) {
			// Jika input berupa rentang tanggal
			list($start_date, $end_date) = explode(' to ', $date);
			$sql .= " AND DATE(r.created_at) BETWEEN ? AND ? ORDER BY r.created_at DESC, r.updated_at DESC, r.status ASC";
			$query = $this->db->query($sql, array($userid, $start_date, $end_date));
		} else {
			// Jika hanya satu tanggal
			$sql .= " AND DATE(r.created_at) = ? ORDER BY r.created_at DESC, r.updated_at DESC, r.status ASC";
			$query = $this->db->query($sql, array($userid, $date));
		}
	
		return $query->result_array();
	}
	

	function adm_get_reports_byticket($noticket,$userid = '') {
    	$param = array($noticket);
		$sql = "select 
			r.id,
			r.no_ticket,
			r.title,
			r.description,
			r.`date`,
			r.status,
			rs.name as 'status_name',
			rs.icon as 'status_icon',
			rs.color as 'status_color',
			r.created_at,
			r.created_by,
			r.is_finished,
			r.finished_at,
			r.finished_by,
			f.full_name as 'finished_full_name',
			u.full_name,
			u.email,
			u.address,
			u.phone,
			r.followed_up_to as instansi_id,
			i.instansi as instansi_name
		from
			t_report r
		left join 
			t_user u on u.id = r.created_by
		left join 
			t_report_status rs on rs.id = r.status
		left join 
			t_user f on f.id = r.finished_by
		left join 
			t_instansi i on i.id = r.followed_up_to
		where 
			r.no_ticket = ?
			and
			r.deleted_at is null
			and
			r.deleted_by is null
			";

		if($userid !== ''){
			$param[] = $userid;
			$sql .= " and r.created_by = ?";
		}
				
		$query = $this->db->query($sql, $param);

		return $query->result_array();
	}

	function get_reports_byticket($noticket, $userid) {

		$sql = "select 
			r.id,
			r.no_ticket,
			r.title,
			r.description,
			r.`date`,
			r.status,
			r.created_at,
			r.created_by
		from
			t_report r
		where 
			r.no_ticket = ?
			and
			r.created_by = ?
			and
			r.deleted_at is null
			and
			r.deleted_by is null";
				
		$query = $this->db->query($sql, array($noticket, $userid));

		return $query->result_array();
	}

	function get_reports_byticket_public($noticket) {

		$sql = "select 
			r.id,
			r.no_ticket,
			r.title,
			r.description,
			r.`date`,
			r.status,
			r.created_at,
			r.created_by
		from
			t_report r
		where 
			r.no_ticket = ?
			and
			r.deleted_at is null
			and
			r.deleted_by is null";
				
		$query = $this->db->query($sql, array($noticket));

		return $query->result_array();
	}

	function insert_ticket($no_ticket,$title, $description, $date, $userid) {

		$created_at = date('Y-m-d H:i:s');

		$sql = "INSERT INTO t_report (title, description, date, status, created_at, created_by) VALUES ( ?, ?, ?, 1, ?, ?) ";

		$this->db->query($sql, array($title, $description, $date, $created_at, $userid));

		$idticket = $this->db->insert_id();

		//update no ticket
		$sql2 = "UPDATE t_report SET no_ticket = ? WHERE id = ?";

		$this->db->query($sql2, array($no_ticket, $idticket));

		//insert to t_report_log

		$sql3 = "INSERT INTO t_report_log (report_id, `from`, `to`, description, created_at, created_by) VALUES (?, 0, 1, ?, ?, ?) ";

		$description_log = "Tiket telah dibuat dengan nomor ". $no_ticket;

		$this->db->query($sql3, array($idticket, $description_log, $created_at, $userid));

		$idticketlog = $this->db->insert_id();

		return $idticketlog;
	}

	function insert_ticket_log($report_id, $description_log, $userid) {

		$created_at = date('Y-m-d H:i:s');

		$sql = "INSERT INTO t_report_log (report_id, `from`, `to`, description, created_at, created_by) VALUES (?, 0, 1, ?, ?, ?) ";

		$this->db->query($sql, array($report_id, $description_log, $created_at, $userid));
		
		return $this->db->insert_id();
	}

	function insert_ticket_file($report_log_id, $type, $file, $upload, $userid) {

		$created_at = date('Y-m-d H:i:s');

		$sql = "INSERT INTO t_report_file (report_log_id, type, file_name, path, created_at, created_by) VALUES (?, ?, ?, ?, ?, ?) ";

		$this->db->query($sql, array($report_log_id, $type, $file, $upload, $created_at, $userid));
		
		return $this->db->insert_id();
	}

	function update_ticket_byid($title, $description, $date, $userid, $reportid) {
		$updated_at = date('Y-m-d H:i:s');

		$sql = "UPDATE t_report SET title = ?, description = ?, date = ?, updated_at = ?, updated_by = ? WHERE id = ?";

		$this->db->query($sql, array($title, $description, $date, $updated_at, $userid, $reportid));
	}

	function delete_ticket_bynoticket($userid, $reportid) {
		$deleted_at = date('Y-m-d H:i:s');

		$sql = "UPDATE t_report SET deleted_at = ?, deleted_by = ? WHERE no_ticket = ?";

		$this->db->query($sql, array($deleted_at, $userid, $reportid));
	}

	function delete_ticket_bynoticket_byuserid($userid, $reportid) {
		$deleted_at = date('Y-m-d H:i:s');

		$sql = "UPDATE t_report SET deleted_at = ?, deleted_by = ? WHERE no_ticket = ? AND created_by = ?";

		$this->db->query($sql, array($deleted_at, $userid, $reportid, $userid));
	}
	
	function get_all_reports_submitted() {
		$sql = "SELECT
				r.id,
				r.no_ticket,
				r.title,
				r.description,
				r.date,
				r.status,
				r.pic,
				r.created_at,
				u.full_name as created_name,
				u.address as creator_address,
				u.phone as creator_phone,
				u.email as creator_email,
				r.updated_at,
				(
				SELECT
					full_name
				FROM
					t_user u
				WHERE
					u.id = r.updated_by) as updated_name,
				r.is_finished,
				r.finished_at,
				(
				SELECT
					full_name
				FROM
					t_user u
				WHERE
					u.id = r.finished_by) as finished_name,
				(
				select count(trl.report_id)
				   from t_report_file trf 
				   join t_report_log trl on trl.id = trf.report_log_id
				  where trl.report_id = r.id  and trl.`to` = 1 and deleted_at is null
				)as jumlah_file_attachment
			FROM
				t_report r
			LEFT JOIN
				t_user u on u.id = r.created_by
			WHERE
				r.status = 1
				AND
				r.deleted_at IS NULL
				AND
				r.deleted_by IS NULL
			ORDER BY
   				r.created_at DESC, r.updated_at DESC, r.status ASC";
		$query = $this->db->query($sql);

		return $query->result_array();
	}
	
	function get_all_reports_submitted_bydate($date) {
		$sql = "SELECT
				r.id,
				r.no_ticket,
				r.title,
				r.description,
				r.date,
				r.status,
				r.pic,
				r.created_at,
				u.full_name as created_name,
				u.address as creator_address,
				u.phone as creator_phone,
				u.email as creator_email,
				r.updated_at,
				(
				SELECT
					full_name
				FROM
					t_user u
				WHERE
					u.id = r.updated_by) as updated_name,
				r.is_finished,
				r.finished_at,
				(
				SELECT
					full_name
				FROM
					t_user u
				WHERE
					u.id = r.finished_by) as finished_name,
				(
				select count(trl.report_id)
				   from t_report_file trf 
				   join t_report_log trl on trl.id = trf.report_log_id
				  where trl.report_id = r.id  and trl.`to` = 1 and deleted_at is null
				) as jumlah_file_attachment
			FROM
				t_report r
			LEFT JOIN
				t_user u on u.id = r.created_by
			WHERE
				r.status = 1
				AND
				r.deleted_at IS NULL
				AND
				r.deleted_by IS NULL";
		
		if (strpos($date, ' to ') !== false) {
			list($start_date, $end_date) = explode(' to ', $date);
			$sql .= " AND DATE(r.created_at) BETWEEN ? AND ? ORDER BY r.created_at DESC, r.updated_at DESC, r.status ASC";
			$query = $this->db->query($sql, array($start_date, $end_date));
		} else {
			$sql .= " AND DATE(r.created_at) = ? ORDER BY r.created_at DESC, r.updated_at DESC, r.status ASC";
			$query = $this->db->query($sql, array($date));
		}
	
		return $query->result_array();
	}
	
	
	function get_all_reports_submitted_byuserid($userid) {
		$sql = "SELECT
				r.id,
				r.no_ticket,
				r.title,
				r.description,
				r.date,
				r.status,
				r.pic,
				r.created_at,
				u.full_name as created_name,
				u.address as creator_address,
				u.phone as creator_phone,
				u.email as creator_email,
				r.updated_at,
				(
				SELECT
					full_name
				FROM
					t_user u
				WHERE
					u.id = r.updated_by) as updated_name,
				r.is_finished,
				r.finished_at,
				(
				SELECT
					full_name
				FROM
					t_user u
				WHERE
					u.id = r.finished_by) as finished_name,
				(
				select count(trl.report_id)
				   from t_report_file trf 
				   join t_report_log trl on trl.id = trf.report_log_id
				  where trl.report_id = r.id  and trl.`to` = 1 and deleted_at is null
				)as jumlah_file_attachment
			FROM
				t_report r
			LEFT JOIN
				t_user u on u.id = r.created_by
			WHERE
				r.status = 1
				AND
				r.created_by = ?
				AND
				r.deleted_at IS NULL
				AND
				r.deleted_by IS NULL
			ORDER BY
   				r.created_at DESC, r.updated_at DESC, r.status ASC";
		$query = $this->db->query($sql, array($userid));
	
		return $query->result_array();
	}

	function get_all_reports_submitted_byuserid_bydate($userid, $date) {
		$sql = "SELECT
				r.id,
				r.no_ticket,
				r.title,
				r.description,
				r.date,
				r.status,
				r.pic,
				r.created_at,
				u.full_name as created_name,
				u.address as creator_address,
				u.phone as creator_phone,
				u.email as creator_email,
				r.updated_at,
				(
				SELECT
					full_name
				FROM
					t_user u
				WHERE
					u.id = r.updated_by) as updated_name,
				r.is_finished,
				r.finished_at,
				(
				SELECT
					full_name
				FROM
					t_user u
				WHERE
					u.id = r.finished_by) as finished_name,
				(
				select count(trl.report_id)
				   from t_report_file trf 
				   join t_report_log trl on trl.id = trf.report_log_id
				  where trl.report_id = r.id  and trl.`to` = 1 and deleted_at is null
				) as jumlah_file_attachment
			FROM
				t_report r
			LEFT JOIN
				t_user u on u.id = r.created_by
			WHERE
				r.status = 1
				AND
				r.created_by = ?
				AND
				r.deleted_at IS NULL
				AND
				r.deleted_by IS NULL";
	
		if (strpos($date, ' to ') !== false) {
			list($start_date, $end_date) = explode(' to ', $date);
			$sql .= " AND DATE(r.created_at) BETWEEN ? AND ? ORDER BY r.created_at DESC, r.updated_at DESC, r.status ASC";
			$query = $this->db->query($sql, array($userid, $start_date, $end_date));
		} else {
			$sql .= " AND DATE(r.created_at) = ? ORDER BY r.created_at DESC, r.updated_at DESC, r.status ASC";
			$query = $this->db->query($sql, array($userid, $date));
		}
	
		return $query->result_array();
	}
	

	function get_all_reports_accepted() {
		$sql = "SELECT
				r.id,
				r.no_ticket,
				r.title,
				r.description,
				r.date,
				r.status,
				r.pic,
				r.created_at,
				u.full_name as created_name,
				u.address as creator_address,
				u.phone as creator_phone,
				u.email as creator_email,
				r.updated_at,
				(
				SELECT
					full_name
				FROM
					t_user u
				WHERE
					u.id = r.updated_by) as updated_name,
				r.is_finished,
				r.finished_at,
				(
				SELECT
					full_name
				FROM
					t_user u
				WHERE
					u.id = r.finished_by) as finished_name,
				(
				select count(trl.report_id)
				   from t_report_file trf 
				   join t_report_log trl on trl.id = trf.report_log_id
				  where trl.report_id = r.id  and trl.`to` = 1 and deleted_at is null
				)as jumlah_file_attachment
			FROM
				t_report r
			LEFT JOIN
				t_user u on u.id = r.created_by
			WHERE
				r.status in (2,4,5,6,7)
				AND
				r.deleted_at IS NULL
				AND
				r.deleted_by IS NULL
			ORDER BY
   				r.created_at DESC, r.updated_at DESC, r.status ASC";
		$query = $this->db->query($sql);

		return $query->result_array();
	}

	function get_all_reports_accepted_bydate($date) {
		$sql = "SELECT
				r.id,
				r.no_ticket,
				r.title,
				r.description,
				r.date,
				r.status,
				r.pic,
				r.created_at,
				u.full_name as created_name,
				u.address as creator_address,
				u.phone as creator_phone,
				u.email as creator_email,
				r.updated_at,
				(
				SELECT
					full_name
				FROM
					t_user u
				WHERE
					u.id = r.updated_by) as updated_name,
				r.is_finished,
				r.finished_at,
				(
				SELECT
					full_name
				FROM
					t_user u
				WHERE
					u.id = r.finished_by) as finished_name,
				(
				select count(trl.report_id)
				   from t_report_file trf 
				   join t_report_log trl on trl.id = trf.report_log_id
				  where trl.report_id = r.id  and trl.`to` = 1 and deleted_at is null
				) as jumlah_file_attachment
			FROM
				t_report r
			LEFT JOIN
				t_user u on u.id = r.created_by
			WHERE
				r.status in (2,4,5,6,7)
				AND
				r.deleted_at IS NULL
				AND
				r.deleted_by IS NULL";
	
		if (strpos($date, ' to ') !== false) {
			list($start_date, $end_date) = explode(' to ', $date);
			$sql .= " AND DATE(r.created_at) BETWEEN ? AND ? ORDER BY r.created_at DESC, r.updated_at DESC, r.status ASC";
			$query = $this->db->query($sql, array($start_date, $end_date));
		} else {
			$sql .= " AND DATE(r.created_at) = ? ORDER BY r.created_at DESC, r.updated_at DESC, r.status ASC";
			$query = $this->db->query($sql, array($date));
		}
	
		return $query->result_array();
	}
	

	function get_all_reports_accepted_byuserid($userid) {
		$sql = "SELECT
				r.id,
				r.no_ticket,
				r.title,
				r.description,
				r.date,
				r.status,
				r.pic,
				r.created_at,
				u.full_name as created_name,
				u.address as creator_address,
				u.phone as creator_phone,
				u.email as creator_email,
				r.updated_at,
				(
				SELECT
					full_name
				FROM
					t_user u
				WHERE
					u.id = r.updated_by) as updated_name,
				r.is_finished,
				r.finished_at,
				(
				SELECT
					full_name
				FROM
					t_user u
				WHERE
					u.id = r.finished_by) as finished_name,
				(
				select count(trl.report_id)
				   from t_report_file trf 
				   join t_report_log trl on trl.id = trf.report_log_id
				  where trl.report_id = r.id  and trl.`to` = 1 and deleted_at is null
				)as jumlah_file_attachment
			FROM
				t_report r
			LEFT JOIN
				t_user u on u.id = r.created_by
			WHERE
				r.status in (2,4,5,6,7)
				AND
				r.created_by = ?
				AND
				r.deleted_at IS NULL
				AND
				r.deleted_by IS NULL
			ORDER BY
   				r.created_at DESC, r.updated_at DESC, r.status ASC";
		$query = $this->db->query($sql, array($userid));

		return $query->result_array();
	}

	function get_all_reports_accepted_byuserid_bydate($userid, $date) {
		$sql = "SELECT
				r.id,
				r.no_ticket,
				r.title,
				r.description,
				r.date,
				r.status,
				r.pic,
				r.created_at,
				u.full_name as created_name,
				u.address as creator_address,
				u.phone as creator_phone,
				u.email as creator_email,
				r.updated_at,
				(
				SELECT
					full_name
				FROM
					t_user u
				WHERE
					u.id = r.updated_by) as updated_name,
				r.is_finished,
				r.finished_at,
				(
				SELECT
					full_name
				FROM
					t_user u
				WHERE
					u.id = r.finished_by) as finished_name,
				(
				select count(trl.report_id)
				   from t_report_file trf 
				   join t_report_log trl on trl.id = trf.report_log_id
				  where trl.report_id = r.id  and trl.`to` = 1 and deleted_at is null
				)as jumlah_file_attachment
			FROM
				t_report r
			LEFT JOIN
				t_user u on u.id = r.created_by
			WHERE
				r.status in (2,4,5,6,7)
				AND
				r.created_by = ?
				AND
				r.deleted_at IS NULL
				AND
				r.deleted_by IS NULL";

		if (strpos($date, ' to ') !== false) {
			list($start_date, $end_date) = explode(' to ', $date);
			$sql .= " AND DATE(r.created_at) BETWEEN ? AND ? ORDER BY r.created_at DESC, r.updated_at DESC, r.status ASC";
			$query = $this->db->query($sql, array($userid, $start_date, $end_date));
		} else {
			$sql .= " AND DATE(r.created_at) = ? ORDER BY r.created_at DESC, r.updated_at DESC, r.status ASC";
			$query = $this->db->query($sql, array($userid, $date));
		}

		return $query->result_array();
	}

	function get_all_reports_bystatusid($statusid) {
		$sql = "SELECT
				r.id,
				r.no_ticket,
				r.title,
				r.description,
				r.date,
				r.status,
				r.pic,
				r.created_at,
				u.full_name as created_name,
				u.address as creator_address,
				u.phone as creator_phone,
				u.email as creator_email,
				r.updated_at,
				(
				SELECT
					full_name
				FROM
					t_user u
				WHERE
					u.id = r.updated_by) as updated_name,
				r.is_finished,
				r.finished_at,
				(
				SELECT
					full_name
				FROM
					t_user u
				WHERE
					u.id = r.finished_by) as finished_name,
				(
				select count(trl.report_id)
				   from t_report_file trf 
				   join t_report_log trl on trl.id = trf.report_log_id
				  where trl.report_id = r.id  and trl.`to` = 1 and deleted_at is null
				)as jumlah_file_attachment,
				(
				select count(trl.report_id)
				   from t_report_item tri 
				   join t_report_log trl on trl.id = tri.report_log_id
				  where trl.report_id = r.id  and trl.`from` = 5 and tri.deleted_at is null
				)as jumlah_diskusi,
				r.followed_up_to as instansi_id,
				i.instansi as instansi_name
			FROM
				t_report r
			LEFT JOIN
				t_user u on u.id = r.created_by
			LEFT JOIN
				t_instansi i on i.id = r.followed_up_to
			WHERE
				r.status = ?
				AND
				r.deleted_at IS NULL
				AND
				r.deleted_by IS NULL
			ORDER BY
   				r.created_at DESC, r.updated_at DESC, r.status ASC";
		$query = $this->db->query($sql, array($statusid));

		return $query->result_array();
	}

	function get_all_reports_bystatusid_bydate($statusid, $date) {
		$sql = "SELECT
				r.id,
				r.no_ticket,
				r.title,
				r.description,
				r.date,
				r.status,
				r.pic,
				r.created_at,
				u.full_name as created_name,
				u.address as creator_address,
				u.phone as creator_phone,
				u.email as creator_email,
				r.updated_at,
				(
				SELECT
					full_name
				FROM
					t_user u
				WHERE
					u.id = r.updated_by) as updated_name,
				r.is_finished,
				r.finished_at,
				(
				SELECT
					full_name
				FROM
					t_user u
				WHERE
					u.id = r.finished_by) as finished_name,
				(
				select count(trl.report_id)
				   from t_report_file trf 
				   join t_report_log trl on trl.id = trf.report_log_id
				  where trl.report_id = r.id  and trl.`to` = 1 and deleted_at is null
				)as jumlah_file_attachment,
				(
				select count(trl.report_id)
				   from t_report_item tri 
				   join t_report_log trl on trl.id = tri.report_log_id
				  where trl.report_id = r.id  and trl.`from` = 5 and tri.deleted_at is null
				)as jumlah_diskusi,
				r.followed_up_to as instansi_id,
				i.instansi as instansi_name
			FROM
				t_report r
			LEFT JOIN
				t_user u on u.id = r.created_by
			LEFT JOIN
				t_instansi i on i.id = r.followed_up_to
			WHERE
				r.status = ?
				AND
				r.deleted_at IS NULL
				AND
				r.deleted_by IS NULL";

		if (strpos($date, ' to ') !== false) {
			list($start_date, $end_date) = explode(' to ', $date);
			$sql .= " AND DATE(r.created_at) BETWEEN ? AND ? ORDER BY r.created_at DESC, r.updated_at DESC, r.status ASC";
			$query = $this->db->query($sql, array($statusid, $start_date, $end_date));
		} else {
			$sql .= " AND DATE(r.created_at) = ? ORDER BY r.created_at DESC, r.updated_at DESC, r.status ASC";
			$query = $this->db->query($sql, array($statusid, $date));
		}

		return $query->result_array();
	}
	
	function get_all_reports_bystatusid_byuserid($statusid, $userid) {
		$sql = "SELECT
				r.id,
				r.no_ticket,
				r.title,
				r.description,
				r.date,
				r.status,
				r.pic,
				r.created_at,
				u.full_name as created_name,
				u.address as creator_address,
				u.phone as creator_phone,
				u.email as creator_email,
				r.updated_at,
				(
				SELECT
					full_name
				FROM
					t_user u
				WHERE
					u.id = r.updated_by) as updated_name,
				r.is_finished,
				r.finished_at,
				(
				SELECT
					full_name
				FROM
					t_user u
				WHERE
					u.id = r.finished_by) as finished_name,
				(
				select count(trl.report_id)
				   from t_report_file trf 
				   join t_report_log trl on trl.id = trf.report_log_id
				  where trl.report_id = r.id  and trl.`to` = 1 and trf.deleted_at is null
				)as jumlah_file_attachment,
				(
				select count(trl.report_id)
				   from t_report_item tri 
				   join t_report_log trl on trl.id = tri.report_log_id
				  where trl.report_id = r.id  and trl.`from` = 5 and tri.deleted_at is null
				)as jumlah_diskusi,
				r.followed_up_to as instansi_id,
				i.instansi as instansi_name
			FROM
				t_report r
			LEFT JOIN
				t_user u on u.id = r.created_by
			LEFT JOIN
				t_instansi i on i.id = r.followed_up_to
			WHERE
				r.status = ?
				AND
				r.created_by = ?
				AND
				r.deleted_at IS NULL
				AND
				r.deleted_by IS NULL
			ORDER BY
   				r.created_at DESC, r.updated_at DESC, r.status ASC";
		$query = $this->db->query($sql, array($statusid, $userid));
	
		return $query->result_array();
	}

	function get_all_reports_bystatusid_byuserid_bydate($statusid, $userid, $date) {
		$sql = "SELECT
				r.id,
				r.no_ticket,
				r.title,
				r.description,
				r.date,
				r.status,
				r.pic,
				r.created_at,
				u.full_name as created_name,
				u.address as creator_address,
				u.phone as creator_phone,
				u.email as creator_email,
				r.updated_at,
				(
				SELECT
					full_name
				FROM
					t_user u
				WHERE
					u.id = r.updated_by) as updated_name,
				r.is_finished,
				r.finished_at,
				(
				SELECT
					full_name
				FROM
					t_user u
				WHERE
					u.id = r.finished_by) as finished_name,
				(
				select count(trl.report_id)
				   from t_report_file trf 
				   join t_report_log trl on trl.id = trf.report_log_id
				  where trl.report_id = r.id  and trl.`to` = 1 and trf.deleted_at is null
				)as jumlah_file_attachment,
				(
				select count(trl.report_id)
				   from t_report_item tri 
				   join t_report_log trl on trl.id = tri.report_log_id
				  where trl.report_id = r.id  and trl.`from` = 5 and tri.deleted_at is null
				)as jumlah_diskusi,
				r.followed_up_to as instansi_id,
				i.instansi as instansi_name
			FROM
				t_report r
			LEFT JOIN
				t_user u on u.id = r.created_by
			LEFT JOIN
				t_instansi i on i.id = r.followed_up_to
			WHERE
				r.status = ?
				AND
				r.created_by = ?
				AND
				r.deleted_at IS NULL
				AND
				r.deleted_by IS NULL";
		
		if (strpos($date, ' to ') !== false) {
			list($start_date, $end_date) = explode(' to ', $date);
			$sql .= " AND DATE(r.created_at) BETWEEN ? AND ? ORDER BY r.created_at DESC, r.updated_at DESC, r.status ASC";
			$query = $this->db->query($sql, array($statusid, $userid, $start_date, $end_date));
		} else {
			$sql .= " AND DATE(r.created_at) = ? ORDER BY r.created_at DESC, r.updated_at DESC, r.status ASC";
			$query = $this->db->query($sql, array($statusid, $userid, $date));
		}
	
		return $query->result_array();
	}

	function get_all_reports_bystatusid_byinstansiid($statusid,$instansiid) {
		$sql = "SELECT
				r.id,
				r.no_ticket,
				r.title,
				r.description,
				r.date,
				r.status,
				r.pic,
				r.created_at,
				u.full_name as created_name,
				u.address as creator_address,
				u.phone as creator_phone,
				u.email as creator_email,
				r.updated_at,
				(
				SELECT
					full_name
				FROM
					t_user u
				WHERE
					u.id = r.updated_by) as updated_name,
				r.is_finished,
				r.finished_at,
				(
				SELECT
					full_name
				FROM
					t_user u
				WHERE
					u.id = r.finished_by) as finished_name,
				(
				select count(trl.report_id)
				   from t_report_file trf 
				   join t_report_log trl on trl.id = trf.report_log_id
				  where trl.report_id = r.id  and trl.`to` = 1 and deleted_at is null
				)as jumlah_file_attachment,
				(
				select count(trl.report_id)
				   from t_report_item tri 
				   join t_report_log trl on trl.id = tri.report_log_id
				  where trl.report_id = r.id  and trl.`from` = 5 and tri.deleted_at is null
				)as jumlah_diskusi,
				r.followed_up_to as instansi_id,
				i.instansi as instansi_name,
				(
				select trl.created_at
				   from t_report_log trl
				  where trl.report_id = r.id  and trl.`from` = 6 and trl.`to` = 7
				)as followed_up_at,
				(
				select trl.created_at
				   from t_report_log trl
				  where trl.report_id = r.id  and trl.`from` = 7 and trl.`to` = 7
				)as accepted_at
			FROM
				t_report r
			LEFT JOIN
				t_user u on u.id = r.created_by
			LEFT JOIN
				t_instansi i on i.id = r.followed_up_to
			WHERE
				r.status = ?
				AND
				r.followed_up_to = ?
				AND
				r.deleted_at IS NULL
				AND
				r.deleted_by IS NULL
			ORDER BY
   				r.created_at DESC, r.updated_at DESC, r.status ASC";
		$query = $this->db->query($sql, array($statusid,$instansiid));

		return $query->result_array();
	}

	function get_all_reports_bystatusid_byinstansiid_bydate($statusid, $instansiid, $date) {
		$sql = "SELECT
				r.id,
				r.no_ticket,
				r.title,
				r.description,
				r.date,
				r.status,
				r.pic,
				r.created_at,
				u.full_name as created_name,
				u.address as creator_address,
				u.phone as creator_phone,
				u.email as creator_email,
				r.updated_at,
				(
				SELECT
					full_name
				FROM
					t_user u
				WHERE
					u.id = r.updated_by) as updated_name,
				r.is_finished,
				r.finished_at,
				(
				SELECT
					full_name
				FROM
					t_user u
				WHERE
					u.id = r.finished_by) as finished_name,
				(
				select count(trl.report_id)
				   from t_report_file trf 
				   join t_report_log trl on trl.id = trf.report_log_id
				  where trl.report_id = r.id  and trl.`to` = 1 and deleted_at is null
				)as jumlah_file_attachment,
				(
				select count(trl.report_id)
				   from t_report_item tri 
				   join t_report_log trl on trl.id = tri.report_log_id
				  where trl.report_id = r.id  and trl.`from` = 5 and tri.deleted_at is null
				)as jumlah_diskusi,
				r.followed_up_to as instansi_id,
				i.instansi as instansi_name,
				(
				select trl.created_at
				   from t_report_log trl
				  where trl.report_id = r.id  and trl.`from` = 6 and trl.`to` = 7
				)as followed_up_at,
				(
				select trl.created_at
				   from t_report_log trl
				  where trl.report_id = r.id  and trl.`from` = 7 and trl.`to` = 7
				)as accepted_at
			FROM
				t_report r
			LEFT JOIN
				t_user u on u.id = r.created_by
			LEFT JOIN
				t_instansi i on i.id = r.followed_up_to
			WHERE
				r.status = ?
				AND
				r.followed_up_to = ?
				AND
				r.deleted_at IS NULL
				AND
				r.deleted_by IS NULL";

		if (strpos($date, ' to ') !== false) {
			list($start_date, $end_date) = explode(' to ', $date);
			$sql .= " AND DATE(r.created_at) BETWEEN ? AND ? ORDER BY r.created_at DESC, r.updated_at DESC, r.status ASC";
			$query = $this->db->query($sql, array($statusid, $instansiid, $start_date, $end_date));
		} else {
			$sql .= " AND DATE(r.created_at) = ? ORDER BY r.created_at DESC, r.updated_at DESC, r.status ASC";
			$query = $this->db->query($sql, array($statusid, $instansiid, $date));
		}

		return $query->result_array();
	}

	function update_ticket_status_byid($from, $to, $is_finished, $description_log, $userid, $reportid) {
		$updated_at = date('Y-m-d H:i:s');

		if($is_finished == 0) {
			$finished_at = NULL;
			$finished_by = NULL;
		} else {
			$finished_at = date('Y-m-d H:i:s');
			$finished_by = $userid;
		}

		// change status report
		$sql1 = "UPDATE t_report SET status = ?, updated_at = ?, updated_by = ?, is_finished = ?, finished_at = ?, finished_by = ? WHERE id = ?";

		$this->db->query($sql1, array($to, $updated_at, $userid, $is_finished, $finished_at, $finished_by, $reportid));

		// insert t_report_log
		$sql2 = "INSERT INTO t_report_log (report_id, `from`, `to`, description, created_at, created_by) VALUES (?, ?, ?, ?, ?, ?) ";

		$this->db->query($sql2, array($reportid, $from, $to, $description_log, $updated_at, $userid));

		$idticketlog = $this->db->insert_id();

		return $idticketlog;
	}

	function get_file_log($reportid, $to) {
		$sql = "select trf.`id` as id_report_file, trf.`report_log_id` as report_log_id, trf.`type`, trf.file_name, trf.`path`
				from t_report_file trf 
				join t_report_log trl on trl.id = trf.report_log_id
				where trl.report_id = ? and trl.`to` = ? and deleted_at is null";
		$query = $this->db->query($sql, array($reportid, $to));

		return $query->result_array();
	}

	function delete_file_log_where_all_or_not_id($type,$userid, $reportlogid, $id = array()) {
    	$temparray = array($userid, $reportlogid);
		$sql = "update t_report_file 
				set deleted_at = NOW(), deleted_by = ?
				where report_log_id = ?";
		if($type !== 'all'){
			$sql .= " and id not in (".$id.")";
		}

		$this->db->query($sql, $temparray);
	}

	function get_report_log($reportid) {
		$sql = "select 
					rl.id,
					rl.report_id,
					rl.`from`,
					rl.`to`,
					rf.id as status_id_from,
					rf.name as name_from,
					rf.icon as icon_from,
					rf.color as color_from,
					rt.id as status_id,
					rt.name,
					rt.icon,
					rt.color,
					rl.description,
					rl.created_at,
					rl.created_by
				from 
					t_report_log rl
				left join
					t_report_status rf on rf.id = rl.from
				left join
					t_report_status rt on rt.id = rl.to
				where 
					rl.report_id = ?
				order by 
					rl.created_at asc";
		$query = $this->db->query($sql, array($reportid));

		return $query->result_array();
	}

	function get_file_log_by_reportlogid($reportlogid) {
		$sql = "select 
					trf.`id` as id_report_file, 
					trf.`type`,
					trf.file_name, 
					trf.`path`
				from 
					t_report_file trf
				where 
					trf.report_log_id = ? and trf.deleted_at is null";
		$query = $this->db->query($sql, array($reportlogid));

		return $query->result_array();
	}

	function update_finish_ticket($finished_by,$reportid) {
		$finished_at = date('Y-m-d H:i:s');

		// change status report
		$sql1 = "UPDATE t_report SET is_finished = 1, finished_at = ?, finished_by = ? WHERE id = ?";

		$this->db->query($sql1, array($finished_at, $finished_by, $reportid));

		return ($this->db->affected_rows() > 0) ? TRUE : FALSE;
	}

	function insert_diskusi($idticket, $from, $title, $description, $date, $userid) {

		$created_at = date('Y-m-d H:i:s');

		//insert to t_report_log

		$sql1 = "INSERT INTO t_report_log (report_id, `from`, `to`, description, created_at, created_by) 
				 VALUES (?, ?, 0, ?, ?, ?) ";

		$description_log = "Diskusi ke";

		$this->db->query($sql1, array($idticket, $from, $description_log, $created_at, $userid));

		$idticketlog = $this->db->insert_id();

		//insert to t_report_item

		$sql2 = "INSERT INTO t_report_item (report_log_id, title, description, date, created_at, created_by) 
				 VALUES (?, ?, ?, ?, ?, ?) ";

		$this->db->query($sql2, array($idticketlog, $title, $description, $date, $created_at, $userid));

		$idticketreportitem = $this->db->insert_id();

		return $idticketreportitem;
	}

	function insert_ticket_file_item($report_log_id, $type, $file, $upload, $userid) {

		$created_at = date('Y-m-d H:i:s');

		$sql = "INSERT INTO t_report_item_file (report_item_id, type, file_name, path, created_at, created_by) VALUES (?, ?, ?, ?, ?, ?) ";

		$this->db->query($sql, array($report_log_id, $type, $file, $upload, $created_at, $userid));

		return $this->db->insert_id();
	}

	function get_diskusi_by_reportId($reportid,$from) {
		$sql = "select tri.id, tri.title, tri.description, tri.`date`
				 from t_report_item tri 
				 left join t_report_log trl on trl.id = tri.report_log_id 
				 where tri.deleted_at is null and trl.report_id = ? and trl.`from` = ?
				 order by date asc";
		$query = $this->db->query($sql, array($reportid,$from));

		return $query->result_array();
	}

	function get_diskusi_by_reportLogId($reportLogid) {
		$sql = "select tri.id, tri.title, tri.description, tri.`date`
				 from t_report_item tri 
				 where tri.deleted_at is null and tri.report_log_id = ?
				 order by date asc";
		$query = $this->db->query($sql, array($reportLogid));

		return $query->result_array();
	}

	function get_file_diskusi($reportitemid) {
		$sql = "select trif.id, trif.`type`, trif.file_name, trif.`path`
				from t_report_item_file trif 
				where trif.report_item_id = ? and trif.deleted_at is null";
		$query = $this->db->query($sql, array($reportitemid));

		return $query->result_array();
	}

	function delete_report_item($itemid,$userid) {
		$deleted_at = date('Y-m-d H:i:s');

		//get id report log
		$sqlgetid = "select 
					tri.`report_log_id`
				from 
					t_report_item tri
				where tri.id = ?";
		$query = $this->db->query($sqlgetid, array($itemid));
		$qgetid = $query->result_array();

		//delete from report log

		$sql = "DELETE FROM t_report_log WHERE id = ?";

		$this->db->query($sql, array($qgetid[0]['report_log_id']));

		//delete from report item

		$sql1 = "UPDATE t_report_item SET deleted_at = ?, deleted_by = ? WHERE id = ?";

		$this->db->query($sql1, array($deleted_at, $userid, $itemid));

		return ($this->db->affected_rows() > 0) ? TRUE : FALSE;
	}

	function update_followedup_to($reportid, $instansi) {

		$sql = "UPDATE t_report SET followed_up_to = ? WHERE id = ? ";

		$this->db->query($sql, array($instansi, $reportid));
	}

	function update_ticket_pic($pic, $reportid) {

		$sql = "UPDATE t_report SET pic = ? WHERE id = ? ";

		$this->db->query($sql, array($pic, $reportid));
	}

	function insert_ticket_generate($no_ticket, $email, $phone) {

		$created_at = date('Y-m-d H:i:s');

		$sql = "INSERT INTO t_ticket (no_ticket, email, phone, created_at) VALUES (?, ?, ?, ?)";

		$this->db->query($sql, array($no_ticket, $email, $phone, $created_at));
	}

	function generated_ticket($no_ticket,$valid) {
    	$arr = array($no_ticket);
		$sql = "SELECT t.id, t.no_ticket, t.email, t.phone, t.created_at FROM t_ticket t WHERE t.no_ticket = ?";

		if($valid != ''){
			$arr[] = $valid;
			$arr[] = $valid;
			$sql .= " AND (email = ? OR phone = ?)";
		}

		$query = $this->db->query($sql, $arr);

		return $query->result_array();
	}

	function insert_user_bygenerate($email, $password, $name, $address, $phone) {

		$mpass = md5($password);

		$created_at = date('Y-m-d H:i:s');

		$sql = "INSERT INTO t_user (email, hash, full_name, address, phone, is_active, created_at) VALUES (?, ?, ?, ?, ?, 1, ?)";

		$this->db->query($sql, array($email, $mpass, $name, $address, $phone, $created_at));
		
		return $this->db->insert_id();
	}

	function insert_ticket_bygenerate($no_ticket, $title, $description, $date, $user_id) {

		$created_at = date('Y-m-d H:i:s');

		$sql = "INSERT INTO t_report (title, description, date, status, created_at, created_by) VALUES ( ?, ?, ?, 1, ?, ?) ";

		$this->db->query($sql, array($title, $description, $date, $created_at, $user_id));

		$idticket = $this->db->insert_id();

		//update no ticket
		$noticket = $no_ticket;

		$sql2 = "UPDATE t_report SET no_ticket = ? WHERE id = ?";

		$this->db->query($sql2, array($noticket, $idticket));

		//insert to t_report_log

		$sql3 = "INSERT INTO t_report_log (report_id, `from`, `to`, description, created_at, created_by) VALUES (?, 0, 1, ?, ?, ?) ";

		$description_log = "Tiket telah dibuat dengan nomor ". $noticket;

		$this->db->query($sql3, array($idticket, $description_log, $created_at, $user_id));

		$idticketlog = $this->db->insert_id();

		return $idticketlog;
	}

	function check_ticket($no_ticket) {
		$sql = "SELECT 't_ticket' AS Type, t.no_ticket, t.email, t.phone, t.created_at 
				FROM t_ticket t
				WHERE t.no_ticket = ?
				union
				select 't_report', tr.no_ticket, tu.email, tu.phone, tu.created_at
				from t_report tr 
				left join t_user tu on tu.id = tr.created_by
				where tr.no_ticket = ?";
		$query = $this->db->query($sql, array($no_ticket,$no_ticket));

		return $query->result_array();
	}
}