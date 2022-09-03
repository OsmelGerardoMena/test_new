<?php
class AppointmentController extends BaseController
{


    /**
     * "/appointment/AddNew" Endpoint - set new appointment
     */
    public function AddNewAction()
    {
        $strErrorDesc = '';
        $requestMethod = $_SERVER["REQUEST_METHOD"];
        if (strtoupper($requestMethod) == 'POST') {
            try {
                $appointmentModel = new AppointmentModel();


                if (isset($_POST['id_user_doc']) && $_POST['id_user_doc']) {
                    $data[0] = $_POST['id_user_doc'];
                }

                if (isset($_POST['id_user_patient']) && $_POST['id_user_patient']) {
                    $data[1] = $_POST['id_user_patient'];
                }

                if (isset($_POST['date']) && $_POST['date']) {
                    $data[2] = $_POST['date'];
                }

                if (isset($_POST['description']) && $_POST['description']) {
                    $data[3] = $_POST['description'];
                }

                if((isset($data[0]) && isset($data[1]) && isset($data[2])) && ($data[0]!='' && $data[0]!=0) && ($data[1]!='' && $data[0]!=0) && ($data[2]!=''))
                {

                    $statusAppointment = $appointmentModel->getAppointmentsDetail($data[0],$data[1],$data[2]);
                    if(count($statusAppointment)<1){
                        $appointmentModel->AddAppointments($data);
                        $arrAppointments=array('status'=>'1','Message'=>'Successful');
                    }
                    else
                    {
                        $arrAppointments=array('status'=>'0','Message'=>'Cita ya agregada, imposible volver a agendarla');
                    }
                }
                else
                {
                    $arrAppointments=array('status'=>'0',
                    'Message'=>'Error en envio de datos');
                }
 
                
                $responseData = json_encode($arrAppointments);
            } catch (Error $e) {
                $strErrorDesc = $e->getMessage().'Something went wrong! Please contact support.';
                $strErrorHeader = 'HTTP/1.1 500 Internal Server Error';
            }
        } else {
            $strErrorDesc = 'Method not supported';
            $strErrorHeader = 'HTTP/1.1 422 Unprocessable Entity';
        }
 
        // send output
        if (!$strErrorDesc) {
            $this->sendOutput(
                $responseData,
                array('Content-Type: application/json', 'HTTP/1.1 200 OK')
            );
        } else {
            $this->sendOutput(json_encode(array('error' => $strErrorDesc)), 
                array('Content-Type: application/json', $strErrorHeader)
            );
        }
    }


    /**
     * "/appointment/getList" Endpoint - Get list of appointment for user type doctor
     */
    public function getListAction()
    {
        $strErrorDesc = '';
        $requestMethod = $_SERVER["REQUEST_METHOD"];
        $arrQueryStringParams = $this->getQueryStringParams();
        if (strtoupper($requestMethod) == 'GET') {
            try {
                $appointmentModel = new AppointmentModel();
 
                $id_doc = 0;
                if (isset($arrQueryStringParams['id_doc']) && $arrQueryStringParams['id_doc']) {
                    $id_doc = $arrQueryStringParams['id_doc'];
                }
 
                $arrAppointments = $appointmentModel->getAppointments($id_doc);
                $responseData = json_encode($arrAppointments);
            } catch (Error $e) {
                $strErrorDesc = $e->getMessage().'Something went wrong! Please contact support.';
                $strErrorHeader = 'HTTP/1.1 500 Internal Server Error';
            }
        } else {
            $strErrorDesc = 'Method not supported';
            $strErrorHeader = 'HTTP/1.1 422 Unprocessable Entity';
        }
 
        // send output
        if (!$strErrorDesc) {
            $this->sendOutput(
                $responseData,
                array('Content-Type: application/json', 'HTTP/1.1 200 OK')
            );
        } else {
            $this->sendOutput(json_encode(array('error' => $strErrorDesc)), 
                array('Content-Type: application/json', $strErrorHeader)
            );
        }
    }


    /**
     * "/appointment/ChangeStatusAppointment" Endpoint - update status appointment
     */
    public function ChangeStatusAppointmentAction()
    {
        $strErrorDesc = '';
        $requestMethod = $_SERVER["REQUEST_METHOD"];
        if (strtoupper($requestMethod) == 'POST') {
            try {
                $appointmentModel = new AppointmentModel();


                if (isset($_POST['id_appointment']) && $_POST['id_appointment']) {
                    $data[0] = $_POST['id_appointment'];
                }

                if (isset($_POST['status']) && $_POST['status']) {
                    $data[1] = $_POST['status'];
                }

                if (isset($_POST['id_user_doc']) && $_POST['id_user_doc']) {
                    $data[2] = $_POST['id_user_doc'];
                }

                if((isset($data[0]) && isset($data[1]) && isset($data[2])) && ($data[0]!='' && $data[0]!=0) && ($data[1]!='' && $data[0]!=0) && ($data[2]!=''))
                {

                    $statusAppointment = $appointmentModel->getAppointmentsValidate($data[2],$data[0]);
                    if(count($statusAppointment)>0){
                        $appointmentModel->ChangeStatusAppointments($data);
                        $arrAppointments=array('status'=>'1','Message'=>'Change status Successful');
                    }
                    else
                    {
                        $arrAppointments=array('status'=>'0','Message'=>'Esta cita no pertenece a este doctor');
                    }
                }
                else
                {
                    $arrAppointments=array('status'=>'0',
                    'Message'=>'Error en envio de datos');
                }
 
                
                $responseData = json_encode($arrAppointments);
            } catch (Error $e) {
                $strErrorDesc = $e->getMessage().'Something went wrong! Please contact support.';
                $strErrorHeader = 'HTTP/1.1 500 Internal Server Error';
            }
        } else {
            $strErrorDesc = 'Method not supported';
            $strErrorHeader = 'HTTP/1.1 422 Unprocessable Entity';
        }
 
        // send output
        if (!$strErrorDesc) {
            $this->sendOutput(
                $responseData,
                array('Content-Type: application/json', 'HTTP/1.1 200 OK')
            );
        } else {
            $this->sendOutput(json_encode(array('error' => $strErrorDesc)), 
                array('Content-Type: application/json', $strErrorHeader)
            );
        }
    }



}