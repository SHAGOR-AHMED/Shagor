<?php

function getMembers()
{
    $ci = &get_instance();
    $ci->load->database();
    $data = $ci->db->select('mem_id,first_name,last_name')->from('tbl_members')->get()->result();
    echo '<option value="">-- Select a member  --</option>';
    foreach ($data as $dd) {
        echo '<option value="' . $dd->mem_id . '" >  ' . $dd->first_name .' '.$dd->last_name. '</option><br />';
    }
}


function getAllCountryList()
{
    $ci =& get_instance();
    $ci->load->database();
    $data = $ci->db->select('*')->from('countries')->get()->result();

    foreach ($data as $d) {
        echo '<option value="' . $d->id . '" />  ' . $d->con_name . '<br />';
    }


}

function getAllStatesByCountryId($country_id)
{
    $ci =& get_instance();
    $ci->load->database();
    $data = $ci->db->select('*')->from('states')->where('country_id', $country_id)->get()->result();
    $out = '';
    foreach ($data as $dd) {
        $out .= '<option value="' . $dd->id . '" >  ' . $dd->st_name . '</option><br />';
    }
    echo empty($out) ? 'Not Set' : $out;
}

function generateReligionView($religion_value)
{
    switch ($religion_value) {
        case 1:
            echo "Islam";
            break;
        case 2:
            echo "Hindu";
            break;
        case 3:
            echo "Christian";
            break;
        case 4:
            echo "Buddho";
            break;
        default:
            echo "";
    }
}

function generateBloodGroup($bg_val)
{
    switch ($bg_val) {
        case 1:
            echo "A+";
            break;
        case 2:
            echo "B+";
            break;
        case 3:
            echo "O+";
            break;
        case 4:
            echo "AB+";
            break;
        case 5:
            echo "A-";
            break;
        case 6:
            echo "B-";
            break;
        case 7:
            echo "O-";
            break;
        case 8:
            echo "AB-";
            break;
        default:
            echo "";
    }
    function generateSex($val)
    {
        switch ($val) {
            case 1:
                echo "Male";
                break;
            case 2:
                echo "Female";
                break;
            default:
                echo "";
        }
    }
}
