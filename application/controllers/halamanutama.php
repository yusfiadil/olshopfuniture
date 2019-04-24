<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class halamanutama extends CI_Controller {


	
	
	public function index()
	{
		$this->load->model('model');
		$data['queri']=$this->model->tb_konten();
		$this->load->view('halamanutama',$data);
	}
	public function profil()
	{
		$this->load->model('model');
		$data['queri']=$this->model->tb_profil();
		$this->load->view('profil',$data);
	}
		public function produk()
	{
		$this->load->model('model');
		$data['queri']=$this->model->tb_leftjoinKdanP();
		$this->load->view('produk',$data);
	}

	public function detail_produk($id)
	{

		$this->load->model('model');
		$where = array('id' => $id);
		$data['queri']=$this->model->tb_detailproduk($id);
		$this->load->view('detailproduk',$data);
	}

	public function capes()
	{
		$this->load->view('carapesan');
	}
	public function kontak()
	{
		$this->load->view('kontak');
	}


	//area admin

	public function adminarea()
	{
		if ($this->session->userdata('username')=="") {
			redirect('halamanutama/login');
		}
		$this->load->view('admin/halawal');
	}

public function konten()
	{
			if ($this->session->userdata('username')=="") {
			redirect('halamanutama/login');
		}
		$this->load->model('model');
		$data['queri']=$this->model->tb_konten();
		$data['queri1']=$this->model->tb_profil();

		$this->load->view('admin/konten',$data);
	}
public function kategori()
	{
			if ($this->session->userdata('username')=="") {
			redirect('halamanutama/login');
		}
		$this->load->model('model');
		$data['queri']=$this->model->tb_kategori();
		$this->load->view('admin/kategori',$data);
	}


public function add_kategori()
	{
			if ($this->session->userdata('username')=="") {
			redirect('halamanutama/login');
		}
		$this->load->model('model');
		$data = array(
        'kategori'    => $this->input->post('nama'),
				);

			$insert = $this->model->input_data($data,"kategori");
			echo json_encode(array("status" => TRUE));
	}
public function del_kategori($id)
	{
			if ($this->session->userdata('username')=="") {
			redirect('halamanutama/login');
		}
		$this->load->model('model');
		$this->model->delete_by_id($id);
		echo json_encode(array("status" => TRUE));
	}

public function del_produk($id)
	{
			if ($this->session->userdata('username')=="") {
			redirect('halamanutama/login');
		}
		$this->load->model('model');
		$a= $this->model->tb_produkid($id);
		foreach ($a as $b) {
	$gambar=$b->gambar;


}		$namafile='./assets/produk/'.$gambar;

		$this->model->delete_by_id_produk($id);


		unlink($namafile);
		echo json_encode(array("status" => TRUE));
	}

public function produk2()
	{

	if ($this->session->userdata('username')=="") {
			redirect('halamanutama/login');
		}

		$this->load->model('model');
		$data['queri']=$this->model->tb_produk();
		$data['a']=$this->model->tb_produk_idmax();
		$data['queri1']=$this->model->tb_kategori();

		$this->load->view('admin/produk2',$data);
	}

public function add_produk()
	{

			if ($this->session->userdata('username')=="") {
			redirect('halamanutama/login');
		}

		$a = $_FILES['filefoto']['name'];
	    
		$this->load->model('model');
		$data = array(
        'id'    => $this->input->post('id'),
        'namaproduk'    => $this->input->post('nama'),
        'kategori'    => $this->input->post('kategori'),
        'harga'    => $this->input->post('harga'),
        'gambar'    => $a,


				);

			$insert = $this->model->input_data($data,"produk");
			echo json_encode(array("status" => TRUE));
		}

public function update_produk()
    {

    		if ($this->session->userdata('username')=="") {
			redirect('halamanutama/login');
		}

		$id=$this->input->post('id');
		$gambar=$this->input->post('gambar');

 				if ($_FILES['userfile']['name'] != '') {

$hps='./assets/produk/'.$gambar;
unlink($hps);

            	$nmfile = "file_".$id; //nama file + fungsi time
                $config['upload_path'] = './assets/produk/';
                $config['allowed_types'] = 'gif|jpg|png';
        		$config['file_name'] = $nmfile; //nama yang terupload nantinya

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('userfile')) {
                    $aa=$this->upload->data();

//Resize and Compress Image
            $config['image_library']='gd2';
            $config['source_image']='./assets/produk/'.$aa['file_name'];
            $config['create_thumb']= FALSE;
            $config['maintain_ratio']= FALSE;
            $config['quality']= '60%';
            $config['width']= 600;
            $config['height']= 400;
            $config['new_image']= './assets/produk/'.$aa['file_name'];
            $this->load->library('image_lib', $config);
            $this->image_lib->resize();

		$this->load->model('model');
		$data = array(
        'id'    => $this->input->post('id'),
        'namaproduk'    => $this->input->post('nama'),
        'kategori'    => $this->input->post('kategori'),
        'harga'    => $this->input->post('harga'),
       'gambar'    => $aa['file_name'],


				);

		$this->model->update(array('id' => $id), $data,"produk");

	}}else{

		$this->load->model('model');
		$data = array(
        'id'    => $this->input->post('id'),
        'namaproduk'    => $this->input->post('nama'),
        'kategori'    => $this->input->post('kategori'),
        'harga'    => $this->input->post('harga'),
       //'gambar'    => $aa['file_name'],


				);

		$this->model->update(array('id' => $id), $data,"produk");
	}
                echo json_encode(array("status" => TRUE));
                }



	public function do_upload()
    {

    		if ($this->session->userdata('username')=="") {
			redirect('halamanutama/login');
		}

		$id=$this->input->post('id');
        if (isset($_FILES['userfile'])) {
            if ($_FILES['userfile']['name'] != '') {

            	$nmfile = "file_".$id; //nama file + fungsi time
                $config['upload_path'] = './assets/produk/';
                $config['allowed_types'] = 'gif|jpg|png';
        		$config['file_name'] = $nmfile; //nama yang terupload nantinya

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('userfile')) {
                    $aa=$this->upload->data();

//Resize and Compress Image
            $config['image_library']='gd2';
            $config['source_image']='./assets/produk/'.$aa['file_name'];
            $config['create_thumb']= FALSE;
            $config['maintain_ratio']= FALSE;
            $config['quality']= '60%';
            $config['width']= 600;
            $config['height']= 400;
            $config['new_image']= './assets/produk/'.$aa['file_name'];
            $this->load->library('image_lib', $config);
            $this->image_lib->resize();





		$this->load->model('model');
		$data = array(
        'id'    => $this->input->post('id'),
        'namaproduk'    => $this->input->post('nama'),
        'kategori'    => $this->input->post('kategori'),
        'harga'    => $this->input->post('harga'),
        'gambar'    => $aa['file_name'],


				);

			$insert = $this->model->input_data($data,"produk");


                    return 'success';
                } else {
                    return 'error';
                }
            } else {
                return 'error';
            }
        } else {
            return 'error';
        }
    }


