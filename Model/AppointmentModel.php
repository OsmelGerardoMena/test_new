<?php
require_once PROJECT_ROOT_PATH . "/Model/Database.php";
 
class AppointmentModel extends Database
{
    public function getAppointments($id_doc)
    {
        return $this->select("SELECT * FROM appointments where id_user_doc=? ORDER BY date ASC", ["i", $id_doc]);
    }

    public function AddAppointments($data)
    {    
        return $this->executeQuerys("INSERT INTO appointments (id_user_doc,id_user_patient,date,description)values('".$data[0]."','".$data[1]."','".$data[2]."','".$data[3]."')");
    }


    public function ChangeStatusAppointments($data)
    {    
        return $this->executeQuerys("UPDATE appointments set status='".$data[1]."' where id='".$data[0]."' ");
    }


    public function getAppointmentsDetail($var1,$var2,$var3)
    {
        return $this->select("SELECT * FROM appointments where id_user_doc=".$var1." and id_user_patient=".$var2." and date='".$var3."'");
    }

    public function getAppointmentsValidate($var1,$var2)
    {
        return $this->select("SELECT * FROM appointments where id_user_doc=".$var1." and id=".$var2."");
    }

    
    
}