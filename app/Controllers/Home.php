<?php

namespace App\Controllers;

use App\Models\GuestbookModel;

use Irsyadulibad\DataTables\DataTables;
use CodeIgniter\Services;

class Home extends BaseController
{
    public function __construct()
    {
        $this->uri = service('uri');
    }

    public function index()
    {
        $data['param']='';
        $param = $this->request->getGet('to');
        if($param){
            if($param!==''){
                $data['param']=base64_decode($param);
            }
        }
        $model = new GuestbookModel;
        $data['guest'] = $model->orderBy('createdAt', 'desc')->findAll();
        return view('pages/index', $data);
    }


    public function getGuest()
    {
        $model = new GuestbookModel;
        $result = $model->orderBy('createdAt', 'desc')->findAll();
        
        echo json_encode($result);
    }

    public function postData()
    {

        $result = ['status' => false, 'message' => 'Post data gagal. Silahkan coba lagi'];
        if ($this->request->getMethod() == 'post') {
            $param = $this->request->getPost();
            // print_r($param);
            // exit();
                $model = new GuestbookModel();
                $res = $model->save($param);
                if ($res) {

                    //send email
                    // $email = Services::email();
                    // $dataEmail = array(
                    //     'event_name' => $trans['event_name'],
                    //     'category' => $trans['category'],
                    //     'invoice' => $trans['invoice'],
                    //     'name' => $trans['fullname'],
                    //     'price' => $trans['price'],
                    //     'created_at' => $trans['created_at'],
                    //     'preheader' => 'Event Registered',
                    // );
                    // $sent = $email->setTo(session()->get('email'))
                    //     ->setSubject($dataEmail['preheader'])
                    //     ->setMessage(view('emails/join_success', $dataEmail))
                    //     ->setMailType('html')
                    //     ->send();

                    // if (!$sent) {
                    //     $this->error = "Gagal mengirim email ke " . $dataEmail['email'];
                    // }

                    $result = ['status' => true, 'message' => 'Anda berhasil mengirim ucapan'];
                } else {
                    $result = ['status' => false, 'message' => 'Anda gagal mengirim ucapan. Silahkan coba lagi'];
                }
            
        }
        echo json_encode($result);
    }

    //--------------------------------------------------------------------

    public function checkemail()
    {
        $model = new TransactionModel;
        $event = $model->getDataTrans('2f10847a40');
        $paymentCode = '2f10847a40';
        $dataEmail = array(
            'event_name' => $event['event_name'],
            'category' => $event['category'],
            'invoice' => $paymentCode,
            'name' => $event['fullname'],
            'created_at' => $event['created_at'],
            'preheader' => 'Payment Successfull',
        );

        return view('emails/join_success', $dataEmail);
    }

}
