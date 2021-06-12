<?php
class Job_model extends CI_Model
{
    function get_job_list($limit, $start)
    {
        $query = $this->db->get('job_provider', $limit, $start);
        return $query;
    }
}