public function ajax_edit($id)
		{

$this->load->model('model');
$data = $this->model->get_by_id($id,"profilperusahaan");
echo json_encode($data);
		}

public function ajax_edit2($id)
		{

$this->load->model('model');
$data = $this->model->get_by_id($id,"konten");
echo json_encode($data);
		}


		public function ajax_edit3($id)
		{

$this->load->model('model');
$data = $this->model->get_by_id($id,"produk");
echo json_encode($data);
		}


public function edit_konten()
	{

	if ($this->session->userdata('username')=="") {
			redirect('halamanutama/login');
		}
	    
		$this->load->model('model');
		$data = array(
        'profilperusahaan'    => $this->input->post('profil'),

				);

			$this->model->update(array('id' => '1'), $data,"profilperusahaan");

		echo json_encode(array("status" => TRUE));
		}

public function edit_konten2()
	{

			if ($this->session->userdata('username')=="") {
			redirect('halamanutama/login');
		}

	    $a=$this->input->post('kontena');
		$this->load->model('model');

		$data1 = array(
        'konten'    => $a,
				);

			$this->model->update(array('id' => '1'), $data1,"konten");

		echo json_encode(array("status" => TRUE));
		}

public function login()
	{
		$this->load->view('login');
		
		}



public function cek_login() {
		$data = array('username' => $this->input->post('username', TRUE),
						'password' => md5($this->input->post('password', TRUE))
			);
		$this->load->model('model'); // load model_user
		$hasil = $this->model->cek_user($data);
		if ($hasil->num_rows() == 1) {
			foreach ($hasil->result() as $sess) {
				$sess_data['logged_in'] = 'Sudah Loggin';
				$sess_data['username'] = $sess->username;
				$sess_data['id'] = $sess->id;
			
				$this->session->set_userdata($sess_data);
			}
			
				redirect('halamanutama/adminarea');
			

		}
		else {
			echo "<script>alert('Gagal login: Cek username, password!');history.go(-1);</script>";
		}
	}
public function logout() {
		$this->session->unset_userdata('username');
	
		session_destroy();
		redirect('halamanutama/login');
	}

	}