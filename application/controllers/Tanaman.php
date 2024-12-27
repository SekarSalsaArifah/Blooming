<?php

class Tanaman extends CI_Controller{

	function __construct(){
		parent::__construct();
		$this->load->model('Mcrud');
		$this->load->library('session');
		$this->load->library('upload');
	}

	public function index(){
		// $data['vbiayakirim']=$this->Mcrud->get_view('vbiayakirim')->result();
		$data = $this->Mcrud->get_all_data('tanaman')->result();
			if($data!=NULL){
				$i = 0;
	            foreach($data as $o){
	                $data['tanaman'][$i] = array(
	                    'id_tanaman' => $o->id_tanaman,
	                    'nama_tanaman' => $o->nama_tanaman,
	                    'harga_tanaman' => $o->harga_tanaman,
	                    'deskripsi' => $o->deskripsi,
	                    'qty' => $o->qty,
	                    'gambar' => $o->gambar
	                );
	                $data['tanaman'][$i] = (object)$data['tanaman'][$i];
	                $i++;
	            }
	        }else{
	        	$data['tanaman']=array();
	        }
		$this->template->load('layout_admin','admin/tanaman/index', $data);
	}

	public function add(){
		$data['kategori']=$this->Mcrud->get_all_data('tanaman')->result();
    	$this->template->load('layout_admin','admin/tanaman/form_add',$data);
	}

	public function save(){
		$data = $this->input->post();
		$target_dir = "./uploads/";
        $extension  = pathinfo( $_FILES["gambar"]["name"], PATHINFO_EXTENSION );
        $target_name = $data['nama_tanaman']."-gambar.".$extension;
        $_FILES["gambar"]["name"] = $target_name;

        // var_dump($foto);
        $target_file = $target_dir . basename($_FILES["gambar"]["name"]);
        move_uploaded_file($_FILES["gambar"]["tmp_name"], $target_file);

        $data['gambar'] = $target_name;
        $status = $this->Mcrud->insert('tanaman', $data);
		
        

        if($status != NULL ){
                // $this->session->set_flashdata('success', "Registrasi Berhasil, Silahkan Login"); 
                redirect('tanaman');
            } else {
                // $this->session->set_flashdata('error', "Registrasi Gagal, Silahkan Ulangi Kembali");
                redirect('tanaman');
            }

	}
		
	public function getid($id){
		$dataWhere=array('id_tanaman'=>$id);
		$result = $this->Mcrud->get_by_id('tanaman', $dataWhere)->row_object();
        $data['tanaman'] = array(
        	'id_tanaman' => $result->id_tanaman,
	        'nama_tanaman' => $result->nama_tanaman,
	        'harga_tanaman' => $result->harga_tanaman,
	        'deskripsi' => $result->deskripsi,
	        'qty' => $result->qty,
	        'gambar' => $result->gambar

        );
        $data['tanaman'] = (object)$data['tanaman'];
		$this->template->load('layout_admin','admin/tanaman/form_edit', $data);
	}

	public function edit(){
		$id = $this->input->post('id_tanaman');
		$data = $this->input->post();
		$target_dir = "./uploads/";
        $extension  = pathinfo( $_FILES["gambar"]["name"], PATHINFO_EXTENSION );
        $target_name = $data['nama_tanaman']."-gambar.".$extension;
        $_FILES["gambar"]["name"] = $target_name;

        // var_dump($foto);
        $target_file = $target_dir . basename($_FILES["gambar"]["name"]);
        move_uploaded_file($_FILES["gambar"]["tmp_name"], $target_file);

        $data['gambar'] = $target_name;
        $this->Mcrud->updatee('tanaman', $data, 'id_tanaman', $id);   
        redirect('tanaman');

        // if($status != NULL ){
        //         // $this->session->set_flashdata('success', "Registrasi Berhasil, Silahkan Login"); 
        //         redirect('produk');
        //     } else {
        //         // $this->session->set_flashdata('error', "Registrasi Gagal, Silahkan Ulangi Kembali");
        //         redirect('produk');
        //     }
	}

	public function delete($id){
		$dataDelete=array('id_tanaman'=>$id);
		$this->Mcrud->delete($dataDelete,'tanaman');
		$this->session->set_flashdata('success', 'Tanaman berhasil dihapus');
		$this->session->set_flashdata('error', 'Tanaman gagal dihapus');
		redirect('tanaman');
	}
}